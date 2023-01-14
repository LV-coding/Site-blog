<?php 
require($_SERVER['DOCUMENT_ROOT'].'/functions/connection.php');
require($_SERVER['DOCUMENT_ROOT'].'/functions/init/config.php');


class User {

    public $connect;

    public function __construct() {
        require($_SERVER['DOCUMENT_ROOT'].'/functions/init/config.php');
        $this->connect = new PDO("mysql:host={$config['host']}; db_name={$config['db_name']}; charset=utf8", "{$config['db_user']}", "{$config['db_password']}");
    }

    public function create_user($name, $password) {
        $query = $this->connect->prepare('INSERT INTO blog.users (name, password) VALUES (:name, :password)');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query->execute(['name'=>$name, 'password'=>$hashed_password]);
    }

    public function select_users($name) {
  
        $sql = "SELECT * FROM blog.users WHERE name=:name";

        $query = $this->connect->prepare($sql);
        $query->execute(['name'=>$name]);
        $query->fetchAll(PDO::FETCH_ASSOC);

        return $query;
    }

    public function select_password($name) {
  
        $sql = "SELECT password FROM blog.users WHERE name=:name";

        $query = $this->connect->prepare($sql);
        $query->execute(['name'=>$name]);
        $query = $query->fetch()[0];

        return $query;
    }

    public function update_password($password, $name) {
        $query = $this->connect->prepare('UPDATE blog.users SET password=:password WHERE name=:name');
        $query->execute(['password'=>$password, 'name'=>$name]);
    }
}






?>