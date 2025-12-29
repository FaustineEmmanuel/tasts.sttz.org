<?php
header('Content-Type: application/json');
require_once 'config.php';

// Enable CORS for development
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

$response = ['success' => false, 'message' => ''];

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid request method');
    }

    // Get JSON data
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!$input) {
        // Try POST data
        $input = $_POST;
    }

    // Validate required fields
    if (empty($input['fullName'])) {
        throw new Exception('Full name is required');
    }
    if (empty($input['email'])) {
        throw new Exception('Email is required');
    }
    if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email format');
    }

    $fullName = sanitize_input($input['fullName']);
    $email = sanitize_input($input['email']);
    $phone = isset($input['phone']) ? sanitize_input($input['phone']) : 'Not provided';

    // Prepare email content
    $to = RECIPIENT_EMAIL;
    $subject = "New Registration - TASTS-2025 Summit";
    
    $message = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; background: #f9f9f9; }
            .header { background: #2d8659; color: white; padding: 20px; text-align: center; border-radius: 5px; }
            .content { background: white; padding: 20px; margin: 20px 0; border-radius: 5px; }
            .field { margin: 15px 0; }
            .label { font-weight: bold; color: #2d8659; }
            .footer { text-align: center; color: #666; font-size: 12px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Registration Received</h2>
                <p>TASTS-2025 Summit</p>
            </div>
            <div class='content'>
                <h3>Registration Details:</h3>
                <div class='field'>
                    <span class='label'>Full Name:</span><br>
                    " . htmlspecialchars($fullName) . "
                </div>
                <div class='field'>
                    <span class='label'>Email:</span><br>
                    " . htmlspecialchars($email) . "
                </div>
                <div class='field'>
                    <span class='label'>Phone:</span><br>
                    " . htmlspecialchars($phone) . "
                </div>
                <div class='field'>
                    <span class='label'>Registration Date:</span><br>
                    " . date('Y-m-d H:i:s') . "
                </div>
            </div>
            <div class='footer'>
                <p>This is an automated email from TASTS-2025 Registration System</p>
            </div>
        </div>
    </body>
    </html>
    ";

    // Set headers for HTML email
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: " . SENDER_EMAIL . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        // Send confirmation to registrant
        $confirmMessage = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; background: #f9f9f9; }
                .header { background: #2d8659; color: white; padding: 20px; text-align: center; border-radius: 5px; }
                .content { background: white; padding: 20px; margin: 20px 0; border-radius: 5px; }
                .footer { text-align: center; color: #666; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>Registration Confirmed</h2>
                    <p>TASTS-2025 Summit</p>
                </div>
                <div class='content'>
                    <p>Dear " . htmlspecialchars($fullName) . ",</p>
                    <p>Thank you for registering for the 1st Tanzania Sustainable Tourism and Innovation Summit (TASTS-2025)!</p>
                    <p><strong>Event Details:</strong></p>
                    <ul>
                        <li>Date: 19th September, 2025</li>
                        <li>Location: Uhuru Hotel Conference Hall</li>
                        <li>City: Moshi, Kilimanjaro</li>
                    </ul>
                    <p>We look forward to seeing you at the summit. Our team will be in touch soon with more details.</p>
                    <p>Best regards,<br>TASTS-2025 Team</p>
                </div>
                <div class='footer'>
                    <p>Visit us at the summit</p>
                </div>
            </div>
        </body>
        </html>
        ";
        
        $confirmHeaders = "MIME-Version: 1.0\r\n";
        $confirmHeaders .= "Content-type: text/html; charset=UTF-8\r\n";
        $confirmHeaders .= "From: " . SENDER_EMAIL . "\r\n";
        
        mail($email, "Registration Confirmation - TASTS-2025", $confirmMessage, $confirmHeaders);
        
        $response = [
            'success' => true,
            'message' => 'Registration successful! Check your email for confirmation.'
        ];
    } else {
        throw new Exception('Failed to send email. Please try again later.');
    }

} catch (Exception $e) {
    $response['message'] = $e->getMessage();
    http_response_code(400);
}

echo json_encode($response);
exit;

function sanitize_input($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}
?>
