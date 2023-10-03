<?php
if (isset($_POST["ok"])) {
    // Récupération des données du formulaire
    $email_or_username = $_POST['email']; // Peut être un e-mail ou un nom d'utilisateur
    $password = $_POST['passwd'];
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "ezeetest";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Vérification de l'utilisateur dans la base de données
    $sql = "SELECT * FROM USERS WHERE (email='$email_or_username' OR nom_user='$email_or_username') AND passwd='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Authentification réussie, rediriger l'utilisateur vers une page sécurisée
        session_start();
        $_SESSION['email_or_username'] = $email_or_username; // Stockez des informations d'authentification dans la session
        header("Location: acceuil.php"); // Rediriger vers la page sécurisée
        exit();
    } else {
        include "index.php";
    }

    $conn->close();
}
?>