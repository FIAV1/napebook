(function($){

    "use strict";

    $(document).on('click','.btn-send',function(e){
        //$(".btn-send").submit(function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault();
        var idPost = $(this).val();
        var nCommenti=$('#nComment'+idPost).val();
        var formData = {
            id_user: $("#id_mitt").val(),
            id_post: $(this).val(),
            testo: $("#testo"+idPost).val(),
        }
        var url = '/comment';
        var type = "POST"; //per creare una nuova risorsa
        var my_url = url;

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {

                $("#err"+idPost).empty();


                var commento='<li class="list-group-item">';
                commento+='<div class="row" id="commento' + data[0].id_commento + '">';
                commento+='<div class="col-xs-2 col-md-1">';
                commento+='<img src="/storage/profilo/' + data[1].URLimgprofilo + '" class="img-circle img-responsive" alt="" /></div>';
                commento+='<div class="col-xs-10 col-md-11">';
                commento+='<div>';
                commento+='<a href="/profile/' + data[1].id_user + '">';
                commento+='' + data[1].nome + ' ' + data[1].cognome + '</a>';
                commento+='<div class="mic-info w3-right">';
                commento+='1 secondo fa';
                commento+='</div>';
                commento+='</div>';
                commento+='<div class="comment-text">';
                commento+='' + data[0].testo + '';
                commento+='</div>';
                commento+='<div class="action">  ';
                commento+='</div>';
                commento+='</div>';
                commento+='</div>';
                commento+='</li>';

                nCommenti++;
                $("#n"+idPost).empty();
                updateNumber='<input type="hidden" id="nComment'+idPost+'" value="'+nCommenti+'">'+nCommenti+'';
                $("#n"+idPost).append(updateNumber);


                $("#testo"+idPost).val('');
                $("#list-group"+idPost).append(commento);

            },
            error: function (data) {
                var arr = $.map(data.responseJSON.errors, function(el) { return el });
                $("#err"+idPost).empty();
                $.each(arr, function( key, value ) {
                    $('#err'+idPost).prepend('<b>'+value+'</br></b>');

                })
            }


        });
    });
})(jQuery());