$(document).ready(function() {
    $(document).on("submit", "#session_save", function(e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            url: "/admin/session/",
            data: data,
            type: "POST",
            dataType: "json",
            success: function(response) {
                toastr.success("Session added successfully", "Success!");
                $("#addModal").modal("hide");
                loaddata();
                $("#session_save").trigger("reset");
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $("#data_lists").on("click", ".edit", function() {
        var data = $(this).attr("data");

        $.ajax({
            url: "/admin/session" + "/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function(response) {
                $("#edit_session_name").val(response.session_name);
                $("#edit_session_id").val(response.session_id);
            }
        });
    });

    $("#data_lists").on("click", "#session_status", function() {
        var data = $(this).attr("data");
        console.log(data);
        $.ajax({
            url: "/admin/session/" + data,
            type: "get",
            dataType: "json",
            success: function(response) {
                loaddata();
                if (response.session_status == 0) {
                    toastr.success(
                        "Session Status Change into Inactive",
                        "Success!"
                    );
                } else {
                    toastr.success(
                        "Session Status Change into Active",
                        "Success!"
                    );
                }
            }
        });
    });

    $(document).on("submit", "#session_update", function(e) {
        e.preventDefault();
        var id = $("#edit_session_id").val();
        let data = $(this).serializeArray();
        $.ajax({
            url: "/admin/session/" + id,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function(response) {
                toastr.success("Session Updated successfully", "Success!");
                $("#edit_session").modal("hide");
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
                    url: `/admin/session/${data}`,
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
function loaddata(pagelink = "/admin/session/create") {
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
