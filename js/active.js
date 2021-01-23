$(document).ready(function() {
    $("[href]").each(function() {
        if (this.href == window.location.href) {
            if(this.href == "#arrive-scroll"){
                $('#accueil').parent().addClass("active");
            }
            $(this).parent().addClass("active");
        }
    });
});