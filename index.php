<?php
require_once __DIR__ . '/config/settings.php';
require_once __DIR__ . '/config/functions.php';

$speakers = getSpeakers();
$activities = getActivities();
$registrationSteps = getRegistrationSteps();
?>
<?php include 'includes/header.php'; ?>

    <!-- HERO SECTION - STUNNING ENTRANCE -->
    <section id="home" class="hero">
        <div class="hero-content">
            <h1 class="fade-in">🌍 Building a Sustainable Future for Tourism</h1>
            <p class="hero-subtitle fade-in">1st TANZANIA SUSTAINABLE TOURISM AND INNOVATION SUMMIT</p>
            <div class="hero-tagline fade-in">
                <p>🚀 Join Leading Voices in Sustainable Tourism Innovation Across East Africa</p>
            </div>
            <div class="hero-details fade-in">
                <span class="detail">📅 <?php echo EVENT_DATE; ?></span>
                <span class="detail">📍 <?php echo EVENT_LOCATION; ?></span>
            </div>
            <a href="#register" class="cta-btn fade-in">✨ Secure Your Seat Now</a>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section id="about" class="about section">
        <div class="container">
            <h2 class="section-title">About TASTS-2025</h2>
            <div class="about-content">
                <div class="about-text">
                    <h2>The First Tanzania Sustainable Tourism and Innovation Summit</h2>
                    <p>🌱 <strong>TASTS</strong> is an annual platform that brings together tourism industry leaders, innovators, policymakers, and change makers from Tanzania, the wider East African region, and beyond. This inaugural summit serves as a launchpad for building long-term dialogue, collaboration, and innovation toward a sustainable and inclusive tourism future.</p>
                    
                    <h3>💚 Why Sustainable Tourism Matters</h3>
                    <ul class="benefits-list">
                        <li><strong>🌍 Environmental Preservation:</strong> Protect natural habitats, reduce pollution, and conserve biodiversity for future generations.</li>
                        <li><strong>📚 Education and Awareness:</strong> Raise awareness about environmental and social issues to foster responsible travel behavior.</li>
                        <li><strong>👥 Community Empowerment:</strong> Support local artisans and businesses for economic sustainability and wealth creation.</li>
                        <li><strong>⭐ Long-term Viability:</strong> Ensure tourism benefits generations to come through responsible practices.</li>
                    </ul>
                    <p><strong>🤝 Join the movement!</strong> Choose eco-friendly accommodations, support local artisans, and take part in conservation. Together, we build a sustainable future for tourism in Tanzania and East Africa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SPEAKERS SECTION -->
    <section id="speakers" class="speakers section">
        <div class="container">
            <h2 class="section-title">👥 Meet Our Speakers</h2>
            <p class="section-subtitle sub-title">Industry Leaders & Innovation Experts</p>
            
            <?php
            $keynoteSpeakers = array_filter($speakers, function($s) { return $s['featured']; });
            $otherSpeakers = array_filter($speakers, function($s) { return !$s['featured']; });
            ?>

            <h3 class="section-subtitle sub-title">🎤 Keynote Speaker</h3>
            <div class="speakers-grid keynote">
                <?php foreach ($keynoteSpeakers as $speaker): ?>
                <div class="speaker-card featured">
                    <div class="speaker-image"><?php echo $speaker['icon']; ?></div>
                    <h4><?php echo htmlspecialchars($speaker['name']); ?></h4>
                    <p class="speaker-role"><?php echo htmlspecialchars($speaker['role']); ?></p>
                    <button class="expand-btn" onclick="toggleSpeaker(this)">Read More</button>
                    <div class="speaker-details" style="display: none;">
                        <p><?php echo htmlspecialchars($speaker['bio']); ?></p>
                        <p><strong>📌 Key Topics:</strong> <?php echo implode(', ', $speaker['topics']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <h3 class="section-subtitle sub-title">⭐ Distinguished Panel Speakers</h3>
            <div class="speakers-grid">
                <?php foreach ($otherSpeakers as $speaker): ?>
                <div class="speaker-card">
                    <div class="speaker-image"><?php echo $speaker['icon']; ?></div>
                    <h4><?php echo htmlspecialchars($speaker['name']); ?></h4>
                    <p class="speaker-role"><?php echo htmlspecialchars($speaker['role']); ?></p>
                    <button class="expand-btn" onclick="toggleSpeaker(this)">Read More</button>
                    <div class="speaker-details" style="display: none;">
                        <p><?php echo htmlspecialchars($speaker['bio']); ?></p>
                        <p><strong>📌 Key Topics:</strong> <?php echo implode(', ', $speaker['topics']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- JOURNEY SECTION -->
    <section id="journey" class="journey section">
        <div class="container">
            <h2 class="section-title" style="color: white;">🎯 Your Journey to the Event</h2>
            <p class="section-subtitle" style="color: rgba(255,255,255,0.9);">A seamless 4-step guide to securing your spot at TASTS-2025</p>
            <div class="steps-timeline">
                <?php foreach ($registrationSteps as $step): ?>
                <div class="step">
                    <div class="step-number"><?php echo $step['number']; ?></div>
                    <h4><?php echo htmlspecialchars($step['title']); ?></h4>
                    <p><?php echo htmlspecialchars($step['description']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ACTIVITIES SECTION -->
    <section id="activities" class="activities section">
        <div class="container">
            <h2 class="section-title">🎨 Post-Event Activities</h2>
            <p class="section-subtitle">Extend your journey and experience the beauty of Kilimanjaro</p>
            
            <div class="activities-grid">
                <?php foreach ($activities as $activity): ?>
                <div class="activity-card">
                    <div class="activity-icon"><?php echo $activity['icon']; ?></div>
                    <h4><?php echo htmlspecialchars($activity['title']); ?></h4>
                    <p class="activity-description"><?php echo htmlspecialchars($activity['description']); ?></p>
                    <div class="activity-details">
                        <strong>🏝️ Day Trips in Moshi:</strong>
                        <ul>
                            <?php foreach ($activity['activities'] as $act): ?>
                            <li><?php echo htmlspecialchars($act); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- REGISTRATION SECTION -->
    <section id="register" class="register section">
        <div class="container">
            <h2 class="section-title">🎟️ Secure Your Seat</h2>
            <p class="section-subtitle">Join us for the most impactful sustainable tourism summit in East Africa</p>
            
            <div class="register-container">
                <form id="registrationForm" class="registration-form">
                    <div class="form-group">
                        <label for="fullName">Full Name <span class="required">*</span></label>
                        <input type="text" id="fullName" name="fullName" placeholder="Enter your full name" required>
                        <span class="error-message" id="fullNameError"></span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address <span class="required">*</span></label>
                        <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                        <span class="error-message" id="emailError"></span>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number (optional)">
                        <span class="error-message" id="phoneError"></span>
                    </div>

                    <button type="submit" class="submit-btn" id="submitBtn">
                        <span id="btnText">🚀 Secure My Seat</span>
                        <span id="btnLoader" style="display: none;">Submitting...</span>
                    </button>
                    <span class="error-message" id="formError"></span>
                    <span class="success-message" id="successMessage"></span>
                </form>
            </div>
        </div>
    </section>

    <!-- NEWSLETTER SECTION -->
    <section class="newsletter section">
        <div class="container">
            <h2 class="section-title" style="color: white;">📧 Stay Updated</h2>
            <p class="section-subtitle" style="color: rgba(255,255,255,0.9);">Subscribe to our newsletter for the latest updates on sustainable tourism</p>
            <div class="newsletter-content">
                <p>Receive exclusive content, speaker updates, and special announcements directly to your inbox for TASTS-2025.</p>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
