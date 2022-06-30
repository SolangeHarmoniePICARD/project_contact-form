<?php 

session_start(); 

if(isset($_POST['data-username']) && !empty($_POST['data-username']) 
&& isset($_POST['data-email']) && !empty($_POST['data-email']) 
&& isset($_POST['data-subject']) && !empty($_POST['data-subject'])
&& isset($_POST['data-message']) && !empty($_POST['data-message'])){

    $contact_username = strip_tags($_POST["data-username"]);
	$contact_email = strip_tags($_POST["data-email"]);

	$mail_subject = strip_tags($_POST["data-subject"]);
	$mail_message = strip_tags($_POST["data-message"]);

    // echo 'Nom : ' . $contact_username . '<br> Email :' . $contact_email . '<br> Sujet :' . $mail_subject . '<br> Message :' . $mail_message ;   

    $mail_recipient  = "Solange Harmonie PICARD <s.picard@codeur.online>";
    $mail_headers = "From: " . $contact_username . "<". $contact_email .">\r\n";
    $mail_headers .= 'MIME-Version: 1.0' . "\r\n";
    $mail_headers .= 'Content-Type: text/plain; charset=utf-8' . "\r\n";

    if(mail($mail_recipient, $mail_subject, $mail_message, $mail_headers)) {
        $_SESSION['message'] = "Message envoyé !";
    } else {
        $_SESSION['message'] = "Le message n'a pas été envoyé...";
    }

    require_once('db_connect.php');

    $sql = 'INSERT INTO `tbl_contacts` (`contact_username`, `contact_email`, `contact_subject`, `contact_message`) VALUES (:contact_username, :contact_email, :contact_subject, :contact_message)';
    $query = $db->prepare($sql);
    $query->bindValue(':contact_username', $contact_username, PDO::PARAM_STR);
    $query->bindValue(':contact_email', $contact_email, PDO::PARAM_STR);
    $query->bindValue(':contact_subject', $mail_subject, PDO::PARAM_STR);
    $query->bindValue(':contact_message', $mail_message, PDO::PARAM_STR);
    $query->execute();

    header('Location: index.php');

} else {

    $_SESSION['message'] = 'Remplissez tous les champs !';

    header('Location: index.php');

}

// EOF
