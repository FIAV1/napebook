(function($){
    "use strict";

    var $modal = $('#post-delete');
    var $form = $('#post-delete-form');

    $(document).on('click', '.post-delete-button', function(){

        var $id = $(this).data('id');

        $form.attr('action', '/post/' + $id)

        $modal.modal('show');
    });
    
})(jQuery);