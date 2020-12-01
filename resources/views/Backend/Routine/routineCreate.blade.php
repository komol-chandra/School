@extends('Backend.layouts.app')
@section('title', ' Routine')
@section('head_name', 'Add New Routine')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="page-title">
        <i class="mdi mdi-calendar-clock title_icon"></i>Add New Routine
        <a href="{{route('routine.index')}}" class="btn btn-outline-primary btn-rounded alignToTitle"  style="float: right" ><i class="fas fa-arrow-circle-left mr-2"></i>Go Back to List Page</a>
        </h4>
    </div> 
</div>
@if(session('msg'))
    <div class="alert with-close alert-info alert-dismissible fade show" role="alert">
        {{(session('msg'))}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>  
@endif
<form action="{{route('routine.store')}}"  method="post" enctype="multipart/form-data">@csrf
<div class="card">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-lg-4">
                <label for="class_name" >Class<span style="color:red;">*</span></label>
                <select name="class_name" class="select2 form-control custom-select" id="class_name" onchange="getSection()" >
                    <option disabled selected hidden>Select</option>
                    @foreach($classNames as $className)
                    <option value="{{$className->class_id}}">{{$className->class_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4">
                <label for="section_name" >Section<span style="color:red;">*</span></label>
                <select name="section_name" id="section_name" class="select2 form-control custom-select">
                    <option value="" selected disabled hidden>Select</option>

                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-1">
                <label for="day_name" >Day<span style="color:red;">*</span></label>
                <select name="day_name[]" class="select2 form-control custom-select" id="day_name">
                    <option disabled selected hidden>Select</option>
                    @foreach($days as $day)
                    <option value="{{$day->day_id}}">{{$day->day_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-1">
                <label for="period_name" >Period<span style="color:red;">*</span></label>
                <select name="period_name[]" class="select2 form-control custom-select" id="period_name">
                    <option disabled selected hidden>Select</option>
                    @foreach($periods as $period)
                    <option value="{{$period->period_id}}">{{$period->period_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-2">
                <label for="teacher_name" >Teacher<span style="color:red;">*</span></label>
                <select name="teacher_name[]" class="select2 form-control custom-select" id="teacher_name">
                    <option disabled selected hidden>Select</option>
                    @foreach($teachers as $teacher)
                    <option value="{{$teacher->teacher_id}}">{{$teacher->teacher_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-1">
                <label for="subject_name" >Subject<span style="color:red;">*</span></label>
                <select name="subject_name[]" class="select2 form-control custom-select" id="subject_name" >
                    <option disabled selected hidden>Select</option>
                    @foreach($subjects as $subject)
                    <option value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-1">
                <label for="classroom_name" >Classroom<span style="color:red;">*</span></label>
                <select name="classroom_name[]" class="select2 form-control custom-select" id="classroom_name">
                    <option disabled selected hidden>Select</option>
                    @foreach($classRooms as $classRoom)
                    <option value="{{$classRoom->classroom_id}}">{{$classRoom->classroom_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-2">
                <label for="sarting_hour" >Sarting time<span style="color:red;">*</span></label>
                <input type="time" name="sarting_hour[]" class="form-control" id="sarting_hour">

            </div>
            <div class="col-lg-2">
                <label for="ending_hour" >Ending time<span style="color:red;">*</span></label>
                <input type="time" name="ending_hour[]" class="form-control" id="ending_hour">

            </div>
            <div class="col-lg-1">
                <label for="duration" >Duration<span style="color:red;">*</span></label>
                <input type="text" name="duration[]" class="form-control" id="duration">

            </div>
            <button class='btn btn-success btn-sm add_field' type="button" style='margin-left: 8px;'><i class="fa fa-plus-square"></i></button>
        </div><br>
        <div class="input_field"></div>
    </div>
</div>
<div class="row">
    <button type='submit' class="btn btn-success submit ml-2">Submit</button>
</div>
</form>
@endsection
@section('js')
<script src="{{asset('Backend_assets/js/dynamic_routine_create.js')}}"></script>
@endsection