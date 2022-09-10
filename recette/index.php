<?php
session_start(); ?>
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
    <?php include_once('bloc/elements/variables.php');
    include_once('bloc/elements/fonctions.php');
    include_once('bloc/elements/users.php') ?>


    <!--    Début du contenu principale de la page-->
    <main class="conteneur">
        <?php
        try {
            $db = new PDO('mysql:host=localhost;dbname=partage_de_recettes;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $recettesQuery = 'SELECT * FROM recettes';
        $recipesStatement = $db->prepare($recettesQuery);
        $recipesStatement->execute();
        $recettes = $recipesStatement->fetchAll();

        $utilisateursQuery = 'SELECT * FROM users';
        $utilisateursStatement = $db->prepare($utilisateursQuery);
        $utilisateursStatement->execute();
        $utilisateurs = $utilisateursStatement->fetchAll();

        echo '<p class="wrong">Utilisateurs disponibles : ';
        foreach ($utilisateurs as $utilisateur) {
            echo htmlspecialchars($utilisateur['prenom'] .
                ' ' . $utilisateur['nom'] . ', ');
        }
        echo '</p>';


        /*  VERIFICATION SI L'EMAIL ET LE MOT DE PASSE EXISTE   */
        if (isset($_POST['email']) && isset($_POST['password'])) {
            foreach ($users as $user) {
                if (
                    $_POST['email'] == $user['email'] &&
                    $_POST['password'] == $user['password']
                ) {
                    $_SESSION['LOGED_USER'] = $user['prenom'];
                }
            }
        }
        if (isset($_SESSION['LOGED_USER'])) {
            echo '<p class="right">vous êtes connecté ' . htmlspecialchars($_SESSION['LOGED_USER']) . '</br></p>';
            echo '<a class="nouvelle_recette" href="ajoutRecette.php">+ Nouvelle recette</a>';
            foreach ($recettes as $recette) {
                $autorisation = $recette['auth'];
                if ($autorisation == 1) {
                    echo
                    '<div class="recette">' .
                        '<h2 class="titre">' . htmlspecialchars($recette['titre'])  . '</br>' . '</h2>' .
                        '<strong class="recette">' . htmlspecialchars($recette['recette']) . '</br>' . '</strong>' .
                        '<em class="nom">' . htmlspecialchars($recette['auteur']) . '</br>' . '</em>' .
                    '</div>
                     <div class="action">
                        <a class="modifier" href="Update_recette.php?id='.$recette['recette_id'].'">Modifier</a>
                        <a class="supprimer" href="Delete_recette.php?id='.$recette['recette_id'].'">Suprimer</a>
                    </div>';
                }
            }
        } elseif (!isset($_COOKIE['LOGED_USER'])) {
            echo '
                <section class="bonjour">
            <p>Bonjour ! Pour pouvoir accéder aux recettes, il va falloir se connecter !</p>
            <a href="login.php">Se connecter</a>
        </section>';
        }
        ?>
    </main>;
    <?php include_once('bloc/footer.php'); ?>
</body>

</html>