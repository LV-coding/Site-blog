<?php 

require($_SERVER['DOCUMENT_ROOT'].'/functions/init/config.php');

try {
    $connect = new PDO("mysql:host={$config['host']}; db_name={$config['db_name']}; charset=utf8", "{$config['db_user']}", "{$config['db_password']}");
} catch (PDOException $е) {
    echo "Couldn't connect to the database: " . $e->getMessage();
}


?>