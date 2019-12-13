@extends('front.layouts.app')
<!-- MAIN -->
@section('content')
<!-- MAIN -->

<main class="site-main site-login">

        <div class="container">

            <ol class="breadcrumb-page">

                <li><a href="#">Home </a></li>

                <li class="active"><a href="#">Login</a></li>

            </ol>

        </div>

        <div class="customer-login">

            <div class="container">

                <div class="row">

                    <div class="col-sm-6">

                        <h5 class="title-login">Log in to your account</h5>

                        <p class="p-title-login">Wellcome to your account.</p>

                        <form class="login" method="post" action="{{route("cutomerLogin")}}">
                            @csrf
                            <p class="form-row form-row-wide">

                                <label>Username or Email Address:<span class="required"></span></label>

                                <input type="text" value="" name="user_name" placeholder="Type your username or email address" class="input-text">

                            </p>

                            <p class="form-row form-row-wide">

                                <label>Password:<span class="required"></span></label>

                                <input type="password" name="password" placeholder="************" class="input-text">

                            </p>

                            <ul class="inline-block">

                                <li><label class="inline" ><input type="checkbox"><span class="input"></span>Remember me</label></li>

                            </ul>

                            <a href="" class="forgot-password">Forgotten password?</a>


                            <p class="form-row">

                                <input type="submit" value="Login" name="Login" class="button-submit">

                            </p>

                        </form>

                    </div>

                    <div class="col-sm-6 border-after">

                        <h5 class="title-login">Create an account</h5>

                        <p class="p-title-login">Personal infomation</p>

                        <form class="register" method="post" action="{{route("cutomerRegister")}}">
                            @csrf
                            <div class="row">
                              <p class="form-row form-row-wide col-md-6">

                                  <label>Full Name<span class="required"></span></label>

                                  <input type="text" value="" name="full_name" placeholder="Full Name" class="input-text">

                              </p>

                              <p class="form-row form-row-wide col-md-6">

                                  <label>Username<span class="required">*</span></label>

                                  <input type="text" name="user_name" placeholder="Username" class="input-text">

                              </p>

                              <p class="form-row form-row-wide col-md-6">

                                  <label>Gender</label>
                                  <select class="select" name="gender">
                                      <option value="male">Male</option>
                                      <option value="female">Female</option>
                                  </select>

                              </p>

                              <p class="form-row form-row-wide col-md-6">

                                  <label>Email Address<span class="required">*</span></label>

                                  <input type="email" name="email" placeholder="Email address" class="input-text">

                              </p>

                              <p class="form-row form-row-wide col-md-6">

                                  <label>telephone<span class="required">*</span></label>

                                  <input type="tel" name="telephone" placeholder="" class="input-text">

                              </p>

                            </div>

                            <h5 class="title-login title-login-bottom">Login Information</h5>

                            <p class="form-row form-row-wide col-md-6 padding-left">

                                <label>Password:<span class="required"></span></label>

                                <input type="password" name="password" class="input-text">

                            </p>

                            <p class="form-row form-row-wide col-md-6 padding-right">

                                <label>Confirm Password<span class="required">*</span></label>

                                <input type="password" name="password_confirmation" class="input-text">

                            </p>


                            <p class="form-row">

                                <input type="submit" value="Submit" name="Submit" class="button-submit">

                            </p>

                        </form>

                    </div>

                </div>

            </div>

        </div>

</main><!-- end MAIN -->
@endsection
