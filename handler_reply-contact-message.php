<?php

session_start();

if( isset($_POST['data-id']) && !empty($_POST['data-id'])
&& isset($_POST['data-username']) && !empty($_POST['data-username']) 
&& isset($_POST['data-email']) && !empty($_POST['data-email']) 
&& isset($_POST['data-subject']) && !empty($_POST['data-subject'])
&& isset($_POST['data-reply']) && !empty($_POST['data-reply'])){

    $contact_id = strip_tags($_POST['data-id']) ;
    $contact_username = strip_tags($_POST['data-username']) ;
    $contact_email = strip_tags($_POST['data-email']) ;
    $contact_information = $contact_username . '<' . $contact_email .'>' ;

    $email_subject = strip_tags($_POST['data-subject']) ;
    $email_reply = strip_tags($_POST['data-reply']) ;
    $email_headers = "From: Solange Harmonie PICARD <s.picard@codeur.online>\r\n";
    $email_headers .= 'MIME-Version: 1.0' . "\r\n";
    $email_headers .= 'Content-Type: text/html; charset=utf-8' . "\r\n";

        if(mail($contact_information, 'Réponse à votre message : '. $email_subject, $email_reply, $email_headers)) {
            $_SESSION['message'] = 'Votre message a été envoyé à ' . $contact_email . ' !';
        } else {
            $_SESSION['message'] = "Votre message n'a pas été envoyé...";
        }

        require_once('db_connect.php');

        $sql = 'UPDATE `tbl_contacts` SET `contact_reply`=:contact_reply WHERE `contact_id`=:contact_id';
        $query = $db->prepare($sql);
        $query->bindValue(':contact_id', $contact_id, PDO::PARAM_STR);
        $query->bindValue(':contact_reply', $email_reply, PDO::PARAM_STR);
        $query->execute();

    header('Location: view_contact-messages-list.php');  

} else {

    $_SESSION['message'] = 'Remplissez tous les champs !';
    header('Location: index.php');
    
}

// EOF