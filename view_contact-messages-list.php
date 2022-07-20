<?php include 'include_header.php'; ?>

<?php

if($_SESSION['username']){

    echo 'User: ' . $_SESSION['username'] ;

} else {

    $_SESSION['message'] = 'Vous n\'êtes pas connecté !';
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
            <a href="view_contact-message-single.php?contact_id=<?= $contact['contact_id'] ?>"> <button>Voir : <strong><?= $contact['contact_subject'] ?></strong></button></a>||<a href="handler_delete-message.php?message_id=<?= $contact['contact_id'] ?>"><button><small>Supprimer le message</small></button></a>
        </h2>


    <?php } ?>
    
    <div>
        <a href="index.php"><button>Retour</button></a>
        <a href="handler_user-logout.php"><button>Se déconnecter</button></a>
    </div>

<?php include 'include_footer.php'; ?>

