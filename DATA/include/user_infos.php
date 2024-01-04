<?php
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
        $id_user =  $row['id_user'];
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
$repertoireImages = "ASSETS/IMG/profil/bleu/";

// Construisez le chemin complet de l'image de profil
$cheminImageProfil = $repertoireImages . $premiereLettreNom . ".png";


?> 
