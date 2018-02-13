(function($){

    "use strict";

    var $like = $('.like');

    $like.click(function(){

        var $button = $(this);
        var $id = $button.data('id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({

            type: 'GET',
            url: '/post/'+$id+'/like',

            success: function($data) {

               if ( $button.hasClass('has-like') ) {
                   $button.removeClass('has-like');
               }
               else{
                   $button.addClass('has-like');
               }

               if ( parseInt($data) === 1) {

                   var $text ='<a href="#" data-toggle="modal" data-target="#likeUsersModal" id="likeUsersButton">Piace a '+$data+' persona</a>';

                   $('#like-amount-'+$id).html($text);
               }
               else if ( parseInt($data) > 1) {

                   var $text ='<a href="#" data-toggle="modal" data-target="#likeUsersModal" id="likeUsersButton">Piace a '+$data+' persone</a>';

                   $('#like-amount-'+$id).html($text);
               }
               else{
                   $('#like-amount-'+$id).html('');
               }

            },
            error: function() {

                console.log('Errore');
            }
        });
    });



//cancella il like
    $(document).on('click','.colorDislike',function(){
        //$(".btn-send").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        //e.preventDefault();

        var formData = {
            id_mitt: $('#id_mitt').val(),
            id_post: $(this).val(),
        }
        var postID= $(this).val();
        var type = "DELETE"; //per creare una nuova risorsa


        $.ajax({

            type: type,
            url: url,
            data: formData,
            dataType: 'json',
            success: function (data) {

                var string='<button type="button" class="buttonLike colorLike" value="' + postID + '"><i class="fa fa-thumbs-up"></i>  Mi piace</button>';

                $("#mipiace"+postID).empty();
                $("#mipiace"+postID).append(string);

                var updateNLike=' ' + data[1] + ' ';
                $("#nLike"+postID).empty();
                $("#nLike"+postID).append(updateNLike);


            },
            error: function (data) {
            }
        });
    });


})(jQuery);
