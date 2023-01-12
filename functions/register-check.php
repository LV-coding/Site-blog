<?php 
require($_SERVER['DOCUMENT_ROOT'].'/functions/form-validation.php');
require($_SERVER['DOCUMENT_ROOT'].'/functions/connection.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

    session_start();

    $name = validate_form($_POST['name']);
    $password = validate_form($_POST['password']);
    $confirm_password = validate_form($_POST['confirm_password']);

    if ( $name && $password && $confirm_password ) {

        if ($password !== $confirm_password) {
            $_SESSION["registration_error"] = "Passwords must match !!!";
            header('location: ../pages/register.php');
        }

        $query = $connect->prepare('SELECT name FROM blog.users WHERE name=:name');
        $query->execute(['name'=>$name]);
        $user = $query->fetchAll();

        if(count($user) != 0) {
            $_SESSION["registration_error"] = "A user with that name already exists !!!";
            header('location: ../pages/register.php');
        } 

        $create_user = $connect->prepare('INSERT INTO blog.users (name, password) VALUES (:name, :password)');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $create_user->execute(['name'=>$name, 'password'=>$hashed_password]);

        $_SESSION["username"] = $name;

        $_SESSION["registered"] = "Registered";
        header('location: ../pages/register.php');

    } else {
        $_SESSION["registration_error"] = "No valid value !!!";
        header('location: ../pages/register.php');
    }
} 


?>