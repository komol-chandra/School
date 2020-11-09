@extends('Backend.layouts.app')
@section('title', ' Student')
@section('head', 'Student')
@section('content')
    @if(session('msg'))
    <div class="alert with-close alert-info alert-dismissible fade show" role="alert">
        {{(session('msg'))}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>  
    @endif
    <div class="row">
        <a class="btn btn-default mb-3" href="{{route('student.index')}}">List</a>
    </div>
    <form action="{{route('student.store')}}"  method="post" enctype="multipart/form-data">@csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="form-horizontal">
                    <div class="card-body">
                        <h4 class="card-title">Personal Info</h4>
                        <div class="form-group row">
                            <label for="student_admission_number" class="col-sm-3 text-right control-label col-form-label"> Admission Number <span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="student_admission_number" class="form-control" id="student_admission_number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_roll_number" class="col-sm-3 text-right control-label col-form-label">Roll Number <span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="student_roll_number" class="form-control" id="student_roll_number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="class_name" class="col-sm-3 text-right control-label col-form-label">Class <span style="color:red;">*</span></label>
                            <div class="col-md-9">
                                <select name="class_name" class="select2 form-control custom-select" id="class_name" onchange="getSection()" >
                                    <option disabled selected hidden>Select</option>
                                    @foreach($className as $className)
                                    <option value="{{$className->class_id}}">{{$className->class_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="section_name" class="col-sm-3 text-right control-label col-form-label">Section <span style="color:red;">*</span></label>
                            <div class="col-md-9">
                                <select name="section_name" id="section_name" class="select2 form-control custom-select">
                                    <option value="" selected disabled hidden>Select</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_name" class="col-sm-3 text-right control-label col-form-label"> Name <span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="student_name" class="form-control" id="student_name" placeholder="First Name Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_mothers_name" class="col-sm-3 text-right control-label col-form-label">Mother's Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="student_mothers_name" class="form-control" id="student_mothers_name" placeholder="First Name Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_fathers_name" class="col-sm-3 text-right control-label col-form-label">Father's Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="student_fathers_name" class="form-control" id="student_fathers_name" placeholder="First Name Here">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="student_birthday_date" class="col-sm-3 text-right control-label col-form-label">Birthday Date</label>
                            <div class="col-md-9">
                                <input name="student_birthday_date" type="date" class="form-control" id="student_birthday_date datepicker-autoclose" placeholder="mm/dd/yyyy">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="student_admition_date" class="col-sm-3 text-right control-label col-form-label">Admition Date</label>
                            <div class="col-md-9">
                                <input type="date" name="student_admition_date" class="form-control" id="student_admition_date datepicker-autoclose" placeholder="mm/dd/yyyy">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 text-right">Gender</label>
                            <div class="col-md-9">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="one" value="1" name="gender_name" required="">
                                    <label class="custom-control-label" for="one">Male</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="two" value="2" name="gender_name" required="">
                                    <label class="custom-control-label" for="two">Female</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="three" value="3" name="gender_name" required="">
                                    <label class="custom-control-label" for="three">other</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="blood_name" class="col-sm-3 text-right control-label col-form-label">Blood Group</label>
                            <div class="col-sm-9">
                                <select name="blood_name" id="blood_name" class="select2 form-control custom-select">
                                    <option selected disabled hidden>Select</option>
                                    @foreach($blood as $blood)
                                    <option value="{{$blood->blood_id}}">{{$blood->blood_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_name" class="col-sm-3 text-right control-label col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select name="category_name" id="category_name" class="select2 form-control custom-select">
                                    <option selected disabled hidden>Select</option>
                                    @foreach($categoryName as $categoryName)
                                    <option value="{{$categoryName->category_id}}">{{$categoryName->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="religion_name" class="col-sm-3 text-right control-label col-form-label">Religion</label>
                            <div class="col-md-9">
                                <input id="religion_name" name="religion_name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_phone" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="student_phone" id="student_phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_email" class="col-sm-3 text-right control-label col-form-label">Gmail</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="student_email" name="student_email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_height" class="col-sm-3 text-right control-label col-form-label">Height</label>
                            <div class="col-sm-9">
                                <input type="text" name="student_height" class="form-control" id="student_height">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_weight" class="col-sm-3 text-right control-label col-form-label">Weight</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="student_weight" name="student_weight">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_current_address" class="col-sm-3 text-right control-label col-form-label">Current Address</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="student_current_address" id="student_current_address " rows="5" name="address" placeholder="address"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="student_permanent_address" class="col-sm-3 text-right control-label col-form-label">Permanent Address</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="student_permanent_address" id="student_permanent_address " rows="5" name="address" placeholder="address"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title m-b-0">Guardian Info</h4>
                    <div class="form-group row">
                        <label for="student_guardian_relation" class="col-sm-3 text-right control-label col-form-label">Guardian Relation</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="student_guardian_relation" id="student_guardian_relation">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="student_guardian_name" class="col-sm-3 text-right control-label col-form-label">Guardian Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="student_guardian_name" id="student_guardian_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="student_guardian_phone" class="col-sm-3 text-right control-label col-form-label">Guardian Phone </label>
                        <div class="col-sm-9">
                            <input type="text" name="student_guardian_phone" class="form-control" id="student_guardian_phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="student_guardian_email" class="col-sm-3 text-right control-label col-form-label">Guardian Email </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="student_guardian_email" id="student_guardian_email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="student_guardian_occupation" class="col-sm-3 text-right control-label col-form-label">Guardian Occupation </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="student_guardian_occupation" id="student_guardian_occupation">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="student_guardian_address" class="col-sm-3 text-right control-label col-form-label">Guardian Address </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="student_guardian_address" id="student_guardian_address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="student_guardian_image" class="col-lg-3 control-label text-right">Guardian Image:</label>
                        <div class="col-lg-9">
                            <img style="height: 200px; width: 200px; border-radius: 100px;" name="student_guardian_image" id='previmage' src="{{asset('Backend_assets/profile.jpg')}}" alt="image" class='img-responsive'>
                            <br><br>
                            <input type='file' id="student_guardian_image" name="student_guardian_image" onchange="readURL1(this);" />
                            <span class="text-danger" id="image"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="student_guardian_idcard" class="col-sm-3 text-right control-label col-form-label">Id Card or Birth Certificate</label>
                        <div class="col-lg-9">
                            <br>
                            <input type='file' id="student_guardian_idcard" name="student_guardian_idcard" onchange="readURL(this);" />
                            <span class="text-danger" id="image"></span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title m-b-0">Student File Info</h4>
                    <div class="form-group row">
                        <label for="student_image" class="col-lg-3 control-label text-right">Student Image:</label>
                        <div class="col-lg-9">
                            <img style="height: 200px; width: 200px; border-radius: 100px;" name="image" id='previmage2' src="{{asset('Backend_assets/profile.jpg')}}" alt="image" class='img-responsive'>
                            <br><br>
                            <input type='file' id="student_image" name="student_image" onchange="readURL2(this);" />
                            <span class="text-danger" id="image"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="student_birth_certificate" class="col-sm-3 text-right control-label col-form-label">Birth Certificate</label>
                        <div class="col-lg-9">

                            <br>
                            <input type='file' id="student_birth_certificate" name="student_birth_certificate" onchange="readURL(this);" />
                            <span class="text-danger" id="image"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="student_marksheet" class="col-sm-3 text-right control-label col-form-label">Marksheet</label>
                        <div class="col-lg-9">
                            <br>
                            <input type='file' id="student_marksheet" name="student_marksheet" onchange="readURL(this);" />
                            <span class="text-danger" id="image"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="student_testimonial" class="col-sm-3 text-right control-label col-form-label">Testimonial</label>
                        <div class="col-lg-9">
                            <br>
                            <input type='file' id="student_testimonial" name="student_testimonial" onchange="readURL(this);" />
                            <span class="text-danger" id="image"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="student_registration_card" class="col-sm-3 text-right control-label col-form-label">Registration Card</label>
                        <div class="col-lg-9">
                            <br>
                            <input type='file' id="student_registration_card" name="student_registration_card" onchange="readURL(this);" />
                            <span class="text-danger" id="image"></span>
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
<script type="text/javascript">

    $("#email").click(function() {
        $("#email").prop("readonly", true);
    });

    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#previmage')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#previmage2')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
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
                        <option class="sectionOpt"  value="${value.section_id}" >${value.section_name}</option>
                        `);
                })
            },

        })
    }
</script>
<script src="{{asset('Backend_assets/js/student.js')}}"></script>
@endsection