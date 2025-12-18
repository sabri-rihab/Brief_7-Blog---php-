<?php 
// session_start();
require 'db.php';

/*------------------------- Articles -------------------------------------*/
function showArticles($pdo){
    $sql = "select * from articles";
    $articles = $pdo->query($sql);

    return $articles->fetchAll();
}

/*------------------------- Comments -------------------------------------*/
function showComments($pdo){
    $sql = "select * from comments";
    $comments = $pdo->query($sql);
    
    return $comments->fetchAll();
}

/*------------------------- Categories -------------------------------------*/
function showCategories($pdo){
    $sql = "select * from categories";
    $categories = $pdo->query($sql);
    
    return $categories->fetchAll();
}

/*------------------------- Count Comments -------------------------------------*/
function countComments($pdo, $artID){
    $sql = "select count(*) from comments where article = ".$artID;
    $commentsCount = $pdo->query($sql);

    return $commentsCount->fetchColumn();
}

/*------------------------- Count ARTicle per comment -------------------------------------*/
function countArticlesByCatg($pdo, $catgID){
    $sql = "select count(*) from articles where catg_id = ".$catgID;
    $articlesCount = $pdo->query($sql);

    return $articlesCount->fetchColumn();
}   

/*------------------------- Add User -------------------------------------*/
function addUser($pdo, $email, $name, $password){
    $sql = "insert into users (email, userName, password, status)
            values ('".$email."', '".$name."', '".$password."', 'author')";
    $pdo->exec($sql);
}

/*------------------------------------------------- */
function getUsersArticles($pdo, $user_id){
    $sql = "
        SELECT articles.*, categories.name AS category_name
        FROM articles
        JOIN categories ON articles.catg_id = categories._id
        WHERE articles.user_id = ?
    ";
    $articles = $pdo->prepare($sql);
    $articles->execute([$user_id]);
    
    return $articles->fetchAll();
}


/*-------------------   chack id user exist in login    ------------------------------ */
function checkIfUserExist($pdo, $email, $password){
    $sql = "select * from users where email = ?";
    $user = $pdo->prepare($sql);
    $user->execute([$email]);

    $user = $user->fetch(PDO::FETCH_ASSOC);
    if($user && $user['password'] === $password){
        return $user;
    }else{
        return false;
    }
}

?>
