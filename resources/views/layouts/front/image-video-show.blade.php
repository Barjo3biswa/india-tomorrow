@php
    $cat_array = json_decode($news->category);
    $test = $news->youtube_url;

    $position = strpos($test, 'si');
    // dump($news);
    if ($position !== false) {
        $substring = substr($test, 0, $position);
        if (substr($substring, -1) === '?') {
            $substring = substr($substring, 0, -1);
        }
    }
@endphp
@if ($news->photo_or_video == 'photo')
    <a href="{{ route($cat_array[0], [$news->news_slug]) }}" class="thumb">
        <img src="{{ asset($news->image) }}" alt="{{ $news->news_slug }}" width="600" height="300">
    </a>
@else
    <a href="#" class="thumb" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="myfunction('{{ $news->youtube_url }}', '{{ $news->id }}')">
        <img src="https://img.youtube.com/vi/{{ $substring }}/0.jpg" alt="$cat_array[0]" width="600" height="300">
        <div class="play-button"></div>
    </a>

@endif


