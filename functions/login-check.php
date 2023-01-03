<?php 
require($_SERVER['DOCUMENT_ROOT'].'/functions/form-validation.php');
require($_SERVER['DOCUMENT_ROOT'].'/functions/connection.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

    session_start();

    $name = validate_form($_POST['name']);
    $password = validate_form($_POST['password']);

    if ( $name && $password ) {

        $query = $connect->prepare('SELECT password FROM blog.users WHERE name=:name');
        $query->execute(['name'=>$name]);
        $saved_password = $query->fetch()[0];

        if($saved_password) {
            
            if (password_verify($password, $saved_password)) {
                $_SESSION["username"] = $name;
                header('location: ../index.php');
            } else {
                $_SESSION["login_error"] = "Invalid User or password !!!"; 
                header('location: ../pages/login.php');
            }

        } else {
            $_SESSION["login_error"] = "Invalid User or password !!!"; 
            header('location: ../pages/login.php');
        }

    } else {
        $_SESSION["login_error"] = "No valid value !!!";
        header('location: ../pages/login.php');
    }
} 


?>