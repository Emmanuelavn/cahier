<?php
// Démarrer la session
session_start();

// Détruire la session
session_destroy();

// Rediriger vers la page de connexion ou une autre page appropriée
header("Location: index.php"); // Remplacez "login.php" par l'URL de la page de connexion
exit();
?>
