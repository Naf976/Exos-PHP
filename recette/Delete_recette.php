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
    <?php
        try{
            $db = new PDO('mysql:host=localhost;dbname=partage_de_recettes;charset=utf8', 'root','root');
        }catch(Exception $e){
            die('Eroor :'.$e->getMessage());
        }
        try{
            $requeteSql = 'DELETE FROM recettes WHERE recette_id=:id';
        $prepaSupprimer = $db->prepare($requeteSql);
        $prepaSupprimer->execute(['id' => $_GET['id']]);
        }catch(Exception $a){
            die('Error :' . $a->getMessage());
        }
        
    ?>
    <main class=main_delete_recette>
        <h2 class="delette_recetteHead">Suppréssion de recette</h2>
        <p class="wrong">La recette vient d'être supprimée.</p>
        
    </main>
    <?php include('bloc/footer.php') ?>
</body>
</html>