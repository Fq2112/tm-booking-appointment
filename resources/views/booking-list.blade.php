@extends('layouts.mst')
@section('title', 'Booking List')
@push('styles')
    <style>
        .component-accordion .panel-group .panel {
            border: 0 none;
            box-shadow: 0 4px 5px -1px #E5E5E5;
            margin-bottom: 15px;
        }

        .component-accordion .panel-group .panel-heading {
            background-color: #fff;
            border-radius: 5px 5px 0 0;
            color: #444;
            padding: 0;
        }

        .component-accordion .panel-group .panel-heading h4 {
            margin: 0;
        }

        .component-accordion .panel-group .panel-heading a:hover.active,
        .component-accordion .panel-group .panel-heading a.active {
            color: var(--main-scheme);
        }

        .component-accordion .panel-group .panel-title a {
            border-radius: 5px 5px 0 0;
            color: #888;
            display: block;
            font-size: 16px;
            font-weight: 500;
            text-transform: none;
            position: relative;
            padding: 15px;
            transition: color .2s ease-in-out;
        }

        .component-accordion .panel-group .panel-title a:hover {
            color: #444;
            text-decoration: none;
        }

        .component-accordion .panel-group .panel-title a b {
            margin-right: 4em;
            float: right;
        }

        .component-accordion .panel-group .panel-title a.collapsed::after,
        .component-accordion .panel-group .panel-title a::after {
            border-left: 1px solid #eee;
            font-family: 'font-icons';
            content: "\ec52";
            line-height: 55px;
            padding-left: 20px;
            position: absolute;
            right: 19px;
            top: 0;
        }

        .component-accordion .panel-group .panel-title a:after {
            content: "\e9eb";
        }

        .component-accordion .panel-body {
            background: #fff;
            color: #888;
            padding: 20px;
        }

        .component-accordion .panel-group .panel-heading + .panel-collapse > .panel-body,
        .component-accordion .panel-group .panel-heading + .panel-collapse > .list-group {
            border-top: 1px solid #eee;
        }

        .toggle-border {
            border-color: #E5E5E5 !important;
        }

        .toggle-header {
            font-size: 14px !important;
            text-transform: uppercase;
        }

        .toggle-content {
            padding: 0 1em .5em !important;
        }

        .toggle-content .list-group-flush {
            margin: 0 !important;
        }

        .toggle-content .list-group-item {
            padding: 0.75rem 0 !important;
        }
    </style>
