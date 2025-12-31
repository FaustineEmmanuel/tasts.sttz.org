# TASTS-2025 Summit Website - XAMPP Installation Guide

## Overview
This is a professional PHP-based website for the **1st Tanzania Sustainable Tourism and Innovation Summit (TASTS-2025)** with:
- Modern responsive design matching STTZ branding colors
- Full speaker profiles and activities information
- Working registration form with email confirmation
- All event details and post-event activities

## System Requirements
- **Windows, Mac, or Linux**
- **XAMPP** (Apache + PHP 7.4 or higher)
- **Web Browser** (Chrome, Firefox, Safari, Edge)
- **Text Editor** (optional, for customization)

## Installation Steps

### Step 1: Download and Install XAMPP

#### Windows:
1. Download XAMPP from [https://www.apachefriends.org/](https://www.apachefriends.org/)
2. Run the installer and follow the installation wizard
3. Choose installation folder (default: `C:\xampp`)
4. Make sure Apache and MySQL are selected

#### Mac:
1. Download XAMPP for Mac from [https://www.apachefriends.org/](https://www.apachefriends.org/)
2. Double-click the installer
3. Follow the installation instructions
4. Default location: `/Applications/XAMPP`

#### Linux:
```bash
sudo chmod +x xampp-linux-installer.run
sudo ./xampp-linux-installer.run
```

### Step 2: Extract Website Files

1. **Open your file explorer and navigate to the XAMPP htdocs folder:**
   - Windows: `C:\xampp\htdocs`
   - Mac: `/Applications/XAMPP/htdocs`
   - Linux: `/opt/lampp/htdocs`

2. **Create a new folder** for the website:
   ```
   Create folder named: tasts2025
   ```

3. **Extract/Copy all website files into this folder:**
   - index.php
   - pages/ folder (with register.php)
   - config/ folder (with settings.php and functions.php)
   - includes/ folder (with header.php and footer.php)
   - assets/ folder (with css/ and js/ subfolders)
   - logs/ folder (will store registration logs)

### Step 3: Configure Email Settings

1. **Open** `config/settings.php` in a text editor

2. **Find these lines:**
   ```php
   define('RECIPIENT_EMAIL', 'faustineemmanuel0601@gmail.com');
   define('SENDER_NAME', 'TASTS-2025 Summit');
   define('SENDER_EMAIL', 'noreply@tasts2025.local');
   ```

3. **Customize:**
   - Change `RECIPIENT_EMAIL` to where you want registration emails sent
   - Change `SENDER_NAME` to your organization name
   - Change `SENDER_EMAIL` to your organization email

### Step 4: Start XAMPP Services

1. **Open XAMPP Control Panel:**
   - Windows: Find "XAMPP Control Panel" in Start menu
   - Mac: Open `/Applications/XAMPP/manager-osx.app`
   - Linux: Run `sudo /opt/lampp/manager-linux.run`

2. **Start Apache:**
   - Click **Start** button next to "Apache"
   - Wait until it shows as "Running"

3. **Optional - Start MySQL** (not required for basic website):
   - Click **Start** button next to "MySQL"

### Step 5: Access the Website

1. **Open your web browser**

2. **Type the following URL:**
   ```
   http://localhost/tasts2025/
   ```

3. **You should see the TASTS-2025 Summit website!**

## File Structure

```
tasts2025/
├── index.php                 # Main homepage (loads all sections)
├── config/
│   ├── settings.php         # Configuration file (edit email here)
│   └── functions.php        # Utility functions and data
├── pages/
│   └── register.php         # Registration form processor (PHP)
├── includes/
│   ├── header.php          # Navigation and <head> section
│   └── footer.php          # Footer section
├── assets/
│   ├── css/
│   │   └── style.css       # All styling (colors, layouts, responsive)
│   └── js/
│       └── script.js       # Interactive functionality (menu, forms)
└── logs/
    └── registrations.log   # Registration records (auto-created)
```

## Features Explained

### Hero Section
- Eye-catching gradient background with event title
- Event date, location, and call-to-action button
- Smooth fade-in animations

### About Section
- Information about the TASTS-2025 summit
- Four key benefits of sustainable tourism
- Professional card-based layout

### Speakers Section
- **Keynote Speaker**: Dr. Gileard Minja (highlighted with gradient)
- **6 Distinguished Speakers**: With expandable bios and topics
- Hover animations on speaker cards

### Registration Journey Section
- 4-step visual timeline of the registration process
- Gradient background matching logo colors
- Clear, descriptive steps

### Activities Section
- **4 Post-Event Activity Types:**
  1. Safari Adventures (wildlife tours)
  2. Scenic Day Trips (nature destinations)
  3. Community Tours (cultural experiences)
  4. Adventure Sports (thrilling activities)
- Each with detailed sub-activities specific to Moshi region

### Registration Form
- Clean, professional form design
- **Fields:** Full Name, Email, Phone Number (optional)
- **Features:**
  - Real-time validation
  - Error messages
  - Success confirmation
  - Logs all registrations to `logs/registrations.log`
  - Sends confirmation email to registrant
  - Sends notification email to organizer

### Color Scheme (STTZ Branding)
- **Primary Green**: #2d7a3e (main color)
- **Secondary Blue**: #3b5998 (accents)
- **Accent Green**: #4caf50 (highlights)
- **Accent Blue**: #5a7fc7 (details)

## Customization Guide

### Change Event Date/Location
1. Open `config/settings.php`
2. Find and edit:
   ```php
   define('EVENT_DATE', '19th September, 2025');
   define('EVENT_LOCATION', 'Uhuru Hotel Conference Hall, Moshi, Kilimanjaro');
   ```

### Add or Edit Speakers
1. Open `config/functions.php`
2. Find the `getSpeakers()` function
3. Add new speaker array:
   ```php
   [
       'id' => 8,
       'name' => 'Dr. Name Here',
       'role' => 'Position Title',
       'icon' => '🎓',
       'featured' => false,
       'bio' => 'Biography text...',
       'topics' => ['Topic 1', 'Topic 2', 'Topic 3']
   ]
   ```

### Modify Colors
1. Open `assets/css/style.css`
2. Find `:root` CSS variables (top of file)
3. Change color values:
   ```css
   :root {
       --primary-green: #2d7a3e;
       --secondary-blue: #3b5998;
       --accent-green: #4caf50;
       --accent-blue: #5a7fc7;
   }
   ```

## Email Configuration (Advanced)

The form currently uses PHP's built-in `mail()` function. For production use, configure your server's mail service or use SMTP:

### Option 1: Use XAMPP Built-in Mail
XAMPP comes with a mail handler. Emails will be logged locally.

### Option 2: Configure SendGrid/SMTP
1. Install PHPMailer or SwiftMailer
2. Update `pages/register.php` to use SMTP
3. Add credentials from your email service

### Option 3: Local Testing
Emails are logged to `logs/registrations.log` for testing purposes.

## Troubleshooting

### Website shows "404 Not Found"
- **Solution**: Make sure folder is named `tasts2025` and URL is `http://localhost/tasts2025/`

### Registration form doesn't submit
- **Check 1**: Make sure Apache is running
- **Check 2**: Check browser console for JavaScript errors (F12 key)
- **Check 3**: Check `logs/registrations.log` to see if it was recorded

### Emails not sending
- **Local Testing**: Emails are logged to `logs/registrations.log`
- **Production**: Configure mail service in your hosting provider

### CSS/JavaScript not loading
- **Solution**: Clear browser cache (Ctrl+Shift+Delete or Cmd+Shift+Delete)
- **Alternative**: Try a different browser

### Permission Denied errors
- **Linux/Mac**: Run XAMPP as administrator
- **Windows**: Run XAMPP Control Panel as administrator

## Browser Compatibility

✅ Works on:
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (responsive design)

## Performance Tips

1. **Clear XAMPP logs regularly:**
   - `C:\xampp\apache\logs`

2. **Backup registrations:**
   - Copy `logs/registrations.log` regularly

3. **Optimize images:**
   - Keep hero images under 2MB

## Support & Help

If you encounter issues:

1. **Check XAMPP Status:**
   - Open XAMPP Control Panel
   - Ensure Apache is running

2. **Check File Permissions:**
   - Make sure `logs/` folder is writable

3. **Review Error Logs:**
   - Check `C:\xampp\apache\logs\error.log` (Windows)
   - Check `/Applications/XAMPP/logs/error_log` (Mac)

4. **Test Locally First:**
   - Always test on localhost before deploying to production

## Deployment to Live Server

To deploy to a production server:

1. **Upload all files** via FTP to your web hosting
2. **Update** `config/settings.php` with live URL:
   ```php
   define('APP_URL', 'https://yourdomain.com/tasts2025');
   ```
3. **Configure email** with your hosting provider's settings
4. **Set proper permissions** on `logs/` folder (755)
5. **Test registration** form before going live

## License & Credits

TASTS-2025 Summit Website
© 2025 TASTS-2025 Team. All rights reserved.

Built with:
- PHP 7.4+
- HTML5
- CSS3
- JavaScript (vanilla, no dependencies)

---

**Ready to go live? Follow the installation steps above and your website will be ready to accept registrations!**
