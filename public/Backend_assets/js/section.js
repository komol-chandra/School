$(document).ready(function(){ 
datalist(); 
	$(this).on("submit","#section_form",function(e){
		e.preventDefault();
		var data = $(this).serializeArray();
		$.ajax({
			url:`/admin/section/store`,
			data:data,
			type:"post",
			dataType:"json",
			success:function(response){
				console.log(response);
				datalist();
                toastr.success(" data added successfully", "Success!");
				$("#close").click();
                $("#section_form").trigger("reset");
			},
			error:function(error){
				console.log(error);
			}
		})

	});
	$(this).on("click","#status",function(){
		var data = $(this).attr("data");

		$.ajax({
            url: `/admin/section/show/${data}`,
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
                    url:`/admin/section/${data}`,
                    data:{"_token":csrf},
                    type:"delete",
                    dataType:"json",
                    success:function(response){
                    	datalist();
                    }
                })
            } else {
                swal("Your imaginary Data is safe!");
            }
        });
	});
	$("#data_lists").on("click", ".page-link", function(e) {
        e.preventDefault();
        var page_link = $(this).attr('href');
        datalist(page_link);
    });

    $(document).on("keyup", ".search", function () {
        datalist();
    });

function datalist(page_link=`/admin/section/create`){
	$.ajax({
		url:page_link,
		type:"get",
		dataType:"html",
		success:function(response){
			$("#data_lists").html(response);
		}
	})
}
});