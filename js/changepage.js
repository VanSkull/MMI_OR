$('#accueil').click(function() {
    var id2 = $('.active').attr('id');
    $("#"+id2).removeClass('active');
    $("#accueil").parent().addClass('active');
});

$('#films').click(function() {
    var id2 = $('.active').attr('id');
    $("#"+id2).removeClass('active');
    $("#films").parent().addClass('active');
});

$('#planning').click(function() {
    var id2 = $('.active').attr('id');
    $("#"+id2).removeClass('active');
    $("#planning").parent().addClass('active');
});

$('#concours').click(function() {
    var id2 = $('.active').attr('id');
    $("#"+id2).removeClass('active');
    $("#concours").parent().addClass('active');
});

$('#contact').click(function() {
    var id2 = $('.active').attr('id');
    $("#"+id2).removeClass('active');
    $("#contact").parent().addClass('active');
});