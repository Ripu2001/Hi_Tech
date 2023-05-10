@extends('admin.layouts.master')

@section('title',$title)

@section('content')
    @include('admin.inc.breadcrump')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a class="btn btn-primary" href="{{route($route.'.create')}}">Add New</a>
                <a class="btn btn-info" href="{{route($route.'.index')}}">Refresh</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">{{$title}}</h4>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-dark table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Title</th>
                                    <th>Image</th>
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
                                            <img style="width:50px" src="{{asset($path.'/'.$row->image_path)}}" alt="">
                                        </td>
                                        <td>
                                            @if($row->status==1)
                                                <a class="badge badge-success pill text-white">Active</a>
                                            @else
                                                <a class="badge badge-danger pill text-white">Inactive</a>
                                            @endif
                                        </td>
                                        <td>
                                            <!---- show modal ---->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showModal-{{$key}}"><i class="fe-eye"></i></button>
                                            @include($view.'.show')
                                            <!----- edit button ----->
                                            <a class="btn btn-success" href="{{route($route.'.edit',$row->id)}}">
                                                <i class="fe-edit"></i>
                                            </a>
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
        </div>
    </div>
@endsection