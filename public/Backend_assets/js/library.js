$(document).ready(function() {
    $(document).on("submit", "#library_save", function(e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        console.log(data);

        $.ajax({
            url: "/admin/library/",
            data: data,
            type: "POST",
            dataType: "json",
            success: function(response) {
                console.log(response);
                toastr.success("Book added successfully", "Success!");
                $("#addModal").modal("hide");
                loaddata();
                $("#library_save").trigger("reset");
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $("#data_lists").on("click", ".edit", function() {
        var data = $(this).attr("data");

        $.ajax({
            url: "/admin/library" + "/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function(response) {
                $("#edit_book_name").val(response.book_name);
                $("#edit_author_name").val(response.book_name);
                $("#edit_copy_number").val(response.copy_number);
                $("#edit_library_id").val(response.library_id);
            }
        });
    });

    $(document).on("submit", "#library_update", function(e) {
        e.preventDefault();
        var id = $("#edit_library_id").val();
        let data = $(this).serializeArray();
        $.ajax({
            url: "/admin/library/" + id,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function(response) {
                console.log(response);
                toastr.success("Book Updated successfully", "Success!");
                $("#edit_library").modal("hide");
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
                    url: `/admin/library/${data}`,
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
function loaddata(pagelink = "/admin/library/create") {
    var search = $(".search").val();

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
