# Website Project Structure (cPanel Optimized)

This website is designed to be easily hosted on standard web servers like cPanel, Bluehost, or XAMPP.

## Root Directory Files
- `index.html`: The main landing page of the website.
- `assets/`: Contains core styling and scripts.
  - `css/style.css`: All the styling rules (responsive design, colors, layouts).
  - `js/script.js`: Interactive features like the mobile menu and form handling.
- `public/assets/`: A mirrored structure used for local development and build processes.
  - `images/`: High-quality photos for the site.
    - `activities/`: Pictures for the post-event activities (Materuni, Chemka).
    - `speakers/`: Profile pictures for all summit speakers.
- `public/php/`: Backend scripts.
  - `register.php`: The script that handles registrations and sends emails using PHPMailer.

## Deployment for cPanel
To host this site on cPanel:
1. Upload all files from the `public/` directory or the root files (`index.html`, `assets/`, `php/`) to your `public_html` folder.
2. Ensure the `php/` folder is in the same directory as `index.html`.
3. Update the credentials in `php/register.php` with your actual email hosting details.

## Technical Stack
- **Frontend**: HTML5, CSS3 (Tailwind-inspired custom styles), Vanilla JavaScript.
- **Backend**: PHP (for email delivery).
- **Icons**: Font Awesome 6.0.
- **Fonts**: Inter & Playfair Display (via Google Fonts).
