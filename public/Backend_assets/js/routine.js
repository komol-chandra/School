$(document).ready(function() {
    $(document).on("submit", "#class_routine_save", function(e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        console.log(data);

        $.ajax({
            url: "/admin/class_routine/",
            data: data,
            type: "POST",
            dataType: "json",
            success: function(response) {
                console.log(response);
                toastr.success("Subject added successfully", "Success!");
                $("#addModal").modal("hide");
                loaddata();
                $("#class_routine_save").trigger("reset");
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $("#data_lists").on("click", ".edit", function() {
        var data = $(this).attr("data");

        $.ajax({
            url: "/admin/class_routine" + "/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function(response) {
                console.log(response);
                $("#edit_class_name").val(response.class_name);
                $("#edit_section_name").val(response.section_name);
                $("#edit_subject_name").val(response.subject_name);
                $("#edit_teacher_name").val(response.teacher_name);
                $("#edit_class_room").val(response.classroom_name);
                $("#edit_day_name").val(response.day_name);
                $("#edit_start_hour").val(response.sh_hour);
                $("#edit_start_minute").val(response.sm_minute);
                $("#edit_end_hour").val(response.en_hour);
                $("#edit_end_minute").val(response.em_minute);
                $("#edit_routine_id").val(response.routine_id);
            }
        });
    });

    $(document).on("submit", "#class_routine_update", function(e) {
        e.preventDefault();
        var id = $("#edit_routine_id").val();
        let data = $(this).serializeArray();
        console.log(data);
        $.ajax({
            url: "/admin/class_routine/" + id,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function(response) {
                console.log(response);
                toastr.success("Subject Updated successfully", "Success!");
                $("#edit_class_routine").modal("hide");
                loaddata();
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $(document).on("click", ".delete", function() {
        var data = $(this).attr("data");
        var csrf = $(this).attr("data-csrf");
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
                    url: `/admin/class_routine/${data}`,
                    type: "delete",
                    data: { _token: csrf },
                    dataType: "json",
                    success: function(response) {
                        loaddata();
                        toastr.success("Data deleted successfully", "Success!");
                    }
                });
            } else {
                swal("Your imaginary Data is safe!");
            }
        });
    });

    loaddata();
});

function loaddata() {
    let className = $("#filter_class").val();
    let sectionName = $("#filter_section").val();

    let page_link = `/admin/class_routine/create?className=${
        className ? className : ""
    }&sectionName=${sectionName ? sectionName : ""}`;

    $.ajax({
        url: page_link,
        type: "get",
        datatype: "html",
        success: function(response) {
            $("#data_lists").html(response);
        }
    });
}
