@php
    use App\Models\newsContent;
    $scrolling_news = newsContent::where('status','Published')->where('scrolling','true')->whereNotNull('category')->get();
@endphp

<div class="news--ticker">
    <div class="container-fluid1">
        <div class="title">
            <h2>News Updates</h2>
            <span>(Update 12 minutes ago)</span>
        </div>
        <div class="news-updates--list" data-marquee="true">
            <ul class="nav">
                @foreach ($scrolling_news as $news)
                    @php
                        $cat_array = json_decode($news->category);
                    @endphp
                    <li>
                        <h3 class="h3">
                            <a href="{{route($cat_array[0],[$news->news_slug])}}">{{$news->news_title}}</a>
                        </h3>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
