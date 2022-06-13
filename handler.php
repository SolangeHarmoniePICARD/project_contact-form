<?php 

session_start(); 

if(isset($_POST['data-username']) && !empty($_POST['data-username']) 
&& isset($_POST['data-email']) && !empty($_POST['data-email']) 
&& isset($_POST['data-subject']) && !empty($_POST['data-subject'])
&& isset($_POST['data-message']) && !empty($_POST['data-message'])){

    $contact_username = strip_tags($_POST["data-username"]);
	$contact_email = strip_tags($_POST["data-email"]);
	$contact_subject = strip_tags($_POST["data-subject"]);
	$contact_message = strip_tags($_POST["data-message"]);

    $mail_recipient  = "s.picard@codeur.online";
    $mail_headers = "From: " . $contact_username . "<". $contact_email .">\r\n";

    require_once('db_connect.php');
        
    
    if(mail($mail_recipient, $contact_subject, $contact_message, $mail_headers)) {
        $_SESSION['message'] = "Message envoyé !";
    } else {
        $_SESSION['message'] = "Le message n'a pas été envoyé...";
    }

    header('Location: index.php');

} else {

    $_SESSION['message'] = 'Remplissez tous les champs !';

    header('Location: index.php');

}

// EOF