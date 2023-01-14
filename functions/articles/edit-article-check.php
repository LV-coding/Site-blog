<?php 
require($_SERVER['DOCUMENT_ROOT'].'/functions/form-validation.php');
require($_SERVER['DOCUMENT_ROOT'].'/models/model-article.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = validate_form($_POST['title']);
    $text = validate_form($_POST['text']);

    session_start();
    $edit_id = $_SESSION['edit_id'];
    
    $check_author = $connect->prepare("SELECT id FROM blog.articles WHERE author='{$_SESSION['username']}' and id=:edit_id ");
    $check_author->execute(['edit_id'=>$edit_id]);

    if(!$check_author) {
        header('location: ../../error/403.php');
        die(); 
    } 

    if ($title && $text) {

        $model = new Article;
        $article = $model->edit_article($text, $title, $edit_id);
    
        unset($_SESSION['edit_id']);
        
        header('location: ../../pages/my-articles.php');
        die(); 
    } else {
        header('location: ../../error/400.php');
        die(); 
    }
} 

?>