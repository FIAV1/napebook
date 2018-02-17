(function($){
    "use strict";
    
    var $button = $('#profile-update-button');
    
    $button.click(function() {
    
        var $id = $(this).data('id');
        var $modal = $('#profile-edit');

        var $name = $modal.find('#name-edit');
        var $surname = $modal.find('#surname-edit');
        var $phone = $modal.find('#phone-edit');
        var $birthday = $modal.find('#birthday-edit');
        var $password = $modal.find('#password-edit');
        var $passwordConfirmation = $modal.find('#password-edit_confirmation');
        var $sex = $modal.find('input[name=sex]');
        var $bio = $modal.find('#bio-edit');

        var $data = {
            'name': $name.val(),
            'surname': $surname.val(),
            'birthday': $birthday.val(),
            'sex': $sex.val(),
        };

        if($password.val() != ''){
            $data['password'] = $password.val();
            $data['password_confirmation'] = $passwordConfirmation.val();
        }

        if($phone.val() != ''){
            $data['phone'] = $phone.val();
        }

        if($bio.val() != ''){
            $data['bio'] = $bio.val();
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            dataType: 'json',
            type: 'PUT',
            url: '/profile/'+$id+'/info',
            data: $data,
            success: function($data) {
                var $info = $('#profile-info');

                var $name = $info.find('#name');
                var $surname = $info.find('#surname');
                var $phone = $info.find('#phone');
                var $birthday = $info.find('#birthday');
                var $sex = $info.find('#sex');
                var $bio = $info.find('#bio');
    
                //console.log($data);
    
                $name.text($data.name);
                $surname.text($data.surname);
                $data.phone !== null ? $phone.text($data.phone) : $phone.text('Nessun numero di telefono presente.');
                $birthday.text($data.birthday);
                $data.sex === 'M' ? $sex.text('Uomo') : $sex.text('Donna');
                $data.bio !== null ? $bio.text($data.bio) : $bio.text('Nessuna bio presente.');
    
                $modal.modal('hide');

                $( "#mainNav" ).after(
                    '<section class="session-message">' +
                    '<div class="container">' +
                    '<div class="row">' +
                    '<div class="col-12">' +
                    '<div class="alert alert-success alert-dismissible fade show text-center my-4" role="alert">' +
                    'Informazioni del profilo aggiornate.'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                    '</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</section>'
                );
    
            },
            error: function($data){
                var $errors = $data.responseJSON;
                console.log($errors);
    
                $modal.modal('hide');
    
                $( "#mainNav" ).after(
                    '<section class="session-message">' +
                    '<div class="container">' +
                    '<div class="row">' +
                    '<div class="col-12">' +
                    '<div class="alert alert-warning alert-dismissible fade show text-center my-4" role="alert">' +
                    'Errore durante l\'aggiornamento del profilo.'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                    '</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</section>'
                );
            }
        });
    });
    
    var $imageUpdate = $('#profile-image-update');
    var $imageEdit = $('#profile-image-edit');
    
    $imageUpdate.change(function() {
        $imageEdit.trigger('submit');
    });

})(jQuery);