@extends('layouts.front.app')
@section('shareable')
    <meta property="og:title" content="{{$news->news_title}}">
    <meta property="og:description" content="{{$news->news_title}}">
    @if ($news->photo_or_video == 'photo')
        <meta property="og:image" content="{{ asset($news->image) }}">
    @else
        <meta property="og:image" content="https://img.youtube.com/vi/{{ $substring }}/0.jpg">
    @endif
    {{-- <meta property="og:url" content="Your Page URL Here"> --}}
    <meta property="og:type" content="website">

@endsection
@section('content')
<div class="container">
    <div class="ad--space pd--20-0-20" style="padding-top: 2rem;">
        <a href="#">
            <img src="img/ads-img/ad-728x90-02.jpg" alt="" class="center-block" data-rjs="2">
        </a>
    </div>
    <nav class="breadcrumbs-nav">
        <ol class="breadcrumbs">
            @php
                $route_name = Route::currentRouteName();
            @endphp
          <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
          <li class="breadcrumb-item current"><a href="{{route('news.'.$route_name)}}">{{ucfirst($route_name)}}</a></li>

        </ol>
      </nav>
    @include('layouts.front.scrolling-news')

    <div class="main-content--section ptop--30 pbottom--30">
        <div class="container-fluid1">
            <div class="row">
                <div class="main--content col-md-8" data-sticky-content="true">
                    <div class="sticky-content-inner">
                        <div class="post--item post--single post--title-largest pd--30-0 news-top-title">
                            <div class="post--info">
                                <div class="title">
                                    <h2 class="h4">{{$news->news_title}}</h2>
                                </div>
                                <ul class="nav meta">
                                    <li>
                                        <a href="#">Reported by : {{$news->reported_by}}</a>
                                    </li>
                                    <li>
                                        Updated <a href="#">{{date('d-M-Y', strtotime($news->news_date))}}, {{date("h:i A", strtotime($news->news_time))}}</a>
                                    </li>
                                    <div class="sharethis-inline-share-buttons"></div>
                                </ul>
                            </div>
                            <div class="post--img news-details-banner">
                                @include('layouts.front.image-video-show', $news = $news)
                            </div>
                            <div class="post--content">
                                @php
                                    $paragraphs = preg_split('/<p>/', $news->description, -1, PREG_SPLIT_NO_EMPTY);
                                    $flag = 0;
                                    if($news->youtube_url==null && $news->photo_or_video == 'photo'){
                                        $flag = 1;
                                    }
                                @endphp
                                @foreach ($paragraphs as $para)
                                    @if (strlen($para)>150 && $flag==0)
                                    @php
                                        $flag=1;
                                    @endphp
                                        <div class="row">
                                            <div class="col-sm-6">
                                                {!!$para!!}
                                            </div>
                                            <div class="col-sm-6">
                                                @if ($news->photo_or_video == 'video')
                                                    <a href="#" class="thumb">
                                                        <img src="{{asset($news->image)}}" alt="{{$news->news_slug}}" width="350" height="200">
                                                        <p class="img-caption" style="text-align: left;">{{$news->image_caption}}</p>
                                                    </a>
                                                @else
                                                    <a href="#" class="thumb">
                                                        <iframe width="350" height="200" class="iframe" src="https://www.youtube.com/embed/{{$news->youtube_url}}"
                                                            title="YouTube video player" frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                            allowfullscreen></iframe>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        {!!$para!!}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="post--tags">
                            @php
                                $hastags = json_decode($news->hashtags)??null;
                            @endphp
                            @if (is_array($hastags))
                            <ul class="nav">
                                <li>
                                  <span>
                                    <i class="fa fa-tags"></i>
                                  </span>
                                </li>
                                  @foreach ($hastags as $tags)
                                      <li>
                                          <a href="#">{{$tags}}</a>
                                      </li>
                                  @endforeach
                              </ul>
                            @endif
                        </div>
                        <div class="ad--space pd--20-0-40">
                            <a href="#">
                                <img src="img/ads-img/ad-728x90-02.jpg" alt="" class="center-block">
                            </a>
                        </div>

                        @if ($might_like->count()>0)
                            <div class="post--related ptop--30">
                                <div class="post--items-title" data-ajax="tab">
                                    <h2 class="h4">You Might Also Like</h2>
                                </div>
                                <div class="post--items post--items-2 news-section-title">
                                    <ul class="nav row" data-ajax-content="inner">
                                        @foreach ($might_like as $other)
                                        <li class="col-sm-6 pbottom--30">
                                            <div class="post--item interview-section-2 post--layout-1">
                                                <div class="post--img">
                                                    @include('layouts.front.image-video-show', $news = $other)
                                                    <a href="#" class="cat">APSC Exam</a>
                                                    </a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">

                                                            <li>
                                                                <a href="#">{{date('d-M-Y', strtotime($other->news_date))}}, {{date("h:i A", strtotime($other->news_time))}}</a>
                                                            </li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4">

                                                                @php
                                                                    $cat_array = json_decode($other->category);
                                                                @endphp
                                                                <a href="{{route($cat_array[0],[$other->news_slug])}}"class="btn-link">{{$other->news_title}}</a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="post--content">
                                                    <p>{!!text_rank($other->description)!!}</p>
                                                </div> --}}
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="preloader bg--color-0--b" data-preloader="1">
                                        <div class="preloader--inner"></div>
                                    </div>
                                </div>
                            </div>
                        @endif




                        <div class="post--related ptop--30">
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">Other News</h2>
                            </div>
                            <div class="post--items post--items-2 news-section-title">
                                <ul class="nav row" data-ajax-content="inner">
                                    @foreach ($other_news as $other)
                                    <li class="col-sm-6 pbottom--30">
                                        <div class="post--item interview-section-2 post--layout-1">
                                            <div class="post--img">
                                                @include('layouts.front.image-video-show', $news = $other)
                                                <a href="#" class="cat">APSC Exam</a>
                                                </a>
                                                <div class="post--info">
                                                    <ul class="nav meta">

                                                        <li>
                                                            <a href="#">{{date('d-M-Y', strtotime($other->news_date))}}, {{date("h:i A", strtotime($other->news_time))}}</a>
                                                        </li>
                                                    </ul>
                                                    <div class="title">
                                                        <h3 class="h4">

                                                            @php
                                                                $cat_array = json_decode($other->category);
                                                            @endphp
                                                            <a href="{{route($cat_array[0],[$other->news_slug])}}"class="btn-link">{{$other->news_title}}</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="post--content">
                                                <p>{!!text_rank($other->description)!!}</p>
                                            </div> --}}
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
                </div>

                <div class="main--sidebar col-md-4 ptop--30 pbottom--30" data-sticky-content="true">
                    <div class="sticky-content-inner right-sidebar-inner">
                        <div class="widget">
                            <div class="ad--widget">
                                <a href="#">
                                    <img src="https://pbs.twimg.com/media/Fi0SE19acAIOUo0.jpg:large" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">Featured News</h2>
                            </div>
                            <div class="list--widget list--widget-1">
                                <div class="post--items post--items-3">
                                    <ul class="nav">
                                        @foreach ($featured_news as $news)
                                        <li>
                                            <div class="post--item post--layout-3">
                                                <div class="post--img">
                                                    @include('layouts.front.image-video-show', $news = $news)
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
                                                                <a href="{{route($cat_array[0],[$other->news_slug])}}" class="btn-link">{{$news->news_title}} </a>
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


                        <div class="widget">
                            <div class="ad--widget">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="#">
                                            <img src="img/ads-img/ad-150x150-1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#">
                                            <img src="img/ads-img/ad-150x150-2.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget">
                            <div class="widget--title" data-ajax="tab">
                                <h2 class="h4">Trending</h2>
                            </div>
                            <div class="list--widget list--widget-1" data-ajax-content="outer">
                                <div class="post--items post--items-3">
                                    <ul class="nav" data-ajax-content="inner">
                                        @foreach ($trending as $news)
                                        <li>
                                            <div class="post--item post--layout-3">
                                                <div class="post--img">
                                                    @include('layouts.front.image-video-show', $news = $news)
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li>
                                                                <a href="#">{{date('d-M-Y', strtotime($news->news_date))}}, {{date("h:i A", strtotime($news->news_time))}}</a>
                                                            </li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4">
                                                                <a href="#" class="btn-link">{{$news->news_title}} </a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $("#news-slider").owlCarousel({
            items : 3,
            itemsDesktop:[1199,3],
            itemsDesktopSmall:[980,2],
            itemsMobile : [600,1],
            navigation:true,
            navigationText:["",""],
            pagination:true,
            autoPlay:true
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
    const sendBtn = document.querySelector('.send-btn');
    const socialIcons = document.querySelector('.social-icons');
    sendBtn.addEventListener('click', () => {
        socialIcons.style.display = socialIcons.style.display === 'block' ? 'none' : 'block';
    });
    document.addEventListener('click', (event) => {
        if (!socialIcons.contains(event.target) && !sendBtn.contains(event.target)) {
            socialIcons.style.display = 'none';
        }
    });
});

</script>

@endsection
