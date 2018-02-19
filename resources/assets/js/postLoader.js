(function($){

    "use strict";

    var $offset = 10;
    var $limit = 10;

    $(document).on('click', '#profile-posts-loader', function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: 'GET',
            url: '/api/posts/profile',
            data: {
                offset: $offset,
                limit: $limit
            },
            dataType: 'html',

            success: function($response) {

                if (jQuery.isEmptyObject($response)) {

                    $('#profile-posts-loader').remove();
                }
                else {

                    $('#profile-posts-loader').before($response);
                    $offset += $limit;
                }

            },
            error: function($data) {

                console.log($data);
            }
        });


    });

    $(document).on('click', '#home-posts-loader', function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: 'GET',
            url: '/api/posts/home',
            data: {
                offset: $offset,
                limit: $limit
            },
            dataType: 'html',

            success: function($response) {

                if (jQuery.isEmptyObject($response)) {

                    $('#home-posts-loader').remove();
                }
                else {

                    $('#home-posts-loader').before($response);
                    $offset += $limit;
                }

            },
            error: function($data) {

                console.log($data);
            }
        });


    });

})(jQuery);
