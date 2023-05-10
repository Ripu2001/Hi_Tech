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
                        <div class="row">
                            <div class="col-12">
                                <form action="{{route($route.'.index')}}" method="get">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-2">
                                            <label class="form-label" for="type">Type
                                            </label>
                                            <select name="type" id="type" class="form-control">
                                                <option value="">All</option>
                                                @foreach ($types as $type)
                                                    <option value="{{$type->id}}" @if($selected_type == $type->id) selected @endif >{{$type->title}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-2">
                                            <label class="form-label" for="type">Name
                                            </label>
                                            <select name="user" id="type" class="form-control">
                                                <option value="">All</option>
                                                @foreach ($users as $user)
                                                    <option value="{{$user->id}}" @if($selected_user == $user->id) selected @endif>{{$user->name}}  </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-2">
                                            <label class="form-label" for="status">Status
                                            </label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="">All</option>
                                                @foreach ($statuses as $status)
                                                    <option value="{{$status->id}}" @if($selected_status == $status->id) selected @endif>{{$status->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2 form-group">
                                            <label class="form-label" for="start_date">From Date</label>
                                            <input type="date" name="start_date" id="start_date" value="{{$selected_start_date}}" class="form-control">
                                        </div>
                                        <div class="col-2 form-group">
                                            <label class="form-label" for="end_date">To Date</label>
                                            <input type="date" name="end_date" id="end_date" value="{{$selected_end_date}}" class="form-control">
                                        </div>
                                        <div class="col-2 form-group">
                                            <button class="btn btn-success mt-3" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table id="exportTable" class="table table-dark table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>In Time</th>
                                    <th>Out Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rows as $key => $row)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <th>{{$row->name}}</th>
                                        <th>{{$row->type->title}}</th>
                                        <th>{{$row->date}}</th>
                                        <th><span class="badge badge-success">{{$row->in_time}}</span></th>
                                        <th><span class="badge badge-danger">{{$row->out_time}}</span></th>
                                        <th>{{$row->status->title}}</th>
                                        <th>
                                            <!----- delete Modal ----->
                                            <button  type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$key}}"><i class="fe-trash"></i></button>
                                            @include('admin.inc.delete')
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
