<!DOCTYPE html>
<html lang="Fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ASSETS/CSS/acceuil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="ASSETS/chart-graphique/ezeetest-website-favicon-color.png">
    <title>Acceuil | Ezeetest</title>
</head>

<body>
    <nav class="navbar">

        <h1><span><img src="ASSETS/IMG/ezeetest-low-resolution-logo-color-on-transparent-background.png" alt=""
                    srcset=""></span></h1>
        <ul>
            <li><a href="about.html" target="_blank">à propos</a></li>
            <li><a href="#" target="_blank">Déconnection</a></li>
            <li><a href="user.html" target="_blank" rel="noopener noreferrer"><button class="btn_setting">&#9881
                        profil</button></a></p>
            </li>

        </ul>
        <div class="menu-burgeur">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <header class="header">
        <div class="slider_container">
            <div class="slider">
                <img src="ASSETS/IMG/pexels-pixabay-301920.jpg" alt="" srcset="">
                <img src="ASSETS/IMG/pexels-pixabay-159751.jpg" alt="" srcset="">
                <img src="ASSETS/IMG/pexels-mikhail-nilov-7583935.jpg" alt="" srcset="">
                <img src="ASSETS/IMG/pexels-pixabay-159866.jpg" alt="" srcset="">
                <img src="ASSETS/IMG/pexels-pixabay-301920.jpg" alt="" srcset="">
            </div>
        </div>
        <h1>Bienvenue sur Ezeetest</h1>
        <div class="profil-setting">
            <div class="icon-bar-lateral">
                <svg viewBox="0 0 30 30" class="chevron">
                    <polygon points="17.4,15 7,25.2 9.8,28 23,15 9.8,2 7,4.8"></polygon>
                </svg>
                <svg viewBox="0 0 30 30" class="chevron">
                    <polygon points="17.4,15 7,25.2 9.8,28 23,15 9.8,2 7,4.8"></polygon>
                </svg>
            </div>
            <div class="profil_info"><a href="ASSETS/IMG/pexels-oladimeji-ajegbile-3118214.jpg" target="_blank"
                    rel="noopener noreferrer"><img class="profil_img"
                        src="ASSETS/IMG/pexels-oladimeji-ajegbile-3118214.jpg" alt="" srcset=""></a>
                <p class="profil_name">AGOSSOU Jean</p>
            </div>

            <form action="DATA/include/table.php" method="POST" id="categorieForm" class="btn_container">
                <select name="licence" id="choix_licence">
                    <option value="LICENCE_1">LICENCE_1</option>
                    <option value="LICENCE_2">LICENCE_2</option>
                    <option value="LICENCE_3">LICENCE_3</option>

                    <button class="btn"><svg viewBox="0 0 30 30" class="chevron_btn">
                            <polygon points="17.4,15 7,25.2 9.8,28 23,15 9.8,2 7,4.8"></polygon>
                        </svg><input class="btn" type="submit" name="categorie" value="cour"></button>
                    <button class="btn"><svg viewBox="0 0 30 30" class="chevron_btn">
                            <polygon points="17.4,15 7,25.2 9.8,28 23,15 9.8,2 7,4.8"></polygon>
                        </svg><input class="btn" type="submit" name="categorie" value="document"></button>
                    <button class="btn"><svg viewBox="0 0 30 30" class="chevron_btn">
                            <polygon points="17.4,15 7,25.2 9.8,28 23,15 9.8,2 7,4.8"></polygon>
                        </svg><input class="btn" type="submit" name="categorie" value="epreuve"></button>
                </select>
            </form>
            <ul>
                <li><a href="#" target="_blank">Déconnection</a></li>
                <li><a href="about.html" target="_blank">à propos</a></li>
                <li><a href="user.html" target="_blank" rel="noopener noreferrer"><button class="btn_setting">&#9881
                            profil</button></a></p>
                </li>
            </ul>
        </div>
    </header>
    <hr>

    <script src="ASSETS/JS/acceuil.js"></script>
</body>

</html>