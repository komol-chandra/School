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
    getSection();
});
function getSection() {
    let data = $("#filter_class").val();
    console.log(data);
    $.ajax({
        url: `/admin/student/sectionData/${data}`,
        type: `get`,
        dataType: `json`,
        success: function(response) {
            $(".sectionOpt").remove();
            response.forEach(function(value, index) {
                $("#section_name").append(`
                    <option class="sectionOpt"  value="${value.section_id}" >${value.section_name}</option>
                    `);
            });
        }
    });
}

function loaddata() {
    let className = $("#filter_class").val();
    let sectionName = $("#section_name").val();

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
