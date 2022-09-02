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
    <h2 class="contactHead">Contactez-nous</h2>
    <main class="main_contact">
        <form id="contact"method="post" action="index.php">
            <label for="mail">Email</label></br><input id="mail" type="email" placeholder="abc@exemple.com" required></br>
            <label for="message">Message</label></br><textarea id="message" placeholder="Ecrire ici..." required></textarea></br>
            <button id="btn_contact" type="submit">Envoyer</button>
        </form>
    </main>

    <?php include_once('bloc/footer.php') ?>
</body>

</html>