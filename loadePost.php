
    <?php
    include "DATA/include/config_BD.php";
    // Code pour récupérer et afficher les publications
    $postsQuery = "SELECT *  FROM POSTS , USERS WHERE POSTS.id_user = USERS.id_user ORDER BY POSTS.post_datetime DESC";

    $postsResult = $conn->query($postsQuery);
    echo "<div class='publication'>";
    if ($postsResult->num_rows > 0) {
        while ($row = $postsResult->fetch_assoc()) {
            $id_user = $row['id_user']; // ou $id_user = $row['USERS.id_user'];
            $nom_userPost = $row['nom_user'];
            $prenom_userPost = $row['prenom_user'];
            $post_text = $row['post_text'];
            $id_post = $row['id_post'];
            echo '<div id="card-pub" class="card-pub">';
            echo '<div class="container_post">';
            echo '<p class="persone_post">' . $nom_userPost . " " . $prenom_userPost . '</p>';
            echo '<h3 class="post">' . $post_text . '</h3>';
            echo '<hr>';
            echo '</div>';



            $commentsQuery = "SELECT * FROM COMMENTS ,USERS WHERE COMMENTS.id_post = " . $id_post . " AND COMMENTS.id_user = USERS.id_user";
            $commentsResult = $conn->query($commentsQuery);
            if ($commentsResult->num_rows > 0) {
                while ($row = $commentsResult->fetch_assoc()) {
                    $commentaire = $row['comment_text'];
                    $id_comment = $row["id_comment"];
                    $id_user = $row['id_user']; // ou $id_user = $row['USERS.id_user'];
                    $nom_userCom = $row['nom_user'];
                    $prenom_userCom = $row['prenom_user'];
                    echo '<div class="container_commentaire">';

                    echo '<p id="commentaire">' . $nom_userCom . " " . $prenom_userCom . " -----> " . $commentaire . '</p>';
                    echo '</div>';
                }

            }
            echo '<form action="traitement_pub.php" method="POST"        class="form_commentaire">';
            echo '<input type="hidden" name="post_id" value="' . $id_post . '">';
            echo '<textarea name="comment_text" placeholder="Répondre à cette publication" required></textarea>';
            echo '<button class="btn_repondre" type="submit" name="Reponse">Répondre</button>';
            echo '<div class="container-btnlike">';
            echo '<button class="like-button">J\'aime</button>';
            echo '<button class="follow-button">Suivre</button>';
            echo '</div>';
            echo '</form>';
            // Faites quelque chose avec les données extraites, par exemple, affichez-les
            //echo "ID Utilisateur: $id_user, Nom: $nom_userPost, Prénom: $prenom_userPost <br>";
    
            // Bouton "J'aime" et "Suivre"
            echo '</div>';
        }
    } else {
        echo "Aucun .";
    }
    echo "<div>";




    ?>