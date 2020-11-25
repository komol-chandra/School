@extends('Backend.layouts.app')
@section('title', ' Student')
@section('head_name', 'Student')
@section('content')
@if(session('msg'))
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
@endif
<div class="card">
    <div class="card-body">
        <h4 class="page-title">
        <i class="mdi mdi-calendar-clock title_icon"></i>Student List
        <a href="{{route('student.create')}}" class="btn btn-outline-primary btn-rounded alignToTitle"  style="float: right" > <i class="mdi mdi-plus"></i> Add New Student</a>
        <a href="{{ url('/admin/guardianList')}}" class=" mr-2 btn btn-outline-primary btn-rounded alignToTitle"  style="float: right" > <i class=" fas fa-arrow-circle-left"></i> Gurdian List</a>
        </h4>
    </div> 
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title text-center">Student Datatable</h4><br>

        <div class="row mt-3">
            <div class="col-md-4 mb-1">
                <h5 class="card-title">Filter Data</h5>
            </div>
            <div class="col-md-4 mb-1">
                <select name="class_name" class="select2 form-control custom-select" id="filterClass"  onchange="getSection()">
                    <option disabled selected hidden>Select Class Name</option>
                    @foreach($className as $vlaue)
                    <option value="{{$vlaue->class_id}}">{{$vlaue->class_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-1">
                <select name="section_name" id="filterSection" class="select2 form-control custom-select" onchange="datalist()">
                    <option  selected disabled hidden>Select</option>
                </select>
            </div>
        </div>
        <div id="data_lists"></div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('Backend_assets/js/student.js')}}"></script>
@endsection
