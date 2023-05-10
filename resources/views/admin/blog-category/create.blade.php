@extends('admin.layouts.master')

@section('title',$title)

@section('content')
    <div class="container-fluid">
        @include('admin.inc.breadcrump')
        <div class="row">
            <div class="col-8">
                <form action="{{route($route.'.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" name="title" id="id" class="form-control" value="{{old('title')}}" required>
                        @error('title')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="description">Description</label>
                        <textarea name="descripton" id="description" cols="30" rows="3" class="form-control">{{old('description')}}</textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection