@extends('front.layout.app')

@section('title')
    {{ _site_title() }}
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
                        <h4 style="font-size: 24px;">{{ _site_title() }} <img src="{{ asset('frontend/assets/images/logo-icon.png') }}" alt=""></h4>
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
                    <h6>Prodcut Name</h6>
                    <h2>Lorem ipsum <em>consectetur</em> adipisicing &amp; Aperiam rerum <span>quaerat</span></h2>
                </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia molestiae laudantium placeat repellat non nihil voluptatum numquam, harum nisi tenetur, assumenda labore minus atque in aliquam alias. Ipsa consequuntur laborum fuga porro, consectetur enim sequi quibusdam voluptatem nostrum ab numquam nisi delectus cupiditate repudiandae mollitia eum aut unde rem illum! Commodi deleniti quae incidunt libero repellendus suscipit vero molestias provident.
                </p>
                <div class="main-green-button">
                    <a href="{{route('home')}}#contact">Get Your Quote</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection