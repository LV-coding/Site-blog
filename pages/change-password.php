<?php require($_SERVER['DOCUMENT_ROOT'].'/functions/init/var.php'); 
      $var['page_title'] = "Change password";
      require($_SERVER['DOCUMENT_ROOT'].'/components/header.php');
      require($_SERVER['DOCUMENT_ROOT'].'/functions/change-password-check.php');  ?>

        <h3 class="mib-3 title">Change password</h3>
        <div class="mb-3">
        <form  method="post" action="../functions/change-password-check.php" id="form_register" onsubmit="checkEqualityPassword()">  
        </div>
        <div class="mb-3">
        <label for="inputPassword1" class="form-label" >Old password</label>
        <input type="password" class="form-control" id="oldPassword" name="old_password" required>
        </div>
        <div class="mb-3">
        <label for="inputPassword1" class="form-label" >New password</label>
        <input type="password" class="form-control" id="inputPassword1" name="new_password" required>
        </div>
        <div class="mb-3">
        <label for="inputPassword2" class="form-label">Confirm new password</label>
        <input type="password" class="form-control" id="inputPassword2" name="confirm_new_password" required>
        <p id="error_equal_pass"> 
            <?php if (isset($_SESSION["change_password_error"])) {
                        echo $_SESSION["change_password_error"];
                    }  
            ?>
        </p>
        <p id="succes">
        <?php
            if (isset($_SESSION["changed_password"])) {
                echo $_SESSION["changed_password"];
            }
        ?>
        </p>
        </div>
        <input type="submit" class="btn btn-primary"  value="Change">
        </form>
      


<?php 
if (isset($_SESSION["username"])) {
    unset($_SESSION["registration_error"]);
}

require($_SERVER['DOCUMENT_ROOT'].'/components/footer.html') ?>
