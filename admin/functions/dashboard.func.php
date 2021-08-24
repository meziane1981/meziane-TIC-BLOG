<?php
function inTable($table){
    global $db;
    $query = $db->query("SELECT COUNT(id) FROM $table");
    return $nombre = $query->fetch();
}


function getColor($table,$colors){
    if(isset($colors[$table])){
        return $colors[$table];
    }else{
        return "orange";
    }
}