(function($){
    "use strict";

    $(document).on('click', '.friendship-add-button', function(){
        var $id = $(this).data('id');
        
        var $form = $('#friendship-add-form');

        $form.find('#friendship-add').val($id);

        $form.submit();
    });

    $(document).on('click', '.friendship-accept-button', function(){
        var $id = $(this).data('id');

        var $form = $('#friendship-accept-form');
        
        $form.find('#friendship-accept').val($id);

        $form.submit();
    });

    $(document).on('click', '.friendship-delete-button', function(){
        var $id = $(this).data('id');
        
        var $form = $('#friendship-delete-form');

        $form.find('#friendship-delete').val($id);

        $form.submit();
    });

})(jQuery);
