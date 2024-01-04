<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ASSETS/CSS/inscription.css">
    <link rel="icon" href="ASSETS/chart-graphique/ezeetest-website-favicon-color.png">

    <title>inscription | Ezeetest</title>
</head>

<body>
    <div class="loader">
    </div>
    <!--navbar-->
    <nav class="navbar">
        <h1><span><img src="ASSETS/IMG/ezeetest-low-resolution-logo-color-on-transparent-background.png"
                    alt="logo_Ezeetest" srcset=""></span></h1>
    </nav>
    <div class="container">
        <div class="container-left">
            <p class="title text-black">Accédez à des milliers de cours, exercices et épreuves d'examens passés en un
                seul clic ! Améliorez vos compétences et réussissez vos examens avec Ezeetest !!.</p>
            <a href="about.html" class="about_link"><img width="50" height="50"
                    src="https://img.icons8.com/pastel-glyph/50/information--v1.png" alt="information--v1" /></a>
        </div>
        <div class="container-rigth">
            <div class="form-container">
                <form action="" method="POST">
                    <h1>
                        <span class="title">Inscripton</span>
                    </h1>
                    <br>
                    <input class="champ_saisie" type="text" name="nom_user" placeholder="Votre nom ..." requiblack
                        requiblack>
                    <input class="champ_saisie" type="text" name="prenom_user" placeholder="Votre prenom ..." requiblack
                        requiblack>
                    <input class="champ_saisie" type="number" name="matricule" placeholder="numéro matricule">
                    <select class="champ_saisie" id="filliere" name="filliere" class="input_radius-12">
                        <option value="IA">IA</option>
                        <option value="GL">GL</option>
                        <option value="SI">SI</option>
                        <option value="SeIOT">SeIOT</option>
                    </select>
                    
                    <input  class="champ_saisie" type="email" name="email" placeholder="Email" requiblack required>
                    <input id="passwd" class="champ_saisie" type="password" name="passwd" placeholder="mots de passe" requiblack>
                    <input id="passwd" class="champ_saisie" type="password" name="confpasswd"
                    placeholder="Confirmer votre mots de passe" requiblack>
                    <input type="checkbox" onclick="afficherMotDePasse()"> 
                    <input class="boutton_soumettre bg-white text-black" type="submit" name="ok" value="inscription">
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
                        echo "<p style='padding:5px 10px; margin-buttom:10px; font-size: 15px; color:black; background-color: #ffffff; background-color:#FFFFFF;'>L'adresse e-mail ou identifient  déjà utilisée.</p>";
                        exit;
                    } else {
                        /*verification si le matricule contient au moins 8 chiffres*/
                        if (strlen($matricule) < 8) {
                            echo "<style>
    
                            </style>";
                            echo "<p style='padding:5px 10px; margin-buttom:10px; font-size: 15px; color:black; background-color: #ffffff; background-color:#FFFFFF;'>Matricule taille inferieur a 8.</p><br>";
                            exit;
                        }if (strlen($passwd) < 8) {
                                echo "<style>

                            </style>";
                                echo "<p style='padding:5px 10px; margin-buttom:10px; font-size: 15px; color:black; background-color: #ffffff; background-color:#FFFFFF;'>Le mot de passe doit comporter au moins 8 caractères.</p><br>";
                                exit;
                            }
                            // Vérification de la complexité du mot de passe (par exemple, au moins une lettre majuscule et un chiffre)
                            if (!preg_match('/[A-Z]/', $passwd) || !preg_match('/[0-9]/', $passwd)) {
                                echo "<style>

                                </style>";
                                echo "<p style='padding:5px 10px; margin-buttom:10px; font-size: 15px; color:black; background-color: #ffffff; background-color:#FFFFFF;'>Le mot de passe doit contenir au moins une lettre majuscule et un chiffre.</p><br>";
                                exit;
                            }
                            $filieres = array("ia", "gl", "si", "im", "seiot"); // Tableau des filières disponibles (en minuscules)
                
                            $filliere = strtolower($filliere); //mettre la filliere en miniscule
                
                            // Vérification si la filière indiquée est valide
                            if (!in_array($filliere, $filieres)) {
                                echo "<p style='padding:5px 10px; margin-buttom:10px; font-size: 15px; color:black; background-color: #ffffff; background-color:#FFFFFF;'>filliere invalide veillez entrer un filliere entre (ia gl si im seiot)</p>";
                                exit;
                            }

                        // Vérification de la longueur du mot de passe
                
                        require "traitement_ins.php";
                    }
                }
                ?>
                <p class="text">vous êtes dejà inscrit ?<a href="index.php" class="text-white">connexion</a></p>
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

</body>

</html>