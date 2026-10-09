const userCode = document.getElementById("user-code");
const userCodeField = document.querySelector(".user-code-field");


/* User clicks inside */

userCode.addEventListener("focus", function () {

    userCodeField.classList.add("focused");

});


/* User clicks outside */

userCode.addEventListener("blur", function () {

    userCodeField.classList.remove("focused");

    if (userCode.value.trim() !== "") {

        userCodeField.classList.add("has-value");

    } else {

        userCodeField.classList.remove("has-value");

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