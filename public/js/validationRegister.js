const form = document.getElementById('form');
const nameE = document.getElementById('name');
const lastName = document.getElementById('lastName');
const address = document.getElementById('address');
const phone = document.getElementById('phone');
const username = document.getElementById('username');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');

form.addEventListener('submit', (e) => {

    const nameValue = nameE.value.trim();
    const lastnameValue = lastName.value.trim();
    const addressValue = address.value.trim();
    const phoneValue = phone.value.trim();
    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();

    if(nameValue === '' || lastnameValue === '' || addressValue === '' || phoneValue === '' || passwordValue === '' || password2Value === '' || usernameValue === '' ){
        e.preventDefault();
  }


      if(passwordValue !== password2Value){
        setErrorFor(password2, "Passwords does not match")
        e.preventDefault();
      }

  if(passwordValue === '') {
      setErrorFor(password, "Password cannot be blank");
    }else if(!validatePassword(passwordValue)){
        setErrorFor(password, "6-16 (char/num) and a special character: !@#$%^&*");
        e.preventDefault();
    }else{
        setSuccessFor(password);
    }
  checkInputs();

});

function checkInputs() {
    // get the values from inputs
    const nameValue = nameE.value.trim();
    const lastnameValue = lastName.value.trim();
    const addressValue = address.value.trim();
    const phoneValue = phone.value.trim();
    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();

    if(nameValue === '') {
        // show error
        // add error class
        setErrorFor(nameE, 'Name cannot be blank');
      }
      else{
        // add success class
        setSuccessFor(nameE);
      }

      if(lastnameValue === '') {
        // show error
        // add error class
        setErrorFor(lastName, 'Last Name cannot be blank');
      } else{
        // add success class
        setSuccessFor(lastName);
      }

      if(addressValue === '') {
        // show error
        // add error class
        setErrorFor(address, 'Address cannot be blank');
      } else{
        // add success class
        setSuccessFor(address);
      }


      if(phoneValue === '') {
        // show error
        // add error class
        setErrorFor(phone, 'Phone number cannot be blank');
      } else{
        // add success class
        setSuccessFor(phone);
      }
    if(usernameValue === '') {
      // show error
      // add error class
      setErrorFor(username, 'Username cannot be blank');
    } else{
      // add success class
      setSuccessFor(username);
    }

    // if(passwordValue === '') {
    //   setErrorFor(password, "Password cannot be blank");
    // }else if(!validatePassword(passwordValue)){
    //   setErrorFor(password, "6-16 (char/num) and a special character: !@#$%^&*");

    // }else{
    //   setSuccessFor(password);
    // }

     if(password2Value === '') {
      setErrorFor(password2, "Password cannot be blank");
    }else if(passwordValue !== password2Value){
      setErrorFor(password2, "Passwords does not match")

    }else{
      setSuccessFor(password2);
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

  function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = 'control-form success';
  }



  function validatePassword(password) {
      //return /^[a-zA-Z0-9!@#$%^&*]{6,16}$/.test(password);
    return /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/.test(password);

  }
