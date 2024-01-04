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

<body id="body">
    <button class="actualiser" onclick="actualiserPage()">&#x27B2;</button>


    <div class="container-FILE">
        <div class="user_aff">
            <?php
            // Récupérez les noms des utilisateurs
            $query = "SELECT nom_user , prenom_user FROM USERS";
            $result = $conn->query($query);

            // Vérifiez si la requête a réussi
            if ($result) {
                // Comptez le nombre d'utilisateurs
                $nombreUtilisateurs = $result->num_rows;

                // Affichez les noms des utilisateurs
                if ($nombreUtilisateurs > 0) {
                    echo "<p>Nombre total d'utilisateurs : $nombreUtilisateurs</p>";
                    echo "<ul>";
                    while ($row = $result->fetch_assoc()) {
                        $nomUtilisateur = $row['nom_user'];
                        $prenomUtilisateur = $row['prenom_user'];
                        echo "<li>$nomUtilisateur.' '.$prenomUtilisateur</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "Aucun utilisateur trouvé.";
                }
            } else {
                echo "Erreur dans la requête : " . $conn->error;
            }


            ?>

        </div>
        <div class="publication-container" id="pub">
            <h1>Communauté Ezeetest</h1>
            <br>
            <div id="commentaire">
             
            </div>
        </div>
    </div>

    <div class="container_pubForm">
        <h1>Bienvenue
            <?php echo "" . $prenom_utilisateur; ?>! Dans la communauté

        </h1>
        <form action="traitement_pub.php" method="POST" id="post-form">

            <textarea class="input input_radius-12" id="post-text" name="post-text" rows="4" cols="50"
                placeholder="Envoyer vos préocupation..." required></textarea>
            <br>
            <button class="submitPost" name="publier" type="submit">
                <div class="svg-wrapper-1">
                    <div class="svg-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path fill="currentColor"
                                d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z">
                            </path>
                        </svg>
                    </div>
                </div>
                <span>Send</span>
            </button>
            <br>
        </form>
    </div>
    </div>

    <?php
    // Fermez la connexion
    $conn->close();
    ?>
    <script src="ASSETS/JS/publication.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>

</html>