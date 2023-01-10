<?php require($_SERVER['DOCUMENT_ROOT'].'/functions/init/var.php'); 
      $var['page_title'] = "Create new article";
      require($_SERVER['DOCUMENT_ROOT'].'/components/header.php'); 

if (!isset($_SESSION["username"])) {
    echo "<p id='error_equal_pass'>You are not Log In !!!</p>";
}

?>

<h3 class="mib-3 title">Create new article</h3>
<form action="../functions/articles/create-article-check.php" method="post">
<div class="mb-3">
  <label for="titleInput1" class="form-label">Title</label>
  <input type="text" class="form-control" id="titleInput1" name="title">
</div>
<div class="mb-3">
  <label for="textTextarea1" class="form-label">Text</label>
  <textarea class="form-control" id="textTextarea1" rows="10" name="text"></textarea>
</div>

<div class="mb-3">
<input type="submit" class="btn btn-primary" value="Create Article">
</div>

</form>

<?php require($_SERVER['DOCUMENT_ROOT'].'/components/footer.html') ?>