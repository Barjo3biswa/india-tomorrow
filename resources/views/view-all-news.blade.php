@extends('layouts.front.app')
@section('content')
    <div class="ad--space pd--20-0-20" style="padding-top: 2rem;">
        <a href="#">
            <img src="img/ads-img/ad-728x90-02.jpg" alt="" class="center-block" data-rjs="2">
        </a>
    </div>
    <nav class="breadcrumbs-nav">
        <ol class="breadcrumbs">
            @php
                $route_name = Route::currentRouteName();
                $route_array = explode('.', $route_name);
            @endphp
            @foreach ($route_array as $route)
                @if($route == "news")
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                @else
                    <li class="breadcrumb-item current"><a href="{{route('news.'.$route)}}">{{ucfirst($route)}}</a></li>
                @endif
            @endforeach
        </ol>
    </nav>
    <div class="main-content--section pbottom--30">
        <div class="container-fluid">
            <div class="row">
                <div class="main--content col-md-3 col-sm-7" data-sticky-content="true">
                    <div class="sticky-content-inner">
                        <div class="widget section-bxs">
                            <div class="widget--title" data-ajax="tab">
                                <h2 class="h4">Trending</h2>

                            </div>
                            <div class="list--widget list--widget-2">
                                <div class="post--items post--items-3">
                                    <ul class="nav" data-ajax-content="inner">
                                        @foreach ($trending as $news)
                                        <li>
                                            <div class="post--item post--layout-3">
                                                <div class="post--img">
                                                    {{-- @if ($news->photo_or_video == 'photo')
                                                        <a href="#" class="thumb">
                                                            <img src="{{asset($news->image)}}" alt="{{$news->news_slug}}" width="600" height="300">
                                                        </a>
                                                    @else
                                                        <a href="#" class="thumb">
                                                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$news->youtube_url}}"
                                                                title="YouTube video player" frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                allowfullscreen></iframe>
                                                        </a>
                                                    @endif --}}
                                                    @include('layouts.front.image-video-show', $news = $news)
                                                    <div class="post--info">
                                                        <div class="title">
                                                            <h3 class="h4"><a href="{{route($slug,[$news->news_slug])}}">{{$news->news_title}}..</a></h3>
                                                        </div>
                                                        <ul class="nav meta">
                                                            <li>
                                                                <span>{{date('d-M-Y', strtotime($news->news_date))}}, {{date("h:i A", strtotime($news->news_time))}}</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main--content col-md-6 col-sm-7" data-sticky-content="true">
                    <div class="sticky-content-inner news-listing">
                        @foreach ($all_news as $news)
                        <div class="post--items post--items-5 pd--30-0 section-bxs">
                            <ul class="nav">

                                <li class="li">
                                    <div class="post--item post--title-larger">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12 col-xs-4 col-xxs-12">
                                                <div class="post--img">
                                                    {{-- @if ($news->photo_or_video == 'photo')
                                                        <a href="#" class="thumb">
                                                            <img src="{{asset($news->image)}}" alt="{{$news->news_slug}}">
                                                        </a>
                                                    @else
                                                        <a href="#" class="thumb">
                                                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$news->youtube_url}}"
                                                                title="YouTube video player" frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                allowfullscreen></iframe>
                                                        </a>
                                                    @endif --}}
                                                    @include('layouts.front.image-video-show', $news = $news)
                                                    {{-- <a href="{{route($slug,[$news->news_slug])}}" class="cat">News</a> --}}
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-sm-12 col-xs-8 col-xxs-12">
                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li>
                                                            <a href="{{route($slug,[$news->news_slug])}}">{{$news->reported_by}} | {{date('d-M-Y', strtotime($news->news_date))}}, {{date("h:i A", strtotime($news->news_time))}}</a>
                                                        </li>
                                                    </ul>
                                                    <div class="title">
                                                        <h3 class="h4">
                                                            <a href="{{route($slug,[$news->news_slug])}}" class="btn-link">{{$news->news_title}}</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                @if($slug != 'interview')
                                                <div class="post--content">
                                                    <p>{!!text_rank($news->description)!!}...</p>
                                                </div>
                                                @endif
                                                {{-- <div class="post--action">
                                                    <a href="{{route($slug,[$news->news_slug])}}">Continue Reading...</a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        @endforeach
                        <div class="pagination--wrapper clearfix bdtop--1 bd--color-2 ptop--60 pbottom--30">
                            <p class="pagination-hint float--left">Page 02 of 03</p>
                            <ul class="pagination float--right">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-long-arrow-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">01</a>
                                </li>
                                <li class="active">
                                    <span>02</span>
                                </li>
                                <li>
                                    <a href="#">03</a>
                                </li>
                                <li>
                                    <i class="fa fa-angle-double-right"></i>
                                    <i class="fa fa-angle-double-right"></i>
                                    <i class="fa fa-angle-double-right"></i>
                                </li>
                                <li>
                                    <a href="#">20</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-long-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="main--sidebar col-md-3 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true"
                    style="padding: 30px 0;">
                    <div class="sticky-content-inner">
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">Related News</h2>
                            </div>
                            @foreach ($related_news as $news)
                                <div class="profile--widget">
                                    <div class="contributor--item style--1">
                                        {{-- @if ($news->photo_or_video == 'photo')
                                            <div class="img">
                                                <img src="{{asset($news->image)}}" alt="{{$news->news_slug}}">
                                            </div>
                                        @else
                                            <div class="img">
                                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$news->youtube_url}}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen></iframe>
                                            </div>
                                        @endif --}}
                                        @include('layouts.front.image-video-show', $news = $news)
                                        <div class="name">
                                            <h3 class="h4">
                                                <a href="{{route($slug,[$news->news_slug])}}" class="btn-link">{{$news->news_title}}..</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">News Archives</h2>
                                <i class="icon fa fa-folder-open-o"></i>
                            </div>
                            <div class="nav--widget">
                                <ul class="nav">
                                    <li>
                                        <a href="#">
                                            <span>Dec 2023</span>
                                            <span>(36)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span>Dec 2021</span>
                                            <span>(41)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span>Dec 2020</span>
                                            <span>(39)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span>Dec 2019</span>
                                            <span>(15)</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        {{-- <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">Get Newsletter</h2>
                                <i class="icon fa fa-envelope-open-o"></i>
                            </div>
                            <div class="subscribe--widget">
                                <div class="content">
                                    <p>Subscribe to our newsletter to get latest news, popular news and exclusive updates.
                                    </p>
                                </div>
                                <form
                                    action="https://themelooks.us13.list-manage.com/subscribe/post?u=79f0b132ec25ee223bb41835f&amp;id=f4e0e93d1d"
                                    method="post" name="mc-embedded-subscribe-form" target="_blank"
                                    data-form="mailchimpAjax">
                                    <div class="input-group">
                                        <input type="email" name="EMAIL" placeholder="E-mail address"
                                            class="form-control" autocomplete="off" required>
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-lg btn-default active">
                                                <i class="fa fa-paper-plane-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="status"></div>
                                </form>
                            </div>
                        </div> --}}
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">Featured News</h2>
                                <i class="icon fa fa-newspaper-o"></i>
                            </div>
                            <div class="list--widget list--widget-1">
                                <div class="post--items post--items-3">
                                    <ul class="nav">
                                        @foreach ($featured_news as $news)
                                        <li>
                                            <div class="post--item post--layout-3">
                                                <div class="post--img">
                                                    <a href="{{route($slug,[$news->news_slug])}}" class="thumb">
                                                        {{-- @if ($news->photo_or_video == 'photo')
                                                            <div class="img">
                                                                <img src="{{asset($news->image)}}" alt="{{$news->news_slug}}">
                                                            </div>
                                                        @else
                                                            <div class="img">
                                                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$news->youtube_url}}"
                                                                    title="YouTube video player" frameborder="0"
                                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                    allowfullscreen></iframe>
                                                            </div>
                                                        @endif --}}
                                                        @include('layouts.front.image-video-show', $news = $news)
                                                    </a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li>
                                                                <a href="#">{{date('d-M-Y', strtotime($news->news_date))}}, {{date("h:i A", strtotime($news->news_time))}}</a>
                                                            </li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4">
                                                                <a href="{{route($slug,[$news->news_slug])}}" class="btn-link">{{$news->news_title}}..</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="preloader bg--color-0--b" data-preloader="1">
                                        <div class="preloader--inner"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">Advertisement</h2>
                                <i class="icon fa fa-bullhorn"></i>
                            </div>
                            <div class="ad--widget">
                                <a href="#">
                                    <img src="img/ads-img/ad-300x250-2.jpg" alt="">
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
