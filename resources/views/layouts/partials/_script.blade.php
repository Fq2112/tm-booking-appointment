<script>
    $(function () {
        window.mobilecheck() ? $("body").removeClass('use-nicescroll') : $("body").css("overflow", "hidden");
    });

    var recaptcha_register,
        recaptchaCallback = function () {
            recaptcha_register = grecaptcha.render(document.getElementById('recaptcha-register'), {
                'sitekey': '{{env('reCAPTCHA_v2_SITEKEY')}}',
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
            swal('ATTENTION!', 'Please click the following reCAPTCHA dialog box.', 'warning');
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
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                '<h4 class="mb-1"><i class="icon-times"></i> Error!</h4>Your confirmation password must be the same as your new password!</div>'
            );
        } else {
            $("#reg_errorAlert").html('');
        }
    });

    function checkForgotPassword() {
        var new_pas = $("#forg_password").val(),
            re_pas = $("#forg_password_confirm").val();
        if (new_pas != re_pas) {
            $("#forg_errorAlert").html(
                '<div class="alert alert-danger alert-dismissible">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                '<h4 class="mb-1"><i class="icon-times"></i> Error!</h4>Your confirmation password must be the same as your new password!</div>'
            );
            $(".btn-password").attr('disabled', 'disabled');

        } else {
            $("#forg_errorAlert").html('');
            $(".btn-password").removeAttr('disabled');
        }
    }

    $("#form-recovery").on("submit", function (e) {
        if ($("#forg_password_confirm").val() != $("#forg_password").val()) {
            $(".btn-password").attr('disabled', 'disabled');
            return false;

        } else {
            $("#forg_errorAlert").html('');
            $(".btn-password").removeAttr('disabled');
            return true;
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

    $('#forg_password + .glyphicon').on('click', function () {
        $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
        $('#forg_password').togglePassword();
    });

    $('#forg_password_confirm + .glyphicon').on('click', function () {
        $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
        $('#forg_password_confirm').togglePassword();
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

    function showEmailForm() {
        $('.loginBox, .registerBox, .passwordBox, #loginModal .social, #loginModal .division')
            .fadeOut('fast', function () {
                $('.emailBox').fadeIn('fast');
                $('.register-footer').fadeOut('fast', function () {
                    $('.login-footer').fadeIn('fast');
                });

                $('.modal-title').html('Reset Password');
            });
        $('.error').removeClass('alert alert-danger').html('');
    }

    function showResetPasswordForm() {
        $('.emailBox, .registerBox, .loginBox, #loginModal .social, #loginModal .division')
            .fadeOut('fast', function () {
                $('.passwordBox').fadeIn('fast');
                $('.login-footer, .register-footer').fadeOut('fast');
                $('.modal-title').html('Recovery Password');
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

    function openEmailModal() {
        showEmailForm();
        setTimeout(function () {
            $('#loginModal').modal('show');
        }, 230);
    }

    function openPasswordModal() {
        showResetPasswordForm();
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
    };

    $(document).on('mouseover', '.use-nicescroll', function () {
        $(this).getNiceScroll().resize();
    });
</script>
