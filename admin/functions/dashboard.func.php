<?php
// fonction dashboard permetrre de récupérer le nombre d'entrées dans la table
function inTable($table){
    global $db;
    $query = $db->query("SELECT COUNT(id) FROM $table");
    return $nombre = $query->fetch();
}

// fonction  pour la couleur de tables dans le dashbord
function getColor($table,$colors){
    if(isset($colors[$table])){
        return $colors[$table];
    }else{
        return "orange";
    }
}

// fonction pour récupérer le titre de l'article et les commentaires on bdd

function get_comments(){
    global $db;

    $req = $db->query("
        SELECT  comments.id,
                comments.name,
                comments.email,
                comments.date,
                comments.post_id,
                comments.comment,
                posts.title
        FROM comments
        JOIN posts
        ON comments.post_id = posts.id
        WHERE comments.seen = '0'
        ORDER BY comments.date ASC
    ");
// stocker les résulta 
    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }
    return $results;
}