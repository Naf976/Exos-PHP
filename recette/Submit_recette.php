<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Accusée de récéption</title>
</head>
<body>
    <?php include('bloc/header.php') ?>
    <main class="main_submit">
        <?php
            try{
                $db = new PDO('mysql:host=localhost;dbname=partage_de_recettes;charset=utf8','root', 'root',
                //  Afficher les détails des érreurs
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            }catch(Exception $e){
                die('Error : '.$e->getMessage());
            }
            
            if(isset($_POST['auteur']) && isset($_POST['titre']) &&
            isset($_POST['recette'])){
                $requette_recette = 'INSERT INTO recettes(recette_id, auteur, titre, recette, auth)
                VALUES (NULL, :auteur, :titre, :recette, 1)';
                $recetteprepa = $db->prepare($requette_recette);
                $recetteprepa->execute([
                    'auteur'    =>  $_POST['auteur'],
                    'titre'     =>  $_POST['titre'],
                    'recette'   =>  $_POST['recette']
                ]);
                $verificationRecette = $db->prepare('SELECT titre FROM recettes');
                $verificationRecette->execute();
                $disponibilite = $verificationRecette->fetchAll();
                $liste_recettes = [];
                foreach($disponibilite as $d){
                    array_push($liste_recettes, $d['titre']);
                }
                if(in_array($_POST['titre'], $liste_recettes)){
                    echo '<p class="right"> Votre recette nomée <strong>'.$_POST['titre'].'</strong> a bien été postée.</p><br />';
                }else{
                    echo '<p class="wrong">Une erreur s\'est produite</p><br />';
                }

            }
        ?>
    </main>
    <?php include('bloc/footer.php') ?>
</body>
</html>