<?php require($_SERVER['DOCUMENT_ROOT'].'/functions/connection.php');

function show_user_articles():iterable {
    #session_start();

    if (isset($_SESSION['username'])) {

        global $connect;

        $query = $connect->prepare("SELECT id, title, text, datetime, author FROM blog.articles WHERE author=:user ORDER BY id DESC");
        $query -> execute(['user'=> $_SESSION['username']]);
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);

        return $articles;

    } else {
        return ["error" => "You must be log in/"];
    }
}


?>