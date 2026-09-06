"use client";

import React, { useState, useEffect } from "react";
import { motion, AnimatePresence } from "framer-motion";
import { Shield, Phone, Menu, X, ArrowUpRight, CheckCircle2 } from "lucide-react";
import MagneticButton from "@/components/ui/MagneticButton";
import { siteConfig } from "@/data/siteData";
import { useLenis } from "@/components/providers/SmoothScrollProvider";

export default function Navbar() {
  const [scrolled, setScrolled] = useState(false);
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
  const { scrollTo } = useLenis();

  useEffect(() => {
    const handleScroll = () => {
      setScrolled(window.scrollY > 40);
    };
    window.addEventListener("scroll", handleScroll, { passive: true });
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  const navLinks = [
    { label: "Sigortalar", href: "#sigortalar" },
    { label: "Neden Biz?", href: "#neden-biz" },
    { label: "Şirketler", href: "#sirketler" },
    { label: "Hasar Destek", href: "#hasar-destek" },
    { label: "Hakkımızda", href: "#hakkimizda" },
    { label: "SSS", href: "#sss" },
  ];

  const handleNavClick = (href: string) => {
    setMobileMenuOpen(false);
    scrollTo(href);
  };

  return (
    <>
      <header
        className={`fixed top-0 left-0 right-0 z-40 transition-all duration-500 ${
          scrolled
            ? "py-3 bg-navy-950/80 backdrop-blur-xl border-b border-white/[0.07] shadow-[0_4px_30px_rgba(0,0,0,0.5)]"
            : "py-6 bg-transparent"
        }`}
      >
        <div className="max-w-7xl mx-auto px-6 sm:px-8 flex items-center justify-between">
          {/* LOGO */}
          <a
            href="#"
            onClick={(e) => {
              e.preventDefault();
              scrollTo(0);
            }}
            className="group flex items-center gap-3 select-none"
          >
            <div className="relative w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-900 flex items-center justify-center border border-white/20 shadow-[0_0_20px_rgba(0,102,255,0.4)] group-hover:shadow-[0_0_28px_rgba(0,102,255,0.7)] transition-shadow duration-300">
              <Shield className="w-5 h-5 text-white stroke-[1.75]" />
              <div className="absolute inset-0 rounded-xl bg-electric-neon/20 blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300" />
            </div>
            <div className="flex flex-col">
              <span className="font-serif text-lg tracking-[0.18em] text-white font-semibold">
                {siteConfig.name}
              </span>
              <span className="text-[10px] tracking-[0.24em] text-silver-400 uppercase font-sans -mt-0.5">
                Bağımsız Acente
              </span>
            </div>
          </a>

          {/* DESKTOP NAV LINKS */}
          <nav className="hidden lg:flex items-center gap-1 bg-white/[0.03] border border-white/[0.08] px-5 py-1.5 rounded-full backdrop-blur-md shadow-[inset_0_1px_1px_rgba(255,255,255,0.08)]">
            {navLinks.map((link) => (
              <button
                key={link.href}
                onClick={() => handleNavClick(link.href)}
                className="px-4 py-2 text-xs uppercase tracking-wider text-silver-300 hover:text-white transition-colors duration-200 cursor-pointer font-medium hover:drop-shadow-[0_0_8px_rgba(255,255,255,0.5)]"
              >
                {link.label}
              </button>
            ))}
          </nav>

          {/* RIGHT ACTIONS */}
          <div className="hidden md:flex items-center gap-4">
            <a
              href={`tel:${siteConfig.phoneRaw}`}
              className="hidden xl:flex items-center gap-2 text-xs text-silver-300 hover:text-silver-100 transition-colors py-2 px-3 rounded-full hover:bg-white/[0.04] border border-transparent hover:border-white/10"
            >
              <span className="relative flex h-2 w-2">
                <span className="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span className="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
              </span>
              <Phone className="w-3.5 h-3.5 text-silver-400" />
              <span className="font-mono text-xs">{siteConfig.phone}</span>
            </a>

            <MagneticButton
              variant="primary"
              size="sm"
              onClick={() => handleNavClick("#teklif-al")}
              className="text-xs px-5 py-2.5"
            >
              Teklif Al
              <ArrowUpRight className="w-3.5 h-3.5" />
            </MagneticButton>
          </div>

          {/* MOBILE HAMBURGER TOGGLE */}
          <button
            onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
            aria-label="Menüyü Aç/Kapat"
            className="lg:hidden p-2.5 rounded-xl bg-white/[0.05] border border-white/10 text-silver-200 hover:text-white transition-colors focus:outline-none"
          >
            {mobileMenuOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
          </button>
        </div>
      </header>

      {/* FULLSCREEN MOBILE OVERLAY MENU */}
      <AnimatePresence>
        {mobileMenuOpen && (
          <motion.div
            initial={{ opacity: 0, y: -20 }}
            animate={{ opacity: 1, y: 0 }}
            exit={{ opacity: 0, y: -20 }}
            transition={{ duration: 0.3, ease: "easeOut" }}
            className="fixed inset-0 z-30 bg-navy-950/95 backdrop-blur-2xl lg:hidden flex flex-col justify-between pt-28 pb-10 px-8 border-b border-white/10"
          >
            <div className="flex flex-col gap-5">
              <p className="text-[11px] tracking-[0.25em] text-silver-400 uppercase font-mono">
                Navigasyon
              </p>
              {navLinks.map((link, idx) => (
                <motion.button
                  key={link.href}
                  initial={{ opacity: 0, x: -20 }}
                  animate={{ opacity: 1, x: 0 }}
                  transition={{ delay: 0.05 * idx, duration: 0.3 }}
                  onClick={() => handleNavClick(link.href)}
                  className="flex items-center justify-between py-2 text-left border-b border-white/[0.06] text-xl font-serif text-silver-100 hover:text-electric-light transition-colors"
                >
                  <span>{link.label}</span>
                  <ArrowUpRight className="w-4 h-4 text-silver-500" />
                </motion.button>
              ))}
            </div>

            <div className="flex flex-col gap-4 pt-6 border-t border-white/[0.08]">
              <div className="flex items-center gap-2 text-xs text-emerald-400">
                <CheckCircle2 className="w-4 h-4" />
                <span>7/24 Kesintisiz Hasar Destek Masası Aktif</span>
              </div>
              <a
                href={`tel:${siteConfig.phoneRaw}`}
                className="flex items-center justify-center gap-2 py-3 rounded-xl bg-white/[0.05] border border-white/10 text-silver-200 font-mono text-sm"
              >
                <Phone className="w-4 h-4 text-electric-light" />
                {siteConfig.phone}
              </a>
              <button
                onClick={() => handleNavClick("#teklif-al")}
                className="w-full py-3.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold text-sm uppercase tracking-wider shadow-[0_0_20px_rgba(0,102,255,0.4)]"
              >
                Hemen Teklif Al
              </button>
            </div>
          </motion.div>
        )}
      </AnimatePresence>
    </>
  );
}
