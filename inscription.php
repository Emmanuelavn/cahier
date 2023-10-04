<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ASSETS/CSS/inscription.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="ASSETS/chart-graphique/ezeetest-website-favicon-color.png">
    <title>inscription | Ezeetest</title>
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
        <h1><span><img src="ASSETS/IMG/ezeetest-low-resolution-logo-color-on-transparent-background.png"
                    alt="logo_Ezeetest" srcset=""></span></h1>
        <a class="btn_about" href="about.html">à propos</a>
    </nav>
    <div class="container">
        <div class="container-rigth">
            <div class="form-container">
                <form action="" method="POST">
                    <h1>
                        <span>Inscripton</span>
                    </h1>
                    <br>
                    <input class="champ_saisie" type="text" name="nom_user" placeholder="Votre nom ..." requiblack>
                    <input class="champ_saisie" type="text" name="prenom_user" placeholder="Votre prenom ..." requiblack>
                    <input class="champ_saisie" type="number" name="matricule" placeholder="numéro matricule">
                    <input class="champ_saisie" type="text" name="filliere" placeholder="votre filliere IA/GL/SI/SeIOT/"
                        requiblack>
                    <input class="champ_saisie" type="email" name="email" placeholder="Email" requiblack>
                    <input class="champ_saisie" type="password" name="passwd" placeholder="mots de passe" requiblack>
                    <input class="champ_saisie" type="password" name="confpasswd"
                        placeholder="Confirmer votre mots de passe" requiblack>
                    <input class="boutton_soumettre" type="submit" name="ok" value="inscription">
                    <br>
                </form>
                <?php
                if (isset($_POST["ok"])) {
                    //enregistrement des infos entrer dans le formulaire
                    $nom_user = $_POST['nom_user'];
                    $prenom_user = $_POST['prenom_user'];
                    $matricule = $_POST['matricule'];
                    $filliere = $_POST['filliere'];
                    $email = $_POST['email'];
                    $passwd = $_POST['passwd'];
                    $confirm = $_POST['confpasswd']; // Obtient la date et l'heure actuelles au format DATETIME
                    $date_inscription = date("Y-m-d H:i:s");
                    include "DATA/include/config_BD.php";
                    
                        // Vérification de l'unicité de l'email dans la base de données
                        $sql_check_infos = "SELECT * FROM USERS WHERE email='$email' OR  (nom_user = '$nom_user' AND prenom_user= '$prenom_user') OR passwd='$passwd'";
                        $result_check_infos = $conn->query($sql_check_infos);

                        if ($result_check_infos->num_rows > 0) {
                            echo "<style>
                              
                            </style>";
                            echo "<p style='padding:5px 10px; font-size: 15px; color:black; background-color: #ffffff; background: blur(7); font-weight: bold;'>L'adresse e-mail et les informations sont déjà utilisée.<br> Veuillez choisir une autre adresse e-mail et d'autre information.</p>";

                        }else{
                             // Vérification de la longueur du mot de passe
                        if (strlen($passwd) < 8) {
                            echo "<style>
                                
                        </style>";
                            echo "<p style=' font-size: 15px;color:black; background-color: #ffffff88; background: blur(7);'>Le mot de passe doit comporter au moins 8 caractères.</p><br>";

                        }
                        // Vérification de la complexité du mot de passe (par exemple, au moins une lettre majuscule et un chiffre)
                        if (!preg_match('/[A-Z]/', $passwd) || !preg_match('/[0-9]/', $passwd)) {
                            echo "<style>
                            
                            </style>";
                            echo "<p style=' font-size: 15px;color:black; background-color: #ffffff88; background: blur(7);'>Le mot de passe doit contenir au moins une lettre majuscule et un chiffre.</p><br>";

                        }
                        $filieres = array("ia", "gl", "si", "im", "seiot"); // Tableau des filières disponibles (en minuscules)
                
                        $filliere = strtolower($filliere); //mettre la filliere en miniscule 
                
                        // Vérification si la filière indiquée est valide
                        if (!in_array($filliere, $filieres)) {
                            echo 'filliere invalide veillez entrer un filliere entre ("ia", "gl", "si", "im", "seiot")';
                        }
                        require "traitement_ins.php";
                        }
                       
                    } 
                ?>
                <p>vous êtes dejà inscrit ?<a href="index.php">connexion</a></p>
            </div>
        </div>
    </div>
</body>

</html>