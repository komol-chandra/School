@extends('Backend.layouts.app')
@section('title', ' Staff')
{{-- @section('head', 'Staff') --}}
@section('head_name', 'Staff')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="page-title">
        <i class="mdi mdi-calendar-clock title_icon"></i>Staff List
        <button data-toggle="modal" data-target="#add_modal" class="btn btn-outline-primary btn-rounded alignToTitle" type="button" style="float: right" > <i class="mdi mdi-plus"></i> Add New Staff</button>
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
                        <div id="data_lists"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--Add Modal--}}
<form method="post" enctype="multipart/form-data" id="staff_form">@csrf
    <div id="add_modal" class="modal fixed-left fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-aside" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Staff Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="staff_name" class="col-sm-3 text-right control-label col-form-label">Name<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" value="{{old('staff_name') ? old('staff_name') : ''}}" name="staff_name" class="form-control" id="staff_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staff_email" class="col-sm-3 text-right control-label col-form-label">Email<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="email" value="{{old('staff_email') ? old('staff_email') : ''}}" name="staff_email" class="form-control" id="staff_email">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="staff_password" class="col-sm-3 text-right control-label col-form-label">Password<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" value="{{old('staff_password') ? old('staff_password') : ''}}" name="staff_password" class="form-control" id="staff_password" placeholder="Password Here">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staff_designation_name" class="col-sm-3 text-right control-label col-form-label">Designation<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <select value="{{old('staff_designation_name') ? old('staff_designation_name') : ''}}" name="staff_designation_name" id="staff_designation_name" class="select2 form-control custom-select">
                                <option selected disabled hidden>Select</option>
                                @foreach($designations as $value)
                                <option value="{{$value->staff_designation_id}}">{{$value->staff_designation_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staff_department_name" class="col-sm-3 text-right control-label col-form-label">Department<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <select value="{{old('staff_department_name') ? old('staff_department_name') : ''}}" name="staff_department_name" id="staff_department_name" class="select2 form-control custom-select">
                                <option selected disabled hidden>Select</option>
                                @foreach($departments as $value)
                                <option value="{{$value->staff_department_id}}">{{$value->staff_department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staff_phone" class="col-sm-3 text-right control-label col-form-label">Phone Number<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <input value="{{old('staff_phone') ? old('staff_phone') : ''}}" type="text" name="staff_phone" class="form-control" id="staff_phone" placeholder="Phone Number Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender_name" class="col-sm-3 text-right control-label col-form-label">Gender<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <select value="{{old('gender_name') ? old('gender_name') : ''}}" name="gender_name" id="gender_name" class="select2 form-control custom-select">
                                <option selected disabled hidden>Select</option>
                                @foreach($genders as $gender)
                                <option value="{{$gender->gender_id}}">{{$gender->gender_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="blood_name" class="col-sm-3 text-right control-label col-form-label">Blood Group<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <select value="{{old('blood_name') ? old('blood_name') : ''}}" name="blood_name" id="blood_name" class="select2 form-control custom-select">
                                <option selected disabled hidden>Select</option>
                                @foreach($bloods as $blood)
                                <option value="{{$blood->blood_id}}">{{$blood->blood_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staff_facebook" class="col-sm-3 text-right control-label col-form-label">Facebook Profile Link</label>
                        <div class="col-sm-9">
                            <input value="{{old('staff_facebook') ? old('staff_facebook') : ''}}" type="text" name="staff_facebook" class="form-control" id="staff_facebook" placeholder="Facebook Profile Link Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staff_twitter" class="col-sm-3 text-right control-label col-form-label">Twitter Profile Link</label>
                        <div class="col-sm-9">
                            <input value="{{old('staff_twitter') ? old('staff_twitter') : ''}}" type="text" name="staff_twitter" class="form-control" id="staff_twitter" placeholder="Twitter Profile Link Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staff_linkedin" class="col-sm-3 text-right control-label col-form-label">Linkedin Profile Link</label>
                        <div class="col-sm-9">
                            <input value="{{old('staff_linkedin') ? old('staff_linkedin') : ''}}" type="text" name="staff_linkedin" class="form-control" id="staff_linkedin" placeholder="Linkedin Profile Link Here">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="staff_address" class="col-sm-3 text-right control-label col-form-label">Address</label>
                        <div class="col-sm-9">
                            <textarea value="{{old('staff_address') ? old('staff_address') : ''}}" class="form-control" name="staff_address" id="staff_address " rows="5"  placeholder="address"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staff_about" class="col-sm-3 text-right control-label col-form-label">Bio</label>
                        <div class="col-sm-9">
                            <textarea value="{{old('staff_about') ? old('staff_about') : ''}}" class="form-control" name="staff_about" id="staff_about " rows="5"  placeholder="About yourself"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staff_image" class="col-sm-3 control-label text-right"> Image:</label>
                        <div class="col-sm-9">
                            <img style="height: 200px; width: 200px; border-radius: 100px;" id='staffImage' src="{{asset('Backend_assets/profile.jpg')}}" alt="image" class='img-responsive'>
                            <br><br>
                            <input type='file' id="staff_image" name="image" onchange="readURL(this);" />
                            <span class="text-danger" id="image"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{--Add Modal--}}
{{--Edit Modal--}}
<form enctype="multipart/form-data" id="staff_form_update">
    @csrf
    <div id="edit_modal" class="modal fixed-left fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-aside" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Staff Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="staff_id" id="edit_staff_id">
                    <div class="form-group row">
                        <label for="edit_staff_name" class="col-sm-3 text-right control-label col-form-label">Name<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" value="{{old('staff_name') ? old('staff_name') : ''}}" name="staff_name" class="form-control" id="edit_staff_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_staff_designation_name" class="col-sm-3 text-right control-label col-form-label">Designation<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <select value="{{old('staff_designation_name') ? old('staff_designation_name') : ''}}" name="staff_designation_name" id="edit_staff_designation_name" class="select2 form-control custom-select">
                                <option selected disabled hidden>Select</option>
                                @foreach($designations as $value)
                                <option value="{{$value->staff_designation_id}}"{{$value->staff_designation_name== $value->staff_designation_id ? 'selected' : ''}}>{{$value->staff_designation_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_staff_department_name" class="col-sm-3 text-right control-label col-form-label">Department<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <select value="{{old('staff_department_name') ? old('staff_department_name') : 'selected'}}" name="staff_department_name" id="edit_staff_department_name" class="select2 form-control custom-select">
                                <option selected disabled hidden>Select</option>
                                @foreach($departments as $value)
                                <option value="{{$value->staff_department_id}}">{{$value->staff_department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="edit_staff_phone" class="col-sm-3 text-right control-label col-form-label">Phone Number<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <input value="{{old('staff_phone') ? old('staff_phone') : ''}}" type="text" name="staff_phone" class="form-control" id="edit_staff_phone" placeholder="Phone Number Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_gender_name" class="col-sm-3 text-right control-label col-form-label">Gender<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <select value="{{old('gender_name') ? old('gender_name') : 'selected'}}"  name="gender_name" id="edit_gender_name" class="select2 form-control custom-select">
                                <option selected disabled hidden>Select</option>
                                @foreach($genders as $value)
                                <option value="{{$value->gender_id}}">{{$value->gender_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_blood_name" class="col-sm-3 text-right control-label col-form-label">Blood Group<span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <select value="{{old('blood_name') ? old('blood_name') : ''}}" name="blood_name" id="edit_blood_name" class="select2 form-control custom-select">
                                <option selected disabled hidden>Select</option>
                                @foreach($bloods as $blood)
                                <option value="{{$blood->blood_id}}">{{$blood->blood_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="edit_staff_facebook" class="col-sm-3 text-right control-label col-form-label">Facebook Profile Link</label>
                        <div class="col-sm-9">
                            <input value="{{old('staff_facebook') ? old('staff_facebook') : ''}}" type="text" name="staff_facebook" class="form-control" id="edit_staff_facebook" placeholder="Facebook Profile Link Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_staff_twitter" class="col-sm-3 text-right control-label col-form-label">Twitter Profile Link</label>
                        <div class="col-sm-9">
                            <input value="{{old('staff_twitter') ? old('staff_twitter') : ''}}" type="text" name="staff_twitter" class="form-control" id="edit_staff_twitter" placeholder="Twitter Profile Link Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_staff_linkedin" class="col-sm-3 text-right control-label col-form-label">Linkedin Profile Link</label>
                        <div class="col-sm-9">
                            <input value="{{old('staff_linkedin') ? old('staff_linkedin') : ''}}" type="text" name="staff_linkedin" class="form-control" id="edit_staff_linkedin" placeholder="Linkedin Profile Link Here">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="edit_staff_address" class="col-sm-3 text-right control-label col-form-label">Address</label>
                        <div class="col-sm-9">
                            <textarea value="" class="form-control" name="staff_address" id="edit_staff_address " rows="5"  placeholder="address">{{old('staff_address') ? old('staff_address') : ''}} </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_staff_about" class="col-sm-3 text-right control-label col-form-label">Bio</label>
                        <div class="col-sm-9">
                            <textarea value="{{old('staff_about') ? old('staff_about') : ''}}" class="form-control" name="staff_about" id="edit_staff_about " rows="5"  placeholder="About yourself"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editStaffImage" class="col-sm-3 control-label col-form-label text-right"> Image:</label>
                        <div class="col-sm-9">
                            <img style="height: 200px; width: 200px; border-radius: 100px;" id='editStaffImage' src="" alt="image" class='img-responsive'>
                            <br><br>
                            <input type='file' id="editStaffImage" name="image" onchange="readURL2(this);" />
                            <span class="text-danger" id="image"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close2" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{--Edit Modal--}}
@endsection
@section('js')
<script src="{{asset('Backend_assets/js/staff.js')}}"></script>
@endsection
