@extends('Backend.layouts.app')
@section('title', ' Routine')
@section('head', 'Routine')
@section('head_name', 'Routine')
@section('content')
<button data-toggle="modal" data-target="#add_modal" class="btn btn-primary" type="button">Add New</button>
<br><br>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Basic Datatable</h5>
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

@endsection
@section('js')
<script src="{{asset('Backend_assets/js/dynamicRoutine.js')}}"></script>
@endsection
