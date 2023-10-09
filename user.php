<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est authentifié
if (!isset($_SESSION['email_or_username'])) {
    // Si l'utilisateur n'est pas authentifié, rediriger vers la page de connexion
    header("Location: login.php");
    exit();
}

// Connexion à la base de données
include "DATA/include/config_BD.php";

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Récupérer l'identifiant de l'utilisateur à partir de la session
$email_or_username = $_SESSION['email_or_username'];

// Récupérer les informations actuelles de l'utilisateur depuis la base de données
$sql = "SELECT * FROM USERS WHERE email='$email_or_username' OR nom_user='$email_or_username' OR passwd='$email_or_username' OR matricule='$email_or_username'" ;
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $nom_utilisateur_actuel = $row['nom_user'];
    $prenom_utilisateur_actuel = $row['prenom_user'];
    $email_actuel = $row['email'];
    $passwd_actuel=$row['passwd'];
    $matricule=$row['matricule'];
    $filliere=$row['filliere'];
} else {
    die("Informations de l'utilisateur non trouvées.");
}

// Traitement du formulaire de modification
if (isset($_POST['modifier'])) {
    // Récupérer les nouvelles valeurs du formulaire
    $nouveau_nom_utilisateur = htmlspecialchars($_POST['nouveau_nom_utilisateur']);
    $ancien_motdepasse = htmlspecialchars($_POST["ancien_motdepasse"]);
    $nouveau_mot_de_passe = htmlspecialchars($_POST['nouveau_mot_de_passe']);

    if ($ancien_motdepasse==$passwd_actuel){
            // Mettre à jour les informations de l'utilisateur dans la base de données
    $update_sql = "UPDATE USERS SET nom_user='$nouveau_nom_utilisateur', passwd='$nouveau_mot_de_passe' WHERE email='$email_actuel'";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Les informations ont été mises à jour avec succès.');</script>";
        // Vous pouvez également mettre à jour les valeurs dans la session si nécessaire
        $_SESSION['email_or_username'] = $nouveau_nom_utilisateur;
    } else {
        echo "Erreur lors de la mise à jour des informations : " . $conn->error;
    }
    }else{
        echo "<script>alert('Mot de passe ou information incorrect veillez reesayer');</script>";
    }

}

// Fermer la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <link rel="stylesheet" href="ASSETS/CSS/user.css">
    <style>
        body{
            font-family: 'Poppins Medium', sans-serif;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        header{
            margin-top: 60px;
        }
        header ul li{
            display: flex;
            align-items: center;

        }
        header ul li p{
            padding-left: 10px;
        }
        header ul li:nth-child(3) p {
            text-transform: uppercase;
        }

    </style>
</head>
<body>
    <?php include "DATA/include/navbar.php"; ?>


<h1>Profil</h1>
        <ul>
            <li><h2>Nom & prenom: </h2><p><p><?php echo $nom_utilisateur_actuel , $prenom_utilisateur_actuel; ?></p></li>
            <li><h2>Email: </h2><p><?php echo $email_actuel; ?></p></li>
            <li><h2>Filières: </h2><p><?php echo $filliere; ?></p></li>
            <li><h2>Maticule: </h2><p><?php echo $matricule; ?></p></li>
        </ul>
    <h2>Modifier les informations</h2>
    <form method="post" action="">


        <label for="nouveau_nom_utilisateur">Nouveau nom d'utilisateur :</label>
        <input type="text" name="nouveau_nom_utilisateur" id="nouveau_nom_utilisateur" required><br><br>

        <label for="ancien_motdepasse">mot de passe Actuel :</label>
        <input type="text" name="ancien_motdepasse" id="ancien_motdepasse" required><br><br>

        <label for="nouveau_mot_de_passe">Nouveau mot de passe :</label>
        <input type="password" name="nouveau_mot_de_passe" id="nouveau_mot_de_passe" required><br><br>

        <input type="submit" name="modifier" value="Modifier">
    </form>

    <br><a href="deconnexion.php">Se déconnecter</a>
</body>
</html>
