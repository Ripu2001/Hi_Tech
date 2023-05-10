@extends('admin.layouts.master')

@section('title',$title)

@section('content')
    @include('admin.inc.breadcrump')
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <form action="{{route($route.'.update',$counter->id)}}" method="post">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{$counter->title}}" required>
                        @error('title')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="description">Description</label>
                        <input type="text" name="description" class="form-control" id="description" value="{{$counter->description}}" >
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="value">Value</label>
                        <input type="number" name="value" id="value" class="form-control" value="{{$counter->value}}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="icon">Icon</label>
                        <input type="text" name="icon" class="form-control" id="icon" value="{{$counter->icon}}" >
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection