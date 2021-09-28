<nav class="light-blue">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.php?page=home" class="brand-logo">MEZIANE DEV</a>
            <?php 
            if ($page != 'login' && $page != 'new' && $page != 'password'){
                 ?>
                    <ul class="right hide-on-med-and-down">
                        <li class="<?php echo ($page=="dashboard")?"active" : ""; ?>"><a href="index.php?page=dashboard"><i class="material-icons">dashboard</i></a></li>
                        <!-- pour le modo pour ne pas acceder a des fonctionnelité de admin  -->
                        <?php 
                                 if(admin()==1){
                        ?>
                        <li class="<?php echo ($page=="write")?"active" : ""; ?>"><a href="index.php?page=write"><i class="material-icons">edit</i></a></li>
                        <li class="<?php echo ($page=="list")?"active" : ""; ?>"><a href="index.php?page=list"><i class="material-icons">view_list</i></a></li>
                        <li class="<?php echo ($page=="settings")?"active" : ""; ?>"><a href="index.php?page=settings"><i class="material-icons">settings</i></a></li>

                        <?php    
                    }
                    ?>
                               
                    <li><a href="../index.php?page=home">Quitter</a></li>
                    <li><a href="index.php?page=logout">Déconnexion</a></li> 
                                
                    </ul>
                          <!-- Menu burger -->
                    <ul id="slide-out" class="sidenav sidenav">
                        <li class="<?php echo ($page=="dashboard")?"active" : ""; ?>"><a href="index.php?page=dashboard">Tableau de bord</a></li>
                        <?php 
                        if(admin()==1){
                            ?>
                                <li class="<?php echo ($page=="write")?"active" : ""; ?>"><a href="index.php?page=write">Publier un article</a></li>
                                <li class="<?php echo ($page=="list")?"active" : ""; ?>"><a href="index.php?page=list">listing des articles</a></li>
                                <li class="<?php echo ($page=="settings")?"active" : ""; ?>"><a href="index.php?page=settings">Paramètres</a></li>
                                
                            <?php    
                        }
                        ?>
                        <li><a href="../index.php?page=home">Quitter</a></li>
                        <li><a href="index.php?page=logout">Déconnexion</a></li>
                                
                    </ul>
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                 <?php
                     }
                 ?>
        </div>
    </div>
</nav>