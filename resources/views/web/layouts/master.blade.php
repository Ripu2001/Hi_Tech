<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{asset('web/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('web/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('web/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('web/css/owl.carousel.min.css')}}">
        @yield('page_css')
        <link rel="shortcut icon" href="{{asset('dashboard/uploads/setting'.'/'.$setting->favicon_path)}}" type="image/x-icon">
        <title>Khamu</title>
    </head>
    <body>
        
        <!-------- navbar stat ------------>
        <section class="header">
            <div class="container">
                <nav class="navbar  navbar-expand-lg bg-body-tertiary">
                    <div class="container">
                        <a class="navbar-brand" href="{{route('home')}}">
                            <img src="{{asset('dashboard/uploads/setting'.'/'.$setting->logo_path)}}" alt="" >
                            KHAMU
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                      <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('about')}}">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('service')}}">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('portfolio')}}">Portfolio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('pricing')}}">Pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('blog')}}">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('faq')}}">Faqs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('contact')}}">Contact us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </section>
        <!--------------- navbar start ------------>

        <!--------------- content start ------------>
        @yield('content')
        <!--------------- content start ------------>

        <!--------------- Contact Info bar start------------>
        <section class="contact-info-bar">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <div class="address-block">
                            <div class="icon">
                                <i class="fa-solid fa-address-book"></i>
                            </div>
                            <div class="content">
                                <h3>Address</h3>
                                <p>{{$setting->contact_address}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 text-center">
                        <div class="phone-block">
                            <div class="icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="content">
                                <h3>Phone</h3>
                                <p>{{$setting->phone_one}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 text-right">
                        <div class="email-block">
                            <div class="icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="content">
                                <h3>Phone</h3>
                                <p>{{$setting->email_one}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--------------- Contact Info bar start------------>


        <!-------------- footer section start  ------------->
        <section class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <div class="footer-widget about">
                            <h3 class="title">About Us</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellesque imperdiet. Nulla lacinia iaculis nulla.
                            </p>
                            <a href="">Learn More</a>
                            <div class="footer-logo">
                                <img src="{{asset('dashboard/uploads/setting'.'/'.$setting->logo_path)}}" alt="" srcset="">
                                khamu
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="footer-widget">
                            <h3 class="title">useful links</h3>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="footer-widget">
                            <h3 class="title">community</h3>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="footer-widget">
                            <h3 class="title">Recent posts</h3>
                            <ul class="recents-post">
                                @foreach ($blog_recents as $blog_recent)
                                    <li>
                                        <a class="link" href="">{{$blog_recent->title}}</a>
                                        <cite>{{$blog_recent->created_at->format('d M Y')}}</cite>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-------------- footer-top  end  ------------->



        <!-------------- footer-bottom start  ------------->
        <section class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="footlinks">
                            <a href="">Privacy Policy</a>
                            <a href="">Terms of Use</a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="copyright">
                            <p>All rights Reserved
                                <a href="">@Jigsawlab</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-------------- footer-bottom end  ------------->

        <script src="{{asset('web/js/jquery-3.6.4.min.js')}}"></script>
        <script src="{{asset('web/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('web/js/all.min.js')}}"></script>
        @yield('page_js')
    </body>
</html>