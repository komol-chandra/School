$(document).ready(function() {
    var max_field = 7;
    var wrapper = $(".input_field_multi");
    var add_field = $(".add_field_multi");
    var i = 1;
  
    $(add_field).click(function(e) {
    e.preventDefault();
    if(i < max_field) {
      i++;
      $("#row_no").val(i);
      $(wrapper).append("<div class='row mb-3'>\
                          <div class='col-lg-2'>\
                              <label for='student_roll_number' >Roll Number<span style='color:red;'>*</span></label>\
                              <input value='{{old('student_roll_number') ? old('student_roll_number') :''}}' type='text' name='student_roll_number' class='form-control' id='student_roll_number'>\
                          </div>\
                          <div class='col-lg-3'>\
                              <label for='student_name'>Student Name<span style='color:red;'>*</span></label>\
                              <input value='{{old('student_name') ? old('student_name') :''}}' type='text' name='student_name' class='form-control' id='student_name' placeholder='Name Here'>\
                          </div>\
                          <div class='col-lg-1'>\
                              <label>Blood</label>\
                              <select name='blood_name' id='blood_name' class='select2 form-control custom-select'>\
                                  <option selected disabled hidden>Select</option>\
                                  @foreach($blood as $value)\
                                      <option value='{{$value->blood_id}}'>{{$value->blood_name}}</option>\
                                      @endforeach\
                              </select>\
                          </div>\
                          <div class='col-lg-1'>\
                              <label for='gender_name'>Gender</label>\
                                  <div class='custom-control custom-radio'>\
                                      <input type='radio' class='custom-control-input' id='one1' value='1' name='gender_name' >\
                                      <label class='custom-control-label' for='one1'>Male</label>\
                                  </div>\
                                  <div class='custom-control custom-radio'>\
                                      <input type='radio' class='custom-control-input' id='two2' value='2' name='gender_name' >\
                                      <label class='custom-control-label' for='two2'>Female</label>\
                                  </div>\
                                  <div class='custom-control custom-radio'>\
                                      <input type='radio' class='custom-control-input' id='three3' value='3' name='gender_name' >\
                                      <label class='custom-control-label' for='three3'>other</label>\
                              </div>\
                          </div>\
                          <div class='col-lg-2'>\
                              <label for='student_email'>Email</label>\
                              <input value='{{old('student_email') ? old('student_email') : ''}}' type='email' class='form-control' id='student_email' name='email'>\
                          </div>\
                          <div class='col-lg-2'>\
                              <label for='password'>Password</label>\
                              <input type='password' class='form-control' id='password' name='password'>\
                          </div>\
                          <div class='col-lg-3'>\
                              <label for='student_guardian_name' > Guardian Name<span style='color:red;'>*</span></label>\
                              <input value='{{old('student_guardian_name') ? old('student_guardian_name') : ''}}' type='text' class='form-control' name='student_guardian_name' id='student_guardian_name'>\
                          </div>\
                          <div class='col-lg-3'>\
                              <label for='student_guardian_email' >Guardian Email<span style='color:red;'>*</span></label>\
                              <input value='{{old('student_guardian_email') ? old('student_guardian_email') : ''}}' type='text' class='form-control' name='guardian_email' id='student_guardian_email'>\
                          </div>\
                          <div class='col-lg-3'>\
                              <label for='student_guardian_pass'>Password<span style='color:red;'>*</span></label>\
                              <input value='' type='password' class='form-control' id='student_guardian_pass' name='guardian_pass'>\
                          </div>\
                          <button class='btn btn-danger btn-sm remove_field_multi' type='button' style='margin-left: 8px;'><i class='fa fa-trash'></i></button>\
                      </div>\
                      ");
    }
  });
  $(wrapper).on("click", ".remove_field_multi", function(e) {
    e.preventDefault();
    $(this).closest('div').remove(); i--;
  });
  });