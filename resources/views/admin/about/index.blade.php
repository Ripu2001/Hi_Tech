@extends('admin.layouts.master')

@section('title',$title)

@section('content')
    <div class="container-fluid">
        @include('admin.inc.breadcrump')
        <div class="row">
            <div class="col-12">
                <form action="{{route($route.'.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{(isset($about->id))? $about->id:-1}}">
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" name="title" value="{{(isset($about->title))?$about->title:''}}" id="title" class="form-control" required>
                            @error('title')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="video">video Id</label>
                            <input type="text" name="video" value="{{(isset($about->video_id))?$about->video_id:''}}" id="video" class="form-control" required>
                            @error('title')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label" for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="form-group col-6">
                            <label for="mission_title" class="form-label" for="mission_title">Mission Title</label>
                            <input type="text" name="mission_title" value="{{(isset($about->mission_title))?$about->mission_title:''}}" class="form-control" id="mission_title">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="vission_title" class="form-label" for="vission_title">Vission Title</label>
                            <input type="text" name="vission_title" value="{{(isset($about->vission_title))?$about->vission_title:''}}" class="form-control" id="vission_title">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="vission_desc">Vission Description</label>
                            <input type="text" name="vission_desc" value="{{(isset($about->vission_desc))?$about->vission_desc:''}}" class="form-control" id="vission_desc">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label" for="description"> Description</label>
                            <textarea name="description" id="description" cols="30" rows="2" class="form-control">{{(isset($about->description))?$about->description:''}}</textarea>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="mission_desc">Mission Description</label>
                            <textarea name="mission_desc" id="mission_desc" cols="30" rows="2" class="form-control">{{(isset($about->mission_desc))?$about->mission_desc:''}}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                        <div class="col-6">
                            @if (isset($about->image_path))
                                @if (is_file($path.'/'.$about->image_path))
                                    <img style="width:300px" src="{{asset($path.'/'.$about->image_path)}}" alt="{{$about->title}}">
                                @endif
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
