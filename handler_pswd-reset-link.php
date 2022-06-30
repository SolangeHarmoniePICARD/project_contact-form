<?php

session_start();

require_once('db_connect.php');
$sql = 'SELECT * FROM tbl_users WHERE user_email = :user_email';
$query = $db->prepare($sql);
$query->execute(array('user_email' => $_POST['data-email']));
$result = $query->fetch();

if(!$result){

    $_SESSION['message'] = 'Votre adresse n\'existe pas !';
    header('Location: index.php'); 

} else {

    $user_id = $result['user_id'];
    $token_string = md5(rand());

    require_once('db_connect.php');
    $sql = 'INSERT INTO tbl_tokens(`token_string`, `user_id`) VALUES(:token_string, :user_id)';
    $query = $db->prepare($sql);
    $query->bindValue(':token_string', $token_string, PDO::PARAM_STR);
    $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $query->execute();

    $user_email = $result['user_email'];
    $user_information = $result['user_username'] . '<' . $result['user_email'] . '>';

    $user_link = "http://localhost/feature_contact-form/handler_check-token.php?user-email=" . $user_email . "&token-string=" . $token_string ;
    $email_headers = "From: Solange Harmonie PICARD <s.picard@codeur.online>\r\n";
    $email_headers .= 'MIME-Version: 1.0' . "\r\n";
    $email_headers .= 'Content-Type: text/html; charset=utf-8' . "\r\n";

    if(mail($user_information, 'Réinitialisez votre mot de passe', "Cliquez pour modifier votre mot de passe: <a href=" . $user_link .">" .  $user_link . "</a>" , $email_headers)) {
        $_SESSION['message'] = "Consultez votre boîte mail pour réinitialiser votre mot de passe.";
    } else {
        $_SESSION['message'] = "Il semblerait que quelque chose n'ait pas fonctionné...";
	}

    header('Location: index.php');

}
