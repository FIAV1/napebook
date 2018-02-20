(function () {
    "use strict";

    var $button = $('.comment-publish');

    $button.click(function(){

        var $id = $(this).data('id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: '/comments',
            data:{
                'comment-text': $('#comment-text-'+$id).val(),
                'post-id': $id
            },
            success: function($data){
                // console.log($data);
                var $div = $('#comments-'+$id);

                $div.append(
                    '<div id="comment-'+$data.comment.id+'" class="row my-4">\
                        <div class="col-1 align-self-center">\
                            <img src="/storage/'+$data.user.image_url+'" alt="user image" class="img-fluid rounded-circle img-xs">\
                        </div>\
                        <div class="col-3">\
                            <div class="d-flex flex-column justify-content-start">\
                                <span class="comment-author"><a href="/profile/'+$data.user.id+'">'+$data.user.name+' '+$data.user.surname+'</a></span>\
                                <span class="comment-time"><small><i class="far fa-clock mr-2"></i>'+moment($data.comment.created_at, 'YYYYMMDD, h:mm:ss a').fromNow()+'</small></span>\
                            </div>\
                        </div>\
                        <div class="col-7 align-self-center">\
                            <p class="comment-text m-0">'+$data.comment.text+'</p>\
                        </div>\
                        <div class="col-auto align-self-center ml-auto">\
                            <div class="dropdown show">\
                                <a role="button" id="comment-manage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>\
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="post-manage">\
                                    <a class="dropdown-item text-right comment-edit-button" data-id="'+$data.comment.id+'">Modifica<i class="fa fa-edit ml-2"></i></a>\
                                    <a class="dropdown-item text-right comment-delete-button" data-id="'+$data.comment.id+'">Elimina<i class="fas fa-trash ml-2"></i></a>\
                                </div>\
                            </div>\
                        </div>\
                    </div>'
                );

                $('#comment-text-'+$id).val('');
            },
            error: function($data){
                var $errors = $data.responseJSON;
                console.log($errors);
            }
        });
    })

})(jQuery);