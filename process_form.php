<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve user input
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Customize the direct message for the user
    echo "<h2>Welcome, $name!</h2>";
    echo "<p>Thank you for signing in. We have received your message: \"$message\"</p>";
    echo "<p>We will contact you shortly at <strong>$email</strong>.</p>";

    // Email details
    $to = "your-email@example.com"; // Replace with your email
    $subject = "New Sign In: $name";
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = "From: noreply@example.com"; // Replace with a valid sender email

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Your information has been successfully sent to us.</p>";
    } else {
        echo "<p>There was an error sending your information. Please try again later.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>