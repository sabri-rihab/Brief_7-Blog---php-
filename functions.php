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
/*------------------    GET ARTICLE'S COMMENTS  -------------------------- */
function getCatgByArticleID($pdo, $catg_id){
    $sql = "select name from categories where _id = ?";
    $catg = $pdo->prepare($sql);
    $catg->execute([$catg_id]);
    return $catg->fetch();
}


/*------------------    GET ARTICLE'S COMMENTS  -------------------------- */
function getArticleComments($pdo, $article_id){
    $sql = "SELECT * FROM comments WHERE article = ?";
    $cmts = $pdo->prepare($sql);
    $cmts->execute([$article_id]);

    return $cmts->fetchAll();
}
/*-------------------   check Comment Owner  ------------------------------ */
function checkCommentOwner($pdo, $comment_id){
    $sql = "select userName from comments where _id = ?";
    $stm = $pdo->prepare($sql);
    $stm->execute([$comment_id]);
    return $stm->fetch();
}

/*-------------------   Add comment    ------------------------------ */

function addComment($pdo, $userName,$content, $article_id){
    $sql = "insert into comments (userName, content, article, status) 
    values (?,?,?, 'approved');";
    $sql = $pdo->prepare($sql);
    $sql->execute([$userName, $content, $article_id]);
}
/*-------------------   Delete comment    ------------------------------ */
function deleteComment($pdo, $comment_id){
    $sql = "DELETE FROM comments WHERE _id = ?";
    $stm = $pdo->prepare($sql);
    $stm->execute([$comment_id]);
}

/*-------------------   get article by ID    ------------------------------ */
function getArticleByID($pdo, $article_id){
    $sql = "select * from articles where _id = ?";
    $stm = $pdo->prepare($sql);
    $stm->execute([$article_id]);
    return $stm->fetch();
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

/*----------------------   get user by id  -------------------------------------*/
function getUserById($pdo, $user_id){
    $sql = "select * from users where userName = ?";
    $user = $pdo->prepare($sql);
    $user->execute([$user_id]);
    return $user->fetch();
}

/*----------------------   Add Article  -------------------------------------*/
function addArticle($pdo, $title, $content, $image, $catg_id, $user_id, $status){
    $sql = "insert into articles (title, content, imgURL, status, user_id, catg_id) 
    values (?,?,?,?,?,?);";
    $sql = $pdo->prepare($sql);
    $sql->execute([$title, $content, $image, $status, $user_id, $catg_id]);           
}

?>