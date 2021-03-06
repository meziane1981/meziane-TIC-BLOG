<?php
//fonction  pour vérifier l'adresse émail
function email_taken($email){
    global $db;
    $e = ['email'   =>  $email];
    $sql = "SELECT * FROM admins WHERE email = :email";
    $req = $db->prepare($sql);
    $req->execute($e);
    $free = $req->rowCount($sql);

    return $free;
}
// fonction token permettra de  générer un token aléatoire 
function token($length){
    $chars = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789";
    return substr(str_shuffle(str_repeat($chars,$length)),0,$length); //mélanger le token avec str_shuffle et str_repeat repeter la foction token le nombre de fois 
}


// fonction pour ajoute le modo
function add_modo($name,$email,$role,$token){
    global $db;

    $m= [
        'name'      =>  $name,
        'email'     =>  $email,
        'token'     =>  $token,
        'role'      =>  $role
    ];
    // requette pour insérer le modo au admin   
    $sql = "INSERT INTO admins(name,email,token,role) VALUES(:name,:email,:token,:role)";
    $req = $db->prepare($sql);
    $req->execute($m);
// l'email quand va reçu on maildev
    $subject = "Modo sur le blog";
    $message = '
        <html lang="en" style="font-family: sans-serif;">
            <head>
                <meta charset="UTF-8">
            </head>
            <body>
                Voici votre identifiant et code unique à insérer sur <a href="http://localhost/GitHub/meziane-TIC-BLOG/admin/index.php?page=new">cette page</a>:
                <br/>Identifiant: '.$email.'
                <br/>Mot de passe: '.$token.'
                <br/>Vous êtes: '.$role.'
                <br/><br/>Après avoir inséré ces informations, vous devrez choisir un mot de passe.
            </body>
        </html>
    ';

    $header = "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html; charset=UTF-8\r\n";
    $header .= 'From: meziane_maamar@yahoo.fr' . "\r\n" . 'Reply-To: meziane_maamar@yahoo.fr' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

    mail($email,$subject,$message,$header);

}

//fonction pour récupérer l'ensemble des administrateurs et  modérateurs
function get_modos(){
    global $db;
    $req = $db->query("
        SELECT * FROM admins
    ");
 // tableau qui récupère tt les résulta
    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }
    return $results;
}