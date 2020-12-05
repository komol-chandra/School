@extends('Backend.layouts.app')
@section('title', 'Daily Attendance')
@section('head', 'Daily Attendance')
@section('head_name', 'Daily Attendance')
@section('content')
<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-info margin-5 text-white"  style="float:right" data-toggle="modal" data-target="#addModal">Take Attendance</button>
        <h5 class="card-title">Daily Attendance</h5>
        <div class="table-responsive">
            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="row mt-3">
                                <div class="col-md-1"></div>
                                <div class="col-md-4">
                                    <select id="filter_class" class="select2 form-control custom-select" onchange="loaddata()">
                                        <option disabled selected hidden >Select A Class</option>
                                        @foreach($class as $value)
                                            <option value="{{$value->class_id}}" >{{$value->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select id="filter_section" class="select2 form-control custom-select" onchange="loaddata()">
                                        <option disabled selected hidden >Select A Section</option>
                                        @foreach($section as $value)
                                            <option value="{{$value->section_id}}" >{{$value->section_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-sm-12">
                        <div id="data_lists"></div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
</div>
{{--Add Modal--}}
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Attendance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  id="attendance_form"  method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Date</label>
                        <div class="col-md-9">
                            <input type="date" name="attendance_date" class="form-control" id="attendance_date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Class</label>
                        <div class="col-md-9">
                            <select name="class_name" id="class_name" class="select2 form-control custom-select" style="width: 100%; height:36px; ">
                                <option  value="" >Class</option>
                                @foreach($class as $value)
                                <option value="{{$value->class_id}}">{{$value->class_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Section</label>
                        <div class="col-md-9">
                            <select name="section_name" id="section_name" class="select2 form-control custom-select" style="width: 100%; height:36px;" onchange="loaddata()">
                                <option  value="">Section</option>
                                @foreach($section as $value)
                                <option value="{{$value->section_id}}">{{$value->section_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div id="data_lists"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" id="close" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--Add Modal--}}

@endsection
@section('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
<script src="{{asset('Backend_assets/js/attendance.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\AttendanceRequest', '#attendance_form'); !!}
@endsection
