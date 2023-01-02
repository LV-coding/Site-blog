function checkEqualityPassword () {

    var password = document.getElementById('inputPassword1').value;
    var confirm_password = document.getElementById('inputPassword2').value;

    if (password !== confirm_password) {
        document.getElementById('error_equal_pass').innerHTML = 'Passwords must match !!!'; 

        var form = document.getElementById('form_register');
        form.addEventListener('submit', (event) => {
            event.preventDefault();
          });
    }
}
