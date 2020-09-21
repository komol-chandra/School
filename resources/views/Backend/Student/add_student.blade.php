@extends('Backend.layouts.app')  
@section('title', ' Student')
@section('head', 'Student')
@section('content')
<form action="">   
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="form-horizontal">
                <div class="card-body">
                    <h4 class="card-title">Personal Info</h4>
                    <div class="form-group row">
                        <label for="admision_number" class="col-sm-3 text-right control-label col-form-label"> Admission Number <span style="color:red;" >*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="student_admision_number" class="form-control" id="admision_number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="roll_number" class="col-sm-3 text-right control-label col-form-label">Roll Number <span style="color:red;" >*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="student_roll_number" class="form-control" id="roll_number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Class <span style="color:red;" >*</span></label>
                        <div class="col-md-9">
                            <select name="class_name" class="select2 form-control custom-select" >
                                <option>Select</option>
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Section <span style="color:red;" >*</span></label>
                        <div class="col-md-9">
                            <select name="section_name" class="select2 form-control custom-select" >
                                <option>Select</option>
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"> Name <span style="color:red;" >*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="student_name" class="form-control" id="fname" placeholder="First Name Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Mother's Name <span style="color:red;" >*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="student_name" class="form-control" id="fname" placeholder="First Name Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Father's Name <span style="color:red;" >*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="student_name" class="form-control" id="fname" placeholder="First Name Here">
                        </div>
                    </div>
                    <div class="form-group row ">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Birthday Date<span style="color:red;" >*</span></label>
                        <div class="col-md-9">
                        <input name="student_birthday" type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy">
                        </div>
                    </div>
                    <div class="form-group row ">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Admition Date</label>
                        <div class="col-md-9">
                        <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 text-right">Gender<span style="color:red;" >*</span></label>
                        <div class="col-md-9">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="one" name="radio-stacked" required="">
                                <label class="custom-control-label" for="one">Male</label>
                            </div>
                                <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="two" name="radio-stacked" required="">
                                <label class="custom-control-label" for="two">Female</label>
                            </div>
                                <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="three" name="radio-stacked" required="">
                                <label class="custom-control-label" for="three">Other</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Blood Group</label>
                        <div class="col-md-9">
                            <select class="select2 form-control custom-select" >
                                <option>Select</option>
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Category</label>
                        <div class="col-md-9">
                            <select class="select2 form-control custom-select" >
                                <option>Select</option>
                                    <option value="AK">General</option>
                                    <option value="HI">Spectioal</option>
                                    <option value="HI">Management</option>
                                    <option value="HI">Physically Callenged</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row ">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Religion</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email1" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Gmail</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email1" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Height</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email1" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Weight</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email1" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Address</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="example-textarea" rows="5" name="address" placeholder="address"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Image:</label>
                        <div class="col-lg-9">
                            <img style="height: 200px; width: 200px; border-radius: 100px;" name="image" id='previmage' src="{{asset('backend_assets/old.jpg')}}  alt="image" class='img-responsive'>
                            <br><br>
                            <input type='file' id="image" name="image" onchange="readURL(this);" />
                            <span class="text-danger" id="image"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">Guardian Info</h5>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Guardian Relation</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email1" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Guardian Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email1" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Guardian Phone </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email1" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Guardian Email </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email1" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Guardian Occupation </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email1" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Guardian Address </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email1" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label text-right">Guardian Image:</label>
                    <div class="col-lg-9">
                        <img style="height: 200px; width: 200px; border-radius: 100px;" name="image" id='previmage'  alt="image" class='img-responsive'>
                        <br><br>
                        <input type='file' id="image" name="image" onchange="readURL(this);" />
                        <span class="text-danger" id="image"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">Student File Info</h5>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Student Image</label>
                    <div class="col-lg-9">
                        <img style="height: 200px; width: 200px; border-radius: 100px;" name="image" id='previmage'  alt="image" class='img-responsive'>
                        <br><br>
                        <input type='file' id="image" name="image" onchange="readURL(this);" />
                        <span class="text-danger" id="image"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Birth Certificate</label>
                    <div class="col-lg-9">
                        <img style="height: 200px; width: 200px; border-radius: 100px;" name="image" id='previmage'  alt="image" class='img-responsive'>
                        <br><br>
                        <input type='file' id="image" name="image" onchange="readURL(this);" />
                        <span class="text-danger" id="image"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Education Certificate 1</label>
                    <div class="col-lg-9">
                        <img style="height: 200px; width: 200px; border-radius: 100px;" name="image" id='previmage'  alt="image" class='img-responsive'>
                        <br><br>
                        <input type='file' id="image" name="image" onchange="readURL(this);" />
                        <span class="text-danger" id="image"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Education Certificate 2</label>
                    <div class="col-lg-9">
                        <img style="height: 200px; width: 200px; border-radius: 100px;" name="image" id='previmage'  alt="image" class='img-responsive'>
                        <br><br>
                        <input type='file' id="image" name="image" onchange="readURL(this);" />
                        <span class="text-danger" id="image"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Education Certificate 3</label>
                    <div class="col-lg-9">
                        <img style="height: 200px; width: 200px; border-radius: 100px;" name="image" id='previmage'  alt="image" class='img-responsive'>
                        <br><br>
                        <input type='file' id="image" name="image" onchange="readURL(this);" />
                        <span class="text-danger" id="image"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="border-top">
    <div class="card-body">
        <button type="button" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>
@endsection
@section('script')
    <script type="text/javascript">
        $("#email").click(function() {
        $("#email").prop("readonly", true);
        });
        function readURL(input) {
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
    </script>
@endsection