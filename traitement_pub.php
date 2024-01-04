
<?php
session_start();
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
      $id_user = $row['id_user'];
      $nom_utilisateur = strtoupper($row['nom_user']);
      $prenom_utilisateur = $row['prenom_user'];
      $matricule = $row['matricule'];
      $filliere = $row['filliere'];
      $email = $row['email'];
  } else {
      die("Informations de l'utilisateur non trouvées.");
  }

if (isset($_POST["publier"])) {
    // Récupérer les données du formulaire
    $postText = $_POST["post-text"];

    // Validation des données (assurez-vous que le texte n'est pas vide, etc.)

    // Enregistrement de la publication dans la base de données
    try {
        // Inclure le fichier de connexion à la base de données
        include("DATA/include/config_BD.php"); 
        
        // Préparez la requête SQL d'insertion
        $query = "INSERT INTO POSTS (id_user, post_text) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        // Remplacez $user_id par l'ID de l'utilisateur actuel (peut provenir de la session)
        // Par exemple, remplacez cela par la valeur correcte de l'ID de l'utilisateur

        mysqli_stmt_bind_param($stmt, "is", $id_user , $postText);

        // Exécutez la requête
        if (mysqli_stmt_execute($stmt)) {
            // La publication a été enregistrée avec succès
            echo "Publication enregistrée avec succès.";
        } else {
            echo "Erreur lors de l'enregistrement de la publication: " . mysqli_error($conn);
        }
        header("Location: publication.php");
        // Fermez la requête
        mysqli_stmt_close($stmt);
        // Fermez la connexion à la base de données
        mysqli_close($conn);
    } catch (mysqli_sql_exception $e) {
        echo "Erreur de base de données : " . $e->getMessage();
    }
} else {
    // Redirection ou gestion des erreurs si la requête n'est pas POST
    echo "Erreur : la requête doit être de type POST.";
}




if (isset($_POST["Reponse"])) {
    // Récupérer les données du formulaire
    $id_post = $_POST["post_id"];
    $comment_text = $_POST["comment_text"];

    // Validation des données

    // Enregistrement du commentaire dans la base de données
    try {
        // Inclure le fichier de connexion à la base de données
        include("DATA/include/config_BD.php");

        // Préparez la requête SQL d'insertion du commentaire
        $query = "INSERT INTO COMMENTS (id_user, id_post, comment_text) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        // Remplacez $user_id par l'ID de l'utilisateur actuel (peut provenir de la session)
        // Par exemple, remplacez cela par la valeur correcte de l'ID de l'utilisateur

        mysqli_stmt_bind_param($stmt, "iis", $id_user, $id_post, $comment_text);

        // Exécutez la requête
        if (mysqli_stmt_execute($stmt)) {
            // Le commentaire a été enregistré avec succès
            echo" Le commentaire a été enregistré avec succès";
            header("Location: publication.php");
        } else {
            echo "Erreur lors de l'enregistrement du commentaire: " . mysqli_error($conn);
        }

        // Fermez la requête
        mysqli_stmt_close($stmt);
        // Fermez la connexion à la base de données
        mysqli_close($conn);
    } catch (mysqli_sql_exception $e) {
        echo "Erreur de base de données : " . $e->getMessage();
    }
} else {
    // Redirection ou gestion des erreurs si la requête n'est pas POST
    echo "<script>console.log('Erreur : la requête doit être de type POST';</script>";
}
?>
