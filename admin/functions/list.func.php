<?php
// récupérer l'ensemble des articles
function get_posts(){

    global $db;

    $req = $db->query("SELECT * FROM posts   ORDER BY date DESC");
// créé le tableau $results pour stocker le resulta de ma requette 
    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;


}
