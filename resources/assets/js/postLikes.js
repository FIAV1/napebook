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
            url: '/post/likes',
            data: { post_id: $postId },
            dataType: 'json',

            success: function($response) {

                var $modalBody = $('#likeUsersModal').find('.modal-body');

                $modalBody.html('<ul class="list-group list-group-flush">');

                $.each($response, function($i, $user) {

                    var $text =
                        '<li class="list-group-item d-flex align-items-center">' +
                            '<img src="/storage/'+$user.image_url+'" alt="user image" class="img-fluid rounded-circle img-md">' +
                                '<div class="container">' +
                                    '<div class="row">' +
                                        '<div class="col-12 text-center">' +
                                            '<a href=\"/profile/'+$user.id+'\">'+$user.name+' '+$user.surname+'</a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                        '</li>';

                    $modalBody.append($text);
                })

                $modalBody.append('</ul>');

            },
            error: function() {

                console.log('Errore');
            }
        });
    }

})(jQuery);
