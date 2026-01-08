<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Invalid request");
}

$fullName = htmlspecialchars($_POST['fullName']);
$email    = htmlspecialchars($_POST['email']);
$phone    = htmlspecialchars($_POST['phone']);

$mail = new PHPMailer(true);

try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your_email@gmail.com';
    $mail->Password   = 'APP_PASSWORD_HERE';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Email setup
    $mail->setFrom($email, $fullName);
    $mail->addAddress('your_email@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'New Registration';
    $mail->Body = "
        <h3>New Registration Details</h3>
        <p><strong>Name:</strong> $fullName</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
    ";

    $mail->send();
    echo "success";

} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
}
