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
                    <input id="passwd" class="champ_saisie" type="password" name="passwd" placeholder="Password" required>

                    <img class="affmp"  src="https://img.icons8.com/emoji/48/eye-in-speech-bubble.png" alt="eye-in-speech-bubble" onclick="afficherMotDePasse()"/>

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
                        echo "<p style='padding:5px 10px; margin-buttom:10px; font-size: 15px; color:black; background-color: #ffffff; background-color:#FFFFFF;'> Adresse e-mail ou Identifient  incorrect.</p>";
                    }
                }
                ?>
                <br>
                <br>
                <p class="text">Vous n'avez pas de compte ?<a href="inscription.php" class="text-white">inscription</a></p>
            </div>

        </div>
    </div>
    <script>

        function afficherMotDePasse() {
            var x = document.getElementById("passwd");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <!--script javascript <script src="ASSETS/JS/inscription.js"></script>-->

</body>

</html>
