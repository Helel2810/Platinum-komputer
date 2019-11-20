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

                          <div class="post-list post-items">

                            @foreach($news as $one_news)
                            <div class="post-item">

                                <div class="post-thumb">

                                    <a href=""><img src="{{$one_news->image}}" alt="post-image"></a>

                                    <span class="date">{{$one_news->created_at->day}}<span>{{$one_news->created_at->shortEnglishMonth}}</span></span>

                                </div>

                                <div class="post-item-info">

                                    <h3 class="post-name"><a href="">Lorem Ipsum</a></h3>

                                    <div class="post-metas">

                                        <span class="author">Post by: <span>Admin</span></span>

                                        <span class="comment"><i class="fa fa-comment" aria-hidden="true"></i>3 Comments</span>

                                    </div>

                                    <div class="post-content">
                                        {!!str_limit($one_news->content, 200)!!}

                                        <a href="{{route('frontNewsDetail', $one_news->id)}}" class="read-more">Read more</a>

                                    </div>

                                </div>

                            </div>
                            @endforeach

                              <div class="post-item">

                                  <div class="post-thumb">

                                      <a href=""><img src="{{asset("images/blog/post-image.jpg")}}" alt="post-image"></a>

                                      <span class="date">12<span>Dec</span></span>

                                  </div>

                                  <div class="post-item-info">

                                      <h3 class="post-name"><a href="">Sun Online Travel has previously picked out</a></h3>

                                      <div class="post-metas">

                                          <span class="author">Post by: <span>Admin</span></span>

                                          <span class="comment"><i class="fa fa-comment" aria-hidden="true"></i>3 Comments</span>

                                      </div>

                                      <div class="post-content">

                                          <p>Using Lorem Ipsum allows to put together layouts and the form of the content before the content has been created, giving the design and production process more freedom It is widely believed that the history.</p>

                                          <a href="" class="read-more">Read more</a>

                                      </div>

                                  </div>

                              </div>

                              <div class="post-item">

                                  <div class="post-thumb">

                                      <a href=""><img src="{{asset("images/blog/post-image-2.jpg")}}" alt="post-image-2"></a>

                                      <span class="date">22<span>Dec</span></span>

                                  </div>

                                  <div class="post-item-info">

                                      <h3 class="post-name"><a href="">It’s all about the bread: whole grain home</a></h3>

                                      <div class="post-metas">

                                          <span class="author">Post by: <span>Admin</span></span>

                                          <span class="comment"><i class="fa fa-comment" aria-hidden="true"></i>6 Comments</span>

                                      </div>

                                      <div class="post-content">

                                          <p>Lorem Ipsum is simply dummy text of the typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                                          <a href="" class="read-more">Read more</a>

                                      </div>

                                  </div>

                              </div>

                              <div class="post-item">

                                  <div class="post-thumb">

                                      <a href=""><img src="{{asset("images/blog/post-image-3.jpg")}}" alt="post-image-3"></a>

                                      <span class="date">22<span>Dec</span></span>

                                  </div>

                                  <div class="post-item-info">

                                      <h3 class="post-name"><a href="">Kavos is a party capital of the stunning</a></h3>

                                      <div class="post-metas">

                                          <span class="author">Post by: <span>Admin</span></span>

                                          <span class="comment"><i class="fa fa-comment" aria-hidden="true"></i>7 Comments</span>

                                      </div>

                                      <div class="post-content">

                                          <p>This philosophical work, also known as On the Ends of Good, was split into five books. The Lorem Ipsum we know today is derived from parts of the first book Liber Primus and its discussion on hedonism, the words of which.</p>

                                          <a href="" class="read-more">Read more</a>

                                      </div>

                                  </div>

                              </div>

                              <div class="post-item">

                                  <div class="post-thumb">

                                      <a href=""><img src="{{asset("images/blog/post-image-4.jpg")}}" alt="post-image-4"></a>

                                      <span class="date">22<span>Dec</span></span>

                                  </div>

                                  <div class="post-item-info">

                                      <h3 class="post-name"><a href="#">Roselle Ebarle will take you to its azure sea</a></h3>

                                      <div class="post-metas">

                                          <span class="author">Post by: <span>Admin</span></span>

                                          <span class="comment"><i class="fa fa-comment" aria-hidden="true"></i>6 Comments</span>

                                      </div>

                                      <div class="post-content">

                                          <p>Advancing to the 1960s, Lorem Ipsum was made popular by typeface, who used it in their advertising campaigns. Letraset offered pages of Lorem Ipsum as rub down transfer sheets, which were widely used in the pre-computer era for layouts.</p>

                                          <a href="" class="read-more">Read more</a>

                                      </div>

                                  </div>

                              </div>

                          </div>

                          <div class="pagination">

                              <ul class="nav-links">

                                  <li class="active"><a href="">1</a></li>

                                  <li><a href="">2</a></li>

                                  <li><a href="">3</a></li>

                                  <li class="back-next"><a href="">Next</a></li>

                              </ul>

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

                                                          <a href=""><img src="{{asset("images/blog/p1.jpg")}}" alt="p1"></a>

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

                                                          <a href=""><img src="{{asset("images/blog/p2.jpg")}}" alt="p2"></a>

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

                                                          <a href=""><img src="{{asset("images/blog/p3.jpg")}}" alt="p3"></a>

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

                                                          <a href=""><img src="{{asset("images/blog/p4.jpg")}}" alt="p4"></a>

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

                                                          <a href=""><img src="{{asset("images/blog/p1.jpg")}}" alt="p1"></a>

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

                                                          <a href=""><img src="{{asset("images/blog/p2.jpg")}}" alt="p2"></a>

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

                                                          <a href=""><img src="{{asset("images/blog/p3.jpg")}}" alt="p3"></a>

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

                                                          <a href=""><img src="{{asset("images/blog/p4.jpg")}}" alt="p4"></a>

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
