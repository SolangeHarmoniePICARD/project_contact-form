<?php

session_start();

  if(isset($_POST['data-username']) && !empty($_POST['data-username']) 
    && isset($_POST['data-email']) && !empty($_POST['data-email']) 
    && isset($_POST['data-password']) && !empty($_POST['data-password']) 
    && isset($_POST['data-pswdConfirmation']) && !empty($_POST['data-pswdConfirmation'])){

        echo 'Ça marche ! 🥳';

    } else {
        $_SESSION['message'] = 'Completez tous les champs !';
        header('Location: view_user-registration.php'); 
    }

?>