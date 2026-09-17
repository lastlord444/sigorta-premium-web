"use client";

import React from "react";
import {
  Car,
  Home,
  ShieldAlert,
  HeartPulse,
  Building2,
  Briefcase,
  Shield,
  ArrowRight,
  Sparkles
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

  const getProductIcon = (id: string, className: string = "w-5 h-5") => {
    switch (id) {
      case "kasko":
        return <Car className={className} />;
      case "trafik":
        return <ShieldAlert className={className} />;
      case "konut":
        return <Home className={className} />;
      case "dask":
        return <Building2 className={className} />;
      case "saglik":
        return <HeartPulse className={className} />;
      case "isyeri":
        return <Briefcase className={className} />;
      default:
        return <Shield className={className} />;
    }
  };

  const scenes = [
    {
      id: "kasko",
      order: "01",
      eyebrow: t.scenes.auto?.eyebrow || "01 / KASKO",
      title: t.scenes.auto?.title || t.hero.autoTitle,
      description: t.scenes.auto?.description || t.hero.autoDesc,
      videoSrc: "/videos/kasko-car.mp4",
      poster: "/images/porshce.jpg",
      imageSrc: "/images/porshce.jpg",
      alignment: "right" as const,
      badge: t.scenes.auto?.badge || "Kasko",
      icon: <Car className="w-4 h-4 text-electric-light" />,
      highlights: t.scenes.auto?.highlights || t.hero.autoHighlights,
      ctaText: t.scenes.auto?.ctaText || t.hero.autoCta,
    },
    {
      id: "konut",
      order: "02",
      eyebrow: t.scenes.estate.eyebrow,
      title: t.scenes.estate.title,
      description: t.scenes.estate.description,
      videoSrc: "/videos/konut-dask.mp4",
      poster: "/images/villajpg.jpg",
      imageSrc: "/images/villajpg.jpg",
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
      poster: "/images/porshce.jpg",
      imageSrc: "/images/porshce.jpg",
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
      poster: "/images/saglik.jpg",
      imageSrc: "/images/saglik.jpg",
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
      videoSrc: "/videos/konut-dask.mp4",
      poster: "/images/villajpg.jpg",
      imageSrc: "/images/villajpg.jpg",
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
      poster: "/images/is-yeri.jpg",
      imageSrc: "/images/is-yeri.jpg",
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

      {/* 6-CARD CATEGORIES SHOWCASE GRID (From Git Repo Architecture) */}
      {t.categories?.items && (
        <div className="py-14 sm:py-16 px-6 sm:px-10 lg:px-16 border-b border-white/[0.06] bg-black/40">
          <div className="max-w-7xl mx-auto">
            <div className="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10">
              <div>
                <span className="inline-flex items-center gap-2 text-xs font-mono tracking-widest text-electric-light uppercase mb-1">
                  <Sparkles className="w-3 h-3" />
                  <span>{t.categories.badge}</span>
                </span>
                <h3 className="font-serif text-2xl sm:text-3xl text-white font-medium">
                  {t.categories.title}
                </h3>
              </div>
              <p className="text-silver-400 text-xs sm:text-sm max-w-md font-sans">
                {t.categories.desc}
              </p>
            </div>

            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
              {t.categories.items.map((cat) => (
                <div
                  key={cat.id}
                  onClick={() => handleQuoteClick(cat.id)}
                  className="group relative flex flex-col justify-between p-6 sm:p-7 rounded-2xl bg-white/[0.02] hover:bg-white/[0.05] border border-white/[0.06] hover:border-electric-light/40 transition-all duration-300 cursor-pointer backdrop-blur-sm"
                >
                  {/* Subtle top ambient glow */}
                  <div className="absolute inset-0 bg-radial-glow opacity-0 group-hover:opacity-10 pointer-events-none transition-opacity rounded-2xl" />

                  <div>
                    <div className="flex items-center justify-between mb-4">
                      <div className="w-11 h-11 rounded-xl bg-blue-500/10 border border-blue-500/20 group-hover:border-electric-light/50 flex items-center justify-center text-electric-light transition-colors">
                        {getProductIcon(cat.id, "w-5 h-5")}
                      </div>
                      <span className="font-mono text-xs text-silver-500 tracking-wider">
                        {cat.order}
                      </span>
                    </div>

                    <div className="inline-block px-2.5 py-0.5 rounded-md bg-white/[0.04] border border-white/[0.08] text-[10px] font-mono uppercase tracking-wider text-silver-400 mb-2.5">
                      {cat.badge}
                    </div>

                    <h4 className="font-serif text-xl text-white font-medium mb-2 group-hover:text-electric-light transition-colors">
                      {cat.title}
                    </h4>

                    <p className="font-sans text-silver-400 text-xs sm:text-sm leading-relaxed mb-6">
                      {cat.desc}
                    </p>
                  </div>

                  <div className="flex items-center justify-between pt-4 border-t border-white/[0.04] text-xs font-mono text-electric-light font-medium group-hover:translate-x-1 transition-transform">
                    <span>{cat.cta}</span>
                    <ArrowRight className="w-3.5 h-3.5" />
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      )}

      {/* REUSABLE CINEMATIC SCENES (EVERY SCENE HAS HIGH-RES MEDIA & NO EMPTY BOXES) */}
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
            imageSrc={scene.imageSrc}
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
