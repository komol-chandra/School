$(document).ready(function() {});
function datalist() {
    let filterClass = $("#filterClass").val();
    let filterSection = $("#filterSection").val();
    page_link = `/admin/routineList?filterClass=${
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
