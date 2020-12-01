$(document).ready(function() {
    var max_field = 7;
    var wrapper = $(".input_field");
    var add_field = $(".add_field");
    var i = 1;
  
    $(add_field).click(function(e) {
    e.preventDefault();
    if(i < max_field) {
      i++;
      $("#row_no").val(i);
      $(wrapper).append("<div class='row mb-3'>\
          <div class='col-lg-1'>\
              <label for='day_name'>Day<span style='color:red;'>*</span></label>\
              <select name='day_name[]' class='select2 form-control custom-select' id='day_name'>\
                  <option disabled selected hidden>Select</option>\
                  @foreach($days as $day)\
                  <option value='{{$day->day_id}}'>{{$day->day_name}}</option>\
                  @endforeach\
              </select>\
          </div>\
          <div class='col-lg-1'>\
              <label for='period_name'>Period<span style='color:red;'>*</span></label>\
              <select name='period_name[]' class='select2 form-control custom-select' id='period_name'>\
                  <option disabled selected hidden>Select</option>\
                  @foreach($periods as $period)\
                  <option value='{{$period->period_id}}'>{{$period->period_name}}</option>\
                  @endforeach\
              </select>\
          </div>\
          <div class='col-lg-2'>\
              <label for='teacher_name'>Teacher<span style='color:red;''>*</span></label>\
              <select name='teacher_name[]' class='select2 form-control custom-select' id='teacher_name'>\
                  <option disabled selected hidden>Select</option>\
                  @foreach($teachers as $teacher)\
                  <option value='{{$teacher->teacher_id}}'>{{$teacher->teacher_name}}</option>\
                  @endforeach\
              </select>\
          </div>\
          <div class='col-lg-1'>\
              <label for='subject_name'>Subject<span style='color:red;'>*</span></label>\
              <select name='subject_name[]' class='select2 form-control custom-select' id='subject_name' >\
                  <option disabled selected hidden>Select</option>\
                  @foreach($subjects as $subject)\
                  <option value='{{$subject->subject_id}}'>{{$subject->subject_name}}</option>\
                  @endforeach\
              </select>\
          </div>\
          <div class='col-lg-1'>\
              <label for='classroom_name'>Classroom<span style='color:red;''>*</span></label>\
              <select name='classroom_name[]' class='select2 form-control custom-select' id='classroom_name'>\
                  <option disabled selected hidden>Select</option>\
                  @foreach($classRooms as $classRoom)\
                  <option value='{{$classRoom->classroom_id}}'>{{$classRoom->classroom_name}}</option>\
                  @endforeach\
              </select>\
          </div>\
          <div class='col-lg-2'>\
              <label for='sarting_hour'>Sarting time<span style='color:red;'>*</span></label>\
              <input type='time' name='sarting_hour[]' class='form-control' id='sarting_hour'>\
          </div>\
          <div class='col-lg-2'>\
              <label for='ending_hour'>Ending time<span style='color:red;''>*</span></label>\
              <input type='time' name='ending_hour[]' class='form-control' id='ending_hour'>\
              </select>\
          </div>\
          <div class='col-lg-1'>\
              <label for='duration' >Duration<span style='color:red;''>*</span></label>\
              <input type='text' name='duration[]' class='form-control' id='duration'>\
          </div>\
          <button class='btn btn-danger btn-sm remove_field' type='button' style='margin-left: 8px;'><i class='fa fa-trash'></i></button>\
      </div><br>\
      ");
    }
  });
  $(wrapper).on("click", ".remove_field", function(e) {
    e.preventDefault();
    $(this).closest('div').remove(); i--;
  });
  });
  
  function getSection(){
    let data = $('#class_name').val();
    $.ajax({
        url:`/admin/routine/sectionData/${data}`,
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