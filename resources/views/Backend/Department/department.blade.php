@extends('Backend.layouts.app')
@section('title', ' Department')
@section('head', 'Department')
@section('head_name', 'Department')
@section('content')

<button type="button" class="btn btn-info margin-5 text-white " data-toggle="modal" data-target="#addModal">Add Department</button><br><br>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Basic Datatable Expriment

        </h5>
        <div class="table-responsive">
            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="zero_config_length">
                            <label>Show <select id="perPage" name="zero_config_length" aria-controls="zero_config" class="form-control form-control-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="zero_config_filter" class="dataTables_filter" style="float: right;">
                            <label>Search:<input type="search" class="search form-control form-control-sm" placeholder="" aria-controls="zero_config">
                            </label>
                        </div>
                    </div>
                </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="department_save" method="post">
                    @csrf

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Department Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="department_name" class="form-control" id="department_name" placeholder="Department Name Here">
                            <span class="help-block" id="department_name_error" style="color:red;"></span>
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

<form method="PUT" id="department_update">@csrf
    <div class="modal fade" id="edit_department" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="department_id" id="edit_department_id">

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label" >Department Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="department_name" class="form-control" id="edit_department_name">
                            <span class="help-block" id="department_name_error" style="color:red;"></span>
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
<script src="{{asset('Backend_assets/js/department.js')}}"></script>
@endsection
