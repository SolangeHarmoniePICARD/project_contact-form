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

        <label for="input-username">Username</label>
        <input type="text" name="data-username" id="input-username">

        <input type="submit" value="Send">
    </form>

</body>
</html>