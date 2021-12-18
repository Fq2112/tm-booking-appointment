@extends('layouts.mst')
@section('title', 'Home')
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
                <div class="row col-mb-50 mb-0">
                    <div class="col-sm-6 col-md-4">
                        <div class="feature-box fbox-plain">
                            <div class="fbox-icon" data-animate="bounceIn">
                                <a href="#"><i class="icon-medical-i-cardiology"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>Intensive Care</h3>
                                <p>{{\Faker\Factory::create()->paragraph(2)}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="feature-box fbox-plain">
                            <div class="fbox-icon" data-animate="bounceIn" data-delay="200">
                                <a href="#"><i class="icon-medical-i-social-services"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>Family Planning</h3>
                                <p>{{\Faker\Factory::create()->paragraph(2)}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="feature-box fbox-plain">
                            <div class="fbox-icon" data-animate="bounceIn" data-delay="400">
                                <a href="#"><i class="icon-medical-i-neurology"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>Expert Consultation</h3>
                                <p>{{\Faker\Factory::create()->paragraph(2)}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="feature-box fbox-plain">
                            <div class="fbox-icon" data-animate="bounceIn">
                                <a href="#"><i class="icon-medical-i-dental"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>Dental Sciences</h3>
                                <p>{{\Faker\Factory::create()->paragraph(2)}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="feature-box fbox-plain">
                            <div class="fbox-icon" data-animate="bounceIn" data-delay="200">
                                <a href="#"><i class="icon-medical-i-imaging-root-category"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>X-Ray Services</h3>
                                <p>{{\Faker\Factory::create()->paragraph(2)}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="feature-box fbox-plain">
                            <div class="fbox-icon" data-animate="bounceIn" data-delay="400">
                                <a href="#"><i class="icon-medical-i-ambulance"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>24/7 Emergency</h3>
                                <p>{{\Faker\Factory::create()->paragraph(2)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="section-specialists" class="section mt-0">
                <div class="container clearfix">
                    <div class="heading-block center border-bottom-0 mb-4">
                        <h3>{{env('APP_NAME')}} <span>Specialists</span></h3>
                    </div>

                    <div class="owl-carousel flip-carousel carousel-widget" data-margin="20" data-nav="true"
                         data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-lg="3" data-items-xl="4"
                         style="overflow: visible;">
                        @foreach($specialists as $spc)
                            <div class="flip-card text-center">
                                <div class="flip-card-front dark br-20"
                                     style="background-image: url({{asset('images/specialists/'.$spc->image)}})">
                                    <div class="flip-card-inner">
                                        <div class="card bg-transparent border-0">
                                            <div class="card-body">
                                                <h4 class="card-title mb-0">{{$spc->name}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flip-card-back bg-main-scheme no-after br-20">
                                    <div class="flip-card-inner">
                                        <p class="mb-2 text-white">{{\Illuminate\Support\Str::words($spc->desc,10,'...')}}</p>
                                        <a href="{{route('booking-form',['q' => $spc->permalink])}}"
                                           class="btn btn-outline-light mt-2 fw-bold br-20">
                                            <i class="icon-user-md me-2"></i>FIND DOCTOR</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div id="section-doctors" class="container clearfix">
                <div class="heading-block center border-bottom-0">
                    <h3>{{env('APP_NAME')}} <span>Doctors</span></h3>
                </div>

                <div id="oc-team" class="owl-carousel team-carousel carousel-widget" data-margin="30" data-nav="true"
                     data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-lg="3" data-items-xl="4">
                    @foreach($doctors as $doc)
                        <a href="{{route('booking-form',['q' => $doc->getSpecialist->permalink,'id' => encrypt($doc->id)])}}">
                            <div class="team">
                                <div class="team-image">
                                    <img src="{{!is_null($doc->image) ? asset('images/doctors/'.$doc->image) : asset('images/avatar/'.rand(1,5).'.png')}}"
                                         alt="{{$doc->name}}" style="border-radius: 6px">
                                </div>
                                <div class="team-desc">
                                    <div class="team-title"><h4 style="text-transform: none">{{$doc->name}}</h4><span>{{$doc->getSpecialist->name}}</span></div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
@endpush
