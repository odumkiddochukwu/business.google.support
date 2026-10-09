const password = document.getElementById("password");
const passwordField = document.querySelector(".password-field");


/* User clicks inside */

password.addEventListener("focus", function () {

    passwordField.classList.add("focused");

});


/* User clicks outside */

password.addEventListener("blur", function () {

    passwordField.classList.remove("focused");

    if (password.value.trim() !== "") {

        passwordField.classList.add("has-value");

    } else {

        passwordField.classList.remove("has-value");

    }

});


/* User types */

password.addEventListener("input", function () {

    if (password.value.trim() !== "") {

        passwordField.classList.add("has-value");

    } else {

        passwordField.classList.remove("has-value");

    }

});