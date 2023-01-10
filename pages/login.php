<?php require($_SERVER['DOCUMENT_ROOT'].'/functions/init/var.php'); 
      $var['page_title'] = "Log In";
      require($_SERVER['DOCUMENT_ROOT'].'/components/header.php');
      require($_SERVER['DOCUMENT_ROOT'].'/functions/login-check.php');  ?>

        <h3 class="mib-3 title">Log In</h3>
        <div class="mb-3">
        <form  method="post" action="../functions/login-check.php" id="form_register">  
        <label for="exampleName" class="form-label">Name</label>
        <input type="text" class="form-control" id="exampleName" aria-describedby="nameHelp" name="name" required>
        </div>
        <div class="mb-3">
        <label for="inputPassword1" class="form-label" >Password</label>
        <input type="password" class="form-control" id="inputPassword1" name="password" required>
        </div>
        <p id="error_equal_pass"> 
            <?php if (isset($_SESSION["login_error"])) {
                        echo $_SESSION["login_error"];
                }  ?>
        </p>
        <div class="mb-3">
            <input type="checkbox" onchange="showPassword()" id="inputCheckbox1">
            <label for="inputCheckbox1">Show password</label>
        </div>

        <input type="submit" class="btn btn-primary" value="Log In">
        </form>
      


<?php 
if (isset($_SESSION["username"])) {
    unset($_SESSION["login_error"]);
}

require($_SERVER['DOCUMENT_ROOT'].'/components/footer.html') ?>
