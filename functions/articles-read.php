<?php require($_SERVER['DOCUMENT_ROOT'].'/functions/connection.php');

function show_all_articles():iterable {

    global $connect;

    $articles = $connect->query("SELECT id, title, text, datetime, author FROM blog.articles ORDER BY id DESC");
    $articles = $articles->fetchAll(PDO::FETCH_ASSOC);

    return $articles;

}


?>