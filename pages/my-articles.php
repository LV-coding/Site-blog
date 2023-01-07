<?php require($_SERVER['DOCUMENT_ROOT'].'/components/header.php');
      require($_SERVER['DOCUMENT_ROOT'].'/functions/my-articles-read.php'); ?>

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
        <p class="container-element__date">{$article['datetime']}</p>
        <div class="container-element__link">
            <a href='#'>DELETE</a>
            <a href='#'>UPDATE</a>
        </div>
        <p class="container-element__text">{$article['text']}</p>
        </div>
        html;
    }
    echo "</div>";
} else {
    print '<p>You have no articles written yet !!!</p>';
} 


require($_SERVER['DOCUMENT_ROOT'].'/components/footer.php') ?>