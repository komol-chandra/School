@extends('Backend.layouts.app')
@section('title', ' Guardian List')
@section('head_name', 'Guardian List')
@section('content')
{{-- <a class="btn btn-default mb-3" href="{{route('student.index')}}">Guardian List</a> --}}
<div class="card">
    <div class="card-body">
        <h4 class="page-title">
        <i class="mdi mdi-calendar-clock title_icon"></i>Guardian List
        <a href="{{route('student.index')}}" class=" mr-2 btn btn-outline-primary btn-rounded alignToTitle"  style="float: right" > <i class=" fas fa-arrow-circle-left"></i> Student List</a>
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
                            <table class="table table-striped table-bordered no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Occupation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($guardian as $key =>$value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <img name="" id='' src="/{{$value->guardianUsers ? $value->guardianUsers->profile_photo_path : "/Backend_assets/profile.jpg"}}" alt="image" class='img-responsive img-fluid' style="height: 50px; width: 50px; border-radius: 50%">
                                        </td>
                                        <td>{{$value->student_guardian_name}}</td>
                                        <td>{{$value->guardianUsers->email}}</td>
                                        <td>{{$value->student_guardian_phone}}</td>
                                        <td>{{$value->student_guardian_occupation}}</td>
                                        <td>
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
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Occupation</th>
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
{{-- <script src="{{asset('Backend_assets/js/student.js')}}"></script> --}}
@endsection