$(document).ready(function() {
    // Wyświetl wybrany obraz przed wysłaniem formularza
    $('#image-upload').on('change', function() {
        let input = this;
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
})