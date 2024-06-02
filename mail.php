<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Create an instance; passing `true` enables exceptions
if (isset($_POST["send"])) {
    // Validate email
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();                                      // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                 // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                             // Enable SMTP authentication
            $mail->Username   = 'ytprem1111u@gmail.com';          // SMTP username
            $mail->Password   = 'qbtidbpmbzbhthpe';               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Enable TLS encryption
            $mail->Port       = 587;                              // TCP port to connect to

            // Recipients
            $mail->setFrom('ytprem1111u@gmail.com', $_POST["name"]);  // Sender Email and name
            $mail->addAddress($_POST["email"]);                      // Add a recipient email from the form
            $mail->addReplyTo('ytprem1111u@gmail.com', $_POST["name"]); // Reply to sender email

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $_POST["subject"];                   // Email subject
            $mail->Body    = $_POST["message"];                   // Email message

            // Success sent message alert
            $mail->send();
            echo "
            <script>
                alert('Message was sent successfully!');
                window.location.href = 'phpmailer.php';
            </script>
            ";
        } catch (Exception $e) {
            echo "
            <script>
                alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
                window.location.href = 'phpmailer.php';
            </script>
            ";
        }
    } else {
        echo "
        <script>
            alert('Invalid email address.');
            window.location.href = 'phpmailer.php';
        </script>
        ";
    }
}
?>
