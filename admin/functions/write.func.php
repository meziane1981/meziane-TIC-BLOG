<?php
// crée la fonction de poster l'article
function post($title,$content,$posted){
    global $db;
// stocker dans un tableau $p
    $p = [
        'title'     =>  $title,
        'content'   =>  $content,
        'writer'    =>  $_SESSION['admin'],
        'posted'    =>  $posted

    ];
// la requette pour insérer a la bdd
    $sql = "
      INSERT INTO posts(title,content,writer,date,posted)
      VALUES(:title,:content,:writer,NOW(),:posted)
    ";
  // préparation de la requette
    $req = $db->prepare($sql);
    $req->execute($p);

}
// fonction pour telechergé l'image
function post_img($tmp_name, $extension){
    global $db;
    // pour récupérer le dernier id insérer
    $id = $db->lastInsertId();
    $i = [
        'id'    =>  $id,
        'image' =>  $id.$extension      //$id = 25 , $extension = .jpg      $id.$extension = "25".".jpg" = 25.jpg
    ];
//la requette pour insérer l'image 
    $sql = "UPDATE posts SET image = :image WHERE id = :id";
    $req = $db->prepare($sql);
    $req->execute($i);
    //uploade l'image dans notre dossier posts/img
    move_uploaded_file($tmp_name,"../img/posts/".$id.$extension);
    header("Location:index.php?page=post&id=".$id);
}