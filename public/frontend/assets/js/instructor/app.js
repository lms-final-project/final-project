$(document).ready(function () {
    // Preview Image
    $('#image').on('change', function(e) {
        const file = e.target.files[0];
        const url = URL.createObjectURL(file);
        const img = `<img src="${url} " class="img-fluid uploaded-image" />`;
        $('.preview-img').html( img );
    });


    // Change The Style For The Instructor Dashboard
    if($( document ).width() <= 767){
        $('#dashboard-links').addClass('border-bottom py-2');
    }else {
        $('#dashboard-links').addClass('border-end');
    }

    $(window).resize(function () {
        if($( document ).width() <= 767){
            $('#dashboard-links').addClass('border-bottom py-2');
            $('#dashboard-links').removeClass('border-end');
        }else {
            $('#dashboard-links').addClass('border-end');
            $('#dashboard-links').removeClass('border-bottom py-2');
        }
    });
});
