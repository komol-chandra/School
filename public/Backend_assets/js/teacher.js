$(document).ready(function(){
	$(this).on("click","#status",function(){
		let data = $(this).attr("data");
		$.ajax({
			url:`/admin/teacher/show/${data}`,
			type:`get`,
			dataType:`json`,
			success:function(response){
				if(response.status === 0){
                    toastr.success("Status Inactive","Success!");
                }else{
                    toastr.success("Status Active","Success!");
                }
			}
		})
	});
	$(this).on("click","#delete",function(){
		let data = $(this).attr("data");
		let csrf = $(this).attr("data-csrf");
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
				url:`/admin/teacher/${data}`,
				data:{"_token":csrf},
				type:`delete`,
				dataType:`json`,
				success:function(response){
					console.log(response);
					swal("Data Deleted Successfully!");
				}
			})
            } else {
                swal("Your imaginary Data is safe!");
            }
        });
	});
});