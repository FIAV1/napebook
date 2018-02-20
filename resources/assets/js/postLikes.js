(function($){

    "use strict";

    $(document).on('click', '.post-likes', function(){

        var $trigger = $(this);
        var $postId = $trigger.data('postid');

        performRequest('GET', $postId, $trigger);

    });

    function performRequest($method, $postId, $trigger){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: $method,
            url: '/api/post/likes',
            data: { post_id: $postId },
            dataType: 'json',

            success: function($response) {

                var $modalBody = $('#likeUsersModal').find('.modal-body');

                $modalBody.empty();

                $modalBody.append('<div class="container">');

                $.each($response, function($i, $user) {

                    var $text =
                        '<div class="row my-3">\
                            <div class="col-4"><img src="/storage/'+$user.image_url+'" alt="user image" class="img-fluid rounded-circle img-thumbnail img-md"></div>\
                            <div class="col-8 d-flex align-items-center">\
                                <a href="/profile/'+$user.id+'">'+$user.name+' '+$user.surname+'</a>\
                            </div>\
                        </div>';

                    $modalBody.append($text);
                })

                $modalBody.append('</div>');

            },
            error: function($data) {
                var $errors = $data.responseJSON;
                console.log($errors);
            }
        });
    }

})(jQuery);
