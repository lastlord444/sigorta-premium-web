"use client";

import React from "react";
import {
  Home,
  ShieldAlert,
  HeartPulse,
  Building2,
  Briefcase,
  Shield
} from "lucide-react";
import CinematicInsuranceScene from "@/components/sections/CinematicInsuranceScene";
import { useLenis } from "@/components/providers/SmoothScrollProvider";

interface ScrollStorytellingProps {
  onSelectProductForQuote?: (productId: string) => void;
}

export default function ScrollStorytelling({
  onSelectProductForQuote,
}: ScrollStorytellingProps) {
  const { scrollTo } = useLenis();

  const handleQuoteClick = (productId: string) => {
    if (onSelectProductForQuote) {
      onSelectProductForQuote(productId);
    }
    scrollTo("#teklif-al");
  };

  const navItems = [
    { id: "kasko", order: "01", label: "AUTO", target: "#scene-kasko" },
    { id: "konut", order: "02", label: "ESTATE", target: "#scene-konut" },
    { id: "trafik", order: "03", label: "LIABILITY", target: "#scene-trafik" },
    { id: "saglik", order: "04", label: "HEALTH", target: "#scene-saglik" },
    { id: "dask", order: "05", label: "DISASTER", target: "#scene-dask" },
    { id: "isyeri", order: "06", label: "COMMERCIAL", target: "#scene-isyeri" },
  ];

  const scenes = [
    {
      id: "konut",
      order: "02",
      eyebrow: "02 / LUXURY HOME & ESTATE",
      title: "Your sanctuary deserves unconditional protection.",
      description:
        "Comprehensive coverage safeguarding architectural residences, fine art, private estates, and luxury interiors against catastrophic loss, water intrusion, liability, and structural hazards. 24/7 private concierge restoration included.",
      videoSrc: "/videos/konut-dask.mp4",
      poster: "/images/villajpg.jpg",
      alignment: "left" as const,
      badge: "Private Estate & Residence",
      icon: <Home className="w-4 h-4 text-emerald-400" />,
      highlights: [
        "Full replacement cost for prime residential structures",
        "Fine art, jewelry, and collector's inventory valuation",
        "24/7 dedicated emergency concierge & rapid restoration",
        "Comprehensive domestic & personal liability limits",
      ],
      ctaText: "Request Estate Coverage Quote",
    },
    {
      id: "trafik",
      order: "03",
      eyebrow: "03 / MOTOR LIABILITY",
      title: "Uncompromising security for every mile ahead.",
      description:
        "Statutory motor liability upgraded with elevated limits. We benchmark quotes across leading global carriers to guarantee optimal legal indemnification and roadside support.",
      videoSrc: undefined,
      alignment: "right" as const,
      badge: "Mandatory & Excess Liability",
      icon: <ShieldAlert className="w-4 h-4 text-amber-400" />,
      highlights: [
        "Full statutory limit alignment with excess indemnity options",
        "24/7 VIP roadside recovery and nationwide assistance",
        "Bodily injury and property damage legal indemnification",
        "Expedited digital policy issuance",
      ],
      ctaText: "Request Liability Quote",
    },
    {
      id: "saglik",
      order: "04",
      eyebrow: "04 / PRIVATE HEALTHCARE",
      title: "When well-being is at stake, accept no compromises.",
      description:
        "Direct access to premier international hospital networks without wait times. Choose your preferred medical specialists and secure comprehensive outpatient and inpatient clinical care.",
      videoSrc: undefined,
      alignment: "left" as const,
      badge: "Individual & Family Executive Health",
      icon: <HeartPulse className="w-4 h-4 text-rose-400" />,
      highlights: [
        "Unrestricted access to top-tier accredited hospitals",
        "100% inpatient surgery and comprehensive outpatient care",
        "Executive annual health screenings & dental coverage",
        "International treatment and maternity extension options",
      ],
      ctaText: "Request Healthcare Quote",
    },
    {
      id: "dask",
      order: "05",
      eyebrow: "05 / CATASTROPHE & SEISMIC",
      title: "Preparedness against nature's unforeseen events.",
      description:
        "Compulsory seismic risk underwriting paired with excess disaster insurance. Safeguard your property foundations against seismic shock, tsunami, fire, and structural displacement.",
      videoSrc: undefined,
      alignment: "right" as const,
      badge: "Seismic & Natural Hazard Protection",
      icon: <Building2 className="w-4 h-4 text-sky-400" />,
      highlights: [
        "Maximum statutory pool indemnity limits",
        "Fast-track post-disaster claim disbursements",
        "Official compliance for deeds and institutional registry",
        "Automated renewal and inflation adjustment tracking",
      ],
      ctaText: "Inquire Catastrophe Coverage",
    },
    {
      id: "isyeri",
      order: "06",
      eyebrow: "06 / COMMERCIAL PROPERTY",
      title: "Protect what you have spent years building.",
      description:
        "Multi-peril commercial underwriting covering fixed assets, inventory, business interruption, and employer liability. Bespoke solutions from boutique executive suites to multi-site operations.",
      videoSrc: undefined,
      alignment: "left" as const,
      badge: "Corporate Risk Advisory",
      icon: <Briefcase className="w-4 h-4 text-accent-violet" />,
      highlights: [
        "Business interruption & lost revenue reimbursement",
        "Equipment breakdown, machinery, and inventory coverage",
        "Third-party, employer, and product liability limits",
        "Tailored industry-specific risk engineering",
      ],
      ctaText: "Request Commercial Quote",
    },
  ];

  return (
    <section id="sigortalar" className="relative w-full bg-navy-950 text-white">
      {/* SECTION ANCHOR HEADER */}
      <div className="pt-20 pb-10 px-6 sm:px-10 lg:px-16 border-b border-white/[0.06] bg-gradient-to-b from-background to-navy-950">
        <div className="max-w-7xl mx-auto flex flex-col md:flex-row md:items-end justify-between gap-6">
          <div>
            <div className="inline-flex items-center gap-2 text-xs font-mono tracking-[0.25em] text-electric-light uppercase mb-2">
              <Shield className="w-3.5 h-3.5" />
              <span>Coverage Portfolio</span>
            </div>
            <h2 className="font-serif text-3xl sm:text-5xl font-medium text-white">
              Precision Underwriting for What Matters Most
            </h2>
          </div>

          {/* QUICK JUMP NAVIGATION PILLS */}
          <div className="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none">
            {navItems.map((item) => (
              <button
                key={item.id}
                onClick={() => scrollTo(item.target)}
                className="px-3.5 py-1.5 rounded-full text-xs font-mono uppercase tracking-wider bg-white/[0.03] hover:bg-white/[0.08] text-silver-400 hover:text-white border border-white/[0.06] transition-all whitespace-nowrap cursor-pointer"
              >
                <span className="text-electric-light mr-1.5">{item.order}</span>
                {item.label}
              </button>
            ))}
          </div>
        </div>
      </div>

      {/* REUSABLE CINEMATIC SCENES */}
      <div className="divide-y divide-white/[0.04]">
        {scenes.map((scene) => (
          <CinematicInsuranceScene
            key={scene.id}
            id={scene.id}
            order={scene.order}
            eyebrow={scene.eyebrow}
            title={scene.title}
            description={scene.description}
            videoSrc={scene.videoSrc}
            poster={scene.poster}
            alignment={scene.alignment}
            badge={scene.badge}
            highlights={scene.highlights}
            ctaText={scene.ctaText}
            icon={scene.icon}
            onQuoteClick={() => handleQuoteClick(scene.id)}
          />
        ))}
      </div>
    </section>
  );
}
