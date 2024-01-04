<?php include "DATA/include/user_infos.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="ASSETS/chart-graphique/ezeetest-website-favicon-color.png">
    <style>
        /*importation font familly*/
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap');
/*Animation keyframe*/

/*root*/
:root {
    --logo-fontFam:'ezeetest-exo-2-bold' sans-serif;
    --main-FontFam: 'Roboto', sans-serif;
    --Montserrat-FontFam: 'Montserrat', sans-serif;
    --Inter-FontFam: 'Inter', sans-serif;
    --size-nav-Title: 20px;
    --input-text-Fontsize: 1em;
    --size-Title: 2.5em;
    --size-text: 1.1em;
    --size-link: 1em;
    --size-logo: 3em;
    --size-btn: 1.2em;
    --size-nomUser:1.6em;
    --size-imgProfile:3rem;
    --welcom-size: 3.5em;
    --main-color: #0f3054;
    --second-color: #89939E;
    --third-color: #000000;
    --background-color: #FFFFFF;
    --text-color: #222;
    --form-color: #f0f8ff;
    --color-white: #ffffff;
    --svg-group-width: 700px;
    --svg-group-height: 479px;
}

* {
    margin: 0;
}

a {
    cursor: pointer;
    color: var(--color-white);
    text-decoration: none !important;
}

li {
    list-style: none !important;
}

body {
    display: flex;
    flex-direction: column;
    font-family: var(--main-FontFam);
}
/*class a utilliser*/
.text_main {
    color: var(--main-color);
}
.mobile-afichage{
    display: none;
}
.size60{
    height: 60px;
}
.title {
    font-weight: bold;
    font-size: var(--size-Title);
}

.font_montserrat {
    font-family: var(--Montserrat-FontFam) !important;
    /* montserrat */
}

.text {
    letter-spacing: 2px;
    word-spacing: 1px;
    font-family: var(--Inter-FontFam) !important;
    /*Inter*/
    font-size: var(--size-text);
    font-weight: bold;
}
.text-shadow{
    color:rgba(240, 248, 255, 0.51);
}
.bg-main {
    background-color: var(--main-color);
}
.nomUser{
    margin-top: 20px;
    font-weight: bold;
    font-size: var(--size-nomUser);
    color: var(--text-color);
}
.width_100 {
    width: 100px;
}

.input_radius-12 {
    cursor: pointer;
    border-radius: 12px;
    font-size: var(--input-text-Fontsize);
}

.input {
    font-size: var(--input-text-Fontsize);
    padding: 9px 10px;
    margin-bottom: 10px;
    border-top: transparent;
    border: solid black .5px;
    height: calc(1em + .75rem + 2px);
    border-bottom: solid thin rgba(54, 69, 73, .5);
    border: solid thin rgb(24, 15, 15);
    width: 300px;
}

.input_search {
    cursor: pointer;
    width: 500px;
    text-align: center;
}

.btn {
    cursor: pointer;
    text-align: center;
    font-size: var(--size-btn);
    height: auto;
    padding: 10px 20px;
}

.color_main {
    color: var(--color-white);
    background-color: var(--main-color);
}
/*image de profil*/
.img_rond {
    border: solid var(--main-color);
    border-radius: 100%;
}
.img-profil {
    border: solid 5px var(--main-color);
    cursor: pointer;
    height: var(--size-imgProfile);
    width: var(--size-imgProfile);
    box-shadow: 0px 0px 10px #33333382;
}
/* navbar et lien */
.navbar {
    z-index: 1;
    background-color:var(--main-color);
    color: var(--color-white);
    height:4rem;
    width: 100vw;
    flex-wrap: wrap;
    display: flex;
    align-items: center;
    justify-content: space-around;
}
.navbar h1{
    display: flex;
    justify-content: center;
    align-items: center;
}


.link_container {
    display: flex;
    align-items: center;
    flex-direction: row-reverse;
    gap: 2rem;
    padding: 0%;
}

.link {
    cursor: pointer;
    padding: 0 10px;
}

.link a {
    cursor: pointer;
    font-size: var(--size-link);
    color: var(--color-white);
}
.text-logo{
    font-size: var(--logo-fontFam);
    padding-left: 10px;
    font-size: 1.5em;
}
.logo {
    height: var(--size-logo);
    width: auto;
}

/*menu burgueur*/

.menu-burgeur {
    padding-top: 30px;
    padding-bottom: 30px;
    height: auto;
    width: 42px;
    position: relative;
    cursor: pointer;
    border-radius: 20px;

}

.menu-burgeur span:nth-child(2) {
    position: absolute;
    right: 0;
    width: 60%;
    height: 4px;
    background-color: var(--color-white);

    transition: background-color 0.5s ease-in-out;
}

.menu-burgeur span:nth-child(1),
.menu-burgeur span:nth-child(3) {
    position: absolute;
    content: "";

    width: 100%;
    height: 4px;
    background-color: var(--color-white);
    transition: transform 0.5s ease-in-out;
}

.menu-burgeur span:nth-child(1) {
    transform: translateY(10px);
}

.menu-burgeur span:nth-child(3) {
    transform: translateY(-10px);
}

