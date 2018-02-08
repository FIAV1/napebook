(function($) {
    "use strict"; // use strict make writing js more safe
    
    var $deletePostButton = $("#deletePostButton");

    $deletePostButton.click(function(){
        $('#deletePostModal').modal('show')
    });
})(jQuery);