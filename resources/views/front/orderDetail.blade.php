@extends('front.layouts.app')
@section('content')
<!-- MAIN -->
  <main class="site-main">

      <div class="site-main-content">

        <div class="container">

          <div class="row">

             <div class="col-md-3 col-sm-4 site-main-sidebar">

                      <div id="box-vertical-megamenus" class="box-vertical-megamenus style2">

                          <h4 class="title active">

                              <span class="btn-open-mobile home-page">

                                  <span></span>

                                  <span></span>

                                  <span></span>

                              </span>

                              <span class="title-menu">Profile</span>

                          </h4>

                          <div class="vertical-menu-content" >
                              <span class="btn-close hidden-md"><i class="fa fa-times" aria-hidden="true"></i></span>

                              <ul class="vertical-menu-list">

                                  <li><a href="">Profile</a></li>

                                  <li><a href="">Change Password</a></li>

                                  <li><a href="">Orders</a></li>

                              </ul>

                          </div>

                      </div>

                  </div>

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
                  											<span class="small">order #1</span></h2>
                  										</div>
                  									</div>
                                    <div class="row">
                                      <div class="col-xs-12">
                                        <h3>Order Status: {{$order->status}}</h3>
                                        @if($order->payment->status == "Approved")
                                          Delivery Status: {{$order->deliveryOrder->status}}
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
                                          @foreach($order->products as $key => $product)
                  												<tr>
                  													<td>{{$key+1}}</td>
                  													<td class="text-center"><strong>{{$product->name}}</strong></td>
                  													<td class="text-center">{{$product->pivot->qty}}</td>
                  													<td class="text-right">Rp. {{$product->price}}</td>
                  													<td class="text-right">Rp. {{$product->pivot->qty*$product->price}}</td>
                  												</tr>
                                          @endforeach
                  												<tr>
                  													<td colspan="3"></td>
                  													<td class="text-right"><strong>Shipping</strong></td>
                  													<td class="text-right"><strong>N/A</strong></td>
                  												</tr>
                  												<tr>
                  													<td colspan="3">
                  													</td><td class="text-right"><strong>Total</strong></td>
                  													<td class="text-right"><strong>Rp. 7650000</strong></td>
                  												</tr>
                  											</tbody>
                  										</table>
                  									</div>
                  								</div>
                                  @if($order->payment->status != "Approved")
                  								<div class="row">
                  									<div class="col-md-12 float-right">
                                      <button class="btn btn-primary float-right" type="button" data-toggle="modal" data-target="#myModal">pay</button>
                  									</div>
                  								</div>
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

      <div class="modal fade" id="myModal" role="dialog">
        <form method="post" enctype="multipart/form-data" action="{{route('postPaymentProof', $order->payment->id)}}">
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


  </main><!-- end MAIN -->
@endsection
