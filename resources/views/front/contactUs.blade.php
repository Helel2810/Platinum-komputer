@extends('front.layouts.app')
<!-- MAIN -->
@section('content')
<main class="site-main contact-us">

        <div class="container">

            <ol class="breadcrumb-page">

                <li><a href="#">Home </a></li>

                <li class="active"><a href="#">Contact Us</a></li>

            </ol>

        </div>

        <div class="container">

            <div class="row">

                <div class="contact-map full-width">

                    <a href=""><img src="{{asset('images/map.jpg')}}" alt="map"></a>

                </div>

                <form class="form-contact" action="#">

                    <div class="col-md-5">

                        <div class="contact-info">

                            <h5 class="title-contact">Leave a Message</h5>

                            <p class="form-row form-row-wide">

                                <label>Name<span class="required">*</span></label>

                                <input type="text" value="" name="text" placeholder="Fist name" class="input-text">

                            </p>

                            <p class="form-row form-row-wide">

                                <label>Email<span class="required">*</span></label>

                                <input type="email" value="" name="text" placeholder="Fist name" class="input-text">

                            </p>

                            <p class="form-row form-row-wide">

                                <label>Number Phone<span class="required"></span></label>

                                <input type="text" value="" name="text" placeholder="Fist name" class="input-text">

                            </p>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <p class="form-row form-row-wide form-text">

                            <label>Comment<span class="required"></span></label>

                            <textarea aria-invalid="false" class="textarea-control" rows="5" cols="40" name="message"></textarea>

                        </p>

                        <p class="form-row">

                            <input type="submit" value="Submit" name="Submit" class="button-submit">

                        </p>

                    </div>

                </form>

                <div class="col-md-3 contact-detail">

                    <h5 class="title-contact">Contact Detail</h5>

                    <div class="contacts-info ">
                        <div class="contact-icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                        <h4 class="title-info">Email</h4>
                        <div class="info-detail"> Support@Gravity.com</div>
                    </div>
                    <div class="contacts-info ">
                        <div class="contact-icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                        <h4 class="title-info">Phone</h4>
                        <div class="info-detail">(+62) 8190 8340 874</div>
                    </div>
                    <div class="contacts-info ">
                        <div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                        <h4 class="title-info">Mail Office</h4>
                        <div class="info-detail">Jl. Bawal Raya No. 6, Jakarta</div>
                    </div>

                </div>

            </div>

        </div>

</main><!-- end MAIN -->
@endsection
