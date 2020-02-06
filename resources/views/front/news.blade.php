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

                                    <h3 class="post-name"><a href="">{{$one_news->title}}</a></h3>

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

                          <div class="block-categories-blog">

                              <div class="block-title">categories</div>

                              <ul>

                                  @foreach($newsCategories as $newscategory)
                                    <li class="categories-item"><a href="">{{$newscategory->name}}</a></li>
                                  @endforeach

                              </ul>

                          </div>

                      </div>

                  </div>

              </div>

          </div>

  </main><!-- end MAIN -->
@endsection
