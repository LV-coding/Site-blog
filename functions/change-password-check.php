<?php 
require($_SERVER['DOCUMENT_ROOT'].'/functions/form-validation.php');
require($_SERVER['DOCUMENT_ROOT'].'/functions/connection.php');
require($_SERVER['DOCUMENT_ROOT'].'/models/model-user.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

    session_start();

    $old_password = validate_form($_POST['old_password']);
    $new_password = validate_form($_POST['new_password']);
    $confirm_new_password = validate_form($_POST['confirm_new_password']);

    if ( $old_password && $new_password && $confirm_new_password ) {

        $model = new User;
        $checked_old_password = $model->select_password($_SESSION['username']);

        if (!password_verify($old_password, $checked_old_password)) {
            $_SESSION["change_password_error"] = "Incorrect old password !!!"; 
            unset($_SESSION['changed_password']);
            header('location: ../pages/change-password.php');
            die();
        } 

        if ($new_password != $confirm_new_password) {
            $_SESSION["change_password_error"] = "New password must match !!!"; 
            unset($_SESSION['changed_password']);
            header('location: ../pages/change-password.php'); 
            die();          
        }

        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $model->update_password($hashed_password, $_SESSION['username']);

        unset($_SESSION['change_password_error']);
        $_SESSION['changed_password'] = 'Successfully';

        header('location: ../pages/change-password.php');  
        die(); 

    } else {
        $_SESSION["change_password_error"] = "No valid value !!!";
        header('location: ../pages/change-password.php');
        die(); 
    }
}
?>