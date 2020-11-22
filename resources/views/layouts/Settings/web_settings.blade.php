@extends('Backend.layouts.app')
@section('title', ' Teacher')
{{-- @section('head', 'Teacher') --}}
@section('head_name', 'Teacher')
@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="page-title">
        <i class="mdi mdi-calendar-clock title_icon"></i>Website Settings
        </h4>
    </div> 
</div>
<div class="row">
    <div class="col-lg-2 col-sm-2">
        <div class=" ">
            <div class="">
                
                <a href="{{ url('/admin/notice/')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/notice')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>Noticeboard</a>
                <a href="{{ url('/admin/eventCalender')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/event_calendar')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>Events</a>
                <a href="{{ url('/admin/teacher')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/teacher')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>Teacher</a>
                <a href="{{url('/admin/web_settings')}}" class="btn  btn-secondary  btn-rounded btn-block alignToTitle {{ (request()->is('admin/web_settings')) ? 'active' : '' }}"  style="float: right" > <i class="mdi mdi-plus"></i>Web Settings</a>
                
            </div>
        </div>
    </div>
    <div class="col-lg-10 col-sm-10">
        <div class="card">
            {{-- <div class="card-body">
                <h2>form Part</h2>
            </div> --}}
            <div class="card-body">
                <h4 class="card-title">School Settings</h4>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label" name="school_phone">School Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="school_name"  id="cono1" placeholder="Name Here">
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label" name="school_phone">Phone No</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="school_phone"  id="cono1" placeholder="Phone No Here">
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label" name="school_address">Address</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="school_address"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')
<script src="{{asset('Backend_assets/js/abc.js')}}"></script>
@endsection