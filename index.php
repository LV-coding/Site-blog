<?php require($_SERVER['DOCUMENT_ROOT'].'/functions/init/var.php'); 
      $var['page_title'] = "Blogs";

      require($_SERVER['DOCUMENT_ROOT'].'/components/header.php');
      require($_SERVER['DOCUMENT_ROOT'].'/models/model-article.php'); ?>

<h3 class="mib-3 title">Articles</h3>
<?php 
$model = new Article;
$articles = $model->select_articles();

if ($articles) {
    echo "<div class='container-articles'>";
    foreach($articles as $article) {
        #print json_encode($article);
        #echo "{$article['id']}";
        echo <<<html
        <div class="container-element">
        <a href="/pages/article.php?show_id={$article['id']}">
        <h5 class="container-element__title">{$article['title']}
        </h5></a>
        <div class="container-element__group">
        <p class="container-element"> by {$article['author']}</p>
        <p class="container-element">{$article['datetime']}</p>
        </div>
        </div>
        html;
    }
    echo "</div>";
} else {
    print '<p>No articles have been written yet !!!</p>';
} 

require($_SERVER['DOCUMENT_ROOT'].'/components/footer.html') ?>