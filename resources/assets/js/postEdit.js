(function($){
    "use strict";

    var $button = $('.post-edit-button');
    var $modal = $('#post-edit');

    $button.click(function(){

        var $id = $(this).data('id');

        var $userImage = $modal.find('#post-author-image');
        var $userName = $modal.find('#post-author');
        var $postTimestamp = $modal.find('#post-time');
        var $postImage = $modal.find('#post-image');
        var $postImageManage = $modal.find('#post-image-manage');
        var $postText = $modal.find('#post-text');
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            dataType: 'json',
            type: 'GET',
            url: '/post/' + $id + '/edit',
            success: function($data){
                console.log($data.post.updated_at);

                var $post = $data.post;
                var $user = $data.user;

                $userImage.attr('src', '/storage/' + $user.image_url);
                $userName.text($user.name + ' ' + $user.surname);
                $postTimestamp.text(moment($post.created_at, 'YYYYMMDD, h:mm:ss a').fromNow());
                if ($post.image_url){
                    $postImage.append('<img class="img-fluid rounded" src="/storage/' + $post.image_url + '" alt="post image">');
                    $postImageManage.addClass('form-group col-auto ml-auto');
                    $postImageManage.append('<button type="button" id="post-image-remove-button" class="btn btn-danger">Rimuovi l\'immagine<i class="fas fa-eye-slash ml-2"></i></button>');
                }
                $postText.val($post.text);

                var $postUpdateButton = $('#post-update-button');
                var $postUpdateForm = $('#post-update-form');
                var $postImageRemoveButton = $('#post-image-remove-button');
                var $postImageRemoveInput = $('#post-image-remove-input');
                
                $postImageRemoveButton.click(function() {
                    if($postImageRemoveInput.val() === ''){
                        $postImageRemoveInput.val('remove');
                        $postImage.hide();
                        $postImageRemoveButton.html('Mantieni l\'immagine<i class="fas fa-eye ml-2"></i>');
                    } else {
                        $postImageRemoveInput.val('');
                        $postImage.show();
                        $postImageRemoveButton.html('Rimuovi l\'immagine<i class="fas fa-eye-slash ml-2"></i>');
                    }
                });
            
                $postUpdateButton.click(function() {
                    $modal.modal('hide');
                    $modal.on('hidden.bs.modal', function(){
                        $postUpdateForm.attr('action', '/post/' + $id);
                        $postUpdateForm.submit();
                    });
                });

                $modal.modal('show');

            },
            error: function($data){
                var $errors = $data.responseJSON;
                console.log($errors);
            },
        });

        $modal.on('hidden.bs.modal', function(){
            $userImage.removeAttr('src');
            $userName.text('');
            $postTimestamp.text('');
            $postImage.html('');
            $postImageManage.removeClass('form-group col-auto ml-auto');
            $postImageManage.html('');
            $postText.text('');
        });
    });

})(jQuery);