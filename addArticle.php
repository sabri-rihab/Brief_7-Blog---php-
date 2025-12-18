<?php
session_start();
require 'db.php';
require 'functions.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['add_article'])) {
    $title   = $_POST['title'];
    $content = $_POST['content'];
    $imageName   = $_FILES['image']['name'];
    $tmpName   = $_FILES['image']['tmp_name'];
    $catg_id = $_POST['category'];
    $status  = $_POST['status'];
    $user_id = $_SESSION['user_id'];


    move_uploaded_file($tmpName, "images/". $imageName);
    addArticle($pdo, $title, $content, $imageName, $catg_id, $user_id, $status);

    header("Location: profile.php");
    exit;
}


?>