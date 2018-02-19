(function () {
    "use strict";

    $(document).on('click', '#comment-update-button', function(){
        var $id = $(this).data('id');
        var $modal = $('#comment-edit');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            dataType: 'json',
            type: 'PUT',
            url: '/comments/'+$id,
            data: {
                'comment-text': $modal.find('#comment-text').val()
            },
            success: function($data){
                console.log($data);

                var $div = $('#comment-'+$id);

                $div.find('.comment-text').text($data.text);

                $modal.modal('hide');
            },
            error: function($data){
                console.log($data);
            }
        });
    });
})(jQuery);