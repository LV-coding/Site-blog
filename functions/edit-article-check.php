<?php 
require($_SERVER['DOCUMENT_ROOT'].'/functions/form-validation.php');
require($_SERVER['DOCUMENT_ROOT'].'/functions/connection.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();
    if (isset($_SESSION['username'])) {

        $title = validate_form($_POST['title']);
        $text = validate_form($_POST['text']);

    
        if ($title && $text) {
            $query = $connect->prepare('UPDATE blog.articles SET text=:text, title=:title WHERE id=:edit_id '); // 
            $query->execute(['text'=>$text, 'edit_id'=>$_SESSION['edit_id'], 'title'=>$title]); //,

            unset($_SESSION['edit_id']);

            header('location: ../pages/my-articles.php');
        }
    } else {
        header('location: ../pages/my-articles.php');
    }
} 

?>