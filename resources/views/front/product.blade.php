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
<div id="about" class="about-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-image wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    <img src="{{ $product->image ?? '' }}" alt="{{ $product->name ?? '' }}">
                </div>
            </div>
            <div class="col-lg-6 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="section-heading">
                    <h6>{{ $product->category_name ?? '' }}</h6>
                    <h2>{{ $product->name ?? '' }}</h2>
                </div>
                <p>{{ $product->description ?? '' }}</p>
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