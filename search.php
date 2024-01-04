<?php
// Connexion à la base de données (remplacez les valeurs par les vôtres)
include "DATA/include/config_BD.php";

// Récupérez le terme de recherche depuis la requête GET
$searchTerm = $_GET['term'];

// Échappez le terme de recherche pour éviter les attaques par injection SQL
$searchTerm = $conn->real_escape_string($searchTerm);

// Récupérez la licence sélectionnée depuis la requête GET
$selectedLicense = $_GET['license'];

// Échappez la licence sélectionnée (pour éviter les attaques par injection, bien que ce soit moins critique ici)
$selectedLicense = $conn->real_escape_string($selectedLicense);

// Requête SQL pour rechercher dans la base de données en fonction de la licence
$sql = "SELECT * FROM $selectedLicense WHERE  (nom_ue LIKE '%$searchTerm%' OR nom_ec LIKE '%$searchTerm%' OR nom_fichier LIKE '%$searchTerm%' OR description_fichier LIKE '%$searchTerm%' OR année_fichier LIKE '%$searchTerm%' OR filliere LIKE '%$searchTerm%') OR chemin_fichier LIKE '%$searchTerm%'";

// Exécutez la requête SQL
$result = $conn->query($sql);

// Vérifiez s'il y a des résultats
if ($result->num_rows > 0) {
    // Affichez les résultats
    echo "<h2>Résultats de la recherche :</h2>";
    echo "<div class='card-container'>";
    while ($row = $result->fetch_assoc()) {
        echo "<script>window.location.href = '#searchResults'</script>";
        echo "<div class='card-rech'>";
        echo "<h1>". $row['semestre'] ."</h1>";
        echo "<h2>ue:<span>".$row['nom_ue'] ."</span></h2>";
        echo "<h2>ec: <span>".$row['nom_ec'] ."<span></h2>";
        $chemin=$row['chemin_fichier'];
        echo "";
        echo "<p class='description'><span>".$row['description_fichier'] ."</span><a href='$chemin' target='_blank'>telecharger</a><p>";
        // Affichez d'autres données si nécessaire
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "Aucun résultat trouvé.";
}

// Fermez la connexion à la base de données
$conn->close();
?>
<style>
    /* Style pour les cartes */
.card-rech{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items:start;
    border: 1px solid #ddd;
    padding: 30px;
    height: 200px;
    margin: 10px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    background-color: #ffff;
    border-radius: 20px;
    max-width: 300px;
    transition: all 0.5s;
}
.card-rech h1{
    color:#0f3254;
    font-size: 2em;
}
.card-container h2{
    text-transform: uppercase;
    font-size: 1em;
}
.card-container h2 span{
    padding-left: 5px;
    font-weight:100;
    font-size: 0.5em;
}
.card-container h2 span{
    font-size: 1em;
}

/* Style pour le conteneur de cartes */
.card-container {
    margin: 0% 10%;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}
.card-rech:hover{
    scale: 1.1;
}
.card-rech:hover .description{
    opacity: 1;
    display : flex !important ;
    flex-wrap: wrap;
    justify-content:space-around;
    align-items: center;    
}
.description span{
    font-weight: bold;
    width: 200px;
}
.description a{
    border-radius: 10px;
    text-align: center;
    padding: 10px;
    color: black;
    background-color: white;
}
.description{
    text-align: center;
    opacity: 0;
    color: white;
    border-radius: 20px;
    text-align: center;
    height: 50%;
    width: 100%;
    background-color: #0f3254;
    position: absolute;
    display: flex;
    align-items: center;
    justify-content:space-around;
    flex-wrap: wrap;
    left: 0%;
    bottom: 0%;
    bottom: 1px;
    transition: opacity 0.2s;
}
</style>