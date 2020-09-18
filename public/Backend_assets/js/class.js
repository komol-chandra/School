$(document).ready(function(){ 
    datalist(); 
    $(document).on("submit", "#class_form", function (e) {
        e.preventDefault();
        var data = $(this).serializeArray();
        console.log(data);
        $.ajax({
            data:data,
            url:"/admin/class/store",
            type:"post",
            dataType:"json",
            success:function (response){
                datalist();
                toastr.success("Data added successfully", "Success!");
                $("#close").click();
                $("#class_form").trigger("reset");
            },
            error:function (error){
                console.log(error);
            }
        })
    });
    $(document).on("click", ".delete", function () {
        var data = $(this).attr("data");
        var csrf = $(this).attr("data-csrf");
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: `/admin/class/${data}`,
                    type: "delete",
                    data:{"_token": csrf},
                    dataType: "json",
                    success: function (response) {
                        datalist();
                        toastr.success("Data deleted successfully", "Success!");
                    }
                })
            } else {
                swal("Your imaginary Data is safe!");
            }
        });
    });

    $(document).on("click", "#status", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: `/admin/class/show/${data}`,
            type: "get",
            dataType: "json",
            success: function (response) {
                datalist();
                if (response.status === 0) {
                    toastr.success("status inactive", "Success!");
                } else {
                    toastr.success("status active", "Success!");
                }
            }
        })
    });

    $(document).on("click", ".edit", function () {
        var data = $(this).attr("data");

        $.ajax({
            url: `/admin/class/${data}/edit`,
            type: "get",
            dataType: "json",
            success: function (response) {
                $("#e_class_name").val(response.class_name);
                $("#class_id").val(response.class_id);

            }
        })
    });

    $(document).on("submit","#update_class_form",function(e){
        e.preventDefault();
        var id = $(this).attr("#class_id");
        var data = $(this).serializeArray();
        $.ajax({
            url: `/admin/class/update`,
            data: data,
            type: "post",
            dataType: "json",
            success: function (response) {
                datalist();
                toastr.success("Data updated successfully", "Success!");
                $("#close2").click();
                $("#update_class_form").trigger("reset");
            },
            error: function (error) {
                console.log(error);
            }
        })
    });

    $("#data_lists").on("click", ".page-link", function(e) {
        e.preventDefault();
        var page_link = $(this).attr('href');
        datalist(page_link);
    });

    $(document).on("keyup", ".search", function () {
        datalist();
    });

    function datalist(page_link="/admin/class/create") {
        var search = $(".search").val();

        $.ajax({
            url: page_link,
            data:{search : search},
            type: "get",
            datatype: "html",
            success: function (response) {
                $("#data_lists").html(response);
            }
        })
    }

})