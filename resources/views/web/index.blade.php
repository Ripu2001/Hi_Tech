@extends('web.layouts.master')

@section('content')
@section('page_css')
    <link rel="stylesheet" href="{{asset('web/css/owl.carousel.min.css')}}">
@endsection
<!------------------ Slider start ------------------>
<div id="carouselExampleCaptions" class="carousel slide slider">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        @foreach ($sliders as $key => $slider)
        <div class="carousel-item @if($key==0) active @endif">
            <img src="{{asset('dashboard/uploads/slider'.'/'.$slider->image_path)}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!------------------ Slider end ------------------>

@php
    $section_about = App\Models\Section::section('about-us');
@endphp

<!------------------ about start ------------------>
<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-section">
                    <h3 class="title">{{$section_about->title}}</h3>
                    <div class="separate"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p class="description">{{$about->description}}</p>
            </div>
            <div class="col-6">
            <h4 class="our-vission">Our Vission</h4>
            <p>{{$about->vission_title}}</p>
            <h4 class="our-mission">Our Mission</h4>
            <p>{{$about->mission_title}}</p>
            </div>
        </div>
    </div>
</section>
<!------------------ about end ------------------>
    @php
        $section_service = App\Models\Section::section('services');
    @endphp
    @if(count($services) > 0 && isset($section_services))

    @endif
<!------------------- Service start ----------------->
<section class="service">
    <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-section">
                        <h3 class="title">{{$section_service->title}}</h3>
                        <p class="desc">While mirth large of on front. Ye he greater related adapted proceed entered an.</p>
                        <div class="separate">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div id="slider1" class="owl-carousel owl-theme">
                        @foreach ($services as $service)
                        <div class="item">
                            <div class="card" style="width: 18rem;">
                                <img src="{{asset('dashboard/uploads/service'.'/'.$service->image_path)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$service->title}}</h5>
                                    <p class="card-text">{!! str_limit($service->title,50,'...') !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!------------------- Service end ----------------->

@php
    $section_portfolio = App\Models\Section::section('portfolio');
@endphp
<!------------------- Portfolio start ----------------->
<section class="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-section">
                    <h3 class="title">{{$section_portfolio->title}}</h3>
                    <p class="desc">While mirth large of on front. Ye he greater related adapted proceed entered an.</p>
                    <div class="separate">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="item-menu">
                    <ul>
                        <li class="filter" data-filter="*">All</li>
                        @foreach ($portfolio_categories as $portfolio_category)
                        <li class="filter" data-filter=".{{$portfolio_category->title}}">{{$portfolio_category->title}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="item-details">
                @foreach ($portfolios as $portfolio)
                <div class="col-4 item @foreach($portfolio->categories as $category)
                    {{ $category->title }} 
                @endforeach">
                    <img src="{{asset('dashboard/uploads/portfolio/'.'/'.$portfolio->image_path)}}" alt="" >
                    <div class="overlay">
                        <div class="content">
                            <div class="tags">
                                @foreach($portfolio->categories as $category)
                                    > {{ $category->title }} 
                                @endforeach
                            </div>
                            <h3>
                                <a href="">{{$portfolio->title }}</a>
                            </h3>
                        </div>
                        <div class="button">
                            <a href="">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!------------------- Portfolio end ----------------->


@php
    $section_team  = App\Models\Section::section('team');
@endphp

<!------------------- Team start ----------------->
<section class="team">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-section">
                    <h3 class="title">{{$section_team->title}}</h3>
                    <p class="description">{{$section_team->description}}</p>
                    <div class="separate">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="slider2" class="owl-carousel owl-theme">
                    @foreach ($teams as $team)
                    <div class="item">
                        <div class="card" style="width: 18rem;">
                            <div class="image-box">
                                <img class="card-img-top" src="{{asset('dashboard/uploads/team'.'/'.$team->image_path)}}" alt="Card image cap">
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">{{$team->name}}</h5>
                              <span class="designation">{{$team->designation->title}},{{$team->designation->department}}</span>
                              <span class="email">{{$team->email}}</span>
                              <span>{{$team->phone}}</span>
                              <ul class="social">
                                    <li>
                                        <a href="{{$team->facebook}}">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{$team->twitter}}">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{$team->instagram}}">
                                            <i class="fa-brands fa-instagram"></i> 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{$team->linkedin}}">
                                            <i class="fa-brands fa-linkedin"></i>
                                        </a>
                                    </li>
                              </ul>
                            </div>
                          </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!------------------- Team end ----------------->
@php
    $section_pricing = App\Models\Section::section('pricing');
@endphp
<!------------------- Pricing Section start----------------->
<section class="pricing">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-section">
                    <h3 class="title">{{$section_pricing->title}}</h3>
                    <p class="desc">{{$section_pricing->description}}</p>
                </div>
                <div class="row">
                    @foreach ($pricings as $pricing)
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="title">{{$pricing->title}}</h3>
                                    <h5 class="price"><span class="doller">$</span>{{round($pricing->price)}}/year</h5>
                                    <div class="feature">
                                        @php
                                        $features = json_decode($pricing->description, true);
                                    @endphp
                                    @if (isset($features))
                                        <ul>
                                            @foreach ($features as $feature)
                                                <li>{{$feature}}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!------------------- Pricing Section end----------------->


    @section('page_js')
        <script src="{{asset('web/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('web/js/page.js')}}"></script>
        <script src="{{asset('web/js/isotope.pkgd.min.js')}}"></script>
        <script >
            // init Isotope
            var $grid = $('.item-details').isotope({
                // options
            });
            // filter items on button click
            $('.item-menu').on( 'click', 'li', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({ filter: filterValue });
            });
        </script>
    @endsection
@endsection
