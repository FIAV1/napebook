(function($){
    $(document).on('click', '.comment-write', function(){
        var $id = $(this).data('postid');

        $('html, body').animate({
            scrollTop: $('#comment-text-'+$id).offset().top - $(window).height() + $(this).height() + 80
        });

        $('#comment-text-'+$id).focus();
    });
})(jQuery);