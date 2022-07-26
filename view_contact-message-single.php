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
        $_SESSION['message'] = 'Cette ID n\'existe pas.';
        header('Location: view_contact-messages-list.php'); 
    }
##
} else {

    $_SESSION['message'] = 'L\'URL n\'est pas valide...';
    header('Location: view_contact-messages-list.php'); 

}

?>

<h1> <?= $contact['contact_subject'] ?> </h1>
<p>Auteur : <?= $contact['contact_username'] ?></p>
<p>Email : <?= $contact['contact_email'] ?></p>
<p>Date : <?= $contact['contact_sended'] ?></p>
<p>Message : <?= $contact['contact_message'] ?></p>


<?php 

    if ($contact['contact_reply'] == NULL) {
        echo 'Vous n\'avez pas encore répondu à ce message. <br> <button id="button-reply">Répondre</button>' ;
    } else {
        echo 'Vous avez répondu : « ' . $contact['contact_reply'] . ' » à ce message le ' . $contact['contact_replied'] . '.';
    }

?>

    <form action="handler_reply-contact-message.php" method="post" id="form-reply" style="display:none">
        <p>
            <label for="input-reply">Votre réponse :</label>
        </p>
        <p>
            <textarea id="input-reply" name="data-reply"></textarea>
        </p>
        <p>
            <input type="hidden" name="data-id" value="<?= $contact['contact_id'] ?>">
            <input type="hidden" name="data-email" value="<?= $contact['contact_email'] ?>">
            <input type="hidden" name="data-username" value="<?= $contact['contact_username'] ?>">
            <input type="hidden" name="data-subject" value="<?= $contact['contact_subject'] ?>">
            <input type="submit" value="Envoyer">
        </p>
    </form>
</p>

<p>
    <a href="handler_delete-message.php?message_id=<?= $contact['contact_id'] ?>">
        <button>
            Supprimer le message
        </button>
    </a>
</p>

<p>
    <a href="view_contact-messages-list.php">
        <button>
            Retour
        </button>
    </a>
</p>

<script src="script_reply-contact-message.js"></script>
<?php include 'include_footer.php'; ?>