
<?php

require_once('db-connect.php');

$sql = 'SELECT * FROM `tbl_contacts`';
$query = $db->prepare($sql);
$query->execute();
$contacts = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="La page d'affiichage des messages du formulaire de contact en PHP/SQL.">
    <title>Formulaire de Contact - Liste des messages</title>
</head>
<body>
    
<h1>Messages du formulaire de contact</h1>

    <?php foreach($contacts as $contact){ ?>
        
        <h2><?= $contact['contact_subject'] ?></h2>
        <p>Auteur : <?= $contact['contact_username'] ?></p>
        <p>Email : <?= $contact['contact_email'] ?></p>
        <p>Message : <?= $contact['contact_message'] ?></p>



    <?php } ?>

    <div>
        <a href="index.php"><button>Retour</button></a>
    </div>

</body>
</html>


