jQuery(function($) {

    function startTimer(link, seconds, updateElement) {

        let x = setInterval(function() {
            seconds--;
            $(updateElement).html(seconds);
            if (seconds == 0) {
                redirect(link);
                clearInterval(x);
            }

        }, 1000);

    }

    function redirect(link) {
        document.location = link;
    }
    
    let timer = $('#redirect-container');
    if ($(timer).length > 0) {
        let link = $(timer).data('link');
        let time = $(timer).data('time');

        startTimer(link, time, $(timer).find('.redirect-timer'));

    }
    

});
