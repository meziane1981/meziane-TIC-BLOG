$(document).ready(function() {
    $('.modal').modal();
    // validation du commentaire comme lu
    $(".see_comment").click(function() {
        //définir la variable qui va etre la variable de id de commentaire
        var id = $(this).attr("id");

        $.post('ajax/see_comment.php', { id: id }, function() {
            // pour cacher le commentaire quand est validé au suprimé
            $("#commentaire_" + id).hide();
        });
    });

    // suprimé le commentaire n'est utile
    $(".delete_comment").click(function() {
        var id = $(this).attr("id");
        $.post('ajax/delete_comment.php', { id: id }, function() {
            $("#commentaire_" + id).hide();
        });
    });
});