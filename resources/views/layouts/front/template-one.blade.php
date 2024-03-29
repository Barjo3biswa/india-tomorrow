<div class="col-md-6 ptop--0 pbottom--30">
    <div class="post--items-title" data-ajax="tab">
        <h2 class="h4"><a href="{{ route('news.' . $section->slug) }}" class="cat">{{ $section->name }}</a></h2>

    </div>
    <div class="post--items post--items-2" data-ajax-content="outer">
        <ul class="nav row gutter--15" data-ajax-content="inner">
            @php
                $key1 = 0;
            @endphp
            @foreach ($section->contents($section->slug)->take(5) as $key => $news)
                @if ($key1 == 0)
                    <li class="col-xs-12">
                        <div class="post--item interview-section post--layout-1">
                            <div class="post--img">
                                @include('layouts.front.image-video-show', $news = $news)
                                <a href="{{ route('news.' . $section->slug) }}" class="cat">{{ $section->name }}</a>

                                <div class="post--info">
                                    <ul class="nav meta">
                                        <li>
                                            <a href="#">Reported By: {{ $news->reported_by }}</a>
                                        </li>
                                        <li>
                                            <a href="#">{{ date('d-M-Y', strtotime($news->news_date)) }},
                                                {{ date('h:i A', strtotime($news->news_time)) }}</a>
                                        </li>
                                    </ul>
                                    <div class="title">
                                        <h3 class="h4">
                                            @php
                                                $cat_array = json_decode($news->category);
                                            @endphp
                                            <a
                                                href="{{ route($cat_array[0], [$news->news_slug]) }}"class="btn-link">{{ $news->news_title }}</a>
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
                        <div class="post--item post--layout-2 first_temp">
                            <div class="post--img">
                                @include('layouts.front.image-video-show', $news = $news)
                                <div class="post--info">
                                    <div class="title">
                                        <h3 class="h4">
                                            @php
                                                $cat_array = json_decode($news->category);
                                            @endphp
                                            <a href="{{ route($cat_array[0], [$news->news_slug]) }}"
                                                class="btn-link">{{ extractCharacter($news->news_title, 60) }}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endif
                @php
                    $key1 = $key1 + 1;
                @endphp
            @endforeach
        </ul>
    </div>
</div>







