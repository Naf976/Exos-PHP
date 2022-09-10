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
    <?php include_once('bloc/header.php'); ?>
    <main class="main_nouvelle_recette">
        <?php
        //      Connection à la base de donnée
        try {
            $db = new PDO('mysql:host=localhost;dbname=partage_de_recettes;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
            die('error : ' . $e->getMessage());
        }
        //      Affichage de la recette dans le formulaire d'édition
        if (isset($_GET['id'])) {
            $requette_Select = 'SELECT * FROM recettes WHERE recette_id=:id';
            $select_recette = $db->prepare($requette_Select);
            $select_recette->execute(['id' => $_GET['id']]);
            $recette_modifier = $select_recette->fetch();
            echo '<h2 class="nouvelleRecetteHead">Modification de Recette</h2>
        <form method="POST" action="Submit_update_recette.php">
            <label for="auteur">Nom Prenom</label></br>
            <input hidden type="number" name="id" value="' . $_GET['id'] . '">
            <input id="auteur" type="text" name="auteur" value="' . $recette_modifier['auteur'] . '" required></br>
            <label for="titre">Titre de la recette</label></br>
            <input id="titre" type="text" name="titre"  value="' . $recette_modifier['titre'] .'" required></br>
            <textarea id="recette" name="recette" placeholder="Ecrire la recette ici..." required>' . $recette_modifier['recette'] . '</textarea></br>
            <button id="btn_recette" type="submit">Enregistrer</button>
        </form>';
        }



        /* */
        ?>

    </main>
    <?php include_once('bloc/footer.php'); ?>
</body>

</html>