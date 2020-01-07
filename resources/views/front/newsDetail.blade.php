@extends('front.layouts.app')
<!-- MAIN -->
@section('content')
<main class="site-main blog-single">

        <div class="container">

            <ol class="breadcrumb-page">

                <li><a href="#">Home </a></li>

                <li class="active"><a href="#">Our blog</a></li>

            </ol>

        </div>

        <div class="container">

            <div class="row">

                <div class="col-md-9 col-sm-8 float-none float-right">

                    <div class="main-content">

                        <div class="post-detail">

                            <div class="post-item">

                                <div class="post-thumb">

                                    <a href=""><img src="{{$news->image}}" alt="post-image"></a>

                                    <span class="date">{{$news->created_at->day}}<span>{{$news->created_at->shortEnglishMonth}}</span></span>

                                </div>

                                <div class="post-item-info">

                                    <h3 class="post-name"><a href="">{{$news->title}}</a></h3>

                                    <div class="post-metas">

                                        <span class="author">Post by: <span>Admin</span></span>

                                        <span class="comment"><i class="fa fa-comment" aria-hidden="true"></i>3 Comments</span>

                                    </div>

                                    <div class="post-content">

                                      {!! $news->content !!}

                                    </div>

                                </div>

                            </div>

                            <div class="post-footer">

                                <div class="tag">

                                    <span>Tags:</span>

                                    <a href="">Best,</a>

                                    <a href="">Gaming,</a>

                                    <a href="">Laptop</a>

                                </div>

                                <div class="post-authur">

                                    <div class="avata"><a href=""><img src="{{asset('images/blog/avata-admin.jpg')}}" alt="avata-admin"></a></div>

                                    <div class="des">

                                        <strong>Admin</strong>

                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries...</p>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="post-comments">

                            <div class="block-title">Leave a Reply</div>

                            <p>Your email address will not be published. Required fields are marked *</p>

                            <div class="block-content">

                                <form>

                                    <div class="form-group col-md-6 padding-left">

                                        <label class="title">Name*</label>

                                        <input type="text" class="form-control" id="forName" >

                                    </div>

                                    <div class="form-group col-md-6 padding-right">

                                        <label class="title">Email*</label>

                                        <input type="email" class="form-control" id="forEmail" >

                                    </div>

                                    <div class="form-group">

                                        <label class="title">Website</label>

                                        <input type="text" class="form-control" id="forWebsite">

                                    </div>

                                    <div class="form-group">

                                        <label class="title">Comment</label>

                                        <textarea class="form-control" id="forContent" rows="9" ></textarea>

                                    </div>

                                    <button type="submit" class="btn-comment">Post Comment</button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-3 col-sm-4">

                    <div class="sidebar-left">

                        <div class="block-search-blog">

                            <form class="searchform">

                                <div class="control">

                                    <input type="text" placeholder="Enter Keywords..." name="text" class="input-subscribe">

                                    <button type="submit" class="btn-searchform"><i class="fa fa-search" aria-hidden="true"></i></button>

                                </div>

                            </form>

                        </div>

                        <div class="block-recent-post-blog">

                            <div class="block-title">Recent Post</div>

                            <ul>

                                <li class="recent-post-item"><a href="">Gallery Post with Supported Animation</a></li>

                                <li class="recent-post-item"><a href="">Announcement – Standard Post without Image</a></li>

                                <li class="recent-post-item"><a href="">We’re the best Designers from UK</a></li>

                                <li class="recent-post-item"><a href="">A Beautiful Day – Standard Post with Image</a></li>

                            </ul>

                        </div>

                        <div class="block-categories-blog">

                            <div class="block-title">Blog categories</div>

                            <ul>

                                <li class="categories-item"><a href="">All about Digital</a></li>

                                <li class="categories-item"><a href="">Smartphone & Tablet</a></li>

                                <li class="categories-item"><a href="">Laptop & Computer</a></li>

                                <li class="categories-item"><a href="">Printer & ink</a></li>

                                <li class="categories-item"><a href="">Cameras</a></li>

                            </ul>

                        </div>

                        <div class="block-latest-roducts">

                            <div class="block-title">Latest Products</div>

                            <div class="block-latest-roducts-content">

                                <div class="owl-carousel nav-style2" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"600":{"items":1},"1000":{"items":1}}'>
                                    <div class="owl-ones-row">

                                        <div class="product-item style1">

                                            <div class="product-inner">

                                                <div class="product-thumb">

                                                    <div class="thumb-inner">

                                                        <a href=""><img src="{{asset('images/blog/p1.jpg')}}" alt="p1"></a>

                                                    </div>

                                                </div>

                                                <div class="product-innfo">

                                                    <div class="product-name"><a href="">Leather Chelsea Boots</a></div>

                                                    <span class="price">

                                                        <ins>$229.00</ins>

                                                        <del>$259.00</del>

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
                                        <div class="product-item style1">

                                            <div class="product-inner">

                                                <div class="product-thumb">

                                                    <div class="thumb-inner">

                                                        <a href=""><img src="{{asset('images/blog/p2.jpg')}}" alt="p2"></a>

                                                    </div>

                                                </div>

                                                <div class="product-innfo">

                                                    <div class="product-name"><a href="">2750 Cotu Classic Sneakers</a></div>

                                                    <span class="price">

                                                        <ins>$229.00</ins>

                                                        <del>$259.00</del>

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
                                        <div class="product-item style1">

                                            <div class="product-inner">

                                                <div class="product-thumb">

                                                    <div class="thumb-inner">

                                                        <a href=""><img src="{{asset('images/blog/p3.jpg')}}" alt="p3"></a>

                                                    </div>

                                                </div>

                                                <div class="product-innfo">

                                                    <div class="product-name"><a href="">Thule Chasm Sport Duffel Bag</a></div>

                                                    <span class="price price-dark">

                                                            <ins>$229.00</ins>

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

                                        <div class="product-item style1">

                                            <div class="product-inner">

                                                <div class="product-thumb">

                                                    <div class="thumb-inner">

                                                        <a href=""><img src="{{asset('images/blog/p4.jpg')}}" alt="p4"></a>

                                                    </div>

                                                </div>

                                                <div class="product-innfo">

                                                    <div class="product-name"><a href="">Pullover Hoodie - Mens</a></div>

                                                    <span class="price">

                                                        <ins>$229.00</ins>

                                                        <del>$259.00</del>

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
                                    </div>

                                    <div class="owl-ones-row">

                                        <div class="product-item style1">

                                            <div class="product-inner">

                                                <div class="product-thumb">

                                                    <div class="thumb-inner">

                                                        <a href=""><img src="{{asset('images/blog/p1.jpg')}}" alt="p1"></a>

                                                    </div>

                                                </div>

                                                <div class="product-innfo">

                                                    <div class="product-name"><a href="">Leather Chelsea Boots</a></div>

                                                    <span class="price">

                                                        <ins>$229.00</ins>

                                                        <del>$259.00</del>

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
                                        <div class="product-item style1">

                                            <div class="product-inner">

                                                <div class="product-thumb">

                                                    <div class="thumb-inner">

                                                        <a href=""><img src="{{asset('images/blog/p2.jpg')}}" alt="p2"></a>

                                                    </div>

                                                </div>

                                                <div class="product-innfo">

                                                    <div class="product-name"><a href="">2750 Cotu Classic Sneakers</a></div>

                                                    <span class="price">

                                                        <ins>$229.00</ins>

                                                        <del>$259.00</del>

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
                                        <div class="product-item style1">

                                            <div class="product-inner">

                                                <div class="product-thumb">

                                                    <div class="thumb-inner">

                                                        <a href=""><img src="{{asset('images/blog/p3.jpg')}}" alt="p3"></a>

                                                    </div>

                                                </div>

                                                <div class="product-innfo">

                                                    <div class="product-name"><a href="">Thule Chasm Sport Duffel Bag</a></div>

                                                    <span class="price price-dark">

                                                            <ins>$229.00</ins>

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

                                        <div class="product-item style1">

                                            <div class="product-inner">

                                                <div class="product-thumb">

                                                    <div class="thumb-inner">

                                                        <a href=""><img src="{{asset('images/blog/p4.jpg')}}" alt="p4"></a>

                                                    </div>

                                                </div>

                                                <div class="product-innfo">

                                                    <div class="product-name"><a href="">Pullover Hoodie - Mens</a></div>

                                                    <span class="price">

                                                        <ins>$229.00</ins>

                                                        <del>$259.00</del>

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
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



            </div>

        </div>

</main><!-- end MAIN -->
@endsection
