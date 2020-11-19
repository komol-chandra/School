$(document).ready(function() {
    $(document).on("submit", "#department_save", function(e) {
        e.preventDefault();
        let data = $(this).serializeArray();

        $.ajax({
            url: "/admin/department/",
            data: data,
            type: "POST",
            dataType: "json",
            success: function(response) {
                console.log(response);
                toastr.success("Department added successfully", "Success!");
                $("#addModal").modal("hide");
                loaddata();
                $("#department_save").trigger("reset");
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $("#data_lists").on("click", ".edit", function() {
        var data = $(this).attr("data");

        $.ajax({
            url: "/admin/department" + "/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function(response) {
                $("#edit_department_name").val(response.department_name);
                $("#edit_department_id").val(response.department_id);
            }
        });
    });

    $(document).on("submit", "#department_update", function(e) {
        e.preventDefault();
        var id = $("#edit_department_id").val();
        let data = $(this).serializeArray();
        $.ajax({
            url: "/admin/department/" + id,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function(response) {
                console.log(response);
                toastr.success("Subject Updated successfully", "Success!");
                $("#edit_department").modal("hide");
                loaddata();
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $(document).on("click", ".delete", function() {
        var data = $(this).attr("data");
        console.log(data);
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
                    url: `/admin/department/${data}`,
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
function loaddata(pagelink = "/admin/department/create") {
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
