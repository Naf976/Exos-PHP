<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajouter une nouvelle recette</title>
</head>
<body>
    <?php include_once('bloc/header.php');?>
    <main class="main_nouvelle_recette">
        <h1>Confirmation de mise à jour</h1>
        <?php
        //      Connection à la base de donnée
        try{
            $db = new PDO('mysql:host=localhost;dbname=partage_de_recettes;charset=utf8', 'root', 'root');
        }catch (Exception $e){
            die('Error : '.$e->getMessage());
        }
        

            if(isset($_POST['auteur']) && isset($_POST['titre']) &&
             $_POST['recette'] && isset($_POST['id'])){
                try{
                    $requette_update = 'UPDATE recettes SET auteur= :auteur, titre= :titre, recette= :recette WHERE recette_id= :id';
        $prep_maj = $db->prepare($requette_update);
        $prep_maj->execute(['auteur'    => $_POST['auteur'],
                            'titre'     => $_POST['titre'],
                            'recette'   => $_POST['recette'],
                            'id'        => $_POST['id'],]);
                            echo '<p class="right">Recette modifiée 😀</p>';
                }catch(Exception $e){
                    die('error : '.$e->getMessage());
                }
                
                            
            }
        ?>
    </main>
    <?php include_once('bloc/footer.php'); ?>
</body>
</html>