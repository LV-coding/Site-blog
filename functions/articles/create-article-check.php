<?php 
require($_SERVER['DOCUMENT_ROOT'].'/functions/form-validation.php');
require($_SERVER['DOCUMENT_ROOT'].'/functions/connection.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();
    if (isset($_SESSION['username'])) {

        $title = validate_form($_POST['title']);
        $text = validate_form($_POST['text']);

    
        if ($title && $text) {
            $query = $connect->prepare('INSERT INTO blog.articles (title, text, author) VALUES (:title, :text, :author)');
            $query->execute(['title'=>$title, 'text'=>$text, 'author'=>$_SESSION['username']]);

            header('location: ../../pages/my-articles.php');
        }
    } else {
        header('location: ../../pages/create-article.php');
    }
}

?>