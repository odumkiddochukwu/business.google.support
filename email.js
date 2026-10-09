const email = document.getElementById("email");
const emailField = document.querySelector(".email-field");


// When user clicks inside
email.addEventListener("focus", function () {

    emailField.classList.add("focused");

});


// When user clicks outside
email.addEventListener("blur", function () {

    emailField.classList.remove("focused");

    if (email.value.trim() !== "") {
        emailField.classList.add("has-value");
    } else {
        emailField.classList.remove("has-value");
    }

});


// When user types
email.addEventListener("input", function () {

    if (email.value.trim() !== "") {
        emailField.classList.add("has-value");
    } else {
        emailField.classList.remove("has-value");
    }

});