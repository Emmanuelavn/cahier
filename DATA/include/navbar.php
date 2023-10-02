<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --font-Title: 'Roboto', sans-serif;
            --font-link: 'Poppins Medium', sans-serif;
            --size-nav-Title: 50px;
            --size-nav-link: 19px;
            --size-Title: 70px;
            --main-color: #0f3054;
            --second-color: #89939E;
            --third-color: #000000;
            --background-color: #FFFFFF;
            --text-color: #222;
            --form-color: #f0f8ff;
            --whrite-color: #ffffff;
            --size-text: 30px;
            --text-width: 800px;
        }
        a{
            text-decoration: none;
            color: var(--text-color);
            font-weight: bold;
        }
        .navbar {
            top: 0;
            left: 0;
            position: fixed;
            background-color: var(--whrite-color);
            background: blur(7);
            display: flex;
            align-items: center;
            justify-content: space-around;
            height: 80px;
            width: 100vw;
            box-shadow: 0px 0px 20px #00000066;
        }

        .navbar h1 {
            font-family: var(--font-Title);
            font-size: var(--size-navbar-Title);
            text-transform: uppercase;
            letter-spacing: 5px;
            overflow: hidden;
            display: block;
        }

        .navbar h1:hover {
            cursor: pointer;
        }

        .navbar h1 img {
            height: var(--size-nav-Title);
        }

        .navbar ul{
            display: flex;

        }
        .navbar li{
            list-style: none;
            padding: 0% 10px;
        }
        .navbar li:nth-child(2) a {
            font-weight: bold;
            text-align: center list-style: none;
            height: auto;
            border-radius: 20px;
            padding: 10px 20px;
            color: var(--background-color);
            background-color: var(--main-color);
            text-decoration: none;
            color: var(--background-color);
        }
    </style>
</head>

<body>
    <nav class="navbar">

        <h1><span><img src="ASSETS/IMG/ezeetest-low-resolution-logo-color-on-transparent-background.png"
                    alt="logo-Ezeetest" srcset=""></span></h1>
        <ul>
            <li><a href="acceuil.php">Acceuil</a></li>
            <li><a href="about.html">à propos</a></li>
        </ul>
    </nav>
</body>

</html>