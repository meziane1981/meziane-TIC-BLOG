<!-- pour le modo pour ne pas acceder a des fonctionnelité de admin  -->
<?php 
if(admin()!=1){
    header("Location:index.php?page=dashboard");
}
?>
<h2>Poster un article</h2>

<?php

    if(isset($_POST['post'])){
        // créé les variable de poster un article
        $title = htmlspecialchars(trim($_POST['title']));
        $content = htmlspecialchars(trim($_POST['content']));
        $posted = isset($_POST['public']) ? "1" : "0";
         // tableur erreur pour envoyé les erreure 
        $errors = [];
         // vérifier les champ 
        if(empty($title) || empty($content)){
            //afficher les erreur
            $errors['empty'] = "Veuillez remplir tous les champs";
        }
           // traitement des images 
        if(!empty($_FILES['image']['name'])){
            $file = $_FILES['image']['name'];
            $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
            $extension = strrchr($file,'.');
               //vérifier es ce que l'extension existe dans notre tableau
            if(!in_array($extension,$extensions)){
                $errors['image'] = "Cette image n'est pas valable";
            }
        }
                //afficher les erreur
        if(!empty($errors)){
            ?>
                <div class="card red">
                    <div class="card-content white-text">
                        <?php
                            foreach($errors as $error){
                                echo $error."<br/>";
                            }
                        ?>
                    </div>
                </div>
            <?php
            //insérer dans la bdd
        }else{
            // exéctué pour les article sans image
            post($title,$content,$posted);
              // exéctué pour les article avec image
            if(!empty($_FILES['image']['name'])){
                // fonction pour téléchegé l'image
                post_img($_FILES['image']['tmp_name'], $extension);
            }else{
                $id = $db->lastInsertId();
                header("Location:index.php?page=post&id=".$id);
            }
        }
    }


?>




<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field col s12">
            <input type="text" name="title" id="title"/>
            <label for="title">Titre de l'article</label>
        </div>

        <div class="input-field col s12">
            <textarea name="content" id="content" class="materialize-textarea"></textarea>
            <label for="content">Contenu de l'article</label>
        </div>

    <div class="col s12">
        <div class="file-field input-field">
            <div class="btn col s2">
                <span>Image de l'article</span>
                <input type="file" name="image"/>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate col s10" type="text" readonly/>
            </div>
        </div>
    </div>




        <div class="col s6">
            <p>Public</p>
            <div class="switch">
                <label>
                    Non
                    <input type="checkbox" name="public"/>
                    <span class="lever"></span>
                    Oui
                </label>
            </div>
        </div>

        <div class="col s6 right-align">
            <br/><br/>
            <button class="btn" type="submit" name="post">Publier</button>
        </div>

    </div>



</form>