function readURL(input) {

    if (input.files && input.files[0]) {
        console.log(input.id);
        var reader = new FileReader();

        reader.onload = function(e) {
            // $('.image-upload-wrap').hide();
            // $('.file-upload-image').attr('src', e.target.result);
            // $('.file-upload-content').show();
            // $('.image-title').html(input.files[0].name);
            $(`#wrap-${input.id}`).hide();
            $(`#upload-${input.id}`).attr('src', e.target.result);
            $(`#file-upload-${input.id}`).show();

        };

        reader.readAsDataURL(input.files[0]);
    }
}


$(".image-title-wrap").click(function() {
    $(this).parent().prev().children("input").replaceWith($(this).parent().prev().children("input").clone());
    $(this).parent().hide();
    $(this).parent().prev().show();
});

$('.image-upload-wrap').bind('dragover', function() {
    $('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap').bind('dragleave', function() {
    $('.image-upload-wrap').removeClass('image-dropping');
});