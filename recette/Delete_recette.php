<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Supréssion Recette</title>
</head>

<body>
    <?php include('bloc/header.php'); ?>
    <main class=main_delete_recette>
        <?php

        //  Connection à la base de donnée
        try {
            $db = new PDO('mysql:host=localhost;dbname=partage_de_recettes;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
            die('Eroor :' . $e->getMessage());
        }

        //     Si boutton supprimer appuyé
        if (isset($_GET['id'])) {
            $requeteSelect = 'SELECT * FROM recettes WHERE recette_id=:id';
            $prepaSelect = $db->prepare($requeteSelect);
            $prepaSelect->execute(['id' => $_GET['id']]);
            $del_recette = $prepaSelect->fetch();
            echo '<h1>Confirmation de suppression</h1>
                <p>Souhaitez-vous vraiment supprimer la recette <strong>' . $del_recette['titre'] . ' </strong> de ' . $del_recette['auteur'] . '?</p>
                <form method="POST" action="Delete_recette.php">
                     <input hidden type="number" name="id" value="'.$_GET['id'].'">
                     <input type="submit" name="reponse" value="oui">
                     <input type="submit" name="reponse" value="non">
                 </form>';

        }
        if (isset($_POST['reponse']) && isset($_POST['id']) ) {
            //  Pour confirmer si "OUI" ou "NON on supprime
            if ($_POST['reponse'] == 'oui') {
                try{
                    $requeteSql = 'DELETE FROM recettes WHERE recette_id=:id';
                $prepaSupprimer = $db->prepare($requeteSql);
                $prepaSupprimer->execute(['id' => $_POST['id']]);
                }catch(Exception $e){
                    die('Une erreur s\'est produite :'.$e->getMessage());
                }
                
            } elseif ($_POST['reponse'] == 'non') {
                header('location:index.php');
            }
        }

        ?>

    </main>
    <?php include('bloc/footer.php') ?>
</body>

</html>