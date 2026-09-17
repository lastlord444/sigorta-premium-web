"use client";

import React, { useState, useRef, useEffect } from "react";
import { motion, AnimatePresence } from "framer-motion";
import { Globe, ChevronDown, Check } from "lucide-react";
import { useLanguage } from "@/components/providers/LanguageProvider";
import { Language } from "@/data/translations";

interface LanguageSwitcherProps {
  className?: string;
  variant?: "navbar" | "mobile" | "footer";
  direction?: "down" | "up";
}

export default function LanguageSwitcher({
  className = "",
  variant = "navbar",
  direction = "down",
}: LanguageSwitcherProps) {
  const { language, setLanguage, supportedLanguages, currentLanguageOption } =
    useLanguage();
  const [isOpen, setIsOpen] = useState(false);
  const containerRef = useRef<HTMLDivElement>(null);

  // Close on click outside
  useEffect(() => {
    function handleClickOutside(e: MouseEvent) {
      if (
        containerRef.current &&
        !containerRef.current.contains(e.target as Node)
      ) {
        setIsOpen(false);
      }
    }
    if (isOpen) {
      document.addEventListener("mousedown", handleClickOutside);
    }
    return () => {
      document.removeEventListener("mousedown", handleClickOutside);
    };
  }, [isOpen]);

  // Close on Escape key
  useEffect(() => {
    function handleKeyDown(e: KeyboardEvent) {
      if (e.key === "Escape") {
        setIsOpen(false);
      }
    }
    if (isOpen) {
      document.addEventListener("keydown", handleKeyDown);
    }
    return () => {
      document.removeEventListener("keydown", handleKeyDown);
    };
  }, [isOpen]);

  const handleSelect = (code: Language) => {
    setLanguage(code);
    setIsOpen(false);
  };

  // Mobile drawer full-width list variant
  if (variant === "mobile") {
    return (
      <div className={`w-full ${className}`}>
        <p className="text-[11px] tracking-[0.25em] text-silver-400 uppercase font-mono mb-2 flex items-center gap-2">
          <Globe className="w-3.5 h-3.5 text-electric-light" />
          <span>Language / Dil</span>
        </p>
        <div className="grid grid-cols-5 gap-2">
          {supportedLanguages.map((item) => {
            const isSelected = language === item.code;
            return (
              <button
                key={item.code}
                onClick={() => setLanguage(item.code)}
                type="button"
                className={`flex flex-col items-center justify-center py-2.5 px-1 rounded-xl border transition-all cursor-pointer ${
                  isSelected
                    ? "bg-electric/20 border-electric/60 text-white shadow-[0_0_15px_rgba(0,102,255,0.3)]"
                    : "bg-white/[0.04] border-white/[0.08] text-silver-300 hover:bg-white/[0.08] hover:text-white"
                }`}
              >
                <span className="text-xl leading-none mb-1">{item.flag}</span>
                <span className="text-[10px] font-mono uppercase font-bold tracking-wider">
                  {item.code}
                </span>
              </button>
            );
          })}
        </div>
      </div>
    );
  }

  // Footer or inline compact variant
  const isUp = direction === "up";

  return (
    <div ref={containerRef} className={`relative inline-block ${className}`}>
      <button
        type="button"
        onClick={() => setIsOpen(!isOpen)}
        aria-label="Select Language"
        aria-expanded={isOpen}
        aria-haspopup="listbox"
        className={`flex items-center gap-2 px-3 py-1.5 rounded-full border transition-all duration-200 cursor-pointer select-none text-xs font-mono font-medium ${
          isOpen
            ? "bg-white/[0.08] border-white/25 text-white shadow-[0_0_15px_rgba(255,255,255,0.1)]"
            : "bg-white/[0.03] hover:bg-white/[0.06] border-white/[0.1] hover:border-white/20 text-silver-300 hover:text-white"
        }`}
      >
        <span className="text-sm leading-none" aria-hidden="true">
          {currentLanguageOption.flag}
        </span>
        <span className="uppercase tracking-wider font-semibold">
          {currentLanguageOption.code}
        </span>
        <ChevronDown
          className={`w-3.5 h-3.5 text-silver-400 transition-transform duration-200 ${
            isOpen ? "rotate-180 text-white" : ""
          }`}
        />
      </button>

      <AnimatePresence>
        {isOpen && (
          <motion.div
            initial={{ opacity: 0, y: isUp ? 8 : -8, scale: 0.96 }}
            animate={{ opacity: 1, y: 0, scale: 1 }}
            exit={{ opacity: 0, y: isUp ? 8 : -8, scale: 0.96 }}
            transition={{ duration: 0.18, ease: "easeOut" }}
            className={`absolute right-0 z-50 min-w-[170px] py-1.5 rounded-2xl bg-navy-950/95 backdrop-blur-2xl border border-white/15 shadow-[0_15px_40px_rgba(0,0,0,0.8)] ${
              isUp ? "bottom-full mb-2" : "top-full mt-2"
            }`}
            role="listbox"
            aria-label="Language selection"
          >
            <div className="px-3 py-1.5 border-b border-white/[0.06] mb-1">
              <span className="text-[10px] font-mono tracking-widest uppercase text-silver-500">
                Select Language
              </span>
            </div>

            {supportedLanguages.map((item) => {
              const isSelected = language === item.code;
              return (
                <button
                  key={item.code}
                  role="option"
                  aria-selected={isSelected}
                  onClick={() => handleSelect(item.code)}
                  type="button"
                  className={`w-full flex items-center justify-between px-3 py-2 text-left text-xs transition-colors cursor-pointer group ${
                    isSelected
                      ? "bg-electric/15 text-white font-medium"
                      : "text-silver-300 hover:bg-white/[0.06] hover:text-white"
                  }`}
                >
                  <div className="flex items-center gap-2.5">
                    <span className="text-base leading-none">{item.flag}</span>
                    <span className="font-sans text-xs group-hover:translate-x-0.5 transition-transform">
                      {item.nativeName}
                    </span>
                  </div>
                  <div className="flex items-center gap-1.5">
                    <span className="text-[10px] font-mono text-silver-500 uppercase tracking-wider">
                      {item.code}
                    </span>
                    {isSelected && (
                      <Check className="w-3.5 h-3.5 text-electric-light shrink-0" />
                    )}
                  </div>
                </button>
              );
            })}
          </motion.div>
        )}
      </AnimatePresence>
    </div>
  );
}
