(function($){
    "use strict";
    
    var $button = $('#profile-edit-button');
    

    $button.click(function(){

        var $id = $(this).data('id');
        var $modal = $('#profile-edit');

        var $name = $modal.find('#name-edit');
        var $surname = $modal.find('#surname-edit');
        var $phone = $modal.find('#phone-edit');
        var $birthday = $modal.find('#birthday-edit');
        var $male = $modal.find('#male');
        var $female = $modal.find('#female');
        var $bio = $modal.find('#bio-edit');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '/profile/'+$id+'/edit',
            success: function($data){
                $name.val($data.name);
                $surname.val($data.surname);
                $phone.val($data.phone);
                $birthday.val($data.birthday);
                if($data.sex === 'M' ){
                    $male.prop('checked', true)
                } else{
                    $female.prop('checked', true)
                }
                $bio.val($data.bio);

                $modal.modal('show');
            },
            error: function($data){
                var $errors = $data.responseJSON;
                console.log($errors);
            }
        });
    });

    
})(jQuery);