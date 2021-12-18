@extends('layouts.mst')
@section('title', 'Booking Appointment')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        form .postcontent {
            width: 70%;
            margin-right: 1.5rem;
        }

        form .sidebar {
            width: 27%;
        }

        .myCard {
            display: block;
            margin-bottom: 20px;
            line-height: 1.42857143;
            background-color: #fff;
            border-radius: 2px;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            transition: box-shadow .25s;
        }

        .myCard .stats {
            font-size: 15px;
        }

        .myCard:hover {
            box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .myCard .img-card {
            width: 100%;
            border-top-left-radius: 2px;
            border-top-right-radius: 2px;
            display: block;
            overflow: hidden;
        }

        .myCard .img-card img {
            width: 100%;
            object-fit: cover;
            transition: all .25s ease;
        }

        .myCard .card-content {
            padding: 15px;
            text-align: left;
        }

        .myCard .card-content small {
            text-transform: uppercase;
            font-size: 14px;
        }

        .myCard .card-content p {
            text-transform: none;
            font-size: 13px;
        }

        .myCard .card-content table {
            font-size: 16px;
            margin-top: 30px;
        }

        .myCard .card-content table tr > td {
            padding-bottom: .5em;
        }

        .myCard .card-title, .myCard .card-title h4 {
            margin-top: 0;
            margin-bottom: .25em;
            font-weight: 700;
            text-transform: capitalize;
        }

        .myCard .card-title a {
            color: #777;
            font-weight: 700;
            transition: all .3s ease;
            text-decoration: none !important;
        }

        .myCard .card-title a:hover, .myCard .card-title a:focus, .myCard .card-title a:active {
            color: #122752;
        }

        .myCard .card-title ul {
            margin: 0 0 0 1.5em;
            font-size: 14px;
            text-transform: none;
        }

        .myCard .card-footer {
            background-color: #fff;
        }

        .myCard .card-footer .btn {
            border-radius: 0 0 4px 4px;
            font-size: 14px;
            padding: 10px 20px;
            font-weight: 600;
        }

        .myCard .card-read-more {
            border-top: 1px solid #D4D4D4;
        }

        .myCard .card-read-more a, .myCard .card-read-more button {
            text-decoration: none !important;
            padding: 10px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .myCard .card-footer .btn:hover, .myCard .card-footer .btn:focus, .myCard .card-footer .btn:active,
        .myCard .card-read-more button:hover, .myCard .card-read-more button:focus, .myCard .card-read-more button:active {
            border-radius: 0 0 4px 4px !important;
        }

        .Card {
            position: relative;
            width: 100%;
            background: #fff;
            border-radius: 4px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        .Card:hover .Card-thumbnailOverlay {
            opacity: 1;
        }

        .Card .Card-thumbnail {
            width: 100%;
            border-top-left-radius: 2px;
            border-top-right-radius: 2px;
            position: relative;
            height: 0;
            padding-bottom: 100%;
            overflow: hidden;
            background: #4A4A4A;
        }

        .Card .Card-thumbnailImage {
            width: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
        }

        .Card .Card-thumbnailOverlay {
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            height: 100%;
            color: #fff;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: 0.2s all;
        }

        .Card .Card-Btn {
            display: inline-block;
            width: 120px;
            padding: 8px;
            line-height: 27px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 11px;
            color: #fff;
            background: transparent;
            border: 2px solid #fff;
            border-radius: 4px;
            outline: 0;
            transition: 0.15s background;
            cursor: pointer;
        }

        .Card .Card-Btn:hover, .Card .Card-Btn:focus {
            background: #122752;
            border: 2px solid #122752;
        }

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
             style="background-image:url({{asset('images/banners/booking-form.jpg')}});background-size:cover;padding:120px 0;">
        <div class="parallax-overlay"></div>
        <div class="container clearfix">
            <h1>Booking Appointment</h1>
            <span>Here you can book an appointment with <b class="color">{{env('APP_NAME')}}</b> Specialists.</span>
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url()->current()}}">Booking Appointment</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form</li>
            </ol>
        </div>
    </section>
@endsection
@section('content')
    <section id="content">
        <div class="content-wrap pt-0">
            <div class="container clearfix">
                <form id="form-booking" class="row" method="POST" onkeydown="return event.key != 'Enter';">
                    @csrf
                    <div class="postcontent mb-0 pb-0 clearfix">
                        <div class="myCard mb-4">
                            <div class="card-content">
                                <div class="card-title">
                                    <h4 class="text-center color">Specify Your Needs</h4>
                                    <h5 class="text-center mb-2" style="text-transform: none">
                                        Choose your preferred specialist</h5>
                                    <div class="divider divider-center mt-1 mb-1"><i class="icon-circle"></i></div>
                                    <div class="component-accordion">
                                        <div id="preload-order" class="css3-spinner"
                                             style="z-index: 1;position:relative;top:3em;display: none">
                                            <div class="css3-spinner-bounce1"></div>
                                            <div class="css3-spinner-bounce2"></div>
                                            <div class="css3-spinner-bounce3"></div>
                                        </div>
                                        <div class="panel-group" id="accordion" role="tablist">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="heading-specialist">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-bs-toggle="collapse"
                                                           href="#collapse-specialist" aria-expanded="false"
                                                           aria-controls="collapse-specialist" class="collapsed">
                                                            Specialists<b>&ndash;</b>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse-specialist" class="panel-collapse collapse"
                                                     role="tabpanel" aria-labelledby="heading-specialist"
                                                     aria-expanded="false" style="height: 0;" data-parent="#accordion">
                                                    <div class="panel-body">
                                                        <select name="specialist_id" id="specialist_id" class="use-select2">
                                                            <option value="" selected disabled>-- CHOOSE SPECIALIST --</option>
                                                            @foreach($specialists as $spc)
                                                                <option value="{{$spc->id}}" data-image="{{asset('images/specialists/'.$spc->image)}}">{{$spc->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel panel-default" style="display: none">
                                                <div class="panel-heading" role="tab" id="heading-doctor">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-bs-toggle="collapse"
                                                           href="#collapse-doctor" aria-expanded="false"
                                                           aria-controls="collapse-doctor" class="collapsed">
                                                            Doctors<b>&ndash;</b>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse-doctor" class="panel-collapse collapse"
                                                     role="tabpanel" aria-labelledby="heading-doctor"
                                                     aria-expanded="false" style="height: 0;" data-parent="#accordion">
                                                    <div class="panel-body">
                                                        <select name="doctor_id" id="doctor_id" class="use-select2">
                                                            <option value="" selected disabled>-- CHOOSE DOCTOR --</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel panel-default" style="display: none">
                                                <div class="panel-heading" role="tab" id="heading-product">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-bs-toggle="collapse"
                                                           href="#collapse-product" aria-expanded="false"
                                                           aria-controls="collapse-product" class="collapsed">
                                                            Products<b>&ndash;</b>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse-product" class="panel-collapse collapse"
                                                     role="tabpanel" aria-labelledby="heading-product"
                                                     aria-expanded="false" style="height: 0;" data-parent="#accordion">
                                                    <div class="panel-body">
                                                        <select name="product_id" id="product_id" class="use-select2">
                                                            <option value="" selected disabled>-- CHOOSE PRODUCT --</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel panel-default" style="display: none">
                                                <div class="panel-heading" role="tab" id="heading-schedule">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-bs-toggle="collapse"
                                                           href="#collapse-schedule" aria-expanded="false"
                                                           aria-controls="collapse-schedule" class="collapsed">
                                                            Schedule<b>&ndash;</b>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse-schedule" class="panel-collapse collapse"
                                                     role="tabpanel" aria-labelledby="heading-schedule"
                                                     aria-expanded="false" style="height: 0;" data-parent="#accordion">
                                                    <div class="panel-body">
                                                        <div class="row form-group">
                                                            <div class="col">
                                                                <label for="book_date">Date <span class="color">*</span></label>
                                                                <input type="text" id="book_date" required
                                                                       class="form-control"
                                                                       placeholder="yyyy-mm-dd" maxlength="10">
                                                            </div>
                                                            <div class="col">
                                                                <label for="book_time">Time <span class="color">*</span></label>
                                                                <input type="text" id="book_time" required
                                                                       class="form-control timepicker"
                                                                       placeholder="hh:mm">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col d-grid">
                                                                <button id="btn_bio" type="button" onclick="saveSchedule()"
                                                                        class="btn btn-primary text-uppercase border-0">
                                                                    SAVE CHANGES</button>
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

                        <div class="myCard">
                            <div class="card-content">
                                <div class="card-title">
                                    <h4 class="text-center color">Personal Data</h4>
                                    <h5 class="text-center mb-2" style="text-transform: none">
                                        Complete your personal data carefully</h5>
                                    <div class="divider divider-center mt-1 mb-1"><i class="icon-circle"></i></div>
                                    <div class="component-accordion">
                                        <div class="panel-group" id="accordion" role="tablist">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="heading-biodata">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-bs-toggle="collapse"
                                                           href="#collapse-biodata" aria-expanded="false"
                                                           aria-controls="collapse-biodata" class="collapsed">
                                                            Biodata<b>&ndash;</b>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse-biodata" class="panel-collapse collapse"
                                                     role="tabpanel" aria-labelledby="heading-biodata"
                                                     aria-expanded="false" style="height: 0;" data-parent="#accordion">
                                                    <div class="panel-body">
                                                        <div class="row form-group">
                                                            <div class="col-8">
                                                                <label for="book_name">Name <span class="color">*</span></label>
                                                                <input type="text" class="form-control" id="book_name"
                                                                       placeholder="Enter your name" required>
                                                            </div>
                                                            <div class="col-4">
                                                                <label for="book_male">Gender <span class="color">*</span></label><br>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="book_gender" id="book_male"
                                                                           value="male" required>
                                                                    <label class="form-check-label" for="book_male">
                                                                        Male
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="book_gender" id="book_female"
                                                                           value="female" required>
                                                                    <label class="form-check-label" for="book_female">
                                                                        Female
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-8">
                                                                <label for="book_phone">Phone <span class="color">*</span></label>
                                                                <input type="text" id="book_phone"
                                                                       class="form-control" required
                                                                       onkeypress="return numberOnly(event, false)"
                                                                       placeholder="Enter your phone number">
                                                            </div>
                                                            <div class="col-4">
                                                                <label for="book_dob">Date of Birth <span class="color">*</span></label>
                                                                <input type="text" id="book_dob" required
                                                                       class="form-control datepicker"
                                                                       placeholder="yyyy-mm-dd" maxlength="10">
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col">
                                                                <label for="book_address">Address <span class="color">*</span></label>
                                                                <textarea id="book_address" class="form-control"
                                                                          placeholder="Enter your address"
                                                                          name="address" rows="3" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col d-grid">
                                                                <button id="btn_bio" type="button" onclick="saveBio()"
                                                                        class="btn btn-primary text-uppercase border-0">
                                                                    SAVE CHANGES</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="heading-account">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-bs-toggle="collapse"
                                                           href="#collapse-account" aria-expanded="false"
                                                           aria-controls="collapse-account" class="collapsed">
                                                            Account<b>&ndash;</b>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse-account" class="panel-collapse collapse"
                                                     role="tabpanel" aria-labelledby="heading-account"
                                                     aria-expanded="false" style="height: 0;" data-parent="#accordion">
                                                    <div class="panel-body">
                                                        <div class="row form-group">
                                                            <div class="col">
                                                                <label for="book_email">Email <span class="color">*</span></label>
                                                                <input type="email" class="form-control" id="book_email"
                                                                       placeholder="Enter your email" required>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col">
                                                                <label for="book_password">Password <span class="color">*</span></label>
                                                                <input type="password" class="form-control" id="book_password"
                                                                       placeholder="Enter your password" required>
                                                            </div>
                                                            <div class="col">
                                                                <label for="book_password_confirm">Confirmation Password <span class="color">*</span></label>
                                                                <input type="password" class="form-control" id="book_password_confirm"
                                                                       placeholder="Enter your password again" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col d-grid">
                                                                <button id="btn_account" type="button" onclick="saveAccount()"
                                                                        class="btn btn-primary text-uppercase border-0">
                                                                    SAVE CHANGES</button>
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
                    </div>

                    <div class="sidebar sticky-sidebar-wrap col_last mb-0 clearfix">
                        <div class="sidebar-widgets-wrap">
                            <div class="sticky-sidebar">
                                <div class="myCard">
                                    <div class="card-content pb-0">
                                        <div class="card-title m-0">
                                            <h4 class="text-center color">Order Summary</h4>
                                            <h5 class="text-center mb-2" style="text-transform: none">
                                                Make sure your order is correct
                                            </h5>
                                            <div class="divider divider-center mt-1 mb-2"><i class="icon-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="preload-summary" class="css3-spinner"
                                         style="z-index: 1;top: 3rem;display: none">
                                        <div class="css3-spinner-bounce1"></div>
                                        <div class="css3-spinner-bounce2"></div>
                                        <div class="css3-spinner-bounce3"></div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                                            Subtotal (1 item)
                                            <span class="show-total">Rp{{number_format(0,2,',','.')}}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                                            Discount 0%
                                            <span>-Rp{{number_format(0,2,',','.')}}</span>
                                        </li>
                                    </ul>
                                    <div class="card-content pt-0 pb-0">
                                        <div class="divider divider-right mt-0 mb-0"><i class="icon-plus-sign"></i>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                                            TOTAL
                                            <span class="show-total" style="font-size: large">Rp{{number_format(0,2,',','.')}}</span>
                                        </li>
                                    </ul>
                                    <div class="card-content pb-0">
                                        <div class="alert alert-warning">
                                            <i class="icon-warning-sign"></i><strong>ATTENTION!</strong> Complete all the following inputs for your order first.
                                        </div>
                                    </div>
                                    <div class="card-footer d-grid p-0">
                                        <button id="btn_pay" type="button" style="text-align: left" onclick="checkout()"
                                                class="btn btn-primary text-uppercase border-0">
                                            CHECKOUT <span style="float: right"><i class="icon-chevron-right"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="user_id" value="{{is_null($user) ? null : $user->id}}">
                    <input type="hidden" name="total_price" value="0">
                    <input type="hidden" name="uni_code" value="{{strtoupper(uniqid('PYM') . now()->timestamp)}}">
                </form>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{env('MIDTRANS_SERVER_KEY')}}"></script>
    <script>
        var collapse = $('.panel-collapse'),
            specialist_id = $("#specialist_id"),
            doctor_id = $("#doctor_id"),
            product_id = $("#product_id");

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

                $('html,body').animate({scrollTop: $("#content").offset().top}, 0);
            });

            $(".panel-body .divider:last-child").remove();

            $('#book_dob').datepicker({format: "yyyy-mm-dd", autoclose: true, todayHighlight: true, todayBtn: true});
            $('#book_date').datepicker({format: "yyyy-mm-dd", autoclose: true, todayHighlight: true, todayBtn: true,startDate: "today"});
            $("#book_time").daterangepicker({
                timePicker: true,
                timePicker24Hour: true,
                timePickerIncrement: 1,
                timePickerSeconds: true,
                locale: {format: 'HH:mm'}
            }).on('show.daterangepicker', function (ev, picker) {
                picker.container.find(".calendar-table").hide();
            });
        });

        specialist_id.select2({
            templateResult: formatState,
            width: '100%',
            placeholder: "-- CHOOSE SPECIALIST --",
        });

        function formatState (opt) {
            if (!opt.id) {
                return opt.text;
            }

            var optimage = $(opt.element).attr('data-image');
            if(!optimage){
                return opt.text;
            } else {
                var $opt = $(
                    '<span><img src="' + optimage + '" width="64"> ' + opt.text + '</span>'
                );
                return $opt;
            }
        }

        specialist_id.on('select2:select', function (e) {
            var data = e.params.data;

            $('#collapse-specialist').collapse('toggle');
            $("#heading-specialist").find('b').text(data.text);

            $("#heading-doctor").parent().show();
            doctor_id.empty().trigger('change');
            doctor_id.append($('<option value="" selected disabled>-- CHOOSE DOCTOR --</option>'));
            doctor_id.select2({
                templateResult: formatState,
                width: '100%',
                placeholder: "-- CHOOSE DOCTOR --",
            });

            $.get("{{route('booking-data')}}?spc="+specialist_id.val(), function(data) {
                $.each(data, function (i,val) {
                    doctor_id.append($("<option></option>")
                        .attr("value", val.id)
                        .attr("data-spc", val.specialist_id)
                        .attr("data-image", "{{asset('images/doctors')}}/" +val.image)
                        .text(val.name));
                });
            });
        });

        doctor_id.on('select2:select', function (e) {
            var data = e.params.data;

            $('#collapse-doctor').collapse('toggle');
            $("#heading-doctor").find('b').text(data.text);

            $("#heading-product").parent().show();
            product_id.empty().trigger('change');
            product_id.append($('<option value="" selected disabled>-- CHOOSE PRODUCT --</option>'));
            product_id.select2({
                width: '100%',
                placeholder: "-- CHOOSE PRODUCT --",
            });
            $.get("{{route('booking-data')}}?doc="+specialist_id.val(), function(data) {
                $.each(data, function (i,val) {
                    product_id.append($("<option></option>")
                        .attr("value", val.id)
                        .attr("data-price", val.price)
                        .text(val.name));
                });
            });
        });

        product_id.on('select2:select', function (e) {
            var data = e.params.data, price = $('#product_id option:selected').attr('data-price');

            $('#collapse-product').collapse('toggle');
            $("#heading-product").find('b').text(data.text);

            $("#heading-schedule").parent().show();

            $(".show-total").text(number_format(price,2,',','.'));
            $("input[name='total_price']").val(price);
        });

        function saveSchedule() {
            var date = $("#book_date"),
                time = $("#book_time");

            if(!date.val() ||!time.val()) {
                Swal.fire('ATTENTION!', 'Please select the schedule!', 'error');
            } else {
                $('#collapse-schedule').collapse('toggle');
                $("#heading-schedule").find('b').text(date.val() + ' | ' + time.val());
            }
        }

        function saveBio() {
            var name = $("#book_name"),
                gender = $("input[name='book_gender']"),
                phone = $("#book_phone"),
                address = $("#book_address"),
                dob = $("#book_dob");

            if(!name.val() ||!gender.val() ||!phone.val() ||!address.val() ||!dob.val()) {
                Swal.fire('ATTENTION!', 'Please enter your bio correctly!', 'error');
            } else {
                $('#collapse-biodata').collapse('toggle');
                $("#heading-biodata").find('b').text(name.val());
            }
        }

        function saveAccount() {
            var email = $("#book_email"),
                password = $("#book_password"),
                confirm = $("#book_password_confirm");
            if(!email.val()) {
                Swal.fire('ATTENTION!', 'Please enter your email!', 'error');
            } else {
                if(!password.val() || !confirm.val()) {
                    Swal.fire('ATTENTION!', 'Please enter your password!', 'error');
                } else {
                    if (password.val() != confirm.val()) {
                        Swal.fire('ERROR!','Your confirmation password must be the same as your new password!','error');
                        confirm.val('');
                    } else {
                        $('#collapse-account').collapse('toggle');
                        $("#heading-account").find('b').text(email.val());
                    }
                }
            }
        }

        function checkout() {
            var name = $("#book_name"),
                gender = $("input[name='book_gender']"),
                phone = $("#book_phone"),
                address = $("#book_address"),
                dob = $("#book_dob"),
                email = $("#book_email"),
                password = $("#book_password"),
                confirm = $("#book_password_confirm"),
                date = $("#book_date"),
                time = $("#book_time"),
                spc = $("#specialist_id"),
                doc = $("#doctor_id"),
                prod = $("#product_id"),
                btn_pay = $("#btn_pay");

            if(!name.val() ||!gender.val() ||!phone.val() ||!address.val() ||!dob.val()||!email.val()||!password.val()||!confirm.val()||!date.val()||!time.val()||!spc.val()||!doc.val()||!prod.val()) {
                Swal.fire('ATTENTION!','Please complete all the following inputs for your order first.','warning');
            } else {
                clearTimeout(this.delay);
                this.delay = setTimeout(function () {
                    $.ajax({
                        url: '{{route('get.midtrans.snap')}}',
                        type: "GET",
                        data: $("#form-booking").serialize(),
                        success: function (data) {
                            snap.pay(data, {
                                language: '{{app()->getLocale()}}',
                                onSuccess: function (result) {
                                    responseMidtrans('finish', result);
                                },
                                onPending: function (result) {
                                    responseMidtrans('unfinish', result);
                                },
                                onError: function (result) {
                                    Swal.fire('ERROR!', result.status_message, 'error');
                                }
                            });
                        },
                        error: function () {
                            Swal.fire('ERROR!', 'Something went wrong! Please, refresh your browser.', 'error');
                        }
                    });
                }.bind(this), 800);
            }
        }
    </script>
@endpush
