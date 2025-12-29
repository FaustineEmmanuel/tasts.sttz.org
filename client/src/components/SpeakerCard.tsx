import { motion } from "framer-motion";
import { Badge } from "@/components/ui/badge";

interface SpeakerProps {
  name: string;
  role: string;
  image?: string;
  isKeynote?: boolean;
}

export function SpeakerCard({ name, role, image, isKeynote = false }: SpeakerProps) {
  return (
    <motion.div
      whileHover={{ y: -10 }}
      className={`group relative overflow-hidden rounded-2xl bg-white shadow-lg border border-border/50 transition-all duration-300 ${
        isKeynote ? "col-span-1 md:col-span-2 lg:col-span-2 bg-gradient-to-br from-primary/5 to-secondary/20" : ""
      }`}
    >
      <div className={`flex flex-col ${isKeynote ? "md:flex-row items-center" : ""}`}>
        <div className={`relative overflow-hidden ${isKeynote ? "w-full md:w-1/2 h-64 md:h-full" : "h-64 w-full"}`}>
          <img
            src={image || "https://images.unsplash.com/photo-1511367461989-f85a21fda167?w=500&h=500&fit=crop"}
            alt={name}
            className="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110"
          />
          {/* Unsplash Profile generic placeholder */}
          <div className="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-60 group-hover:opacity-40 transition-opacity" />
        </div>
        
        <div className={`p-6 ${isKeynote ? "w-full md:w-1/2" : ""}`}>
          {isKeynote && (
            <Badge className="mb-3 bg-accent text-accent-foreground hover:bg-accent/90">
              Keynote Speaker
            </Badge>
          )}
          <h3 className="font-display font-bold text-xl md:text-2xl text-foreground mb-2 group-hover:text-primary transition-colors">
            {name}
          </h3>
          <p className="text-primary font-medium mb-3">{role}</p>
          <div className="w-12 h-1 bg-accent rounded-full mb-4 group-hover:w-20 transition-all duration-300" />
        </div>
      </div>
    </motion.div>
  );
}
