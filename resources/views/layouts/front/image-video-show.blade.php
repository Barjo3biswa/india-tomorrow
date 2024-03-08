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
