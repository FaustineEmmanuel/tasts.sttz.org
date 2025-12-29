# TASTS-2025 Website - Complete Deployment Guide

## 🎉 Your Website is Ready!

Your complete PHP website for the 1st Tanzania Sustainable Tourism and Innovation Summit is ready for deployment.

---

## 📦 What's Included

### Website Files
- **index.php** - Main website with all content
- **config.php** - Configuration settings
- **submit_registration.php** - Email form handler
- **public/css/style.css** - Complete styling
- **public/js/script.js** - Interactive features
- **public/images/logo.jpg** - TASTS-2025 logo

### Documentation
- **INSTALLATION_GUIDE.md** - Step-by-step installation
- **SETUP_INSTRUCTIONS.txt** - Quick setup guide
- **README.md** - Project overview
- **COMPLETE_DEPLOYMENT_GUIDE.md** - This file

---

## 🚀 3 Ways to Deploy (Choose One)

### Method 1: XAMPP (Easiest - Windows/Mac/Linux)

**Step 1: Download & Install XAMPP**
- Visit: https://www.apachefriends.org/
- Download XAMPP for your operating system
- Run installer with default settings

**Step 2: Copy Website Files**
- Extract TASTS-2025 folder
- Copy to: `xampp/htdocs/tasts2025/`

**Step 3: Start Server**
- Open XAMPP Control Panel
- Click "Start" next to Apache

**Step 4: Access Website**
- Open browser
- Visit: `http://localhost/tasts2025/`

✅ Your website is now live locally!

---

### Method 2: PHP Built-in Server (Quick Test)

**Step 1: Navigate to Folder**
```bash
# On Windows: Open Command Prompt
# On Mac/Linux: Open Terminal

cd path/to/tasts2025
```

**Step 2: Start Server**
```bash
php -S localhost:8000
```

**Step 3: Access Website**
- Open browser
- Visit: `http://localhost:8000/`

✅ Your website is running! (Press Ctrl+C to stop)

---

### Method 3: Live Hosting (Production)

**Step 1: Get Hosting**
- Choose a provider (GoDaddy, Bluehost, Hostinger, etc.)
- Get FTP credentials from provider

**Step 2: Upload Files**
- Download FileZilla (free): https://filezilla-project.org/
- Connect using FTP credentials
- Upload all TASTS-2025 files to public_html

**Step 3: Access Website**
- Visit: `https://yourdomain.com/`

✅ Your website is live on the internet!

---

## 📧 Email Configuration

### The Form Sends Emails To:
```
faustineemmanuel0601@gmail.com
```

### To Change Recipient Email:

**Edit config.php:**
1. Open `config.php` in text editor
2. Find line: `define('RECIPIENT_EMAIL', 'faustineemmanuel0601@gmail.com');`
3. Replace email address
4. Save file

### Email Features:

**User receives:**
- Confirmation of their registration
- Event date, location, and details

**Admin receives:**
- Registration notification
- Attendee's name, email, phone
- Registration timestamp

---

## 🎨 Customizing Your Website

### 1. Change Website Title
**Edit index.php:**
```html
<title>TASTS-2025 - Tanzania Sustainable Tourism Summit</title>
```
Change to your preferred title.

### 2. Change Colors
**Edit public/css/style.css:**
```css
:root {
    --primary-green: #2d8659;      /* Main color */
    --secondary-blue: #4a90e2;     /* Secondary color */
    --accent-orange: #ff9500;      /* Accent color */
}
```

### 3. Update Speaker Information
**Edit index.php:**
Find speaker sections and update:
- Speaker names
- Roles and titles
- Bio information

### 4. Modify Event Details
**Edit index.php:**
Search for and update:
- Event date (19th September, 2025)
- Event location (Uhuru Hotel Conference Hall)
- Event city (Moshi, Kilimanjaro)

### 5. Change Logo
- Replace `public/images/logo.jpg` with your logo
- Or update the emoji in the navbar (in index.php)

---

## 🧪 Testing the Registration Form

1. **Visit the website**
2. **Scroll to "Secure Your Seat" section**
3. **Fill in the form:**
   - Full Name: John Doe
   - Email: your-test@example.com
   - Phone: (optional)
4. **Click "Secure My Seat"**
5. **Check your email** - You should receive confirmation

---

## 📱 Website Features Breakdown

### Hero Section
- Large banner with event announcement
- Event date and location
- Call-to-action button

### About Section
- Summit overview
- Why sustainable tourism matters
- Key benefits and mission

### Speakers Section (Complete)
**Keynote Speaker:**
- Dr. Minja, Gileard Sifuel - Lecturer, Research Scientist
  - PhD in Environmental Studies
  - Expertise: Sustainable Tourism, Environmental Management

**Other Speakers:**
1. Prof. Dr. Mkonda, Msafiri
   - Waste Management and Circular Economy
   - Associate Professor, Sokoine University

2. Mrs. Gillies, Dawn Adam
   - Yoga and Wellness Expert
   - Health and well-being focus

3. Mr. Kagomba, Saul Samwel
   - Disaster Risk Management
   - Safety and preparedness expert

4. Dr. Mayala, Nyanjige
   - Senior Lecturer, Economics & Business Studies
   - Tourism business analysis

5. Mrs. Redondo, Mayte Castuera
   - Sustainability Expert
   - CEO, Travel 2 Care People and Planet

