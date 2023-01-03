function checkEqualityPassword () {

    let password = document.getElementById('inputPassword1').value;
    let confirm_password = document.getElementById('inputPassword2').value;

    if (password !== confirm_password) {
        document.getElementById('error_equal_pass').innerHTML = 'Passwords must match !!!'; 

        let form = document.getElementById('form_register');
        form.addEventListener('submit', (event) => {
            event.preventDefault();
          });
    }
}
