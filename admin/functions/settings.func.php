<?php
//fonction pour vérifier l'adresse émail
function email_taken($email){
    global $db;
    $e = ['email'   =>  $email];
    $sql = "SELECT * FROM admins WHERE email = :email";
    $req = $db->prepare($sql);
    $req->execute($e);
    $free = $req->rowCount($sql);

    return $free;
}