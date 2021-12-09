    <?php
// fonction pour récupérer une seul l'article 
                 function get_post(){
        global $db;
// requête pour récupérer une seul l'article
        $req = $db->query("
            SELECT  posts.id,
                    posts.title,
                    posts.image,
                    posts.content,
                    posts.date,
                    admins.name
            FROM posts
            JOIN admins
            ON posts.writer = admins.email
            WHERE posts.id='{$_GET['id']}'
            AND posts.posted = '1'

        ");

        $result = $req->fetchObject();
        return $result;

                                                }

// crée la fonction pour les commentaire 
               function comment($name,$email,$comment){

                global $db;

                $c = array(
                    'name'      => $name,
                    'email'     => $email,
                    'comment'   => $comment,
                    'post_id'   => $_GET["id"]
                );
                // la requête pour stocker le commentaire au bdd 
                $sql = "INSERT INTO comments(name,email,comment,post_id,date) VALUES(:name, :email, :comment, :post_id, NOW())";
                $req = $db->prepare($sql);
                $req->execute($c);
                                                    }

                                                    
//fonction pour afficher les commentaire 
                function get_comments(){

                global $db;
                //la requête pour les commentaire d'un seul article
                $req = $db->query("SELECT * FROM comments WHERE post_id = '{$_GET['id']}' ORDER BY date DESC");
                $results = [];
                while($rows = $req->fetchObject()){
                    $results[] = $rows;
                }

                return $results;

                                                }