<?php 

include 'include_header.php'; 

if (isset($_GET['contact_id']) && !empty($_GET['contact_id'])) {

    $contact_id = strip_tags($_GET['contact_id']);

    //echo $contact_id ;

    require_once('db_connect.php');

    $sql = 'SELECT * FROM `tbl_contacts` WHERE `contact_id` = :contact_id';
    $query = $db->prepare($sql);
    $query->bindValue(':contact_id', $contact_id, PDO::PARAM_INT);
    $query->execute();
    $contact = $query->fetch();

    //print_r($contact);

    if (!$contact) {
        $_SESSION['message'] = 'This ID doesn\'t exist.';
        header('Location: view_contact-messages-list.php'); 
    }

} else {

    $_SESSION['message'] = 'URL is not valid...';
    header('Location: view_contact-messages-list.php'); 

}

?>

<h1> <?= $contact['contact_subject'] ?> </h1>
<p>Auteur : <?= $contact['contact_username'] ?></p>
<p>Email : <?= $contact['contact_email'] ?></p>
<p>Message : <?= $contact['contact_message'] ?></p>

<a href="view_contact-messages-list.php">
    <button>
        Retour
    </button>
</a>

<?php include 'include_footer.php'; ?>