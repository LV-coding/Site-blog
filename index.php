<?php require($_SERVER['DOCUMENT_ROOT'].'/functions/init/var.php'); 
      $var['page_title'] = "Blogs";

      require($_SERVER['DOCUMENT_ROOT'].'/components/header.php');
      require($_SERVER['DOCUMENT_ROOT'].'/functions/articles/articles-read.php'); ?>

<h3 class="mib-3 title">Articles</h3>
<?php 
$articles = show_all_articles();

if ($articles) {
    echo "<div class='container-articles'>";
    foreach($articles as $article) {
        #print json_encode($article);
        #echo "{$article['id']}";
        echo <<<html
        <div class="container-element">
        <h5 class="container-element__title">{$article['title']}
        </h5>
        <p class="container-element__author"> by {$article['author']}</p>
        <p class="container-element__date">{$article['datetime']}</p>
        <p class="container-element__text">{$article['text']}</p>
        </div>
        html;
    }
    echo "</div>";
} else {
    print '<p>No articles have been written yet !!!</p>';
} 

require($_SERVER['DOCUMENT_ROOT'].'/components/footer.html') ?>