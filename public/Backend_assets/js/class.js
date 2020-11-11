$(document).ready(function() {
    datalist();
    $(document).on("submit", "#class_form", function(e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            data: data,
            url: "/admin/class/",
            type: "post",
            dataType: "json",
            success: function(response) {
                datalist();
                toastr.success("Data added successfully", "Success!");
                $("#close").click();
                $("#class_form").trigger("reset");
            }, 
            error: function(error) {
                console.log(error);
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
                    url: `/admin/class/${data}`,
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

    $(document).on("click", "#status", function() {
        let data = $(this).attr("data");

        $.ajax({
            url: `/admin/class/${data}`,
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

    $(document).on("click", ".edit", function() {
        let data = $(this).attr("data");

        $.ajax({
            url: `/admin/class/${data}/edit`,
            type: "get",
            dataType: "json",
            success: function(response) {
                $("#edit_class_name").val(response.class_name);
                $("#edit_class_id").val(response.class_id);
            }
        });
    });

    $(document).on("submit", "#class_update", function(e) {
        e.preventDefault();
        let id = $("#edit_class_id").val();
        let data = $(this).serializeArray();
        $.each(data, function(i, message) {
            $("#" + message.name + "_edit").html((message = ""));
        });
        $.ajax({
            url: `/admin/class/${id}`,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function(response) {
                datalist();
                toastr.success("Class Updated successfully", "Success!");
                $("#edit_class").modal("hide");
            },
            error: function(error) {
                $.each(error.responseJSON.errors, function(i, message) {
                    $("#" + i + "_edit").html(message[0]);
                });
            }
        });
    });

    $("#data_lists").on("click", ".page-link", function(e) {
        e.preventDefault();
        let page_link = $(this).attr("href");
        datalist(page_link);
    });

    $(document).on("keyup", ".search", function() {
        datalist();
    });

    function datalist(page_link = "/admin/class/create") {
        let search = $(".search").val();

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
});
