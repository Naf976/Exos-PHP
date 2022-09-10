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
        <h2 class="nouvelleRecetteHead">Nouvelle Recette</h2>
        <form method="POST" action="Submit_recette.php">
            <label for="auteur">Nom Prenom</label></br>
            <input id="auteur" type="text" name="auteur" required></br>
            <label for="titre">Titre de la recette</label></br>
            <input id="titre" type="text" name="titre" required></br>
            <textarea id="recette" name="recette" placeholder="Ecrire la recette ici..." required></textarea></br>
            <button id="btn_recette" type="submit">Envoyer</button>
        </form>
    </main>
    <?php include_once('bloc/footer.php'); ?>
</body>
</html>