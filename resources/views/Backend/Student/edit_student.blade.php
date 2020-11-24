@extends('Backend.layouts.app')   
@section('title', 'Edit Student')
@section('head', 'Edit Student')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="page-title">
            <i class="mdi mdi-calendar-clock title_icon"></i>Edit Student
            <a href="{{route('student.index')}}" class="btn btn-outline-primary btn-rounded alignToTitle"  style="float: right" > <i class=" fas fa-arrow-circle-left mr-2"></i>Go Back To List Page</a>
        </h4>
    </div> 
</div> 
<form action="{{route('student.update',$student->student_id)}}"  method="post" enctype="multipart/form-data" id="edit_student">@csrf
    @method("PUT")
    @if(session('msg'))
    <div class="alert with-close alert-info alert-dismissible fade show" role="alert">
        {{(session('msg'))}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>   
    @endif
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Personal Info</h4>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label >Student School ID</label>
                        <input value="{{old('student_school_id') ? old('student_school_id') :$student->student_school_id}}" disabled class="form-control">
                    </div>
                    <div class="col-lg-3">
                        <label for="student_roll_number" >Roll Number<span style="color:red;">*</span></label>
                        <input value="{{old('student_roll_number') ? old('student_roll_number') :$student->student_roll_number}}" type="text" name="student_roll_number" class="form-control" id="student_roll_number">
                    </div>
                    <div class="col-lg-3">
                        <label for="student_name">Student Name<span style="color:red;">*</span></label>
                        <input value="{{old('student_name') ? old('student_name') : $student->student_name}}" type="text" name="student_name" class="form-control" id="student_name" placeholder="First Name Here">
                    </div>
                    <div class="col-lg-3">
                        <label for="student_birthday_date">Birthday Date</label>
                        <input type="date" value="{{old('student_birthday_date') ? old('student_birthday_date') : $student->student_birthday_date}}" name="student_birthday_date" type="text" class="form-control" id="student_birthday_date datepicker-autoclose" placeholder="mm/dd/yyyy">
                    </div>
                </div>
    
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="class_name" >Class<span style="color:red;">*</span></label>
                        <select name="class_name" class="select2 form-control custom-select" id="class_name" onchange="getSection()">
                            <option disabled selected hidden>Select</option>
                            @foreach($className as $value)
                            <option value="{{$value->class_id}}" {{$student->className->class_id == $value->class_id ? 'selected' : ""}}>{{$value->class_name}}</option>
                            @endforeach
                        </select>    
                    </div>
                    <div class="col-lg-3">
                        <label>Section<span style="color:red;">*</span></label>
                        <select name="section_name" id="section_name" class="select2 form-control custom-select">
                            <option value="" selected disabled hidden>Select</option>
                            @foreach($sectionName as $value)
                            <option class="sectionOpt" value="{{$value->section_id}}" {{$student->sectionName->section_id == $value->section_id ? 'selected' : ""}}>{{$value->section_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label>Blood<span style="color:red;">*</span></label>
                        <select name="blood_name" id="blood_name" class="select2 form-control custom-select">
                            <option selected disabled hidden>Select</option>
                            @foreach($blood as $value)
                            <option value="{{$value->blood_id}}" {{$student->bloodName->blood_id == $value->blood_id ? 'selected' : ""}}>{{$value->blood_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="gender_name">Gender<span style="color:red;">*</span></label>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="one" {{$student->gender_name=='1' ? 'checked' : ''}} value="1" name="gender_name" required>
                            <label class="custom-control-label" for="one">Male</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="two" {{$student->gender_name=='2' ? 'checked' : ''}} value="2" name="gender_name" required="">
                            <label class="custom-control-label" for="two">Female</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="three" value="3" name="gender_name" required="">
                            <label class="custom-control-label" for="three">other</label>
                        </div>
                    </div>
                </div>
    
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="student_mothers_name">Mother's Name</label>
                        <input value="{{old('student_mothers_name') ? old('student_mothers_name') : $student->student_mothers_name}}" type="text" name="student_mothers_name" class="form-control" id="student_mothers_name" placeholder="First Name Here">
                    </div>
                    <div class="col-lg-3">
                        <label for="student_fathers_name">Father's Name</label>
                        <input value="{{old('student_fathers_name') ? old('student_fathers_name') : $student->student_fathers_name}}" type="text" name="student_fathers_name" class="form-control" id="student_fathers_name" placeholder="First Name Here">
                    </div>
                    <div class="col-lg-3">
                        <label for="student_admition_date">Admition Date</label>
                        <input type="date" value="{{old('student_admition_date') ? old('student_admition_date') : $student->student_admition_date}}" type="text" name="student_admition_date" class="form-control" id="date" placeholder="mm/dd/yyyy">
                    </div>
                    
                    <div class="col-lg-3">
                        <label for="religion_name">Religion</label>
                        <input value="{{old('religion_name') ? old('religion_name') : $student->religion_name}}" id="religion_name" name="religion_name" type="text" class="form-control">
                    </div>
                </div>
    
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="student_phone">Phone</label>
                        <input value="{{old('student_phone') ? old('student_phone') : $student->student_phone}}" type="text" class="form-control" name="student_phone" id="student_phone">
                    </div>
                    <div class="col-lg-3">
                        <label for="student_email">Email</label>
                        <input value="{{old('student_email') ? old('student_email') : $student->student_email}}" disabled class="form-control" id="student_email">
                    </div>
                    <div class="col-lg-6">
                        <label for="student_current_address">Current Address</label>
                        <textarea value="" class="form-control" name="student_current_address" id="student_current_address " rows="1" name="address">{{old('student_current_address') ? old('student_current_address') : $student->student_current_address}}</textarea>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-lg-4 mt-1">
                        <div class="col-sm-12">
                            <label for="studentImage">Student Image</label>
                        </div>
                        <div class="col-sm-12">
                            @if("/Backend_assets/Files/Student/student_image/{{ $student->student_image }}")
                                <img style="height: 200px; width: 200px; border-radius: 100px;" name="student_image" id='studentImage' src="/Backend_assets/Files/Student/student_image/{{$student->student_image}}" alt="image" class='img-responsive'><br><br>
                                @else
                                <img src="{{asset('/Backend_assets/profile.jpg')}}">
                                @endif
                                <input type='file' id="student_image" name="student_image" onchange="readURL(this);" />
                                <span class="text-danger" id="image"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Guardian Info</h4>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="student_guardian_relation" >Relation With Student</label>
                        <input value="{{old('student_guardian_relation') ? old('student_guardian_relation') : $student->student_guardian_relation}}" type="text" class="form-control" name="student_guardian_relation" id="student_guardian_relation">
                    </div>
                    <div class="col-lg-3">
                        <label for="student_guardian_name" >Name<span style="color:red;">*</span></label>
                        <input value="{{old('student_guardian_name') ? old('student_guardian_name') : $student->student_guardian_name}}" type="text" class="form-control" name="student_guardian_name" id="student_guardian_name">
                    </div>
                    <div class="col-lg-3">
                        <label for="student_guardian_phone">Phone</label>
                        <input value="{{old('student_guardian_phone') ? old('student_guardian_phone') : $student->student_guardian_phone}}" type="text" name="student_guardian_phone" class="form-control" id="student_guardian_phone">
                    </div>
                    <div class="col-lg-3">
                        <label for="student_guardian_relation" >Guardian Occupation</label>
                        <input value="{{old('student_guardian_occupation') ? old('student_guardian_occupation') : $student->student_guardian_occupation}}" type="text" class="form-control" name="student_guardian_occupation" id="student_guardian_occupation">
                    </div>
                </div>
    
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="student_guardian_email" >Guardian Email</label>
                        <input value="{{old('student_guardian_email') ? old('student_guardian_email') : $student->student_guardian_email}}" type="text" class="form-control" id="student_guardian_email" disabled>
                    </div>
                    <div class="col-lg-3">
                        <label for="student_guardian_phone">Phone</label>
                        <input value="{{old('student_guardian_phone') ? old('student_guardian_phone') : $student->student_guardian_phone}}" type="text" name="student_guardian_phone" class="form-control" id="student_guardian_phone">
                        
                    </div>
                    <div class="col-lg-6">
                        <label for="student_guardian_phone">Address</label>
                        <input value="{{old('student_guardian_address') ? old('student_guardian_address') : $student->student_guardian_address}}" type="text" class="form-control" name="student_guardian_address" id="student_guardian_address">
                    </div>
                </div>
    
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div class="col-sm-12">
                            <label for="guardianImage">Guardian Image:</label>
                        </div>
                        <div class="col-sm-12">
                        @if("/Backend_assets/Files/Guardian/student_guardian_image/{{ $student->student_guardian_image }}")
                        <img style="height: 200px; width: 200px; border-radius: 100px;" name="student_guardian_image" id='guardianImage' src="/Backend_assets/Files/Guardian/student_guardian_image/{{ $student->student_guardian_image }}" alt="image" class='img-responsive'>
                        @else
                        <img src="{{asset('Backend_assets/profile.jpg')}}">
                        @endif
                        <br><br>
                        <input type='file' id="student_guardian_image" name="student_guardian_image" onchange="readURL1(this);" />
                        <span class="text-danger" id="image"></span>    
                        </div> 
                    </div>
                    <div class="col-lg-6">
                        <div class="col-sm-12">
                            <label for="guardianIdcard">Id Card or Birth Certificate</label>
                        </div>
                        <div class="col-sm-12">
                        @if("/Backend_assets/Files/Guardian/student_guardian_idcard/{{ $student->student_guardian_idcard }}")
                        <img style="height: 350px; width: 450px;" name="student_guardian_idcard" id='guardianIdcard' src="/Backend_assets/Files/Guardian/student_guardian_idcard/{{ $student->student_guardian_idcard }}" alt="image" class='img-responsive'>
                        @else
                        <img src="{{asset('Backend_assets/profile.jpg')}}">
                        @endif
                        <br><br>
                        <input type='file' id="student_guardian_idcard" name="student_guardian_idcard" onchange="readURL2(this);" />
                        <span class="text-danger" id="image"></span>
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
    </div>
</form>
@endsection
@section('js')
<script>
    function getSection(){
        let data = $('#class_name').val();
        $.ajax({
            url:`/admin/student/sectionData/${data}`,
            type:`get`,
            dataType:`json`,
            success:function(response){
                $('.sectionOpt').remove();
                response.forEach(function(value,index){
                    
                    $('#section_name').append(`
                        <option class="sectionOpt" value="${value.section_id}" >${value.section_name}</option>
                        `);
                })
            },

        })
    }
</script>
<script src="{{asset('Backend_assets/js/studentImageEdit.js')}}"></script>
<script src="{{asset('Backend_assets/js/student.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\StudentRequest', '#edit_student'); !!}
@endsection