@extends('Backend.layouts.app')
@section('title', ' Subject')
@section('head', 'Subject')
@section('head_name', 'Subject')
@section('content')

<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-info margin-5 text-white"  style="float:right" data-toggle="modal" data-target="#addModal">Add Subject</button>
        <h5 class="card-title">Basic Datatable</h5>
        <br>
        <div class="table-responsive">
            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="row mt-3">
                                {{-- <div class="col-md-4"></div> --}}
                                <div class="col-md-4 col-sm-3 mb-1">
                                    <h5 class="card-title">Filter Data</h5>
                                </div>
                                <div class="col-md-4 form-group row">
                                    <select id="filter_class" class="select2 form-control custom-select" onchange="loaddata()">
                                        <option disabled selected hidden >Select A Class</option>
                                        @foreach($data as $value)
                                            <option value="{{$value->class_id}}" >{{$value->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="subject_save" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Select Class</label>
                        <div class="col-md-9">
                            <select name="class_name" id="class_name" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                <option >Select Class</option>
                                @foreach($data as $value)
                                <option value="{{$value->class_id}}" >{{$value->class_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Subject Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="subject_name" class="form-control" id="subject_name" placeholder="Subject Name Here">
                            <span class="help-block" id="subject_name_error" style="color:red;"></span>
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

<form method="PUT" id="subject_update">@csrf
    <div class="modal fade" id="edit_subject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="subject_id" id="edit_subject_id">

                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Select Class</label>
                        <div class="col-md-9">
                            <select name="class_name" id="edit_class_name" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                <option >Select Class</option>
                                @foreach($data as $value)
                                <option value="{{$value->class_id}}">{{$value->class_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label" >Subject Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="subject_name" class="form-control" id="edit_subject_name">
                            <span class="help-block" id="subject_name_edit" style="color:red;"></span>
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
</form>
{{--Edit Modal--}}
@endsection
@section('js')
<script src="{{asset('Backend_assets/js/subject.js')}}"></script>
@endsection
