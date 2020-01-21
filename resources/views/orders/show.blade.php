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
                    <i class="fas "></i> Platinum.
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
                    <strong>Platinum, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
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
                      <td class="text-right">Rp. {{$product->pivot->qty*$product->price}}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <td colspan="3"></td>
                      <th class="text-right">Subtotal:</th>
                      <td class="text-right">Rp. {{$subtotal}}</td>
                    </tr>
                    <tr>
                      <td colspan="3"></td>
                      <th class="text-right">Shipping:</th>
                      <td class="text-right">Rp. 10000</td>
                    </tr>
                    <tr>
                      <td colspan="3"></td>
                      <th class="text-right">Total:</th>
                      <td class="text-right">Rp. {{$subtotal+10000}}</td>
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
                @elseif($order->status == "Done")
                  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                @elseif($order->payment->status == "Approved")
                  <a href="{{route('sendDeliveryOrder', $order->deliveryOrder->id)}}" target="_blank" class="btn btn-default"><i class="fas fa-print"></i>Send</a>
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
