<!DOCTYPE html>
<?php
session_start();

if (isset($_POST['code_confirmation'])) {
    $code_utilisateur = $_POST['code_confirmation'];

    if ($code_utilisateur == $_SESSION['code_confirmation']) {
        echo "<script>alert('Code de confirmation valide.')
        setTimeout(function(){
            window.location.href= 'index.php';
        }, 500);
        </script>";
        
        // Vous pouvez marquer l'email comme vérifié dans la base de données ici
    } else {
        
    }
}
?>

<html>

<head>
    <title>Vérification du code de confirmation</title>
</head>

<body>
    <h2>Vérification du code de confirmation</h2>
    <form action="" method="post">
        <label for="code_confirmation">Entrez le code de confirmation à 6 chiffres :</label>
        <input type="text" id="code_confirmation" name="code_confirmation" maxlength="6" required>
        <button type="submit">Vérifier</button>

    </form>
    <?php
    echo 'Code de confirmation envoyer.';
    ?>
</body>

</html>