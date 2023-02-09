const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const confirmedPasswordInput = form.querySelector('input[name="rpassword"]');
const passwordInput = form.querySelector('input[name="password"]');

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateEmail() {
    setTimeout(function () {
            markValidation(emailInput, isEmail(emailInput.value));
        },
        1000
    );
}

function validatePassword() {
    setTimeout(function () {
        console.log("pass")
            const condition = arePasswordsSame(
                passwordInput.value,
                confirmedPasswordInput.value
            );
        console.log(condition)
            markValidation(confirmedPasswordInput, condition);
        },
        1000
    );
}

emailInput.addEventListener('keyup', validateEmail);
confirmedPasswordInput.addEventListener('keyup', validatePassword);