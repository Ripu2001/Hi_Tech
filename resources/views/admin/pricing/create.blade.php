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
                        <input type="text" name="title" id="title" value="{{old('tilte')}}" class="form-control" required>
                        @error('title')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="price">Price</label>
                        <input type="text" name="price" id="price" class="form-control" value="{{old('price')}}" required>
                        @error('price')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="old_price">Old Price</label>
                        <input type="text" name="old_price" id="old_price" class="form-control" value="{{old('old_price')}}" >
                        @error('old_price')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="duration">Duration</label>
                        <input type="text" name="duration" id="duration" class="form-control" value="{{old('duration')}}" required>
                        @error('duration')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="feature">Feature name</label>
                    </div>
                    <div class="form-group row" id="inputFormField">
                        <div class="col-8">
                            <input type="text" class="form-control" name="features[]" placeholder="feature name">
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-danger" id="removeField">Remove</button>
                        </div>
                    </div>
                    <div id="newField"></div>
                    <div class="form-group">
                        <button id="addField" type="button" class="btn btn-info">Add feature</button>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection