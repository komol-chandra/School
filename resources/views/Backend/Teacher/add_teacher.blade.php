@extends('Backend.layouts.app')  
@section('title', ' Teacher')
@section('head', 'Teacher')
@section('content')
<form action="{{route('teacher.store')}}" id="teacher_form"  method="post" enctype="multipart/form-data">@csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="form-horizontal">
                    <div class="card-body">
                        <h4 class="card-title">Personal Info</h4>
                        <div class="form-group row">
                            <label for="teacher_name" class="col-sm-3 text-right control-label col-form-label">Name<span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" value="{{old('teacher_name') ? old('teacher_name') : ''}}" name="teacher_name" class="form-control" id="teacher_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="teacher_email" class="col-sm-3 text-right control-label col-form-label">Email<span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                                <input type="email" value="{{old('teacher_email') ? old('teacher_email') : ''}}" name="teacher_email" class="form-control" id="teacher_email">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="teacher_password" class="col-sm-3 text-right control-label col-form-label">Password<span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                                <input type="password" value="{{old('teacher_password') ? old('teacher_password') : ''}}" name="teacher_password" class="form-control" id="teacher_password" placeholder="Password Here">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="teacher_designation_name" class="col-sm-3 text-right control-label col-form-label">Designation</label>
                            <div class="col-sm-9">
                                <select value="{{old('teacher_designation_name') ? old('teacher_designation_name') : ''}}" name="teacher_designation_name" id="teacher_designation_name" class="select2 form-control custom-select">
                                    <option selected disabled hidden>Select</option>
                                    @foreach($designation as $designation)
                                    <option value="{{$designation->teacher_designation_id}}">{{$designation->teacher_designation_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="department_name" class="col-sm-3 text-right control-label col-form-label">Department</label>
                            <div class="col-sm-9">
                                <select value="{{old('department_name') ? old('department_name') : ''}}" name="department_name" id="department_name" class="select2 form-control custom-select">
                                    <option selected disabled hidden>Select</option>
                                    @foreach($department as $department)
                                    <option value="{{$department->department_id}}">{{$department->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="teacher_phone" class="col-sm-3 text-right control-label col-form-label">Phone Number<span style="color:red;">*</span></label>
                            <div class="col-sm-9">
                                <input value="{{old('teacher_phone') ? old('teacher_phone') : ''}}" type="text" name="teacher_phone" class="form-control" id="teacher_phone" placeholder="Phone Number Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender_name" class="col-sm-3 text-right control-label col-form-label">Gender</label>
                            <div class="col-sm-9">
                                <select value="{{old('gender_name') ? old('gender_name') : ''}}" name="gender_name" id="gender_name" class="select2 form-control custom-select">
                                    <option selected disabled hidden>Select</option>
                                    @foreach($gender as $gender)
                                    <option value="{{$gender->gender_id}}">{{$gender->gender_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="blood_name" class="col-sm-3 text-right control-label col-form-label">Blood Group</label>
                            <div class="col-sm-9">
                                <select value="{{old('blood_name') ? old('blood_name') : ''}}" name="blood_name" id="blood_name" class="select2 form-control custom-select">
                                    <option selected disabled hidden>Select</option>
                                    @foreach($blood as $blood)
                                    <option value="{{$blood->blood_id}}">{{$blood->blood_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="teacher_facebook" class="col-sm-3 text-right control-label col-form-label">Facebook Profile Link</label>
                            <div class="col-sm-9">
                                <input value="{{old('teacher_facebook') ? old('teacher_facebook') : ''}}" type="text" name="teacher_facebook" class="form-control" id="teacher_facebook" placeholder="Facebook Profile Link Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="teacher_twitter" class="col-sm-3 text-right control-label col-form-label">Twitter Profile Link</label>
                            <div class="col-sm-9">
                                <input value="{{old('teacher_twitter') ? old('teacher_twitter') : ''}}" type="text" name="teacher_twitter" class="form-control" id="teacher_twitter" placeholder="Twitter Profile Link Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="teacher_linkedin" class="col-sm-3 text-right control-label col-form-label">Linkedin Profile Link</label>
                            <div class="col-sm-9">
                                <input value="{{old('teacher_linkedin') ? old('teacher_linkedin') : ''}}" type="text" name="teacher_linkedin" class="form-control" id="teacher_linkedin" placeholder="Twitter Profile Link Here">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="teacher_address" class="col-sm-3 text-right control-label col-form-label">Address</label>
                            <div class="col-md-9">
                                <textarea value="{{old('teacher_address') ? old('teacher_address') : ''}}" class="form-control" name="teacher_address" id="teacher_address " rows="5"  placeholder="address"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="teacher_about" class="col-sm-3 text-right control-label col-form-label">Bio</label>
                            <div class="col-md-9">
                                <textarea value="{{old('teacher_about') ? old('teacher_about') : ''}}" class="form-control" name="teacher_about" id="teacher_about " rows="5"  placeholder="About yourself"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="teacher_image" class="col-lg-3 control-label text-right"> Image:</label>
                        <div class="col-lg-9">
                            <img style="height: 200px; width: 200px; border-radius: 100px;" name="teacher_image" id='previmage' src="{{asset('Backend_assets/profile.jpg')}}" alt="image" class='img-responsive'>
                            <br><br>
                            <input type='file' id="teacher_image" name="teacher_image" onchange="readURL(this);" />
                            <span class="text-danger" id="image"></span>
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
<script src="{{asset('Backend_assets/js/teacher.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\TeacherRequest', '#teacher_form'); !!}
@endsection