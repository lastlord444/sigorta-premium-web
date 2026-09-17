"use client";

import React, { useState, useEffect } from "react";
import WhatsAppIcon from "@/components/icons/WhatsAppIcon";
import { siteConfig } from "@/data/siteData";

export default function FloatingWhatsApp() {
  const [mounted, setMounted] = useState(false);

  useEffect(() => {
    setMounted(true);
  }, []);

  if (!mounted) return null;

  const whatsappUrl = `https://wa.me/${siteConfig.whatsappRaw}?text=Hello,%20I%20would%20like%20to%20request%20an%20insurance%20quote.`;

  return (
    <aside
      aria-label="Direct WhatsApp Contact"
      className="fixed bottom-20 right-4 sm:bottom-24 sm:right-6 md:bottom-8 md:right-8 z-50 flex items-center group select-none"
    >
      <a
        href={whatsappUrl}
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Chat on WhatsApp"
        className="relative flex items-center gap-2.5 px-3.5 py-3 sm:px-4 sm:py-3.5 rounded-full bg-[#25D366] hover:bg-[#20bd5a] text-white shadow-[0_4px_25px_rgba(37,211,102,0.5)] hover:shadow-[0_6px_35px_rgba(37,211,102,0.8)] transition-all duration-300 transform hover:scale-105 active:scale-95 cursor-pointer"
      >
        {/* Pulsing online badge */}
        <span className="absolute -top-1 -right-1 flex h-3.5 w-3.5" aria-hidden="true">
          <span className="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-300 opacity-75" />
          <span className="relative inline-flex rounded-full h-3.5 w-3.5 bg-emerald-400 border-2 border-navy-950" />
        </span>

        {/* WhatsApp Icon */}
        <WhatsAppIcon className="w-6 h-6 sm:w-6 sm:h-6 text-white shrink-0 drop-shadow-sm" />

        {/* Desktop Text Label */}
        <span className="hidden sm:inline font-sans text-xs font-semibold tracking-wide text-white drop-shadow-sm pr-1">
          WhatsApp
        </span>
      </a>

      {/* Floating Tooltip for Desktop */}
      <div
        role="tooltip"
        className="hidden md:block absolute right-full mr-3 px-3 py-1.5 rounded-xl bg-navy-950/95 text-white text-[11px] font-mono tracking-wide border border-white/10 shadow-xl opacity-0 translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-200 pointer-events-none whitespace-nowrap"
      >
        <span className="inline-block w-2 h-2 rounded-full bg-emerald-400 mr-2 animate-pulse" />
        Chat with Advisor (Online)
      </div>
    </aside>
  );
}
