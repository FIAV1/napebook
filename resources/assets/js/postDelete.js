(function($){
    "use strict";

    var $postDeleteButton = $('.post-delete-button');
    var $modal = $('#post-delete');
    var $form = $('#post-delete-form');

    $postDeleteButton.click(function(){
        var $id = $(this).data('id');

        $form.attr('action', '/post/' + $id)

        $modal.modal('show');
    });
})(jQuery);