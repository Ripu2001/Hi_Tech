@extends('admin.layouts.master')

@section('title',$title)

@section('content')
    <div class="container-fluid">
        @include('admin.inc.breadcrump')
        <div class="row">
            <div class="col-8">
                <form action="{{route($route.'.update',$faq->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" name="title" value="{{$faq->title}}" class="form-control" id="title" required>
                        @error('title')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="description" for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="3">{{$faq->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="categories">Categories</label>
                        <select class="form-control" name="categories" id="categories">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach             
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection