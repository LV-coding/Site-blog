<?php require($_SERVER['DOCUMENT_ROOT'].'/functions/init/var.php'); 
      $var['page_title'] = "Article";
      require($_SERVER['DOCUMENT_ROOT'].'/components/header.php');
      require($_SERVER['DOCUMENT_ROOT'].'/models/model-article.php');
      require($_SERVER['DOCUMENT_ROOT'].'/functions/form-validation.php');

if (($_SERVER["REQUEST_METHOD"] == "GET") && isset($_GET['show_id'])) {

        $show_id = validate_form($_GET['show_id']);
        $show_id = validate_int($show_id);

        if (!$show_id) {
            header('location: ../error/404.php');
            die(); 
        }

        $model = new Article;
        $result = $model->select_articles(where:"id='$show_id'");

        if (!$result) {
            header('location: ../error/404.php');
            die(); 
        }

        $article = $result[0];

        echo <<<html
        <div class="container-element">
            <h5 class="container-element__title">{$article['title']}</h5>
            <div>
            <p>{$article['text']}</p>
            </div>
            <div>
            <p>{$article['datetime']}</p>
            </div>
        </div>
        html;
        } 
// 1. Додати фільтри на числа на GET
// 2. редірект коли нема відповіді на запит
?>





<?php require($_SERVER['DOCUMENT_ROOT'].'/components/footer.html') ?>