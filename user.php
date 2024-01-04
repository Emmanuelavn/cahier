<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est authentifié
if (!isset($_SESSION['email_or_username'])) {
  // Si l'utilisateur n'est pas authentifié, rediriger vers la page de connexion
  header("Location login.php");
  exit();
}

// Connexion à la base de données
include "DATA/include/config_BD.php";

if ($conn->connect_error) {
  die("La connexion à la base de données a échoué  " . $conn->connect_error);
}

// Récupérer l'identifiant de l'utilisateur à partir de la session
$email_or_username = $_SESSION['email_or_username'];

// Récupérer les informations actuelles de l'utilisateur depuis la base de données
$sql = "SELECT * FROM USERS WHERE email='$email_or_username' OR nom_user='$email_or_username' OR passwd='$email_or_username' OR matricule='$email_or_username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  $id_user = $row['id_user'];
  $nom_utilisateur_actuel = $row['nom_user'];
  $prenom_utilisateur_actuel = $row['prenom_user'];
  $email_actuel = $row['email'];
  $passwd_actuel = $row['passwd'];
  $matricule = $row['matricule'];
  $filliere = $row['filliere'];
} else {
  die("Informations de l'utilisateur non trouvées.");
}
// Traitement du formulaire de modification
if (isset($_POST['modifier'])) {
  // Récupérer les nouvelles valeurs du formulaire
  $nouveau_nom_utilisateur = htmlspecialchars($_POST['nouveau_nom_utilisateur']);
  $ancien_motdepasse = htmlspecialchars($_POST["ancien_motdepasse"]);
  $nouveau_mot_de_passe = htmlspecialchars($_POST['nouveau_mot_de_passe']);

  if ($ancien_motdepasse == $passwd_actuel) {
    // Mettre à jour les informations de l'utilisateur dans la base de données
    $update_sql = "UPDATE USERS SET nom_user='$nouveau_nom_utilisateur', passwd='$nouveau_mot_de_passe' WHERE email='$email_actuel'";

    if ($conn->query($update_sql) === TRUE) {
      echo "<script>alert('Les informations ont été mises à jour avec succès.');</script>";
      // Vous pouvez également mettre à jour les valeurs dans la session si nécessaire
      $_SESSION['email_or_username'] = $nouveau_nom_utilisateur;
    } else {
      echo "Erreur lors de la mise à jour des informations  " . $conn->error;
    }
  } else {
    echo "<script>alert('Mot de passe ou information incorrect veillez reesayer');</script>";
  }

}
// Obtenez la première lettre du nom de l'utilisateur (par exemple, 'Smith' devient 'S')

$premiereLettreNom = strtoupper(substr($nom_utilisateur_actuel, 0, 1));

// Définissez le répertoire où se trouvent les images de profil
$repertoireImages = "ASSETS/IMG/profil/bleu/";

// Construisez le chemin complet de l'image de profil
$cheminImageProfil = $repertoireImages . $premiereLettreNom . ".png";

  
// Fermer la connexion à la base de données
$conn->close();

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="ASSETS/CSS/user.css">
  <link rel="icon" href="ASSETS/chart-graphique/ezeetest-website-favicon-color.png">
  <title>Profil || Ezeetest</title>
</head>

<body id="body">
    <nav class="navbar">
      <h1><img class="logo" src="ASSETS/chart-graphique/ezeetest-website-favicon-color.png" alt="logo-Ezeetest"
          srcset=""><span>Profil</span></h1>
      <ul class="link_container">
        <img class="logo mobile-afichage" src="ASSETS/chart-graphique/ezeetest-website-favicon-color.png" alt="" srcset="">
        <li class="link"><a href="deconnexion.php">deconnexion</a></li>
        <li class="link"><a href="about.html">a propos</a></li>
        <li class="link"><a href="acceuil.php">acceuil</a></li>
      </ul>
      <img  class="img_rond img-profil" src="<?php echo $cheminImageProfil; ?>" alt="Image de profil">
      <div class="menu-burgeur mobile-afichage">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </nav>
    <div class="affichage-about bg-main">
        <div class="column flex items-center gap-x-3">
          <img class="profile-header img_rond size100" src="<?php echo $cheminImageProfil; ?>" alt="image de profil" srcset="">
          <p class="nomUser font-bold">
            <?php echo $nom_utilisateur_actuel, "  ", $prenom_utilisateur_actuel; ?>
          </p>
        </div>
        <br>
        
    </div>
  <div class="container">
    <div class="affichage">

    
      <ul class="infosUser bg-white">
        <li class="infos">
          <h2>Nom & prenom </h2>
          
          <p>
            <?php echo $nom_utilisateur_actuel, "  ", $prenom_utilisateur_actuel; ?>
          </p>
        </li>
        <li class="infos">
          <h2>Email </h2>
          <p>
            <?php echo $email_actuel; ?>
          </p>
        </li>
        <li class="infos">
          <h2>Filières </h2>
          <p>
            <?php echo $filliere; ?>
          </p>
        </li>
        <li class="infos">
          <h2>Maticule </h2>
          <p>
            <?php echo $matricule; ?>
          </p>
        </li>
      </ul>
      
     </div>
    <h2>Modifier les informations</h2>
    
    <form method="post" action="">


      <label for="nouveau_nom_utilisateur">Nouveau nom d'utilisateur </label>
      <input type="text" name="nouveau_nom_utilisateur" id="nouveau_nom_utilisateur" required><br><br>

      <label for="ancien_motdepasse">mot de passe Actuel </label>
      <input type="text" name="ancien_motdepasse" id="ancien_motdepasse" required><br><br>

      <label for="nouveau_mot_de_passe">Nouveau mot de passe </label>
      <input type="password" name="nouveau_mot_de_passe" id="nouveau_mot_de_passe" required><br><br>

      <input type="submit" name="modifier" value="Modifier">
    </form>

    <br><a href="deconnexion.php">Se déconnecter</a>
  </div>



  <footer id="footer">
    <img class="logo logo_footer" src="ASSETS/chart-graphique/ezeetest-website-favicon-white.png" alt="logo" srcset="">
    <p><span class="text">LKAV Technologie</span><a href="#" target="_blank" rel="noopener noreferrer">contacter
        Equipe</a><br></p>
    <p><span>🇧🇯 Bj Atlantique|Atrokpocodji</span><span>Email YOUR_EMAIL@example.com</span></p>
  </footer>
  <script src="ASSETS/JS/user.js"></script>
</body>

</html>