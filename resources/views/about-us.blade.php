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
    <br><br>
    <div class="main-content--section pbottom--30-0">
        <div class="container-fluid">
            <div class="row">
                <div class="main--content col-md-12 col-sm-12">
                    <p>
                        Welcome to "India Tomorrow," the premier educational news portal of the North East, powered by ERD Foundation.
                        Committed to delivering accurate and insightful updates, we are your go-to source for educational news from the
                        vibrant region. At "India Tomorrow," we understand the significance of informed decisions in shaping your career
                        and future endeavors. Our comprehensive coverage includes regular educational news, special stories highlighting
                        individual achievements, in-depth analyses of education policies, and engaging discussions on topics related to
                        education. Explore our video section featuring expert speakers, offering valuable insights to empower your educational
                        journey. Trust "India Tomorrow" for timely, reliable, and enriching updates.
                    </p>
                </div>

            </div>
        </div>
    </div>
    <br><br>
</div>
@endsection
