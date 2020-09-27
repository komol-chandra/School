$(document).ready(function() {
    $(document).on("submit", "#classroom_save", function(e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.each(data, function(i, message) {
            $("#" + message.name + "_error").html((message = ""));
        });
        $.ajax({
            url: "/admin/classroom/",
            data: data,
            type: "POST",
            dataType: "json",
            success: function(response) {
                console.log(response);
                toastr.success("Class Room added successfully", "Success!");
                $("#addModal").modal("hide");
                loaddata();
                $("#classroom_save").trigger("reset");
            },
            error: function(error) {
                $.each(error.responseJSON.errors, function(i, message) {
                    $("#" + i + "_error").html(message[0]);
                });
            }
        });
    });

    $("#data_lists").on("click", ".edit", function() {
        var data = $(this).attr("data");

        $.ajax({
            url: "/admin/classroom" + "/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function(response) {
                $("#edit_classroom_name").val(response.classroom_name);
                $("#edit_classroom_id").val(response.classroom_id);
            }
        });
    });

    $(document).on("submit", "#classroom_update", function(e) {
        e.preventDefault();
        var id = $("#edit_classroom_id").val();
        console.log(id);
        let data = $(this).serializeArray();
        $.each(data, function(i, message) {
            $("#" + message.name + "_edit").html((message = ""));
        });
        $.ajax({
            url: "/admin/classroom/" + id,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function(response) {
                console.log(response);
                toastr.success("Subject Updated successfully", "Success!");
                $("#edit_classroom").modal("hide");
                loaddata();
            },
            error: function(error) {
                $.each(error.responseJSON.errors, function(i, message) {
                    $("#" + i + "_edit").html(message[0]);
                });
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
                    url: `/admin/classroom/${data}`,
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

    $("#data_lists").on("click", ".page-link", function(e) {
        e.preventDefault();
        var page_link = $(this).attr("href");
        loaddata(page_link);
    });

    $(document).on("keyup", ".search", function() {
        loaddata();
    });

    loaddata();
});
function loaddata(pagelink = "/admin/classroom/create") {
    var search = $(".search").val();
    console.log(search);

    $.ajax({
        url: pagelink,
        data: { search: search },
        type: "get",
        dataType: "html",
        success: function(data) {
            $("#data_lists").html(data);
        }
    });
}
