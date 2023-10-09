<!DOCTYPE html>
<html>

<head>
    <title>Formulaire d'insertion de fichiers PDF dans la base de donner</title>
</head>

<body>
    <?php
    // Traitement du formulaire lors de la soumission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom_table = $_POST["nom_table"]; // Récupérer la valeur du <select> dans le formulaire

        $semestre = $_POST["semestre"];
        $filliere = $_POST["filliere"];
        $nom_ue = $_POST["nom_ue"];
        $nom_ec = $_POST["nom_ec"];
        $nom_fichier = $_POST["nom_fichier"];
        $categorie_fichier = $_POST["categorie_fichier"];
        $description_fichier = $_POST["description_fichier"];
        $annee_fichier = $_POST["annee_fichier"];
        $chemin_fichier = $_POST["fichier"];

        // Connexion à la base de données MySQL
        $mysqli = new mysqli("localhost", "root", "", "ezeetest");

        // Vérification de la connexion
        if ($mysqli->connect_error) {
            die("Erreur de connexion à la base de données : " . $mysqli->connect_error);
        }

        // Insertion du fichier dans la base de données
        $stmt = $mysqli->prepare("INSERT INTO $nom_table (semestre, filliere, nom_ue, nom_ec, nom_fichier, categorie_fichier, description_fichier, année_fichier, chemin_fichier) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $semestre, $filliere, $nom_ue, $nom_ec, $nom_fichier, $categorie_fichier, $description_fichier, $annee_fichier, $chemin_fichier);

        if ($stmt->execute()) {
            echo "Fichier inséré avec succès dans la base de données.";
        } else {
            echo "Erreur lors de l'insertion du fichier : " . $stmt->error;
        }

        // Fermeture de la connexion
        $stmt->close();
        $mysqli->close();
    }
    ?>

    <h2>Formulaire d'insertion de fichiers PDF</h2>



    <form method="post" enctype="multipart/form-data">
        <label for="nom_table">Choisissez la table :</label>
        <select name="nom_table" id="nom_table">
            <option value="LICENCE_1">LICENCE_1</option>
            <option value="LICENCE_2">LICENCE_2</option>
            <option value="LICENCE_3">LICENCE_3</option>
        </select>
        <br>
        <label for="semestre">Semestre :</label>
        <input type="text" name="semestre" required><br>

        <label for="filliere">Filière :</label>
        <input type="text" name="filliere" required><br>

        <label for="nom_ue">Nom de l'UE :</label>
        <input type="text" name="nom_ue" required><br>

        <label for="nom_ec">Nom de l'EC :</label>
        <input type="text" name="nom_ec" required><br>

        <label for="nom_fichier">Nom du fichier :</label>
        <input type="text" name="nom_fichier" required><br>

        <label for="categorie_fichier">Catégorie du fichier :</label>
        <input type="text" name="categorie_fichier" required><br>

        <label for="description_fichier">Description du fichier :</label>
        <input type="text" name="description_fichier" required><br>

        <label for="annee_fichier">Année du fichier :</label>
        <input type="date" name="annee_fichier" required><br>

        <label for="fichier">Fichier PDF chemin_fichier:</label>
        <input type="text" name="fichier" required><br>

        <input type="submit" value="Insérer le fichier">

    </form>
</body>

</html>
