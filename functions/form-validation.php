<?php 

function validate_form($value) {

    $result = trim($value);
    if ( strlen($result) ) {
        $result = htmlentities($result);
        return $result;
    } else {
        return false;
    }
}

?>