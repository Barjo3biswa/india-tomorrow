<div class="col-md-6 ptop--0 pbottom--30">
    <div class="post--items-title" data-ajax="tab">
        <h2 class="h4"><a href="{{route('news.'.$section->slug)}}" class="cat">{{$section->name}}</a></h2>

    </div>
    <div class="post--items post--items-3" data-ajax-content="outer">
        <ul class="nav" data-ajax-content="inner">
            @php
                $key2 = 0;
            @endphp
            @foreach ($section->contents($section->slug)->take(5) as $key=>$news)
            @if ($key2==0)
                <li>
                    <div class="post--item interview-section post--layout-1">
                        <div class="post--img">
                            @include('layouts.front.image-video-show', $testing = $news)
                            <a href="{{route('news.'.$section->slug)}}" class="cat">{{$section->name}}</a>
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
            @else
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
                                        <a href="{{route($cat_array[0],[$news->news_slug])}}" class="btn-link">{{$news->news_title}}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endif
            @php
                $key2 = $key2+1;
            @endphp
            @endforeach
        </ul>
        <div class="preloader bg--color-0--b" data-preloader="1">
            <div class="preloader--inner"></div>
        </div>
    </div>
</div>
