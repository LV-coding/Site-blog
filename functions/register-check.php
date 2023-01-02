<?php 
require($_SERVER['DOCUMENT_ROOT'].'/functions/form-validation.php');
require($_SERVER['DOCUMENT_ROOT'].'/functions/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $name = validate_form($_POST['name']);
    $password = validate_form($_POST['password']);
    $confirm_password = validate_form($_POST['confirm_password']);

    $error;

    if ( $name && $password && $confirm_password ) {

        if ($password === $confirm_password) {

            $query = $connect->prepare('SELECT name FROM blog.users WHERE name=:name');
            $query->execute(['name'=>$name]);
            $user = $query->fetchAll();

            if(count($user) == 0) {
                $create_user = $connect->prepare('INSERT INTO blog.users (name, password) VALUES (:name, :password)');
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $create_user->execute(['name'=>$name, 'password'=>$hashed_password]);

                header('location: ../index.php');

            } else {
                $error = "A user with that name already exists !!!";
                header('location: ../pages/register.php');
            }

        } else {
            $error = "Passwords must match !!!";
            header('location: ../pages/register.php');
        }
    } else {
        $error = "No valid value";
        header('location: ../pages/register.php');
    }
}


function render_register_form($error='') {
    echo <<<html
        <div class="mb-3">
        <form  method="post" action="../functions/register-check.php" id="form_register">  
        <label for="exampleName" class="form-label">Name</label>
        <input type="text" class="form-control" id="exampleName" aria-describedby="nameHelp" name="name" required>
        </div>
        <div class="mb-3">
        <label for="inputPassword1" class="form-label" >Password</label>
        <input type="password" class="form-control" id="inputPassword1" name="password" required>
        </div>
        <div class="mb-3">
        <label for="inputPassword2" class="form-label">Confirm password</label>
        <input type="password" class="form-control" id="inputPassword2" name="confirm_password" required>
        <p id="error_equal_pass"> {$error}
        </p>
        </div>
        <button type="submit" class="btn btn-primary" onclick="checkEqualityPassword()">Register</button>
        </form>
    html;
}

?>