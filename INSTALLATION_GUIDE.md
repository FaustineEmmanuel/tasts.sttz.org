# TASTS-2025 Website - Installation Guide

## 1st Tanzania Sustainable Tourism and Innovation Summit Website

This is a complete, standalone PHP website for the TASTS-2025 summit. It includes:
- Complete website with all speaker information
- Functional registration form with email notifications
- Post-event activities information
- Responsive design for all devices
- Professional animations and styling

---

## System Requirements

- **PHP**: 7.4 or higher
- **Web Server**: Apache, Nginx, or any PHP-compatible server
- **Email Support**: SMTP or mail() function enabled

---

## Installation Steps

### Option 1: Using XAMPP (Windows/Mac/Linux)

1. **Download and Install XAMPP**
   - Download from: https://www.apachefriends.org/
   - Install with default settings

2. **Extract Website Files**
   - Extract the TASTS-2025 folder
   - Copy it to: `xampp/htdocs/tasts2025/`

3. **Start XAMPP**
   - Open XAMPP Control Panel
   - Click "Start" for Apache
   - Click "Start" for MySQL (optional, not needed for this version)

4. **Access the Website**
   - Open your browser
   - Go to: `http://localhost/tasts2025/`

---

### Option 2: Using Built-in PHP Server (Quick Testing)

1. **Extract Website Files**
   - Navigate to the TASTS-2025 folder in terminal

2. **Run PHP Server**
   ```bash
   php -S localhost:8000
   ```

3. **Access the Website**
   - Open your browser
   - Go to: `http://localhost:8000/`

---

### Option 3: Using a Hosting Provider

1. **Upload Files via FTP**
   - Use FileZilla or your host's file manager
   - Upload all files to your public_html folder

2. **Access the Website**
   - Go to: `https://yourdomain.com/`

---

## Configuration

### Email Setup

The registration form sends emails to: `faustineemmanuel0601@gmail.com`

#### For Local Testing (XAMPP):

1. **Edit config.php**
   ```php
   define('RECIPIENT_EMAIL', 'faustineemmanuel0601@gmail.com');
   define('SENDER_EMAIL', 'noreply@tasts2025.local');
   ```

2. **Enable PHP Mail**
   - Edit `php.ini` (in xampp/php/)
   - Find the `[mail function]` section
   - Set: `SMTP = smtp.gmail.com`
   - Set: `smtp_port = 587`

#### For Production (Hosting Provider):

1. **Contact Your Host**
   - Ask for SMTP credentials
   - Update config.php with SMTP details

2. **Alternative: Use Gmail SMTP**
   ```php
   // In submit_registration.php, replace mail() with:
   // Use PHPMailer library (included in premium packages)
   ```

---

## File Structure

```
tasts2025/
├── index.php                 # Main website file
├── config.php               # Configuration settings
├── submit_registration.php  # Form handler
├── INSTALLATION_GUIDE.md    # This file
├── SETUP_INSTRUCTIONS.txt   # Setup details
├── public/
│   ├── css/
│   │   └── style.css       # Website styling
│   ├── js/
│   │   └── script.js       # JavaScript functionality
│   └── images/
│       └── logo.jpg        # TASTS-2025 logo
└── logs/
    └── error.log           # Error logging (auto-created)
```

---

## Customization

### Change Recipient Email

Edit `config.php`:
```php
define('RECIPIENT_EMAIL', 'your-email@example.com');
```

### Update Event Details

Edit `index.php` and modify:
- Event date
- Event location
- Speaker information
- Activities description

### Modify Colors and Styling

Edit `public/css/style.css`:
```css
:root {
    --primary-green: #2d8659;
    --secondary-blue: #4a90e2;
    --accent-orange: #ff9500;
    /* ... other colors ... */
}
```

---

## Troubleshooting

### Emails Not Sending

1. **Check PHP Mail Configuration**
   ```bash
   php -i | grep -i mail
   ```

2. **Enable Error Logging**
   - Check `logs/error.log` for details

3. **Test Mail Function**
   ```php
   // Create test.php
   if (mail('test@example.com', 'Test', 'Test message')) {
       echo 'Mail sent!';
   } else {
       echo 'Mail failed!';
   }
   ```

### Page Not Displaying

1. Check that `index.php` is in the correct directory
2. Verify Apache is running
3. Check `logs/error.log` for PHP errors

### Form Not Submitting

1. Check browser console for JavaScript errors
2. Verify `submit_registration.php` permissions (644)
3. Check that `config.php` exists in root directory

---

## Security Notes

- Email addresses are validated on both client and server
- Input is sanitized before processing
- Error logging is enabled for debugging

---

## Testing the Website Locally

### With XAMPP:
```
1. Open XAMPP Control Panel
2. Start Apache
3. Visit: http://localhost/tasts2025/
```

### With PHP Server:
```bash
# In the TASTS-2025 folder
php -S localhost:8000

# Visit: http://localhost:8000/
```

---

## Support

For issues or questions:
1. Check `logs/error.log`
2. Verify all files are uploaded correctly
3. Ensure PHP version is 7.4+
4. Check email configuration in `config.php`

---

## Website Features

✅ Fully responsive design (mobile, tablet, desktop)
✅ Complete speaker profiles with expandable details
✅ Post-event activities with comprehensive descriptions
✅ Working registration form with email notifications
✅ Smooth animations and transitions
✅ Navigation menu with active highlighting
✅ Contact information for all speakers
✅ SEO optimized
✅ Mobile-friendly hamburger menu

---

**Version**: 1.0
**Last Updated**: December 2024
**Event Date**: 19th September, 2025
**Event Location**: Uhuru Hotel Conference Hall, Moshi, Kilimanjaro
