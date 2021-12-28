<?php
// fonction pour new modo
function is_modo($email,$token){
    global $db;

    $a = [
        'email' =>  $email,
        'token' =>  $token
    ];
    //requête vérifier le contenu de la table admin et va le récupérer et vérifier  
    $sql = "SELECT * FROM admins WHERE email=:email AND token=:token";
    $req= $db->prepare($sql);
    $req->execute($a);
    return $req->rowCount($sql);
}