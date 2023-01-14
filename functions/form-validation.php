<?php 

function validate_form($value) {

    $result = htmlentities(trim($value));
    return $result;

}

function validate_int($value) {
    $ok = filter_var($value, FILTER_VALIDATE_INT);
    if (is_null($ok) ||  ($ok === false)) {
        return false;
    } 
    return $value;
}

?>