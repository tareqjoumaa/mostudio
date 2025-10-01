<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = htmlspecialchars($_POST["name"] ?? '');
    $email   = htmlspecialchars($_POST["email"] ?? '');
    $subject = htmlspecialchars($_POST["subject"] ?? '');
    $message = htmlspecialchars($_POST["message"] ?? '');

    if (!$name || !$email || !$subject || !$message) {
        echo "error";
        exit;
    }

    $to = "m.saleem.mourad@gmail.com"; 
    $headers  = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    $body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "invalid request";
}
?>