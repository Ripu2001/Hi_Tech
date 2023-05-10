@extends('admin.layouts.master')

@section('title',$title)

@section('content')
    <div class="container-fluid">
        @include('admin.inc.breadcrump')
        <div class="row">
            <div class="col-8">
                <form action="{{route($route.'.update',$portfolio->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{$portfolio->title}}" required>
                        @error('title')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{$portfolio->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="category">Category</label>
                        <select multiple class="form-control" name="categories[]" id="category">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="video">Video Id</label>
                        <input type="text" class="form-control" name="video" id="video" value="{{$portfolio->video_id}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="link">Link</label>
                        <input type="text" class="form-control" name="link" id="link" value="{{$portfolio->link}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="status">Status</label>
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