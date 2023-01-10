function checkEqualityPassword () {

    let password = document.getElementById('inputPassword1').value;
    let confirm_password = document.getElementById('inputPassword2').value;

    if (password !== confirm_password) {
        document.getElementById('error_equal_pass').innerHTML = 'Passwords must match !!!'; 
    }
}

function showPassword() {
    let password = document.getElementById('inputPassword1');
    if (password.type === "password") {
        password.type = "text";
    } else {
        password.type = "password";
    }
}