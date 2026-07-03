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

if (isset($_POST["envoyer_mail"])) {
    $name = $_POST["name_contact"];
    $email = $_POST["email_contact"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Serveur SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'YOUR_EMAIL@example.com'; // Votre adresse e-mail
    $mail->Password = getenv('MAIL_PASSWORD') ?: 'YOUR_MAIL_APP_PASSWORD'; // Votre mot de passe e-mail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;;
    $mail->Port = 587;

    try {
        $mail->setFrom($email, $name);
        $mail->addAddress('YOUR_EMAIL@example.com', 'Ezeetest');
        $mail->Subject = 'Nouveau message de ' . $name;
        $mail->Body = $message;

        $mail->send();
        echo "<script>alert('Commentaire envoyé avec succès')
                    setTimeout(function(){
                        window.location.href= 'acceuil.php';
                    }, 500);
                    </script>";
     } catch (Exception $e) {
        echo "<script>alert('Erreur lors de l'envoi de votre message : {$mail->ErrorInfo}')
        setTimeout(function(){
            window.location.href= 'acceuil.php';
        }, 500);
        </script>";
        
    }
}
?>

