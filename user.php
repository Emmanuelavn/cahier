<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="ASSETS/chart-graphique/ezeetest-website-favicon-color.png">
    <link rel="stylesheet" href="ASSETS/CSS/user.css">
    <title>User | Ezeetest</title>
</head>

<body>
    <!--navbar-->
    <nav class="navbar">

        <h1><span><img src="ASSETS/IMG/ezeetest-low-resolution-logo-color-on-transparent-background.png" alt=""
                    srcset=""></span></h1>
        <ul>
            <li><a href="acceuil.html" target="_blank">Acceuil</a></li>
            <li><a href="about.html" target="_blank">à_propos</a></li>
        </ul>

        <div class="menu-burgeur">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <!--affichage profil au centre-->
    <header>
        <div class="profile_content"><img class="profil_img" src="ASSETS/IMG/pexels-oladimeji-ajegbile-3118214.jpg"
                alt="" srcset="">
            <span class="btn_modif"><img src="ASSETS/IMG/icons8-pencil-24.png" alt=""></span>
            <p>AGOSSOU Jean</p>
        </div>
    </header>
    <!--centre de la page-->
    <div class="container">
        <div class="form_container">
            <form class="modif_profil" action="#" method="#">
                <h1>
                    <span>Modification</span>
                </h1>
                <br>
                <input type="text" placeholder="nom d'utllisateur ou matricule">
                <input type="text" placeholder="numéro matricule ou telephone">
                <input type="image">
                <input type="email" placeholder="Email">
                <input type="submit" value="Modifier">
                <br>
            </form>
            <p>NB:Vous avez la possibiliter de modifier une seul information</p>
        </div>
    </div>
    <script src="ASSETS/JS/user.js"></script>
</body>

</html>