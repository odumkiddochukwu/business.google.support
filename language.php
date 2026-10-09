<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


/*
|--------------------------------------------------------------------------
| Change language
|--------------------------------------------------------------------------
*/

if (isset($_GET["lang"])) {

    $allowed_languages = [
        "en-US",
        "en-GB",
        "ge",
        "fr",
        "es",
        "it",
        "nl",
        "pt",
        "tr",
        "uk"
    ];

    if (in_array($_GET["lang"], $allowed_languages, true)) {
        $_SESSION["language"] = $_GET["lang"];
    }
}


/*
|--------------------------------------------------------------------------
| Current language
|--------------------------------------------------------------------------
*/

$language = $_SESSION["language"] ?? "en-US";


/*
|--------------------------------------------------------------------------
| Language names
|--------------------------------------------------------------------------
*/

$languages = [

    "en-US" => "English (United States)",
    "en-GB" => "English (United Kingdom)",
    "ge"    => "German",
    "fr"    => "Français",
    "es"    => "Español",
    "it"    => "Italiano",
    "nl"    => "Nederlands",
    "pt"    => "Português",
    "tr"    => "Türkçe",
    "uk"    => "Українська"

];

$current_language_name = $languages[$language] ?? "English (United States)";


/*
|--------------------------------------------------------------------------
| Translations
|--------------------------------------------------------------------------
*/

