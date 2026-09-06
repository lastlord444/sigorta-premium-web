"use client";

import React, { useState, useEffect } from "react";
import { motion, AnimatePresence } from "framer-motion";
import { ArrowRight, MessageSquare, Phone } from "lucide-react";
import { siteConfig } from "@/data/siteData";
import { useLenis } from "@/components/providers/SmoothScrollProvider";

export default function MobileStickyBar() {
  const [show, setShow] = useState(false);
  const { scrollTo } = useLenis();

  useEffect(() => {
    const handleScroll = () => {
      // Show when scrolled down a bit
      setShow(window.scrollY > 250);
    };
    window.addEventListener("scroll", handleScroll, { passive: true });
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  return (
    <AnimatePresence>
      {show && (
        <motion.div
          initial={{ y: 80, opacity: 0 }}
          animate={{ y: 0, opacity: 1 }}
          exit={{ y: 80, opacity: 0 }}
          transition={{ duration: 0.3, ease: "easeOut" }}
          className="fixed bottom-4 left-4 right-4 z-40 md:hidden"
        >
          <div className="flex items-center gap-2 p-2 rounded-2xl bg-navy-950/90 backdrop-blur-xl border border-white/15 shadow-[0_10px_30px_rgba(0,0,0,0.8)]">
            <a
              href={`https://wa.me/${siteConfig.whatsappRaw}?text=Merhaba,%20hızlı%20sigorta%20teklifi%20almak%20istiyorum.`}
              target="_blank"
              rel="noopener noreferrer"
              className="p-3 rounded-xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-400 flex items-center justify-center shrink-0"
              aria-label="WhatsApp"
            >
              <MessageSquare className="w-5 h-5" />
            </a>

            <a
              href={`tel:${siteConfig.phoneRaw}`}
              className="p-3 rounded-xl bg-white/5 border border-white/10 text-silver-300 flex items-center justify-center shrink-0"
              aria-label="Telefon"
            >
              <Phone className="w-5 h-5" />
            </a>

            <button
              onClick={() => scrollTo("#teklif-al")}
              className="flex-1 py-3 px-4 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold text-xs uppercase tracking-wider shadow-[0_0_20px_rgba(0,102,255,0.4)] flex items-center justify-center gap-2"
            >
              <span>Hemen Teklif Al</span>
              <ArrowRight className="w-4 h-4" />
            </button>
          </div>
        </motion.div>
      )}
    </AnimatePresence>
  );
}
