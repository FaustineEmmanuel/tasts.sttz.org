import { useState, useEffect } from "react";
import { Link } from "react-scroll";
import { Menu, X } from "lucide-react";
import { motion, AnimatePresence } from "framer-motion";
import logo from "@assets/logo_1767014593674.jpg";
import { Button } from "@/components/ui/button";

const navLinks = [
  { name: "Home", to: "hero" },
  { name: "About", to: "about" },
  { name: "Speakers", to: "speakers" },
  { name: "Timeline", to: "steps" },
  { name: "Activities", to: "activities" },
];

export function Navbar() {
  const [isScrolled, setIsScrolled] = useState(false);
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

  useEffect(() => {
    const handleScroll = () => setIsScrolled(window.scrollY > 50);
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  return (
    <nav
      className={`fixed top-0 left-0 right-0 z-50 transition-all duration-300 ${
        isScrolled ? "bg-white/90 backdrop-blur-md shadow-md py-2" : "bg-transparent py-4"
      }`}
    >
      <div className="container mx-auto px-4 md:px-6 flex items-center justify-between">
        <div className="flex items-center gap-3">
          <img 
            src={logo} 
            alt="TaSTIS Logo" 
            className="h-12 w-12 object-contain rounded-full bg-white border border-primary/20" 
          />
          <span className={`font-display font-bold text-xl tracking-tight hidden sm:block ${
            isScrolled ? "text-primary" : "text-white text-shadow"
          }`}>
            TaSTIS 2025
          </span>
        </div>

        {/* Desktop Nav */}
        <div className="hidden md:flex items-center gap-8">
          {navLinks.map((link) => (
            <Link
              key={link.name}
              to={link.to}
              smooth={true}
              duration={500}
              className={`cursor-pointer font-medium text-sm hover:text-accent transition-colors ${
                isScrolled ? "text-foreground" : "text-white text-shadow"
              }`}
            >
              {link.name}
            </Link>
          ))}
          <Link to="register" smooth={true} duration={800}>
            <Button 
              className={`rounded-full px-6 font-semibold shadow-lg hover:shadow-xl transition-all ${
                isScrolled 
                  ? "bg-primary text-white hover:bg-primary/90" 
                  : "bg-accent text-white hover:bg-accent/90 border-none"
              }`}
            >
              Register Now
            </Button>
          </Link>
        </div>

        {/* Mobile Toggle */}
        <button
          className="md:hidden p-2 text-foreground"
          onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
        >
          {mobileMenuOpen ? (
            <X className={isScrolled ? "text-foreground" : "text-white"} />
          ) : (
            <Menu className={isScrolled ? "text-foreground" : "text-white"} />
          )}
        </button>
      </div>

      {/* Mobile Menu */}
      <AnimatePresence>
        {mobileMenuOpen && (
          <motion.div
            initial={{ opacity: 0, height: 0 }}
            animate={{ opacity: 1, height: "auto" }}
            exit={{ opacity: 0, height: 0 }}
            className="md:hidden bg-white border-t border-border overflow-hidden"
          >
            <div className="flex flex-col p-4 gap-4">
              {navLinks.map((link) => (
                <Link
                  key={link.name}
                  to={link.to}
                  smooth={true}
                  duration={500}
                  onClick={() => setMobileMenuOpen(false)}
                  className="text-foreground font-medium py-2 px-4 hover:bg-muted rounded-lg"
                >
                  {link.name}
                </Link>
              ))}
              <Link to="register" smooth={true} duration={800} onClick={() => setMobileMenuOpen(false)}>
                <Button className="w-full rounded-full bg-primary font-bold">Register Now</Button>
              </Link>
            </div>
          </motion.div>
        )}
      </AnimatePresence>
    </nav>
  );
}
