<h1>Page d'accueil</h1>
<div class="row">
<?php
//la variables des articles 
$posts = get_posts();
// parcourir les resultats 
foreach($posts as $post){
    ?>
        <div class="col l6 m6 s12">
            <div class="card">
                <div class="card-content">
                    <!-- afficher le titre de l'article -->
                    <h5 class="grey-text text-darken-2"><?= $post->title ?></h5>
                          <!-- afficher la date et l'auteur  de l'article -->
                    <h6 class="grey-text">Le <?= date("d/m/Y à H:i",strtotime($post->date)); ?> par <?= $post->name ?></h6>
                </div>
                      <!-- affiché l'image de l'article -->
                <div class="card-image waves-effect waves-block waves-light">
                    <img src="img/posts/<?= $post->image ?>" class="activator" alt="<?= $post->title ?>"/>
                </div>
                <!-- afficher le contenu de l'article  -->
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4"><i class="material-icons right">more_vert</i></span>
                    <p><a href="index.php?page=post&id=<?= $post->id ?>">Voir l'article complet</a></p>
                </div>
                <!-- afficher l'aperçu de contenue de  l'article -->
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4"><?= $post->title ?> <i class="material-icons right">close</i></span>
                    <p><?= substr(nl2br($post->content),0,1000); ?>...</p>
                </div>
            </div>
        </div>
    <?php
}

?>
</div>
