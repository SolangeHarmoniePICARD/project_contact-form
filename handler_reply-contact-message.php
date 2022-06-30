<?php

session_start();

$contact_username = strip_tags($_POST['data-username']) ;
$contact_email = strip_tags($_POST['data-email']) ;
$contact_information = $contact_username . '<' . $contact_email .'>' ;

$email_reply = strip_tags($_POST['data-reply']) ;
$email_subject = strip_tags($_POST['data-subject']) ;
$email_headers = "From: Solange Harmonie PICARD <s.picard@codeur.online>\r\n";
$email_headers .= 'MIME-Version: 1.0' . "\r\n";
$email_headers .= 'Content-Type: text/html; charset=utf-8' . "\r\n";

    if(mail($contact_information, 'Réponse à votre message : '. $email_subject, $email_reply, $email_headers)) {
        $_SESSION['message'] = 'Votre message a été envoyé à ' . $contact_email . ' !';
    } else {
        $_SESSION['message'] = "Votre message n'a pas été envoyé...";
	}

header('Location: view_contact-messages-list.php');  