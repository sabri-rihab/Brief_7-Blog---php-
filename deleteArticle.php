<?php
session_start();
require 'db.php';
require 'functions.php';

// Make sure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['delete_article'])) {
    $article_id = $_POST['article_id'];

    $article = getArticleByID($pdo, $article_id);
    if ($article['user_id'] === $_SESSION['user_id']) {
        deleteArticle($pdo, $article_id);
    }

header("Location: profile.php");
    exit;
}