@extends('web.layouts.master')     

@section('content')

    @php
        $section_faq = App\Models\Section::section('faqs');
    @endphp
    <section class="faq">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-section">
                        <h3 class="title">{{$section_faq->title}}</h3>
                        <div class="separate">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        @foreach ($faq_categories as $key =>  $faq_category)
                            <button class="nav-link @if($key==0) active @endif" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home-{{$key}}" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">{{$faq_category->title}}</button>
                        @endforeach
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            @foreach ($faq_categories as $key =>  $faq_category)
                                <div class="tab-pane fade  @if($key==0) show active  @endif" id="v-pills-home-{{$key}}" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                    <div class="accordion" id="accordionExample-{{$key}}">
                                        @foreach ($faq_category->faqs  as $number => $faq)
                                        <div class="accordion-item">
                                            <h2 class="accordion-button" data-bs-target="#item-{{$number}}" data-bs-toggle="collapse">{{$faq->title}}</h2>
                                            <div class="accordion-collapse collapse @if($number==0) show @endif" id="item-{{$number}}">
                                                <div class="accordion-body">
                                                    <p>{{$faq->description}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection