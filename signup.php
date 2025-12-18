<?php
session_start();
require 'db.php';
require 'functions.php';

if(isset($_POST['submit'])){
    $userName = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user_id = addUser($pdo, $email, $userName, $password);
    $_SESSION['user_id'] = $userName;

    header("Location: profile.php");
    exit;
}
?>