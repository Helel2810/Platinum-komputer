@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Order
        </h1>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas "></i> Gravity.
                    <small class="float-right">Date: {{$order->created_at}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Gravity, Inc.</strong><br>
                    Jl. Bawal Raya No. 6<br>
                    Tanjung Priok, Jakut 14350<br>
                    Phone: +6281908340874<br>
                    Email: Support@Gravity.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{$order->address->recipient_name}}</strong><br>
                    {{$order->address->address}}<br>
                    {{$order->address->district->name}}, {{$order->address->district->city->province->name}} {{$order->address->post_code}}<br>
                    Phone: {{$order->address->phone}}<br>
                    Email: {{$order->customer->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Order ID:</b> Plt{{$order->id}}<br>
                  <b>Payment Due:</b> {{$order->created_at->addDay(3)->format('d/m/Y')}}<br>
                  <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <?php
                $subtotal = 0;
              ?>
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Product</th>
                      <th>Serial #</th>
                      <th>Category</th>
                      <th>Qty</th>
                      <th class="text-right">Price</th>
                      <th class="text-right">Promotion Discount</th>
                      <th class="text-right">Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products as $product)
                    <?php
                        $subtotal += $product->pivot->qty*$product->price;
                    ?>
                    <tr>
                      <td>{{$product->name}}</td>
                      <td>{{$product->id}}</td>
                      <td>{{$product->category->name}}</td>
                      <td>{{$product->pivot->qty}}</td>
                      <td class="text-right">Rp. {{$product->price}}</td>
                      <td class="text-right">
                        @if($product->promotion()->exists())
                          @if($product->promotion->start_date > Carbon\Carbon::now() && $product->promotion->end_date < Carbon\Carbon::now())
                          Rp. {{$product->promotion->nominal}}
                          @else
                          -
                          @endif
                        @else
                        -
                        @endif
                      </td>
                      @if($product->promotion()->exists())
                        @if($product->promotion->start_date > Carbon\Carbon::now() && $product->promotion->end_date < Carbon\Carbon::now())
                        <?php $subtotal -= $product->pivot->qty*$product->promotion->nominal ?>
                        <td class="text-right">Rp. {{$product->pivot->qty*$product->price - $product->pivot->qty*$product->promotion->nominal}}</td>
                        @else
                        <td class="text-right">Rp. {{$product->pivot->qty*$product->price}}</td>
                        @endif
                      @else
                      <td class="text-right">Rp. {{$product->pivot->qty*$product->price}}</td>
                      @endif

                    </tr>
                    @endforeach
                    <tr>
                      <td colspan="5"></td>
                      <th class="text-right">Subtotal:</th>
                      <td class="text-right">Rp. {{$subtotal}}</td>
                    </tr>
                    <tr>
                      <td colspan="5"></td>
                      <th class="text-right">Shipping:</th>
                      <td class="text-right">Rp. {{$order->shippingCost->price}}</td>
                    </tr>
                    @if($order->coupon()->exists())
                    <tr>
                      <td colspan="5"></td>
                      <th class="text-right">Discount Coupon</th>
                      <td class="text-right">Rp. {{$order->coupon->nominal}}</td>
                    </tr>
                    <?php
                      $subtotal -= $order->coupon->nominal;
                    ?>
                    @endif
                    <tr>
                      <td colspan="5"></td>
                      <th class="text-right">Total:</th>
                      <td class="text-right">Rp. {{$subtotal+$order->shippingCost->price}}</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due {{$order->created_at->addDay(3)->format('d/m/Y')}}</p>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                @if($order->status == "Pending")
                  <a href="{{route('approveOrder', $order->id)}}" class="btn btn-default"><i class="fas fa-print"></i>Approve</a>
                  <a href="{{route('rejectOrder', $order->id)}}" class="btn btn-default"><i class="fas fa-print"></i>Reject</a>
                @elseif($order->status == "Rejected")
                Status: Rejected
                @elseif($order->status == "Done")
                  <button onclick="window.print();return false;" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                @elseif($order->payment->status == "Approved")
                <form class="" action="{{route('sendDeliveryOrder', $order->deliveryOrder->id)}}" method="post">
                  @csrf
                  <input type="text" name="tracking_code" value="">
                  <button type="submit" class="btn btn-default"><i class="fas fa-print"></i>Send</button>
                </form>
                  <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#paymentView"><i class="far fa-credit-card" ></i> View Payment</button>
                  <div class="modal fade" id="paymentView" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Payment</h4>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <img src="{{$order->payment->proof}}" class="img-fluid img-thumbnail" alt="">
                          </div>
                          <div class="row">
                            Account Number: {{$order->payment->bank_account}}
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                @elseif($order->status == "Approved")
                  <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#paymentView"><i class="far fa-credit-card"></i> View Payment</button>
                  <a href="{{route('rejectOrder', $order->id)}}" class="btn btn-default"><i class="fas fa-print"></i>Reject</a>

                  <div class="modal fade" id="paymentView" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Payment</h4>
                        </div>
                        <div class="modal-body">
                          @if(empty($order->payment->proof))
                            Not payed Yet
                          @else
                          <div class="row">
                            <img src="{{$order->payment->proof}}" class="img-fluid img-thumbnail" alt="">
                          </div>
                          <div class="row">
                            Account Number: {{$order->payment->bank_account}}
                          </div>
                          <div class="row">
                            <a href="{{route('approvePayment', $order->payment->id)}}" class="btn btn-default"><i class="fas fa-print"></i>Approve</a>
                            <a href="{{route('rejectPayment', $order->payment->id)}}" class="btn btn-default"><i class="fas fa-print"></i>Reject</a>
                          </div>
                          @endif
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                    </div>
                  </div>
                @endif
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <a href="{!! route('orders.index') !!}" class="btn btn-default no-print">Back</a>
    </section>
@endsection
