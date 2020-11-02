    $("#email").click(function() {
        $("#email").prop("readonly", true);
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#studentImage')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#guardianImage')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#guardianIdcard')
                    .attr('src', e.target.result)
                    .width(450)
                    .height(350);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#studentRegistration')
                    .attr('src', e.target.result)
                    .width(450)
                    .height(350);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#studentBirth')
                    .attr('src', e.target.result)
                    .width(450)
                    .height(350);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#studentMarksheet')
                    .attr('src', e.target.result)
                    .width(450)
                    .height(350);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL6(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#studentTestimonial')
                    .attr('src', e.target.result)
                    .width(450)
                    .height(350);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }