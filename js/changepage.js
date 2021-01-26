$('#accueil').click(function() {
    var id = $('.current').attr('id');
    $("#"+id).removeClass('current');
    $("#"+id).addClass('unable');
    $("#section-home").removeClass('unable');
    $("#section-home").addClass('current');
    var id2 = $('.active').attr('id');
    $("#"+id2).removeClass('active');
    $("#accueil").parent().addClass('active');
});

$('#films').click(function() {
    var id = $('.current').attr('id');
    $("#"+id).removeClass('current');
    $("#"+id).addClass('unable');
    $("#section-films").removeClass('unable');
    $("#section-films").addClass('current');
    var id2 = $('.active').attr('id');
    $("#"+id2).removeClass('active');
    $("#films").parent().addClass('active');
});

$('#planning').click(function() {
    var id = $('.current').attr('id');
    $("#"+id).removeClass('current');
    $("#"+id).addClass('unable');
    $("#section-planning").removeClass('unable');
    $("#section-planning").addClass('current');
    var id2 = $('.active').attr('id');
    $("#"+id2).removeClass('active');
    $("#planning").parent().addClass('active');
});

$('#concours').click(function() {
    var id = $('.current').attr('id');
    $("#"+id).removeClass('current');
    $("#"+id).addClass('unable');
    $("#section-competition").removeClass('unable');
    $("#section-competition").addClass('current');
    var id2 = $('.active').attr('id');
    $("#"+id2).removeClass('active');
    $("#concours").parent().addClass('active');
});

$('#contact').click(function() {
    var id = $('.current').attr('id');
    $("#"+id).removeClass('current');
    $("#"+id).addClass('unable');
    $("#section-contact").removeClass('unable');
    $("#section-contact").addClass('current');
    var id2 = $('.active').attr('id');
    $("#"+id2).removeClass('active');
    $("#contact").parent().addClass('active');
});