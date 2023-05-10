@extends('admin.layouts.master')

@section('title',$title)

@section('content')
    @include('admin.inc.breadcrump')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body"> 
                    <h4 class="header-title mb-3">{{$title}}</h4>
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a href="#siteinfo" data-toggle="tab" aria-expanded="false" class="nav-link">
                                   Site Info
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#contactInfo" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                    Contact Info
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#customcss" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    Custom Css
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#account_tab" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    Account
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="siteinfo">
                               <form action="{{route($route.'.siteInfo')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{(isset($row->id))?$row->id:-1}}">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="form-label" for="title">Title</label>
                                            <input type="text" name="title" id="title" value="{{(isset($row->title))?$row->title:''}}" class="form-control">
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="form-label" for="description">Description</label>
                                            <textarea name="description" id="description" cols="30" rows="1" class="form-control">{{(isset($row->description))?$row->description:''}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="form-label" for="logo_image">Logo image</label>
                                            <input type="file" name="logo_image" id="logo_image" class="form-control">
                                            @if (isset($row->logo_path))
                                                <img src="{{asset($path.'/'.$row->logo_path)}}" alt="" >
                                            @endif
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="form-label" for="favicon_image">Favicon image</label>
                                            <input type="file" name="favicon_image" id="favicon_image" class="form-control">
                                            @if (isset($row->favicon_path))
                                                <img src="{{asset($path.'/'.$row->favicon_path)}}" alt="" >
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane show active" id="contactInfo">
                                <form action="{{route($route.'.contactInfo')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{(isset($row->id))?$row->id:-1}}">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="form-label" for="phone_one">Phone One</label>
                                            <input type="text" name="phone_one" value="{{(isset($row->phone_one))?$row->phone_one:''}}" class="form-control">
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="form-label" for="phone_two">Phone Two</label>
                                            <input type="text" name="phone_two" value="{{(isset($row->phone_two))?$row->phone_two:''}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="form-label" for="email_one">Email One</label>
                                            <input type="email" name="email_one" value="{{(isset($row->email_one))?$row->email_one:''}}" class="form-control">
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="form-label" for="email_two">Email Two</label>
                                            <input type="email" name="email_two" value="{{(isset($row->email_two))?$row->email_two:''}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="form-label" for="contact_address">Contact Adress</label>
                                            <input type="text" name="contact_address" value="{{(isset($row->contact_address))?$row->contact_address:''}}" class="form-control">
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="form-label" for="contact_mail">Contact Mail</label>
                                            <input type="email" name="contact_mail" value="{{(isset($row->contact_mail))?$row->contact_mail:''}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="form-label" for="office_hours">Office Hours</label>
                                            <input type="text" name="office_hours" value="{{(isset($row->office_hours))?$row->office_hours:''}}" class="form-control">
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="form-label" for="google_map">Google Map</label>
                                            <input type="text" name="google_map" value="{{(isset($row->google_map))?$row->google_map:''}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="customcss">
                                <form action="{{route($route.'.customCss')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{(isset($row->id))?$row->id:-1}}">
                                    <div class="form-group col-12">
                                        <label class="form-label" for="custom_css">Custom Css</label>
                                        <textarea name="custom_css" id="custom_css" cols="30" rows="5" class="form-control">{{(isset($row->custom_css))?$row->custom_css:''}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="account_tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="header-title">Email Change</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="offset-3 col-6">
                                                <form action="{{route($route.'.changeMail')}}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="form-label" for="email">Email</label>
                                                        <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control">
                                                        @error('email')
                                                            <div class="alert alert-danger">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-primary" type="submit">Email Change</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="header-title">
                                            Password Change
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6 offset-3">
                                                <form action="{{route($route.'.changePass')}}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="old_password">Old Password</label>
                                                        <input type="password" class="form-control" name="old_password" id="old_password" autocomplete="old_password" required> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">New Password</label>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password-confirm">Confirm Password</label>
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-primary" type="submit">Password Change </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
@endsection