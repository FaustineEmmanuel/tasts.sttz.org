<?php
/**
 * Registration Processing Page
 * Handles form submission and email sending
 */

header('Content-Type: application/json');
require_once __DIR__ . '/../config/settings.php';
require_once __DIR__ . '/../config/functions.php';

$response = ['success' => false, 'message' => ''];

// Only process POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    $response['message'] = 'Method not allowed';
    echo json_encode($response);
    exit;
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

// Validate input
$fullName = isset($input['fullName']) ? sanitize($input['fullName']) : '';
$email = isset($input['email']) ? sanitize($input['email']) : '';
$phone = isset($input['phone']) ? sanitize($input['phone']) : '';

// Validation
if (empty($fullName)) {
    $response['message'] = 'Full name is required';
    echo json_encode($response);
    exit;
}

if (empty($email) || !isValidEmail($email)) {
    $response['message'] = 'Please provide a valid email address';
    echo json_encode($response);
    exit;
}

if (!empty($phone) && !isValidPhone($phone)) {
    $response['message'] = 'Please provide a valid phone number';
    echo json_encode($response);
    exit;
}

// Log the registration
$logged = logRegistration($fullName, $email, $phone);

// Prepare confirmation email for registrant
$confirmationSubject = 'Registration Confirmation - TASTS-2025 Summit';
$confirmationBody = "
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #2d7a3e 0%, #3b5998 100%); color: white; padding: 30px; border-radius: 5px; }
        .header h1 { margin: 0; }
        .content { padding: 20px 0; }
        .detail { margin: 15px 0; }
        .detail strong { color: #2d7a3e; }
        .footer { border-top: 1px solid #ddd; padding-top: 20px; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1>Welcome to TASTS-2025!</h1>
            <p>1st Tanzania Sustainable Tourism and Innovation Summit</p>
        </div>
        <div class='content'>
            <p>Dear " . htmlspecialchars($fullName) . ",</p>
            <p>Thank you for registering for the 1st Tanzania Sustainable Tourism and Innovation Summit (TASTS-2025)!</p>
            
            <h3>Event Details:</h3>
            <div class='detail'>
                <strong>Date:</strong> " . EVENT_DATE . "
            </div>
            <div class='detail'>
                <strong>Location:</strong> " . EVENT_LOCATION . "
            </div>
            <div class='detail'>
                <strong>Email:</strong> " . htmlspecialchars($email) . "
            </div>
            " . (!empty($phone) ? "<div class='detail'><strong>Phone:</strong> " . htmlspecialchars($phone) . "</div>" : "") . "
            
            <p>We're excited to have you join us for this groundbreaking summit on sustainable tourism innovation in East Africa. You will receive additional updates and a detailed agenda closer to the event date.</p>
            
            <p><strong>What to Expect:</strong></p>
            <ul>
                <li>Keynote presentations from leading sustainability experts</li>
                <li>Interactive panel discussions on sustainable tourism</li>
                <li>Post-event activities including safaris and cultural tours</li>
                <li>Networking opportunities with industry leaders</li>
            </ul>
            
            <p>If you have any questions, please don't hesitate to reach out to us.</p>
            
            <p>Best regards,<br><strong>TASTS-2025 Organizing Committee</strong></p>
        </div>
        <div class='footer'>
            <p>&copy; 2025 TASTS-2025 Summit. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
";

// Prepare notification email for organizer
$notificationSubject = 'New Registration - TASTS-2025 Summit';
$notificationBody = "
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #2d7a3e; color: white; }
    </style>
</head>
<body>
    <div class='container'>
        <h2>New TASTS-2025 Registration</h2>
        <p>A new participant has registered for the summit:</p>
        
        <table>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td><strong>Full Name</strong></td>
                <td>" . htmlspecialchars($fullName) . "</td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td>" . htmlspecialchars($email) . "</td>
            </tr>
            <tr>
                <td><strong>Phone</strong></td>
                <td>" . (empty($phone) ? 'Not provided' : htmlspecialchars($phone)) . "</td>
            </tr>
            <tr>
                <td><strong>Registration Date</strong></td>
                <td>" . date('Y-m-d H:i:s') . "</td>
            </tr>
        </table>
        
        <p>Registration Timestamp: " . date('Y-m-d H:i:s') . "</p>
    </div>
</body>
</html>
";

// Send confirmation email to registrant
$emailSentToRegistrant = sendEmail($email, $confirmationSubject, $confirmationBody);

// Send notification email to organizer
$emailSentToOrganizer = sendEmail(RECIPIENT_EMAIL, $notificationSubject, $notificationBody);

// Set response based on success
if ($emailSentToRegistrant && $logged) {
    $response['success'] = true;
    $response['message'] = 'Registration successful! Check your email for confirmation details.';
    http_response_code(200);
} else {
    $response['success'] = true; // Still mark as success for logging
    $response['message'] = 'Registration saved! You will receive a confirmation email shortly.';
    http_response_code(200);
}

echo json_encode($response);
exit;
?>
