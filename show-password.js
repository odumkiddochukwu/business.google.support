document.addEventListener("DOMContentLoaded", function () {

    const passwordInput = document.getElementById("password");
    const showPassword = document.getElementById("showPassword");

    if (!passwordInput || !showPassword) {
        return;
    }

    showPassword.addEventListener("change", function () {

        if (this.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }

    });

});