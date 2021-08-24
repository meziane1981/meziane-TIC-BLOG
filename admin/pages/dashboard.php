 
        <h2>Tableau de bord</h2>
        <div class="row">

            <?php

           $tables = [
                "Publications"      =>  "posts",
                "Commentaires"      =>  "comments",
                "Administrateurs"   =>  "admins"
            ];


            $colors = [
                "posts"     =>  "green",
                "comments"  =>  "red",
                "admins"    =>  "blue"
            ];

             ?>

          <?php

            foreach($tables as $table_name => $table){
                        ?>
            <div class="col l4 m6 s12">
                <div class="card">
                        <div class="card-content <?=getColor($table,$colors)?> white-text">
                            <span class="card-title"><?= $table_name ?></span>
                            <?php $nbrInTable = inTable($table); ?>  
                            <h4><?= $nbrInTable[0] ?></h4>
                        </div>
                </div>
            </div>
                <?php
                }
            
    ?>

    </div>





<pre>

 <?php  
// session_destroy();
var_dump($_SESSION);
?>
</pre>