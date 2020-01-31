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

                              <span class="title-menu">All Departments</span>

                          </h4>

                          <div class="vertical-menu-content" >
                              <span class="btn-close hidden-md"><i class="fa fa-times" aria-hidden="true"></i></span>

                              <ul class="vertical-menu-list">

                                  <li><a href="">Profile</a></li>

                                  <li><a href="">Change Password</a></li>

                                  <li><a href="">Address</a></li>

                                  <li><a href="">Orders</a></li>

                              </ul>

                          </div>

                      </div>

                  </div>
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
                  <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->created_at->format('d/m/Y')}}</td>
                    <td>Rp. 500000</td>
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
