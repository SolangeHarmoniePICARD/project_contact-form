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
        
        <h2>
            <a href="view_contact-message-single.php?contact_id=<?= $contact['contact_id'] ?>"> 
            <?= $contact['contact_subject'] ?>
        </a>
        </h2>


    <?php } ?>
    
    <div>
        <a href="index.php"><button>Retour</button></a>
    </div>

<?php include 'include_footer.php'; ?>

