
<?php

session_start();

if($_GET['user-email'] && $_GET['token-string']){

        $user_email = strip_tags($_GET['user-email']);
        $token_string = strip_tags($_GET['token-string']);

        require_once('db_connect.php');
        $sql = 'SELECT * FROM tbl_tokens WHERE token_string = :token_string';
        $query = $db->prepare($sql);
        $query->execute(array('token_string' => $token_string));
        $result = $query->fetch();

        if(!$result){

            $_SESSION['message'] = 'Quelque chose a mal fonctionné...';
            header('Location: index.php'); 

        } else {

            // $_SESSION['message'] = 'Ça marche !';
            header('Location: view_pswd-update.php?user-email=' . $user_email);  

        }
    
} else {

    $_SESSION['message'] = 'Il y a un problème...';
    header('Location: index.php'); 

 }

 // EOF