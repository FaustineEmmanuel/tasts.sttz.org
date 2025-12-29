import { Navbar } from "@/components/Navbar";
import { RegistrationForm } from "@/components/RegistrationForm";
import { SpeakerCard } from "@/components/SpeakerCard";
import { Button } from "@/components/ui/button";
import { Calendar, MapPin, ArrowRight, Leaf, Users, Mountain, Bike } from "lucide-react";
import { motion } from "framer-motion";
import { Link as ScrollLink } from "react-scroll";

const fadeInUp = {
  hidden: { opacity: 0, y: 40 },
  visible: { opacity: 1, y: 0, transition: { duration: 0.6, ease: "easeOut" } }
};

const staggerContainer = {
  hidden: { opacity: 0 },
  visible: {
    opacity: 1,
    transition: {
      staggerChildren: 0.1
    }
  }
};

const speakers = [
  { name: "Dr. Minja, Gileard Sifuel", role: "Lecturer, Research Scientist", isKeynote: true, image: "https://images.unsplash.com/photo-1560250097-0b93528c311a?w=500&h=500&fit=crop" },
  { name: "Prof. Dr. Mkonda, Msafiri", role: "Waste Management Expert", image: "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=500&h=500&fit=crop" },
  { name: "Mrs. Gillies, Dawn Adam", role: "Yoga Expert", image: "https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=500&h=500&fit=crop" },
  { name: "Mr. Kagomba, Saul Samwel", role: "Disaster Risk Management", image: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&h=500&fit=crop" },
  { name: "Dr. Mayala, Nyanjige", role: "Senior Lecturer", image: "https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=500&h=500&fit=crop" },
  { name: "Mrs. Redondo, Mayte Castuera", role: "Sustainability Expert", image: "https://images.unsplash.com/photo-1580489944761-15a19d654956?w=500&h=500&fit=crop" },
  { name: "Mrs. Smits, Samantha", role: "Sustainability Expert", image: "https://images.unsplash.com/photo-1594744803329-e58b31de8bf5?w=500&h=500&fit=crop" }
];

export default function Home() {
  return (
    <div className="min-h-screen bg-background">
      <Navbar />

      {/* Hero Section */}
      <section id="hero" className="relative h-screen flex items-center justify-center overflow-hidden">
        {/* Background Image with Overlay */}
        <div className="absolute inset-0 z-0">
          {/* Nature Landscape Kilimanjaro */}
          <img 
            src="https://pixabay.com/get/gf667cc57fd6ef11213d7bc1ace51fb0660c49bdd8ee7ef9a8df79193779fa98feadec877a70d4cc90111862866c2c78cebda294533f3b529ba8cc771035d1b41_1280.jpg" 
            alt="Mount Kilimanjaro" 
            className="w-full h-full object-cover"
          />
          <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent" />
        </div>

        <div className="container relative z-10 px-4 text-center text-white">
          <motion.div
            initial="hidden"
            animate="visible"
            variants={staggerContainer}
          >
            <motion.div variants={fadeInUp} className="mb-4">
              <span className="bg-primary/90 text-white px-4 py-1 rounded-full text-sm font-bold uppercase tracking-wider inline-flex items-center gap-2">
                <Leaf size={16} /> Sustainable Tourism
              </span>
            </motion.div>
            
            <motion.h1 variants={fadeInUp} className="text-4xl md:text-6xl lg:text-7xl font-display font-bold leading-tight mb-6 text-shadow-lg">
              1st TANZANIA SUSTAINABLE <br /> 
              <span className="text-accent">TOURISM & INNOVATION</span> SUMMIT
            </motion.h1>
            
            <motion.p variants={fadeInUp} className="text-lg md:text-2xl font-light opacity-90 mb-10 max-w-2xl mx-auto">
              Uniting Leaders, Innovating Futures, Preserving Nature.
            </motion.p>
            
            <motion.div variants={fadeInUp} className="flex flex-col md:flex-row items-center justify-center gap-4 md:gap-8 mb-10">
              <div className="flex items-center gap-2 bg-white/10 backdrop-blur-md px-6 py-3 rounded-xl border border-white/20">
                <Calendar className="text-accent" />
                <span className="font-semibold">September 19th, 2025</span>
              </div>
              <div className="flex items-center gap-2 bg-white/10 backdrop-blur-md px-6 py-3 rounded-xl border border-white/20">
                <MapPin className="text-accent" />
                <span className="font-semibold">Uhuru Hotel Conference Hall</span>
              </div>
            </motion.div>
            
            <motion.div variants={fadeInUp}>
              <ScrollLink to="register" smooth={true} duration={800}>
                <Button className="h-14 px-8 text-lg rounded-full bg-accent hover:bg-accent/90 text-white font-bold shadow-lg hover:shadow-accent/50 hover:-translate-y-1 transition-all">
                  Secure Your Seat <ArrowRight className="ml-2" />
                </Button>
              </ScrollLink>
            </motion.div>
          </motion.div>
        </div>
      </section>

      {/* About Section */}
      <section id="about" className="py-24 bg-white relative overflow-hidden">
        <div className="container mx-auto px-4">
          <div className="grid md:grid-cols-2 gap-16 items-center">
            <motion.div
              initial={{ opacity: 0, x: -50 }}
              whileInView={{ opacity: 1, x: 0 }}
              transition={{ duration: 0.8 }}
              viewport={{ once: true }}
              className="relative"
            >
              <div className="rounded-3xl overflow-hidden shadow-2xl rotate-2 hover:rotate-0 transition-transform duration-500">
                {/* Conference meeting */}
                <img 
                  src="https://images.unsplash.com/photo-1544531586-fde5298cdd40?w=800&h=600&fit=crop" 
                  alt="Conference" 
                  className="w-full h-full object-cover"
                />
              </div>
              <div className="absolute -bottom-10 -right-10 bg-secondary p-8 rounded-3xl shadow-xl z-10 hidden md:block">
                <div className="text-center">
                  <span className="block text-5xl font-bold text-primary">20+</span>
                  <span className="text-sm font-medium text-secondary-foreground">Global Speakers</span>
                </div>
              </div>
            </motion.div>
            
            <motion.div
              initial={{ opacity: 0, x: 50 }}
              whileInView={{ opacity: 1, x: 0 }}
              transition={{ duration: 0.8 }}
              viewport={{ once: true }}
            >
              <h2 className="text-sm font-bold text-accent uppercase tracking-wider mb-2">About The Summit</h2>
              <h3 className="text-4xl md:text-5xl font-display font-bold text-foreground mb-6">
                Innovation Meets Conservation
              </h3>
              <p className="text-lg text-muted-foreground leading-relaxed mb-6">
                The First Tanzania Sustainable Tourism and Innovation Summit (TaSTIS) 2025 is an annual platform that brings together tourism industry leaders, environmentalists, and policymakers.
              </p>
              <p className="text-lg text-muted-foreground leading-relaxed mb-8">
                Our mission is to foster dialogue on sustainable practices that protect our natural heritage while driving economic growth through innovation.
              </p>
              
              <ul className="space-y-4">
                {["Sustainable Growth Strategies", "Eco-Tourism Innovation", "Cultural Heritage Preservation"].map((item) => (
                  <li key={item} className="flex items-center gap-3">
                    <div className="h-2 w-2 rounded-full bg-primary" />
                    <span className="font-medium text-foreground">{item}</span>
                  </li>
                ))}
              </ul>
            </motion.div>
          </div>
        </div>
      </section>

      {/* Speakers Section */}
      <section id="speakers" className="py-24 bg-secondary/30">
        <div className="container mx-auto px-4">
          <div className="text-center max-w-3xl mx-auto mb-16">
            <motion.h2 
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              className="text-4xl font-display font-bold mb-4"
            >
              Distinguished Speakers
            </motion.h2>
            <motion.p 
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ delay: 0.1 }}
              className="text-muted-foreground text-lg"
            >
              Learn from the visionaries shaping the future of sustainable tourism.
            </motion.p>
          </div>

          <motion.div 
            variants={staggerContainer}
            initial="hidden"
            whileInView="visible"
            viewport={{ once: true }}
            className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
          >
            {speakers.map((speaker) => (
              <motion.div key={speaker.name} variants={fadeInUp}>
                <SpeakerCard {...speaker} />
              </motion.div>
            ))}
          </motion.div>
        </div>
      </section>

      {/* Steps Timeline */}
      <section id="steps" className="py-24 bg-primary text-primary-foreground relative overflow-hidden">
        {/* Abstract pattern overlay */}
        <div className="absolute inset-0 opacity-10" style={{ backgroundImage: 'radial-gradient(circle at center, white 1px, transparent 1px)', backgroundSize: '40px 40px' }} />
        
        <div className="container mx-auto px-4 relative z-10">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-display font-bold mb-4">Your Journey to TaSTIS</h2>
            <p className="opacity-80 text-lg">Follow these simple steps to join the revolution.</p>
          </div>

          <div className="grid md:grid-cols-4 gap-8">
            {[
              { step: "01", title: "Choose Event", desc: "Select your participation type" },
              { step: "02", title: "Apply", desc: "Fill out the registration form" },
              { step: "03", title: "Secure Spot", desc: "Confirm your attendance" },
              { step: "04", title: "Attend", desc: "Join us with confidence" },
            ].map((item, idx) => (
              <motion.div
                key={idx}
                initial={{ opacity: 0, y: 30 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ delay: idx * 0.1 }}
                className="relative text-center group"
              >
                <div className="h-20 w-20 mx-auto bg-white/10 rounded-full flex items-center justify-center text-3xl font-bold border border-white/30 mb-6 group-hover:scale-110 transition-transform duration-300">
                  {item.step}
                </div>
                <h3 className="text-xl font-bold mb-2">{item.title}</h3>
                <p className="opacity-70">{item.desc}</p>
                {idx < 3 && (
                  <div className="hidden md:block absolute top-10 left-[60%] w-[80%] h-[2px] bg-white/20" />
                )}
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* Activities Section */}
      <section id="activities" className="py-24 bg-white">
        <div className="container mx-auto px-4">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-display font-bold mb-4">Post-Event Adventures</h2>
            <p className="text-muted-foreground text-lg">Explore the beauty of Tanzania beyond the conference room.</p>
          </div>

          <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            {[
              { icon: Users, title: "Community Tours", img: "https://images.unsplash.com/photo-1516026672322-bc52d61a55d5?w=500&h=500&fit=crop" },
              { icon: Leaf, title: "Safari Adventures", img: "https://images.unsplash.com/photo-1516426122078-c23e76319801?w=500&h=500&fit=crop" },
              { icon: Mountain, title: "Scenic Day Trips", img: "https://images.unsplash.com/photo-1547471080-7cc2caa01a7e?w=500&h=500&fit=crop" },
              { icon: Bike, title: "Adventure Sports", img: "https://images.unsplash.com/photo-1541625602330-2277a4c46182?w=500&h=500&fit=crop" },
            ].map((activity, idx) => (
              <motion.div
                key={idx}
                whileHover={{ y: -5 }}
                className="group relative h-80 rounded-2xl overflow-hidden cursor-pointer shadow-lg"
              >
                <img src={activity.img} alt={activity.title} className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-80" />
                <div className="absolute bottom-6 left-6 text-white">
                  <activity.icon className="h-8 w-8 mb-3 text-accent" />
                  <h3 className="text-xl font-bold">{activity.title}</h3>
                </div>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* Registration Form */}
      <RegistrationForm />

      {/* Footer */}
      <footer className="bg-foreground text-white py-12 border-t border-white/10">
        <div className="container mx-auto px-4 text-center">
          <div className="flex items-center justify-center gap-2 mb-8">
             <span className="font-display font-bold text-2xl">TaSTIS 2025</span>
          </div>
          <div className="grid md:grid-cols-3 gap-8 mb-8 text-sm opacity-70">
            <div>
              <h4 className="font-bold text-white mb-2">Location</h4>
              <p>Uhuru Hotel Conference Hall</p>
              <p>Tanzania</p>
            </div>
            <div>
              <h4 className="font-bold text-white mb-2">Contact</h4>
              <p>info@tastis2025.org</p>
              <p>+255 123 456 789</p>
            </div>
            <div>
              <h4 className="font-bold text-white mb-2">Social</h4>
              <div className="flex justify-center gap-4">
                <a href="#" className="hover:text-accent">Twitter</a>
                <a href="#" className="hover:text-accent">LinkedIn</a>
                <a href="#" className="hover:text-accent">Instagram</a>
              </div>
            </div>
          </div>
          <p className="text-xs opacity-50">&copy; 2025 TaSTIS. All rights reserved.</p>
        </div>
      </footer>
    </div>
  );
}
