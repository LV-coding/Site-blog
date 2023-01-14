<?php 
require($_SERVER['DOCUMENT_ROOT'].'/functions/form-validation.php');
require($_SERVER['DOCUMENT_ROOT'].'/functions/connection.php');
require($_SERVER['DOCUMENT_ROOT'].'/models/model-user.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

    session_start();

    $name = validate_form($_POST['name']);
    $password = validate_form($_POST['password']);

    if ( $name && $password ) {

        $model = new User;
        $saved_password = $model->select_password($name);

        if(!$saved_password) {
            $_SESSION["login_error"] = "Invalid User or password !!!"; 
            header('location: ../pages/login.php');
            die(); 
        } 

        if (password_verify($password, $saved_password)) {
            $_SESSION["username"] = $name;
            header('location: ../pages/my-articles.php');
            die(); 
        } else {
            $_SESSION["login_error"] = "Invalid User or password !!!"; 
            header('location: ../pages/login.php');
            die(); 
        }

    } else {
        $_SESSION["login_error"] = "No valid value !!!";
        header('location: ../pages/login.php');
        die(); 
    }
} 


?>