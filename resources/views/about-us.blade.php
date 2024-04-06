@extends('layouts.front.app')
@section('content')
<div class="container">
    <div class="ad--space pd--20-0-20" style="padding-top: 2rem;">
        <a href="#">
            <img src="img/ads-img/ad-728x90-02.jpg" alt="" class="center-block" data-rjs="2">
        </a>
    </div>
    <nav class="breadcrumbs-nav">
        <ol class="breadcrumbs">
            <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
            <li class="breadcrumb-item current"><a href="#">About Us</a></li>
        </ol>
    </nav>
    @include('layouts.front.scrolling-news')
    <div class="main-content--section pbottom--30-0">
        <div class="container-fluid">
            <div class="row">
                <div class="main--content col-md-10 col-sm-10">
                    <p>
                        India Tomorrow is a education news portel which focus only on catering education updates of NorthEast and India.
                        We as a team promise to update and give all accurate information on education. India Tomorrow can help you in
                        taking decisions regarding career and future plans. On your video section we have speakers who speaks on every
                        particular academic plans. Also we cover stories of every education aspect of tye society.
                    </p>
                </div>
                <div class="col-md-1"></div>

            </div>
        </div>
    </div>
</div>
@endsection
