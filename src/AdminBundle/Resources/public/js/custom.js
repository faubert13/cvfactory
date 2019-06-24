jQuery(function($) {
    //scroll vers le message flash affiché lors de la soumisssion d'un formulaire
    if ($('.alert').is(':visible')) {
        $('html, body').animate({
            scrollTop: $('.alert').offset().top - 100
        }, 1000);
    }
});