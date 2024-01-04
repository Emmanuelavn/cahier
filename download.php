<?php
    session_start();

    include "DATA/include/config_BD.php";

// Récupérer les variables depuis l'URL
if (isset($_GET['id']) && isset($_GET['table'])) {
    $id = (int)$_GET['id'];
    $nom_table = $_GET['table'];
    $categorie = $_GET['categorie'];

    // Requête SQL pour récupérer les données en fonction de la catégorie
    $sql = "SELECT chemin_fichier FROM $nom_table WHERE id_doc='$id'";

    $result = $conn->query($sql);

    if ($result) {
        $num_rows = $result->num_rows;
        if ($num_rows > 0) {
            $row = $result->fetch_assoc();
            // Utilisez $row pour accéder aux données récupérées
            $chemin_fichier = $row['chemin_fichier'];
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename = "' . basename($chemin_fichier) . '"');
            header('Content-Length: ' . filesize("ASSETS/document/$nom_table/$categorie/".$chemin_fichier));
            ob_clean();
            readfile("ASSETS/document/$nom_table/$categorie/".$chemin_fichier);
            exit;
        
        } else {
            echo "Fichier pas disponible";
        }
    } else {
        echo "Erreur lors de l'exécution de la requête : " . $conn->error;
    }
} else {
    echo "ID du document ou nom de table non spécifié";
}

// Fermer la connexion à la base de données
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download</title>
</head>

<body>

</body>

</html>
