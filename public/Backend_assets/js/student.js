$(document).ready(function() {
    $(this).on("click", "#status", function() {
        let data = $(this).attr("data");
        $.ajax({
            url: `/admin/student/${data}`,
            type: "get",
            dataType: "json",
            success: function(response) {
                datalist();
                if (response.status === 0) {
                    toastr.success("Status Inactive", "Success!");
                } else {
                    toastr.success("Status Active", "Success!");
                }
            }
        });
    });
    $(this).on("click", ".delete", function() {
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
                    url: `/admin/student/${data}`,
                    data: { _token: csrf },
                    type: "delete",
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
    // $("#data_lists").on("click", ".page-link", function(e) {
    //     e.preventDefault();
    //     let page_link = $(this).attr("href");
    //     datalist(page_link);
    // });
});


function datalist() {
    let filterClass = $("#filterClass").val();
    let filterSection = $("#filterSection").val();

    page_link = `/admin/studentList?filterClass=${
        filterClass ? filterClass : ""
    }&filterSection=${filterSection ? filterSection : ""}`;

    $.ajax({
        url: page_link,
        type: "get",
        datatype: "html",
        success: function(response) {
            $("#data_lists").html(response);
        }
    });
}
