<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Page d'acceuil</title>
</head>

<body>
    <!--    Importation des blocks header, variables et fonctions-->
    <?php include_once('bloc/header.php'); ?>
    <?php include_once('bloc/elements/variables.php'); ?>
    <?php include_once('bloc/elements/fonctions.php'); ?>

    <!--    Début du contenu principale de la page-->
    <main class="conteneur">
        <?php
        $connected = false;
            if($connected == false){
                echo '
                <section class="bonjour">
            <p>Bonjour ! Pour pouvoir accéder aux recettes, il va falloir se connecter !</p>
            <a href="login.php">Se connecter</a>
        </section>
                ';
                return;
            }elseif($connected == true){
                foreach($recettes as $recette){
                    $autorisation = affichage($recette);
                    if($autorisation == true){
                        echo 
                            '<div class="recette">'.
                                '<h2 class="titre">'.$recette['titre'].'</br>'.'</h2>'.
                                '<strong class="recette">'.$recette['recette'].'</br>'.'</strong>'.
                                '<em class="nom">'.$recette['nom'].'</br>'.'</em>'.
                                '<em class="mail">'.$recette['mail'].'</br>'.'</em>'.
                            '</div>';
                    }
                }
            }
        ?>
        

        <!--<?php /*
       */ ?>-->
    </main>;
    <?php include_once('bloc/footer.php'); ?>
</body>

</html>