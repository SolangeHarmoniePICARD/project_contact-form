<?php 

session_start(); 

$name = $_POST['data-name'];
$email = $_POST['data-email'];
$message = $_POST['data-message'];


echo "$name <br> $email <br> $message ";

// EOF