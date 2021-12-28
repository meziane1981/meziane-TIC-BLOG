<?php
// la connection de bdd
require ('../../functions/main-functions.php');
// la requete pour update la bdd 
$db->exec("UPDATE comments SET seen='1' WHERE id='{$_POST['id']}'");
?>