$(document).ready(function() {
    $(document).on("submit", "#subject_save", function(e) {
        e.preventDefault();
        let data = $(this).serializeArray();

        $.ajax({
            url: "/admin/subject/",
            data: data,
            type: "POST",
            dataType: "json",
            success: function(response) {
                console.log(response);
                toastr.success("Subject added successfully", "Success!");
                $("#addModal").modal("hide");
                $("#subject_save").trigger("reset");
            },
            error: function(error) {
                toastr.warning("Validation Required", "Warning!");
                confirm.log(error);
            }
        });
    });

    $("#data_lists").on("click", ".edit", function() {
        var data = $(this).attr("data");

        $.ajax({
            url: "/admin/subject" + "/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function(response) {
                $("#edit_class_name").val(response.class_name);
                $("#edit_subject_name").val(response.subject_name);
                $("#edit_subject_id").val(response.subject_id);
            }
        });
    });

    $(document).on("submit", "#subject_update", function(e) {
        e.preventDefault();
        var id = $("#edit_subject_id").val();
        console.log(id);
        let data = $(this).serializeArray();
        $.each(data, function(i, message) {
            $("#" + message.name + "_edit").html((message = ""));
        });
        $.ajax({
            url: "/admin/subject/" + id,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function(response) {
                console.log(response);
                toastr.success("Subject Updated successfully", "Success!");
                $("#edit_subject").modal("hide");
                loaddata();
            },
            error: function(error) {
                toastr.warning("Validation Required", "Warning!");
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
                    url: `/admin/subject/${data}`,
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
        let page_link = $(this).attr("href");
        loaddata(page_link);
    });
});

function loaddata() {
    let filterClass = $("#filter_class").val();

    let pageLink = `/admin/subject/create?filterClass=${
        filterClass ? filterClass : ""
    }`;

    $.ajax({
        url: pageLink,
        type: "get",
        datatype: "html",
        success: function(response) {
            $("#data_lists").html(response);
        }
    });
}
