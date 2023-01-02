<?php 
try {
    $connect = new PDO("mysql:host=localhost; db_name=blog; charset=utf8", "root", "");
} catch (PDOException $е) {
    echo "Couldn't connect to the database: " . $e->getMessage();
}


?>