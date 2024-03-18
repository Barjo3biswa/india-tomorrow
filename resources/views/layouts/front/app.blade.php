<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>India Tomorrow : Focussing Education</title>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- <link rel="icon" href="favicon.png" type="image/png"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700">
    <link rel="stylesheet" href="{{ asset('fornt-asset') }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('fornt-asset') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('fornt-asset') }}/css/fontawesome-stars-o.min.css">
    <link rel="stylesheet" href="{{ asset('fornt-asset') }}/style.css">
    <link rel="stylesheet" href="{{ asset('fornt-asset') }}/css/responsive-style.css">
    <link rel="stylesheet" href="{{ asset('fornt-asset') }}/css/colors/theme-color-1.css" id="changeColorScheme">
    <link rel="stylesheet" href="{{ asset('fornt-asset') }}/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=65f041d66360a80019e2e78b&product=sop' async='async'></script>
    @yield('css')

    <style>
    .popup_popup {
        display: none !important;
    }
    #st-cmp-v2{
        display: none !important;
    }

    .reveal-container {
     display: flex;
     align-items: center;
     justify-content: center;
     position: relative;
     overflow: hidden;
     animation: revealAnimationContainer 2s INFINITE forwards;
     margin-top: 12px;
    }
    .reveal-text {
        margin: 0;
        padding: 0px;
        color: #da0000;
        font-size: 2.7rem;
        position: relative;
        z-index: 1;
        overflow: hidden;
        animation: revealAnimation 2s forwards INFINITE;
        letter-spacing: 1.2px;
        font-weight: 600;
    }
    @keyframes revealAnimationContainer {
        50% {
            transform: scale(1);
        }
        100% {
            transform: scale(1.8);
        }
    }
    @keyframes revealAnimation {
        0% {
            transform: translateY(100%) ;
        }
        50% {
            transform: translateY(0) ;
        }
        100% {
            transform: translateY(0);
        }
    }
    </style>
</head>

<body>
    <div id="preloader">
        <div class="preloader bg--color-1--b" data-preloader="1">
            <div class="preloader--inner"></div>
        </div>
    </div>
    <div class="wrapper">

        @include('layouts.front.topbar')
        @yield('content')
    </div>
    <footer class="footer--section">
        <div class="footer--widgets pd--30-0 bg--color-2">
            <div class="container">
                <div class="row AdjustRow">
                    <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">About Us</h2>
                                <i class="icon fa fa-exclamation"></i>
                            </div>
                            <div class="about--widget">
                                <div class="content">
                                    <p>India Tomorrow is a education news portel which focus only on catering education updates of NorthEast and India...</p>
                                </div>
                                <div class="action">
                                    <a href="{{route('about-us')}}" class="btn-link">Read More<i
                                            class="fa flm fa-angle-double-right"></i></a>
                                </div>
                                <ul class="nav">
                                    <li><i class="fa fa-map"></i><span>Guwahati, Assam</span>
                                    </li>
                                    <li><i class="fa fa-envelope-o"></i><a
                                            href="mailto:example@indiatomorrow.com">example@indiatomorrow.com</a></li>
                                    <li><i class="fa fa-phone"></i><a href="tel:123456789">123456789</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">Useful Info Links</h2>
                            </div>
                            <div class="links--widget">
                                <ul class="nav">
                                    <li><a href="#" class="fa-angle-right">UGC</a></li>
                                    <li><a href="#" class="fa-angle-right">USTM</a></li>
                                    <li><a href="#" class="fa-angle-right">Gauhati University</a></li>
                                    <li><a href="#" class="fa-angle-right">Tezpur University</a></li>
                                    <li><a href="#" class="fa-angle-right">Cotton University</a></li>
                                    <li><a href="#" class="fa-angle-right">Dibrugarh University</a></li>
                                    <li><a href="#" class="fa-angle-right">NEHU</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">POPULAR CATEGORIES</h2>
                            </div>
                            <div class="links--widget">
                                <ul class="nav">
                                    <li><a href="{{route('news.just-in')}}" class="fa-angle-right">Just In</a></li>
                                    <li><a href="{{route('news.featured')}}" class="fa-angle-right">Featured</a></li>
                                    <li><a href="#" class="fa-angle-right">Trending</a></li>
                                    <li><a href="#" class="fa-angle-right">Most Read</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                        <div class="widget">
                            <div class="widget--title">
                            </div>
                            <div class="links--widget">
                                <ul class="nav">
                                    <li><a href="{{route('about-us')}}" class="fa-angle-right">About Us</a></li>
                                    <li><a href="#" class="fa-angle-right">Contact Us</a></li>
                                    <li><a href="#" class="fa-angle-right">Write to Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="backToTop">
        <a href="#"><i class="fa fa-angle-double-up"></i></a>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="video">
            </div>
        </div>
    </div>
    <script src="{{ asset('fornt-asset') }}/js/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('fornt-asset') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('fornt-asset') }}/js/jquery.sticky.min.js"></script>
    <script src="{{ asset('fornt-asset') }}/js/jquery.hoverIntent.min.js"></script>
    <script src="{{ asset('fornt-asset') }}/js/jquery.marquee.min.js"></script>
    {{-- <script src="{{ asset('fornt-asset') }}/js/jquery.validate.min.js"></script> --}}
    <script src="{{ asset('fornt-asset') }}/js/isotope.min.js"></script>
    {{-- <script src="{{ asset('fornt-asset') }}/js/resizesensor.min.js"></script>
    <script src="{{ asset('fornt-asset') }}/js/theia-sticky-sidebar.min.js"></script>
    <script src="{{ asset('fornt-asset') }}/js/jquery.zoom.min.js"></script>
    <script src="{{ asset('fornt-asset') }}/js/jquery.barrating.min.js"></script>
    <script src="{{ asset('fornt-asset') }}/js/jquery.countdown.min.js"></script>--}}
    <script src="{{ asset('fornt-asset') }}/js/retina.min.js"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>  --}}
    <script src="{{ asset('fornt-asset') }}/js/main.js"></script>

@yield('js')

<script>
    function myfunction(id, news_id){
        var html = `<iframe width="100%" height="315" src="https://www.youtube.com/embed/`+id+`"
        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share">
        </iframe>`;
        $("#video").empty();
        $("#video").append(html);

        var data = {
            'news_id': news_id,
        };
        $.ajax({
            type: 'get',
            url: "{{ route('hit-count') }}",
            data: data,
            success: function(response){
                console.log(response.success);
            },
        });

    }

</script>
</body>


</html>
