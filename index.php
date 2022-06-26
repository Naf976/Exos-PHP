<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Entraînement sur les conditions "if" "else" -->

    <?php

    // Verification si l'accès est autorisé et si la personne est majeur. Bonus ; si il est chanteur.

    echo ('<h1>Coucou 😀!</h1>');
    $acces = true;
    $age = 5;
    $code = 'tulipe3';
    $chanteur = true;
    if ($acces) {
        if ($age >= 18 && $age < 200) {
            echo ('Autorisation accordé.<br/> Le code est <strong>' . $code . '</strong>');
        } elseif ($age < 18) {
            echo ('Accés non autorisé, vous êtes encore trop jeune.');
        } elseif ($age >= 200) {
            echo ('Je ne pense pas que tu es encore en vie.');
        }
    } elseif (!$acces) {
        echo ('Accès refusé, vous n\'êtes pas autorisé à accéder au contenue');
    }

    ?>
    <?php if ($chanteur) : ?>
        <h2>Alors monsieur est chanteur 😏.</h2>
    <?php endif; ?>

    <!-- Les conditions "switch" -->

    <?php
    $niveau = 20;
    switch ($niveau) {
        case 0:
            echo 'bof';
            break;
        case 10:
            echo 'Mouais';
            break;
        case 20:
            echo 'Parfait !';
            break;
        default:
            echo 'Euuuh, je me suis perdu...';
    }
    ?>
    <!-- Ternaire: condition condensé -->

    <?php
    $age2 = 60;
    $isSenior = ($age2 >= 50);
    if ($isSenior){
        echo ('Vous êtes d\'âge mûre <br/>');
    }else{
        echo ('fiston <br/>');
    }
    ?>

    <!-- LES BOUCLES EN PHP -->

    <!-- Boucles "while" -->

    <?php
    $martin = ['Martin Luther King', ',king@boss.com', '12349', 35];
    $nelson = ['Nelson Mandela', 'nel@boss.com', '95475', 70];
    $louis = ['Louis de Funes', 'louis@boss.com', '93540',80];

    $stars = [$martin, $nelson, $louis];
    echo $stars[1][2];
    ?>

</body>

</html>