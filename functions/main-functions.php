<?php

    session_start();

    //A modifier en fonction de vos indentifiants de base de donnée
    $dbhost = 'localhost';
    $dbname = 'blog';//Ne doit pas être modifié si vous avez appelé votre bdd "blog"
    $dbuser = 'root';
    $dbpswd = '';

    //on se va connecter a la base
    try{
        $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }catch(PDOexception $e){
        die("Une erreur est survenue lors de la connexion à la base de données");
    }


function admin(){
   // modérateur ou non 
   //oui 
   //Droit d'accéder  = 1 
   //non  //pas de session 
    // pas le droit = 0 
    if(isset($_SESSION['admin'])){
        // connexion de la bdd
        global $db;
        $a = [
            'email'     =>  $_SESSION['admin'],
            'role'      =>  'admin'
        ];
        // requete 
        $sql = "SELECT * FROM admins WHERE email=:email AND role=:role";
        $req = $db->prepare($sql);
        $req->execute($a);
        $exist = $req->rowCount($sql);

        return $exist;
    }else{
        return 0;
    }
}

// pour le mot de passe si en trouve au non 
function hasnt_password(){
    global $db;

    $sql = "SELECT * FROM admins WHERE email = '{$_SESSION['admin']}' AND password = ''";
    $req = $db->prepare($sql);
    $req->execute();
    $exist = $req->rowCount($sql);
    return $exist;
} 