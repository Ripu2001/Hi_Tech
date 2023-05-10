@extends('admin.layouts.master')

@section('title',$title)

@section('content')
    <div class="container-fluid">
        @include('admin.inc.breadcrump')
        <div class="row">
            <div class="col-7">
                <form action="{{route($route.'.update',$designation->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$designation->title}}" id="title" required>
                        @error('title')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="description">Description</label>
                        <input type="text" name="description" class="form-control" value="{{$designation->description}}" id="description" >
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="department">Department</label>
                        <input type="text" name="department" class="form-control" value="{{$designation->department}}" id="department" required>
                        @error('department')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
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
                        <a class="btn btn-info" href="{{route($route.'.index')}}">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection