(function () {
    "use strict";

    $(document).on('click', '.comment-edit-button', function(){
        var $id = $(this).data('id');
        var $modal = $('#comment-edit');

        $modal.find('#comment-author-image').removeAttr('src');
        $modal.find('#comment-author').text('');
        $modal.find('#comment-time').text('');
        $modal.find('#comment-text').text('');
        $modal.find('#comment-update-button').removeAttr('data-id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            dataType: 'json',
            method: 'GET',
            url: '/comments/'+$id+'/edit',
            success: function($data){
                console.log($data);

                $modal.find('#comment-author-image').attr('src', '/storage/'+$data.user.image_url);
                $modal.find('#comment-author').text($data.user.name+' '+$data.user.surname);
                $modal.find('#comment-time').text(moment($data.comment.created_at, 'YYYYMMDD, h:mm:ss a').fromNow());
                $modal.find('#comment-text').val($data.comment.text);
                $modal.find('#comment-update-button').attr('data-id', $id);

                $modal.modal('show');
            },
            error: function($data){
                console.log($data);
            }
        });
    });
})(jQuery);