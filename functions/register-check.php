<?php 
require($_SERVER['DOCUMENT_ROOT'].'/functions/form-validation.php');
require($_SERVER['DOCUMENT_ROOT'].'/functions/connection.php');
require($_SERVER['DOCUMENT_ROOT'].'/models/model-user.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

    session_start();

    $name = validate_form($_POST['name']);
    $password = validate_form($_POST['password']);
    $confirm_password = validate_form($_POST['confirm_password']);

    if ( $name && $password && $confirm_password ) {

        if ($password !== $confirm_password) {
            $_SESSION["registration_error"] = "Passwords must match !!!";
            header('location: ../pages/register.php');
            die(); 
        }

        $model = new User;
        $check_user = $model->select_users($name);

        if($check_user) {
            $_SESSION["registration_error"] = "A user with that name already exists !!!";
            header('location: ../pages/register.php');
            die(); 
        } 

        $user = $model->create_user($name, $password);

        $_SESSION["username"] = $name;
        $_SESSION["registered"] = "Registered";
        unset($_SESSION["registration_error"]);

        header('location: ../pages/register.php');
        die(); 

    } else {
        $_SESSION["registration_error"] = "No valid value !!!";
        header('location: ../pages/register.php');
        die(); 
    }
} 


?>