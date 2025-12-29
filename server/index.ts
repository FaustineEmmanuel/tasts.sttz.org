import express, { type Express } from "express";
import path from "path";
import { fileURLToPath } from "url";
import nodemailer from "nodemailer";

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const app: Express = express();
const PORT = 5000;

// Middleware
app.use(express.json());
app.use(express.static(path.join(__dirname, "../public")));

// Email configuration
const RECIPIENT_EMAIL = "faustineemmanuel0601@gmail.com";

// Serve the main HTML file
app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "../index.html"));
});

app.get("*", (req, res) => {
  res.sendFile(path.join(__dirname, "../index.html"));
});

// Registration form handler
app.post("/submit_registration", async (req, res) => {
  try {
    const { fullName, email, phone } = req.body;

    // Validate
    if (!fullName || !email) {
      return res.status(400).json({
        success: false,
        message: "Full name and email are required",
      });
    }

    if (!isValidEmail(email)) {
      return res.status(400).json({
        success: false,
        message: "Invalid email format",
      });
    }

    // For development, just log and return success
    // In production, you would configure a real SMTP service
    console.log("New Registration:", {
      fullName,
      email,
      phone: phone || "Not provided",
      timestamp: new Date().toISOString(),
    });

    res.json({
      success: true,
      message:
        "Registration successful! Check your email for confirmation.",
    });
  } catch (error) {
    console.error("Registration error:", error);
    res.status(500).json({
      success: false,
      message: "An error occurred. Please try again later.",
    });
  }
});

function isValidEmail(email: string): boolean {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

app.listen(PORT, () => {
  console.log(`[express] serving on port ${PORT}`);
  console.log(`[express] website: http://localhost:${PORT}/`);
});
