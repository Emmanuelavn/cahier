<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
        }

        .bg-light-gray {
            background-color: #f7f7f7;
        }

        .table-bordered thead td,
        .table-bordered thead th {
            border-bottom-width: 2px;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6;
        }


        .bg-sky.box-shadow {
            box-shadow: 0px 5px 0px 0px #00a2a7
        }

        .bg-orange.box-shadow {
            box-shadow: 0px 5px 0px 0px #af4305
        }

        .bg-green.box-shadow {
            box-shadow: 0px 5px 0px 0px #4ca520
        }

        .bg-yellow.box-shadow {
            box-shadow: 0px 5px 0px 0px #dcbf02
        }

        .bg-pink.box-shadow {
            box-shadow: 0px 5px 0px 0px #e82d8b
        }

        .bg-purple.box-shadow {
            box-shadow: 0px 5px 0px 0px #8343e8
        }

        .bg-lightred.box-shadow {
            box-shadow: 0px 5px 0px 0px #d84213
        }


        .bg-sky {
            background-color: #02c2c7
        }

        .bg-orange {
            background-color: #e95601
        }

        .bg-green {
            background-color: #5bbd2a
        }

        .bg-yellow {
            background-color: #f0d001
        }

        .bg-pink {
            background-color: #ff48a4
        }

        .bg-purple {
            background-color: #9d60ff
        }

        .bg-lightred {
            background-color: #ff5722
        }

        .padding-15px-lr {
            padding-left: 15px;
            padding-right: 15px;
        }

        .padding-5px-tb {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .margin-10px-bottom {
            margin-bottom: 10px;
        }

        .border-radius-5 {
            border-radius: 5px;
        }

        .margin-10px-top {
            margin-top: 10px;
        }

        .font-size14 {
            font-size: 14px;
        }

        .text-light-gray {
            color: #d6d5d5;
        }

        .font-size13 {
            font-size: 13px;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6;
        }

        .table td,
        .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>

<body>
    <!-- Le contenu sera affiché ici en fonction du bouton cliqué -->
    <?php
    // Traitement du formulaire lorsque l'utilisateur soumet le choix de catégorie
    if (isset($_POST["licence"])) {
        $nom_table = $_POST["licence"];
        // Utilisez $_POST["licence"] ici
    } else {
        // Traitez le cas où "licence" n'est pas défini
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["categorie"])) {
        // Récupérer la catégorie sélectionnée
    
        $categorie = $_POST["categorie"];

        // Connexion à la base de données (assurez-vous de remplacer les informations de connexion)
        include "config_BD.php";
        // Vérification de la connexion
        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué : " . $conn->connect_error);
        }

        // Requête SQL pour récupérer les données en fonction de la catégorie
        $sql = "SELECT * FROM  $nom_table WHERE categorie_fichier = '$categorie'";
        $result = $conn->query($sql);

        // Afficher les données de la base de données en fonction du choix de catégorie
    

        // Fermer la connexion à la base de données
        $conn->close();
    }
    ?>
    </div>

    <div class="container">
        <div class="timetable-img text-center">
            <h2>Liste des documents PDF</h2>
            <table id="documents" class="table table-bordered text-center" class="table_affichage">
                <thead>
                    <tr class="bg-light-gray">
                        <th class="text-uppercase">Semestre</th>
                        <th class="text-uppercase">Filière</th>
                        <th class="text-uppercase">Nom de l'UE</th>
                        <th class="text-uppercase">Nom Cour | Ec</th>
                        <th class="text-uppercase">Catégorie du fichier</th>
                        <th class="text-uppercase">Description du fichier</th>
                        <th class="text-uppercase">Année du fichier</th>
                        <th class="text-uppercase">Télecharger</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td class="align-middle">
                                <p
                                    class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">
                                    <?php echo $row['semestre']; ?>
                                </p>
                            </td>
                            <td>
                                <p
                                    class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                    <?php echo $row['filliere']; ?>
                                </p>
                            </td>
                            <td>
                                <p
                                    class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                    <?php echo $row['nom_ue']; ?>
                                </p>
                            </td>
                            <td>
                                <p
                                    class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                    <?php echo $row['nom_ec']; ?>
                                </p>
                                <span class="margin-10px-top font-size14">
                                    <?php echo $row['nom_fichier']; ?>
                                </span>
                            </td>

                            <td>
                                <p
                                    class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                    <?php echo $row['categorie_fichier']; ?>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <?php echo $row['description_fichier']; ?>
                                </p>
                            </td>
                            <td>
                                <p
                                    class="bg-purple padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">
                                    <?php echo $row['année_fichier']; ?>
                                </p>
                            </td>
                            <td><a href="<?php echo $row['chemin_fichier']; ?>" target="_blank">Voir le PDF</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <br>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
   
</body >
</html >