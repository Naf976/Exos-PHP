<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact</title>
</head>

<body>
    <?php include_once('bloc/header.php') ?>

    <main class="main_contact">
    <h2 class="contactHead">Contactez-nous</h2>
        <form id="contact"method="POST" action="submit_contact.php" enctype="multipart/form-data">
            <label for="mail">Email</label></br><input id="mail" name="mail" type="email" placeholder="abc@exemple.com" required></br>
            <label for="message">Message</label></br><textarea id="message" name="message" placeholder="Ecrire ici..." required></textarea></br>
            <input class="screen" type="file" name="screen"/></br>
            <button id="btn_contact" type="submit">Envoyer</button>
        </form>
    </main>

    <?php include_once('bloc/footer.php') ?>
</body>

</html>