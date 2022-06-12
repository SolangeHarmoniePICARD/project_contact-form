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
        <label for="field-username">Nom : </label>
        <input type="text" name="data-username" id="field-username" placeholder="Votre nom">
        <label for="input-email">Email</label>
        <input type="text" name="data-email" id="input-email">
        <label for="input-subject">Subject</label> 
        <input type="text" name="data-subject" id="input-subject" />
        <label for="input-message">Message</label> 
        <textarea name="data-message" id="input-message"></textarea>
        <input type="submit" value="Envoyez">
    </form>

    <p>
        <?php
            if($_SESSION){
                echo $_SESSION['message'] ;
                $_SESSION['message'] = "";
            }
        ?>
    </p>

</body>
</html>
