@extends('admin.layouts.master')

@section('title',$title)

@section('content')
    <div class="container-fluid">
        @include('admin.inc.breadcrump')
        <div class="row">
            <div class="col-8">
                <form action="{{route($route.'.update',$portfolioCategory->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$portfolioCategory->title}}" id="title" required>
                        @error('title')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="description">Description</label>
                        <textarea name="description" id="description" cols="30" class="form-control" rows="3">{{$portfolioCategory->description}}</textarea>
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