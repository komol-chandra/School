$(document).ready(function(){
datalist();
$(document).on("submit", "#event_form", function(e) {
    e.preventDefault();
    let data = $(this).serializeArray();
    console.log(data);
    $.ajax({
        data: data,
        url: "/admin/eventCalender/",
        type: "post",
        dataType: "json",
        success: function(response) {
            datalist();
            toastr.success("Data added successfully", "Success!");
            $("#close").click();
            $("#event_form").trigger("reset");
        }, 
        error: function(error) {
            console.log(error);
        }
    });
});
$(document).on("click", "#status", function() {
    let data = $(this).attr("data");
    $.ajax({
        url: `/admin/eventCalender/${data}`,
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
                url: `/admin/eventCalender/${data}`,
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
function datalist(page_link = "/admin/eventCalender/create") {
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