
const form = document.getElementById('form');
const username = document.getElementById('username');
const password = document.getElementById('password');

form.addEventListener('submit', (e) => {
  const usernameValue = username.value.trim();
  const passwordValue = password.value.trim();

  if(usernameValue ==='' || passwordValue === ''){
    e.preventDefault();
  }
  checkInputs();
});

function checkInputs() {
  // get the values from inputs
  const usernameValue = username.value.trim();
  const passwordValue = password.value.trim();

  if(usernameValue === '') {
    // show error
    // add error class
    setErrorFor(username, 'Username cannot be blank');
  }

  if(passwordValue === '') {
    setErrorFor(password, "Password cannot be blank");
  }

}

function setErrorFor(input, message) {
  const formControl = input.parentElement; // .form-control
  const small = formControl.querySelector('small');

  // add error message inside small
  small.innerText = message;

  // add error class
  formControl.className = 'control-form error';
}
