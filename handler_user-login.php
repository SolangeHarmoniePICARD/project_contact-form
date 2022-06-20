<?php 

session_start();

if(isset($_POST['data-username']) && !empty($_POST['data-username']) 
&& isset($_POST['data-password']) && !empty($_POST['data-password'])){

    require_once('db_connect.php');

    $sql = 'SELECT user_id, user_username, user_password FROM tbl_users WHERE user_username = :user_username';
    $query = $db->prepare($sql);
    $query->execute(array('user_username' => $_POST['data-username']));
    $result = $query->fetch();


        $checking_password = password_verify($_POST['data-password'], $result['user_password']);

        if ($checking_password) {

            $_SESSION['id'] = $result['user_id'];
            $_SESSION['username'] = $result['user_username'];
            $_SESSION['message'] = 'Connexion réussie !';
            header('Location: view_contact-form-messages.php');

        }else{


            $_SESSION['message'] = 'Le nom d\'utilisateur ou le mot de passe sont incorrects.';
            header('Location: view_user-login.php');

        } 

} else {

    $_SESSION['message'] = 'Complétez tous les champs.';
    header('Location: view_user-login.php'); 

}