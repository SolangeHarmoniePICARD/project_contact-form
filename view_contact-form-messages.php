<?php include 'include_header.php'; ?>

<?php

if($_SESSION['username']){

    echo 'User: ' . $_SESSION['username'] ;

} else {

    $_SESSION['message'] = 'You are not connected! Please log in!';
    header('Location: view_user-login.php'); 

}

require_once('db_connect.php');

$sql = 'SELECT * FROM `tbl_contacts`';
$query = $db->prepare($sql);
$query->execute();
$contacts = $query->fetchAll(PDO::FETCH_ASSOC);

?>
    
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

    <?php include 'include_footer.php'; ?>

