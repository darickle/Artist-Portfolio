<?php

$recipient = 'daricklemain@gmail.com';
$subject = 'New Contact Form Submission';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    $body = "Name: $name\n\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message";

    $headers = "Reply-To: $email\r\n";
    $headers .= "From: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($recipient, $subject, $body, $headers)) {
        echo 'Thank you for your message! We will get back to you as soon as possible.';
    } else {
        echo 'There was an error sending your message. Please try again later.';
    }
} else {
    header('Location: contact_form.html');
}
?>
