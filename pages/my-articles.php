<?php require($_SERVER['DOCUMENT_ROOT'].'/functions/init/var.php'); 
      $var['page_title'] = "My articles";
      require($_SERVER['DOCUMENT_ROOT'].'/components/header.php');
      require($_SERVER['DOCUMENT_ROOT'].'/functions/articles/my-articles-read.php'); ?>

<h3 class="mib-3 title">My articles</h3>
<?php 
$articles = show_user_articles();

if ($articles) {
    echo "<div class='container-articles'>";
    foreach($articles as $article) {
        #print json_encode($article);
        #echo "{$article['id']}";
        echo <<<html
        <div class="container-element">
        <h5 class="container-element__title">{$article['title']}
        </h5>

        <div class="container-element__group">
        <div class="container-element__link">
            <a href='/functions/articles/delete-article.php?delete_id={$article['id']}'>DELETE</a>
            <a href='/pages/edit-article.php?edit_id={$article['id']}''>UPDATE</a>
        </div>
        <div>
        <p class="container-element">{$article['datetime']}</p>
        </div>
        </div>

        </div>
        html;
    }
    echo "</div>";
} else {
    print '<p>You have no articles written yet !!!</p>';
} 


require($_SERVER['DOCUMENT_ROOT'].'/components/footer.html') ?>