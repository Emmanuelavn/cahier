<!---traitement d'inscription et code de comfirmation-->

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

    $nom_user=strtoupper($nom_user);//upercase le nom

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
                session_start();
                $_SESSION['code_confirmation'] = $code_confirmation;

                // Configurer PHPMailer pour l'envoi d'email
                $mail = new PHPMailer(true);
                
                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; // Remplacez par le serveur SMTP de votre fournisseur de messagerie
                    $mail->SMTPAuth = true;
                    $mail->Username = 'YOUR_EMAIL@example.com'; // Remplacez par votre adresse email
                    $mail->Password = 'YOUR_MAIL_APP_PASSWORD'; // Remplacez par votre mot de passe
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
                            L'équipe de LKAV Society";

                    $mail->send();
                
                    echo "<script>alert('Email envoyé avec succès')
                    setTimeout(function(){
                        window.location.href= 'verifier_code.php';
                    }, 500);
                    </script>";

                } catch (Exception $e) {
                    echo 'Erreur lors de l\'envoi de l\'email : ' . $mail->ErrorInfo . '<a style="color:blue;" href="index.php">réesayer</a>';
                }

            } else {
                echo "Erreur lors de l'enregistrement: " . mysqli_error($conn) . "<a style='color:blue;' href='index.php'>réesayer</a>";
            }

            // Fermez la connexion à la base de données
            mysqli_close($conn);

        } else {
            
            echo "Veuillez remplir correctement tous les champs.<a style='color:blue;' href='index.php'>réesayer</a>";
        }

    } else {
        
        echo "<p style='padding:5px 10px; margin-buttom:10px; font-size: 15px; color:black; background-color: #ffffff; background-color:#FFFFFF;'>Les mots de passe ne correspondent pas.<a style='color:blue;' href='index.php'>réesayer</a></p>";
    }
}


?>
