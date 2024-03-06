@if ($menu->childSection->count() > 0)
    <li class="dropdown active">
        <a href="{{route('news.'.$menu->slug)}}" class="dropdown-toggle" data-toggle="dropdown">{{$menu->name}} <i class="fa flm fa-angle-down"></i>
        </a>
        <ul class="dropdown-menu">
        @foreach ($menu->childSection as $menu)
            @include('layouts.front.common-menu')
        @endforeach
        </ul>
    </li>
@else
    <li>
        <a href="{{route('news.'.$menu->slug)}}">{{ $menu->name }}</a>
    </li>
@endif

