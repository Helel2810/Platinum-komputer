@extends('front.layouts.app')
@section('content')
<!-- MAIN -->
  <main class="site-main">
      <div class="site-main-content">

        <div class="container">

          <div class="row">

            @include('front.layouts.profileSideBar')

            <div class="col-md-9 col-sm-8 table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Order Id</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Total Amount</th>
                    <th colspan="3">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                  <?php
                    $subtotal = 0;
                    foreach ($order->products as $key => $product)
                    {
                      $subtotal += $product->pivot->qty*$product->price;
                    }
                   ?>
                  <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->created_at->format('d/m/Y')}}</td>
                    <td>{{$subtotal+$order->ShippingCost->price}}</td>
                    <td>
                      <a href="{{route('getOrderDetail', $order->id)}}">view</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>

              </table>
            </div>


          </div>

          </div>


      </div>



  </main><!-- end MAIN -->
@endsection