@endpush
@section('slider')
    <section id="page-title" class="page-title-parallax page-title-dark"
             data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;"
             style="background-image:url({{asset('images/banners/booking-list.jpg')}});background-size:cover;padding:120px 0;">
        <div class="parallax-overlay"></div>
        <div class="container clearfix">
            <h1>Dashboard: Booking List</h1>
            <span>Here you can see your booking history list and its status.</span>
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url()->current()}}">Account</a></li>
                <li class="breadcrumb-item active" aria-current="page">Booking List</li>
            </ol>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        <div class="content-wrap pt-0">
            <div class="container clearfix">
                @if(count($orders) > 0)
                    <div class="component-accordion">
                        <div class="panel-group" id="acc-all" role="tablist">
                            @foreach($orders as $val)
                                @php
                                    $code = $val->uni_code;
                                    $prod = $val->getProduct;
                                    $doc = $val->getDoctor;
                                    $spc = $doc->getSpecialist;
                                    $sch = $val->getSchedule;

                                    if($val->status == 1) {
                                        $color = '#dc3545';
                                        $stats = 'UNPAID';
                                    } elseif($val->status == 2) {
                                        $color = '#28B77A';
                                        $stats = 'PAID';
                                    } else {
                                        $color = '#ffc107';
                                        $stats = 'EXPIRED';
                                    }
                                @endphp
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading-{{$code}}">
                                        <h4 class="panel-title">
                                            <a role="button" data-bs-toggle="collapse" href="#collapse-{{$code}}"
                                               aria-expanded="false" aria-controls="collapse-{{$code}}" class="collapsed">
                                                Order ID #<span class="fw-bolder">{{$val->uni_code}}</span>
                                                <b class="text-uppercase" style="color: {{$color}}">{{$stats}}</b>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-{{$code}}" class="panel-collapse collapse" role="tabpanel" style="height: 0;"
                                         aria-labelledby="heading-{{$code}}" aria-expanded="false" data-parent="#acc-all">
                                        <div class="panel-body">
                                            <div class="component-accordion">
                                                <div class="panel-group" id="acc-all-detail" role="tablist">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading-{{$code}}-schedule">
                                                            <h4 class="panel-title">
                                                                <a role="button" data-bs-toggle="collapse"
                                                                   href="#collapse-{{$code}}-schedule" aria-expanded="false"
                                                                   aria-controls="collapse-{{$code}}-schedule" class="collapsed">
                                                                    Schedule<b>{{$sch->getDay->name.', '.\Carbon\Carbon::parse($val->date)->format('j F Y')}}</b>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse-{{$code}}-schedule" class="panel-collapse collapse"
                                                             role="tabpanel" aria-labelledby="heading-{{$code}}-schedule"
                                                             aria-expanded="false" style="height: 0;"
                                                             data-parent="#acc-all-detail">
                                                            <div class="panel-body">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0">
                                                                        <a href="{{asset('images/specialists/'.$spc->image)}}"
                                                                           data-lightbox="image">
                                                                            <img src="{{asset('images/specialists/'.$spc->image)}}"
                                                                                 alt="{{$spc->name}}" width="256"
                                                                                 class="flex-shrink-0">
                                                                        </a>
                                                                    </div>
                                                                    <div class="flex-grow-1 ms-3">
                                                                        <h5 class="mt-3 mb-1">
                                                                            <i class="icon-user-clock me-2"></i>{{$user->name}}
                                                                        </h5>
                                                                        <blockquote class="mb-3 pr-0" style="font-size: 14px;text-transform: none">
                                                                            <div class="toggle toggle-border mb-3">
                                                                                <div class="toggle-header">
                                                                                    <div class="toggle-title">
                                                                                        Booking Schedule
                                                                                    </div>
                                                                                    <div class="toggle-icon">
                                                                                        <i class="toggle-closed icon-chevron-down1"></i>
                                                                                        <i class="toggle-open icon-chevron-up1"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="toggle-content">
                                                                                    <table style="margin: 0;font-size: 14px;">
                                                                                        <tbody class="font-weight-bold">
                                                                                        <tr>
                                                                                            <td>Day</td>
                                                                                            <td>:&nbsp;</td>
                                                                                            <td>{{$sch->getDay->name}}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Date</td>
                                                                                            <td>:&nbsp;</td>
                                                                                            <td>{{\Carbon\Carbon::parse($val->date)->format('j F Y')}}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Time</td>
                                                                                            <td>:&nbsp;</td>
                                                                                            <td>{{\Carbon\Carbon::parse($sch->start_time)->format('H:i').' - '.\Carbon\Carbon::parse($sch->end_time)->format('H:i')}}</td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>

                                                                            <div class="toggle toggle-border mb-0">
                                                                                <div class="toggle-header">
                                                                                    <div class="toggle-title">
                                                                                        Personal Data
                                                                                    </div>
                                                                                    <div class="toggle-icon">
                                                                                        <i class="toggle-closed icon-chevron-down1"></i>
                                                                                        <i class="toggle-open icon-chevron-up1"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="toggle-content">
                                                                                    <table style="margin: 0;font-size: 14px;">
                                                                                        <tbody class="font-weight-bold">
                                                                                        <tr>
                                                                                            <td>Name</td>
                                                                                            <td>:&nbsp;</td>
                                                                                            <td>{{$user->name}}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Date of Birth</td>
                                                                                            <td>:&nbsp;</td>
                                                                                            <td>{{\Carbon\Carbon::parse($cust->dob)->format('j F Y')}}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Gender</td>
                                                                                            <td>:&nbsp;</td>
                                                                                            <td class="text-capitalize">{{$cust->gender}}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Phone</td>
                                                                                            <td>:&nbsp;</td>
                                                                                            <td>{{$cust->phone}}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Address</td>
                                                                                            <td>:&nbsp;</td>
                                                                                            <td>{{$cust->address}}</td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </blockquote>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading-{{$code}}-product">
                                                            <h4 class="panel-title">
                                                                <a role="button" data-bs-toggle="collapse"
                                                                   href="#collapse-{{$code}}-product" aria-expanded="false"
                                                                   aria-controls="collapse-{{$code}}-product" class="collapsed">
                                                                    Product<b>Rp{{number_format($val->total_price, 2,',','.')}}</b>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse-{{$code}}-product" class="panel-collapse collapse"
                                                             role="tabpanel" aria-labelledby="heading-{{$code}}-product"
                                                             aria-expanded="false" style="height: 0;"
                                                             data-parent="#acc-all-detail">
                                                            <div class="panel-body">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0">
                                                                        <a href="{{asset('images/specialists/'.$spc->image)}}"
                                                                           data-lightbox="image">
                                                                            <img src="{{asset('images/specialists/'.$spc->image)}}"
                                                                                 alt="{{$spc->name}}" width="256"
                                                                                 class="flex-shrink-0">
                                                                        </a>
                                                                    </div>
                                                                    <div class="flex-grow-1 ms-3">
                                                                        <h5 class="mt-3 mb-1">
                                                                            <i class="icon-first-aid me-2"></i>{{$prod->name}}
                                                                        </h5>
                                                                        <blockquote class="mb-3 pr-0" style="font-size: 14px;text-transform: none">
                                                                            <div class="toggle toggle-border mb-3">
                                                                                <div class="toggle-header">
                                                                                    <div class="toggle-title">
                                                                                        Calculation
                                                                                    </div>
                                                                                    <div class="toggle-icon">
                                                                                        <i class="toggle-closed icon-chevron-down1"></i>
                                                                                        <i class="toggle-open icon-chevron-up1"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="toggle-content">
                                                                                    <ul class="list-group list-group-flush">
                                                                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                                                                                            Quantity
                                                                                            <span>1 item</span>
                                                                                        </li>
                                                                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                                                                                            Price/pcs
                                                                                            <span>Rp{{number_format($prod->price,2,',','.')}}</span>
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div class="divider divider-right my-0">
                                                                                        <i class="icon-plus-sign"></i>
                                                                                    </div>
                                                                                    <ul class="list-group list-group-flush">
                                                                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                                                                                            TOTAL
                                                                                            <span style="font-size: large">Rp{{number_format($val->total_price,2,',','.')}}</span>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>

                                                                            <div class="toggle toggle-border mb-0">
                                                                                <div class="toggle-header">
                                                                                    <div class="toggle-title">
                                                                                        Treatment List
                                                                                    </div>
                                                                                    <div class="toggle-icon">
                                                                                        <i class="toggle-closed icon-chevron-down1"></i>
                                                                                        <i class="toggle-open icon-chevron-up1"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="toggle-content">
                                                                                    <ul class="list-group list-group-flush">
                                                                                        @foreach($prod->getTreatment as $treat)
                                                                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                                                                                            {{$treat->name}}
                                                                                            <span>Rp{{number_format($treat->price,2,',','.')}}</span>
                                                                                        </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </blockquote>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="panel panel-default mb-0">
                                                        <div class="panel-heading" role="tab" id="heading-{{$code}}-doctor">
                                                            <h4 class="panel-title">
                                                                <a role="button" data-bs-toggle="collapse"
                                                                   href="#collapse-{{$code}}-doctor" aria-expanded="false"
                                                                   aria-controls="collapse-{{$code}}-doctor" class="collapsed">
                                                                    Doctor
                                                                    <b>{{$doc->name}}</b>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse-{{$code}}-doctor" class="panel-collapse collapse"
                                                             role="tabpanel" aria-labelledby="heading-{{$code}}-doctor"
                                                             aria-expanded="false" style="height: 0;"
                                                             data-parent="#acc-all-detail">
                                                            <div class="panel-body">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0">
                                                                        <a href="{{asset('images/doctors/'.$doc->image)}}"
                                                                           data-lightbox="image">
                                                                            <img src="{{asset('images/doctors/'.$doc->image)}}"
                                                                                 alt="{{$spc->name}}" width="128"
                                                                                 class="flex-shrink-0">
                                                                        </a>
                                                                    </div>
                                                                    <div class="flex-grow-1 ms-3">
                                                                        <h5 class="mt-3 mb-1">
                                                                            <i class="icon-user-md"></i>
                                                                            {{$doc->name}}
                                                                        </h5>
                                                                        <blockquote class="mb-3"
                                                                                    style="font-size: 14px;text-transform: none">
                                                                            <table class="m-0" style="font-size: 14px">
                                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                                    title="SIP Number">
                                                                                    <td><i class="icon-id-card1"></i></td>
                                                                                    <td>&nbsp;</td>
                                                                                    <td>{{$doc->sip}}</td>
                                                                                </tr>
                                                                                <tr data-toggle="tooltip" data-placement="left"
                                                                                    title="Specialist">
                                                                                    <td><i class="icon-medical-i-cardiology"></i></td>
                                                                                    <td>&nbsp;</td>
                                                                                    <td>{{$spc->name}}</td>
                                                                                </tr>
                                                                            </table>
                                                                        </blockquote>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="row justify-content-center text-center">
                        <div class="col">
                            <img width="300" class="img-fluid" src="{{asset('images/loader-image.gif')}}" alt="">
                            <h3 class="mt-0 mb-1">You haven't made any orders</h3>
                            <h4 class="mt-0 mb-3">Complete your medical needs now</h4>
                            <a href="{{route('home')}}"
                               class="button button-rounded button-reveal button-blue button-large m-0">
                                <i class="icon-calendar-alt"></i><span>Start Booking</span></a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        var collapse = $('.panel-collapse');

        $(function () {
            collapse.on('show.bs.collapse', function () {
                $(this).siblings('.panel-heading').addClass('active');
                $(this).siblings('.panel-heading').find('a').addClass('active font-weight-bold');
                $(this).siblings('.panel-heading').find('b').toggle(300);

                $('html,body').animate({scrollTop: $(this).parent().offset().top}, 0);
            });

            collapse.on('hide.bs.collapse', function () {
                $(this).siblings('.panel-heading').removeClass('active');
                $(this).siblings('.panel-heading').find('a').removeClass('active font-weight-bold');
                $(this).siblings('.panel-heading').find('b').toggle(300);

                $('html,body').animate({scrollTop: $("#acc-all").offset().top}, 0);
            });

            $(".panel-body .divider:last-child").remove();
        });
    </script>
@endpush
