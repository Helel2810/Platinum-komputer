@extends('front.layouts.app')
<!-- MAIN -->
@section('content')
  @php
    $cart = Cart::getContent();
  @endphp

  <main class="site-main checkout">

          <div class="container">

              <ol class="breadcrumb-page">

                  <li><a href="#">Home </a></li>

                  <li class="active"><a href="#">checkout</a></li>

              </ol>

          </div>

          <div class="container">

              <form action="{{route('postCheckout')}}" class="checkout" method="post" name="checkout">
                  @csrf
                  <h4 class="title-checkout">Choose Address</h4>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <div class="form-group col-md-6">
                          @if(count(Auth::user()->addresses)>0)
                            @foreach(Auth::user()->addresses as $address)
                            <div class="radio">
                              <label><input type="radio" name="address" onclick="getShippingCost()" value="{{$address->id}}" checked>{{$address->address}}<br>{{$address->recipient_name}}<br>{{$address->phone}}</label>
                            </div>
                            @endforeach
                          @else
                          <a href="{{route('frontAddressForm')}}" class="button">Add new address</a>
                          @endif
                        </div>
                      </div>
                    </div>
                      <div class="form-group shipping col-md-6">

                          <h4 class="title-checkout">Shipping method</h4>
                          @foreach($shipmentMethods as $shipmentMethod)
                          <label><input type="radio" name="shipmentMethod" onclick="getShippingCost()" value="{{$shipmentMethod->id}}">{{$shipmentMethod->name}}</label>
                          @endforeach
                          <h4 class="discount">Discount Codes</h4>

                          <label class="title">Enter Your Coupon code:</label>

                          <input type="text" class="form-control">

                          <button type="submit" class="btn-apply">Apply</button>

                      </div>

                  </div>

                  <div class="row">
                    <div class="form-group payment col-md-6">

                        <span class="grand-total">Sub total<span id="subtotal">Rp. {{Cart::getTotal()}}</span></span> <br>
                        <span class="grand-total">Shipping<span id="shipping_cost">Rp. 0</span></span> <br>
                        <span class="grand-total">Grand Total<span id="total_cost">Rp. {{Cart::getTotal()}}</span></span>

                        <button type="submit" class="btn-order">Place Order Now</button>

                    </div>
                  </div>

              </form>

          </div>

  </main><!-- end MAIN -->
@endsection
