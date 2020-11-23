@extends('Backend.layouts.app')
@section('title', ' Teacher')
{{-- @section('head', 'Teacher') --}}
@section('head_name', 'Teacher')
@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="page-title">
        <i class="mdi mdi-calendar-clock title_icon"></i>Teacher
        <a href="{{route('teacher.create')}}" class="btn btn-outline-primary btn-rounded alignToTitle"  style="float: right" > <i class="mdi mdi-plus"></i> Add New Teacher</a>
        </h4>
    </div> 
</div> 
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
                        <div id="data_lists">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="{{asset('Backend_assets/js/teacher.js')}}"></script>
@endsection