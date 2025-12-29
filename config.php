<?php
// Configuration file for TASTS-2025 website

// Email configuration
define('RECIPIENT_EMAIL', 'faustineemmanuel0601@gmail.com');
define('SENDER_EMAIL', 'noreply@tasts2025.local');
define('SITE_NAME', 'TASTS-2025 Summit');

// Database configuration (optional - for future use)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'tasts2025');

// Site settings
define('EVENT_DATE', '19th September, 2025');
define('EVENT_LOCATION', 'Uhuru Hotel Conference Hall');
define('EVENT_CITY', 'Moshi, Kilimanjaro');

// Error handling
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/logs/error.log');

// Create logs directory if it doesn't exist
if (!is_dir(__DIR__ . '/logs')) {
    mkdir(__DIR__ . '/logs', 0755, true);
}
?>
