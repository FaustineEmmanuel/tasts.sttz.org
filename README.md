# TASTS-2025 Website

**1st Tanzania Sustainable Tourism and Innovation Summit**

A professional, fully-functional PHP website for the TASTS-2025 summit featuring complete speaker information, event details, and a working registration form with email notifications.

## 🌍 Live Website Features

- **Complete Speaker Information**: 1 Keynote + 6 Distinguished Speakers with detailed bios
- **Event Details**: Date, location, and summit overview
- **Registration Form**: Fully functional with email notifications
- **Post-Event Activities**: Safari adventures, day trips, community tours, adventure sports
- **Responsive Design**: Mobile, tablet, and desktop optimized
- **Smooth Animations**: Professional transitions and scroll effects
- **Email Notifications**: Confirmation emails to registrants and admin

## 📋 Sections Included

1. **Hero Section** - Event announcement with key details
2. **About** - Summit mission and sustainable tourism overview
3. **Speakers** - Keynote and distinguished speakers with expandable profiles
4. **Registration Steps** - 4-step guide to securing a seat
5. **Post-Event Activities** - Detailed information about tourism activities
6. **Registration Form** - Email-integrated form
7. **Newsletter** - Call to action for updates
8. **Footer** - Contact and additional information

## 🚀 Quick Start

### Option 1: Using XAMPP (Recommended for beginners)
```bash
1. Download XAMPP from https://www.apachefriends.org/
2. Copy tasts2025 folder to xampp/htdocs/
3. Start Apache in XAMPP Control Panel
4. Visit http://localhost/tasts2025/
```

### Option 2: Using PHP Built-in Server
```bash
php -S localhost:8000
# Visit http://localhost:8000/
```

### Option 3: Hosting Provider
Upload all files via FTP to your hosting account.

## 📧 Email Configuration

**Recipient Email**: `faustineemmanuel0601@gmail.com`

To change:
1. Edit `config.php`
2. Update `RECIPIENT_EMAIL` value

## 🎨 Customization

### Change Colors
Edit `public/css/style.css`:
```css
--primary-green: #2d8659;
--secondary-blue: #4a90e2;
--accent-orange: #ff9500;
```

### Change Event Details
Edit `index.php` and search for:
- Event date
- Location
- Speaker names/bios

## 📁 File Structure

```
tasts2025/
├── index.php                 # Main website
├── config.php               # Configuration
├── submit_registration.php  # Form handler
├── public/
│   ├── css/style.css       # Styling
│   ├── js/script.js        # JavaScript
│   └── images/logo.jpg     # Logo
└── logs/                   # Error logging
```

## ✨ Key Features

- ✅ Complete speaker profiles with detailed information
- ✅ Fully functional registration form
- ✅ Email notifications (confirmation + admin alert)
- ✅ Mobile-responsive design
- ✅ Smooth scroll animations
- ✅ Form validation
- ✅ Error handling
- ✅ SEO optimized

## 🔧 Requirements

- PHP 7.4+
- Web server (Apache/Nginx/XAMPP)
- Email capability (mail() or SMTP)
- Modern browser

## 📞 Support

For issues, check `logs/error.log` for detailed error messages.

## 📅 Event Details

- **Date**: 19th September, 2025
- **Location**: Uhuru Hotel Conference Hall
- **City**: Moshi, Kilimanjaro
- **Event**: 1st Tanzania Sustainable Tourism and Innovation Summit

---

**Version**: 1.0  
**Type**: PHP Web Application  
**License**: All Rights Reserved
