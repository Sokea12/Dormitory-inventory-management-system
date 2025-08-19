<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form fields
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Email receiver
  $to = 'your_email@example.com';

  // Email subject
  $subject = 'New Contact Form Submission';

  // Email message
  $body = "Name: $name\nEmail: $email\n\n$message";

  // Email headers
  $headers = "From: $email";

  // Send email
  if (mail($to, $subject, $body, $headers)) {
    echo ' Message sent successfully!';
  } else {
    echo 'Sorry, something went wrong. Please try again later.';
  }
}
?>
