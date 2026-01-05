<?php
/**
 * TASTS-2025 Registration Handler
 * Configured for cPanel Hosting with PHPMailer
 */

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Note: On cPanel, you would typically install PHPMailer via Composer 
// or include the files manually. We'll assume the standard vendor path.
if (file_exists('../vendor/autoload.php')) {
    require '../vendor/autoload.php';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = strip_tags(trim($_POST["fullName"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));

    if (empty($fullName) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(["message" => "Please complete the form and provide a valid email address."]);
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP();                               // Send using SMTP
        $mail->Host       = 'localhost';               // Set the SMTP server to send through (usually localhost on cPanel)
        $mail->SMTPAuth   = true;                      // Enable SMTP authentication
        $mail->Username   = 'noreply@sttz.or.tz';      // SMTP username (Update with real one)
        $mail->Password   = 'YOUR_PASSWORD';           // SMTP password (Update with real one)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('noreply@sttz.or.tz', 'TASTS-2025 Summit');
        
        // Triple Email Delivery
        $mail->addAddress('faustineemmanuel0601@gmail.com');
        $mail->addAddress('info@sttz.or.tz');
        $mail->addAddress('klmsafari@gmail.com');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Summit Registration: ' . $fullName;
        
        $mailBody = "
            <h2>New Registration Received</h2>
            <p><strong>Full Name:</strong> {$fullName}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Phone:</strong> " . ($phone ?: 'Not provided') . "</p>
            <hr>
            <p>This message was sent from the TASTS-2025 website registration form.</p>
        ";
        
        $mail->Body    = $mailBody;
        $mail->AltBody = strip_tags(str_replace(['<br>', '</h2>', '</p>'], ["\n", "\n\n", "\n"], $mailBody));

        $mail->send();
        echo json_encode(["message" => "Registration successful! Thank you."]);
    } catch (Exception $e) {
        // Fallback to PHP mail() if PHPMailer fails or isn't configured for SMTP yet
        $to = "faustineemmanuel0601@gmail.com, info@sttz.or.tz, klmsafari@gmail.com";
        $subject = "New Summit Registration: $fullName";
        $headers = "From: noreply@sttz.or.tz\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        if (mail($to, $subject, $mailBody, $headers)) {
            echo json_encode(["message" => "Registration successful!"]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
        }
    }
} else {
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
