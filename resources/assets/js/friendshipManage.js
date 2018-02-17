(function($){
    "use strict";

    var $accept = $('#friendship-accept-button');
    var $deny = $('#friendship-deny-button');
    var $cancel = $('#friendship-cancel-button');
    var $add = $('#friendship-add-button');

    $cancel.click(function(){
        var $id = $(this).data('id');
        
        var $form = $('#friendship-cancel-form');

        $form.find('#friendship-cancel').val($id);

        $form.submit();
    });

    $accept.click(function(){
        var $id = $(this).data('id');

        var $form = $('#friendship-accept-form');
        
        $form.find('#friendship-accept').val($id);

        $form.submit();
    });

    $deny.click(function(){
        var $id = $(this).data('id');
        
        var $form = $('#friendship-deny-form');

        $form.find('#friendship-deny').val($id);

        $form.submit();
    });

    $add.click(function(){
        var $id = $(this).data('id');
        
        var $form = $('#friendship-add-form');

        $form.find('#friendship-add').val($id);

        $form.submit();
    });
})(jQuery);
