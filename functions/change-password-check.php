<?php 
require($_SERVER['DOCUMENT_ROOT'].'/functions/form-validation.php');
require($_SERVER['DOCUMENT_ROOT'].'/functions/connection.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

    session_start();

    $old_password = validate_form($_POST['old_password']);
    $new_password = validate_form($_POST['new_password']);
    $confirm_new_password = validate_form($_POST['confirm_new_password']);

    if ( $old_password && $new_password && $confirm_new_password ) {

        $check_old_password = $connect->prepare("SELECT password FROM blog.users WHERE name=:name");
        $check_old_password->execute(['name'=>$_SESSION['username']]);

        if (! $check_old_password) {
            $_SESSION["change_password_error"] = "Something happened, try again..."; 
            header('location: ../pages/change-password.php');
        }

        $checked_old_password = $check_old_password->fetch()[0];

        if (! password_verify($old_password, $checked_old_password)) {
            $_SESSION["change_password_error"] = "Incorrect old password !!!"; 
            header('location: ../pages/change-password.php');
        
        } 

        if ($new_password != $confirm_new_password) {
            $_SESSION["change_password_error"] = "New password must match !!!"; 
            header('location: ../pages/change-password.php');           
        }

        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $query = $connect->prepare('UPDATE blog.users SET password=:password WHERE name=:name');
        $query->execute(['password'=>$hashed_password, 'name'=>$_SESSION['username']]);

        unset($_SESSION['change_password_error']);
        $_SESSION['changed_password'] = 'Successfully';

        header('location: ../pages/change-password.php');  

    } else {
        $_SESSION["change_password_error"] = "No valid value !!!";
        header('location: ../pages/change-password.php');
    }
}
?>