.menu-burgeur.menu_active span:nth-child(2) {
    background-color: transparent;
}

.menu-burgeur.menu_active span:nth-child(1) {
    transform: translateY(0px) rotateZ(-45deg);
}

.menu-burgeur.menu_active span:nth-child(3) {
    transform: translateY(0px) rotateZ(45deg);
}
/*cord de page*/

/*header*/

#header {
    padding: 5% 8%;
    height:10vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    color: var(--color-white) !important;
    background-color: var(--main-color);
    position: relative;
    border-bottom: solid 2px var(--main-color);
    box-shadow: 0px 0px 10px #33333382;
}


#welcome {
    width: var(--welcom-size);
}

/*information utillisateur*/
.container {
    max-width: 100%;
    margin: 200px auto;
    padding: 50px;
    background-color: var(--background-color);
    border: 1px solid #ddd;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.433);
    border-radius: 25px;
}

.infosUser {
    list-style: none;
    padding: 0;
}

.infos {
    margin-bottom: 20px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
}

.infos h2 {
    font-size: 1.5rem;
    color:var(--main-color);
    margin: 0;
}

.infos p {
    font-size: 1.2rem;
    color: #777;
    margin: 0;
}

.infos h2 + p {
    margin-top: 5px;
}

h2::after {
    content: ":";
}


a {
    text-decoration: none;
    font-size: 1.2rem;
    color: #4285f4;
}

a:hover {
    text-decoration: underline;
}
.btnchange{
    border-radius: 10px;
    padding: 3px 10px;
    
    border:1px solid var(--third-color);
}
.btnchange a{
    font-size: 15px;
    color: var(--third-color);
}
/*footer*/
#footer {
    color: var(--color-white);
    display: flex;
    align-items: center;
    justify-content: space-around;
    height: auto;
    background-color: var(--main-color);
}

#footer p {
    padding: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-around;
    align-self: center;
}

.logo_footer {
    font-size: 2em;
}

@media screen and (max-width:860px) {

/*root*/
:root {
    --logo-fontFam:'ezeetest-exo-2-bold' sans-serif;
    --main-FontFam: 'Roboto', sans-serif;
    --Montserrat-FontFam: 'Montserrat', sans-serif;
    --Inter-FontFam: 'Inter', sans-serif;
    --size-nav-Title: 35px;
    --input-text-Fontsize: 1em;
    --size-Title: 2.5em;
    --size-text: 1.1em;
    --size-link: 1.5em;
    --size-logo: 2.5em;
    --size-btn: 1.2em;
    --size-nomUser:1.6em;
   /* --size-imgProfile:6rem;*/
    --welcom-size: 4em;
    --main-color: #0f3054;
    --second-color: #89939E;
    --third-color: #000000;
    --background-color: #FFFFFF;
    --text-color: #222;
    --form-color: #f0f8ff;
    --color-white: #ffffff;
    --svg-group-width: 700px;
    --svg-group-height: 479px;
}
    .body{
        position: relative;
    }
    .mobile-afichage{
        display: block;
    }
    .img-profil{
        display: none;
    }
    .link_container{
        opacity: 0;
        background-color: #0f3054;
        top: 0px;
        height: 100vh;
        width: 100vw;
        display: flex;
        flex-direction: column-reverse;
        align-items: center;
        gap: 5em;
        margin:auto ;
        position: absolute;
        transform: translateX(-1000px);
        transition: all 0.9s ease-in-out;
    }
    .link_container.burgeuractive{
        opacity: 1;
        left: 0;
        transform:inherit;
        overflow: hidden;
    }
    #header{
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1% 9%;
    }
    #header_container {
        top: 200;
        padding: 0%;
        margin: 0%;
        position:absolute;
        height:auto;
        text-align: center;
    }
    .container{
        margin-top: 300px;
    }
    #footer{
        flex-wrap: wrap;
    }
    .logo_footer{
        display: none;
    }
}
@media screen  and (max-width: 360px){
    #header {
         padding: 0% 0%;
        }
    .text-logo {
        font-size: 1em;
        }
}
    </style>
</head>

<body id="body">
    <nav class="navbar">
        <h1><img class="logo" src="ASSETS/chart-graphique/ezeetest-website-favicon-white.png" alt="logo-Ezeetest"
          srcset=""><span class="text-logo">Ezeetest</span></h1>
        <ul class="link_container">
            <li class="link"><a href="deconnexion.php">deconnexion</a></li>
            <li class="link"><a href="about.html">a propos</a></li>
            <li class="link"><a href="acceuil.php">acceuil</a></li>
        </ul>
      <img  class="img_rond img-profil" src="<?php echo $cheminImageProfil; ?>" alt="Image de profil">
      <div class="menu-burgeur mobile-afichage">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </nav>

    <script>

        //variable
        const navlink = document.querySelector(".link_container");
        const body = document.querySelector("#body")
        //burgeur menu
        const burgeur = document.querySelector(".menu-burgeur");
        burgeur.addEventListener("click", () => {
            burgeur.classList.toggle("menu_active");
            navlink.classList.toggle("burgeuractive");
            body.classList.toggle("burgeuractive");
            console.log("burgeur");
        });

    </script>
</body>

</html>