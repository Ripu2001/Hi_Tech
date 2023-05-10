@extends('admin.layouts.master')

@section('title',$title)

@section('content')
    @include('admin.inc.breadcrump')
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <form action="{{route($route.'.update',$service->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{$service->title}}" required>
                        @error('title')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="3">{{$service->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="status"></label>
                        <select class="form-control" name="status" id="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection