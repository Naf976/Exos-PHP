<?php session_start() ;?>
<!DOCTYPE html>
<html lang="fr_FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connection</title>
</head>

<body>
    <?php
        include('bloc/header.php');
    ?>
    <main>
        <h1>Se connecter</h1>
        <aside id="connection">
            <form method="POST" action="index.php">
                <input type="email" id="mail" name="email" placeholder="adresse mail"></br>
                <input type="password" id="password" name="password" placeholder="Mot de passe"></br>
                <button type="submit">Se connecter</button>
            </form>
        </aside>
    </main>
    <?php
        include('bloc/footer.php');
    ?>
</body>

</html>