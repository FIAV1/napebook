(function () {
    "use strict";

    var $button = $('.comment-publish');
    var $idArray = [];

    var $offset = 3;
    var $limit = 3;

    $(document).on('click', '.comments-loader', function(){

        var $trigger = $(this);

        console.log($trigger);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: 'GET',
            url: '/api/comments',
            data: {
                post_id: $trigger.data('postid'),
                offset: $offset,
                limit: $limit,
                except: $idArray
            },
            dataType: 'html',

            success: function($response) {

                if (jQuery.isEmptyObject($response)) {

                    $trigger.remove();
                }
                else {

                    $trigger.before($response);
                    $offset += $limit;
                }

            },
            error: function($data) {

                console.log($data);
            }
        });


    });

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

                $('#comments-'+$id).prepend(
                    '<div id="comment-'+$data.comment.id+'" class="row my-4 comment-new">\
                        <div class="col-2">\
                            <img src="/storage/'+$data.user.image_url+'" alt="user image" class="img-fluid rounded-circle img-sm">\
                        </div>\
                        <div class="col-8 col-lg-9 rounded bg-dark p-3">\
                            <div class="d-flex flex-column justify-content-start">\
                                <div class="d-flex flex-row mb-3">\
                                    <span class="comment-author"><a href="/profile/'+$data.user.id+'">'+$data.user.name+' '+$data.user.surname+'</a></span>\
                                    <span class="comment-time ml-2"><small><i class="far fa-clock mr-2"></i>'+moment($data.comment.created_at, 'YYYYMMDD, h:mm:ss a').fromNow()+'</small></span>\
                                </div>\
                                <p class="comment-text m-0">'+$data.comment.text+'</p>\
                            </div>\
                        </div>\
                        <div class="col-auto align-self-center ml-auto p-0">\
                            <div class="dropdown show">\
                                <a role="button" id="comment-manage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>\
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="post-manage">\
                                    <a class="dropdown-item text-right comment-edit-button" data-id="'+$data.comment.id+'">Modifica<i class="fa fa-edit ml-2"></i></a>\
                                    <a class="dropdown-item text-right comment-delete-button" data-id="'+$data.comment.id+'">Elimina<i class="fas fa-trash ml-2"></i></a>\
                                </div>\
                            </div>\
                        </div>\
                    </div>');

                $idArray.push($data.comment.id);
                
                $('html, body').animate({
                    scrollTop: $('#post-'+$data.comment.post_id).offset().top - 60
                });

                $('#comment-text-'+$id).val('');
            },
            error: function($data){
                var $errors = $data.responseJSON;
                console.log($errors);
            }
        });
    })

})(jQuery);