@extends('admin.layouts.master')

@section('title',$title)

@section('content')
    @include('admin.inc.breadcrump')
    <div class="row">
        <div class="col-12">
            <form action="{{route($route.'.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-4">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">
                        @error('name')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label class="form-label" for="type">Meeting Type</label>
                        <select class="form-control" name="type" id="type">
                            @foreach ($types as $type)
                                <option value="{{$type->id}}">{{$type->title}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-4">
                        <label class="form-label" for="status">Meeting Status</label>
                        <select class="form-control" name="status" id="status">
                            @foreach ($statuses as $status)
                                <option value="{{$status->id}}">{{$status->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-4">
                        <label class="form-label" for="organization">Organization</label>
                        <input type="text" class="form-control" name="organization" value="{{old('organization')}}" id="organization">
                        @error('organization')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email">
                        @error('email')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label class="form-label" for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{old('phone')}}" id="phone">
                        @error('phone')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label class="form-label" for="date">Date</label>
                        <input type="date" class="form-control" name="date" value="{{date('Y-m-d') }}" id="date">
                        @error('date')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label class="form-label" for="in_time">In Time</label>
                        <input type="time" class="form-control" name="in_time" value="{{old('in_time') }}" id="in_time">
                        @error('in_time')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label class="form-label" for="out_time">Out Time</label>
                        <input type="time" class="form-control" name="out_time" value="{{old('out_time') }}" id="out_time">
                        @error('out_time')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label class="form-label" for="user">User</label>
                        <select class="form-control" name="user" id="user">
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('user')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-9">
                        <label class="form-label" for="address">Address</label>
                        <textarea name="address" id="address" cols="30" rows="3" class="form-control"></textarea>
                        @error('out_time')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
