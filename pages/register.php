<?php require($_SERVER['DOCUMENT_ROOT'].'/components/header.php');
      require($_SERVER['DOCUMENT_ROOT'].'/functions/register-check.php'); 

if (isset($error)) {
    render_register_form($error);
} else {
    render_register_form();
}
/* Correct the sending error on the form !!!!!!!!!!!!!!!!!!!!!!!!!!! */


require($_SERVER['DOCUMENT_ROOT'].'/components/footer.php') ?>
