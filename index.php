<!DOCTYPE html>
</body>

</html>
<html lang="Fr">

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
    <div class="background">
        <div class="img">
            <div class="slider">
                <img src="ASSETS/IMG/pexels-pixabay-261909.jpg" alt="" srcset="">
                <img src="ASSETS/IMG/pexels-polina-zimmerman-3747502.jpg" alt="" srcset="">
                <img src="ASSETS/IMG/pexels-pixabay-301920.jpg" alt="" srcset="">
                <img src="ASSETS/IMG/pexels-mikhail-nilov-7583935.jpg" alt="" srcset="">
                <img src="ASSETS/IMG/pexels-pixabay-159751.jpg" alt="" srcset="">
            </div>
        </div>
    </div>
    <!--navbar-->
    <nav class="navbar">

        <h1><span><img src="ASSETS/IMG/ezeetest-low-resolution-logo-color-on-transparent-background.png" alt="logo_Ezeetest" srcset=""></span></h1>
        <a class="btn_about" href="about.html">à propos</a>

    </nav>
    <!--centre de la page-->
    <div class="container">
        <div class="container-rigth">
            <div class="form-container">
                <form action="traitement_conn.php" method="post">
                    <h1>
                        <span>Connexion</span>
                    </h1>
                    <br>
                    <input class="champ_saisie" type="email" name="email" placeholder="Email : exmail@gmail" required>
                    <input class="champ_saisie" type="password" name="passwd" placeholder="Password" required>
                    <input class="boutton_soumettre" type="submit" name="ok" value="Aller">
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
                <p class="signup">Vous n'avez pas de compte ?<a href="inscription.php">inscription</a></p>
            </div>

        </div>
    </div>
    <!--script javascript <script src="ASSETS/JS/inscription.js"></script>-->

</body>

</html>
