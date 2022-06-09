// alert('holi');

const form = document.getElementById('form');
const username = document.getElementById('username');
// const email = document.getElementById('email');
const password = document.getElementById('password');
// const password2 = document.getElementById('password2');

form.addEventListener('submit', (e) => {
  const usernameValue = username.value.trim();
  const passwordValue = password.value.trim();
  // e.preventDefault();
  if(usernameValue ==='' || passwordValue === ''){
    e.preventDefault();
  }
  checkInputs();
});

function checkInputs() {
  // get the values from inputs
  const usernameValue = username.value.trim();
//   const emailValue = email.value.trim();
  const passwordValue = password.value.trim();
//   const password2Value = password2.value.trim();

  if(usernameValue === '') {
    // show error
    // add error class
    setErrorFor(username, 'Username cannot be blank');
  } 
  // else{
  //   // add success class
  //   setSuccessFor(username);
  // }

//   if(emailValue === '') {
//     setErrorFor(email, "Email cannot be blank");
//   }else if(!isEmail(emailValue)){
//     setErrorFor(email, 'Email is not valid');
//   }else{
//     setSuccessFor(email);
//   }

  if(passwordValue === '') {
    setErrorFor(password, "Password cannot be blank");
  }
  // else{
  //   setSuccessFor(password);
  // }

//    if(password2Value === '') {
//     setErrorFor(password2, "Password cannot be blank");
//   }else if(passwordValue !== password2Value){
//     setErrorFor(password2, "Passwords does not match")
//   }else{
//     setSuccessFor(password2);
//   }
}

function setErrorFor(input, message) {
  const formControl = input.parentElement; // .form-control
  const small = formControl.querySelector('small');

  // add error message inside small
  small.innerText = message;

  // add error class
  formControl.className = 'control-form error';
}

// function setSuccessFor(input) {
//   const formControl = input.parentElement;
//   formControl.className = 'control-form success';
// }

// function isEmail(email) {
//   return /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
// }

// function validatePassword(password) {
//     //return /^[a-zA-Z0-9!@#$%^&*]{6,16}$/.test(password);
//   return /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/.test(password);

// }

