import $ from 'jquery';

jQuery(document).ready(function ($) {
    var customUploader;
    $('#voyage_pbs_image_button').click(function (e) {
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (customUploader) {
            customUploader.open();
            return;
        }
        //Extend the wp.media object
        customUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        //When a file is selected, grab the URL and set it as the text field's value
        customUploader.on('select', function () {
            var attachment = customUploader.state().get('selection').first().toJSON();
            $('#voyage_pbs_image').val(attachment.url);
            $('#voyage_pbs_image_id').val(attachment.id);
            $('#voyage_pbs_image_preview').attr('src', attachment.url);
        });
        //Open the uploader dialog
        customUploader.open();
    });
    $('#hotel_pbs_image_button').click(function (e) {
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (customUploader) {
            customUploader.open();
            return;
        }
        //Extend the wp.media object
        customUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        //When a file is selected, grab the URL and set it as the text field's value
        customUploader.on('select', function () {
            var attachment = customUploader.state().get('selection').first().toJSON();
            $('#hotel_pbs_image').val(attachment.url);
            $('#hotel_pbs_image_id').val(attachment.id);
            $('#hotel_pbs_image_preview').attr('src', attachment.url);
        });
        //Open the uploader dialog
        customUploader.open();
    });
});