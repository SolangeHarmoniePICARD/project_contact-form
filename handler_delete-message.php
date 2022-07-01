<?php

session_start();

if($_SESSION['username']){

    if (isset($_GET['message_id']) && !empty($_GET['message_id'])) {
        require_once('db_connect.php');
        $message_id = $_GET['message_id'];
        $sql = 'SELECT * FROM `tbl_contacts` WHERE `contact_id` = :contact_id';
        $query = $db->prepare($sql);
        $query->bindValue(':contact_id', $message_id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch();

        if ($result) {
            $sql = 'DELETE FROM `tbl_contacts` WHERE `contact_id` = :contact_id';
            $query = $db->prepare($sql);
            $query->bindValue(':contact_id', $message_id, PDO::PARAM_INT);
            $query->execute();
            $_SESSION['message'] = "Message supprimé.";
            header('Location: view_contact-messages-list.php'); 
        } else {
            $_SESSION['message'] = "Aucun message ne porte cet id...";
            header('Location: view_contact-messages-list.php'); 
        }
    } else {
        $_SESSION['message'] = "L'URL n'est pas valide.";
        header('Location: view_contact-messages-list.php'); 
    }
} else {
    $_SESSION['message'] = "Le nom d'utilisateur ou le mot de passe n'est pas correct.";
    header('Location: index.php');
 }

// EOF