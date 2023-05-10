@extends('admin.layouts.master')

@section('title',$title)

@section('content')
    <div class="container-fluid">
        @include('admin.inc.breadcrump')
        <div class="row">
            <div class="col-7">
                <form action="{{route($route.'.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{old('title')}}" id="title" required>
                        @error('title')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="description">Description</label>
                        <input type="text" name="description" class="form-control" value="{{old('description')}}" id="description" >
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="department">Department</label>
                        <input type="text" name="department" class="form-control" value="{{old('department')}}" id="department" required>
                        @error('department')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection