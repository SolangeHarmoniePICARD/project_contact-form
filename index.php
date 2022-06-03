<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    
    <form action="handler.php" method="post">

        <label for="input-name">Name: </label>
        <input type="text" name="data-name" id="input-name" placeholder="Your Name">
        <br>
        <label for="input-email">E-mail: </label>
        <input type="email" name="data-email" id="input-email" placeholder="Your e-mail">
        <br>
        <label for="input-message">Message: </label>
        <br>
        <textarea name="data-message" id="input-message"></textarea>
        <br>
        <input type="submit" value="Send">
    </form>

</body>
</html>