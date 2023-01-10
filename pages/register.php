<?php require($_SERVER['DOCUMENT_ROOT'].'/components/header.php');
      require($_SERVER['DOCUMENT_ROOT'].'/functions/register-check.php');  ?>

        <h3 class="mib-3 title">Register</h3>
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
        <p id="error_equal_pass"> 
            <?php if (isset($_SESSION["registration_error"])) {
                        echo $_SESSION["registration_error"];
                }  ?>
        </p>
        </div>
        <input type="submit" class="btn btn-primary" onclick="checkEqualityPassword()" value="Register">
        </form>
      


<?php 
if (isset($_SESSION["username"])) {
    unset($_SESSION["registration_error"]);
}

require($_SERVER['DOCUMENT_ROOT'].'/components/footer.html') ?>
