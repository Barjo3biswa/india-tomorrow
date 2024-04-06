<div class="col-md-12 ptop--30 pbottom--30">
    <div class="post--items-title" data-ajax="tab">
        <h2 class="h4"><a href="{{route('news.'.$section->slug)}}" class="cat">{{$section->name}}</a></h2>
    </div>
    <div class="post--items post--items-2 bg-color" data-ajax-content="outer">
        <ul class="nav row" data-ajax-content="inner">
            @php
                $key3= 0;
            @endphp
            @foreach ($section->contents($section->slug)->take(5) as $key=>$news)
                @if ($key3==0)
                <li class="col-md-6">
                    <div class="post--item post--layout-2 bg-white third_temp">
                        <div class="post--img">
                            @include('layouts.front.image-video-show', $news = $news)
                            <a href="{{route('news.'.$section->slug)}}" class="cat">{{$section->name}}</a>
                            <div class="post--info" style="height: 110px;">
                                <div class="title">
                                    <h3 class="h4">
                                        @php
                                            $cat_array = json_decode($news->category);
                                        @endphp
                                        <a href="{{route($cat_array[0],[$news->news_slug])}}" class="btn-link">{{date('d-M-Y', strtotime($news->news_date))}}, {{date("h:i A", strtotime($news->news_time))}}{{$key3}}</a>
                                    </h3>
                                    <p>{{extractCharacter($news->news_title, 60)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @else
                    @if ($key3==1)
                        <li class="col-md-6">
                            <ul class="nav row">
                                <li class="col-xs-12 hidden-md hidden-lg">
                                    <hr class="divider">
                                </li>
                    @endif
                                <li class="col-xs-6 just-in-li-p">
                                    <div class="post--item post--layout-2 bg-white just-in-sm-img">
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
                                                        <a href="#"
                                                            class="btn-link">{{extractCharacter($news->news_title, 60)}}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="divider">
                                </li>
                    @if ($key3==($section->contents($section->slug)->count()-1))
                            </ul>
                        </li>
                    @endif
                @endif
                @php
                    $key3 = $key3+1;
                @endphp
            @endforeach
        </ul>
    </div>
</div>
