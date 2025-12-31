<?php
require_once __DIR__ . '/../config/settings.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="1st Tanzania Sustainable Tourism and Innovation Summit (TASTS-2025) - September 19, 2025. Join leaders in sustainable tourism.">
    <meta property="og:title" content="TASTS-2025 Summit - Sustainable Tourism Tanzania">
    <meta property="og:description" content="1st Tanzania Sustainable Tourism and Innovation Summit">
    <meta name="author" content="TASTS-2025 Team">
    <title><?php echo APP_TITLE; ?> | TASTS-2025</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='75' font-size='75' fill='%232d7a3e'>T</text></svg>">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="index.php" class="logo">
                <span class="logo-icon">🌍</span>
                <span class="logo-text">TASTS-2025</span>
            </a>
            <div class="nav-menu" id="navMenu">
                <a href="index.php#home" class="nav-link active">Home</a>
                <a href="index.php#about" class="nav-link">About</a>
                <a href="index.php#speakers" class="nav-link">Speakers</a>
                <a href="index.php#journey" class="nav-link">Registration</a>
                <a href="index.php#activities" class="nav-link">Activities</a>
                <a href="index.php#register" class="nav-link cta">Secure Seat</a>
            </div>
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>
