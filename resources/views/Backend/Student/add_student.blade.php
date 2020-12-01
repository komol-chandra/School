@extends('Backend.layouts.app')
@section('title', '  Student Admission Form')
@section('head_name', ' Student Admission Form')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="page-title">
        <i class="mdi mdi-calendar-clock title_icon"></i>Add Student
        <a href="{{route('student.index')}}" class="btn btn-outline-primary btn-rounded alignToTitle"  style="float: right" > <i class=" fas fa-arrow-circle-left mr-2"></i>Go Back To List Page</a>
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
    <div class="row">
        <div class="col-lg-12">
            <section id="tabs" class="project-tab">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <nav>
                                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Single Student </a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Multi Student </a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">File Upload</a>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                            
                            <div class="tab-content" id="nav-tabContent">
                                {{-- Single Student --}}
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <form action="{{route('student.store')}}" method="post" enctype="multipart/form-data" id="student_form">@csrf
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title mb-3">Personal Info</h4>
                                                <div class="row mb-3">
                                                    <div class="col-lg-3">
                                                        <label for="student_admission_date">Admition Date</label>
                                                        <input type="date" value="{{old('student_admission_date') ? old('student_admission_date') : ''}}" type="text" name="student_admission_date" class="form-control" id="date" placeholder="mm/dd/yyyy">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="student_roll_number" >Roll Number<span style="color:red;">*</span></label>
                                                        <input value="{{old('student_roll_number') ? old('student_roll_number') :''}}" type="text" name="student_roll_number" class="form-control" id="student_roll_number">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="student_name">Student Name<span style="color:red;">*</span></label>
                                                        <input value="{{old('student_name') ? old('student_name') :''}}" type="text" name="student_name" class="form-control" id="student_name" placeholder="First Name Here">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="student_birthday_date">Birthday Date</label>
                                                        <input type="date" value="{{old('student_birthday_date') ? old('student_birthday_date') : ''}}" name="student_birthday_date" type="text" class="form-control" id="student_birthday_date datepicker-autoclose" placeholder="mm/dd/yyyy">
                                                    </div>

                                                </div>
                                    
                                                <div class="row mb-3">
                                                    <div class="col-lg-3">
                                                        <label for="class_name" >Class<span style="color:red;">*</span></label>
                                                        <select name="class_name" class="select2 form-control custom-select" id="class_name" onchange="getSection()" >
                                                            <option disabled selected hidden>Select</option>
                                                            @foreach($className as $value)
                                                            <option value="{{$value->class_id}}">{{$value->class_name}}</option>
                                                            @endforeach
                                                        </select>  
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label>Section<span style="color:red;">*</span></label>
                                                        <select name="section_name" id="section_name" class="select2 form-control custom-select">
                                                            <option value="" selected disabled hidden>Select</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label>Blood</label>
                                                        <select name="blood_name" id="blood_name" class="select2 form-control custom-select">
                                                            <option selected disabled hidden>Select<span style="color:red;">*</span></option>
                                                            @foreach($blood as $value)
                                                                <option value="{{$value->blood_id}}">{{$value->blood_name}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="gender_name">Gender<span style="color:red;">*</span></label>
                                                        <div class="row">
                                                            <div class="custom-control custom-radio col-lg-4">
                                                                <input type="radio" class="custom-control-input" id="one" } value="1" name="gender_name" required>
                                                                <label class="custom-control-label" for="one">Male</label>
                                                            </div>
                                                            <div class="custom-control custom-radio col-lg-4">
                                                                <input type="radio" class="custom-control-input" id="two"  value="2" name="gender_name" required="">
                                                                <label class="custom-control-label" for="two">Female</label>
                                                            </div>
                                                            <div class="custom-control custom-radio col-lg-4">
                                                                <input type="radio" class="custom-control-input" id="three" value="3" name="gender_name" required="">
                                                                <label class="custom-control-label" for="three">other</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-lg-3">
                                                        <label for="student_mothers_name">Mother's Name</label>
                                                        <input value="{{old('student_mothers_name') ? old('student_mothers_name') : ''}}" type="text" name="student_mothers_name" class="form-control" id="student_mothers_name" placeholder="First Name Here">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="student_fathers_name">Father's Name</label>
                                                        <input value="{{old('student_fathers_name') ? old('student_fathers_name') : ''}}" type="text" name="student_fathers_name" class="form-control" id="student_fathers_name" placeholder="First Name Here">
                                                    </div>
                                                    
                                                    <div class="col-lg-3">
                                                        <label for="religion_name">Religion</label>
                                                        <input value="{{old('religion_name') ? old('religion_name') : ''}}" id="religion_name" name="religion_name" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="student_phone">Phone</label>
                                                        <input value="{{old('student_phone') ? old('student_phone') : ''}}" type="text" class="form-control" name="student_phone" id="student_phone">
                                                    </div>
                                                </div>
                                    
                                                <div class="row mb-3">
                                                    
                                                    <div class="col-lg-3">
                                                        <label for="student_email">Email<span style="color:red;">*</span></label>
                                                        <input value="{{old('student_email') ? old('student_email') : ''}}" type="email" class="form-control" id="student_email" name="email">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="student_email">Password<span style="color:red;">*</span></label>
                                                        <input value="" type="password" class="form-control" id="student_email" name="password">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="student_current_address">Current Address</label>
                                                        <textarea value="" class="form-control" name="student_current_address" id="student_current_address " rows="1" name="address">{{old('student_current_address') ? old('student_current_address') : ''}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-lg-6">
                                                        <div class="col-sm-12">
                                                            <label for="previmage">Student Image</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <img style="height: 200px; width: 200px; border-radius: 100px;" id='studentImg' src="{{asset('/Backend_assets/profile.jpg')}}" alt="image" class='img-responsive'><br><br>
                                                                <input type='file' id="studentImg" name="profile_photo" onchange="readURL(this);" />
                                                                <span class="text-danger" id="studentImg"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="col-sm-12">
                                                            <label for="studentBirthCardImg">Student Birth Certificate</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <img style="height: 200px; width: 200px; border-radius: 100px;"  id='studentBirthCardImg' src="{{asset('/Backend_assets/profile.jpg')}}" alt="image" class='img-responsive'><br><br>
                                                            <input type='file' id="studentBirthCardImg" name="student_birth_certificate" onchange="readURL1(this);" />
                                                            <span class="text-danger" id="studentBirthCardImg"></span>
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
                                                        <input value="{{old('student_guardian_relation') ? old('student_guardian_relation') : ""}}" type="text" class="form-control" name="student_guardian_relation" id="student_guardian_relation">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="student_guardian_name" >Name<span style="color:red;">*</span></label>
                                                        <input value="{{old('student_guardian_name') ? old('student_guardian_name') : ""}}" type="text" class="form-control" name="student_guardian_name" id="student_guardian_name">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="student_guardian_phone">Phone</label>
                                                        <input value="{{old('student_guardian_phone') ? old('student_guardian_phone') :""}}" type="text" name="student_guardian_phone" class="form-control" id="student_guardian_phone">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="student_guardian_relation" >Guardian Occupation</label>
                                                        <input value="{{old('student_guardian_occupation') ? old('student_guardian_occupation') : ""}}" type="text" class="form-control" name="student_guardian_occupation" id="student_guardian_occupation">
                                                    </div>
                                                </div>
                                    
                                                <div class="row mb-3">
                                                    
                                                    <div class="col-lg-3">
                                                        <label for="student_guardian_email" >Guardian Email<span style="color:red;">*</span></label>
                                                        <input value="{{old('student_guardian_email') ? old('student_guardian_email') : ""}}" type="text" class="form-control" name="guardian_email" id="student_guardian_email">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="student_guardian_pass">Password<span style="color:red;">*</span></label>
                                                        <input value="" type="password" class="form-control" id="student_guardian_pass" name="guardian_pass">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="student_guardian_phone">Address</label>
                                                        <input value="{{old('student_guardian_address') ? old('student_guardian_address') : ""}}" type="text" class="form-control" name="student_guardian_address" id="student_guardian_address">
                                                    </div>
                                                </div>
                                    
                                                <div class="row mb-3">
                                                    <div class="col-lg-6">
                                                        <div class="col-sm-12">
                                                            <label for="guardianImage">Guardian Image:</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <img style="height: 200px; width: 200px; border-radius: 100px;"  id='guardianImg' src="{{asset('/Backend_assets/profile.jpg')}}" alt="image" class='img-responsive'><br><br>
                                                            <input type='file' id="guardianImg" name="guardian_image" onchange="readURL2(this);" />
                                                                <span class="text-danger" id="guardianImg"></span>   
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="col-sm-12">
                                                            <label for="guardianIdcard">Id Card or Birth Certificate</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <img style="height: 200px; width: 200px; border-radius: 100px;"  id='guardianIdImg' src="{{asset('/Backend_assets/profile.jpg')}}" alt="image" class='img-responsive'><br><br>
                                                            <input type='file' id="guardianIdImg" name="student_guardian_idcard" onchange="readURL3(this);" />
                                                            <span class="text-danger" id="guardianIdImg"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Extra File </h4>
                                                <div class="row mb-3">
                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                        <label for="file_name">File Name</label>
                                                            <input value="" type="text" class="form-control" id="file_name" name="file_name[]">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="col-sm-12">
                                                            <label for="previmage">File Image</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                                <input type='file' id="fileImg" name="image_file[]" onchange="readURL4(this);" />
                                                                <span class="text-danger" id="fileImg"></span>
                                                        </div>
                                                    </div>
                                                        <button class='btn btn-success btn-sm add_field' type="button" style='margin-left: 8px;'><i class="fa fa-plus-square"></i></button>
                                                    
                                                </div>
                                                <div class="input_field"></div>
                                            </div>
                                        </div>
                                        <div class="border-top">
                                            <div class="card-body">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                {{-- Multi Student Insert --}}
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="card">
                                        <form action="">
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-lg-3">
                                                        <label for="class_name" >Class<span style="color:red;">*</span></label>
                                                        <select name="class_name" class="select2 form-control custom-select" id="class_name" onchange="getSection()" >
                                                            <option disabled selected hidden>Select</option>
                                                            @foreach($className as $value)
                                                            <option value="{{$value->class_id}}">{{$value->class_name}}</option>
                                                            @endforeach
                                                        </select>  
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label>Section<span style="color:red;">*</span></label>
                                                        <select name="section_name" id="section_name" class="select2 form-control custom-select">
                                                            <option value="" selected disabled hidden>Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-lg-2">
                                                        <label for="student_roll_number" >Roll Number<span style="color:red;">*</span></label>
                                                        <input value="{{old('student_roll_number') ? old('student_roll_number') :''}}" type="text" name="student_roll_number" class="form-control" id="student_roll_number">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="student_name">Student Name<span style="color:red;">*</span></label>
                                                        <input value="{{old('student_name') ? old('student_name') :''}}" type="text" name="student_name" class="form-control" id="student_name" placeholder="First Name Here">
                                                    </div>
                                                    <div class="col-lg-1">
                                                        
                                                        <label>Blood</label>
                                                        <select name="blood_name" id="blood_name" class="select2 form-control custom-select">
                                                            <option selected disabled hidden>Select</option>
                                                            @foreach($blood as $value)
                                                                <option value="{{$value->blood_id}}">{{$value->blood_name}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <label for="gender_name">Gender</label>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" id="one1" value="1" name="gender_name" >
                                                                <label class="custom-control-label" for="one1">Male</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" id="two2" value="2" name="gender_name" >
                                                                <label class="custom-control-label" for="two2">Female</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" id="three3" value="3" name="gender_name" >
                                                                <label class="custom-control-label" for="three3">other</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label for="student_email">Email</label>
                                                        <input value="{{old('student_email') ? old('student_email') : ''}}" type="email" class="form-control" id="student_email" name="email">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label for="student_email">Password</label>
                                                        <input value="" type="password" class="form-control" id="student_email" name="password">
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="student_guardian_name" > Guardian Name<span style="color:red;">*</span></label>
                                                        <input value="{{old('student_guardian_name') ? old('student_guardian_name') : ""}}" type="text" class="form-control" name="student_guardian_name" id="student_guardian_name">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="student_guardian_email" >Guardian Email<span style="color:red;">*</span></label>
                                                        <input value="{{old('student_guardian_email') ? old('student_guardian_email') : ""}}" type="text" class="form-control" name="guardian_email" id="student_guardian_email">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="student_guardian_pass">Password<span style="color:red;">*</span></label>
                                                        <input value="" type="password" class="form-control" id="student_guardian_pass" name="guardian_pass">
                                                    </div>
                                                    <button class='btn btn-success btn-sm add_field_multi' type="button" style=' margin-left: 8px;'><i class="fa fa-plus-square"></i></button>
                                                </div>
                                                <div class="input_field_multi"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                {{-- Multi Add Student --}}
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="card">
                                        
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('js')
<script src="{{asset('Backend_assets/js/student_add.js')}}"></script>
<script src="{{asset('Backend_assets/js/student_add_multi.js')}}"></script>
<script src="{{asset('Backend_assets/js/student_add_image.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\StudentRequest', '#student_form'); !!}

@endsection