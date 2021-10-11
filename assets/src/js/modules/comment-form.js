jQuery(function($) {
    
    
    $('.reply-to-comment').on('click', function(e) {
        //console.log($('#comment_parent'));
        console.log($('#comment_parent').attr('value'));

        let parent_comment = $(this).data('comment-id');

        //console.log($(this).data('comment-id'));
        $('#comment_parent').attr('value', $(this).data('comment-id'));
        console.log($('#comment_parent').attr('value'));

        $('#parent-comment .comment-avatar').html($('#comment-' + parent_comment + ' .comment-avatar').html() );
        $('#parent-comment .comment-title').html($('#comment-' + parent_comment + ' .comment-title').html() );
        $('#parent-comment .comment-date').html($('#comment-' + parent_comment + ' .comment-date').html() );
        $('#parent-comment .comment-body').html($('#comment-' + parent_comment + ' .comment-body').html() );

        $('#parent-comment').removeClass('uk-hidden');
        $('#reply-title').removeClass('uk-hidden')
        $('#new-comment-title').addClass('uk-hidden')
    });

    $('#parent-comment .button-cancel-reply').on('click', function(e) {
        e.preventDefault();

        $('#comment_parent').attr('value', 0);
        $('#parent-comment').addClass('uk-hidden');
        $('#reply-title').addClass('uk-hidden')
        $('#new-comment-title').removeClass('uk-hidden')
    });

});
