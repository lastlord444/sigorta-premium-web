"use client";

import React, { useRef } from "react";
import { motion, useScroll, useTransform } from "framer-motion";
import { ArrowRight, ShieldCheck, ChevronDown, Sparkles, Award, Clock } from "lucide-react";
import MagneticButton from "@/components/ui/MagneticButton";
import HeroCanvas from "@/components/canvas/HeroCanvas";
import { useLenis } from "@/components/providers/SmoothScrollProvider";

export default function Hero() {
  const containerRef = useRef<HTMLDivElement>(null);
  const { scrollTo } = useLenis();

  const { scrollYProgress } = useScroll({
    target: containerRef,
    offset: ["start start", "end start"],
  });

  const contentY = useTransform(scrollYProgress, [0, 1], [0, 100]);
  const contentOpacity = useTransform(scrollYProgress, [0, 0.7], [1, 0]);

  return (
    <section
      ref={containerRef}
      className="relative w-full min-h-screen flex flex-col justify-between pt-32 pb-12 overflow-hidden bg-background"
    >
      {/* 3D INTERACTIVE HERO CANVAS */}
      <HeroCanvas />

      {/* AMBIENT LIGHT BLOBS */}
      <div className="pointer-events-none absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-electric/15 rounded-full blur-[140px] -z-10" />
      <div className="pointer-events-none absolute top-1/3 left-1/3 w-[450px] h-[450px] bg-accent-violet/10 rounded-full blur-[160px] -z-10" />

      {/* MAIN HERO CONTENT */}
      <motion.div
        style={{ y: contentY, opacity: contentOpacity }}
        className="relative z-10 max-w-5xl mx-auto px-6 text-center flex flex-col items-center my-auto"
      >
        {/* TOP STATUS BADGE */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.6, ease: "easeOut" }}
          className="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/[0.04] border border-white/[0.1] backdrop-blur-md mb-8 shadow-[0_0_20px_rgba(0,102,255,0.15)]"
        >
          <Sparkles className="w-3.5 h-3.5 text-electric-light animate-pulse" />
          <span className="text-xs uppercase tracking-[0.2em] text-silver-300 font-mono">
            Bağımsız & Çoklu Şirket Karşılaştırması
          </span>
        </motion.div>

        {/* CINEMATIC DISPLAY HEADLINE */}
        <motion.h1
          initial={{ opacity: 0, y: 30 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.1, ease: [0.16, 1, 0.3, 1] }}
          className="font-serif text-4xl sm:text-6xl md:text-7xl lg:text-8xl tracking-tight text-white font-medium leading-[1.08] mb-6 max-w-4xl"
        >
          Hayat sürprizlerle dolu.{" "}
          <span className="block italic font-light bg-gradient-to-r from-silver-100 via-silver-300 to-electric-light bg-clip-text text-transparent">
            Güvencen hazır olsun.
          </span>
        </motion.h1>

        {/* SUBTITLE */}
        <motion.p
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.7, delay: 0.25, ease: "easeOut" }}
          className="text-base sm:text-lg md:text-xl text-silver-400 font-sans max-w-2xl font-normal leading-relaxed mb-10 text-balance"
        >
          Aracınızdan evinize, sağlığınızdan iş yerinize kadar hayatınızdaki
          değerleri doğru teminatlarla koruyun.
        </motion.p>

        {/* DUAL CTA BUTTONS */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.6, delay: 0.35, ease: "easeOut" }}
          className="flex flex-col sm:flex-row items-center gap-4 sm:gap-5 w-full sm:w-auto"
        >
          <MagneticButton
            variant="primary"
            size="lg"
            onClick={() => scrollTo("#teklif-al")}
            className="w-full sm:w-auto text-sm px-9 py-4 font-semibold tracking-wider shadow-[0_0_30px_rgba(0,102,255,0.4)]"
          >
            Teklif Al
            <ArrowRight className="w-4 h-4 stroke-[2.2]" />
          </MagneticButton>

          <MagneticButton
            variant="secondary"
            size="lg"
            onClick={() => scrollTo("#sigortalar")}
            className="w-full sm:w-auto text-sm px-8 py-4 text-silver-200"
          >
            Sigortaları İncele
          </MagneticButton>
        </motion.div>
      </motion.div>

      {/* BOTTOM TELEMETRY / TRUST METRICS TICKER */}
      <motion.div
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        transition={{ duration: 1, delay: 0.6 }}
        className="relative z-10 max-w-6xl mx-auto px-6 w-full pt-8"
      >
        <div className="grid grid-cols-2 md:grid-cols-4 gap-4 py-5 px-6 rounded-2xl bg-white/[0.02] border border-white/[0.06] backdrop-blur-md shadow-[0_10px_30px_rgba(0,0,0,0.3)]">
          <div className="flex items-center gap-3">
            <div className="w-8 h-8 rounded-lg bg-electric/10 border border-electric/30 flex items-center justify-center text-electric-light shrink-0">
              <ShieldCheck className="w-4 h-4" />
            </div>
            <div className="flex flex-col">
              <span className="text-xs font-semibold text-silver-200">20+ Şirket</span>
              <span className="text-[11px] text-silver-500">Tek Noktadan Karşılaştırma</span>
            </div>
          </div>

          <div className="flex items-center gap-3">
            <div className="w-8 h-8 rounded-lg bg-accent-violet/10 border border-accent-violet/30 flex items-center justify-center text-accent-violet shrink-0">
              <Award className="w-4 h-4" />
            </div>
            <div className="flex flex-col">
              <span className="text-xs font-semibold text-silver-200">Terzi Dikimi Teminat</span>
              <span className="text-[11px] text-silver-500">Gereksiz Madde Olmadan</span>
            </div>
          </div>

          <div className="flex items-center gap-3">
            <div className="w-8 h-8 rounded-lg bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center text-emerald-400 shrink-0">
              <Clock className="w-4 h-4" />
            </div>
            <div className="flex flex-col">
              <span className="text-xs font-semibold text-silver-200">3 Dakikada Teklif</span>
              <span className="text-[11px] text-silver-500">Hızlı WhatsApp & E-posta</span>
            </div>
          </div>

          <div className="flex items-center gap-3">
            <div className="w-8 h-8 rounded-lg bg-blue-500/10 border border-blue-500/30 flex items-center justify-center text-blue-400 shrink-0">
              <div className="w-2 h-2 rounded-full bg-emerald-400 animate-pulse" />
            </div>
            <div className="flex flex-col">
              <span className="text-xs font-semibold text-silver-200">7/24 Hasar Masası</span>
              <span className="text-[11px] text-silver-500">Birebir Danışman Desteği</span>
            </div>
          </div>
        </div>

        {/* SCROLL DOWN INDICATOR */}
        <div className="flex justify-center mt-6">
          <button
            onClick={() => scrollTo("#sigortalar")}
            aria-label="Aşağı kaydır"
            className="flex flex-col items-center text-silver-500 hover:text-silver-300 transition-colors cursor-pointer group"
          >
            <span className="text-[10px] tracking-[0.25em] uppercase font-mono mb-1 text-silver-500 group-hover:text-silver-400">
              Keşfet
            </span>
            <ChevronDown className="w-4 h-4 animate-bounce text-electric-light" />
          </button>
        </div>
      </motion.div>
    </section>
  );
}
