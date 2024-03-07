<div class="col-md-6 ptop--0 pbottom--30">
    <div class="post--items-title" data-ajax="tab">
        <h2 class="h4"><a href="{{route('news.'.$section->slug)}}" class="cat">{{$section->name}}</a></h2>
        <div class="nav">
            <a href="#" class="prev btn-link"
                data-ajax-action="load_prev_world_news_posts">
                <i class="fa fa-long-arrow-left"></i>
            </a>
            <span class="divider">/</span>
            <a href="#" class="next btn-link"
                data-ajax-action="load_next_world_news_posts">
                <i class="fa fa-long-arrow-right"></i>
            </a>
        </div>
    </div>
    <div class="post--items post--items-2" data-ajax-content="outer">
        <ul class="nav row gutter--15" data-ajax-content="inner">
            {{-- @php
                $testt = $section->contents($section->slug)->sortByDesc('id');
            @endphp --}}
            @foreach ($section->contents($section->slug)->sortByDesc('id') as $key=>$news)
                @if($key==($section->contents($section->slug)->count()-1))
                    <li class="col-xs-12">
                        <div class="post--item post--layout-1">
                            <div class="post--img">
                                @if ($news->photo_or_video == 'photo')
                                    <a href="{{asset($news->image)}}" class="thumb">
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
                                <a href="{{route('news.'.$section->slug)}}" class="cat">{{$section->name}}</a>

                                <div class="post--info">
                                    <ul class="nav meta">
                                        <li>
                                            <a href="#">Reported By: {{$news->reported_by}}</a>
                                        </li>
                                        <li>
                                            <a href="#">{{date('d-M-Y', strtotime($news->news_date))}}, {{date("h:i A", strtotime($news->news_time))}}</a>
                                        </li>
                                    </ul>
                                    <div class="title">
                                        <h3 class="h4">
                                            @php
                                                $cat_array = json_decode($news->category);
                                            @endphp
                                            <a href="{{route($cat_array[0],[$news->news_slug])}}"class="btn-link">{{$news->news_title}}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-xs-12">
                        <hr class="divider">
                    </li>
                @else
                    <li class="col-xs-6">
                        <div class="post--item post--layout-2">
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
            @endforeach
        </ul>
    </div>
</div>
