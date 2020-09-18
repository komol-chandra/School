$(document).ready(function(){
$(document).on("submit", "#class_form", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            url: "/admin/class/store",
            data: data,
            type: "post",
            dataType: "json",
            success: function (response) {
                datalist();
                toastr.success("data added successfully", "Success!");
                $("#close").click();
                $("#class_form").trigger("reset");
            },
            error: function (error) {
                console.log(error);
            }
        })
    });
});