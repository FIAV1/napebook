(function($) {
    "use strict"; // use strict make writing js more safe

    // Update form variables
    var $updateButton = $('#updateButton');
    var $updateForm = $('#updateForm');

    // Image form variables
    var $imageRemoveButton = $('#imageRemoveButton');
    var $ImageRemoveInput = $('#ImageRemoveInput');
    var $postOldImage = $('#postOldImage')
    
    // Attaching a button to remove the unwanted file
    $imageRemoveButton.click(function() {
        if($ImageRemoveInput.val() === ""){
            $ImageRemoveInput.val("remove");
            $postOldImage.hide();
            $imageRemoveButton.text("Mantieni l'immagine");
        } else {
            $ImageRemoveInput.val("");
            $postOldImage.show();
            $imageRemoveButton.text("Rimuovi l'immagine");
        }
    });

    $updateButton.click(function() {
        $updateForm.submit();
    });
    
})(jQuery);