6. Mrs. Smits, Samantha
   - Sustainability Expert
   - CEO consulting and business transformation

### Registration Steps
- 4-step visual guide
- Choose Event
- Complete Application
- Secure Spot
- Attend with Confidence

### Post-Event Activities
1. **Safari Adventures**
   - Guided safaris
   - Half-day and full-day tours
   - Serengeti wildlife experience

2. **Scenic Day Trips**
   - Chala Lake
   - Materuni Waterfalls
   - Kilimanjaro foothills

3. **Community Tours**
   - Cultural immersion
   - Local market visits
   - Farm-to-table dining

4. **Adventure Sports**
   - Kilimanjaro trekking
   - Rock climbing
   - Paragliding

### Registration Form
- Full Name field (required)
- Email field (required, validated)
- Phone field (optional)
- Email notifications enabled
- Smooth animations

### Mobile Responsive
- Works on all devices
- Hamburger menu for mobile
- Touch-friendly design

---

## 🔧 System Requirements

| Requirement | Specification |
|------------|---------------|
| PHP Version | 7.4 or higher |
| Web Server | Apache, Nginx, IIS |
| Database | Not required |
| Email | SMTP or mail() enabled |
| Browser | Any modern browser |
| Internet | For production hosting |

---

## 📋 File Checklist

Make sure you have all files:

```
✓ index.php
✓ config.php
✓ submit_registration.php
✓ public/css/style.css
✓ public/js/script.js
✓ public/images/logo.jpg
✓ INSTALLATION_GUIDE.md
✓ SETUP_INSTRUCTIONS.txt
✓ README.md
✓ COMPLETE_DEPLOYMENT_GUIDE.md
```

---

## 🛠️ Troubleshooting

### Problem: "Page shows blank"
**Solution:**
1. Check PHP version: `php -v`
2. Ensure Apache/server is running
3. Check that `index.php` is in root folder

### Problem: "Form doesn't submit"
**Solution:**
1. Open browser Developer Tools (F12)
2. Check Console for errors
3. Verify `submit_registration.php` exists
4. Check `config.php` for email settings

### Problem: "Emails not sending"
**Solution:**
1. Check email in `config.php`
2. For XAMPP: Configure SMTP in php.ini
3. Check `logs/error.log` for errors
4. Try with different email provider

### Problem: "Styling looks broken"
**Solution:**
1. Clear browser cache (Ctrl+Shift+Delete)
2. Refresh page (Ctrl+F5 or Cmd+Shift+R)
3. Check that CSS file exists in `public/css/`

### Problem: "Mobile menu doesn't work"
**Solution:**
1. Check JavaScript is enabled
2. Open browser console for errors
3. Verify `public/js/script.js` exists

---

## 🔐 Security Notes

✅ Form inputs are validated
✅ Email addresses are sanitized
✅ Error logging is enabled
✅ No sensitive data in code
✅ Input filtering implemented

---

## 📊 Content Included

### Total Content:
- ✅ 7 Speaker profiles (complete)
- ✅ 4 Activity types (detailed)
- ✅ 4 Registration steps (visual)
- ✅ Complete About section
- ✅ Working email form
- ✅ 200+ lines of CSS
- ✅ 400+ lines of JavaScript
- ✅ Full responsive design

---

## 🌐 Hosting Recommendations

### For Learning/Testing:
- ✅ XAMPP (local)
- ✅ PHP built-in server

### For Production:
- **SiteGround** - Easy PHP, good support
- **Bluehost** - Official WordPress hosting
- **HostGator** - Affordable PHP hosting
- **GoDaddy** - Popular, reliable
- **Hostinger** - Budget-friendly
- **DreamHost** - Developer-friendly

All support PHP 7.4+ and email functionality.

---

## 📧 After Deployment

### Checklist:
- [ ] Website loads without errors
- [ ] All sections display correctly
- [ ] Mobile menu works
- [ ] Registration form submits
- [ ] Confirmation emails arrive
- [ ] Share link with attendees
- [ ] Monitor registrations
- [ ] Respond to inquiries

---

## 💡 Tips for Success

1. **Test Everything Locally First**
   - Use XAMPP before uploading to hosting

2. **Keep Backups**
   - Save original files in safe place

3. **Monitor Emails**
   - Check spam folder for registration emails

4. **Update Content**
   - Keep speaker info and activities current

5. **Promote Your Site**
   - Share link on social media
   - Send to industry contacts
   - Include in event materials

---

## 🎓 Learning Resources

If you want to customize further:
- **PHP Tutorial**: https://www.w3schools.com/php/
- **CSS Guide**: https://www.w3schools.com/css/
- **JavaScript**: https://www.w3schools.com/js/
- **Web Design**: https://www.w3schools.com/whatis/

---

## ✅ You're All Set!

Your TASTS-2025 website is complete and ready to deploy. Choose your deployment method and get it live!

**Questions?**
- Check INSTALLATION_GUIDE.md for detailed steps
- Review SETUP_INSTRUCTIONS.txt for quick setup
- Look at README.md for feature overview

---

## 📞 Event Information

**Event**: 1st Tanzania Sustainable Tourism and Innovation Summit
**Date**: 19th September, 2025
**Location**: Uhuru Hotel Conference Hall
**City**: Moshi, Kilimanjaro
**Website Version**: 1.0
**Last Updated**: December 2024

---

**Your complete, professional website is ready. Happy deploying! 🚀**
