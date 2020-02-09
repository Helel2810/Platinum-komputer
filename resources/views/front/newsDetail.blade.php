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

                                    <a href="">{{$news->newsCategory->name}}</a>

                                </div>

                            </div>

                        </div>

                        <div class="post-comments">

                            <div class="block-title">Leave a Reply</div>

                            <div class="block-content">

                                <form method="post" action="{{route('newsPostComment', $news->id)}}">
                                    @csrf
                                    <div class="form-group">

                                        <label class="title">Comment</label>

                                        <textarea class="form-control" name="content" id="forContent" rows="9" ></textarea>

                                    </div>

                                    <button type="submit" class="btn-comment">Post Comment</button>

                                </form>

                            </div>

                        </div>

                        @foreach($news->newsComments as $newsComment)
                        <br>

                        <div class="rows">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">{{$newsComment->customer->user_name}}</h5>
                              <p class="card-text">{{$newsComment->content}}</p>
                            </div>
                          </div>
                        </div>
                        @endforeach


                    </div>

                </div>

                <div class="col-md-3 col-sm-4">

                    <div class="sidebar-left">

                        <br>

                        <div class="block-recent-post-blog">

                            <div class="block-title">Recent Post</div>

                            <ul>

                                @foreach($latestNews as $item)
                                <li class="recent-post-item"><a href="{{route('frontNewsDetail', $item->id)}}">{{$item->title}}</a></li>
                                @endforeach

                            </ul>

                        </div>

                        <div class="block-categories-blog">

                            <div class="block-title">Blog categories</div>

                            <ul>

                              @foreach($newsCategories as $newsCategory)
                              <li class="categories-item"><a href="">{{$newsCategory->name}}</a></li>
                              @endforeach

                            </ul>

                        </div>

                    </div>

                </div>



            </div>

        </div>

</main><!-- end MAIN -->
@endsection
