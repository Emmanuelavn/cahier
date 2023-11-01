<!DOCTYPE html>
<html lang="fr">

<head>
<?php
    // Démarrer la session
    session_start();
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
        $nom_utilisateur = strtoupper($row['nom_user']);
        $prenom_utilisateur = $row['prenom_user'];
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

    // Fermer la connexion à la base de données
    $conn->close();
    ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ezeetest | GPT-3 Chat</title>
  <link rel="stylesheet" href="ASSETS/CSS/ia.css">
</head>

<body>
  <nav class="navbar">
            <h1><img class="logo" src="ASSETS/chart-graphique/ezeetest-low-resolution-logo-white-on-transparent-background.png" alt="logo-Ezeetest" srcset=""></h1>
            <ul class="link_container">
                <li class="link"><a href="user.php"><img class="img_rond img-profil" src="<?php echo $cheminImageProfil; ?>" alt="image de profil" srcset=""></a></li>
                <li class="link"><a href="deconnexion.php">deconnexion</a></li>
                <li class="link"><a href="about.html">a propos</a></li>
                <li class="link"><a href="acceuil.php">Acceuil</a></li>
            </ul>
    </nav>
  <div id="app">
    <div id="sidebar">
      <h3>Contexte</h3>
      <textarea id="contextInput" rows="10" cols="30">Tu es un super informaticient .Ton but est d'aider des etuiants en informatique a atteindre leurs objectif .tu connait tout les langage de programation et tu peut les enseigners 
</textarea>
    </div>
    <div id="chat">
      <div id="messages"></div>
      <input type="text" id="userInput" placeholder="Tapez votre message ici...">
    </div>
  </div>
  <script src="ASSETS/JS/ia.js"></script>
</body>

</html>