@extends('admin.layouts.master')

@section('title',$title)

@section('content')
    <div class="container-fluid">
        @include('admin.inc.breadcrump')
        <div class="row">
            <div class="col-8">
                <form action="{{route($route.'.update',$role->id)}}" method="post">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$role->name}}" id="name">
                        @error('name')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">

                        @php
                            $separation = '0';
                        @endphp
                        @foreach ($permissions as $value)
                        @if($separation != $value->group)
                            <hr/>
                            <h6 class="mt-4 text-primary">{{ $value->group }}</h6>
                        @endif
                        <div class="form-group d-inline" style="margin-right: 40px;">
                            <div class="checkbox d-inline m-r-10">
                                <input type="checkbox" id="checkbox-{{ $value->id }}" name="permission[]" value="{{ $value->id }}" @foreach($rolePermissions as $rolePermission)
                                @if($rolePermission->permission_id == $value->id) checked @endif
                            @endforeach >

                                <label for="checkbox-{{ $value->id }}" class="cr">{{ $value->title }}</label>
                            </div>
                        </div>
                        @php
                            $separation = $value->group;
                        @endphp
                        @endforeach
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection