(function($){
    "use strict";

    var $button = $('#friends-pendent-tab');
    var $tab = $('#friends-pendent');

    $button.click(function($e){
        $e.preventDefault();
        $tab.html('');

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
                // console.log($data);

                $.each($data, function($i, $user) {
                    $tab.append(
                        '<div class="container-fluid my-3">\
                            <div class="row row-hover">\
                                <div class="col-2 text-center">\
                                    <img src="/storage/'+$user.image_url+'" alt="user image" class="img-fluid rounded-circle img-thumbnail img-md">\
                                </div>\
                                <div class="col-5 d-flex justify-content-center">\
                                    <span class="align-self-center"><a href="/profile/'+$user.id+'">'+$user.name+' '+$user.surname+'</a></span>\
                                </div>\
                                <div class="col-5 d-flex justify-content-center">\
                                    <button type="button" class="btn btn-success align-self-center friendship-cancel-button" data-id="'+$user.id+'">Annulla richiesta di amicizia</button>\
                                </div>\
                            </div>\
                        </div>'
                    );
                });

                var $cancel = $('.friendship-cancel-button');

                $cancel.click(function(){
                    var $id = $(this).data('id');
                    
                    var $form = $('#friendship-cancel-form');

                    $form.find('#friendship-cancel').val($id);

                    $form.submit();
                });

            },
            error: function($data){
                console.log($data);
            }
        });
    });

    $button.on('hidden.bs.tab', function(){
        $tab.html('')
    });
})(jQuery);
