<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Réception</title>
</head>

<body>
    <main>
        <section>
            <?php
            if (
                !isset($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)
                || !isset($_POST['message']) || empty($_POST['message'])
            ) {
                echo 'Il faut saisir un email valide et un message pour soumettre le formulaire.';
                return;
            }
            if (isset($_FILES['screen']) && $_FILES['screen']['error'] == 0) {

                if ($_FILES['screen']['size'] <= 1000000) {
                    $extensions = ['png', 'jpg', 'jpeg', 'gif'];
                    $infos = pathinfo($_FILES['screen']['name']);
                    $extension = $infos['extension'];

                    if (in_array($extension, $extensions)) {

                        move_uploaded_file($_FILES['screen']['tmp_name'], 'uploads/' . basename($_FILES['screen']['name']));
                        echo 'Fichier sauvegardé';
                    }
                }
            }
            ?>
            <p>Mail : <?php echo $_POST['mail'] . '</br>' ?></p>
            <p>Message : <?php echo htmlspecialchars($_POST['message']) ?></p>
        </section>
    </main>
</body>

</html>