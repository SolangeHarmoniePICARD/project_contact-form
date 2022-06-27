<?php

session_start();

if($_GET['user-email']){

    $user_email = strip_tags($_GET['user-email']);
    $user_unencrypted_pswd = strip_tags($_POST['data-pswd']);
    $user_encrypted_pswd = password_hash($user_unencrypted_pswd , PASSWORD_DEFAULT);

    require_once('db_connect.php');
    $sql = 'UPDATE `tbl_users` SET `user_password`=:user_password WHERE `user_email`=:user_email';
    $query = $db->prepare($sql);
    $query->bindValue(':user_password', $user_encrypted_pswd, PDO::PARAM_STR);
    $query->bindValue(':user_email', $user_email, PDO::PARAM_STR);
    $query->execute();

    // Redirection
    $_SESSION['message'] = 'Mot de passe modifié.';
    header('Location: view_user-login.php'); 

//If the form fields are empty
} else {

    $_SESSION['message'] = 'Il y a un problème.';
    header('Location: index.php');

}