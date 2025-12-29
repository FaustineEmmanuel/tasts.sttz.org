// Mobile menu toggle
const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('navMenu');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navMenu.classList.toggle('active');
});

// Close menu when a link is clicked
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        navMenu.classList.remove('active');
    });
});

// Navigation active state
function setActive(event) {
    event.preventDefault();
    
    // Remove active class from all links
    document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('active');
    });
    
    // Add active class to clicked link
    event.currentTarget.classList.add('active');
    
    // Get the target section
    const targetId = event.currentTarget.getAttribute('href').substring(1);
    const targetElement = document.getElementById(targetId);
    
    if (targetElement) {
        targetElement.scrollIntoView({ behavior: 'smooth' });
    }
}

// Update active nav link on scroll
window.addEventListener('scroll', () => {
    let current = '';
    const sections = document.querySelectorAll('section[id]');
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (pageYOffset >= sectionTop - 200) {
            current = section.getAttribute('id');
        }
    });
    
    document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === '#' + current) {
            link.classList.add('active');
        }
    });
});

// Speaker toggle functionality
function toggleSpeaker(button) {
    const details = button.nextElementSibling;
    const isVisible = details.style.display !== 'none';
    
    details.style.display = isVisible ? 'none' : 'block';
    button.textContent = isVisible ? 'Read More' : 'Read Less';
}

// Registration form handling
const registrationForm = document.getElementById('registrationForm');

registrationForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    // Get form values
    const fullName = document.getElementById('fullName').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    
    // Reset error messages
    document.getElementById('fullNameError').textContent = '';
    document.getElementById('emailError').textContent = '';
    document.getElementById('formError').textContent = '';
    document.getElementById('successMessage').classList.remove('show');
    
    // Validate
    let hasError = false;
    
    if (!fullName) {
        document.getElementById('fullNameError').textContent = 'Full name is required';
        document.getElementById('fullNameError').classList.add('show');
        hasError = true;
    }
    
    if (!email) {
        document.getElementById('emailError').textContent = 'Email is required';
        document.getElementById('emailError').classList.add('show');
        hasError = true;
    } else if (!isValidEmail(email)) {
        document.getElementById('emailError').textContent = 'Please enter a valid email address';
        document.getElementById('emailError').classList.add('show');
        hasError = true;
    }
    
    if (hasError) return;
    
    // Show loading state
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const btnLoader = document.getElementById('btnLoader');
    
    submitBtn.disabled = true;
    btnText.style.display = 'none';
    btnLoader.style.display = 'inline';
    
    try {
        const response = await fetch('submit_registration.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                fullName: fullName,
                email: email,
                phone: phone || null
            })
        });
        
        const data = await response.json();
        
        if (data.success) {
            // Show success message
            const successMsg = document.getElementById('successMessage');
            successMsg.textContent = data.message;
            successMsg.classList.add('show');
            
            // Reset form
            registrationForm.reset();
            
            // Scroll to success message
            successMsg.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        } else {
            // Show error message
            const formError = document.getElementById('formError');
            formError.textContent = data.message || 'An error occurred. Please try again.';
            formError.classList.add('show');
        }
    } catch (error) {
        console.error('Error:', error);
        const formError = document.getElementById('formError');
        formError.textContent = 'Network error. Please check your connection and try again.';
        formError.classList.add('show');
    } finally {
        // Reset button state
        submitBtn.disabled = false;
        btnText.style.display = 'inline';
        btnLoader.style.display = 'none';
    }
});

// Email validation helper
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Smooth scroll for hash links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href !== '#' && document.querySelector(href)) {
            e.preventDefault();
            const element = document.querySelector(href);
            element.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

// Add scroll animation to elements
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe cards and sections for animation
document.querySelectorAll('.speaker-card, .activity-card, .step').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
});
