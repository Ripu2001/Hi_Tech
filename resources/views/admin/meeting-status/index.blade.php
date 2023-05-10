@extends('admin.layouts.master')

@section('title',$title)

@section('content')
   <div class="container-fluid">
        @include('admin.inc.breadcrump')
        <div class="row">
            <div class="col-4">
                <form action="{{route($route.'.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="Title">Title</label>
                        <input type="text" name="title" class="form-control" id="title">
                        @error('title')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="color">Color</label>
                        <input type="color" name="color" class="form-control" value="{{old('color')}}" id="color">
                        @error('color')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
            <div class="col-8">
                <table id="myTable" class="table table-hover table-striped table-dark">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Title</th>
                            <th>Color</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $key => $row)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$row->title}}</td>
                                <td>
                                    <span style="background-color:{{$row->color}}" class="badge pill">{{$row->title}}</span>
                                </td>
                                <td>
                                    @if ($row->status==1)
                                        <span class="badge badge-success pill">Active</span>
                                    @else
                                        <span class="badge badge-danger pill">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{route($route.'.edit',$row->id)}}"><i class="fe-edit"></i></a>
                                    <!----- delete Modal ----->
                                    <button  type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$key}}"><i class="fe-trash"></i></button>
                                    @include('admin.inc.delete')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
   </div>
@endsection
