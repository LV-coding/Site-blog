<?php 
require($_SERVER['DOCUMENT_ROOT'].'/functions/form-validation.php');
require($_SERVER['DOCUMENT_ROOT'].'/models/model-article.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();
    if (isset($_SESSION['username'])) {

        $title = validate_form($_POST['title']);
        $text = validate_form($_POST['text']);

    
        if ($title && $text) {
            
            $model = new Article;
            $article = $model->create_article($title, $text, $_SESSION['username']);

            header('location: ../../pages/my-articles.php');
            die(); 
        }
    } else {
        header('location: ../../pages/create-article.php');
        die(); 
    }
}

?>