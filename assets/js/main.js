jQuery(document).ready(function($) {
    $('.input-switch').on('change', function() {
        var isActive = $(this).is(':checked');
        var animationId = $(this).data('animation-id');

        $.ajax({
            url: ajaxurl,
            method: 'POST',
            data: {
                action: 'toggle_shortcode',
                active: isActive,
                animation_id: animationId
            },
            success: function(response) {
                console.log(response);
            }
        });
    });
});

