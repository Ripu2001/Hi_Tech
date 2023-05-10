@extends('web.layouts.master')

@section('content')
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
@endsection