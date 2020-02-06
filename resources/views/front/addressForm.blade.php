@extends('front.layouts.app')

@section('content')
  <!-- MAIN -->
  <main class="site-main checkout">

          <div class="container">

              <ol class="breadcrumb-page">

                  <li><a href="#">Home </a></li>

                  <li><a href="#">profile </a></li>

                  <li class="active"><a href="#">Address</a></li>

              </ol>

          </div>

          <div class="container">

            <div class="row">
              @include('front.layouts.profileSideBar')

              <div class="col-sm-9 border-before">
                <form action="{{route('frontAddressAdd')}}" class="checkout" method="post" name="checkout">
                  @csrf

                    <h4 class="title-checkout">Address</h4>

                    <div class="row">

                        <div class="form-group col-md-6">

                            <label class="title">Recipient Name</label>

                            <input type="text" class="form-control" name="recipient_name" id="forFName" placeholder="Your name" >

                        </div>

                        <div class="form-group col-md-6">

                            <label class="title">Phone numbber*</label>

                            <input type="tel" class="form-control" name="phone" placeholder="08114566654">

                        </div>

                        <div class="form-group col-md-12">

                            <label class="title">Address:</label>

                            <input type="text" class="form-control" name="address" placeholder="Street at apartment number">

                        </div>

                        <div class="form-group col-md-12">

                        </div>

                        <div class="form-group col-md-6">

                            <label class="title">Province*</label>

                            <select class="form-control" name="" id="province_list" onchange="getCity()">
                              @foreach($provinces as $province)
                                <option value="{{$province->id}}">{{$province->name}}</option>
                              @endforeach
                            </select>

                        </div>

                        <div class="form-group col-md-6">

                            <label class="title">Town / City*</label>

                            <select class="form-control" name="" id="cities_list" onchange="getDistrict()">
                            </select>

                        </div>


                        <div class="form-group col-md-6">

                            <label class="title">District*</label>

                            <select class="form-control" name="district_id" id="districts_list">
                            </select>

                        </div>


                        <div class="form-group col-md-6">

                            <label class="title">Postcode / ZIP:</label>

                            <input type="text" name="post_code" class="form-control" placeholder="Your postal code">

                        </div>

                        <button type="submit" class="btn-order">Add Address</button>


                    </div>

                </form>
              </div>

            </div>



          </div>

  </main>
  <!-- end MAIN -->
@endsection
