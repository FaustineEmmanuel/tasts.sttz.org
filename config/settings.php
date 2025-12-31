<?php
/**
 * TASTS-2025 Summit Website Configuration
 * Event: 1st Tanzania Sustainable Tourism and Innovation Summit
 */

// Application Settings
define('APP_NAME', 'TASTS-2025');
define('APP_TITLE', '1st Tanzania Sustainable Tourism and Innovation Summit');
define('APP_URL', 'http://localhost/tasts2025');
define('APP_VERSION', '1.0.0');

// Event Information
define('EVENT_DATE', '19th September, 2025');
define('EVENT_LOCATION', 'Uhuru Hotel Conference Hall, Moshi, Kilimanjaro');
define('EVENT_COUNTRY', 'Tanzania');

// Email Configuration
define('RECIPIENT_EMAIL', 'faustineemmanuel0601@gmail.com');
define('SENDER_NAME', 'TASTS-2025 Summit');
define('SENDER_EMAIL', 'noreply@tasts2025.local');

// Display Settings
define('DATE_FORMAT', 'F d, Y');
define('TIME_FORMAT', 'h:i A');
define('TIMEZONE', 'Africa/Dar_es_Salaam');

// Set timezone
date_default_timezone_set(TIMEZONE);

// Error Handling
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Session Configuration
ini_set('session.gc_maxlifetime', 3600);
if (!session_id()) {
    session_start();
}
?>
