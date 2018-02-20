(function($){

    "use strict";

    $(document).on('click', '.hasnt-like', function(){

        var $trigger = $(this);
        var $postId = $trigger.data('postid');

        performRequest('POST', $postId, $trigger);

    });

    $(document).on('click', '.has-like', function(){

        var $trigger = $(this);
        var $postId = $trigger.data('postid');

        performRequest('DELETE', $postId, $trigger);

    });

    function performRequest($method, $postId, $trigger){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: $method,
            url: '/api/like',
            data: { post_id: $postId },
            dataType: 'json',

            success: function($response) {

                if ( $trigger.hasClass('has-like') ) {

                    $trigger.removeClass('has-like');
                    $trigger.addClass('hasnt-like');
                }
                else{

                    $trigger.removeClass('hasnt-like');
                    $trigger.addClass('has-like');
                }

                if (parseInt($response) === 1) {

                    var text ='<a class="social-button post-likes" data-postid="'+$postId+'" data-toggle="modal" data-target="#likeUsersModal">Piace a '+$response+' persona</a>';

                    $('#like-amount-'+$postId).html(text);
                }
                else if (parseInt($response) > 1) {

                    var text ='<a class="social-button post-likes" data-postid="'+$postId+'" data-toggle="modal" data-target="#likeUsersModal">Piace a '+$response+' persone</a>';

                    $('#like-amount-'+$postId).html(text);
                }
                else{
                    $('#like-amount-'+$postId).empty();
                }

            },
            error: function($data) {
                var $errors = $data.responseJSON;
                console.log($errors);
            }
        });
    }

})(jQuery);
