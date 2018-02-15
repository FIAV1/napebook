(function($) {
    "use strict"; // use strict make writing js more safe

    var $postImageUpload = $("#post-image-create, #post-image-update");

    $postImageUpload.change( function(){
        var $postImage = $(this);
        var $form = $('#' + $(this).data('id'));
        
        var $postImageName = $form.find('#post-image-name');
        var $postImageRemoveButton = $form.find('#post-image-remove-button');
        
        
        // Removing, if it exist, old/wrong uploaded file
        if($postImageName.length){
            $postImageName.remove();
        }

        // Checking if there's at least one file ready to be uploaded
        $form.append('<div id="post-image-name" class="col-12"><p><strong class="mr-2">Immagine:</strong>'+$postImage.val().split('\\').pop()+'<a href="#" id="post-image-clear-button"><i class="fas fa-trash-alt ml-2"></i></a></p></div>');

        // Attaching an event to remove the unwanted file
        $("#post-image-clear-button").click(function() {
            $postImageName = $form.find("#post-image-name");

            $postImage.val('');
            $postImageName.remove();
        });

        if($postImageRemoveButton){
            $postImageRemoveButton.val('');
        }
    });

})(jQuery);