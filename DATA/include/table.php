<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
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
    session_start(); // Démarrez la session (si ce n'est pas déjà fait)

    // Vérifiez si le tableau de résultats de la session existe
    if (isset($_SESSION['resultats'])) {
        $resultats = $_SESSION['resultats'];
    
        // Maintenant, vous pouvez parcourir et afficher les résultats comme vous le souhaitez
        foreach ($resultats as $resultat) {
            // Accédez aux données comme $resultat['nom_colonne']
            echo "Semestre : " . $resultat['semestre'] . "<br>";
            echo "Nom_ue : " . $resultat['nom_ue'] . "<br>";
            echo "Nom_ec : " . $resultat['nom_ec'] . "<br>";
            // Affichez d'autres données si nécessaire
        }
    } else {
        echo "Aucun résultat trouvé en session.";
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