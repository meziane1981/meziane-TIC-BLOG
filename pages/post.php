            <?php

            $post = get_post();
            if($post == false){
                header("Location:index.php?page=error");
            }else{
                ?>
              
                    </div> 
                    <!-- affichage l'image de l'article -->
                <div class="parallax-container">
                    <div class="parallax">
                        <img src="img/posts/<?= $post->image ?>" alt="<?= $post->title ?>"/>
                    </div>
                </div>
                    <div class="container">
                    <h2><?= $post->title ?></h2>
                    <h6>Par <?= $post->name ?> le <?= date("d/m/Y à H:i", strtotime($post->date)) ?></h6>
                        <p><?= nl2br($post->content); ?></p>
                <?php      
            }
            ?>
            <hr>   
                        <h4>Commentaires:</h4>
                    <?php
                    //recupré est stocker en $responses
                $responses = get_comments();
                //afficher les commentaires 
                if($responses != false){
                    foreach($responses as $response){
                        ?>
                            <blockquote>
                                <!-- l'auteur de commantaire et la date  -->
                                <strong><?= $response->name ?> (<?= date("d/m/Y", strtotime($response->date)) ?>)</strong>
                                <!-- le contenu de commentaire -->
                                <p><?= nl2br($response->comment); ?></p>
                            </blockquote>
                        <?php
                    }
                }else echo "Aucun commentaire n'a été publié... Soyez le premier!";
            ?>

                    <h4>Commenter:</h4>
                    <?php
                    // envoyer le commentaire 
                        if(isset($_POST['submit'])){
                            $name = htmlspecialchars(trim($_POST['name']));
                            $email = htmlspecialchars(trim($_POST['email']));
                            $comment = htmlspecialchars(trim($_POST['comment']));
                            $errors = [];
                            // vérifier que les champ n'ont pas vide 
                            if(empty($name) || empty($email) || empty($comment)){
                                $errors['empty'] = "Tous les champs n'ont pas été remplis";
                            }else{
                                //vérifier s'est l'adresse email est valide 
                                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                    $errors['email'] = "L'adresse email n'est pas valide";
                                }
                            }
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
                            }else{
                                //fonction de commentaire 
                                comment($name,$email,$comment);
                                ?>
                                    <script>
                                        window.location.replace("index.php?page=post&id=<?= $_GET['id'] ?>");
                                    </script>
                                <?php
                            }
        
                        }
        
                    ?>
        
         
            <form method="post">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="text" name="name" id="name"/>
                        <label for="name">Nom</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="email" name="email" id="email"/>
                        <label for="email">Adresse email</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea name="comment" id="comment" class="materialize-textarea"></textarea>
                        <label for="comment">Commentaire</label>
                    </div>

                    <div class="col s12">
                        <button type="submit" name="submit" class="btn waves-effect">
                            Commenter ce post
                        </button>
                    </div>
                </div>
            </form>