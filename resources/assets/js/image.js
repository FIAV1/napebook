(function($) {
    "use strict"; // use strict make writing js more safe
    
    var $postImage = $("#postImage")

    $postImage.change( function(){
        // Error variables
        var $errorModal = $("#errorModal");
        var $errorField = $("#errorField");

        // Form Variables
        var $imageForm = $("#imageForm");
        var $postImageName = $("#postImageName");
        var $ImageRemoveInput = $('#ImageRemoveInput');
        
        // Validating input file, must be only one item
        if (parseInt($postImage.get(0).files.length)>1){
            $errorField.text("Puoi caricare al massimo un'immagine per post");
            $errorModal.modal('show');
        }

        // Removing, if it exist, old/wrong uploaded file
        if($postImageName.length){
            $postImageName.remove();
        }

        // Checking if there's at least one file ready to be uploaded
        if(parseInt($postImage.get(0).files.length)===1){
            $imageForm.append('<div id="postImageName" class="col-12"><p><strong class="mr-2">Immagine:</strong>'+$postImage.val().split('\\').pop()+'<a href="#" id="imageClearButton"><i class="fas fa-trash-alt ml-2"></i></a></p></div>');

            // Attaching a button to remove the unwanted file
            $("#imageClearButton").click(function() {
                $postImageName = $("#postImageName");

                $postImage.val('');
                $postImageName.remove();
            });

            if($ImageRemoveInput){
                $ImageRemoveInput.val('');
            }
        }
    });
})(jQuery);