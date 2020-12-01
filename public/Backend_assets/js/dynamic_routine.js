$(document).ready(function(){
});
function getSection(){
    let data = $('#filterClass').val();
    $.ajax({
        url:`/admin/routine/sectionData/${data}`,
        type:`get`,
        dataType:`json`,
        success:function(response){
            $('.sectionOpt').remove();
            response.forEach(function(value,index){
                console.log(value);
                $('#filterSection').append(`
                    <option class="sectionOpt"  value="${value.section_id}" >${value.section_name}</option>
                    `);
            })
        },
    })
    
}
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
