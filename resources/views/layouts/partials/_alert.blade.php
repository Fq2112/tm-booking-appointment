<script>
    $(".btn_signOut").on('click',function () {
        swal({
            title: "Sign Out",
            text: "Are you sure to end your session?",
            icon: 'warning',
            dangerMode: true,
            buttons: ["NO", "YES"],
            closeOnEsc: false,
            closeOnClickOutside: false,
        }).then((confirm) => {
            if (confirm) {
                swal({icon: "success", text: 'You will be redirected to the Home page.', buttons: false});
                $("#logout-form").submit();
            }
        });
        return false;
    });

    @if(session('activated'))
    swal('SUCCESS!', 'You`ve signed in!', 'success');

    @elseif(session('inactive'))
    swal('ERROR!', 'Your account is not active yet! Please activate your account first.', 'error');

    @elseif(session('signed'))
    swal('SUCCESS!', 'Hello {{Auth::user()->name}}! You`ve signed in!', 'success');

    @elseif(session('token'))
    swal('ERROR!', 'The page has expired due to inactivity, please try again.', 'error');

    @elseif(session('expire'))
    swal('ERROR!', 'The page you requested requires authentication, please sign in to your account.', 'error');

    @elseif(session('logout'))
    swal('ATTENTION!', 'You`ve signed out.', 'warning');

    @elseif(session('warning'))
    swal('ATTENTION!', '{{session('warning')}}', 'warning');

    @elseif(session('register'))
    swal('SUCCESS!', '{{env('APP_NAME')}} account successfully created! Please check your email to activate your account.', 'success');

    @elseif(session('add'))
    swal('SUCCESS!', '{{session('add')}}', 'success');

    @elseif(session('claim'))
    swal('SUCCESS!', '{{session('claim')}}', 'success');

    @elseif(session('update'))
    swal('SUCCESS!', '{{session('update')}}', 'success');

    @elseif(session('delete'))
    swal('SUCCESS!', '{{session('delete')}}', 'success');

    @elseif(session('error'))
    swal('ERROR!', 'Your email or password is incorrect.', 'error');
    @endif

    @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    swal('Oops..!', '{{$error}}', 'error');
    @endforeach
    @endif
</script>
