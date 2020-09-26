@extends('Backend.layouts.app')
@section('title', ' Student')
@section('head', 'Student')
@section('content')
@if(session('msg'))
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
@endif
<div class="row">
    <a class="btn btn-default mb-3" href="{{url('/admin/student/create')}}">add new</a>
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
                            <table class="table table-striped table-bordered no-footer text-sm" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($student as $key =>$value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <img src="/Backend_assets/Files/Student/student_image/{{$value->student_image}}" alt="Profile" class="img-fluid" style="height: 50px; width: 50px; border-radius: 50%">
                                        </td>
                                        <td>{{$value->student_name}}</td>
                                        <td>{{$value->student_roll_number}}</td>
                                        <td>{{$value->class_name}}</td>
                                        <td>{{$value->section_name}}</td>
                                        <td>{{$value->category_name}}</td>
                                        <td>
                                            @if($value->status==1)
                                            <span class="text-success"> Active</span>
                                            @else
                                            <span class="text-secondary"> Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->status == 1)
                                            <button class="btn btn-outline-success btn-sm status" id="status" data="{{$value->student_id}}"><i class="fas fa-sync"></i></button>
                                            @else
                                            <button class="btn btn-outline-info btn-sm status" id="status" data="{{$value->student_id}}"><i class="fas fa-sync"></i></button>
                                            @endif
                                            <button class="btn btn-outline-danger btn-sm delete" data="{{$value->student_id}}" data-csrf="{{csrf_token()}}"><i class="fa fa-trash"></i></button>
                                            <a type="button" href="{{route('student.edit',$value->student_id)}}" class="btn btn-outline-info btn-sm edit"><i class="fas fa-edit"></i></a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
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
<script src="{{asset('Backend_assets/js/student.js')}}"></script>
@endsection