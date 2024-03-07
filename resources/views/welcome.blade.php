@extends('layouts.front.app')
@section('content')
@include('layouts.front.scrolling-news')
<div class="main-content--section pbottom--30">
    <div class="container-fluid">
        <div class="main--content">
            <div class="post--items post--items-1 pd--30-0">
                <div class="row gutter--15">
                    <div class="col-md-6">
                        <div class="post--item post--layout-1 post--title-larger" style="height: 490px;">
                            <div class="post--img" style="height: 490px;">
                                @if ($first_news)
                                    @if ($first_news->photo_or_video == 'photo')
                                        <a href="#" class="thumb" style="height: 490px;">
                                            <img src="{{asset($first_news->image)}}" alt="{{$first_news->news_slug}}" width="600" height="300">
                                            {{-- <p class="img-caption" style="text-align: left;">{{$first_news->image_caption}}</p> --}}
                                        </a>
                                    @else
                                        <a href="#" class="thumb" style="height: 490px;">
                                            <iframe width="100%" height="100%" class="iframe" src="https://www.youtube.com/embed/{{$first_news->youtube_url}}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                        </a>
                                    @endif
                                    <div class="post--info">
                                        <ul class="nav meta">
                                            <li>
                                                <a href="#">{{date('d-M-Y', strtotime($first_news->news_date))}}, {{date("h:i A", strtotime($first_news->news_time))}}</a>
                                            </li>
                                        </ul>
                                        <div class="title">
                                            <h2 class="h4">
                                                @php
                                                    $cat_array = json_decode($first_news->category);
                                                @endphp
                                                <a href="{{route($cat_array[0],[$first_news->news_slug])}}" class="btn-link">{{$first_news->news_title}}</a>
                                            </h2>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row gutter--15">
                            @foreach ($second_news as $news)
                            <div class="col-xs-6 col-xss-12">
                                <div class="post--item post--layout-1 post--title-large post--item--1">
                                    <div class="post--img">
                                        @if ($news->photo_or_video == 'photo')
                                            <a href="#" class="thumb">
                                                <img src="{{asset($news->image)}}" alt="{{$news->news_slug}}" width="600" height="300">
                                            </a>
                                        @else
                                            <a href="#" class="thumb">
                                                <iframe width="100%" height="100%" class="iframe" src="https://www.youtube.com/embed/{{$news->youtube_url}}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen></iframe>
                                            </a>
                                        @endif
                                        <a href="#" class="cat">Educational</a>
                                        <div class="post--info">
                                            <ul class="nav meta">
                                                <li>
                                                    <a href="#">{{date('d-M-Y', strtotime($news->news_date))}}, {{date("h:i A", strtotime($news->news_time))}}</a>
                                                </li>
                                            </ul>
                                            <div class="title">
                                                <h2 class="h4">
                                                    @php
                                                        $cat_array = json_decode($news->category);
                                                    @endphp
                                                    <a href="{{route($cat_array[0],[$news->news_slug])}}" class="btn-link">{{$news->news_title}}</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-sm-12 hidden-sm hidden-xs">
                                <div class="post--item post--layout-1 post--title-larger post--item--2">
                                    <div class="post--img">
                                        <a href="#" class="thumb">
                                            <img src="https://www.galaxyeduworld.com/storage/news/1686737792_6489938001acd_750_351.jpg" alt="">
                                        </a>
                                        <a href="#" class="cat">ADVERTISEMENT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                <div class="sticky-content-inner news-section-title">
                    <div class="row">
                        @php

                            $serial = 1;
                        @endphp
                        @foreach ($news_section as $key=>$section)
                            @if ($serial%3==1 && $section->contents($section->slug)->count()>0)
                            @php
                                $serial = $serial+1;
                            @endphp
                                @include('layouts.front.template-one')
                            @elseif($serial%3==2 && $section->contents($section->slug)->count()>0)
                            @php
                                $serial = $serial+1;
                            @endphp
                                @include('layouts.front.template-two')
                            @elseif($serial%3==0 && $section->contents($section->slug)->count()>0)
                            @php
                                $serial = $serial+1;
                            @endphp
                                    @include('layouts.front.template-three')
                            @endif
                        @endforeach
                        <ul class="nav row" data-ajax-content="inner">
                            <li class="col-md-12">
                                <div class="post--items-title" data-ajax="tab">
                                    <h2 class="h4">Live Videos</h2>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="post--item post--layout-1 post--type-video post--title-large" style="height: 208px;">
                                            <div class="post--img" style="height: 208px;">
                                                <a href="https://youtu.be/JBWjdtIfRag?si=5XNPWBLBRL-UY3z2" class="thumb" style="height: 208px;">
                                                    <iframe style="width: 100%;height: 100%;" src="https://www.youtube.com/embed/JBWjdtIfRag?si=5XNPWBLBRL-UY3z2" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                </a>
                                                <a href="#" class="cat">Live News Video</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="post--item post--layout-1 post--type-video post--title-large" style="height: 208px;">
                                            <div class="post--img" style="height: 208px;">
                                                <a href="https://i.ytimg.com/vi/UZMHqRQOjCs/maxresdefault.jpg" class="thumb" style="height: 208px;">
                                                    <img src="https://i.ytimg.com/vi/UZMHqRQOjCs/maxresdefault.jpg" alt="" style="width: 100%;height: 100%;">
                                                </a>
                                                <a href="#" class="cat">Live News Video</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ad--space pd--30-0">
                                    <a href="#">
                                        <img src="https://www.wordstream.com/wp-content/uploads/2021/07/banner-ads-examples-ncino.jpg" alt="" class="center-block" style="width: 100%;
                                        height: 84px;
                                        object-fit: cover;">
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <div class="widget">
                        @foreach ($sub_news_section as $section)
                            @if ($section->contents($section->slug)->count()>0)
                                <div class="widget--title">
                                    <h2 class="h4">{{$section->name}}</h2>
                                </div>
                                <div class="post--items post--items-3" data-ajax-content="outer">
                                    <ul class="nav" data-ajax-content="inner">
                                        @foreach ($section->contents($section->slug) as $news)
                                        <li>
                                            <div class="post--item post--layout-3">
                                                <div class="post--img">
                                                    @if ($news->photo_or_video == 'photo')
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
                                                    @endif
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li>
                                                                <a href="#">{{date('d-M-Y', strtotime($news->news_date))}}, {{date("h:i A", strtotime($news->news_time))}}</a>
                                                            </li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4">
                                                                @php
                                                                    $cat_array = json_decode($news->category);
                                                                @endphp
                                                                <a href="{{route($cat_array[0],[$news->news_slug])}}" class="btn-link">{{$news->news_title}}</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="widget">
                    </div>
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">Advertisement</h2>
                            <i class="icon fa fa-bullhorn"></i>
                        </div>
                        <div class="ad--widget">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="#">
                                        <img src="https://5.imimg.com/data5/SELLER/Default/2022/2/BL/UY/TW/14357089/newspaper-ads-250x250.jpeg" alt="">
                                    </a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="#">
                                        <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/higher-education-ad-template-design-5f1fffa627c42e7bbe32dcb59346de49_screen.jpg?ts=1643693093" alt="">
                                    </a>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="transform: none;">
            <div class="main--content col-md-8 col-sm-7" data-sticky-content="true"
                style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="sticky-content-inner"
                    style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 104.5px;">
                    <div class="row">
                        <div class="col-md-12 ptop--20 pbottom--30">
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">Book Reviews/ Reading Recommendations</h2>

                            </div>
                            <div class="post--items news-section-title" data-ajax-content="outer">
                                <ul class="nav row gutter--15" data-ajax-content="inner">
                                    <li class="col-md-4 col-xs-6 col-xxs-12">
                                        <div class="post--item post--layout-1">
                                            <div class="post--img">
                                                <a href="#" class="thumb">
                                                    <img src="https://static.pib.gov.in/WriteReadData/userfiles/image/image0010V4F.jpg" alt=""
                                                        data-rjs="2" style="height: 168px;
                                                        object-fit: cover;">
                                                </a>
                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li>
                                                            <a href="#">Yeasterday 03:52 pm</a>
                                                        </li>
                                                    </ul>
                                                    <div class="title">
                                                        <h3 class="h4">
                                                            <a href="#" class="btn-link">IAS/UPSC Toppers Meet</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-xs-12 hidden shown-xxs">
                                        <hr class="divider">
                                    </li>
                                    <li class="col-md-4 col-xs-6 col-xxs-12">
                                        <div class="post--item post--layout-1">
                                            <div class="post--img">
                                                <a href="#" class="thumb">
                                                    <img src="https://www.momentum.ac.in/uploaded-files/thumb-cache/things-to-expect-from-best-iit-jee-neet-coaching-in-gorakhpur377673-neet-iit-jeey36n.jpg" alt=""
                                                        data-rjs="2" style="height: 168px;
                                                        object-fit: cover;">
                                                </a>
                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li>
                                                            <a href="#">Yeasterday 03:52 pm</a>
                                                        </li>
                                                    </ul>
                                                    <div class="title">
                                                        <h3 class="h4">
                                                            <a href="#" class="btn-link">JEE/NEET Workshops</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-4 hidden-sm hidden-xs">
                                        <div class="post--item post--layout-1">
                                            <div class="post--img">
                                                <a href="#" class="thumb">
                                                    <img src="https://www.mapsofindia.com/ci-moi-images/my-india/2017/04/national-career-service.jpg" alt=""
                                                        data-rjs="2" style="height: 168px;
                                                        object-fit: cover;">
                                                </a>
                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li>
                                                            <a href="#">Yeasterday 03:52 pm</a>
                                                        </li>
                                                    </ul>
                                                    <div class="title">
                                                        <h3 class="h4">
                                                            <a href="#" class="btn-link">National Career Service (NCS) Fairs</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="resize-sensor"
                        style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                        <div class="resize-sensor-expand"
                            style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                            <div
                                style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 790px; height: 1627px;">
                            </div>
                        </div>
                        <div class="resize-sensor-shrink"
                            style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                            <div
                                style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true"
                style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="sticky-content-inner"
                    style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                    <div class="widget">
                    </div>
                    <div class="widget">
                        <div class="ad--widget">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="#">
                                        <img src="https://newspaperads.ads2publish.com/wp-content/uploads/2018/04/education-worldwide-india-education-fair-ad-delhi-times-14-04-2018.png" alt="" data-rjs="2">
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#">
                                        <img src="https://newspaperads.ads2publish.com/wp-content/uploads/2018/04/education-worldwide-india-education-fair-ad-delhi-times-14-04-2018.png" alt="" data-rjs="2">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
