<?php

session_start();

  if(isset($_POST['data-username']) && !empty($_POST['data-username']) 
    && isset($_POST['data-email']) && !empty($_POST['data-email']) 
    && isset($_POST['data-password']) && !empty($_POST['data-password']) 
    && isset($_POST['data-pswdConfirmation']) && !empty($_POST['data-pswdConfirmation'])){

        if ($_POST['data-password'] == $_POST['data-pswdConfirmation']) {

            $user_username = strip_tags($_POST['data-username']);
            $user_email = strip_tags($_POST['data-email']);
            $user_unencrypted_password = strip_tags($_POST['data-password']);
            $user_encrypted_password = password_hash($user_unencrypted_password, PASSWORD_DEFAULT);

            require_once('db_connect.php');
            $sql = 'INSERT INTO tbl_users(`user_username`, `user_password`, `user_email`) VALUES(:user_username, :user_password, :user_email)';
            $query = $db->prepare($sql);
            $query->bindValue(':user_username', $user_username, PDO::PARAM_STR);
            $query->bindValue(':user_password', $user_encrypted_password, PDO::PARAM_STR);
            $query->bindValue(':user_email', $user_email, PDO::PARAM_STR);
            $query->execute();

            $_SESSION['message'] = 'Nouvel utilisateur enregistré !';
            header('Location: index.php'); 

        } else {
            $_SESSION['message'] = 'Les mots de passe ne correspondent pas...';
            header('Location: view_user-registration.php'); 
        }

    } else {
        $_SESSION['message'] = 'Completez tous les champs !';
        header('Location: view_user-registration.php'); 
    }

?>