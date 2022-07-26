<?php 

session_start(); 

if ($_SESSION["submit-captcha"] == $_POST["data-captcha"]) {

    if(isset($_POST['data-username']) && !empty($_POST['data-username']) 
    && isset($_POST['data-email']) && !empty($_POST['data-email']) 
    && isset($_POST['data-subject']) && !empty($_POST['data-subject'])
    && isset($_POST['data-message']) && !empty($_POST['data-message'])){

        $contact_username = strip_tags($_POST["data-username"]);
        $contact_email = strip_tags($_POST["data-email"]);
        $contact_sended =  date("Y-m-d H:i:s");

        $email_subject = strip_tags($_POST["data-subject"]);
        $email_message = strip_tags($_POST["data-message"]);

        // echo 'Nom : ' . $contact_username . '<br> Email :' . $contact_email . '<br> Sujet :' . $email_subject . '<br> Message :' . $email_message ;   

        $email_recipient  = "Solange Harmonie PICARD <s.picard@codeur.online>";
        $email_headers = "From: " . $contact_username . "<". $contact_email .">\r\n";
        $email_headers .= 'MIME-Version: 1.0' . "\r\n";
        $email_headers .= 'Content-Type: text/html; charset=utf-8' . "\r\n";

        if(mail($email_recipient, $email_subject, $email_message, $email_headers)) {
            $_SESSION['message'] = "Message envoyé !";
        } else {
            $_SESSION['message'] = "Le message n'a pas été envoyé...";
        }

        require_once('db_connect.php');

        $sql = 'INSERT INTO `tbl_contacts` (`contact_username`, `contact_email`, `contact_subject`, `contact_message`, `contact_sended`) VALUES (:contact_username, :contact_email, :contact_subject, :contact_message, :contact_sended)';
        $query = $db->prepare($sql);
        $query->bindValue(':contact_username', $contact_username, PDO::PARAM_STR);
        $query->bindValue(':contact_email', $contact_email, PDO::PARAM_STR);
        $query->bindValue(':contact_subject', $email_subject, PDO::PARAM_STR);
        $query->bindValue(':contact_message', $email_message, PDO::PARAM_STR);
        $query->bindValue(':contact_sended', $contact_sended, PDO::PARAM_STR);
        $query->execute();

        header('Location: index.php');

    } else {

        $_SESSION['message'] = 'Remplissez tous les champs !';

        header('Location: index.php');

    }

} else {
    $_SESSION['message'] = "Vous êtes un robot ?!";
    header('Location: index.php'); 
}

// EOF
