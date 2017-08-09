jQuery(document).ready(function ($) {

    var mediaUploader = wp.media.frames.file_frame = wp.media({
        title: 'Choose a Profile Picture',
        button: {
            text: 'Choose Picture'
        },
        multiple: false
    });

    mediaUploader.on('select', function () {
        var attachment = mediaUploader.state().get('selection').first().toJSON();
        $('#hdn-profile-picture').val(attachment.url);
        $('#profile-picture-preview').css({
            'background-image': 'url(' + attachment.url + ')'
        });
    });

    $('#btn-upload').on('click', function (e) {
        e.preventDefault();

        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
    });

    $('#btn-remove').on('click', function (e) {
        e.preventDefault();

        var answer = confirm("Are you sure you want to remove your profile picture?");

        if (answer) {
            $('#hdn-profile-picture').val('');
            $('.sunset-general-form').submit();
        }

        return;
    });

});