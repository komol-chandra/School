$(document).ready(function(){
    datalist();
    $(document).on("submit", "#staff_form", function (e) {
        e.preventDefault();
        let data = $('#staff_form').get(0);
        $.ajax({
            url:"/admin/staff",
            type:'post',
            data: new FormData(data),
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            success:function(data){
              if (data.status==201){
              datalist();
              toastr.success(data.message, "Success!");
              $("#close").click();
              $("#staff_form").trigger("reset");
              }
            },
            error:function(errors){
              console.log(errors);
            }
        });
      });
      $(document).on("click",".edit",function ()
      {
        let id=$(this).attr("data");
        $.ajax({
            url:`/admin/staff/${id}/edit`,
            type:'get',
            dataType:'json',
            success:function(data)
            {
                $("#edit_staff_name").val(data.staff_name);
                $("#edit_gender_name").val(data.gender_name);
                $("#edit_staff_phone").val(data.staff_phone);
                $("#edit_staff_facebook").val(data.staff_facebook);
                $("#edit_staff_twitter").val(data.staff_twitter);
                $("#edit_staff_linkedin").val(data.staff_linkedin);
                $("#edit_staff_address").val(data.staff_address);
                $("#edit_staff_about").val(data.staff_about);
                $("#edit_staff_facebook").val(data.staff_facebook);
                $("#edit_staff_facebook").val(data.staff_facebook);
                $("#editStaffImage").attr('src', data.staff_image ? `/Backend_assets/Files/Staff/${data.staff_image}` : '/Backend_assets/profile.jpg');
              
            }
          });
      });

    $(document).on("click", "#status", function() {
        let data = $(this).attr("data");
        $.ajax({
            url: `/admin/staff/${data}`,
            type: "get",
            dataType: "json",
            success: function(response) {
                datalist();
                if (response.status === 0) {
                    toastr.success("status inactive", "Success!");
                } else {
                    toastr.success("status active", "Success!");
                }
            }
        });
    });
    $(document).on("click", ".delete", function() {
        let data = $(this).attr("data");
        let csrf = $(this).attr("data-csrf");
        swal({
            title: "Are you sure?",
            text:
                "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                $.ajax({
                    url: `/admin/staff/${data}`,
                    type: "delete",
                    data: { _token: csrf },
                    dataType: "json",
                    success: function(response) {
                        datalist();
                        toastr.success("Data deleted successfully", "Success!");
                    }
                });
            } else {
                swal("Your imaginary Data is safe!");
            }
        });
    });
});
    function datalist(page_link = "/admin/staff/create") {
        var search = $(".search").val();
    
        $.ajax({
            url: page_link,
            data: { search: search },
            type: "get",
            datatype: "html",
            success: function(response) {
                $("#data_lists").html(response);
            }
        });
    }

    $("#email").click(function() {
        $("#email").prop("readonly", true);
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#staffImage')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#email").click(function() {
        $("#email").prop("readonly", true);
    });
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#editStaffImage')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }