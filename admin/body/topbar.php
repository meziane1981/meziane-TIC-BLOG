<nav class="light-blue">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.php?page=home" class="brand-logo">MEZIANE DEV</a>

         
            <ul class="right hide-on-med-and-down">
                <li class="<?php echo ($page=="dashboard")?"active" : ""; ?>"><a href="index.php?page=dashboard"><i class="material-icons">dashboard</i></a></li>
                <li class="<?php echo ($page=="write")?"active" : ""; ?>"><a href="index.php?page=write"><i class="material-icons">edit</i></a></li>
                <li class="<?php echo ($page=="list")?"active" : ""; ?>"><a href="index.php?page=list"><i class="material-icons">view_list</i></a></li>
                <li><a href="../index.php?page=home">Quitter</a></li>
                <li><a href="index.php?page=logout">Déconnexion</a></li>                 
            </ul>

            <ul id="slide-out" class="sidenav sidenav">
                <li class="<?php echo ($page=="dashboard")?"active" : ""; ?>"><a href="index.php?page=dashboard">Tableau de bord</a></li>
                <li class="<?php echo ($page=="write")?"active" : ""; ?>"><a href="index.php?page=write">Publier un article</a></li>
                <li class="<?php echo ($page=="list")?"active" : ""; ?>"><a href="index.php?page=list">listing des articles</a></li>
                <li><a href="../index.php?page=home">Quitter</a></li>
                <li><a href="index.php?page=logout">Déconnexion</a></li>   
            </ul>
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </div>
</nav>