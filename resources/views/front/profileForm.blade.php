
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
                  <div class="col-sm-9 border-before">

                      <h5 class="title-login">Personal Account</h5>

                      <form class="register" method="post" action="{{route("cutomerRegister")}}">
                          @csrf
                          <div class="row">
                            <p class="form-row form-row-wide col-md-6">

                                <label>Full Name<span class="required"></span></label>

                                <input type="text" value="{{$user->full_name}}" name="full_name" placeholder="Full Name" class="input-text">

                            </p>

                            <p class="form-row form-row-wide col-md-6">

                                <label>Username<span class="required">*</span></label>

                                <input type="text" name="user_name" value="{{$user->user_name}}" placeholder="Username" class="input-text">

                            </p>

                            <p class="form-row form-row-wide col-md-6">

                                <label>Email Address<span class="required">*</span></label>

                                <input type="email" name="email" value="{{$user->email}}" placeholder="Email address" class="input-text">

                            </p>

                            <p class="form-row form-row-wide col-md-6">

                                <label>telephone<span class="required">*</span></label>

                                <input type="tel" name="telephone" value="{{$user->telephone}}" placeholder="" class="input-text">

                            </p>

                          </div>

                          <p class="form-row">

                              <input type="submit" value="Submit" name="Submit" class="button-submit">

                          </p>

                          @if($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                          @endif


                      </form>

                  </div>

          </div>

          </div>


      </div>



  </main><!-- end MAIN -->
@endsection
