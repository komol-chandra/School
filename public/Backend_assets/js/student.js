$(document).ready(function(){
    // $(this).on("change","#class_name",function(){
    //     var data = $(this).val();
    //     $.ajax({
    //         url:`/admin/school/className/${data}`,
    //         type:"get",
    //         dataType:"json",
    //         success:function(response){
    //             console.log(response);
    //             var b = $();
    //             $.each(response.data, function (i, item) {
    //                 b = b.add("<option value=" + item.section_id + ">" + item.section_name + "</option>")
    //             });
    //             console.log("#section_name");
    //             $("#section_name").html(b);
    //         }
    //     })
    // });

    $(this).on("click","#status",function(){
        var data = $(this).attr("data");
        $.ajax({
            url:`/admin/student/show/${data}`,
            type:"get",
            dataType:"json",
            success:function(response){
                if(response.status === 0){
                    toastr.success("Status Inactive","Success!");
                }else{
                    toastr.success("Status Active","Success!");
                }
            }
        })
    });
    $(this).on("click",".delete",function(){
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
                    url:`/admin/student/${data}`,
                    data:{"_token":csrf},
                    type:"delete",
                    dataType:"json",
                    success:function(response){
                        toastr.success("Data deleted successfully", "Success!");
                    }
                })
            } else {
                swal("Your imaginary Data is safe!");
            }
        });
    });
})