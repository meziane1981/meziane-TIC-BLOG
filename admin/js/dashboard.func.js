$(document).ready(function() {
            $('.modal').modal();

            $(".see_comment").click(function() {
                var id = $(this).attr("id");

                $.post('ajax/see_comment.php', { id: id }, function() {
                    $("#commentaire_" + id).hide();
                });
            });