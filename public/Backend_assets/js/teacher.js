$(document).ready(function(){
    datalist();
	$(this).on("click","#status",function(){
		let data = $(this).attr("data");
		$.ajax({
			url:`/admin/teacher/${data}`,
			type:`get`,
			dataType:`json`,
			success:function(response){
                datalist();
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
				type: "delete",
				dataType:`json`,
				success:function(response){
                    datalist();
					console.log(response);
					swal("Data Deleted Successfully!");
				}
			})
            } else {
                swal("Your imaginary Data is safe!");
            }
        })
    });
    
    $("#data_lists").on("click", ".page-link", function(e) {
        e.preventDefault();
        var page_link = $(this).attr("href");
        datalist(page_link);
    });

    $(document).on("keyup", ".search", function() {
        datalist();
    });
    function datalist(page_link = "/admin/teacherList") {
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


});


$("#email").click(function() {
    $("#email").prop("readonly", true);
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#previmage')
                .attr('src', e.target.result)
                .width(200)
                .height(200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#email").click(function() {
    $("#email").prop("readonly", true);
});

function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#previmage1')
                .attr('src', e.target.result)
                .width(200)
                .height(200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}