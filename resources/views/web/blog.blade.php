@extends('web.layouts.master')

@section('content')
@php
    $section_blog  = App\Models\Section::section('blog');
@endphp
<!------------------ Blog start -------------------->
<section class="blog">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-section">
                    <h3 class="title">{{$section_blog->title}}</h3>
                    <div class="separate"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-4">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="{{asset('dashboard/uploads/blog'.'/'.$blog->image_path)}}" alt="">
                        </div>
                        <div class="blog-content">
                            <h3 class="title">{{$blog->title}}</h3>
                            <p class="date"> On: <span>{{$blog->created_at->format('d M Y')}}</span></p>
                            <p>{!! Str::limit($blog->description, 100, '...') !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!------------------ Blog start -------------------->
@endsection