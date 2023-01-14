<?php require($_SERVER['DOCUMENT_ROOT'].'/models/model-article.php');
      require($_SERVER['DOCUMENT_ROOT'].'/functions/form-validation.php');


if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_id'])) {

    $delete_id = validate_form($_GET['delete_id']);
    $delete_id = validate_int($delete_id);

    if (!$delete_id) {
        header('location: ../../error/404.php');
        die(); 
    }

    global $connect;

    $check_author = $connect->prepare("SELECT id FROM blog.articles WHERE author='{$_SESSION['username']}' and id=:delete_id ");
    $check_author->execute(['delete_id'=>$delete_id]);

    if(!$check_author) {
        header('location: ../../error/403.php');
        die(); 
    } 
    
    $model = new Article;
    $article = $model->delete_article($delete_id);

    header('location: /pages/my-articles.php');
    die(); 
    
    
} 
?>