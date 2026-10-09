document.addEventListener("DOMContentLoaded", function () {

    const dropdown = document.querySelector(".language-dropdown");

    const button = document.getElementById("language-button");

    const options =
        document.querySelectorAll(".language-option");


    if (!dropdown || !button) {
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | Open / close menu
    |--------------------------------------------------------------------------
    */

    button.addEventListener("click", function (event) {

        event.stopPropagation();

        dropdown.classList.toggle("open");

    });


    /*
    |--------------------------------------------------------------------------
    | Select language
    |--------------------------------------------------------------------------
    */

    options.forEach(function (option) {

        option.addEventListener("click", function () {

            const language =
                option.getAttribute("data-language");

            window.location.href =
                window.location.pathname +
                "?lang=" +
                encodeURIComponent(language);

        });

    });


    /*
    |--------------------------------------------------------------------------
    | Close when clicking outside
    |--------------------------------------------------------------------------
    */

    document.addEventListener("click", function (event) {

        if (!dropdown.contains(event.target)) {

            dropdown.classList.remove("open");

        }

    });


    /*
    |--------------------------------------------------------------------------
    | ESC
    |--------------------------------------------------------------------------
    */

    document.addEventListener("keydown", function (event) {

        if (event.key === "Escape") {

            dropdown.classList.remove("open");

        }

    });

});