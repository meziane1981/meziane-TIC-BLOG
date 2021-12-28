<?php

if(hasnt_password() == 0){
    header("Location:index.php?page=dashboard");
}
?>
<div class="row">
    <div class="col l4 m6 s12 offset-l4 offset-m3">
        <div class="card-panel">
            <div class="row">
                <div class="col s6 offset-s3">
                        <img src="../img/modo.png" alt="Modérateur" width="100%"/>
                
                </div>
           </div>
           <h4 class="centre-align">Choisir un mot de passe</h4>
           <?php
           // vérifier le form est envoyé
                if(isset($_POST['submit'])){
                    $password_again = htmlspecialchars(trim($_POST['password_again']));
                    //créé les variable $password  $password_again
                    $password = htmlspecialchars(trim($_POST['password']));
                    $password_again = htmlspecialchars(trim($_POST['password_again']));

                    $errors = [];
                    //vérifier que les champs rempli
                    if(empty($password) || empty($password_again)){
                        $errors['empty'] = "Tous les champs n'ont pas été remplis";
                    }
                       // les mots de pass sont différrents
                    if($password != $password_again){
                        $errors['different'] = "Les mots de passe sont différents";
                    }if(!empty($errors)){
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
                        // fonction modifier le mots de passe 
                        update_password($password);
                        header("Location:index.php?page=dashboard");
                    }
                }

            ?>
            <form method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" id="password" name="password"/>
                        <label for="password">Mot de passe</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="password" name="password_again" id="password_again"/>
                        <label for="password_again">Répéter le mot de passe</label>
                    </div>
                </div>
                <center>
                    <button type="submit" name="submit" class="btn light-blue waves-effect waves-light center-align">
                        <i class="material-icons left">perm_identity</i>
                        Se connecter
                    </button>
                </center>



            </form>

        </div>
    </div>
</div>