@extends('admin.layouts.master')

@section('title',$title)

@section('content')
   <div class="container-fluid">
        @include('admin.inc.breadcrump')
        <div class="row">
            <div class="col-6">
                <form action="{{route($route.'.update',$status->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="form-label" for="Title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$status->title}}" id="title">
                        @error('title')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="color">Color</label>
                        <input type="color" name="color" class="form-control" value="{{$status->color}}" id="color">
                        @error('color')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
   </div>
@endsection
