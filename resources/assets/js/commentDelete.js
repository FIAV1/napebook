(function () {
    "use strict";

    var $modal = $('#comment-delete');

    $(document).on('click', '.comment-delete-button', function(){

        var $id = $(this).data('id');

        $modal.find('#comment-delete-confirm').data('id', $id);

        $modal.modal('show');
    });

    $(document).on('click', '#comment-delete-confirm', function(){

        var $id = $(this).data('id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            dataType: 'json',
            method: 'DELETE',
            url: '/comments/'+$id,
            success: function($data){
                // console.log($data);

                $('#comment-'+$id).remove();

                $modal.modal('hide');
            },
            error: function($data){
                $modal.modal('hide');
                
                var $errors = $data.responseJSON;
                console.log($errors);
            }
        });
    });

})(jQuery);