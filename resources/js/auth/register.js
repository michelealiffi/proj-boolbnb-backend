const registerForm = document.getElementById('register-form')
// const inputName = document.getElementById('name')
// const inputSurname = document.getElementById('surname')
// const inputEmail = document.getElementById('email')
const inputPassword = document.getElementById('password')
const inputPasswordConfirm = document.getElementById('password-confirm')
const submitButton = document.getElementById('submit-button')

// handle submit
submitButton.addEventListener("click", function (event){
    event.preventDefault();

    if (inputPassword.value !== inputPasswordConfirm.value){
        alert('Le password non combaciano')
        return
    }

    // se nessuna condizione risulta bloccante inviamo il form
    registerForm.submit()
})