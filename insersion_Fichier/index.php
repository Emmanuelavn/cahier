<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Formulaire d'insertion de fichiers PDF dans la base de données</title>
</head>

<body>
    <?php
    // Traitement du formulaire lors de la soumission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom_table = $_POST["nom_table"] ?? '';
        $semestre = $_POST["semestre"] ?? '';
        $filliere = $_POST["filliere"] ?? '';
        $nom_ue = $_POST["nom_ue"] ?? '';
        $nom_ec = $_POST["nom_ec"] ?? '';
        $nom_fichier = $_POST["nom_fichier"] ?? '';
        $categorie_fichier = $_POST["categorie_fichier"] ?? '';
        $description_fichier = $_POST["description_fichier"] ?? '';
        $annee_fichier = $_POST["annee_fichier"] ?? '';
        
        // Vérifier si le champ "fichier" est défini dans $_FILES
        $chemin_fichier = $_FILES["fichier"]["name"] ?? '';

        // ...

// Déplacer le fichier téléchargé vers le dossier de destination en fonction de la table
$dossier_destination = "../ASSETS/document/$nom_table/$categorie_fichier/";

// Créer le dossier s'il n'existe pas
if (!is_dir($dossier_destination)) {
    mkdir($dossier_destination, 0755, true);
}

// Définir le chemin complet du fichier de destination
$fichier = $dossier_destination . basename($chemin_fichier);

// Déplacer le fichier téléchargé vers le dossier de destination
if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $fichier)) {
    echo "Chemin du fichier : " . $fichier;
    echo $nom_table;
    echo "<p class='success'>Déplacement du fichier téléchargé vers le dossier de destination</p>";
    // ... (votre code existant)
} else {
    echo "<p class'error'>Erreur lors du déplacement du fichier vers le dossier de destination.</p>";
}

// ...


        // Connexion à la base de données MySQL
       include "../DATA/include/config_BD.php";

        // Insertion du fichier dans la base de données
        $stmt = $conn->prepare("INSERT INTO $nom_table (semestre, filliere, nom_ue, nom_ec, nom_fichier, categorie_fichier, description_fichier, année_fichier, chemin_fichier) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss", $semestre, $filliere, $nom_ue, $nom_ec, $nom_fichier, $categorie_fichier, $description_fichier, $annee_fichier, $chemin_fichier);

        if ($stmt->execute()) {
            echo "<p class='success'>Fichier inséré avec succès dans la base de données.</p>";
        } else {
            echo "<p class='error'>Erreur lors de l'insertion du fichier : </p>" . $stmt->error;
        }

        // Fermeture de la connexion
        $stmt->close();
        $conn->close();
    }
    ?>

    <h1>Formulaire d'insertion de fichiers PDF</h1>

    <form method="post" enctype="multipart/form-data">
        
        <label for="nom_table">Choisissez la table :</label>
        <select name="nom_table" id="nom_table">
        <option value="LICENCE_1" <?php echo (isset($_POST['licence']) && $_POST['licence'] === 'LICENCE_1') ? 'selected' : ''; ?>>LICENCE_1</option>
        <option value="LICENCE_2" <?php echo (isset($_POST['licence']) && $_POST['licence'] === 'LICENCE_2') ? 'selected' : ''; ?>>LICENCE_2</option>
            <option value="LICENCE_3" <?php echo (isset($_POST['licence']) && $_POST['licence'] === 'LICENCE_3') ? 'selected' : ''; ?>>LICENCE_3</option>
        </select>
        <br>
        <label for="semestre">Semestre :</label>
        <input type="text" name="semestre" required ><br>

        <label for="filliere">Filière :</label>
        <input type="text" name="filliere" required ><br>

        <label for="nom_ue">Nom de l'UE :</label>
        <input type="text" name="nom_ue" required ><br>

        <label for="nom_ec">Nom de l'EC :</label>
        <input type="text" name="nom_ec" required ><br>

        <label for="nom_fichier">Nom du fichier :</label>
        <input type="text" name="nom_fichier" required ><br>

        <label for="categorie_fichier">Catégorie du fichier :</label>
        <input  type="text" name="categorie_fichier" required ><br>

        <label for="description_fichier">Description du fichier :</label>
        <textarea class="description_fichier" type="text" name="description_fichier" required ></textarea><br>

        <label for="annee_fichier">Année du fichier :</label>
        <input type="date" name="annee_fichier" required ><br>

        <label for="fichier">Fichier PDF chemin_fichier:</label>
        <input type="file" name="fichier" required ><br>

        <input type="submit" value="Insérer le fichier">

<!-- Vos champs de formulaire existants restent inchangés -->
    </form>
</body>

</html>
