@extends('front.layouts.app')

@section('content')
  <!-- MAIN -->
  @php
    $categories = App\Models\Category::all();
    $brands = App\Models\Brand::all();
  @endphp


  <main class="site-main product-list">

      <div class="container">

          <ol class="breadcrumb-page">

              <li><a href="#">Home </a></li>

              <li class="active"><a href="#">List Category</a></li>

          </ol>

      </div>

      <div class="container">

          <div class="row">

              <div class="col-md-9 col-sm-8 float-none float-right">

                  <div class="main-content">

                    @foreach($brand_images as $brand_image)
                    <div class="promotion-banner style-3">

                        <a href="" class="banner-img"><img src="{{$brand_image}}" alt="banner-product"></a>

                    </div>
                    @endforeach

                      <div class="toolbar-products">

                          <h4 class="title-product">Products</h4>

                          <div class="toolbar-option">

                              <div class="toolbar-sort">



                              </div>

                              <div class="modes">


                              </div>

                          </div>

                      </div>

                      <div class="products products-list">
                          @foreach($products as $product)
                          <div class="product-items">

                              <div class="product-image">

                                  <a href="{{route('productDetail', $product->id)}}"><img src="{{$product->image1}}" alt="p1"></a>

                                  @if($product->promotion()->exists())
                                    @if($product->promotion->start_date < Carbon\Carbon::now() && $product->promotion->end_date > Carbon\Carbon::now())
                                    <span class="onsale">-{{ number_format(100 * $product->promotion->nominal/$product->price, 2, '.', '')}} %</span>
                                    @endif
                                  @endif

                              </div>

                              <div class="product-info">

                                  <div class="product-name"><a href="{{route('productDetail', $product->id)}}">{{$product->name}}</a></div>

                                  <div class="product-infomation">

                                    {!!$product->description!!}

                                  </div>

                              </div>

                              <div class="product-info-price">

                                  <div class="product-info-stock-sku">

                                      <div class="stock available">

                                          <span class="label-stock">Avability:</span> {{$product->stock}}

                                      </div>

                                  </div>

                                  <span class="price">

                                    @if($product->promotion()->exists())
                                      @if($product->promotion->start_date < Carbon\Carbon::now() && $product->promotion->end_date > Carbon\Carbon::now())
                                      <ins>Rp. {{$product->price-$product->promotion->nominal}}</ins>
                                      <del>Rp. {{$product->price}}</del>
                                      @else
                                      <ins>Rp. {{$product->price}}</ins>
                                    @endif
                                    @else
                                    <ins>Rp. {{$product->price}}</ins>
                                    @endif

                                  </span>

                                  <div class="single-add-to-cart">

                                      <form class="" action="{{route("addToCart")}}" method="post">
                                        @csrf
                                        <input type="hidden" value="1" name="qty" title="Qty" class="input-text qty text" size="1">
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <form class="" action="{{route("addToCart")}}" method="post">
                                          <input type="hidden" value="1" name="qty">
                                          @csrf
                                          <input type="hidden" name="id" value="{{$product->id}}">
                                          @if($product->stock > 0)
                                          <form class="" action="{{route("addToCart")}}" method="post">
                                            <input type="hidden" value="1" name="qty">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$product->id}}">
                                            <button href="" type="submit" class="btn-add-to-cart">Add to cart</button>
                                          </form>
                                          @else
                                            <button href="" type="submit" class="btn-add-to-cart" disabled>Add to cart</button>
                                          @endif
                                        </form>
                                      </form>

                                  </div>

                              </div>

                          </div>
                          @endforeach
                      </div>

<!--
                      <div class="pagination">

                          <ul class="nav-links">

                              <li class="active"><a href="">1</a></li>

                              <li><a href="">2</a></li>

                              <li><a href="">3</a></li>

                              <li class="back-next"><a href="">Next</a></li>

                          </ul>

                          <span class="show-resuilt">Showing 1-8 of 12 result</span>

                      </div>

                    -->

                  </div>

              </div>

              <div class="col-md-3 col-sm-4">

                    <div class="col-sidebar">

                        <div class="filter-options">
                          <form action="{{route('categoryProducts')}}">
                            <div class="block-title">Shop by</div>

                            <div class="block-content">

                                <div class="filter-options-item filter-categori">

                                    <div class="filter-options-title">Categories</div>

                                    <div class="filter-options-content">

                                        <ul>
                                            @foreach($categories as $category)
                                              <li><label class="inline" ><input type="checkbox" name="category_id[]" value="{{$category->id}}"><span class="input"></span>{{$category->name}}</label></li>
                                            @endforeach
                                        </ul>

                                    </div>

                                </div>

                                <div class="filter-options-item filter-brand">

                                    <div class="filter-options-title">Brands</div>

                                    <div class="filter-options-content">

                                        <ul>
                                            @foreach($brands as $brand)
                                              <li><label class="inline" ><input type="checkbox" name="brand_id[]" value="{{$brand->id}}"><span class="input"></span>{{$brand->name}}</label></li>
                                            @endforeach
                                        </ul>

                                    </div>

                                </div>

                            </div>
                            <button type="submit">Filter</button>
                          </form>
                        </div>

                        <div class="block-banner-sidebar">

                            <a href=""><img src="{{asset("images/product/banner-sidebar.jpg")}}" alt="banner-sidebar"></a>

                        </div>

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

                                                      <a href="{{route('productDetail', $product->id)}}"><img src="{{$product->image1}}" alt="p1"></a>

                                                  </div>

                                              </div>

                                              <div class="product-innfo">

                                                  <div class="product-name"><a href="{{route('productDetail', $product->id)}}">{{$product->name}}</a></div>

                                                  <span class="price">

                                                    @if($product->promotion()->exists())
                                                      @if($product->promotion->start_date < Carbon\Carbon::now() && $product->promotion->end_date > Carbon\Carbon::now())
                                                      <ins>Rp. {{$product->price-$product->promotion->nominal}}</ins>
                                                      <del>Rp. {{$product->price}}</del>
                                                      @else
                                                      <ins>Rp. {{$product->price}}</ins>
                                                      @endif
                                                    @else
                                                    <ins>Rp. {{$product->price}}</ins>
                                                    @endif


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
                    </div>
              </div>

          </div>

      </div>

      <div class="block-section-brand">
          <div class="container">
              <div class="section-brand style1">
                  <div class="owl-carousel nav-style3" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="2" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":4},"1000":{"items":6}}'>
                      <a href="" class="item-brand"><img src="{{asset("images/brand1.jpg")}}" alt="brand1"></a>
                      <a href="" class="item-brand"><img src="{{asset("images/brand1.jpg")}}" alt="brand1"></a>
                      <a href="" class="item-brand"><img src="{{asset("images/brand1.jpg")}}" alt="brand1"></a>
                      <a href="" class="item-brand"><img src="{{asset("images/brand1.jpg")}}" alt="brand1"></a>
                      <a href="" class="item-brand"><img src="{{asset("images/brand1.jpg")}}" alt="brand1"></a>
                      <a href="" class="item-brand"><img src="{{asset("images/brand1.jpg")}}" alt="brand1"></a>
                  </div>
              </div>
          </div>
      </div>

  </main>

  <!-- end MAIN -->
@endsection
