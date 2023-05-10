@extends('web.layouts.master')

@section('content')
  <!------------------- Service start ----------------->
<section class="service">
    <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-section">
                        <h3 class="title">Our Service</h3>
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
                        <div class="item" >
                            <div class="card">
                                <img src="{{asset('dashboard/uploads/service'.'/'.$service->image_path)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$service->title}}</h5>
                                    <p class="card-text">{!! str_limit($service->description,50,'...') !!}</p>
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
    @section('page_js')
        <script src="{{asset('web/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('web/js/page.js')}}"></script>
    @endsection  
@endsection