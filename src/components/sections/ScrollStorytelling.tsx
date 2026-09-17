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
import { useLanguage } from "@/components/providers/LanguageProvider";

interface ScrollStorytellingProps {
  onSelectProductForQuote?: (productId: string) => void;
}

export default function ScrollStorytelling({
  onSelectProductForQuote,
}: ScrollStorytellingProps) {
  const { scrollTo } = useLenis();
  const { t } = useLanguage();

  const handleQuoteClick = (productId: string) => {
    if (onSelectProductForQuote) {
      onSelectProductForQuote(productId);
    }
    scrollTo("#teklif-al");
  };

  const navItems = [
    { id: "kasko", order: "01", label: t.scenes.navPills[0]?.label || "AUTO", target: "#scene-kasko" },
    { id: "konut", order: "02", label: t.scenes.navPills[1]?.label || "ESTATE", target: "#scene-konut" },
    { id: "trafik", order: "03", label: t.scenes.navPills[2]?.label || "LIABILITY", target: "#scene-trafik" },
    { id: "saglik", order: "04", label: t.scenes.navPills[3]?.label || "HEALTH", target: "#scene-saglik" },
    { id: "dask", order: "05", label: t.scenes.navPills[4]?.label || "DISASTER", target: "#scene-dask" },
    { id: "isyeri", order: "06", label: t.scenes.navPills[5]?.label || "COMMERCIAL", target: "#scene-isyeri" },
  ];

  const scenes = [
    {
      id: "konut",
      order: "02",
      eyebrow: t.scenes.estate.eyebrow,
      title: t.scenes.estate.title,
      description: t.scenes.estate.description,
      videoSrc: "/videos/konut-dask.mp4",
      poster: "/images/villajpg.jpg",
      alignment: "left" as const,
      badge: t.scenes.estate.badge,
      icon: <Home className="w-4 h-4 text-emerald-400" />,
      highlights: t.scenes.estate.highlights,
      ctaText: t.scenes.estate.ctaText,
    },
    {
      id: "trafik",
      order: "03",
      eyebrow: t.scenes.liability.eyebrow,
      title: t.scenes.liability.title,
      description: t.scenes.liability.description,
      videoSrc: undefined,
      alignment: "right" as const,
      badge: t.scenes.liability.badge,
      icon: <ShieldAlert className="w-4 h-4 text-amber-400" />,
      highlights: t.scenes.liability.highlights,
      ctaText: t.scenes.liability.ctaText,
    },
    {
      id: "saglik",
      order: "04",
      eyebrow: t.scenes.health.eyebrow,
      title: t.scenes.health.title,
      description: t.scenes.health.description,
      videoSrc: undefined,
      alignment: "left" as const,
      badge: t.scenes.health.badge,
      icon: <HeartPulse className="w-4 h-4 text-rose-400" />,
      highlights: t.scenes.health.highlights,
      ctaText: t.scenes.health.ctaText,
    },
    {
      id: "dask",
      order: "05",
      eyebrow: t.scenes.disaster.eyebrow,
      title: t.scenes.disaster.title,
      description: t.scenes.disaster.description,
      videoSrc: undefined,
      alignment: "right" as const,
      badge: t.scenes.disaster.badge,
      icon: <Building2 className="w-4 h-4 text-sky-400" />,
      highlights: t.scenes.disaster.highlights,
      ctaText: t.scenes.disaster.ctaText,
    },
    {
      id: "isyeri",
      order: "06",
      eyebrow: t.scenes.commercial.eyebrow,
      title: t.scenes.commercial.title,
      description: t.scenes.commercial.description,
      videoSrc: undefined,
      alignment: "left" as const,
      badge: t.scenes.commercial.badge,
      icon: <Briefcase className="w-4 h-4 text-accent-violet" />,
      highlights: t.scenes.commercial.highlights,
      ctaText: t.scenes.commercial.ctaText,
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
              <span>{t.scenes.headerBadge}</span>
            </div>
            <h2 className="font-serif text-3xl sm:text-5xl font-medium text-white">
              {t.scenes.headerTitle}
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
