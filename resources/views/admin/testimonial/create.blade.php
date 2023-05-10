@extends('admin.layouts.master')

@section('title',$title)

@section('content')
    <div class="container-fluid">
        @include('admin.inc.breadcrump')
        <div class="row">
            <div class="col-8">
                <form action="{{route($route.'.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control" required>
                        @error('title')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{old('description')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="image ">Image</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="designation">Designation</label>
                        <input type="text" name="designation" id="designation" value="{{old('designation')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="organization">Organization</label>
                        <input type="text" name="organization" id="organization" value="{{old('organization')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection