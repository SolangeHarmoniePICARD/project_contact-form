<?php

session_start();

$contact_email = strip_tags($_POST['data-email']) ;
$contact_reply = strip_tags($_POST['data-reply']) ;
$contact_subject = strip_tags($_POST['data-subject']) ;
$email_headers = "From: " . "s.picard@codeur.online" . "<Solange Harmonie PICARD>\r\n";

    if(mail($contact_email, 'Réponse à votre message : '. $contact_subject, $contact_reply, $email_headers)) {
        $_SESSION['message'] = 'Votre message a été envoyé à ' . $contact_email . ' !';
    } else {
        $_SESSION['message'] = "Votre message n'a pas été envoyé...";
	}

header('Location: view_contact-messages-list.php');  