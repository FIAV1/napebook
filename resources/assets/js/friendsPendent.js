(function($){
    "use strict";

    var $button = $('#friends-pendent-tab');
    var $tab = $('#friends-pendent');

    $button.click(function($e){
        $e.preventDefault();
        $tab.empty();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            dataType: 'json',
            type: 'GET',
            url: '/friends/pendent',
            success: function($data){

                if (jQuery.isEmptyObject($data) ){
                    $tab.append(
                        '<div class="container">\
                            <div class="row my-5">\
                                <div class="col-12 text-center">\
                                    <p>Nessun richiesta di amicizia in attesa di risposta</p>\
                                </div>\
                            </div>\
                        </div>'
                    )
                }
                else {
                    $tab.append('<div class="container">');
                    $.each($data, function($i, $user) {
                        $tab.append(
                            '<div class="row my-5">\
                                <div class="col-4 col-md-2 text-center">\
                                    <img src="/storage/'+$user.image_url+'" alt="user image" class="img-fluid rounded-circle img-thumbnail img-md">\
                                </div>\
                                <div class="col-8 col-md-5 d-flex">\
                                    <span class="align-self-center"><a href="/profile/'+$user.id+'">'+$user.name+' '+$user.surname+'</a></span>\
                                </div>\
                                <div class="col-12 col-md-5 d-flex justify-content-around  mt-4 mt-md-0">\
                                    <button type="button" class="btn btn-danger align-self-center friendship-cancel-button" data-id="'+$user.id+'">Annulla richiesta di amicizia</button>\
                                </div>\
                            </div>'
                        );
                    });
                    $tab.append('</div>');

                    var $cancel = $('.friendship-cancel-button');

                    $cancel.click(function () {
                        var $id = $(this).data('id');

                        var $form = $('#friendship-cancel-form');

                        $form.find('#friendship-cancel').val($id);

                        $form.submit();
                    });
                }

            },
            error: function($data){
                console.log($data);
            }
        });
    });

    $button.on('hidden.bs.tab', function(){
        $tab.empty();
    });
})(jQuery);
