<?php

// la connection de bdd
require ('../../functions/main-functions.php');
// la requete pour suprimé le commentaire dans la bdd 
$db->exec("DELETE FROM comments WHERE id = {$_POST['id']}");

?>