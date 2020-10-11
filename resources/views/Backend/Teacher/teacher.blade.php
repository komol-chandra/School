@extends('Backend.layouts.app')
@section('title', ' Teacher')
@section('head', 'Teacher')
@section('head_name', 'Teacher')

@section('content')
<div class="row">
    <a class="btn btn-default mb-3" href="{{route('teacher.create')}}">add new</a>
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
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-sm" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($teacher as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <img src="/Backend_assets/Files/Teacher//{{$value->teacher_image}}" alt="Profile" class="img-fluid" style="height: 50px; width: 50px; border-radius: 50%">
                                        </td>
                                        <td>{{$value->teacher_name}}</td>
                                        <td>{{$value->teacher_email}}</td>
                                        <td>{{$value->Designation->teacher_designation_name}}</td>
                                        <td>{{$value->Department->department_name}}</td>
                                        <td>
                                            @if($value->status==1)
                                            <span class="text text-success">Active</span>
                                            @else
                                            <span class="text text-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->status==1)
                                            <button class="btn btn-outline-success btn-sm status" id="status" data="{{$value->teacher_id}}"><i class="fas fa-sync"></i></button>
                                            @else
                                            <button class="btn btn-outline-info btn-sm status" id="status" data="{{$value->teacher_id}}"><i class="fas fa-sync"></i></button>
                                            @endif
                                            <button class="btn btn-outline-danger btn-sm" id="delete" data-csrf="{{csrf_token()}}" data="{{$value->teacher_id}}"><i class="fas fa-trash"></i></button>
                                            <a type="button" href="{{route('teacher.edit',$value->teacher_id)}}" class="btn btn-outline-info btn-sm edit"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
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