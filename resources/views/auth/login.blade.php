<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="https://themekita.com/demo-atlantis-bootstrap/livepreview/examples/assets/img/icon.ico"
        type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets') }}/js/plugin/webfont/webfont.min.js"></script>

    <script src="{{ asset('assets') }}/js/core/jquery.3.2.1.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands", "simple-line-icons"
                ],
                urls: ['{{ asset('assets') }}/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/atlantis.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="login">
    <div class="wrapper wrapper-login wrapper-login-full p-0">
        <div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center" style="
            background: url('{{ asset('assets/img/spk.jpg') }}');
            background-size: cover;
            background-position: bottom center;
            ">
            <div style="">
                <h2 class="title fw-bold text-black mb-3" style="
                margin-top: -60px;
                color: #fff;
            ">Login aplikasi</h2>
            </div>
        </div>
        <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
            <form method="POST" action="{{ route('loginact') }}" id="loginacti" class="form-hocrizontal">
                @csrf
                <div class="container container-login container-transparent animated fadeIn">
                    <h3 class="text-center">Login Aplikasi</h3>
                    <div class="login-form">
                        <div class="form-group">
                            <label for="username" class="placeholder"><b>Username</b></label>
                            <input id="username" name="username" value="{{ old('email') }}" type="text"
                                class="form-control" required>
                            @if ($errors->has('username'))
                                <b>
                                    <strong style="color: red">{{ $errors->first('username') }}</strong>
                                </b>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password" class="placeholder"><b>Password</b></label>
                            <a href="#" class="link float-right">Lupa password ?</a>
                            <div class="position-relative">
                                <input id="password" name="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" required>
                                @if ($errors->has('password'))
                                    <b>
                                        <strong style="color: red">{{ $errors->first('password') }}</strong>
                                    </b>
                                @endif
                                <div class=" show-password">
                                    <i class="icon-eye"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-action-d-flex mb-3">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label m-0" for="rememberme">Remember Me</label>
                            </div>
                            <button href="#" class="btn btn-secondary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Sign
                                In</button>
                        </div>
                        <div class="login-account">
                            {{-- <span class="msg">Don't have an account yet ?</span> --}}
                            {{-- <a href="#" id="show-signup" class="link">Sign Up</a> --}}
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <script>
        $(document).on('submit', '#loginacti', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: 'post',
                data: $(this).serialize(),
                chace: false,
                asynch: false,
                success: function(data, JqXHR) {
                    window.location.href = 'home';
                    console.log(JqXHR);
                },
                error: function(data, JqXHR, err) {
                    err = '';
                    respon = data.responseJSON;
                    $.each(respon.errors, function(index, value) {
                        err += "<li>" + value + "</li>";
                    });
                    Swal.fire({
                        title: 'Opp ada kesalahan',
                        html: err,
                        icon: 'error',
                        confirmButtonText: 'Cool'
                    })
                }
            });
        });
    </script>

    <script src="{{ asset('assets') }}/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/atlantis.min.js"></script>
</body>

</html>
