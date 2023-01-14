<?php 
require($_SERVER['DOCUMENT_ROOT'].'/functions/connection.php');
require($_SERVER['DOCUMENT_ROOT'].'/functions/init/config.php');



class Article {

    public $connect;

    public function __construct() {
        require($_SERVER['DOCUMENT_ROOT'].'/functions/init/config.php');
        $this->connect = new PDO("mysql:host={$config['host']}; db_name={$config['db_name']}; charset=utf8", "{$config['db_user']}", "{$config['db_password']}");
    }

    public function select_articles($rows="*", $where="") {
        if ($where) {
            $sql = "SELECT $rows FROM blog.articles WHERE $where ORDER BY id DESC ";
        } else {
            $sql = "SELECT $rows FROM blog.articles ORDER BY id DESC ";
        }

        $articles = $this->connect->query($sql);
        $articles = $articles->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }

    public function create_article($title, $text, $author) {
        $query = $this->connect->prepare('INSERT INTO blog.articles (title, text, author) VALUES (:title, :text, :author)');
        $query->execute(['title'=>$title, 'text'=>$text, 'author'=>$author]);

    }

    public function delete_article($delete_id) {
        $query = $this->connect->prepare("DELETE FROM blog.articles WHERE id=:delete_id");
        $query->execute(['delete_id'=>$delete_id]);
    }

    public function edit_article($text, $title, $edit_id) {
        $query = $this->connect->prepare('UPDATE blog.articles SET text=:text, title=:title WHERE id=:edit_id ');
        $query->execute(['text'=>$text, 'title'=>$title, 'edit_id'=>$edit_id]);
    }

}


?>