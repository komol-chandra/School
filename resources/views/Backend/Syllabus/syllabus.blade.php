@extends('Backend.layouts.app')
@section('title', 'Syllabus')
@section('head', 'Syllabus')
@section('head_name', 'Syllabus')
@section('content')
<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-info margin-5 text-white"  style="float:right" data-toggle="modal" data-target="#addModal">Add Syllabus</button>
        <h5 class="card-title"  >Basic Datatable</h5>
        <br>
        @if(session('msg'))
        <div class="alert with-close alert-info alert-dismissible fade show" role="alert">
            {{(session('msg'))}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
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
                                {{-- <div class="col-md-2">
                                    <button class="btn btn-block btn-secondary" onclick="loaddata()" >Filter</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="data_lists"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
{{--Add Modal--}}

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Syllabus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('syllabus.store')}}" id="syllabous_form"  method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Title</label>
                        <div class="col-md-9">
                            <input type="text" name="syllabus_title_name" class="form-control" id="syllabus_title_name" placeholder="Title" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Class</label>
                        <div class="col-md-9">
                            <select name="class_name" id="class_name" class="select2 form-control custom-select" style="width: 100%; height:36px;">
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
                            <select name="section_name" id="section_name" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                <option  value="">Section</option>
                                @foreach($section as $value)
                                <option value="{{$value->section_id}}">{{$value->section_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Subject</label>
                        <div class="col-md-9">
                            <select name="subject_name" id="subject_name" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                <option  value="">Subject</option>
                                @foreach($subject as $value)
                                <option value="{{$value->subject_id}}">{{$value->subject_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Upload Syllabus</label>
                        <div class="col-lg-9">
                            <input type='file' id="syllabus_image" name="syllabus_image" />
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
{{--Edit Modal--}}
{{-- <form method="PUT" id="class_routine_update">@csrf
    <div class="modal fade" id="edit_class_routine" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Routine</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="subject_id" id="edit_routine_id">

                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Class</label>
                        <div class="col-md-9">
                            <select name="class_name" id="edit_class_name" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                <option >Class</option>
                                @foreach($class as $value)
                                <option value="{{$value->class_id}}">{{$value->class_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Section</label>
                        <div class="col-md-9">
                            <select name="section_name" id="edit_section_name" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                <option >Section</option>
                                @foreach($section as $value)
                                <option value="{{$value->section_id}}">{{$value->section_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Subject</label>
                        <div class="col-md-9">
                            <select name="subject_name" id="edit_subject_name" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                <option >Subject</option>
                                @foreach($subject as $value)
                                <option value="{{$value->subject_id}}">{{$value->subject_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Teacher</label>
                        <div class="col-md-9">
                            <select name="teacher_name" id="edit_teacher_name" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                <option >Teacher</option>
                                @foreach($teacher as $value)
                                <option value="{{$value->teacher_id}}">{{$value->teacher_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Class Room</label>
                        <div class="col-md-9">
                            <select name="classroom_name" id="edit_class_room" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                <option >Class Room</option>
                                @foreach($classroom as $value)
                                <option value="{{$value->classroom_id}}">{{$value->classroom_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Day</label>
                        <div class="col-md-9">
                            <select name="day_name" id="edit_day_name" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                <option >Day</option>
                                @foreach($day as $value)
                                <option value="{{$value->day_id}}">{{$value->day_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Starting Hour</label>
                        <div class="col-md-9">
                            <select name="sh_hour" id="edit_start_hour" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                <option >Starting Hour</option>
                                @foreach($startingHour as $value)
                                <option value="{{$value->sh_id}}">{{$value->sh_hour}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Starting Minute</label>
                        <div class="col-md-9">
                            <select name="sm_minute" id="edit_start_minute" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                <option >Starting Minute</option>
                                @foreach($startingMinute as $value)
                                <option value="{{$value->sm_id}}">{{$value->sm_minute}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Ending Hour</label>
                        <div class="col-md-9">
                            <select name="en_hour" id="edit_end_hour" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                <option >Ending Hour</option>
                                @foreach($endingHour as $value)
                                <option value="{{$value->en_id}}">{{$value->en_hour}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Ending Minute</label>
                        <div class="col-md-9">
                            <select name="em_minute" id="edit_end_minute" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                <option >Ending Minute</option>
                                @foreach($endingMinute as $value)
                                <option value="{{$value->em_id}}">{{$value->em_minute}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" id="close2" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form> --}}
{{--Edit Modal--}}
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
<script src="{{asset('Backend_assets/js/syllabus.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\SyllabusRequest', '#syllabous_form'); !!}
{!! JsValidator::formRequest('App\Http\Requests\SyllabusRequest', '#update_class_form'); !!}
@endsection
