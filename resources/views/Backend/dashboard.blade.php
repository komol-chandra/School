@extends('Backend.layouts.app')
@section('title', ' Dashboard')
@section('head', 'Dashboard')
@section('head_name', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-sm-6 col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <img src="{{asset('Backend_assets/Files/Basic_Image/teacher.jpg')}}" class="my-2 rounded-circle img-fluid img-thumbnail" style="width: 100px ;max-height: 100px; ">
                <h4 class="text-white" id="teacherdata">2540</h4>
                <h6 class="text-white">Teacher</h6>
                <a class="btn btn-secondary" href="{{ route('teacher.index') }}"> More Info</a>
            </div>
        </div>
    </div>
    <div class="col-md-6  col-sm-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-danger text-center">
                <img src="{{asset('Backend_assets/Files/Basic_Image/student.jpg')}}" class="my-2 rounded-circle img-fluid img-thumbnail" style="width: 100px ;max-height: 100px; ">
                <h4 class="text-white" id="studentData"></h4>
                <h6 class="text-white">Student List</h6>
                <a class="btn btn-secondary" href="{{ route('student.index') }}"> More Info</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-info text-center">
                <img src="{{asset('Backend_assets/Files/Basic_Image/staff.jpg')}}" class="my-2 rounded-circle img-fluid img-thumbnail" style="width: 100px ;max-height: 100px; ">
                <h4 class="text-white" id="staffData"></h4>
                <h6 class="text-white">Staff</h6>
                <a class="btn btn-secondary" href="{{ route('staff.index') }}"> More Info</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-dark text-center">
                <img src="{{asset('Backend_assets/Files/Basic_Image/parents.jpg')}}" class="my-2 rounded-circle img-fluid img-thumbnail" style="width: 100px ;max-height: 100px; ">
                <h4 class="text-white" id="parentData"></h4>
                <h6 class="text-white">Parents</h6>
                <a class="btn btn-secondary" href="{{ url('/admin/guardianList') }}"> More Info</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-warning text-center">
                <img src="{{asset('Backend_assets/Files/Basic_Image/admition.png')}}" class="my-3 rounded-circle img-fluid img-thumbnail" style="width: 100px ;max-height: 100px; ">
                <h6 class="text-white">Admit Student</h6>
                <a class="btn btn-secondary" href="{{ route('student.create') }}"> More Info</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-dark text-center">
                <img src="{{asset('Backend_assets/Files/Basic_Image/setting.png')}}" class="my-3 rounded-circle img-fluid img-thumbnail" style="width: 100px ;max-height: 100px; ">
                <h6 class="text-white">Settings</h6>
                <a class="btn btn-secondary" href="{{ route('settings.index') }}"> More Info</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <img src="{{asset('Backend_assets/Files/Basic_Image/routine.png')}}" class="my-3 rounded-circle img-fluid img-thumbnail" style="width: 100px ;max-height: 100px; ">
                <h6 class="text-white">Routine</h6>
                <a class="btn btn-secondary" href="{{ route('routine.index') }}"> More Info</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-info text-center">
                <img src="{{asset('Backend_assets/Files/Basic_Image/Attendance.png')}}" class="my-3 rounded-circle img-fluid img-thumbnail" style="width: 100px ;max-height: 100px; ">
                <h6 class="text-white">Attendance</h6>
                <a class="btn btn-secondary" href="#"> More Info</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <img src="{{asset('Backend_assets/Files/Basic_Image/syllabus.png')}}" class="my-3 rounded-circle img-fluid img-thumbnail" style="width: 100px ;max-height: 100px; ">
                <h6 class="text-white">Syllabus</h6>
                <a class="btn btn-secondary" href="{{ route('syllabus.index') }}"> More Info</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-danger text-center">
                <img src="{{asset('Backend_assets/Files/Basic_Image/event.png')}}" class="my-3 rounded-circle img-fluid img-thumbnail" style="width: 100px ;max-height: 100px; ">
                <h6 class="text-white">Event Calender</h6>
                <a class="btn btn-secondary" href="{{ route('eventCalender.index') }}"> More Info</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-info text-center">
                <img src="{{asset('Backend_assets/Files/Basic_Image/library.png')}}" class="my-3 rounded-circle img-fluid img-thumbnail" style="width: 100px ;max-height: 100px; ">
                <h6 class="text-white">Library</h6>
                <a class="btn btn-secondary" href="{{ route('library.index') }}"> More Info</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pie Chart</h5>
                <div class="pie" style="height: 400px;"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Line Chart</h5>
                <div class="bars" style="height: 400px;"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        getTeacher();
        getStudent();
        getStaff();
        getParent();

        function getTeacher() {
            $.ajax({
                url: "/admin/teacherDashboard",
                type: "get",
                cache: false,
                datatype: "html",
                success: function(data) {
                    $("#teacherdata").html(data);
                }
            });
        }
        function getStudent() {
            $.ajax({
                url: "/admin/studentDashboard",
                type: "get",
                cache: false,
                datatype: "html",
                success: function(data) {
                    $("#studentData").html(data);
                }
            });
        }
        function getParent() {
            $.ajax({
                url: "/admin/parentDashboard",
                type: "get",
                cache: false,
                datatype: "html",
                success: function(data) {
                    $("#parentData").html(data);
                }
            });
        }
        function getStaff() {
            $.ajax({
                url: "/admin/staffDashboard",
                type: "get",
                cache: false,
                datatype: "html",
                success: function(data) {
                    $("#staffData").html(data);
                }
            });
        }
    });
</script>
@endsection
