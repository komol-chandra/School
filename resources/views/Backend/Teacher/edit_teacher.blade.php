@extends('Backend.layouts.app')  
@section('title', 'Edit Teacher')
@section('head_name', 'Edit Teacher')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="page-title">
        <i class="mdi mdi-calendar-clock title_icon"></i>Edit Teacher
        <a href="{{route('teacher.index')}}" class="btn btn-outline-primary btn-rounded alignToTitle"  style="float: right" > <i class=" fas fa-arrow-circle-left mr-2"></i>Go Back To List Page</a>
        </h4>
    </div> 
</div>
<form action="{{route('teacher.update',$teacher->teacher_id)}}" id="update_teacher_form"  method="post" enctype="multipart/form-data">@csrf
    @method("PUT")
    @if(session('msg'))
    <div class="alert with-close alert-info alert-dismissible fade show" role="alert">
        {{(session('msg'))}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>   
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="form-horizontal">
                    <div class="card-body">
                        <h4 class="card-title">Personal Info</h4>
                        <input type="hidden" name="teacher_id" value="teacher_id">
                        <div class="form-group row">
                            <label for="teacher_name" class="col-sm-3 text-right control-label col-form-label">Name<span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" value="{{old('teacher_name') ? old('teacher_name') : $teacher->teacher_name}}" name="teacher_name" class="form-control" id="teacher_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="teacher_email" class="col-sm-3 text-right control-label col-form-label" >Email<span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                                <input disabled="disabled" type="email" value="{{old('teacher_email') ? old('teacher_email') : $teacher->users->email}}"  class="form-control" id="teacher_email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="teacher_designation_name" class="col-sm-3 text-right control-label col-form-label">Designation</label>
                            <div class="col-sm-9">
                                <select  name="teacher_designation_name" id="teacher_designation_name" class="select2 form-control custom-select">
                                    <option selected disabled hidden>Select</option>
                                    @foreach($designation as $value)
                                    <option value="{{$value->teacher_designation_id}}"{{$teacher->teacher_designation_name == $value->teacher_designation_id ? 'selected' : ''}}>{{$value->teacher_designation_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="department_name" class="col-sm-3 text-right control-label col-form-label">Department</label>
                            <div class="col-sm-9">
                                <select  name="department_name" id="department_name" class="select2 form-control custom-select">
                                    <option selected disabled hidden>Select</option>
                                    @foreach($department as $value)
                                    <option value="{{$value->department_id}}"{{$teacher->department_name == $value->department_id ? 'selected' : ''}}>{{$value->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="teacher_phone" class="col-sm-3 text-right control-label col-form-label">Phone Number<span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                                <input value="{{old('teacher_phone') ? old('teacher_phone') : $teacher->teacher_phone}}" type="text" name="teacher_phone" class="form-control" id="teacher_phone" placeholder="Phone Number Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender_name" class="col-sm-3 text-right control-label col-form-label">Gender</label>
                            <div class="col-sm-9">
                                <select  name="gender_name" id="gender_name" class="select2 form-control custom-select">
                                    <option selected disabled hidden>Select</option>
                                    @foreach($gender as $value)
                                    <option value="{{$value->gender_id}}"{{$teacher->gender_name == $value->gender_id ? 'selected' : ''}}>{{$value->gender_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="blood_name" class="col-sm-3 text-right control-label col-form-label">Blood Group</label>
                            <div class="col-sm-9">
                                <select name="blood_name" id="blood_name" class="select2 form-control custom-select">
                                    <option selected disabled hidden>Select</option>
                                    @foreach($blood as $value)
                                    <option value="{{$value->blood_id}}" {{$teacher->blood_name==$value->blood_id ?'selected' : ''}}>{{$value->blood_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="teacher_facebook" class="col-sm-3 text-right control-label col-form-label">Facebook Profile Link</label>
                            <div class="col-sm-9">
                                <input value="{{old('teacher_facebook') ? old('teacher_facebook') : $teacher->teacher_facebook}}" type="text" name="teacher_facebook" class="form-control" id="teacher_facebook" placeholder="Facebook Profile Link Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="teacher_twitter" class="col-sm-3 text-right control-label col-form-label">Twitter Profile Link</label>
                            <div class="col-sm-9">
                                <input value="{{old('teacher_twitter') ? old('teacher_twitter') : $teacher->teacher_twitter}}" type="text" name="teacher_twitter" class="form-control" id="teacher_twitter" placeholder="Twitter Profile Link Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="teacher_linkedin" class="col-sm-3 text-right control-label col-form-label">Linkedin Profile Link</label>
                            <div class="col-sm-9">
                                <input value="{{old('teacher_linkedin') ? old('teacher_linkedin') : $teacher->teacher_linkedin}}" type="text" name="teacher_linkedin" class="form-control" id="teacher_linkedin" placeholder="Linkedin Profile Link Here">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="teacher_address" class="col-sm-3 text-right control-label col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea  class="form-control" name="teacher_address" id="teacher_address " rows="5"  placeholder="address">{{old('teacher_address') ? old('teacher_address') : $teacher->teacher_address}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="teacher_about" class="col-sm-3 text-right control-label col-form-label">Bio</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="teacher_about" id="teacher_about " rows="5"  placeholder="About yourself">{{old('teacher_about') ? old('teacher_about') : $teacher->teacher_about}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="teacherUpdate" class="col-sm-3 control-label text-right"> Image:</label>
                        <div class="col-sm-9">
                            <img src="/{{ $teacher->users->profile_photo_path ? $teacher->users->profile_photo_path:'Backend_assets/profile.jpg' }}" alt="Profile" id="teacherUpdate" class="img-fluid" style="height: 200px; width: 200px; border-radius: 50%">
                            <input type='file' id="teacherUpdate" name="teacher_image" onchange="readURL1(this);" />
                            <span class="text-danger" id="teacherUpdate"></span>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="border-top">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
@section('js')
<script src="{{asset('Backend_assets/js/teacher.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\TeacherRequest', '#update_teacher_form'); !!}
@endsection