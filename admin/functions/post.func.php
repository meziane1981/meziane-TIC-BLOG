<?php
// fonction pour récupérer et afficher  un seul poste
function get_post(){

    global $db;
// la requette pour récupérer larticle dans la bdd
    $req = $db->query("
        SELECT  posts.id,
                posts.title,
                posts.image,
                posts.date,
                posts.content,
                posts.posted,
                admins.name
        FROM posts
        JOIN admins
        ON posts.writer = admins.email
        WHERE posts.id = '{$_GET['id']}'
    ");
// stocker le resulta dans la variable $rsult 
    $result = $req->fetchObject();
    return $result;
}
// fonction edit pour modifier l'article 
function edit($title,$content,$posted,$id){

    global $db;

    $e = [
        'title'     => $title,
        'content'   => $content,
        'posted'    => $posted,
        'id'        => $id
    

    ];
// la requette de modification de l'article
    $sql = "UPDATE posts SET title=:title, content=:content, date=NOW(), posted=:posted WHERE id=:id";
    $req = $db->prepare($sql);
    $req->execute($e);

}