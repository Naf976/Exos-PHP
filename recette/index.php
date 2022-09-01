<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Page d'acceuil</title>
</head>
<body>
    <?php include_once('bloc/header.php'); ?>
    <?php include_once('bloc/elements/variables.php'); ?>
    <?php include_once('bloc/elements/fonctions.php'); ?>
    <?php
    foreach($recettes as $recette){
        $autorisation = affichage($recette);
        if($autorisation == true){
            echo 
                '<main class="conteneur">'.
                    '<h2 class="titre">'.$recette['titre'].'</br>'.'</h2>'.
                    '<strong class="recette">'.$recette['recette'].'</br>'.'</strong>'.
                    '<em class="nom">'.$recette['nom'].'</br>'.'</em>'.
                    '<em class="mail">'.$recette['mail'].'</br>'.'</em>'.
                '</main>';
        }
    }
    ?>
    <?php include_once('bloc/footer.php'); ?>
</body>
</html>