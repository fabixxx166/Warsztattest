<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Walidacja emaila
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Nieprawidłowy adres email.";
        exit;
    }

    // Tworzenie wiadomości
    $to = "fabixxx166@gmail.com"; // Twój adres e-mail
    $subject = "Wiadomość kontaktowa od $name";
    $body = "Imię i nazwisko: $name\nEmail: $email\n\nWiadomość:\n$message";
    $headers = "From: $email";

    // Wysyłanie wiadomości
    if (mail($to, $subject, $body, $headers)) {
        echo "Wiadomość została wysłana!";
    } else {
        echo "Wystąpił błąd podczas wysyłania wiadomości.";
    }
}
?>
