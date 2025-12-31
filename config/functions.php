<?php
/**
 * Utility Functions for TASTS-2025 Website
 */

/**
 * Send Email Function
 * @param string $to Recipient email
 * @param string $subject Email subject
 * @param string $message Email body
 * @param string $from Sender email
 * @return bool
 */
function sendEmail($to, $subject, $message, $from = SENDER_EMAIL) {
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: " . SENDER_NAME . " <" . $from . ">" . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    
    return @mail($to, $subject, $message, $headers);
}

/**
 * Sanitize Input
 * @param string $input User input
 * @return string Sanitized string
 */
function sanitize($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * Validate Email
 * @param string $email Email to validate
 * @return bool
 */
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Validate Phone Number (Basic)
 * @param string $phone Phone number
 * @return bool
 */
function isValidPhone($phone) {
    $phone = preg_replace('/[^0-9+]/', '', $phone);
    return strlen($phone) >= 10;
}

/**
 * Log Registration
 * @param string $fullName
 * @param string $email
 * @param string $phone
 * @return bool
 */
function logRegistration($fullName, $email, $phone = '') {
    $logFile = __DIR__ . '/../logs/registrations.log';
    
    // Create logs directory if not exists
    $logDir = dirname($logFile);
    if (!is_dir($logDir)) {
        mkdir($logDir, 0755, true);
    }
    
    $data = date('Y-m-d H:i:s') . " | " . $fullName . " | " . $email . " | " . $phone . "\n";
    return file_put_contents($logFile, $data, FILE_APPEND | LOCK_EX) !== false;
}

/**
 * Get Speakers Data
 * @return array
 */
function getSpeakers() {
    return [
        [
            'id' => 1,
            'name' => 'Dr. Minja, Gileard Sifuel',
            'role' => 'Lecturer, Research Scientist and Consultant',
            'icon' => '🎓',
            'featured' => true,
            'bio' => 'Dr. Gileard Minja holds a Ph.D. in Environmental Studies from the University of Adelaide in South Australia. With extensive expertise in environmental management and sustainable tourism practices, Dr. Minja is a leading voice in promoting conservation and responsible tourism in East Africa.',
            'topics' => ['Sustainable Tourism Strategy', 'Environmental Management', 'Conservation Innovation']
        ],
        [
            'id' => 2,
            'name' => 'Prof. Dr. Mkonda, Msafiri',
            'role' => 'Waste Management and Circular Economy',
            'icon' => '♻️',
            'featured' => false,
            'bio' => 'Associate Professor at Sokoine University of Agriculture, Professor Msafiri specializes in waste management solutions and circular economy principles applied to tourism. His work addresses critical challenges of waste reduction in tourism destinations.',
            'topics' => ['Circular Economy', 'Waste Management', 'Sustainable Value Chains']
        ],
        [
            'id' => 3,
            'name' => 'Mrs. Gillies, Dawn Adam',
            'role' => 'Wellness and Yoga Expert',
            'icon' => '🧘',
            'featured' => false,
            'bio' => 'An experienced wellness professional dedicated to helping clients of all ages and abilities improve their health and wellbeing. Mrs. Adam integrates yoga, pilates, and mindfulness practices into holistic wellness programs.',
            'topics' => ['Wellness Tourism', 'Mindfulness', 'Health and Well-being in Travel']
        ],
        [
            'id' => 4,
            'name' => 'Mr. Kagomba, Saul Samwel',
            'role' => 'Disaster Risk Management',
            'icon' => '🛡️',
            'featured' => false,
            'bio' => 'Tutorial Assistant in Disaster Risk Management with expertise in preparedness and resilience building. Mr. Kagomba works on integrating disaster risk reduction into tourism planning and operations.',
            'topics' => ['Disaster Preparedness', 'Risk Management', 'Tourism Safety']
        ],
        [
            'id' => 5,
            'name' => 'Dr. Mayala, Nyanjige',
            'role' => 'Senior Lecturer, Economics and Business Studies',
            'icon' => '📊',
            'featured' => false,
            'bio' => 'Senior Lecturer at Mwenge Catholic University in Tanzania. Dr. Nyanjige provides critical analysis of tourism economics, market trends, and sustainable business models for the tourism sector.',
            'topics' => ['Tourism Economics', 'Business Strategy', 'Market Analysis']
        ],
        [
            'id' => 6,
            'name' => 'Mrs. Redondo, Mayte Castuera',
            'role' => 'Sustainability Expert and Advocate',
            'icon' => '🌱',
            'featured' => false,
            'bio' => 'Founder of Travel 2 Care People and Planet, Mayte is a renowned Sustainable Tourism Advocate. She helps companies transform their tourism businesses with sustainability practices.',
            'topics' => ['Sustainable Business Transformation', 'Corporate Responsibility', 'Impact Tourism']
        ],
        [
            'id' => 7,
            'name' => 'Mrs. Smits, Samantha',
            'role' => 'Sustainability Expert',
            'icon' => '🌍',
            'featured' => false,
            'bio' => 'Consultant for CEOs and decision-makers, Samantha specializes in transforming tourism businesses through sustainability initiatives while maintaining profitability.',
            'topics' => ['Sustainable Leadership', 'Tourism Business Transformation', 'Stakeholder Engagement']
        ]
    ];
}

/**
 * Get Activities Data
 * @return array
 */
function getActivities() {
    return [
        [
            'id' => 1,
            'title' => 'Safari Adventures',
            'icon' => '🦁',
            'description' => 'Discover breathtaking wildlife on our guided safari tours, exploring pristine landscapes with expert guides.',
            'activities' => [
                'Half-day Arusha National Park Safari',
                'Full-day Serengeti Wildlife Experience',
                'Mount Kilimanjaro Scenic Tours',
                'Expert-guided nature walks and bird watching'
            ]
        ],
        [
            'id' => 2,
            'title' => 'Scenic Day Trips',
            'icon' => '🏞️',
            'description' => 'Relax with curated day trips to iconic attractions, offering serene views and cultural insights.',
            'activities' => [
                'Chala Lake - Crystal clear crater lake views',
                'Materuni Waterfalls - Scenic hiking and cultural experience',
                'Kilimanjaro foothills exploration',
                'Local village visits and cultural immersion'
            ]
        ],
        [
            'id' => 3,
            'title' => 'Community Tours',
            'icon' => '👥',
            'description' => 'Engage with local communities through cultural tours, learning about their rich traditions and heritage.',
            'activities' => [
                'Traditional craft workshops and artisan training',
                'Local market visits and fair-trade shopping',
                'Cultural performances and storytelling sessions',
                'Farm-to-table dining experiences with local producers'
            ]
        ],
        [
            'id' => 4,
            'title' => 'Adventure Sports',
            'icon' => '⛰️',
            'description' => 'Get your adrenaline pumping with thrilling outdoor activities in Tanzania.',
            'activities' => [
                'Kilimanjaro trekking (various routes and difficulty levels)',
                'Rock climbing and rappelling experiences',
                'Kayaking and water sports on local lakes',
                'Paragliding over scenic Kilimanjaro landscapes'
            ]
        ]
    ];
}

/**
 * Get Registration Steps
 * @return array
 */
function getRegistrationSteps() {
    return [
        [
            'number' => 1,
            'title' => 'Choose Your Event',
            'description' => 'Explore our wide range of sessions and select those that align with your goals and interests in sustainable tourism innovation.'
        ],
        [
            'number' => 2,
            'title' => 'Complete Your Application',
            'description' => 'Fill in your personal details accurately and submit the registration form. This helps us prepare a customized experience for you.'
        ],
        [
            'number' => 3,
            'title' => 'Secure Your Spot',
            'description' => 'Complete your registration. You\'ll receive a confirmation email with event details, agenda, and next steps.'
        ],
        [
            'number' => 4,
            'title' => 'Attend with Confidence',
            'description' => 'Receive confirmation and prepare for an enriching event experience with industry leaders and innovators.'
        ]
    ];
}
?>
