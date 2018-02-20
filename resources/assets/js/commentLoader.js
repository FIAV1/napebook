(function($){

    "use strict";

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
                limit: $limit
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

})(jQuery);
