<?php require($_SERVER['DOCUMENT_ROOT'].'/components/header.php');
      require($_SERVER['DOCUMENT_ROOT'].'/functions/my-articles-read.php'); ?>

<h3 class="mib-3 title">My articles</h3>
<?php 
$articles = show_user_articles();

if ($articles) {
    foreach($articles as $article) {
        print json_encode($article);
    }
} else {
    print '<p>You have no articles written yet !!!</p>';
} 


require($_SERVER['DOCUMENT_ROOT'].'/components/footer.php') ?>