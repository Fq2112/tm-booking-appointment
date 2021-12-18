<script>
    $(function () {
        window.mobilecheck() ? $("body").removeClass('use-nicescroll') : $("body").css("overflow", "hidden");

        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();

        $('.datepicker').datepicker({format: "yyyy-mm-dd", autoclose: true, todayHighlight: true, todayBtn: true});
    });

    $(".btn_signOut").on('click',function () {
        Swal.fire({
            itle: "Sign Out",
            text: "Are you sure to end your session?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonText: 'NO',
            confirmButtonText: 'YES',
            allowEscapeKey: false,
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('SUCCESS!', 'You will be redirected to the Home page.','success');
                $("#logout-form").submit();
            }
        })
    });

    var recaptcha_register,
        recaptchaCallback = function () {
            recaptcha_register = grecaptcha.render(document.getElementById('recaptcha-register'), {
                'sitekey': '{{env('RC_V2_SITEKEY')}}',
                'callback': 'enable_btnRegister',
                'expired-callback': 'disabled_btnRegister'
            });
        };

    function enable_btnRegister() {
        $("#btn_register").removeAttr('disabled');
    }

    function disabled_btnRegister() {
        $("#btn_register").attr('disabled', 'disabled');
    }

    $("#form-register").on("submit", function (e) {
        if (grecaptcha.getResponse(recaptcha_register).length === 0) {
            e.preventDefault();
            Swal.fire('ATTENTION!', 'Please click the following reCAPTCHA dialog box.', 'warning');
        }

        if ($.trim($("#reg_email,#reg_name,#reg_password,#reg_password_confirm").val()) === "") {
            return false;

        } else {
            if ($("#reg_password_confirm").val() != $("#reg_password").val()) {
                return false;

            } else {
                $("#reg_errorAlert").html('');
                return true;
            }
        }
    });

    $("#reg_password_confirm").on("keyup", function () {
        if ($(this).val() != $("#reg_password").val()) {
            $("#reg_errorAlert").html(
                '<div class="alert alert-danger alert-dismissible">' +
                '<button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-hidden="true"></button>' +
                '<h4 class="mb-1"><i class="icon-times"></i> Error!</h4>Your confirmation password must be the same as your new password!</div>'
            );
        } else {
            $("#reg_errorAlert").html('');
        }
    });

    $('#log_password + .glyphicon').on('click', function () {
        $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
        $('#log_password').togglePassword();
    });

    $('#reg_password + .glyphicon').on('click', function () {
        $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
        $('#reg_password').togglePassword();
    });

    $('#reg_password_confirm + .glyphicon').on('click', function () {
        $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
        $('#reg_password_confirm').togglePassword();
    });

    function showRegisterForm() {
        $('.loginBox, .emailBox, .passwordBox').fadeOut('fast', function () {
            $('.registerBox, #loginModal .social, #loginModal .division').fadeIn('fast');
            $('.login-footer').fadeOut('fast', function () {
                $('.register-footer').fadeIn('fast');
            });
            $('.modal-title').html('Sign Up');
        });
        $('.error').removeClass('alert alert-danger').html('');
    }

    function showLoginForm() {
        $('#loginModal .registerBox, .emailBox, .passwordBox').fadeOut('fast', function () {
            $('.loginBox, #loginModal .social, #loginModal .division').fadeIn('fast');
            $('.register-footer').fadeOut('fast', function () {
                $('.login-footer').fadeIn('fast');
            });
            $('.modal-title').html('Sign In');
        });
        $('.error').removeClass('alert alert-danger').html('');
    }

    function openLoginModal() {
        showLoginForm();
        setTimeout(function () {
            $('#loginModal').modal('show');
        }, 230);
    }

    function openRegisterModal() {
        showRegisterForm();
        setTimeout(function () {
            $('#loginModal').modal('show');
        }, 230);
    }

    function numberOnly(e, decimal) {
        var key;
        var keychar;
        if (window.event) {
            key = window.event.keyCode;
        } else if (e) {
            key = e.which;
        } else return true;
        keychar = String.fromCharCode(key);
        if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27) || (key == 188)) {
            return true;
        } else if ((("0123456789").indexOf(keychar) > -1)) {
            return true;
        } else if (decimal && (keychar == ".")) {
            return true;
        } else return false;
    }

    function number_format(number, decimals, dec_point, thousands_sep) {
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    var title = document.getElementsByTagName("title")[0].innerHTML;
    (function titleScroller(text) {
        document.title = text;
        setTimeout(function () {
            titleScroller(text.substr(1) + text.substr(0, 1));
        }, 500);
    }(title + " ~ "));

    <!--Scroll Progress Bar-->
    function progress() {
        var windowScrollTop = $(window).scrollTop();
        var docHeight = $(document).height();
        var windowHeight = $(window).height();
        var progress = (windowScrollTop / (docHeight - windowHeight)) * 100;
        var $bgColor = progress > 99 ? '#28B77A' : '#1f895c';
        var $textColor = progress > 99 ? '#fff' : '#333';

        $('.myProgress .bar').width(progress + '%').css({backgroundColor: $bgColor});
        // $('h1').text(Math.round(progress) + '%').css({color: $textColor});
        $('.fill').height(progress + '%').css({backgroundColor: $bgColor});
    }

    progress();

    $(document).on('scroll', progress);

    window.onload = function () {
        $(".use-nicescroll").niceScroll({
            cursorcolor: "#28B77A",
            cursorwidth: "8px",
            background: "rgba(222, 222, 222, .75)",
            cursorborder: 'none',
            horizrailenabled: false,
            autohidemode: 'leave',
            zindex: 9999999,
        });

        @if(session('register') || session('error') || session('logout') || session('expire') || session('inactive') ||
            session('unknown') || session('recovered'))
        openLoginModal();
        @elseif($errors->has('email') || $errors->has('password') || $errors->has('name'))
        openRegisterModal();
        @elseif(session('resetLink') || session('resetLink_failed'))
        openEmailModal();
        @elseif(session('reset') || session('recover_failed'))
        openPasswordModal();
        @else
        if( !$().magnificPopup ) {
            console.log('modal: Magnific Popup not Defined.');
            return true;
        }

        if( Cookies === 'undefined' ) {
            console.log('cookieNotify: Cookie Function not defined.');
            return true;
        }

        var $modal = $('.modal-on-load.customjs');
        if( $modal.length > 0 ) {
            $modal.each( function(){
                var element				= $(this),
                    elementTarget		= element.attr('data-target'),
                    elementTargetValue	= elementTarget.split('#')[1],
                    elementDelay		= element.attr('data-delay'),
                    elementTimeout		= element.attr('data-timeout'),
                    elementAnimateIn	= element.attr('data-animate-in'),
                    elementAnimateOut	= element.attr('data-animate-out');

                if( !element.hasClass('enable-cookie') ) { Cookies.remove( elementTargetValue ); }

                if( element.hasClass('enable-cookie') ) {
                    var elementCookie = Cookies.get( elementTargetValue );

                    if( typeof elementCookie !== 'undefined' && elementCookie == '0' ) {
                        return true;
                    }
                }

                if( !elementDelay ) {
                    elementDelay = 1500;
                } else {
                    elementDelay = Number(elementDelay) + 1500;
                }

                var t = setTimeout(function() {
                    $.magnificPopup.open({
                        items: { src: elementTarget },
                        type: 'inline',
                        mainClass: 'mfp-no-margins mfp-fade',
                        closeBtnInside: false,
                        fixedContentPos: true,
                        removalDelay: 500,
                        callbacks: {
                            open: function(){
                                if( elementAnimateIn != '' ) {
                                    $(elementTarget).addClass( elementAnimateIn + ' animated' );
                                }
                            },
                            beforeClose: function(){
                                if( elementAnimateOut != '' ) {
                                    $(elementTarget).removeClass( elementAnimateIn ).addClass( elementAnimateOut );
                                }
                            },
                            afterClose: function() {
                                if( elementAnimateIn != '' || elementAnimateOut != '' ) {
                                    $(elementTarget).removeClass( elementAnimateIn + ' ' + elementAnimateOut + ' animated' );
                                }
                                if( element.hasClass('enable-cookie') ) {
                                    Cookies.set( elementTargetValue, '0' );
                                }
                            }
                        }
                    }, 0);
                }, Number(elementDelay) );

                if( elementTimeout != '' ) {
                    var to = setTimeout(function() {
                        $.magnificPopup.close();
                    }, Number(elementDelay) + Number(elementTimeout) );
                }
            });
        }
        @endif

        @if(session('activated'))
        Swal.fire('SUCCESS!', 'You`ve signed in!', 'success');

        @elseif(session('inactive'))
        Swal.fire('ERROR!', 'Your account is not active yet! Please activate your account first.', 'error');

        @elseif(session('signed'))
        Swal.fire('SUCCESS!', 'Hello {{Auth::user()->name}}! You`ve signed in!', 'success');

        @elseif(session('token'))
        Swal.fire('ERROR!', 'The page has expired due to inactivity, please try again.', 'error');

        @elseif(session('expire'))
        Swal.fire('ERROR!', 'The page you requested requires authentication, please sign in to your account.', 'error');

        @elseif(session('logout'))
        Swal.fire('ATTENTION!', 'You`ve signed out.', 'warning');

        @elseif(session('warning'))
        Swal.fire('ATTENTION!', '{{session('warning')}}', 'warning');

        @elseif(session('register'))
        Swal.fire('SUCCESS!', '{{env('APP_NAME')}} account successfully created! Please check your email to activate your account.', 'success');

        @elseif(session('add'))
        Swal.fire('SUCCESS!', '{{session('add')}}', 'success');

        @elseif(session('claim'))
        Swal.fire('SUCCESS!', '{{session('claim')}}', 'success');

        @elseif(session('update'))
        Swal.fire('SUCCESS!', '{{session('update')}}', 'success');

        @elseif(session('delete'))
        Swal.fire('SUCCESS!', '{{session('delete')}}', 'success');

        @elseif(session('error'))
        Swal.fire('ERROR!', 'Your email or password is incorrect.', 'error');
        @endif

        @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
        Swal.fire('Oops..!', '{{$error}}', 'error');
        @endforeach
        @endif
    };

    $(document).on('mouseover', '.use-nicescroll', function () {
        $(this).getNiceScroll().resize();
    });
</script>
