(function($){
    "use strict";
    
    function getValues($div){
        var $values = {
            name: $div.find("#name"),
            surname: $div.find("#surname"),
            email: $div.find('#email'),
            phone: $div.find('#phone'),
            birthday: $div.find('#birthday'),
            sex1: $div.find('input[name=sex]:checked'),
            sex2: $div.find('#sex'),
            bio: $div.find('#bio')
        };

        return $values;
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var $updateProfile = $('#update-profile');

    $updateProfile.click(function($e) {
        $e.preventDefault();

        var $id = $(this).data('id');

        var $editProfile = $('#edit-profile');
        var $showProfile = $('#show-profile');

        var $values = getValues($editProfile);

        $.ajax({
            dataType: 'json',
            type: 'PUT',
            url: '/profile/'+$id+'/info',
            data: {
                'name': $values.name.val(),
                'surname': $values.surname.val(),
                'email': $values.email.val(),
                'phone': $values.phone.val(),
                'birthday': $values.birthday.val(),
                'sex': $values.sex1.val(),
                'bio': $values.bio.val()
            },
            success: function($data) {
                $values = getValues($showProfile);

                //console.log($data);

                $values.name.text($data.name);
                $values.surname.text($data.surname);
                $values.email.text($data.email);
                $values.phone.text($data.text);
                $values.birthday.text($data.birthday);
                $data.sex === 'M' ? $values.sex2.text('Uomo') : $values.sex2.text('Donna');
                $values.bio.text($data.bio);

                $editProfile.modal('hide');

                $( "#mainNav" ).after(
                    '<div class="alert alert-success alert-dismissible fade show text-center container mt-5" role="alert"><div class="row"><div class="col-12">'+
                    'Informazioni del profilo aggiornate.'+
                    '</div></div><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                );

            },
            error: function($data){
                var $errors = $data.responseJSON;
                console.log($errors);

                $editProfile.modal('hide');

                $( "#mainNav" ).after(
                    '<div class="alert alert-warning alert-dismissible fade show text-center container mt-5" role="alert"><div class="row"><div class="col-12">'+
                    "Errore durante l'aggiornamento del profilo."+
                    '</div></div><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                );
            }
        });
    });

    var $updateProfileImage = $('#update-profile-image');
    var $editProfileImage = $('#edit-profile-image');

    $updateProfileImage.change(function() {
        $editProfileImage.trigger('submit');
    });
})(jQuery);