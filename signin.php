<?php
session_start();
require 'db.php';
require 'functions.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = checkIfUserExist($pdo, $email, $password);

    if($user){
        $_SESSION['user_id'] = $user['userName'];
        header("Location: profile.php");
        exit;
    } else {
        echo "Invalid email or password!";
    }
}

?>