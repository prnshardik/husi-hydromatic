@extends('front.layout.app')

@section('title')
    {{ _settings('SITE_TITLE') }}
@endsection

@section('meta')
@endsection

@section('styles')
@endsection

@section('content')
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="{{ route('home') }}" class="logo">
                        <h4 style="font-size: 24px;">{{ _settings('SITE_TITLE') }} <img src="{{ asset('frontend/assets/images/logo-icon.png') }}" alt=""></h4>
                    </a>
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{route('home')}}/#top" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="{{route('home')}}#products">Products</a></li>
                        <li class="scroll-to-section"><a href="{{route('home')}}#about">About Us</a></li>
                        <li class="scroll-to-section"><a href="{{route('home')}}#contact">Contact Us</a></li> 
                        <li class="scroll-to-section"><div class="main-blue-button"><a href="{{route('home')}}#contact">Get Your Quote</a></div></li> 
                    </ul>        
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>

<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Khushi Hydromatic</h2>
                                </div>
                                <div class="col-lg-12">
                                    <div class="main-green-button scroll-to-section">
                                        <a href="#contact">Get Your Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                            <img src="{{ asset('frontend/assets/images/banner-right-image.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="products" class="our-portfolio section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h6>Our Products</h6>
                    <h2>Discover Our <em>Products</em> And <span>Showcases</span></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="row">
            <div class="col-lg-12">
                <div class="loop owl-carousel">
                    @if($products->isNotEmpty())
                        @foreach($products as $k => $v)
                            <div class="item">
                                <div class="portfolio-item">
                                    <div class="thumb">
                                        <img src="{{ $v->image }}" alt="{{ $v->name }}">
                                        <div class="hover-content">
                                            <div class="inner-content">
                                                <a href="{{ route('product', base64_encode($v->id)) }}"><h4>{{ $v->name }}</h4></a>
                                                <span>{{ $v->category_name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div id="about" class="about-us section">
    <div class="container">
    <div class="row">
        <div class="col-lg-6">
        <div class="left-image wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
            <img src="{{ asset('frontend/assets/images/about-left-image.png') }}" alt="">
        </div>
        </div>
        <div class="col-lg-6 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="section-heading">
            <h6>About Us</h6>
            <h2>Top <em>marketing</em> agency &amp; consult your website <span>with us</span></h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-4">
            <div class="about-item">
                <h4>750+</h4>
                <h6>projects finished</h6>
            </div>
            </div>
            <div class="col-lg-4 col-sm-4">
            <div class="about-item">
                <h4>340+</h4>
                <h6>happy clients</h6>
            </div>
            </div>
            <div class="col-lg-4 col-sm-4">
            <div class="about-item">
                <h4>128+</h4>
                <h6>awards</h6>
            </div>
            </div>
        </div>
        <p>Incepted in the year of 2010, we at Khushi Hydromatic are pleased to introduce ourselves as Exporter/stockiest/supplier of Hydraulic Pumps, Hydraulic valve, Hydraulic Vane Pumps, Hydraulic Valves, Yuken Hydraulic Products, etc. In global market, we are recognized as one of the most dependable Hydraulic Valve and Pump Exporters and  Distributor. We work very closely with our international partners to offer the best Brands at most reasonable prices. It is our humble effort to reduce your Purchase costs & also offer Hydraulic equipment & accessories for OEM requirements.</p>
        <div class="main-green-button"><a href="#products">Discover company</a></div>
        </div>
    </div>
    </div>
</div>

<div id="contact" class="contact-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                <form id="contact" action="" method="post">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="section-heading">
                                <h6>Contact Us</h6>
                                <h2>Fill Out The Form Below To <span>Get</span> In <em>Touch</em> With Us</h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <fieldset>
                                        <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <input type="surname" name="surname" id="surname" placeholder="Surname" autocomplete="on" required>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-6">
                                    <fieldset>
                                        <input type="subject" name="subject" id="subject" placeholder="Subject" autocomplete="on">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>  
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button ">Send Message Now</button>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-info">
                                <ul>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="icon">
                                                    <img src="{{ asset('frontend/assets/images/contact-icon-01.png') }}" alt="email icon">
                                                </div>
                                                <a href="#">{{_settings('CONTACT_EMAIL')}}</a>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="icon">
                                                    <img src="{{ asset('frontend/assets/images/contact-icon-01.png') }}" alt="email icon">
                                                </div>
                                                <a href="#">{{_settings('MAIN_CONTACT_EMAIL')}}</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="icon">
                                                    <img src="{{ asset('frontend/assets/images/contact-icon-02.png') }}" alt="phone">
                                                </div>
                                                <a href="#">{{_settings('MAIN_CONTACT_NUMBER')}}</a>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="icon">
                                                    <img src="{{ asset('frontend/assets/images/contact-icon-02.png') }}" alt="phone">
                                                </div>
                                                <a href="#">{{_settings('CONTACT_NUMBER')}}</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="icon">
                                                    <img src="{{ asset('frontend/assets/images/contact-icon-03.png') }}" alt="location">
                                                </div>
                                                <a href="#">{!! _settings('CONTACT_ADDRESS') !!}</a>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="icon">
                                                    <img src="{{ asset('frontend/assets/images/contact-icon-03.png') }}" alt="location">
                                                </div>
                                                <a href="#">{!! _settings('MAIN_CONTACT_ADDRESS') !!}</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection