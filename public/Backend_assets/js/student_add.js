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
                          <div class='col-lg-3 col-md-3 col-sm-3'>\
                              <label for='file_name'>File Name</label>\
                                  <input type='text' class='form-control' id='file_name' name='file_name[]'>\
                          </div>\
                          <div class='col-lg-6 col-md-6 col-sm-6'>\
                              <div class='col-sm-12'>\
                                  <label for='previmage'>File Image</label>\
                              </div>\
                              <div class='col-sm-12'>\
                                      <input type='file' id='fileImg' name='image_file[]' onchange='readURL4(this);' />\
                                      <span class='text-danger' id='fileImg'></span>\
                              </div>\
                          </div>\
                              <button class='btn btn-danger btn-sm remove_field' type='button' style='margin-left: 8px;'><i class='fa fa-trash'></i></button>\
                      </div>\
                      ");
    }
  });
  $(wrapper).on("click", ".remove_field", function(e) {
    e.preventDefault();
    $(this).closest('div').remove(); i--;
  });


  
  });

