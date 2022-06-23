<?php 

// User logout
session_start();
$_SESSION = array();
session_destroy();

// Logout Success Message
session_start();
$_SESSION['message'] = 'Vous êtes déconnecté !';
header('Location: index.php');

// EOF