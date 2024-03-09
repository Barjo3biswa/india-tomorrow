<ul class="nav row" data-ajax-content="inner">
    <li class="col-md-12">
        <div class="post--items-title" data-ajax="tab">
            <h2 class="h4"><a href="{{ route('news.' . $section->slug) }}" class="cat">{{ $section->name }}</a></h2>
        </div>

        <div class="row">
            @foreach ($section->contents($section->slug) as $key=>$news)
            <div class="col-lg-6">
                <div class="post--item post--layout-1 post--type-video post--title-large" style="height: 240px;">
                    <div class="post--img" style="height: 240px;">
                        @include('layouts.front.image-video-show', $news = $news)
                        @php
                            $cat_array = json_decode($news->category);
                        @endphp
                        <a href="{{ route($cat_array[0], [$news->news_slug]) }}"class="btn-link">{{ $news->news_title }}</a>
                    </div>
                </div>
            </div>
            @endforeach
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
