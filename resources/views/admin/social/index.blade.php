@extends('admin.layouts.master')

@section('title',$title)

@section('content')
    <div class="container-fluid">
        @include('admin.inc.breadcrump')
        <form action="{{route($route.'.store')}}" method="post">
            @csrf
           <input type="hidden" name="id" value="{{(isset($row->id))?$row->id:-1}}">
            <div class="row">
                <div class="form-group col-6">
                    <label class="form-label" for="facebook">Facebook</label>
                    <input type="text" name="facebook" id="facebook" value="{{(isset($row->facebook))?$row->facebook:''}}" class="form-control">
                </div>
                <div class="form-group col-6">
                    <label class="form-label" for="twitter">Twitter</label>
                    <input type="text" name="twitter" id="twitter" value="{{(isset($row->twitter))?$row->twitter:''}}" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label class="form-label" for="instagram">Instagram</label>
                    <input type="text" name="instagram" id="instagram" value="{{(isset($row->instagram))?$row->instagram:''}}" class="form-control">
                </div>
                <div class="form-group col-6">
                    <label class="form-label" for="skype">Skype</label>
                    <input type="text" name="skype" id="skype" value="{{(isset($row->skype))?$row->skype:''}}" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label class="form-label" for="whatsapp">whatsapp</label>
                    <input type="text" name="whatsapp" id="whatsapp" value="{{(isset($row->whatsapp))?$row->whatsapp:''}}" class="form-control">
                </div>
                <div class="form-group col-6">
                    <label class="form-label" for="youtube">Youtube</label>
                    <input type="text" name="youtube" id="youtube" value="{{(isset($row->youtube))?$row->youtube:''}}" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label class="form-label" for="linkedin">Linkedin</label>
                    <input type="text" name="linkedin" id="linkedin" value="{{(isset($row->linkedin))?$row->linkedin:''}}" class="form-control">
                </div>
                <div class="form-group col-6">
                    <label class="form-label" for="pinterest">Pinterest</label>
                    <input type="text" name="pinterest" id="pinterest" value="{{(isset($row->pinterest))?$row->pinterest:''}}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection