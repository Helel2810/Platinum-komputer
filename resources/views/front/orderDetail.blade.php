@extends('front.layouts.app')
@section('content')
<!-- MAIN -->
  <main class="site-main">

      <div class="site-main-content">

        <div class="container">

          <div class="row">

            @include('front.layouts.profileSideBar')


                  <div class="col-md-9 col-sm-8">
                  <div class="row">
                      				<!-- BEGIN INVOICE -->
                  					<div class="col-xs-12">
                  						<div class="grid invoice">
                  							<div class="grid-body">
                  								<div class="invoice-title">
                  									<br>
                  									<div class="row">
                  										<div class="col-xs-12">
                  											<h2>invoice<br>
                  											<span class="small">order Grv{{$order->id}}</span></h2>
                  										</div>
                  									</div>
                                    <div class="row">
                                      <div class="col-xs-12">
                                        <h3>Order Status: {{$order->status}}</h3>
                                        @if($order->status == "Approved")
                                          @if($order->payment->status == "Approved")
                                            Delivery Status: {{$order->deliveryOrder->status}} <br>
                                            Tracking Code: {{$order->deliveryOrder->tracking_code}}
                                          @endif
                                        @endif
                                      </div>
                                    </div>

                  								</div>
                  								<hr>
                  								<div class="row">
                  									<div class="col-xs-6">
                  										<address>
                  											<strong>Shipped To:</strong><br>
                  											{{$order->address->recipient_name}}<br>
                  											{{$order->address->address}},<br>
                  											{{$order->address->district->name}}, {{$order->address->district->city->name}}<br>
                  											<abbr title="Phone">P:</abbr> {{$order->address->phone}}
                  										</address>
                  									</div>
                  								</div>
                  								<div class="row">
                  									<div class="col-xs-6">
                  										<address>
                  											<strong>Email:</strong><br>
                  											{{$order->customer->email}}<br>
                  										</address>
                  									</div>
                  									<div class="col-xs-6 text-right">
                  										<address>
                  											<strong>Order Date:</strong><br>
                  											{{$order->created_at->format('d/m/Y')}}
                  										</address>
                  									</div>
                  								</div>
                  								<div class="row">
                  									<div class="col-md-12">
                  										<h3>ORDER SUMMARY</h3>
                  										<table class="table table-striped">
                  											<thead>
                  												<tr class="line">
                  													<td><strong>#</strong></td>
                  													<td class="text-center"><strong>Item</strong></td>
                  													<td class="text-center"><strong>QTY</strong></td>
                  													<td class="text-right"><strong>RATE</strong></td>
                  													<td class="text-right"><strong>SUBTOTAL</strong></td>
                  												</tr>
                  											</thead>
                  											<tbody>
                                          <?php $subtotal = 0; ?>
                                          @foreach($order->products as $key => $product)
                                          <?php $subtotal += $product->pivot->qty*$product->price ?>
                  												<tr>
                  													<td>{{$key+1}}</td>
                  													<td class="text-center"><strong>{{$product->name}}</strong></td>
                  													<td class="text-center">{{$product->pivot->qty}}</td>

                                            @if($product->promotion()->exists())
                                              @if($product->promotion->start_date > Carbon\Carbon::now() && $product->promotion->end_date < Carbon\Carbon::now())
                                              <td class="text-right">Rp. {{$product->price - $product->promotion->nominal}}</td>
                                              @else
                                              <td class="text-right">Rp. {{$product->price}}</td>
                                              @endif
                                            @else
                                            <td class="text-right">Rp. {{$product->price}}</td>
                                            @endif

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
                                          @if($order->coupon()->exists())
                                          <tr>
                                            <td colspan="3"></td>
                                            <td class="text-right"><strong>Coupon</strong></td>
                                            <td class="text-right">Rp. {{$order->coupon->nominal}}</td>
                                          </tr>
                                          <?php
                                            $subtotal -= $order->coupon->nominal;
                                          ?>
                                          @endif
                  												<tr>
                  													<td colspan="3"></td>
                  													<td class="text-right"><strong>Shipping</strong></td>
                  													<td class="text-right">Rp. {{$order->ShippingCost->price}}</td>
                  												</tr>
                  												<tr>
                  													<td colspan="3">
                  													</td><td class="text-right"><strong>Total</strong></td>
                  													<td class="text-right"><strong>Rp. {{$subtotal+$order->ShippingCost->price}}</strong></td>
                  												</tr>
                  											</tbody>
                  										</table>
                  									</div>
                  								</div>
                                  @if($order->status == "Approved")
                                    @if($order->payment->status != "Approved")
                                    <div class="row">
                                      <div class="col-md-12 float-right">
                                        <button class="btn btn-primary float-right" type="button" data-toggle="modal" data-target="#myModal">pay</button>
                                      </div>
                                    </div>

                                    <div class="modal fade" id="myModal" role="dialog">
                                      <form method="post" enctype="multipart/form-data" action="{{route('postPaymentProof', $order->id)}}">
                                        {{csrf_field()}}
                                        <div class="modal-dialog">
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Confirm Payment</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label for="sku">Account</label>
                                                      <input type="text" class="form-control" id="sku" name="bank_account" placeholder="Enter account">
                                                    </div>
                                                  </div>

                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label for="name">Account Owner</label>
                                                      <input type="text" class="form-control" id="name" name="bank" placeholder="Enter refrence">
                                                    </div>
                                                  </div>

                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label for="name">Image Proof</label>
                                                      <input type="file" class="form-control" name="image" id="files" /><br>
                                                    </div>
                                                  </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="submit" name="">Submit</button>
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                          </div>

                                        </div>
                                      </form>
                                      </div>
                                      @elseif($order->deliveryOrder()->exists())
                                        @if($order->deliveryOrder->status == "Shipped")
                                        <div class="row">
                                          <div class="col-md-12 float-right">
                                            <a class="btn btn-primary float-right" href="{{route('postConfirmReceive', $order->id)}}">Received</a>
                                          </div>
                                        </div>
                                        @endif
                                    @endif
                                  @endif
                  							</div>
                  						</div>
                  					</div>
                  					<!-- END INVOICE -->
                  				</div>
                  </div>

          </div>

          </div>

      </div>




  </main><!-- end MAIN -->
@endsection
