@extends('layouts.front.app')
@section('content')
<div class="container">
    @include('layouts.front.scrolling-news')
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
                    {{-- <li class="breadcrumb-item current"><a href="{{route('news.'.$route)}}">{{ucfirst($route)}}</a></li> --}}
                @endif
            @endforeach
        </ol>
    </nav>
    <div class="main-content--section pbottom--30">
        <div class="container-fluid1">
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
                                        {{-- @foreach ($trending as $news)
                                        <li>
                                            <div class="post--item post--layout-3">
                                                <div class="post--img">
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
                                        @endforeach --}}
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
                                                    @include('layouts.front.image-video-show', $news = $news)
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-8 col-sm-12 col-xs-8 col-xxs-12">
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
                                            </div> --}}
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        @endforeach
                        {{-- {{$all_news->links()}} --}}
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
                                <h2 class="h4">Featured News</h2>
                            </div>
                            @foreach ($featured_news as $news)
                                <div class="profile--widget">
                                    <div class="contributor--item style--1">
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
                        {{-- <div class="widget">
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
                                                        @include('layouts.front.image-video-show', $news = $news)
                                                    </a>
                                                    <div class="post--info">
                                                        <div class="title">
                                                            <h3 class="h4" style="margin-left: 5px;">
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
                        </div> --}}
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
</div>
@endsection
