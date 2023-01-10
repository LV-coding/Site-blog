<?php require($_SERVER['DOCUMENT_ROOT'].'/components/header.php'); 
      require($_SERVER['DOCUMENT_ROOT'].'/functions/form-validation.php');
      require($_SERVER['DOCUMENT_ROOT'].'/functions/connection.php');


if (($_SERVER["REQUEST_METHOD"] == "GET") && isset($_GET['edit_id'])) {

    $edit_id = validate_form($_GET['edit_id']);

    if ($edit_id) {
        global $connect;

        $check_author = $connect->prepare("SELECT id, title, text FROM blog.articles WHERE author='{$_SESSION['username']}' and id=:edit_id ");
        $check_author->execute(['edit_id'=>$edit_id]);
        if ($check_author) {
            $result = $check_author->fetch(PDO::FETCH_ASSOC);
            $_SESSION['edit_id'] = $result['id'];
        } else {
            header('location: index.php');
        }
        

    } else {
        $result = ['title'=>'', 'text'=>''];
    }

}

?>

<h3 class="mib-3 title">Update article</h3>
<form action="../functions/articles/edit-article-check.php" method="post">
<div class="mb-3">
  <label for="titleInput1" class="form-label">Title</label>
  <input type="text" class="form-control" id="titleInput1" name="title" value="<?php echo $result['title']; ?>">
</div>
<div class="mb-3">
  <label for="textTextarea1" class="form-label">Text</label>
  <textarea class="form-control" id="textTextarea1" rows="10" name="text"><?php echo $result['text']; ?></textarea>
</div>

<div class="mb-3">
<input type="submit" class="btn btn-primary" value="Update Article">
</div>

</form>
<?php require($_SERVER['DOCUMENT_ROOT'].'/components/footer.html') ?>