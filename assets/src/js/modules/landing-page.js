jQuery(function($) {



    
    $(".landingpage-section .link").on('click', function(e) {
        let href = $(this).find('.link-text').attr('href');
        if (href) {
            window.location = href;
        }
    });


});
