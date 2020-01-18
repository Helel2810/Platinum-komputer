<!DOCTYPE html>
@php
  $categories = App\Models\Category::all();
  $brands = App\Models\Brand::all();
  $cart = Cart::getContent();
@endphp
<html lang="en">

<head>

   <meta name="viewport" content="width=device-width, initial-scale=1">

   <meta charset="UTF-8">

   <title>Platinum</title>

   <link rel="shortcut icon" type="image/x-icon" href="{{asset("images/favicon.png")}}"/>

   <link rel="stylesheet" type="text/css" href="{{asset("css/animate.css")}}">

   <link rel="stylesheet" type="text/css" href="{{asset("css/bootstrap.min.css")}}">

   <link rel="stylesheet" type="text/css" href="{{asset("css/font-awesome.css")}}">

   <link rel="stylesheet" type="text/css" href="{{asset("css/pe-icon-7-stroke.css")}}">

   <link rel="stylesheet" type="text/css" href="{{asset("css/owl.carousel.css")}}">

   <link rel="stylesheet" type="text/css" href="{{asset("css/chosen.css")}}">

   <link rel="stylesheet" type="text/css" href="{{asset("css/jquery.bxslider.css")}}">

   <link rel="stylesheet" type="text/css" href="{{asset("css/style.css")}}">

   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,600i,700,700i" rel="stylesheet">

   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700" rel="stylesheet">

</head>

