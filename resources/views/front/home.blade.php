@extends('front.layouts.app')
<!-- MAIN -->
@section('content')
<main class="site-main">

    <div class="block-slide">

      <div class="container">

          <div class="main-slide slide-opt-5">

              <div class="owl-carousel nav-style5" data-nav="true" data-autoplay="false" data-dots="true" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"600":{"items":1},"1000":{"items":1}}'>

                  <div class="item-slide item-slide-1">

                      <div class="container">

                      </div>

                  </div>

                  <div class="item-slide item-slide-2">

                      <div class="container">

                      </div>

                  </div>

                  <div class="item-slide item-slide-3">

                      <div class="container">

                      </div>

                  </div>

              </div>

          </div>

          <div class="promotion-banner banner-slide-2 style-4 hidden-sm hidden-xs">

              <a href="" class="banner-img"><img src="{{asset("images/home3/banner1.jpg")}}" alt="banner1"></a>

          </div>

          <div class="promotion-banner banner-slide-2 style-4 hidden-sm hidden-xs">

              <a href="" class="banner-img"><img src="{{asset("images/home3/banner2.jpg")}}" alt="banner2"></a>

          </div>

      </div>

    </div>

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



                    </div>

      <div class="col-xs-6 col-sm-12 padding-0">

                      <div class="promotion-banner item-1 style-3">

                    <a href="" class="banner-img"><img src="{{asset("images/home3/banner3.jpg")}}" alt="banner3"></a>

                </div>

            </div>

              <div class="col-xs-6 col-sm-12 padding-0">

                      <div class="promotion-banner item-2 style-3">

                    <a href="" class="banner-img"><img src="{{asset("images/home3/banner4.jpg")}}" alt="banner4"></a>

                </div>

            </div>

              <div class="block-latest-roducts">

                        <div class="block-title">Latest Products</div>

                        <div class="block-latest-roducts-content">

                            <div class="owl-carousel nav-style2" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"600":{"items":1},"1000":{"items":1}}'>
                              @foreach($latest_products->chunk(4) as $chunk)
                              <div class="owl-ones-row">
                                  @foreach($chunk as $product)
                                    <div class="product-item style1">

                                      <div class="product-inner">

                                          <div class="product-thumb">

                                              <div class="thumb-inner">

                                                  <a href=""><img src="{{$product->image1}}" alt="p1"></a>

                                              </div>

                                          </div>

                                          <div class="product-innfo">

                                              <div class="product-name"><a href="">{{$product->name}}</a></div>

                                              <span class="price">

                                                  <ins>Rp. {{$product->price}}</ins>

                                                  <del>Rp. {{$product->price+5}}</del>

                                              </span>

                                              <span class="star-rating">

                                                  <i class="fa fa-star" aria-hidden="true"></i>

                                                  <i class="fa fa-star" aria-hidden="true"></i>

                                                  <i class="fa fa-star" aria-hidden="true"></i>

                                                  <i class="fa fa-star" aria-hidden="true"></i>

                                                  <i class="fa fa-star" aria-hidden="true"></i>

                                                  <span class="review">5 Review(s)</span>

                                              </span>

                                          </div>

                                      </div>
                                  </div>
                                  @endforeach
                              </div>
                              @endforeach
                            </div>

                        </div>

                    </div>

                    <div class="block-the-blog">

                  <div class="title-of-section">From The Blog</div>

                  <div class="owl-carousel nav-style2" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":2},"768":{"items":1}}'>

                      @foreach($news as $one_news)
                        <div class="blog-item">

                          <div class="post-thumb">

                              <a href=""><img src="{{$one_news->image}}" alt="blog"></a>

                          </div>

                          <div class="post-item-info">

                              <h3 class="post-name"><a href="">{{$one_news->title}}</a></h3>

                              <div class="post-metas">

                                  <span class="author">Post by: <span>Admin</span></span>

                                  <span class="comment"><i class="fa fa-comment" aria-hidden="true"></i>36 Comments</span>

                              </div>
                                    <div>
                                        {{str_limit($one_news->content)}}
                                    </div>
                          </div>

                      </div>
                      @endforeach

                  </div>

            </div>

           </div>

           <div class="col-md-9 col-sm-8 padding-left-5 site-main-main">

            <div class="block-top-categori">

                  <div class="title-of-section">Hot Categories</div>

                  <div class="owl-carousel nav-style2" data-nav="true" data-autoplay="false" data-dots="true" data-loop="true" data-margin="20" data-responsive='{"0":{"items":1},"480":{"items":2},"640":{"items":3},"768":{"items":2},"992":{"items":4}}'>

                      <div class="block-top-categori-item">

                          <a href=""><img src="{{asset("images/home3/h1.jpg")}}" alt="h1"></a>

                          <div class="block-top-categori-title">Accessories</div>

                      </div>

                      <div class="block-top-categori-item">

                          <a href=""><img src="{{asset("images/home3/h2.jpg")}}" alt="h2"></a>

                          <div class="block-top-categori-title">Fashions Jacket</div>

                      </div>

                      <div class="block-top-categori-item">

                          <a href=""><img src="{{asset("images/home3/h3.jpg")}}" alt="h3"></a>

                          <div class="block-top-categori-title">Audio & Theater Sport</div>

                      </div>

                      <div class="block-top-categori-item">

                          <a href=""><img src="{{asset("images/home3/h4.jpg")}}" alt="h4"></a>

                          <div class="block-top-categori-title">Tablets</div>

                      </div>

                  </div>

            </div>

            <div class="block-up-to">

              <div class="up-to-content">Save up to 40%<span> all online store items.</span></div>

              <a href="grid-product.html" class="shop-all">Shop all deals Now</a>

            </div>

      <div class="block-daily-deals style2">

                  <div class="title-of-section">Daily deals</div>

                  <div class="product-count-down">

                            <div class="kt-countdown" data-y="2019" data-m="7" data-d="1" data-h="10" data-i="0" data-s="0"></div>

                        </div>

                  <div class="block-daily-deals-content">

                    <div class="owl-carousel nav-style2 equal-container" data-nav="true" data-autoplay="false" data-dots="true" data-loop="true" data-margin="1" data-responsive='{"0":{"items":1},"480":{"items":2},"992":{"items":2}}'>

                        <div class="deal-of-day equal-elem">

                            <div class="product-thumb style1">

                                <div class="thumb-inner">

                                    <a href=""><img src="{{asset("images/home3/d1.jpg")}}" alt="d1"></a>

                                </div>

                            </div>

                            <div class="product-innfo">

                                <div class="info-text">

                                  <div class="product-name"><a href="">Tablets Collection for Women New Style.</a></div>

                                  <span class="price">

                                      <ins>$229.00</ins>

                                      <del>$259.00</del>

                                      <span class="onsale">-50%</span>

                                  </span>

                                  <span class="star-rating">

                                      <i class="fa fa-star" aria-hidden="true"></i>

                                      <i class="fa fa-star" aria-hidden="true"></i>

                                      <i class="fa fa-star" aria-hidden="true"></i>

                                      <i class="fa fa-star" aria-hidden="true"></i>

                                      <i class="fa fa-star" aria-hidden="true"></i>

                                      <span class="review">5 Review(s)</span>

                                  </span>

                                </div>

                                <a href="" class="btn-add-to-cart">Add to cart</a>

                            </div>

                        </div>

                        <div class="deal-of-day equal-elem">

                            <div class="product-thumb style1">

                                <div class="thumb-inner">

                                    <a href=""><img src="{{asset("images/home3/d2.jpg")}}" alt="d2"></a>

                                </div>

                            </div>

                            <div class="product-innfo">

                                <div class="info-text">

                                  <div class="product-name"><a href="">Roshe Run Mesh Sneakers in Blue for Men</a></div>

                                  <span class="price">

                                      <ins>$229.00</ins>

                                      <del>$259.00</del>

                                      <span class="onsale">-50%</span>

                                  </span>

                                  <span class="star-rating">

                                      <i class="fa fa-star" aria-hidden="true"></i>

                                      <i class="fa fa-star" aria-hidden="true"></i>

                                      <i class="fa fa-star" aria-hidden="true"></i>

                                      <i class="fa fa-star" aria-hidden="true"></i>

                                      <i class="fa fa-star" aria-hidden="true"></i>

                                      <span class="review">5 Review(s)</span>

                                  </span>

                                </div>

                                <a href="" class="btn-add-to-cart">Add to cart</a>

                            </div>

                        </div>

                        <div class="deal-of-day equal-elem">

                            <div class="product-thumb style1">

                                <div class="thumb-inner">

                                    <a href=""><img src="{{asset("images/home3/d2.jpg")}}" alt="d2"></a>

                                </div>

                            </div>

                            <div class="product-innfo">

                                <div class="info-text">

                                  <div class="product-name"><a href="">Xbox One S Halo Collection Bundle (White)3D Series</a></div>

                                  <span class="price">

                                      <ins>$229.00</ins>

                                      <del>$259.00</del>

                                      <span class="onsale">-50%</span>

                                  </span>

                                  <span class="star-rating">

                                      <i class="fa fa-star" aria-hidden="true"></i>

                                      <i class="fa fa-star" aria-hidden="true"></i>

                                      <i class="fa fa-star" aria-hidden="true"></i>

                                      <i class="fa fa-star" aria-hidden="true"></i>

                                      <i class="fa fa-star" aria-hidden="true"></i>

                                      <span class="review">5 Review(s)</span>

                                  </span>

                                </div>

                                <a href="" class="btn-add-to-cart">Add to cart</a>

                            </div>

                        </div>

                    </div>

                  </div>

      </div>

      <div class="block-feature-product">

                  <div class="title-of-section">Featured Products</div>

                  <div class="tab-product tab-product-fade-effect">

                      <ul class="box-tabs nav-tab">

                          <li class="active"><a data-animated="" data-toggle="tab" href="#tab-1">All Products </a></li>

                          <li><a data-animated="fadeInLeft" data-toggle="tab" href="#tab-2">TV & Audio</a></li>

                          <li><a data-animated="fadeInDownBig" data-toggle="tab" href="#tab-1">Game & Consoles</a></li>

                      </ul>

                      <div class="tab-content">

                          <div class="tab-container">

                              <div id="tab-1" class="tab-panel active">

                                  <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"768":{"items":2},"992":{"items":3},"1200":{"items":4}}'>
                                    @foreach($featured_products->chunk(2) as $chunk)
                                    <div class="owl-one-row">
                                      @foreach($chunk as $product)
                                      <div class="product-item style1">
                                        <div class="product-inner equal-elem">

                                            <div class="product-thumb">

                                                <div class="thumb-inner">

                                                    <a href=""><img src="{{$product->image1}}" alt="f5"></a>

                                                </div>

                                                <span class="onsale">-50%</span>

                                                <a href="" class="quick-view">Quick View</a>

                                            </div>

                                            <div class="product-innfo">

                                                <div class="product-name"><a href="">{{$product->name}}</a></div>

                                                <span class="price price-dark">

                                                    <ins>Rp. {{$product->price}}</ins>

                                                    <del>Rp. {{$product->price+5}}</del>


                                                </span>

                                                <span class="star-rating">

                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                    <span class="review">5 Review(s)</span>

                                                </span>

                                                <div class="group-btn-hover">

                                                    <div class="inner">

                                                        <a href="" class="compare"><i class="flaticon-refresh-square-arrows"></i></a>

                                                        <a href="" class="add-to-cart">Add to cart</a>

                                                        <a href="" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                      </div>
                                      @endforeach
                                    </div>
                                    @endforeach
                                  </div>

                              </div>

                              <div id="tab-2" class="tab-panel">
                                <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"768":{"items":2},"992":{"items":3},"1200":{"items":4}}'>
                                  @foreach($featured_products->chunk(2) as $chunk)
                                  <div class="owl-one-row">
                                    @foreach($chunk as $product)
                                    <div class="product-item style1">
                                      <div class="product-inner equal-elem">

                                          <div class="product-thumb">

                                              <div class="thumb-inner">

                                                  <a href=""><img src="{{$product->image1}}" alt="f5"></a>

                                              </div>

                                              <span class="onsale">-50%</span>

                                              <a href="" class="quick-view">Quick View</a>

                                          </div>

                                          <div class="product-innfo">

                                              <div class="product-name"><a href="">{{$product->name}}</a></div>

                                              <span class="price price-dark">

                                                  <ins>Rp. {{$product->price}}</ins>

                                                  <del>Rp. {{$product->price+5}}</del>


                                              </span>

                                              <span class="star-rating">

                                                  <i class="fa fa-star" aria-hidden="true"></i>

                                                  <i class="fa fa-star" aria-hidden="true"></i>

                                                  <i class="fa fa-star" aria-hidden="true"></i>

                                                  <i class="fa fa-star" aria-hidden="true"></i>

                                                  <i class="fa fa-star" aria-hidden="true"></i>

                                                  <span class="review">5 Review(s)</span>

                                              </span>

                                              <div class="group-btn-hover">

                                                  <div class="inner">

                                                      <a href="" class="compare"><i class="flaticon-refresh-square-arrows"></i></a>

                                                      <a href="" class="add-to-cart">Add to cart</a>

                                                      <a href="" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>

                                                  </div>

                                              </div>

                                          </div>

                                      </div>
                                    </div>
                                    @endforeach
                                  </div>
                                  @endforeach
                                </div>
                              </div>

                          </div>

                      </div>

                  </div>

            </div>

            <div class="block-promotion-banner">

                  <div class="row">

                      <div class="col-md-6 col-sm-12 padding-right-10">

                          <div class="promotion-banner style-2">

                              <a href="" class="banner-img"><img src="{{asset("images/home3/banner5.jpg")}}" alt="banner5"></a>


                          </div>

                      </div>

                      <div class="col-md-6 col-sm-12 padding-left-10">

                          <div class="promotion-banner style-2">

                              <a href="" class="banner-img"><img src="{{asset("images/home3/banner6.jpg")}}" alt="banner6"></a>

                          </div>

                      </div>

                  </div>

            </div>

            <div class="block-bestseller-product bestseller-opt-5">

                  <div class="title-of-section style2">BestSeller Products</div>

                  <div class="owl-carousel nav-style2 equal-container" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="20" data-responsive='{"0":{"items":1},"480":{"items":2},"1000":{"items":2}}'>
                            @foreach($bestseller_products->chunk(2) as $chunk)
                              <div class="owl-one-row">
                                @foreach($chunk as $product)
                                  <div class="product-item style2">

                                    <div class="product-inner equal-elem">

                                        <div class="product-thumb style1">

                                            <div class="thumb-inner">

                                                <a href=""><img src="{{$product->image1}}" alt="b3"></a>

                                            </div>

                                        </div>

                                        <div class="product-innfo">

                                            <div class="product-name"><a href="">{{$product->name}}</a></div>

                                            <span class="price">

                                                <ins>Rp. {{$product->price}}</ins>

                                                <del>Rp. {{$product->price+5}}</del>

                                                <span class="onnew">new</span>

                                            </span>

                                            <span class="star-rating">

                                                <i class="fa fa-star" aria-hidden="true"></i>

                                                <i class="fa fa-star" aria-hidden="true"></i>

                                                <i class="fa fa-star" aria-hidden="true"></i>

                                                <i class="fa fa-star" aria-hidden="true"></i>

                                                <i class="fa fa-star" aria-hidden="true"></i>

                                                <span class="review">5 Review(s)</span>

                                            </span>

                                            <a href="" class="btn-add-to-cart">Add to cart</a>

                                        </div>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endforeach

                        </div>

            </div>

           </div>

        </div>

      </div>

    </div>

    <div class="block-brand style2">

        <div class="container">

            <div class="section-brand">

                <div class="owl-carousel nav-style3" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="20" data-responsive='{"0":{"items":2},"480":{"items":3},"600":{"items":4},"1000":{"items":5}}'>

                    <a href="" class="item-brand"><img src="{{asset("images/brand1.jpg")}}" alt="brand"></a>

                    <a href="" class="item-brand"><img src="{{asset("images/brand1.jpg")}}" alt="brand"></a>

                    <a href="" class="item-brand"><img src="{{asset("images/brand1.jpg")}}" alt="brand"></a>

                    <a href="" class="item-brand"><img src="{{asset("images/brand1.jpg")}}" alt="brand"></a>

                    <a href="" class="item-brand"><img src="{{asset("images/brand1.jpg")}}" alt="brand"></a>

                    <a href="" class="item-brand"><img src="{{asset("images/brand1.jpg")}}" alt="brand"></a>

                </div>

            </div>

        </div>

    </div>

</main><!-- end MAIN -->
@endsection
