<!---traitement d'inscription et code de comfirmation-->


<!---traitement code de comfirmation-->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- demarrer la session -->
    <?php
    session_start();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Confimation | inscription</title>
</head>
<!---style de la page-->
<style>
    body {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
</style>

<body>
    <!--inclure la navbar php -->
    <nav>
        <?php include 'DATA/include/navbar.php'; ?>
    </nav>

    <h2>Vérification du code de confirmation</h2>
    <!--ajouter un formulaire pour vérifier le code de confirmaiton-->
    <form action="" method="post">
        <label for="code_confirmation">Entrez le code de confirmation à 6 chiffres :</label>
        <input type="text" id="code_confirmation" name="code_confirmation" maxlength="6" required>
        <button type="submit">Vérifier</button>
    </form>
    <!--script boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <?php

    if (isset($_POST['code_confirmation'])) {
        $code_utilisateur = $_POST['code_confirmation'];

        if ($code_utilisateur == $_SESSION['code_confirmation']) {
            echo '<script>alert("Email vérifié ! Code de confirmation valide.")
            setTimeout(function() {
                window.location.href = "index.php"; 
            }, 2000);
            
            </script>';
            // header("Location: index.php");
            //exit()
            // Vous pouvez marquer l'email comme vérifié dans la base de données ici
    
        } else {
            echo "Code de confirmation invalide.<a href='#' alt='réesayé cnfirmation'> Veuillez réessayer.</a>";
        }
    }
    ?>
</body>

</html>



<!---traitement  d'inscription-->
<?php

//importation des module pour l'envoie des email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'DATA/module/vendor/phpmailer/phpmailer/src/Exception.php';
require 'DATA/module/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'DATA/module/vendor/phpmailer/phpmailer/src/SMTP.php';

//Load Composer's autoloader
require 'DATA/module/vendor/autoload.php';


//si on soummet le formulaire d'inscription
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

    // Vérifiez que le mot de passe correspond à la confirmation
    if ($passwd == $confirm) {
        // Vérifiez que les variables ne sont pas vides et que Matricule est alphanumérique
        if (!empty($nom_user) && !empty($matricule) && ctype_alnum($matricule)) {

            // Connexion à la base de données (assurez-vous que vous avez correctement défini vos paramètres de connexion)
            include "DATA/include/config_BD.php";

            // Échappez les données pour éviter les injections SQL
            $nom_user = mysqli_real_escape_string($conn, $nom_user);
            $prenom_user = mysqli_real_escape_string($conn, $prenom_user);
            $matricule = mysqli_real_escape_string($conn, $matricule);
            $email = mysqli_real_escape_string($conn, $email);
            $filliere = mysqli_real_escape_string($conn, $filliere);
            $passwd = mysqli_real_escape_string($conn, $passwd);

            // Hashage du mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Créez et exécutez la requête SQL pour insérer les données dans la table utilisateur
            $sql = "INSERT INTO USERS (nom_user,prenom_user,matricule,filliere,email,passwd,date_inscription) VALUES ('$nom_user','$prenom_user', '$matricule','$filliere', '$email', '$passwd','$date_inscription')";
            echo '<script>alert("Information valide ! Confirmer votre email")</script>';
            if (mysqli_query($conn, $sql)) {

                // Générer un code de confirmation de 6 chiffres
                $code_confirmation = rand(100000, 999999);

                // Stocker le code de confirmation dans une variable de session

                $_SESSION['code_confirmation'] = $code_confirmation;

                // Configurer PHPMailer pour l'envoi d'email
                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; // Remplacez par le serveur SMTP de votre fournisseur de messagerie
                    $mail->SMTPAuth = true;
                    $mail->Username = 'YOUR_EMAIL@example.com'; // Remplacez par votre adresse email
                    $mail->Password = 'kwih bwsw vnhs xzdv'; // Remplacez par votre mot de passe
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    $mail->setFrom('YOUR_EMAIL@example.com', 'ezeetest');
                    $mail->addAddress($email, $nom_user);

                    $mail->isHTML(true);
                    $mail->Subject = 'Code de confirmation';
                    $mail->Body = "Sujet : Code de confirmation
                            <br>
                            Cher(e) <strong> $nom_user </strong>,
                            <br>
                            Merci de vous être inscrit à EZEETEST.<br> Pour confirmer votre adresse e-mail et activer votre compte, veuillez saisir le code de confirmation ci-dessous dans la page d'activation de compte :
                            <br>
                            Votre Code de confirmation :<h1> $code_confirmation </h1>
                            
                            Assurez-vous de ne pas partager ce code avec d'autres personnes, car il est utilisé pour vérifier votre identité.
                            <br>
                            Si vous n'avez pas effectué cette inscription, veuillez ignorer cet e-mail. Si vous avez des questions ou des préoccupations, n'hésitez pas à nous contacter à YOUR_EMAIL@example.com.
                            <br>
                            Cordialement,
                            <br>
                            L'équipe de LKAV technologie";

                    $mail->send();
                    echo 'Email envoyé avec succès';

                } catch (Exception $e) {
                    echo 'Erreur lors de l\'envoi de l\'email : ' . $mail->ErrorInfo . '<a style="color:blue;" href="index.php">réesayer</a>';
                }

            } else {
                echo "Erreur lors de l'enregistrement: " . mysqli_error($conn) . "<a style='color:blue;' href='index.php'>réesayer</a>";
            }

            // Fermez la connexion à la base de données
            mysqli_close($conn);

        } else {
            echo "<style>
                     form{
                        display: none;
                     }
                    </style>";
            echo "Veuillez remplir correctement tous les champs.<a style='color:blue;' href='index.php'>réesayer</a>";
        }

    } else {
        echo "<style>
                     form{
                        display: none;
                     }
                    </style>";
        echo "Les mots de passe ne correspondent pas.<a style='color:blue;' href='index.php'>réesayer</a>";
    }
}


?>