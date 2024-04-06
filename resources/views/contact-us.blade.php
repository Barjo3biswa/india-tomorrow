@extends('layouts.front.app')
@section('content')
<div class="container">
    <nav class="breadcrumbs-nav">
        <ol class="breadcrumbs">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item current"><a href="#">Contact Us</a></li>
        </ol>
    </nav>

    <div class="contact--section pd--30-0">
        <div class="container">
            <div class="form">
                <div class="contact-info">
                <h3 class="title">Let's get in touch</h3>
                <p class="text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
                    dolorum adipisci recusandae praesentium dicta!
                </p>

                <div class="info">
                    <div class="information">
                    <i class="fa fa-map-marker"></i> &nbsp &nbsp

                    <p>Guwahati, Assam</p>
                    </div>
                    <div class="information">
                    <i class="fa fa-envelope"></i> &nbsp &nbsp
                    <p>indiatomorrow@gmail.com</p>
                    </div>
                    <div class="information">
                    <i class="fa fa-phone"></i>&nbsp&nbsp
                    <p>123456789</p>
                    </div>
                </div>

                <div class="social-media">
                    <p>Connect with us :</p>
                    <div class="social-icons">
                    <a href="#">
                        <i class="fa fa-facebook-f"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-linkedin"></i>
                    </a>
                    </div>
                </div>
                </div>

                <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>

                <form action="index.html" autocomplete="off">
                    <h3 class="title">Contact us</h3>
                    <div class="input-container">
                    <input type="text" name="name" class="input" />
                    <label for="">Enter your name</label>
                    <span>Enter your name</span>
                    </div>
                    <div class="input-container">
                    <input type="email" name="email" class="input" />
                    <label for="">Email</label>
                    <span>Email</span>
                    </div>
                    <div class="input-container">
                    <input type="tel" name="phone" class="input" />
                    <label for="">Phone</label>
                    <span>Phone</span>
                    </div>
                    <div class="input-container textarea">
                    <textarea name="message" class="input"></textarea>
                    <label for="">Message</label>
                    <span>Message</span>
                    </div>
                    <input type="submit" value="Send" class="btn" />
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
