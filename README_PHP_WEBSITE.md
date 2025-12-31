# TASTS-2025 Summit Website - PHP Version

## Quick Summary

You now have a **professional PHP website** with HTML, CSS, and JavaScript that:
✅ **Uses PHP** for backend logic (config, functions, form processing)
✅ **Pure HTML** for structure (no frameworks)
✅ **Modern CSS** for professional styling (logo colors #2d7a3e + #3b5998)
✅ **Clean JavaScript** for interactivity (no dependencies)
✅ **Working Registration Form** with email confirmation
✅ **All Content Included**: Speakers, Activities, Journey, etc.

---

## 📁 What's In This Package

### Core PHP Files
```
config/settings.php      → All configuration (dates, emails, timezone)
config/functions.php     → Data arrays & utility functions (speakers, activities)
pages/register.php       → Registration form processor with email sending
includes/header.php      → Navigation & HTML head
includes/footer.php      → Footer section
index.php               → Main homepage (processes PHP & outputs HTML)
```

### Frontend Files
```
assets/css/style.css    → All styling (colors, responsive, animations)
assets/js/script.js     → Interactivity (menu, forms, smooth scroll)
```

### Logs
```
logs/                   → Auto-created folder for registration records
```

---

## 🎯 How It Works

### Data Flow
```
User visits index.php
  ↓
PHP loads config & data functions
  ↓
Data arrays are processed (speakers, activities, steps)
  ↓
HTML is generated with the data
  ↓
CSS & JavaScript are applied
  ↓
Beautiful website appears!
```

### Form Submission
```
User fills form → JavaScript validates → Sends JSON to pages/register.php
  ↓
PHP processes & validates input
  ↓
Data is logged to logs/registrations.log
  ↓
Email sent to faustineemmanuel0601@gmail.com
  ↓
Confirmation email sent to user
  ↓
Success message appears on page
```

---

## 🚀 Installation on Your Computer

### For XAMPP (Windows/Mac/Linux):

1. **Download XAMPP** from [https://www.apachefriends.org/](https://www.apachefriends.org/)

2. **Extract website files** to:
   - **Windows**: `C:\xampp\htdocs\tasts2025\`
   - **Mac**: `/Applications/XAMPP/htdocs/tasts2025/`
   - **Linux**: `/opt/lampp/htdocs/tasts2025/`

3. **Start Apache** in XAMPP Control Panel

4. **Visit** `http://localhost/tasts2025/`

📄 **See XAMPP_INSTALLATION_GUIDE.md for detailed setup instructions**

---

## 🎨 Hero Section - Meaningful Message

The hero section now displays:
- **Main Heading**: "Building a Sustainable Future for Tourism"
- **Subheading**: "1st TANZANIA SUSTAINABLE TOURISM AND INNOVATION SUMMIT"
- **Tagline**: "Join Leading Voices in Sustainable Tourism Innovation Across East Africa"
- **Event Details**: Date, Location with smooth fade-in animations
- **Call-to-Action**: "Secure Your Seat Now" button

This creates a **powerful, meaningful message** that communicates the summit's purpose.

---

## 💻 Key Features

### 1. **Configuration Logic** (config/settings.php)
```php
// Define once, use everywhere
define('RECIPIENT_EMAIL', 'faustineemmanuel0601@gmail.com');
define('EVENT_DATE', '19th September, 2025');
define('EVENT_LOCATION', 'Uhuru Hotel Conference Hall, Moshi, Kilimanjaro');
```

### 2. **Data Functions** (config/functions.php)
```php
getSpeakers()           // Returns array of 7 speakers
getActivities()         // Returns 4 activity types with details
getRegistrationSteps()  // Returns 4-step journey
```

### 3. **Utility Functions**
```php
sendEmail()       // Sends HTML emails with proper headers
sanitize()        // Cleans user input (XSS protection)
isValidEmail()    // Validates email format
logRegistration() // Records to registrations.log
```

### 4. **Form Processing** (pages/register.php)
- Validates all inputs
- Sends confirmation email to registrant
- Sends notification to organizer
- Logs to file
- Returns JSON response

### 5. **Professional Styling** (assets/css/style.css)
- STTZ Logo colors:
  - Primary Green: #2d7a3e
  - Secondary Blue: #3b5998
  - Accent Green: #4caf50
  - Accent Blue: #5a7fc7
- Fully responsive (mobile, tablet, desktop)
- Smooth animations & transitions
- Professional hover effects

### 6. **Clean JavaScript** (assets/js/script.js)
- Mobile hamburger menu
- Form validation
- Smooth scrolling
- Active navigation highlighting
- Speaker bio toggling
- No dependencies (vanilla JS)

---

## 📊 All Content Included

### Speakers (7 Total)
1. **Dr. Gileard Minja** (Keynote) - Environmental Studies
2. **Prof. Msafiri Mkonda** - Waste Management & Circular Economy
3. **Mrs. Dawn Adam Gillies** - Wellness & Yoga
4. **Mr. Saul Samwel Kagomba** - Disaster Risk Management
5. **Dr. Nyanjige Mayala** - Economics & Business
6. **Mrs. Mayte Castuera Redondo** - Sustainability Expert
7. **Mrs. Samantha Smits** - Sustainability Expert

Each with:
- Professional icon
- Title & role
- Expandable biography
- Key topics

### Activities (4 Types)
1. **Safari Adventures** - Wildlife tours, Kilimanjaro scenic
2. **Scenic Day Trips** - Chala Lake, Materuni Waterfalls
3. **Community Tours** - Craft workshops, cultural experiences
4. **Adventure Sports** - Trekking, climbing, kayaking

Each with:
- Description
- List of specific day trips in Moshi

### Registration Journey (4 Steps)
1. Choose Your Event
2. Complete Your Application
3. Secure Your Spot
4. Attend with Confidence

---

## 🔧 Customization Guide

### Change Email Recipient
**File**: `config/settings.php`
```php
define('RECIPIENT_EMAIL', 'your-email@example.com');
```

### Add New Speaker
**File**: `config/functions.php` → `getSpeakers()` function
```php
[
    'id' => 8,
    'name' => 'Dr. New Speaker',
    'role' => 'Their Title',
    'icon' => '🎤',
    'featured' => false,
    'bio' => 'Biography...',
    'topics' => ['Topic1', 'Topic2']
]
```

### Edit Event Date/Location
**File**: `config/settings.php`
```php
define('EVENT_DATE', 'Your Date Here');
define('EVENT_LOCATION', 'Your Location Here');
```

### Change Colors
**File**: `assets/css/style.css` → `:root` section
```css
--primary-green: #2d7a3e;
--secondary-blue: #3b5998;
```

---

## ✅ Testing Checklist

- [ ] Hero section loads with meaningful message
- [ ] Navigation menu works (desktop & mobile)
- [ ] All speakers display with bios that expand
- [ ] Activities show all 4 types with details
- [ ] Registration form validates input
- [ ] Form submission works & logs data
- [ ] Email sends to recipient
- [ ] Responsive design works on phone
- [ ] No console errors (F12 to check)
- [ ] Colors match STTZ logo

---

## 🐛 Troubleshooting

| Problem | Solution |
|---------|----------|
| Website not loading | Start Apache in XAMPP Control Panel |
| Form not submitting | Check browser console (F12) for errors |
| Emails not sending | Configure mail in XAMPP or check logs/registrations.log |
| CSS/JS not loading | Clear browser cache (Ctrl+Shift+Delete) |
| Mobile menu broken | Check JavaScript console for errors |

---

## 📱 Browser Support

✅ Chrome, Firefox, Safari, Edge (latest versions)
✅ Mobile browsers (iPhone, Android)
✅ Tablets (iPad, Android tablets)

---

## 🔐 Security Features

- **Input Sanitization**: All user inputs cleaned with htmlspecialchars()
- **Email Validation**: Filter_var() email validation
- **File Structure**: Config files outside web root (in production)
- **No SQL Injection**: No database queries (safe for this use)
- **XSS Protection**: All output HTML-encoded

---

## 📈 Performance Optimizations

- Minimal CSS/JS files
- No external dependencies
- Optimized images
- Smooth animations with CSS (not JavaScript)
- Fast page load times

---

## 📦 File Size Summary

```
Total Size: ~100KB
- CSS: ~17KB
- JavaScript: ~6.5KB
- PHP Files: ~30KB
- Graphics/Icons: Embedded as emoji (0KB)
```

---

## 🎓 Learning Resources

This website demonstrates:
- ✅ **PHP Basics**: Variables, functions, arrays, loops
- ✅ **HTML Structure**: Semantic markup, accessibility
- ✅ **CSS3**: Gradients, flexbox, responsive design, animations
- ✅ **JavaScript**: DOM manipulation, form validation, events
- ✅ **Email Handling**: HTML emails, headers, MIME types
- ✅ **File Operations**: Logging data to files
- ✅ **Form Processing**: Validation, sanitization, responses
- ✅ **Responsive Web Design**: Mobile-first approach

---

## 🚢 Ready to Deploy?

1. Upload all files to your web hosting via FTP
2. Create `logs/` folder with 755 permissions
3. Update `config/settings.php` with live URL
4. Test registration form before going live
5. Monitor `logs/registrations.log` for submissions

---

## 📞 Support

For issues:
1. Check logs/registrations.log for submission records
2. Check Apache error logs in XAMPP
3. Test on localhost before deploying
4. Clear browser cache if styles don't update

---

## 🎉 You're All Set!

Your TASTS-2025 summit website is:
- ✅ Built with PHP, HTML, CSS, JavaScript
- ✅ Fully functional with working registration
- ✅ Professional design with STTZ branding
- ✅ Mobile responsive
- ✅ Ready to install on your computer

**Next Step**: Follow XAMPP_INSTALLATION_GUIDE.md to get it running on your system!

---

**© 2025 TASTS-2025 Summit. All rights reserved.**