<body class="index-opt-5">



   <div class="wrapper">

       <form id="block-search-mobile" method="get" class="block-search-mobile">
           <div class="form-content">
               <div class="control">
                   <a href="#" class="close-block-serach"><span class="icon fa fa-times"></span></a>
                   <input type="text" name="search" placeholder="Search" class="input-subscribe">
                   <button type="submit" class="btn search">
                       <span><i class="fa fa-search" aria-hidden="true"></i></span>
                   </button>
               </div>
           </div>
       </form>

       <!-- HEADER -->

       <header class="site-header header-opt-1">



           <!-- header-top -->

           <div class="header-top">

               <div class="container">



                   <!-- hotline -->

                   <ul class="nav-top-left" >

                       <li><a href="">Welcome to Platinum</a></li>

                   </ul><!-- hotline -->



                   <!-- heder links -->

                   <ul class="nav-top-right tyrion-nav">

                       <li ><a href="">Newsletter</a></li>

                       <li class="menu-item-has-children">
                           <a href="" class="dropdown-toggle">
                               <img src="{{asset("images/general/l1.jpg")}}" alt="flag">English<i class="fa fa-angle-down" aria-hidden="true"></i>
                           </a>

                           <ul class="submenu parent-megamenu">

                               <li class="switcher-option">

                                   <a href="" class="flag"><img src="{{asset("images/general/l1.jpg")}}" alt="flag">English</a>

                               </li>

                           </ul>

                       </li>

                       <li class="menu-item-has-children">

                           <a href="#" class="dropdown-toggle">

                               <span>Rupiah (IDR)</span><i class="fa fa-angle-down" aria-hidden="true"></i>

                           </a>

                           <ul class="submenu parent-megamenu">

                               <li class="switcher-option">

                                   <a href="" class="switcher-flag icon">Rupiah (IDR)</a>

                               </li>

                           </ul>

                       </li>

                       @if(Auth::check())
                       <li><a href="{{route('cutomerLogout')}}"><i class="fa fa-user" aria-hidden="true">welcome, {{Auth::user()->user_name}}</i></a></li>
                       @else
                        <li><a href="{{route('cutomerLogin')}}"><i class="fa fa-user" aria-hidden="true"></i>Register / Sign in</a></li>
                       @endif

                   </ul><!-- heder links -->



               </div>

           </div> <!-- header-top -->



           <!-- header-content -->

           <div class="header-content">

               <div class="container">

                   <div class="row">

                       <div class="col-md-2 nav-left">

                           <!-- logo -->

                           <strong class="logo">

                               <a href=""><img src="{{asset("images/logo.jpg")}}" alt="logo"></a>

                           </strong><!-- logo -->

                       </div>

                       <div class="col-md-8 nav-mind">



                           <!-- block search -->

                           <div class="block-search">

                               <div class="block-content">

                                   <div class="categori-search  ">

                                       <select data-placeholder="All Categories" class="chosen-select categori-search-option">
                                           <option value="">All Categories</option>

                                       </select>

                                   </div>

                                   <div class="form-search">

                                       <form>

                                           <div class="box-group">

                                               <input type="text" class="form-control" placeholder="Searh entire store here...">

                                               <button class="btn btn-search" type="button"><span>search</span></button>

                                           </div>

                                       </form>

                                   </div>

                               </div>

                           </div><!-- block search -->

                       </div>

                       <div class="col-md-2 nav-right">

                           <!-- block mini cart -->
                           <span data-action="toggle-nav" class="menu-on-mobile hidden-md style2">

                               <span class="btn-open-mobile home-page">

                                   <span></span>

                                   <span></span>

                                   <span></span>

                               </span>

                               <span class="title-menu-mobile">Main menu</span>

                           </span>

                           <div class="block-minicart dropdown style2">



                               <a class="minicart" href="#">

                                   <span class="counter qty">

                                       <span class="cart-icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i></span>

                                       <span class="counter-number">{{$cart->count()}}</span>

                                   </span>

                                   <span class="counter-your-cart">

                                       <span class="counter-label">Your Cart:</span>

                                       <span class="counter-price">Rp. {{Cart::getTotal()}}</span>

                                   </span>

                               </a>

                               <div class="parent-megamenu">

                                   <form>

                                       <div class="minicart-content-wrapper" >

                                           <div class="subtitle">

                                               You have <span>{{$cart->count()}}</span> item(s) in your cart

                                           </div>

                                           <div class="minicart-items-wrapper">

                                               <ol class="minicart-items">
                                                  @foreach($cart as $item)
                                                   <li class="product-inner">

                                                       <div class="product-thumb style1">

                                                           <div class="thumb-inner">

                                                               <a href=""><img src="{{$item->attributes['image']}}" alt="c1"></a>

                                                           </div>

                                                       </div>

                                                       <div class="product-innfo">

                                                           <div class="product-name"><a href="">{{$item->name}}</a></div>

                                                           <a href="#" class="remove"><i class="fa fa-times" aria-hidden="true"></i></a>

                                                           <span class="price price-dark">

                                                               <ins>Rp. {{$item->price}}</ins>

                                                           </span>

                                                       </div>

                                                   </li>
                                                  @endforeach
                                               </ol>

                                           </div>

                                           <div class="subtotal">

                                               <span class="label">Total :</span>

                                               <span class="price">Rp. {{Cart::getTotal()}}</span>

                                           </div>

                                           <div class="actions">

                                               <a class="btn btn-viewcart" href="{{route('cart')}}">View cart</a>

                                               <a class="btn btn-checkout" href="">Checkout</a>

                                           </div>

                                       </div>

                                   </form>

                               </div>

                           </div><!-- block mini cart -->

                           <a href="" class="hidden-md search-hidden"><span class="pe-7s-search"></span></a>

                           <a class="wishlist-minicart" href=""><i class="fa fa-heart-o" aria-hidden="true"></i></a>



                       </div>

                   </div>

               </div>

           </div><!-- header-content -->

           <!-- header-menu-bar -->

           <div class="header-menu-bar header-menu-opt-5 header-sticky">

               <div class="header-menu-nav menu-style-3">

                   <div class="container">

                       <div class="header-menu-nav-inner header-menu-resize">

                           <div class="header-menu ">

                               <ul class="header-nav tyrion-nav">
                                   <li class="btn-close hidden-md"><i class="fa fa-times" aria-hidden="true"></i></li>

                                   <li>

                                       <a href="{{route('front')}}" class="dropdown-toggle">Home</a>

                                       <span class="toggle-submenu hidden-md"></span>

                                   </li>

                                   <li class="menu-item-has-children arrow">

                                       <a href="#" class="dropdown-toggle">Categories</a>

                                       <span class="toggle-submenu hidden-md"></span>

                                       <ul class="submenu parent-megamenu">
                                         <li class="menu-item">
                                             <a href="{{route('categoryProducts')}}">All Products</a>
                                         </li>
                                         @foreach($categories as $category)
                                           <li class="menu-item">
                                               <a href="{{route('categoryProducts', ['category_id' => $category->id])}}">{{$category->name}}</a>
                                           </li>
                                         @endforeach
                                       </ul>

                                   </li>

                                   <li class="menu-item-has-children arrow">

                                       <a href="#" class="dropdown-toggle">Brands</a>
                                       <ul class="submenu parent-megamenu">
                                         <li class="menu-item">
                                             <a href="{{route('categoryProducts')}}">All Products</a>
                                         </li>
                                         @foreach($brands as $brand)
                                           <li class="menu-item">
                                               <a href="{{route('categoryProducts', ['brand_id' => $brand->id])}}">{{$brand->name}}</a>
                                           </li>
                                         @endforeach
                                       </ul>

                                       <span class="toggle-submenu hidden-md"></span>


                                   </li>

                                   <li class="menu-item-has-children arrow">

                                       <a href="#" class="dropdown-toggle">Sub Menu</a>

                                       <span class="toggle-submenu hidden-md"></span>

                                       <ul class="submenu parent-megamenu">
                                           <li class="menu-item">
                                               <a href="checkout.html">Checkout</a>
                                           </li>
                                           <li class="menu-item">
                                               <a href="shopping-cart.html">Shopping Cart</a>
                                           </li>
                                           <li class="menu-item">
                                               <a href="contact-us.html">Contact Us</a>
                                           </li>
                                           <li class="menu-item">
                                               <a href="login.html">Login</a>
                                           </li>
                                       </ul>

                                   </li>

                                   <li>

                                       <a href="contact-us.html" class="dropdown-toggle">Contact Us</a>

                                       <span class="toggle-submenu hidden-md"></span>

                                   </li>

                                   <li>

                                       <a href="{{route('getOrders')}}" class="dropdown-toggle">Profile</a>

                                       <span class="toggle-submenu hidden-md"></span>

                                   </li>


                                   <li>

                                       <a href="{{route('frontNews')}}" class="dropdown-toggle">News</a>

                                       <span class="toggle-submenu hidden-md"></span>

                                   </li>

                               </ul>

                           </div>

                           <a href="" class="title-template transport hidden-sm"><i class="fa fa-truck" aria-hidden="true"></i>Free Shipping on orders $99</a>

                       </div>

                   </div>

               </div>

           </div>

       </header><!-- end HEADER -->

       @yield('content')

       <!-- FOOTER -->

       <footer class="site-footer footer-opt-3 full-width">



               <div class="footer-column">

                   <div class="container">

                       <div class="row">

                         <div class="col-md-3 col-sm-6">

                               <div class="links">

                               <h3 class="title-of-section">My account</h3>

                               <ul>

                                   <li><a href="">Sign In</a></li>

                                   <li><a href="">View Cart</a></li>

                                   <li><a href="">My Wishlist</a></li>

                                   <li><a href="">Track My Order</a></li>

                                   <li><a href="">Help</a></li>

                               </ul>

                               </div>

                           </div>

                           <div class="col-md-3 col-sm-6">

                               <h3 class="title-of-section">Contact information</h3>

                               <div class="contacts">

                                   <h3 class="contacts-title">Address</h3>

                                   <span class="contacts-info">Jl. Bawal Raya No. 6</span>

                                   <h3 class="contacts-title">Phone</h3>

                                   <span class="contacts-info">(+62) 8190 8340 874</span>

                                   <h3 class="contacts-title">Email</h3>

                                   <span class="contacts-info">Support@Gravity.com</span>

                               </div>

                           </div>

                           <div class="col-md-2 col-sm-6">

                               <div class="links">

                               <h3 class="title-of-section">Information</h3>

                               <ul>

                                   <li><a href="">Delivery information</a></li>

                                   <li><a href="">Privacy Policy</a></li>

                                   <li><a href="">Terms & Conditions</a></li>

                                   <li><a href="">Contact us</a></li>

                                   <li><a href="">Sitemap</a></li>

                               </ul>

                               </div>

                           </div>

                           <div class="col-md-4 col-sm-6">

                               <div class="links">

                               <h3 class="title-of-section">Newsletter</h3>

                               <span class="title-newsletter-footer">Get all the latest information on Events,<br>Sales and Offers. Sign up for newsletter today.</span>


                               <div class="newsletter-form">

                                   <form id="newsletter-validate-detail" class="form subscribe">

                                       <div class="control">

                                           <input type="email" id="newsletter" name="email" class="input-subscribe" placeholder="Enter Your email Address">

                                           <button type="submit" title="Subscribe" class="btn subscribe">

                                               <span>Subscribe</span>

                                           </button>

                                       </div>

                                   </form>

                               </div>

                               </div>

                           </div>

                       </div>

                   </div>

               </div>



               <div class="footer-bottom">



               </div>

               <div class="copyright full-width">

                    <div class="container">

                        <div class="copyright-right">

                           © Copyright 2019<span> Tyrion</span>. All Rights Reserved.

                       </div>

                       <div class="pay-men">

                           <a href=""><img src="{{asset("images/general/pay1.jpg")}}" alt="pay1"></a>

                           <a href=""><img src="{{asset("images/general/pay2.jpg")}}" alt="pay2"></a>

                           <a href=""><img src="{{asset("images/general/pay3.jpg")}}" alt="pay3"></a>

                           <a href=""><img src="{{asset("images/general/pay4.jpg")}}" alt="pay4"></a>

                       </div>

                    </div>

               </div>

   </footer><!-- end FOOTER -->



       <!--back-to-top  -->

       <!-- <a href="#" class="back-to-top">

           <i aria-hidden="true" class="fa fa-angle-up"></i>

       </a> -->



   </div>

   <a href="#" id="scrollup" title="Scroll to Top">Scroll</a>

   <!-- jQuery -->

   <script type="text/javascript" src="{{asset("js/jquery-2.1.4.min.js")}}"></script>

   <script type="text/javascript" src="{{asset("js/bootstrap.min.js")}}"></script>

   <script type="text/javascript" src="{{asset("js/jquery-ui.min.js")}}"></script>

   <script type="text/javascript" src="{{asset("js/owl.carousel.min.js")}}"></script>

   <script type="text/javascript" src="{{asset("js/wow.min.js")}}"></script>

   <script type="text/javascript" src="{{asset("js/jquery.actual.min.js")}}"></script>

   <script type="text/javascript" src="{{asset("js/chosen.jquery.min.js")}}"></script>

   <script type="text/javascript" src="{{asset("js/jquery.bxslider.min.js")}}"></script>

   <script type="text/javascript" src="{{asset("js/jquery.sticky.js")}}"></script>

   <script type="text/javascript" src="{{asset("js/jquery.elevateZoom.min.js")}}"></script>

   <script src="{{asset("js/fancybox/source/jquery.fancybox.pack.js")}}"></script>
   <script src="{{asset("js/fancybox/source/helpers/jquery.fancybox-media.js")}}"></script>
   <script src="{{asset("js/fancybox/source/helpers/jquery.fancybox-thumbs.js")}}"></script>

   <script type="text/javascript" src="{{asset("js/function.js")}}"></script>

   <script type="text/javascript" src="{{asset("js/Modernizr.js")}}"></script>

   <script type="text/javascript" src="{{asset("js/jquery.plugin.js")}}"></script>

   <script type="text/javascript" src="{{asset("js/jquery.countdown.js")}}"></script>

</body>

</html>
