<?php
   // fonction modifier le mots de passe 
function update_password($password){
    global $db;

    
    $p = [
        'password'  =>  password_hash($password,PASSWORD_DEFAULT),
        'session'   =>  $_SESSION['admin']
    ];
     //requette de modification ds bss
    $sql = "UPDATE admins SET password = :password WHERE email=:session";
    $req = $db->prepare($sql);
    $req->execute($p);

}

