<?php
    // Vérifier si l'utilisateur est authentifié
    if (!isset($_SESSION['email_or_username'])) {
        // Si l'utilisateur n'est pas authentifié, rediriger vers la page de connexion
        header("Location: index.php");
        exit();
    }

    // Récupérer les informations de l'utilisateur à partir de la session
    $email_or_username = $_SESSION['email_or_username'];

    // Vous pouvez maintenant utiliser $email_or_username pour récupérer les autres informations de l'utilisateur à partir de la base de données
// Connexion à la base de données
    include "DATA/include/config_BD.php";

    // Requête SQL  pour récupérer les informations de l'utilisateur
    $sql = "SELECT * FROM USERS WHERE email='$email_or_username' OR nom_user='$email_or_username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $id_user =  $row['id_user'];
        $nom_utilisateur = strtoupper($row['nom_user']);
        $prenom_utilisateur = $row['prenom_user'];
        $matricule = $row['matricule'];
        $filliere = $row['filliere'];
        $email = $row['email'];
    } else {
        die("Informations de l'utilisateur non trouvées.");
    }

?> 
<?php
// Assurez-vous d'avoir correctement configuré la connexion à la base de données.
include "DATA/include/config_BD.php";

// Récupérez l'ID de l'utilisateur actuel (vous devez l'avoir stocké dans la variable $id_user)
// Remplacez par l'ID de l'utilisateur approprié

// Sélectionnez les informations de la table USERS_infosup pour l'utilisateur actuel
$sql = "SELECT about, img_profile FROM USERS_infosup WHERE id_user = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_user);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $about, $img_profile);



// Récupérez les valeurs
mysqli_stmt_fetch($stmt);

// Fermez la requête
mysqli_stmt_close($stmt);

// Fermez la connexion à la base de données
mysqli_close($conn);
?>
