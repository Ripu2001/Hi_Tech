@extends('admin.layouts.master')

@section('title',$title)

@section('content')
    <div class="container-fluid">
        @include('admin.inc.breadcrump')
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
                        <h3 class="header-title">{{$title}}</h3>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-hover table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Name</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $row)
                                    <tr>
                                        <th>{{$key+1}}</th>
                                        <th>{{$row->name}}</th>
                                        <th>
                                            <!---- show modal ---->
                                            @can($access.'-show', $access)
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showModal-{{$key}}"><i class="fe-eye"></i></button>
                                                @include($view.'.show')
                                            @endcan
                                            @can($access.'-edit', $access)
                                                <a class="btn btn-success" href="{{route($route.'.edit',$row->id)}}"><i class="fe-edit"></i></a>
                                            @endcan
                                            <!----- delete Modal ----->
                                            @can($access.'-delete', $access)
                                                <button  type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$key}}"><i class="fe-trash"></i></button>
                                                @include('admin.inc.delete')
                                            @endcan
                                        </th>
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