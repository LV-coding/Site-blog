<?php require($_SERVER['DOCUMENT_ROOT'].'/functions/connection.php');
      require($_SERVER['DOCUMENT_ROOT'].'/functions/form-validation.php');


if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_id'])) {

    $delete_id = validate_form($_GET['delete_id']);

    if ($delete_id) {
        global $connect;

        $check_author = $connect->prepare("SELECT id FROM blog.articles WHERE author='{$_SESSION['username']}' and id=:delete_id ");
        $check_author->execute(['delete_id'=>$delete_id]);

        if($check_author) {
            $query = $connect->prepare("DELETE FROM blog.articles WHERE id=:delete_id");
            $query->execute(['delete_id'=>$delete_id]);

            header('location: /pages/my-articles.php');
        } 
    }
} 
?>