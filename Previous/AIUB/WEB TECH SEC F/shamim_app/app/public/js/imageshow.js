function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#objimage')
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

            reader.onload = function (e) {
                $('#objimage2')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    };;