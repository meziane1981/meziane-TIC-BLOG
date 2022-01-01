 <?php
         // vérification qu'il na pas de session qui déja active 
    if(isset($_SESSION['admin'])){
        // s'il a un session on rediriger l'utilisateur vers la page dashboard
        header("Location:index.php?page=dashboard");
    }
?>
 
<div class="row">
    <div class="col l4 m6 s12 offset-l4 offset-m3">
        <div class="card-panel">
            <div class="row">
                <div class="col s6 offset-s3">
                    <img src="../img/admin.png" alt="Administrateur" width="100%"/>
                </div>
            </div>

            <h4 class="center-align">Se connecter</h4>

            <?php
            
              // on récupére les données des inputs
                if(isset($_POST['submit'])){
                    $email = htmlspecialchars(trim($_POST['email']));
                    $password = htmlspecialchars(trim($_POST['password']));
                    
                    $errors = [];
                    // verifier les variables sont vide
                    if(empty($email) || empty($password)){
                        // c'est oui une erreur 
                        $errors['empty'] = "Tous les champs n'ont pas été remplis!";
                       // c'est si pas vide en crée un fonction is_admin 
                    }else if (is_admin($email,$password) == 0){
                        // c'est l'émail et password existe pas il ya une erreur
                        $errors['exist']  = "Cet administrateur n'existe pas";
                    }
                         // dans le cas ou il ya des erreurs 
                    if(!empty($errors)){
                        ?>
                        <!-- il ya des erreurs -->
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
                        // pas d'erreur
                        $_SESSION['admin'] = $email;
                        header("Location: index.php?page=dashboard");
                    }

                }


            ?>

            <form method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="email" id="email" name="email"/>
                        <label for="email">Adresse email</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="password" id="password" name="password"/>
                        <label for="password">Mot de passe</label>
                    </div>
                </div>

                <center>
                    <button type="submit" name="submit" class="waves-effect waves-light btn light-blue">
                        <i class="material-icons left">perm_identity</i>
                        Se connecter
                    </button>
                    <br/><br/>
                    <a href="index.php?page=new">Nouveau modérateur</a>
                </center>




            </form>

        </div>
    </div>
</div>