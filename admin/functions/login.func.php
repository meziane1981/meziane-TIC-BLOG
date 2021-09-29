<?php
 
function is_admin($email, $password): bool {
    // connection a la bdd
    global $db;
    //créer requête de recupération pour la connection soit admin au modo 
    $req = $db->prepare("SELECT * FROM admins WHERE `email` = ? AND `role` = 'admin' || `role` = 'modo' ");
    $req->execute([$email]);

    $result = $req->fetch();
    if ($result) {
        return password_verify($password, $result['password']);
    } else {
        return false;
    }
}



?>

    