"use client";

import React, { useState, useEffect, useRef } from "react";
import { motion, AnimatePresence } from "framer-motion";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import {
  Car,
  ShieldAlert,
  HeartPulse,
  Home,
  Building2,
  Briefcase,
  CheckCircle2,
  ArrowRight,
  Shield,
  Activity,
  Sparkles
} from "lucide-react";
import { productsData } from "@/data/siteData";
import { useLenis } from "@/components/providers/SmoothScrollProvider";

function getProductIcon(id: string, className: string = "w-5 h-5") {
  switch (id) {
    case "kasko":
      return <Car className={className} />;
    case "trafik":
      return <ShieldAlert className={className} />;
    case "saglik":
      return <HeartPulse className={className} />;
    case "konut":
      return <Home className={className} />;
    case "dask":
      return <Building2 className={className} />;
    case "isyeri":
      return <Briefcase className={className} />;
    default:
      return <Shield className={className} />;
  }
}

export default function ScrollStorytelling({
  onSelectProductForQuote,
}: {
  onSelectProductForQuote?: (productId: string) => void;
}) {
  const [activeIndex, setActiveIndex] = useState(0);
  const containerRef = useRef<HTMLDivElement>(null);
  const stageRef = useRef<HTMLDivElement>(null);
  const { scrollTo } = useLenis();

  useEffect(() => {
    if (typeof window === "undefined" || !containerRef.current) return;

    gsap.registerPlugin(ScrollTrigger);

    // Create ScrollTrigger to smoothly update active index based on scroll position
    const totalSteps = productsData.length;
    const trigger = ScrollTrigger.create({
      trigger: containerRef.current,
      start: "top top",
      end: `+=${totalSteps * 80}%`,
      pin: stageRef.current,
      pinSpacing: true,
      scrub: 0.8,
      onUpdate: (self) => {
        const progress = self.progress;
        const index = Math.min(
          Math.floor(progress * totalSteps),
          totalSteps - 1
        );
        setActiveIndex(index);
      },
    });

    return () => {
      trigger.kill();
    };
  }, []);

  const activeProduct = productsData[activeIndex];

  const handleProductSelect = (id: string) => {
    if (onSelectProductForQuote) {
      onSelectProductForQuote(id);
    }
    scrollTo("#teklif-al");
  };

  return (
    <section
      id="sigortalar"
      ref={containerRef}
      className="relative w-full bg-navy-950 text-silver-100 overflow-hidden"
    >
      {/* BACKGROUND AMBIENT GLOWS */}
      <div className="absolute top-1/4 -left-40 w-96 h-96 bg-electric/10 rounded-full blur-[140px] pointer-events-none" />
      <div className="absolute bottom-1/4 -right-40 w-96 h-96 bg-accent-violet/10 rounded-full blur-[140px] pointer-events-none" />

      {/* PINNED STAGE CONTAINER */}
      <div
        ref={stageRef}
        className="w-full min-h-screen flex flex-col justify-center py-12 px-6 sm:px-10 lg:px-16"
      >
        <div className="max-w-7xl mx-auto w-full">
          {/* SECTION HEADER & QUICK NAVIGATION TABS */}
          <div className="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-10 pb-6 border-b border-white/[0.08]">
            <div>
              <div className="inline-flex items-center gap-2 text-xs font-mono tracking-[0.25em] text-electric-light uppercase mb-2">
                <Sparkles className="w-3.5 h-3.5" />
                <span>Sinematik Ürün Vitrini</span>
              </div>
              <h2 className="font-serif text-3xl sm:text-4xl lg:text-5xl text-white font-medium">
                Kapsamlı Güvence Portföyü
              </h2>
            </div>

            {/* PRODUCT SELECTOR TABS */}
            <div className="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none">
              {productsData.map((item, idx) => (
                <button
                  key={item.id}
                  onClick={() => setActiveIndex(idx)}
                  className={`px-3.5 py-1.5 rounded-full text-xs font-mono uppercase tracking-wider transition-all duration-300 whitespace-nowrap cursor-pointer ${
                    activeIndex === idx
                      ? "bg-white/15 text-white border border-white/30 shadow-[0_0_15px_rgba(255,255,255,0.15)]"
                      : "bg-white/[0.03] text-silver-400 hover:text-silver-200 border border-white/[0.05]"
                  }`}
                >
                  <span className="text-electric-light mr-1.5">{item.order}</span>
                  {item.name}
                </button>
              ))}
            </div>
          </div>

          {/* MAIN TWO-COLUMN CINEMATIC SHOWCASE */}
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-14 items-center">
            {/* LEFT COLUMN: NARRATIVE & SPECS */}
            <div className="lg:col-span-6 flex flex-col justify-center">
              <AnimatePresence mode="wait">
                <motion.div
                  key={activeProduct.id}
                  initial={{ opacity: 0, y: 24 }}
                  animate={{ opacity: 1, y: 0 }}
                  exit={{ opacity: 0, y: -24 }}
                  transition={{ duration: 0.45, ease: [0.16, 1, 0.3, 1] }}
                  className="flex flex-col"
                >
                  {/* ORDER & BADGE */}
                  <div className="flex items-center gap-4 mb-4">
                    <span className="font-mono text-4xl sm:text-5xl font-light text-electric-light/80 tracking-tighter">
                      {activeProduct.order}
                    </span>
                    <div className="h-4 w-px bg-white/20" />
                    <span className="inline-flex items-center gap-1.5 px-3 py-1 rounded-md bg-white/[0.06] border border-white/10 text-xs font-mono uppercase tracking-wider text-silver-300">
                      {getProductIcon(activeProduct.id, "w-4 h-4 text-electric-light")}
                      {activeProduct.metaBadge}
                    </span>
                  </div>

                  {/* HEADLINE */}
                  <h3 className="font-serif text-2xl sm:text-3xl lg:text-4xl text-white font-medium leading-[1.25] mb-5">
                    “{activeProduct.headline}”
                  </h3>

                  {/* DESCRIPTION */}
                  <p className="text-silver-400 text-sm sm:text-base leading-relaxed mb-6 font-sans">
                    {activeProduct.description}
                  </p>

                  {/* COVERAGE HIGHLIGHTS */}
                  <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-8">
                    {activeProduct.highlights.map((h, i) => (
                      <div
                        key={i}
                        className="flex items-start gap-2.5 p-3 rounded-xl bg-white/[0.02] border border-white/[0.06]"
                      >
                        <CheckCircle2 className="w-4 h-4 text-electric-light shrink-0 mt-0.5" />
                        <span className="text-xs text-silver-300 font-sans leading-snug">
                          {h}
                        </span>
                      </div>
                    ))}
                  </div>

                  {/* ACTION BUTTON */}
                  <div className="flex items-center gap-4">
                    <button
                      onClick={() => handleProductSelect(activeProduct.id)}
                      className="group inline-flex items-center gap-3 px-6 py-3.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold text-xs tracking-wider uppercase shadow-[0_0_20px_rgba(0,102,255,0.35)] hover:shadow-[0_0_30px_rgba(0,102,255,0.6)] transition-all cursor-pointer"
                    >
                      <span>{activeProduct.name} İçin Teklif Al</span>
                      <ArrowRight className="w-4 h-4 group-hover:translate-x-1 transition-transform" />
                    </button>
                    <span className="text-[11px] text-silver-500 font-mono">
                      Ortalama 3 dakikada sonuç
                    </span>
                  </div>
                </motion.div>
              </AnimatePresence>
            </div>

            {/* RIGHT COLUMN: CINEMATIC VISUAL VIEWPORT */}
            <div className="lg:col-span-6 relative">
              <div className="relative w-full aspect-[4/3] rounded-3xl overflow-hidden border border-white/10 bg-gradient-to-br from-white/[0.05] to-white/[0.01] backdrop-blur-xl shadow-[0_20px_60px_rgba(0,0,0,0.6)] p-6 flex flex-col justify-between">
                {/* AMBIENT INNER GLOW */}
                <div className="absolute inset-0 bg-radial-glow opacity-30 pointer-events-none" />

                <AnimatePresence mode="wait">
                  <motion.div
                    key={activeProduct.id}
                    initial={{ opacity: 0, scale: 0.96 }}
                    animate={{ opacity: 1, scale: 1 }}
                    exit={{ opacity: 0, scale: 1.04 }}
                    transition={{ duration: 0.4, ease: "easeOut" }}
                    className="relative z-10 w-full h-full flex flex-col justify-between"
                  >
                    {/* TOP HUD BAR */}
                    <div className="flex items-center justify-between pb-4 border-b border-white/[0.08]">
                      <div className="flex items-center gap-2 font-mono text-[11px] text-silver-400">
                        <span className="w-2 h-2 rounded-full bg-emerald-400 animate-ping" />
                        <span>SİSTEM AKTİF • 20+ ŞİRKET TARAMASI</span>
                      </div>
                      <span className="font-mono text-xs text-electric-light">
                        PORTFÖY {activeProduct.order} / 06
                      </span>
                    </div>

                    {/* DYNAMIC SCENIC GRAPHIC / TELEMETRY CARD */}
                    <div className="my-auto py-6 flex flex-col items-center text-center">
                      <div className="w-24 h-24 rounded-2xl bg-gradient-to-br from-blue-500/20 to-indigo-600/20 border border-white/15 flex items-center justify-center mb-5 shadow-[0_0_30px_rgba(0,102,255,0.3)]">
                        {getProductIcon(activeProduct.id, "w-12 h-12 stroke-[1.5] text-electric-light")}
                      </div>

                      <span className="font-mono text-xs text-silver-400 uppercase tracking-widest mb-1">
                        STANDART DIŞI KORUMA DÜZEYİ
                      </span>
                      <h4 className="font-serif text-2xl text-white font-medium mb-3">
                        {activeProduct.name} Güvence Protokolü
                      </h4>

                      {/* STAT PILLS */}
                      <div className="flex flex-wrap justify-center gap-2 mt-2">
                        <span className="px-3 py-1 rounded-full bg-white/[0.05] border border-white/10 text-[11px] font-mono text-silver-300">
                          ✓ Genişletilmiş Muafiyet
                        </span>
                        <span className="px-3 py-1 rounded-full bg-white/[0.05] border border-white/10 text-[11px] font-mono text-silver-300">
                          ✓ 7/24 Kesintisiz Asistan
                        </span>
                        <span className="px-3 py-1 rounded-full bg-white/[0.05] border border-white/10 text-[11px] font-mono text-silver-300">
                          ✓ Gerçek Kişi Danışman
                        </span>
                      </div>
                    </div>

                    {/* BOTTOM HUD STATUS */}
                    <div className="pt-4 border-t border-white/[0.08] flex items-center justify-between text-[11px] font-mono text-silver-400">
                      <div className="flex items-center gap-2">
                        <Shield className="w-3.5 h-3.5 text-electric-light" />
                        <span>SEDDK Lisanslı Teminat Mimarlığı</span>
                      </div>
                      <div className="flex items-center gap-1.5 text-emerald-400">
                        <Activity className="w-3.5 h-3.5" />
                        <span>Anlık Fiyatlandırma</span>
                      </div>
                    </div>
                  </motion.div>
                </AnimatePresence>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