$translations = [

    "en-US" => [

        "sign_in" => "Sign in",

        "to_continue_to_google_business" => "to continue to Google Business",

        "email_or_phone" => "Email or phone",

        "forgot_email" => "Forgot email?",

        "enter_an_email_or_phone" => "Enter an email or phone",

        "not_your_computer" => "Not your computer? use guest mode to sign in privately.",

        "learn_more" => "Learn more about using Guest mode",

        "create_account" => "Create account",
        
        "verify_code" => "Verify Code",

        "welcome" => "Welcome",

        "to_continue_first_verify_it's_you" => "To continue first verify it's you",

        "password" => "Enter your password",

        "show_password" => "show password",

        "try_another_way" => "Try another way",

        "enter_code" => "Enter code to verify",

        "authentication_code" => "Enter authentication code",

        "resend_code" => "Resend code",

        "next" => "Next",

        "help" => "Help",

        "privacy" => "Privacy",

        "terms" => "Terms"

    ],


    "en-GB" => [

        "sign_in" => "Sign in",

        "to_continue_to_google_business" => "to continue to Google Business",

        "email_or_phone" => "Email or phone",

        "forgot_email" => "Forgot email?",

        "enter_an_email_or_phone" => "Enter an email or phone",

        "not_your_computer" => "Not your computer? use guest mode to sign in privately.",

        "learn_more" => "Learn more about using Guest mode",

        "create_account" => "Create account",

        "verify_code" => "Verify Code",

        "welcome" => "Welcome",

        "to_continue_first_verify_it's_you" => "To continue first verify it's you",

        "password" => "Enter your password",
 
        "show_password" => "show password",

        "try_another_way" => "Try another way",

        "enter_code" => "Enter code to verify",

        "authentication_code" => "Enter authentication code",

        "resend_code" => "Resend code",

        "next" => "Next",

        "help" => "Help",

        "privacy" => "Privacy",

        "terms" => "Terms"

    ],


    "ge" => [

        "sign_in" => "anmelden",

        "to_continue_to_google_business" => "um zu Google Business zu gelangen",

        "email_or_phone" => "E-Mail oder Telefon",

        "forgot_email" => "E-Mail vergessen",

        "enter_an_email_or_phone" => "E-Mail-Adresse oder Telefonnummer eingeben",

        "not_your_computer" => "Nicht Ihr Computer? Nutzen Sie den Gastmodus, um sich privat anzumelden.",

        "learn_more" => "Erfahren Sie mehr über die Verwendung des Gastmodus.",

        "create_account" => "Benutzerkonto erstellen",

        "show_password" => "Passwort anzeigen",

        "try_another_way" => "Versuchen Sie es auf einem anderen Weg",

        "to_continue_first_verify_it's_you" => "Um fortzufahren, bestätigen Sie bitte zunächst, dass Sie es sind",

        "resend_code" => "Code erneut senden",

        "verify_code" => "Code überprüfen",

        "welcome" => "Willkommen",

        "password" => "Passwort eingeben",

        "authentication_code" => "Authentifizierungscode eingeben",

        "enter_code" => "Geben Sie den Bestätigungscode ein",

        "next" => "Weiter",

        "help" => "Hilfe",

        "privacy" => "Datenschutz",

        "terms" => "Bedingungen"

    ],


    "fr" => [

        "sign_in" => "se connecter",

        "to_continue_to_google_business" => "pour continuer sur Google Business",

        "email_or_phone" => "Courriel ou téléphone",

        "forgot_email" => "Adresse e-mail oubliée?",

        "enter_an_email_or_phone" => "Saisissez votre adresse e-mail ou votre numéro de téléphone",

        "not_your_computer" => "e n'est pas votre ordinateur ? Utilisez le mode invité pour vous connecter en privé. ",

        "learn_more" => " En savoir plus sur l'utilisation du mode invité",

        "create_account" => "créer un compte",

        "show_password" => "afficher le mot de passe",

        "to_continue_first_verify_it's_you" => "Pour continuer, vérifiez d'abord que c'est bien vous",


        "try_another_way" => "essayez une autre méthode",

        "resend_code" => "renvoyer le code",

        "verify_code" => "code de vérification",

        "welcome" => "Bienvenue",

        "password" => "Entrez votre mot de passe",

        "authentication_code" => "Entrez le code d'authentification",

        "enter_code" => "Entrez le code de vérification",

        "next" => "Suivant",

        "help" => "Aide",

        "privacy" => "Confidentialité",

        "terms" => "Conditions"

    ],


    "es" => [

        "sign_in" => "iniciar sesión",

        "to_continue_to_google_business" => "para continuar buscando negocios en Google",

        "email_or_phone" => "Correo electrónico o teléfono",

        "forgot_email" => "¿Olvidaste tu correo electrónico?",

        "enter_an_email_or_phone" => "Ingrese su correo electrónico o número de teléfono",

        "not_your_computer" => "¿No es tu ordenador? Usa el modo invitado para iniciar sesión de forma privada.",

        "learn_more" => "Más información sobre cómo usar el modo invitado",

        "create_account" => "crear una cuenta",

        "to_continue_first_verify_it's_you" => "Para continuar, primero verifica que eres tú",

        "show_password" => "mostrar contraseña",

        "try_another_way" => "Prueba de otra manera",

        "resend_code" => "Reenviar código",

        "verify_code"=> "código de verificación",

        "welcome" => "Bienvenido",

        "password" => "Introduzca su contraseña",

        "authentication_code" => "Introduzca el código de autenticación",

        "enter_code" => "Introduzca el código de verificación",

        "next" => "Siguiente",

        "help" => "Ayuda",

        "privacy" => "Privacidad",

        "terms" => "Términos"

    ],


    "it" => [

        "sign_in" => "registrazione",

        "to_continue_to_google_business" => "per continuare su Google Business",

        "email_or_phone" => "Email o telefono",

        "forgot_email" => "Hai dimenticato l'indirizzo email?",

        "enter_an_email_or_phone" => "Inserisci l'indirizzo email o il numero di telefono",

        "not_your_computer" => "Non è il tuo computer? Utilizza la modalità ospite per accedere in privato.",

        "learn_more" => "Scopri di più sull'utilizzo della modalità ospite",

        "create_account" => "creare un account",

        "show_password" => "mostra password",

        "to_continue_first_verify_it's_you" => "Per continuare, verifica prima che tu sia",

        "try_another_way" => "Prova un altro",

        "resend_code" => "Reinvia il codice",

        "verify_code" => "codice di verifica",

        "welcome" => "Benvenuto",

        "password" => "Inserisci la password",

        "authentication_code" => "Inserisci il codice di autenticazione",

        "enter_code" => "Inserisci il codice di verifica",

        "next" => "Avanti",

        "help" => "Aiuto",

        "privacy" => "Privacy",

        "terms" => "Termini"

    ],


    "nl" => [

        "sign_in" => "inloggen",

        "to_continue_to_google_business" => "Om verder te gaan naar Google Business",

        "email_or_phone" => "e-mail of telefoon",

        "forgot_email" => "E-mailadres vergeten?",

        "enter_an_email_or_phone" => "Voer uw e-mailadres of telefoonnummer in.",

        "not_your_computer" => "Is dit niet jouw computer? Gebruik de gastmodus om privé in te loggen. ",

        "learn_more" => "Lees meer over het gebruik van de gastmodus",

        "create_account" => "account aanmaken",

        "show_password" => "wachtwoord weergeven",

        "try_another_way" => "probeer een andere manier",

        "to_continue_first_verify_it's_you" => "Om verder te gaasn, moet u erst bevestigen dat u het bent",

        "resend_code" => "code opnieuw verzenden",

        "verify_code" => "verificatiecode",

        "welcome" => "Welkom",

        "password" => "Voer uw wachtwoord in",

        "authentication_code" => "Voer de authenticatiecode in",

        "enter_code" => "Voer de verificatiecode in",

        "next" => "Volgende",

        "help" => "Hulp",

        "privacy" => "Privacy",

        "terms" => "Voorwaarden"

    ],


    "pt" => [

        
        "sign_in" => "Entrar",

        "to_continue_to_google_business" => "Para continuar no Google Business",

        "email_or_phone" => "E-mail ou telefone",

        "forgot_email" => "Esqueceu-se do seu e-mail?",

        "enter_an_email_or_phone" => "Introduza o e-mail ou o telefone",

        "not_your_computer" => "Não é o seu computador? Utilize o modo convidado para iniciar sessão de forma privada.",

        "learn_more" => "Saiba mais sobre como utilizar o modo convidado",

        "create_account" => "Criar uma conta",

        "show_password" => "mostrar senha",

        "to_continue_first_verify" => "Para continuar, verifique primeiro se é você.",


        "try_another_way" => "Tente outra forma.",

        "resend_code" => "Reenviar código",

        "verify_code" => "código de verificação",

        "welcome" => "Bem-vindo",

        "password" => "Digite sua senha",

        "authentication_code" => "Digite o código de autenticação",

        "enter_code" => "Digite o código de verificação",

        "next" => "Próximo",

        "help" => "Ajuda",

        "privacy" => "Privacidade",

        "terms" => "Termos"

    ],


    "tr" => [

        
        "sign_in" => "Giriş yap",

        "to_continue_to_google_business" => "Google İşletme hesabına devam etmek için",

        "email_or_phone" => "E-posta veya telefon",

        "forgot_email" => "E-posta adresinizi mi unuttunuz?",

        "enter_an_email_or_phone" => "E-posta veya telefon numaranızı girin",

        "not_your_computer" => "Bu sizin bilgisayarınız değil mi? Özel olarak oturum açmak için misafir modunu kullanın.",

        "learn_more" => "Misafir modu kullanımı hakkında daha fazla bilgi edinin",

        "create_account" => "Hesap oluşturmak",

        "show password" => "şifreyi göster",

        "to_continue_first_verify" => "Devam etmek için önce sizin olduğunuzu doğrulayın.",

        "try_another_way" => "Başka bir tane deneyin.",

        "resend_code" => "Kodu yeniden gönder",

        "verify_code" => "kodu doğrula",

        "welcome" => "Hoş geldiniz",

        "password" => "Şifrenizi girin",

        "authentication_code" => "Kimlik doğrulama kodunu girin",

        "enter_code" => "Doğrulama kodunu girin",

        "next" => "İleri",

        "help" => "Yardım",

        "privacy" => "Gizlilik",

        "terms" => "Şartlar"

    ],


    "uk" => [

     
        "sign_in" => "увійти",

        "to_continue_to_google_business" => "щоб перейти до Google Business",

        "email_or_phone" => "електронною поштою або телефоном",

        "forgot_email" => "забув електронну адресу",

        "enter_an_email_or_phone" => "введіть електронну пошту або телефон",

        "not_your_computer" => "Не ваш комп’ютер? Використовуйте гостьовий режим для конфіденційного входу.",

        "learn_more" => "Дізнайтеся більше про використання гостьового режиму",

        "create_account" => "створити обліковий запис",

        "show_password" => "показати пароль",

        "to_continue_first_verify" => "щоб продовжити, спочатку підтвердьте свою особу",


        "try_another_way" => "спробуйте інший спосіб",

        "resend_code" => "повторно надіслати код",

        "verify_code" => "підтвердити код",

        "welcome" => "Ласкаво просимо",

        "password" => "Введіть пароль",

        "authentication_code" => "Введіть код автентифікації",

        "enter_code" => "Введіть код підтвердження",

        "next" => "Далі",

        "help" => "Довідка",

        "privacy" => "Конфіденційність",

        "terms" => "Умови"

    ]

];


/*
|--------------------------------------------------------------------------
| Get translations for current language
|--------------------------------------------------------------------------
*/

$t = $translations[$language] ?? $translations["en-US"];

?>