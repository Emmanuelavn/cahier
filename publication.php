<!DOCTYPE html>
<html>

<head>
    <?php
    // Démarrer la session
    session_start();

    include "DATA/include/navbar.php";
    // Vérifier si l'utilisateur est authentifié
    if (!isset($_SESSION['email_or_username'])) {
        // Si l'utilisateur n'est pas authentifié, rediriger vers la page de connexion
        header("Location: index.php");
        exit();
    }

    // Récupérer les informations de l'utilisateur à partir de la session
    $email_or_username = $_SESSION['email_or_username'];

    // Vous pouvez maintenant utiliser $email_or_username pour récupérer les autres informations de l'utilisateur à partir de la base de données
// Connexion à la base de données
    include "DATA/include/config_BD.php";

    // Requête SQL  pour récupérer les informations de l'utilisateur
    $sql = "SELECT * FROM USERS WHERE email='$email_or_username' OR nom_user='$email_or_username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $id_user = $row['id_user'];
        $nom_utilisateur = strtoupper($row['nom_user']);
        $prenom_utilisateur = $row['prenom_user'];
        $matricule = $row['matricule'];
        $filliere = $row['filliere'];
        $email = $row['email'];
    } else {
        die("Informations de l'utilisateur non trouvées.");
    }


    // Obtenez la première lettre du nom de l'utilisateur (par exemple, 'Smith' devient 'S')
    
    $premiereLettreNom = strtoupper(substr($nom_utilisateur, 0, 1));

    // Définissez le répertoire où se trouvent les images de profil
    $repertoireImages = "ASSETS/IMG/profil/blanc/";

    // Construisez le chemin complet de l'image de profil
    $cheminImageProfil = $repertoireImages . $premiereLettreNom . ".png";

    ?>

    <title>Formulaire de Publication</title>
    <link rel="stylesheet" href="ASSETS/CSS/publication.css">
</head>

<body>
   
    <div class="body">
    <div class="conteneur-horizontal" id="tableaux">
        <h1>Flux</h1>
            <!-- Contenu horizontal ici -->
            <div class="contenu-horizontal">
                <!-- Contenu horizontal ici -->
                <?php
                // Code pour récupérer et afficher les publications
                $postsQuery = "SELECT * FROM POSTS";
                $postsResult = $conn->query($postsQuery);
            
                while ($post = $postsResult->fetch_assoc()) {
                    echo '<div class="post">';
                        echo '<div class="container_post">';
                            echo '<p>'. $post['post_text'] . '</p>';

                         // Afficher les commentaires de cette publication
                            $commentsQuery = "SELECT * FROM COMMENTS WHERE post_id = " . $post['id_post'];
                            $commentsResult = $conn->query($commentsQuery);

                         // Formulaire de réponse à la publication
                            echo '<form action="traitement_pub.php" method="POST" class="form_commentaire">';
                            echo '<input type="hidden" name="post_id" value=""' . $post['id_post'] . '">';
                            echo '<textarea name="comment_text" placeholder="Répondre à cette publication" required></textarea>';
                            echo '<button class="btn_repondre" type="submit" name="Reponse">Répondre</button>';
                            
                            echo '</form>';

                         // Bouton "J'aime" et "Suivre"
                            echo '<div class="container-btnlike">';
                                echo '<button class="like-button">J\'aime</button>';
                                echo '<button class="follow-button">Suivre</button>';
                            echo '</div>';
                            echo '<div class="comments">';
                            while ($comment = $commentsResult->fetch_assoc()) {
                                echo '<p>' . $comment['comment_text'] . '</p>';
                            }
                            echo '</div>'; 
                        echo '</div>';
                    echo '</div>';
                }

                ?>
         </div>
            </div>
        <div class="container_form">
            <form action="traitement_pub.php" method="POST" id="post-form">
                <label for="post-text">Exprimez-vous Poser vos preocupation
                    <?php echo "" . $prenom_utilisateur; ?> :
                </label>
                <br>
                <textarea id="post-text" name="post-text" rows="4" cols="50"
                    placeholder="Écrivez votre message ici" required></textarea>
                <br>
                <button type="submit">Publier</button>
            </form>
        </div>
    </div>
    

</body>

</html>