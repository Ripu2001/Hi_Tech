@extends('web.layouts.master')

@section('content')
    <!------------------- Portfolio start ----------------->
<section class="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-section">
                    <h3 class="title">Our Porfolio</h3>
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
    @section('page_js')
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