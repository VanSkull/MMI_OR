$(document).ready(function() {
    $("[href]").each(function() {
        if (this.href == window.location.href) {
            if(this.href == "#arrive-scroll"){
                $('a#accueil').parent().addClass("active");
            }
            else{
                $(this).parent().addClass("active");
            }
        }
    });
});