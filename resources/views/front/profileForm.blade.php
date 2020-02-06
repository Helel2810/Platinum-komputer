
@extends('front.layouts.app')
@section('content')
<!-- MAIN -->
  <main class="site-main">
      <div class="site-main-content">

        <div class="container">

          <div class="row">

            @include('front.layouts.profileSideBar')

            <div class="col-sm-9 border-before">

                      <h5 class="title-login">Personal Account</h5>

                      <form class="register" method="post" action="{{route("frontProfileEdit")}}">
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
