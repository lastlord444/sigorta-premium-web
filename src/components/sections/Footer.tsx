"use client";

import React, { useState } from "react";
import {
  Shield,
  Phone,
  Mail,
  MapPin,
  Clock,
  ArrowUp,
  Instagram,
  Linkedin,
  Twitter,
  Facebook,
  X
} from "lucide-react";
import { siteConfig } from "@/data/siteData";
import { useLenis } from "@/components/providers/SmoothScrollProvider";

export default function Footer() {
  const { scrollTo } = useLenis();
  const [legalModalContent, setLegalModalContent] = useState<string | null>(null);

  const openLegal = (title: string) => {
    setLegalModalContent(title);
  };

  const closeLegal = () => {
    setLegalModalContent(null);
  };

  return (
    <footer className="relative w-full bg-navy-950 text-silver-300 border-t border-white/[0.08] overflow-hidden pt-20 pb-28 sm:pb-16">
      {/* AMBIENT GRADIENT */}
      <div className="absolute bottom-0 left-1/2 -translate-x-1/2 w-full h-72 bg-gradient-to-t from-electric/5 to-transparent pointer-events-none" />

      <div className="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 relative z-10">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 pb-16 border-b border-white/[0.07]">
          {/* BRAND COLUMN */}
          <div className="lg:col-span-4 flex flex-col">
            <a
              href="#"
              onClick={(e) => {
                e.preventDefault();
                scrollTo(0);
              }}
              className="flex items-center gap-3 mb-6"
            >
              <div className="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-900 flex items-center justify-center border border-white/20 shadow-[0_0_20px_rgba(0,102,255,0.4)]">
                <Shield className="w-5 h-5 text-white" />
              </div>
              <div className="flex flex-col">
                <span className="font-serif text-lg tracking-[0.18em] text-white font-semibold">
                  {siteConfig.name}
                </span>
                <span className="text-[10px] tracking-[0.24em] text-silver-400 uppercase font-sans">
                  Independent Insurance Brokerage
                </span>
              </div>
            </a>

            <p className="text-sm text-silver-400 font-sans leading-relaxed mb-6 max-w-sm">
              Uncompromising coverage structures tailored to high-value assets and individual risk profiles. Comparative multi-carrier syndication.
            </p>

            <div className="flex items-center gap-3">
              <a
                href={siteConfig.socials.instagram}
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Instagram"
                className="w-9 h-9 rounded-xl bg-white/[0.04] border border-white/10 flex items-center justify-center text-silver-400 hover:text-white hover:border-electric/50 transition-colors"
              >
                <Instagram className="w-4 h-4" />
              </a>
              <a
                href={siteConfig.socials.linkedin}
                target="_blank"
                rel="noopener noreferrer"
                aria-label="LinkedIn"
                className="w-9 h-9 rounded-xl bg-white/[0.04] border border-white/10 flex items-center justify-center text-silver-400 hover:text-white hover:border-electric/50 transition-colors"
              >
                <Linkedin className="w-4 h-4" />
              </a>
              <a
                href={siteConfig.socials.x}
                target="_blank"
                rel="noopener noreferrer"
                aria-label="X (Twitter)"
                className="w-9 h-9 rounded-xl bg-white/[0.04] border border-white/10 flex items-center justify-center text-silver-400 hover:text-white hover:border-electric/50 transition-colors"
              >
                <Twitter className="w-4 h-4" />
              </a>
              <a
                href={siteConfig.socials.facebook}
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Facebook"
                className="w-9 h-9 rounded-xl bg-white/[0.04] border border-white/10 flex items-center justify-center text-silver-400 hover:text-white hover:border-electric/50 transition-colors"
              >
                <Facebook className="w-4 h-4" />
              </a>
            </div>
          </div>

          {/* PRODUCTS COLUMN */}
          <div className="lg:col-span-2">
            <h4 className="font-mono text-xs uppercase tracking-widest text-white mb-5 font-semibold">
              Coverages
            </h4>
            <ul className="space-y-2.5 text-sm">
              <li>
                <button
                  onClick={() => scrollTo("#sigortalar")}
                  className="text-silver-400 hover:text-white transition-colors cursor-pointer"
                >
                  Comprehensive Auto
                </button>
              </li>
              <li>
                <button
                  onClick={() => scrollTo("#sigortalar")}
                  className="text-silver-400 hover:text-white transition-colors cursor-pointer"
                >
                  Motor Liability
                </button>
              </li>
              <li>
                <button
                  onClick={() => scrollTo("#sigortalar")}
                  className="text-silver-400 hover:text-white transition-colors cursor-pointer"
                >
                  Executive Healthcare
                </button>
              </li>
              <li>
                <button
                  onClick={() => scrollTo("#sigortalar")}
                  className="text-silver-400 hover:text-white transition-colors cursor-pointer"
                >
                  Estate & Architecture
                </button>
              </li>
              <li>
                <button
                  onClick={() => scrollTo("#sigortalar")}
                  className="text-silver-400 hover:text-white transition-colors cursor-pointer"
                >
                  Catastrophe / DASK
                </button>
              </li>
              <li>
                <button
                  onClick={() => scrollTo("#sigortalar")}
                  className="text-silver-400 hover:text-white transition-colors cursor-pointer"
                >
                  Commercial Property
                </button>
              </li>
            </ul>
          </div>

          {/* CORPORATE & NAVIGATION */}
          <div className="lg:col-span-2">
            <h4 className="font-mono text-xs uppercase tracking-widest text-white mb-5 font-semibold">
              Practice
            </h4>
            <ul className="space-y-2.5 text-sm">
              <li>
                <button
                  onClick={() => scrollTo("#neden-biz")}
                  className="text-silver-400 hover:text-white transition-colors cursor-pointer"
                >
                  Why Choose Us
                </button>
              </li>
              <li>
                <button
                  onClick={() => scrollTo("#sirketler")}
                  className="text-silver-400 hover:text-white transition-colors cursor-pointer"
                >
                  Global Underwriters
                </button>
              </li>
              <li>
                <button
                  onClick={() => scrollTo("#hakkimizda")}
                  className="text-silver-400 hover:text-white transition-colors cursor-pointer"
                >
                  About Our Practice
                </button>
              </li>
              <li>
                <button
                  onClick={() => scrollTo("#hasar-destek")}
                  className="text-silver-400 hover:text-white transition-colors cursor-pointer"
                >
                  Claims Concierge
                </button>
              </li>
              <li>
                <button
                  onClick={() => scrollTo("#sss")}
                  className="text-silver-400 hover:text-white transition-colors cursor-pointer"
                >
                  FAQ
                </button>
              </li>
              <li>
                <button
                  onClick={() => scrollTo("#teklif-al")}
                  className="text-silver-400 hover:text-white transition-colors cursor-pointer"
                >
                  Request Proposal
                </button>
              </li>
            </ul>
          </div>

          {/* CONTACT INFO */}
          <div className="lg:col-span-4">
            <h4 className="font-mono text-xs uppercase tracking-widest text-white mb-5 font-semibold">
              Headquarters & Inquiries
            </h4>
            <ul className="space-y-3.5 text-sm text-silver-400">
              <li className="flex items-start gap-3">
                <MapPin className="w-4 h-4 text-electric-light shrink-0 mt-1" />
                <span className="leading-snug">{siteConfig.address}</span>
              </li>
              <li className="flex items-center gap-3">
                <Phone className="w-4 h-4 text-electric-light shrink-0" />
                <a
                  href={`tel:${siteConfig.phoneRaw}`}
                  className="hover:text-white font-mono transition-colors"
                >
                  {siteConfig.phone}
                </a>
              </li>
              <li className="flex items-center gap-3">
                <Mail className="w-4 h-4 text-electric-light shrink-0" />
                <a
                  href={`mailto:${siteConfig.email}`}
                  className="hover:text-white transition-colors"
                >
                  {siteConfig.email}
                </a>
              </li>
              <li className="flex items-center gap-3">
                <Clock className="w-4 h-4 text-silver-500 shrink-0" />
                <span className="text-xs text-silver-500 font-mono">
                  {siteConfig.workingHours}
                </span>
              </li>
            </ul>
          </div>
        </div>

        {/* BOTTOM LEGAL & REGULATORY BAR */}
        <div className="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs font-mono text-silver-500">
          <div className="flex flex-col sm:flex-row items-center gap-4">
            <span>© {new Date().getFullYear()} {siteConfig.name}. All rights reserved.</span>
            <span className="hidden sm:inline">•</span>
            <span>{siteConfig.licenseNo}</span>
          </div>

          <div className="flex items-center gap-6">
            <button
              onClick={() => openLegal("Privacy Policy & Regulatory Disclosures")}
              className="hover:text-silver-300 transition-colors cursor-pointer"
            >
              Privacy
            </button>
            <button
              onClick={() => openLegal("Terms of Advisory Engagement")}
              className="hover:text-silver-300 transition-colors cursor-pointer"
            >
              Terms
            </button>
            <button
              onClick={() => openLegal("Cookie & Tracking Policy")}
              className="hover:text-silver-300 transition-colors cursor-pointer"
            >
              Cookies
            </button>
            <button
              onClick={() => scrollTo(0)}
              aria-label="Back to Top"
              className="p-2 rounded-lg bg-white/[0.04] border border-white/10 hover:text-white transition-colors cursor-pointer"
            >
              <ArrowUp className="w-3.5 h-3.5" />
            </button>
          </div>
        </div>
      </div>

      {/* LEGAL DIALOG MODAL */}
      {legalModalContent && (
        <div className="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-md">
          <div className="relative w-full max-w-2xl max-h-[80vh] overflow-y-auto rounded-3xl bg-navy-950 border border-white/15 p-6 sm:p-8 text-silver-300 font-sans shadow-2xl">
            <div className="flex items-center justify-between pb-4 mb-4 border-b border-white/10">
              <h3 className="font-serif text-xl text-white font-medium">
                {legalModalContent}
              </h3>
              <button
                onClick={closeLegal}
                className="p-1 rounded-lg hover:bg-white/10 text-silver-400 hover:text-white"
              >
                <X className="w-5 h-5" />
              </button>
            </div>
            <div className="text-xs leading-relaxed space-y-3">
              <p>
                In accordance with international data privacy frameworks (including GDPR) and applicable insurance regulatory guidelines, personal data processed by {siteConfig.name} is handled strictly for risk assessment, multi-carrier policy formulation, underwriting syndication, and claims representation.
              </p>
              <p>
                Your contact details and risk disclosures are shared solely with authorized underwriting insurance syndicates, authorized loss adjusters, and statutory oversight authorities. We do not sell, barter, or distribute your private client information to third-party marketing entities.
              </p>
              <p>
                To exercise your data protection rights, request full record deletion, or inquire about underwriting disclosures, contact our privacy desk directly at {siteConfig.email}.
              </p>
            </div>
          </div>
        </div>
      )}
    </footer>
  );
}
