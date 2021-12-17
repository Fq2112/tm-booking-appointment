@extends('layouts.mst')
@section('title', 'Booking List')
@push('styles')
@endpush
@section('slider')
    <section id="slider" class="slider-element swiper_wrapper min-vh-50 min-vh-md-100"
             data-loop="true" data-autoplay="5000">
        <div class="slider-inner">
            <div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="container">
                            <div class="slider-caption slider-caption-right" style="max-width: 700px;">
                                <div>
                                    <h2 data-animate="flipInX">Experts <span>Team</span></h2>
                                    <p class="d-none d-sm-block" data-animate="flipInX" data-delay="500">Our Team of
                                        Doctors are specialized in Various Disciplines to make sure you get the Best
                                        Treatment.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide-bg" style="background-image: url({{asset('images/slider/1.jpg')}});"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="container">
                            <div class="slider-caption">
                                <div>
                                    <h2 data-animate="zoomIn">Heart<span>Beat</span></h2>
                                    <p class="d-none d-sm-block" data-animate="zoomIn" data-delay="500">Care for your
                                        Loved Ones from the Experts in the Medical &amp; Hospitality Industry.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide-bg" style="background-image: url({{asset('images/slider/2.jpg')}});"></div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" data-scrollto="#content" data-easing="easeInOutExpo" data-speed="1250" data-offset="65"
           class="one-page-arrow"><i class="icon-angle-down infinite animated fadeInDown"></i></a>
    </section>
@endsection
@section('content')
    <section id="content">
        <div class="content-wrap pt-0">
            <div class="container clearfix">

            </div>
        </div>
    </section>
@endsection
@push('scripts')
@endpush
