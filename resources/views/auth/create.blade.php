<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>
    <style>
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }
        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>
    <link href="{{ asset('css/rtl.css') }}" rel="stylesheet">

</head>
<body class="hold-transition login-page">
<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100 mt-5">
            <div class="col-xl-10 mt-5">
                <div class="card rounded-3 text-black mt-5">
                    <div class="row g-0 ">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="
                                        {{config('app.logo')}}
                                    "
                                         style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">{{config('app.name')}}</h4>
                                </div>
                                <form method="post" action="{{ url('/login') }}">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="text"
                                               name="email"
                                               value="{{ old('email') }}"
                                               placeholder="{{ __('auth.email') }}"
                                               class="form-control @error('email') is-invalid @enderror">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                                        </div>
                                        @error('email')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="password"
                                               name="password"
                                               placeholder="{{ __('auth.password') }}"
                                               class="form-control @error('password') is-invalid @enderror">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                        @error('password')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="row">

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">{{ __('auth.sign_in') }}</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h2 class="mb-4">منصة التبرئة الالكترونية</h2>
                                <p class="small mb-0"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /.login-box -->

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
