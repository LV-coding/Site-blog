<?php require($_SERVER['DOCUMENT_ROOT'].'/functions/connection.php');
      require($_SERVER['DOCUMENT_ROOT'].'/functions/form-validation.php');

function show_user_articles():iterable {
    #session_start();

    if (isset($_SESSION['username'])) {

        global $connect;

        $articles = $connect->query("SELECT id, title, text, datetime, author FROM blog.articles WHERE author='{$_SESSION['username']}' ORDER BY id DESC");
        $articles = $articles->fetchAll(PDO::FETCH_ASSOC);

        return $articles;

    } 
    // else {
    //     return ["error" => "You must be log in/"];
    // }
}



?>