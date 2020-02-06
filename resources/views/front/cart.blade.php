@extends('front.layouts.app')

@section('content')
  @php
    $cart = Cart::getContent();
  @endphp
  <!-- MAIN -->
  <main class="site-main shopping-cart">
      <div class="container">
          <ol class="breadcrumb-page">
              <li><a href="#">Home </a></li>
              <li class="active"><a href="#">Shopping Cart</a></li>
          </ol>
      </div>
      <div class="container">
          <div class="row">
              <div class="col-md-9">
                  <form class="form-cart">
                      <div class="table-cart">
                          <table class="table">
                              <thead>
                              <tr>
                                  <th class="tb-image"></th>
                                  <th class="tb-product">Product Name</th>
                                  <th class="tb-price">Unit Price</th>
                                  <th class="tb-qty">Qty</th>
                                  <th class="tb-total">SubTotal</th>
                                  <th class="tb-remove"></th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($cart as $item)
                              <tr>
                                  <td class="tb-image"><a href="" class="item-photo"><img src="{{$item->attributes['image']}}"alt="cart"></a>
                                  <td class="tb-product">
                                      <div class="product-name"><a href="">{{$item->name}}</a></div>
                                  </td>
                                  <td class="tb-price">
                                      <span class="price">Rp. {{$item->price}}</span>
                                  </td>
                                  <td class="tb-qty">
                                      <div class="quantity">
                                          <div class="buttons-added">
                                              <input type="text" value="{{$item->quantity}}" title="Qty" class="input-text qty text"
                                                     size="1">
                                              <a href="#" class="sign plus"><i class="fa fa-plus"></i></a>
                                              <a href="#" class="sign minus"><i class="fa fa-minus"></i></a>
                                          </div>
                                      </div>
                                  </td>
                                  <td class="tb-total">
                                      <span class="price">Rp. {{$item->getPriceSum()}}</span>
                                  </td>
                                  <td class="tb-remove">
                                      <a href="" class="action-remove"><span><i class="fa fa-times"
                                                                                aria-hidden="true"></i></span></a>
                                  </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div>
                      <div class="cart-actions">
                          <button type="button" onclick="location.href='{{route('front')}}';" class="btn-continue">
                              <span>Continue Shopping</span>
                          </button>
                          <button type="submit" class="btn-clean">
                              <span>Update Shopping Cart</span>
                          </button>
                          <button type="button" onclick="location.href='{{route('clearCart')}}';" class="btn-update">
                              <span>Clear Shopping Cart</span>
                          </button>
                      </div>
                  </form>
              </div>
              <div class="col-md-3">
                  <div class="order-summary">
                      <h4 class="title-shopping-cart">Order Summary</h4>
                      <div class="checkout-element-content">
                          <span class="order-left">Subtotal:<span>Rp. {{Cart::getTotal()}}</span></span>
                          <span class="order-left">Shipping:<span>Free Shipping</span></span>
                          <span class="order-left">Total:<span>Rp. {{Cart::getTotal()}}</span></span>
                          <ul>
                              <li><label class="inline"><input type="checkbox"><span class="input"></span>I have promo
                                  code</label></li>
                          </ul>
                          <button type="submit" class="btn-checkout">
                              Check Out
                          </button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </main>
  <!-- end MAIN -->
@endsection
