<?php 

session_start(); 

$_SESSION['message'] = 'Le nom d\'utilisateur saisi est ' . $_POST['data-username'];

header('Location: index.php');

// EOF