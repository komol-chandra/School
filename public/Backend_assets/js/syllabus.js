$(document).ready(function() {
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
                    url: `/admin/syllabus/${data}`,
                    data: { _token: csrf },
                    type: `delete`,
                    dataType: `json`,
                    success: function(response) {
                        swal("Data Deleted Successfully!");
                        loaddata();
                    }
                });
            } else {
                swal("Your imaginary Data is safe!");
            }
        });
    });
});
function loaddata() {
    let className = $("#filter_class").val();
    let sectionName = $("#filter_section").val();

    let page_link = `/admin/syllabus/create?className=${
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
