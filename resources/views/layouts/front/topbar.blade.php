@php
    use App\Models\newsSection;
    $menu = newsSection::where('parent_id', 0)
                        ->where('status', 'Published')
                        ->get()
                        ->filter(function ($section) {
                            $appearance = $section->setAppearence();
                            return is_array($appearance) && in_array('top', $appearance);
                        });
    $sub_menu = newsSection::where('parent_id', 0)
                        ->where('status', 'Published')
                        ->get()
                        ->filter(function ($section) {
                            $appearance = $section->setAppearence();
                            return is_array($appearance) && in_array('sub', $appearance);
                        });
    $date = \Carbon\Carbon::now();
@endphp
<header class="header--section header--style-4">
    <div class="header--topbar bg--color-1">
        <div class="container">
            <div class="float--left float--xs-none text-xs-center">
                <ul class="header--topbar-info nav">
                    <li>
                        <i class="fa fm fa-map-marker"></i>Guwahati
                    </li>
                    <li>
                        <i class="fa fm fa-mixcloud"></i>{!!getCurrentWeather()!!}
                    </li>
                    <li>
                        <i class="fa fm fa-calendar"></i>Today ({{$date->format('l j F Y')}})
                    </li>
                </ul>
            </div>
            <div class="float--right float--xs-none text-xs-center">
                <ul class="header--topbar-social nav hidden-sm hidden-xxs">
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
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-rss"></i>
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
    <div id="sticky-wrapper" class="sticky-wrapper" style="height: 92px;">
        <div class="header--navbar navbar bd--color-1 bg--color-0" data-trigger="sticky" style="width: 1349px;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#headerNav" aria-expanded="false" aria-controls="headerNav">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="header--logo text-center">
                        <div class="header--logo float--left float--sm-none text-sm-center">
                            <h1 class="h1">
                                <a href="{{route('index')}}" class="btn-link">
                                    <img src="{{ asset('fornt-asset') }}/img/logo.png" alt="USNews Logo">
                                    {{-- <h2><b>India</b><span
                                            style="text-transform: uppercase;
                                background: #db0c0c;
                                color: #fff;
                                padding: 2px 6px;
                                font-size: 24px;margin-left: 6px;">Tomorrow</span>
                                    </h2>
                                    <span class="hidden">Logo</span> --}}
                                </a>
                            </h1>
                        </div>
                    </div>
                </div>
                <form action="#" class="header--search-form float--right" data-form="validate"
                    novalidate="novalidate">
                    <input type="search" name="search" placeholder="Search..."
                        class="header--search-control form-control" required="" aria-required="true">
                    <button type="submit" class="header--search-btn btn">
                        <i class="header--search-icon fa fa-search"></i>
                    </button>
                </form>
                <div id="headerNav" class="navbar-collapse collapse float--right">
                    <ul class="header--menu-links nav navbar-nav" data-trigger="hoverIntent">
                        <li>
                            <a href="{{route('index')}}">Home</a>
                        </li>
                        @foreach ($menu as $menu)
                            @include('layouts.front.common-menu')
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
{{-- <div class="zoom-in-zoom-out">BREAKIBG NEWS</div> --}}
<div class="reveal-container">
    <h1 class="reveal-text">BREAKING NEWS</h1>
</div>
{{-- <div class="posts--filter-bar style--1 hidden-xs">
    <div class="container">
        <ul class="nav">
            @foreach ($sub_menu as $sub)
                <li>
                    <a href="{{route('news.'.$sub->slug)}}">
                        <span>{{$sub->name}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div> --}}



