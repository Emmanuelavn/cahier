<?php
session_start();

if (isset($_POST['deconnexion'])) {
    // L'utilisateur a confirmé la déconnexion
    session_unset(); // Efface toutes les variables de session
    session_destroy(); // Détruit la session
    header("Location: index.php"); // Redirige vers la page d'accueil ou une autre page de votre choix
    exit();
}
if (isset($_POST['annuler'])) {
    header("Location: acceuil.php"); // Redirige vers la page d'accueil ou une autre page de votre choix
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Déconnexion</title>
    <style>
        :root {
    --main-color: #0f3054;
    --second-color: #89939E;
    --third-color: #000000;
    --background-color: #FFFFFF;
    --text-color: #222;
    --form-color: #f0f8ff;
    --whrite-color: #ffffff;
    --size-btn: 16px;
}
        body{
            text-align: center;
        }
        .container{
            margin-top: 50vh;
        }
        h2{
            margin: 20px;
        }
        form{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            width:auto;
        }
        form input{
            font-weight: bold;
            border-radius: 15px;
            background-color: var(--main-color);
            color: white;
            margin: 0px 2em;
            padding:10px 20px;
        }

    </style>
</head>

<body>
    <nav>
        <?php include "DATA/include/navbar.php"; ?>
    </nav>
    <div class="container">
        <h2>Voulez-vous vraiment vous déconnecter ?</h2>
        <form method="post">
            <input type='submit' name='annuler' value='annuler'>
            <input type="submit" name="deconnexion" value="Déconnexion">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>