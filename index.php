<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Un formulaire de contact en PHP/SQL.">
    <title>Formulaire de Contact</title>
</head>
<body>
    
    <form action="handler.php" method="post">
        <label for="field-name">Nom : </label>
        <input type="text" name="data-username" id="field-name" placeholder="Votre nom">
        <input type="submit" value="Envoyez">
    </form>

    <p>
        <?= $_SESSION['message']; ?>
    </p>

</body>
</html>
