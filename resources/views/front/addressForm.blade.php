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

              <form action="#" class="checkout" method="post" name="checkout">

                  <h4 class="title-checkout">Address</h4>

                  <div class="row">

                      <div class="form-group col-md-6">

                          <label class="title">Recipient Name</label>

                          <input type="text" class="form-control" id="forFName" placeholder="Your name" >

                      </div>

                      <div class="form-group col-md-6">

                          <label class="title">Phone numbber*</label>

                          <input type="tel" class="form-control" placeholder="08114566654">

                      </div>

                      <div class="form-group col-md-12">

                          <label class="title">Address:</label>

                          <input type="text" class="form-control" placeholder="Street at apartment number">

                      </div>

                      <div class="form-group col-md-12">

                      </div>

                      <div class="form-group col-md-6">

                          <label class="title">Province*</label>

                          <select class="form-control" name="">
                            <option value="volvo">DKI JKT</option>
                            <option value="saab">Jawa Barat</option>
                          </select>

                      </div>

                      <div class="form-group col-md-6">

                          <label class="title">Town / City*</label>

                          <select class="form-control" name="">
                            <option value="volvo">Jakarta Utara</option>
                            <option value="saab">Bandung</option>
                          </select>

                      </div>


                      <div class="form-group col-md-6">

                          <label class="title">District*</label>

                          <select class="form-control" name="">
                            <option value="volvo">Sunter</option>
                            <option value="saab">Tj. Priok</option>
                          </select>

                      </div>


                      <div class="form-group col-md-6">

                          <label class="title">Postcode / ZIP:</label>

                          <input type="text" class="form-control" placeholder="Your postal code">

                      </div>

                      <button type="submit" class="btn-order">Add Address</button>


                  </div>

              </form>

          </div>

  </main>
  <!-- end MAIN -->
@endsection
