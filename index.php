<!DOCTYPE html>
</body>

</html>
<html lang="Fr">
<?php 
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est authentifié
if (isset($_SESSION['email_or_username'])) {
    // Si l'utilisateur n'est pas authentifié, rediriger vers la page de connexion
    header("Location: acceuil.php");
    exit();
}
?>
<head>
    <meta charset="UTF-8">
    <meta e-width, initial-scale="1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="ASSETS/CSS/connexion.css">
    <link rel="icon" href="ASSETS/chart-graphique/ezeetest-website-favicon-color.png">
    <title>connexion | Ezeetest</title>
</head>

<body>
    <div class="loader">
        
    </div>
    <!--navbar-->
    <nav class="navbar">
        <h1><span><img src="ASSETS/IMG/ezeetest-low-resolution-logo-color-on-transparent-background.png" alt="logo_Ezeetest" srcset=""></span></h1>
    </nav>
    
    <!--centre de la page-->
    <div class="container">
        <div class="container-left bg-white">
            <p class="title text-black">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore velit, dolores similique aliquam.</p>
           <a href="about.html" class="about_link"><img width="50" height="50" src="https://img.icons8.com/pastel-glyph/50/information--v1.png" alt="information--v1"/></a>
        </div>
        <div class="container-rigth bg-main">
            <div class="form-container">
                <form action="traitement_conn.php" method="post">
                    <h1>
                        <span class="title">Connexion</span>
                    </h1>
                    <br>
                    <input class="champ_saisie" type="email" name="email" placeholder="Email : exmail@gmail" required>
                    <input class="champ_saisie" type="password" name="passwd" placeholder="Password" required>
                    <input class="boutton_soumettre bg-white text-black" type="submit" name="ok" value="OK">
                    <br>
                </form>
                <?php if (isset($_POST["ok"])) {
                    // Récupération des données du formulaire
                    $email_or_username = $_POST['email']; // Peut être un e-mail ou un nom d'utilisateur
                    $password = $_POST['passwd'];
                    include "DATA/include/config_BD.php";
                    // Vérification de l'utilisateur dans la base de données
                    $sql = "SELECT * FROM USERS WHERE (email='$email_or_username' OR nom_user='$email_or_username') AND passwd='$password'";
                    $result = $conn->query($sql);

                    if (!$result->num_rows == 1) {
                        // Authentification échouée, afficher un message d'erreur
                        echo "<span style=' padding:0px 10px; font-weigh:bold; font-size: 35px; color:red; background-color:#FFFFFF;'> Adresse e-mail, nom d'utilisateur ou mot de passe incorrect.</span>";
                    }
                }
                ?>
                <p class="text">Vous n'avez pas de compte ?<a href="inscription.php" class="text-white">inscription</a></p>
            </div>

        </div>
    </div>
    <!--script javascript <script src="ASSETS/JS/inscription.js"></script>-->

</body>

</html>
