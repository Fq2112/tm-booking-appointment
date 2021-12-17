<div class="modal fade login" id="loginModal">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="line-height: 2;">Sign In</h4>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body pb-0">
                <!-- Sign in form -->
                <div class="box">
                    <div class="content">
                        <div class="error"></div>
                        <div class="form loginBox">
                            @if(session('register') || session('recovered'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="mb-1"><i class="icon-check"></i> SUCCESS!</h4>
                                    {{session('register') ? env('APP_NAME') . " account successfully created! Please check your email to activate your account." : 'Please sign in with your new password.'}}
                                </div>
                            @elseif(session('error') || session('inactive'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="mb-1"><i class="icon-times"></i> ERROR!</h4>
                                    {{session('error') ? 'Your email or password is incorrect.' : 'Your account is not active yet! Please activate your account first.'}}
                                </div>
                            @endif
                            <form method="post" accept-charset="UTF-8" class="form-horizontal m-0"
                                  action="{{route('login')}}" id="form-login">
                                @csrf
                                <div class="row has-feedback">
                                    <div class="col-12">
                                        <input class="form-control" type="text" name="useremail" autofocus required
                                               value="{{old('email')}}"
                                               placeholder="Enter your email">
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                </div>
                                <div class="row has-feedback">
                                    <div class="col-12">
                                        <input id="log_password" type="password"
                                               class="form-control {{session('error') ? 'is-invalid' : ''}}"
                                               placeholder="Enter your password" name="password"
                                               minlength="6" required>
                                        <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                              style="pointer-events: all;cursor: pointer"></span>
                                        @if(session('error'))
                                            <span class="invalid-feedback" style="display: block">
                                                <strong>{{ $errors->first('password') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <input id="remember" class="checkbox-style" name="remember"
                                                   type="checkbox" {{old('remember') ? 'checked' : ''}}>
                                            <label for="remember" class="checkbox-style-2-label checkbox-small"
                                                   style="text-transform: none">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col text-end">
                                        <a href="javascript:openEmailModal()">Forgot password?</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit"
                                                class="button button-rounded button-xlarge m-0 btn-login">
                                            Sign In</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sign up form -->
                <div class="box">
                    <div class="content registerBox" style="display:none;">
                        <div class="form">
                            @if ($errors->has('email'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="mb-1"><i class="icon-times"></i> ERROR!</h4>
                                    {{ $errors->first('email') }}
                                </div>
                            @elseif($errors->has('password') || $errors->has('name'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="mb-1"><i class="icon-times"></i> ERROR!</h4>
                                    {{ $errors->has('password') ? $errors->first('password') : $errors->first('name') }}
                                </div>
                            @endif
                            <div id="reg_errorAlert"></div>
                            <form method="post" accept-charset="UTF-8" class="form-horizontal m-0"
                                  action="{{route('register')}}" id="form-register">
                                @csrf
                                <div class="row has-feedback">
                                    <div class="col-12">
                                        <input id="reg_name" type="text" placeholder="Enter your name"
                                               class="form-control" name="name" autofocus required>
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                </div>
                                <div class="row has-feedback">
                                    <div class="col-12">
                                        <input id="reg_username" type="text" placeholder="Username"
                                               class="form-control" name="username" minlength="4" required>
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                </div>
                                <div class="row has-feedback">
                                    <div class="col-12">
                                        <input id="reg_email" class="form-control" type="email"
                                               placeholder="Email" name="email" required>
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                </div>
                                <div class="row has-feedback">
                                    <div class="col-12">
                                        <input class="form-control" type="password" name="password" minlength="6"
                                               placeholder="Enter your password" id="reg_password"
                                               required>
                                        <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                              style="pointer-events: all;cursor: pointer"></span>
                                    </div>
                                </div>
                                <div class="row has-feedback">
                                    <div class="col-12">
                                        <input class="form-control" type="password" minlength="6"
                                               placeholder="Enter your password again"
                                               id="reg_password_confirm" name="password_confirmation" required>
                                        <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                              style="pointer-events: all;cursor: pointer"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" style="font-size: 14px;text-align: justify">
                                        <small>
                                            By continuing this, you acknowledge that you accept on the
                                            <a href="https://trustmedis.com/terms-and-conditions/" target="_blank">
                                                Terms & Conditions</a> and
                                            <a href="https://trustmedis.com/privacy-policy/" target="_blank">
                                                Privacy Policy</a> of {{env('APP_NAME')}}.
                                        </small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" id="recaptcha-register"></div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" disabled
                                                class="button button-rounded button-xlarge m-0 btn-register">
                                            Sign Up</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Reset password form -->
                <div class="box">
                    <div class="content emailBox" style="display:none;">
                        <div class="form">
                            @if(session('resetLink') || session('resetLink_failed'))
                                <div
                                    class="alert alert-{{session('resetLink') ? 'success' : 'danger'}} alert-dismissible">
                                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="mb-1">
                                        <i class="icon-{{session('resetLink') ? 'check' : 'times'}}"></i>
                                        {{session('resetLink') ? 'SUCCESS!' : 'ALERT!'}}
                                    </h4>
                                    {{session('resetLink') ? 'Your reset password request has been sent to your email.' : 'The email you entered was not found.'}}
                                </div>
                            @endif
                            <form method="post" accept-charset="UTF-8" class="form-horizontal m-0"
                                  action="{{route('password.email')}}">
                                @csrf

                                <div class="row {{ $errors->has('Email') ? ' has-danger' : '' }} has-feedback">
                                    <div class="col-12">
                                        <input class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                                               type="email" placeholder="Email" name="email"
                                               value="{{ old('email') }}" autofocus required>
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" style="display: block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit"
                                                class="button button-rounded button-xlarge m-0 btn-login">
                                            Send Reset Link</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Recovery password form -->
                <div class="box">
                    @if(session('recover_failed'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="mb-1"><i class="icon-times"></i> ERROR!</h4>
                            The email you entered was not found.
                        </div>
                    @endif
                    <div class="content passwordBox" style="display:none;">
                        <div id="forg_errorAlert"></div>
                        <div class="form">
                            <form id="form-recovery" method="post" accept-charset="UTF-8"
                                  class="form-horizontal m-0" action="{{--{{route('password.reset',
                                  ['token' => session('reset') ? session('reset')['token'] : old('token')])}}--}}">
                                @csrf
                                <div class="row {{ $errors->has('Email') ? ' has-danger' : '' }} has-feedback">
                                    <div class="col-12">
                                        <input class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                                               type="email" placeholder="Email" name="email"
                                               {{session('reset') ? 'readonly' : 'required'}}
                                               value="{{session('reset') ? session('reset')['email'] : old('email')}}">
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" style="display: block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row {{ $errors->has('password') ? ' has-danger' : '' }} has-feedback">
                                    <div class="col-12">
                                        <input id="forg_password" type="password"
                                               class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"
                                               placeholder="Enter your new password" name="password"
                                               minlength="6" autofocus required>
                                        <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                              style="pointer-events: all;cursor: pointer"></span>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" style="display: block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div
                                    class="row {{ $errors->has('password_confirmation') ? ' has-danger' : '' }} has-feedback">
                                    <div class="col-12">
                                        <input id="forg_password_confirm" class="form-control" type="password"
                                               placeholder="Enter your new password again"
                                               name="password_confirmation" minlength="6"
                                               onkeyup="return checkForgotPassword()" required>
                                        <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                              style="pointer-events: all;cursor: pointer"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit"
                                                class="button button-rounded button-xlarge m-0 btn-password">
                                            Reset Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="forgot login-footer">
                    <span>Looking to <a href='javascript:showRegisterForm()'>create an account</a>?</span>
                </div>
                <div class="forgot register-footer" style="display:none">
                    <span>Already have an account? <a href='javascript:showLoginForm()'>Sign In</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
