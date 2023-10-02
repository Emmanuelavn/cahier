<!DOCTYPE html>
</body>

</html>
<html lang="Fr">

<head>
    <meta charset="UTF-8">
    <meta e-width, initial-scale="1.0">
    <link rel="icon" href="ASSETS/chart-graphique/ezeetest-website-favicon-color.png">
    <link rel="stylesheet" href="ASSETS/CSS/inscription.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <title>inscription | Ezeetest</title>
</head>

<body>
    <div class="background">
        <div class="slider_container">
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
        <div class="container-left">
            <div class="form-container">
                <form action="traitement_ins.php" method="POST">
                    <h1>
                        <span>Inscripton</span>
                    </h1>
                    <br>
                    <input class="champ_saisie" type="text" name="nom_user" placeholder="nom d'utllisateur" required>
                    <input class="champ_saisie" type="number" name="matricule" placeholder="numéro matricule">
                    <input class="champ_saisie" type="text" name="filliere" placeholder="votre filliere IA/GL/SI/SeIOT/" required>
                    <input class="champ_saisie" type="email" name="email" placeholder="Email" required>
                    <input class="champ_saisie" type="password" name="passwd" placeholder="mots de passe" required>
                    <input class="champ_saisie" type="password" name="confpasswd"
                        placeholder="Confirmer votre mots de passe" required>
                    <input class="boutton_soumettre" type="submit" name="ok" value="inscription">
                    <br>
                </form>
                <p>vous êtes dejà inscrit ?<button id="connexion">connexion</button></p>
            </div>
        </div>


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
                <p class="signup">Vous n'avez pas de compte ?<button  id="inscription">inscription</button></p>
            </div>

        </div>
    </div>
<!--script javascript-->
    <script src="ASSETS/JS/inscription.js"></script>
</body>

</html>