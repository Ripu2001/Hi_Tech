<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Simulor - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('dashboard/assets/images/favicon.ico')}}">

        <!-- App css -->
        <link href="{{asset('dashboard/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="{{asset('dashboard/assets/images/logo.png')}}" alt="" height="22"></span>
                                    </a>
                                </div>

                                <div class="alert alert-warning mb-4 mt-4 font-13">
                                    Enter your email address and we'll send you an email with instructions to reset your password.
                                </div>

                                <form method="POST" action="{{ route('password.email')}}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="email">Email address</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Back to <a href="{{route('login')}}" class="text-dark ml-1"><b>Log In</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
        <!-- App js -->
        <script src="{{asset('dashboard/js/vendor.min.js')}}"></script>
        <script src="{{asset('dashboard/js/app.min.js')}}"></script>
    </body>
</html>

