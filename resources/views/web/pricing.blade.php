@extends('web.layouts.master')

@section('content')
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
@endsection