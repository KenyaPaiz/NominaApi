const form = document.getElementById('form');
const nameC = document.getElementById('name');
const address = document.getElementById('address');

form.addEventListener('submit', (e) => {
  const nameValue = nameC.value.trim();
  const addressValue = address.value.trim();

  if(nameValue ==='' || addressValue === ''){
    e.preventDefault();
  }
  checkInputs();
});

function checkInputs() {
  // get the values from inputs
  const nameValue = nameC.value.trim();
  const addressValue = address.value.trim();

  if(nameValue === '') {
    // show error
    // add error class
    setErrorFor(nameC, 'Name cannot be blank');
  }

  if(addressValue === '') {
    setErrorFor(address, "Address cannot be blank");
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
