@extends('layouts.front.app')
@section('content')
    <div class="ad--space pd--20-0-20" style="padding-top: 2rem;">
        <a href="#">
            <img src="img/ads-img/ad-728x90-02.jpg" alt="" class="center-block" data-rjs="2">
        </a>
    </div>
    <nav class="breadcrumbs-nav">
        <ol class="breadcrumbs">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Featured News</a></li>
          <li class="breadcrumb-item current">Assam Govt Announces Dr. Banikanta Kakati & Anundoram Borooah Awards For Meritorious Students</li>
        </ol>
      </nav>
    @include('layouts.front.scrolling-news')

    <div class="main-content--section ptop--30 pbottom--30">
        <div class="container-fluid">
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
                            {{-- <div class="sharethis-inline-share-buttons"></div> --}}
                            <div class="post--img news-details-banner">
                                @if ($news->photo_or_video == 'photo')
                                    <a href="#" class="thumb">
                                        <img src="{{asset($news->image)}}" alt="{{$news->news_slug}}" width="600" height="300">
                                        <p class="img-caption" style="text-align: left;">{{$news->image_caption}}</p>
                                    </a>
                                @else
                                    <a href="#" class="thumb">
                                        <iframe width="600" height="300" class="iframe" src="https://www.youtube.com/embed/{{$news->youtube_url}}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                    </a>
                                @endif
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
                            <ul class="nav">
                              <li>
                                <span>
                                  <i class="fa fa-tags"></i>
                                </span>
                              </li>
                              <li>
                                <a href="#">Dr. Banikanta Kakati</a>
                              </li>
                              <li>
                                <a href="#">Anundoram Borooah</a>
                              </li>
                              <li>
                                <a href="#">Assam Govt</a>
                              </li>
                            </ul>
                        </div>
                        <div class="ad--space pd--20-0-40">
                            <a href="#">
                                <img src="img/ads-img/ad-728x90-02.jpg" alt="" class="center-block">
                            </a>
                        </div>

                        <div class="post--author-info clearfix">
                            <div class="comment-block">
                                <div class="block-header">
                                    <div class="title">
                                        <h4>Post a comment</h4>
                                    </div>
                                </div>
                                <div class="writing" onclick="this.focus()">
                                    <div contenteditable="true" class="textarea" autofocus spellcheck="false">
                                        <p><a class="tagged-user">@IndiaTomorrow</a></p>
                                    </div>
                                    <div class="footer">
                                        <div class="text-format">
                                            <button class="btn"><i class="ri-bold"></i></button>
                                            <button class="btn"><i class="ri-italic"></i></button>
                                            <button class="btn"><i class="ri-underline"></i></button>
                                            <button class="btn"><i class="ri-list-unordered"></i></button>
                                        </div>
                                        <div class="group-button">
                                            <button class="btn"><i class="ri-at-line"></i></button>
                                            <button class="btn primary send-btn">Send</button>
                                        </div>
                                    </div>
                                    <div class="social-icons">
                                        <!-- Social media icons go here -->
                                        <!-- Example: -->
                                        <ul class="social-media-send-popup">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-youtube-play"></i>
                                                </a>
                                            </li>
                                        </ul>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="post--related ptop--30">
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">You Might Also Like</h2>
                            </div>
                            <div class="container-fluid1">
                                <div class="row">
                                    <div id="news-slider" class="owl-carousel">
                                        @foreach ($might_like as $like)
                                            <div class="post-slide">
                                                <div class="post-img">
                                                    @if ($news->photo_or_video == 'photo')
                                                            <img src="{{asset($news->image)}}" alt="{{$news->news_slug}}">
                                                    @else
                                                            <iframe src="https://www.youtube.com/embed/{{$news->youtube_url}}"
                                                                title="YouTube video player" class="iframe" frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                allowfullscreen></iframe>
                                                    @endif
                                                    {{-- <img src="{{asset($like->image)}}" alt=""> --}}
                                                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                                                </div>
                                                <div class="post-content">
                                                    <h3 class="post-title">
                                                    <a href="#">{{$like->news_title}}</a>
                                                    </h3>
                                                    <p class="post-description">{!!text_rank($like->description)!!}</p>
                                                    <span class="post-date"><i class="fa fa-clock-o"></i>{{date('d-M-Y', strtotime($news->news_date))}}, {{date("h:i A", strtotime($news->news_time))}}</span>
                                                    @php
                                                        $cat_array = json_decode($like->category);
                                                    @endphp
                                                    <a href="{{route($cat_array[0],[$like->news_slug])}}" class="read-more">read more</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="post--related ptop--30">
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">Other News</h2>
                            </div>
                            <div class="post--items post--items-2 news-section-title">
                                <ul class="nav row" data-ajax-content="inner">
                                    @foreach ($other_news as $other)
                                    <li class="col-sm-6 pbottom--30">
                                        <div class="post--item post--layout-1">
                                            <div class="post--img">
                                                @if ($other->photo_or_video == 'photo')
                                                    <a href="#" class="thumb">
                                                        <img src="{{asset($other->image)}}" alt="{{$other->news_slug}}">
                                                    </a>
                                                @else
                                                    <a href="#" class="thumb">
                                                        <iframe class="iframe" src="https://www.youtube.com/embed/{{$other->youtube_url}}"
                                                            title="YouTube video player" frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                            allowfullscreen></iframe>
                                                    </a>
                                                @endif
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
                                                            <a href="#" class="btn-link">{{$other->news_title}}</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post--content">
                                                <p>{!!text_rank($other->description)!!}</p>
                                            </div>
                                            <div class="post--action">
                                                @php
                                                    $cat_array = json_decode($other->category);
                                                @endphp
                                                <a href="{{route($cat_array[0],[$other->news_slug])}}">Continue Reading... </a>
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

                <div class="main--sidebar col-md-4 ptop--30 pbottom--30" data-sticky-content="true">
                    <div class="sticky-content-inner">
                        <div class="widget">
                            <div class="ad--widget">
                                <a href="#">
                                    <img src="https://pbs.twimg.com/media/Fi0SE19acAIOUo0.jpg:large" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">Get Newsletter</h2>
                                <i class="icon fa fa-envelope-open-o"></i>
                            </div>
                            <div class="subscribe--widget">
                                <div class="content">
                                    <p>Subscribe to our newsletter to get latest news, popular news and exclusive
                                        updates.</p>
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
                                                    @if ($news->photo_or_video == 'photo')
                                                        <a href="#" class="thumb">
                                                            <img src="{{asset($news->image)}}" alt="{{$news->news_slug}}">
                                                        </a>
                                                    @else
                                                        <a href="#" class="thumb">
                                                            <iframe src="https://www.youtube.com/embed/{{$news->youtube_url}}"
                                                                title="YouTube video player" class="iframe" frameborder="0"
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
                                                    @if ($news->photo_or_video == 'photo')
                                                        <a href="#" class="thumb">
                                                            <img src="{{asset($news->image)}}" alt="{{$news->news_slug}}">
                                                        </a>
                                                    @else
                                                        <a href="#" class="thumb">
                                                            <iframe src="https://www.youtube.com/embed/{{$news->youtube_url}}"
                                                                title="YouTube video player" class="iframe" frameborder="0"
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
        // Toggle the visibility of social icons
        socialIcons.style.display = socialIcons.style.display === 'block' ? 'none' : 'block';
    });

    // Close social icons when clicking outside of them or the send button
    document.addEventListener('click', (event) => {
        if (!socialIcons.contains(event.target) && !sendBtn.contains(event.target)) {
            socialIcons.style.display = 'none';
        }
    });
});

</script>

@endsection
