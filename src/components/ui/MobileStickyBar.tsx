"use client";

import React, { useState, useEffect } from "react";
import { motion, AnimatePresence } from "framer-motion";
import { Phone } from "lucide-react";
import WhatsAppIcon from "@/components/icons/WhatsAppIcon";
import { siteConfig } from "@/data/siteData";

export default function MobileStickyBar() {
  const [show, setShow] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      setShow(window.scrollY > 250);
    };
    window.addEventListener("scroll", handleScroll, { passive: true });
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  return (
    <AnimatePresence>
      {show && (
        <motion.div
          id="mobile-sticky-bar"
          initial={{ y: 80, opacity: 0 }}
          animate={{ y: 0, opacity: 1 }}
          exit={{ y: 80, opacity: 0 }}
          transition={{ duration: 0.3, ease: "easeOut" }}
          className="fixed bottom-3 left-3 right-3 z-40 md:hidden pb-[env(safe-area-inset-bottom,0px)]"
        >
          <div className="flex items-center gap-2.5 px-3 py-2 min-h-[64px] max-h-[72px] rounded-2xl bg-navy-950/95 backdrop-blur-xl border border-white/15 shadow-[0_10px_30px_rgba(0,0,0,0.85)] box-border">
            <a
              href={`tel:${siteConfig.phoneRaw}`}
              className="flex-1 min-w-0 h-[52px] min-h-[50px] max-h-[56px] rounded-xl bg-white/[0.06] hover:bg-white/[0.1] active:bg-white/[0.12] border border-white/15 text-silver-100 flex items-center justify-center gap-2 px-3 transition-colors text-sm font-semibold tracking-wide"
              aria-label={`Hemen Ara: ${siteConfig.phone}`}
            >
              <span className="w-7 h-7 min-w-[28px] min-h-[28px] flex items-center justify-center shrink-0">
                <Phone className="w-5 h-5 text-emerald-400" />
              </span>
              <span className="text-sm font-semibold truncate">Hemen Ara</span>
            </a>

            <a
              href={`https://wa.me/${siteConfig.whatsappRaw}?text=Merhaba,%20hızlı%20sigorta%20teklifi%20almak%20istiyorum.`}
              target="_blank"
              rel="noopener noreferrer"
              className="flex-1 min-w-0 h-[52px] min-h-[50px] max-h-[56px] rounded-xl bg-gradient-to-r from-emerald-600 to-emerald-500 hover:from-emerald-500 hover:to-emerald-400 active:brightness-95 border border-emerald-400/40 text-white flex items-center justify-center gap-2 px-3 shadow-[0_0_20px_rgba(16,185,129,0.3)] transition-all text-sm font-semibold tracking-wide"
              aria-label="WhatsApp'tan iletişime geç"
            >
              <span className="w-7 h-7 min-w-[28px] min-h-[28px] flex items-center justify-center shrink-0">
                <WhatsAppIcon className="w-5 h-5 text-white" />
              </span>
              <span className="text-sm font-semibold truncate">WhatsApp</span>
            </a>
          </div>
        </motion.div>
      )}
    </AnimatePresence>
  );
}

