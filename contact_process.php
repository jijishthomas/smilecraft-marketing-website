<?php
 
ob_start(); // Start output buffering

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Collect form data
    $to = "enquiry.smilecraftedappally@gmail.com";
    $from = $_POST['email'];
    $name = $_POST['nam'];
    $service = $_POST['service'];
    $number = $_POST['mob'];
    $cmessage = $_POST['message'];

    // Prepare email headers
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    // Email subject and body
    $subject = "You have a message from your Smilecraft Website.";
    $body = "<html><body>";
    $body .= "<table>";
    $body .= "<tr><td><strong>Name:</strong> {$name}</td></tr>";
    $body .= "<tr><td><strong>Email:</strong> {$from}</td></tr>";
    $body .= "<tr><td><strong>Contact Number:</strong> {$number}</td></tr>";
    $body .= "<tr><td><strong>Service Needed:</strong> {$service}</td></tr>";
    $body .= "<tr><td>{$cmessage}</td></tr>";
    $body .= "</table>";
    $body .= "</body></html>";

    // Send email
    $send = mail($to, $subject, $body, $headers);

    if ($send) {
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Location:index.html", true, 303);
        exit;
    } else {
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Location: index.html", true, 303);
        exit;
    }
}

ob_end_flush(); // End output buffering
?>
