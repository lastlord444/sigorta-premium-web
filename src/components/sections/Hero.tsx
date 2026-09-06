"use client";

import React, { useRef, useEffect } from "react";
import { motion, useScroll, useTransform } from "framer-motion";
import { ArrowRight, ShieldCheck, ChevronDown, Sparkles, Award, Clock } from "lucide-react";
import MagneticButton from "@/components/ui/MagneticButton";
import { useLenis } from "@/components/providers/SmoothScrollProvider";

export default function Hero() {
  const containerRef = useRef<HTMLDivElement>(null);
  const videoRef = useRef<HTMLVideoElement>(null);
  const { scrollTo } = useLenis();

  useEffect(() => {
    const video = videoRef.current;
    if (!video) return;

    // Ensure video plays once and smoothly pauses on last frame
    const handleEnded = () => {
      video.pause();
    };

    video.addEventListener("ended", handleEnded);
    return () => {
      video.removeEventListener("ended", handleEnded);
    };
  }, []);

  // Cinematic scroll parallax
  const { scrollYProgress } = useScroll({
    target: containerRef,
    offset: ["start start", "end start"],
  });

  const contentY = useTransform(scrollYProgress, [0, 1], [0, 80]);
  const contentOpacity = useTransform(scrollYProgress, [0, 0.75], [1, 0]);
  const videoScale = useTransform(scrollYProgress, [0, 1], [1, 1.08]);
  const videoY = useTransform(scrollYProgress, [0, 1], [0, 50]);

  return (
    <section
      ref={containerRef}
      className="relative w-full min-h-[100svh] flex flex-col justify-between pt-28 sm:pt-32 pb-10 overflow-hidden bg-background"
    >
      {/* 
        CINEMATIC KASKO VIDEO BACKGROUND (PORSCHE)
        No visible rectangular player borders, seamlessly blends into dark canvas
      */}
      <motion.div
        style={{ scale: videoScale, y: videoY }}
        className="absolute inset-0 w-full h-full pointer-events-none select-none overflow-hidden z-0"
        aria-hidden="true"
      >
        <video
          ref={videoRef}
          src="/videos/kasko-car.mp4"
          muted
          autoPlay
          playsInline
          preload="auto"
          className="w-full h-full object-cover object-center filter brightness-[0.92] contrast-[1.05]"
        />

        {/* ORGANIC MULTI-LAYER BLEND MASKS (Melts video edges into dark navy/obsidian) */}
        {/* Top navbar blend */}
        <div className="absolute inset-x-0 top-0 h-44 bg-gradient-to-b from-[#030712] via-[#030712]/70 to-transparent pointer-events-none" />

        {/* Bottom scene transition blend */}
        <div className="absolute inset-x-0 bottom-0 h-64 bg-gradient-to-t from-[#030712] via-[#030712]/80 to-transparent pointer-events-none" />

        {/* Left & right cinematic vignette */}
        <div className="absolute inset-y-0 left-0 w-32 sm:w-64 bg-gradient-to-r from-[#030712] via-[#030712]/60 to-transparent pointer-events-none" />
        <div className="absolute inset-y-0 right-0 w-32 sm:w-64 bg-gradient-to-l from-[#030712] via-[#030712]/60 to-transparent pointer-events-none" />

        {/* Central soft elliptical vignette */}
        <div className="absolute inset-0 bg-[radial-gradient(ellipse_at_center,transparent_35%,#030712_88%)] pointer-events-none" />

        {/* Atmospheric subtle colored ambient light blobs */}
        <div className="absolute top-1/3 left-1/4 w-[500px] h-[500px] bg-electric/10 rounded-full blur-[160px] pointer-events-none" />
        <div className="absolute bottom-1/4 right-1/4 w-[450px] h-[450px] bg-accent-violet/10 rounded-full blur-[170px] pointer-events-none" />
      </motion.div>

      {/* 
        HERO COMPOSITION & LUXURY TYPOGRAPHY
        Positioned with generous negative space so the automobile remains the commanding hero
      */}
      <motion.div
        style={{ y: contentY, opacity: contentOpacity }}
        className="relative z-10 max-w-6xl mx-auto px-6 text-center flex flex-col items-center my-auto pt-4"
      >
        {/* TOP STATUS BADGE */}
        <motion.div
          initial={{ opacity: 0, y: 15 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.6, ease: "easeOut" }}
          className="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-navy-950/60 border border-white/[0.12] backdrop-blur-xl mb-6 sm:mb-8 shadow-[0_0_25px_rgba(0,102,255,0.2)]"
        >
          <Sparkles className="w-3.5 h-3.5 text-electric-light animate-pulse" />
          <span className="text-xs uppercase tracking-[0.2em] text-silver-200 font-mono">
            Bağımsız & Çoklu Şirket Karşılaştırması
          </span>
        </motion.div>

        {/* CINEMATIC DISPLAY HEADLINE */}
        <motion.h1
          initial={{ opacity: 0, y: 25 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.1, ease: [0.16, 1, 0.3, 1] }}
          className="font-serif text-4xl sm:text-6xl md:text-7xl lg:text-8xl tracking-tight text-white font-medium leading-[1.08] mb-6 max-w-5xl drop-shadow-[0_4px_24px_rgba(0,0,0,0.8)]"
        >
          Hayat sürprizlerle dolu.{" "}
          <span className="block italic font-light bg-gradient-to-r from-silver-100 via-silver-200 to-electric-light bg-clip-text text-transparent">
            Güvencen hazır olsun.
          </span>
        </motion.h1>

        {/* SUBTITLE */}
        <motion.p
          initial={{ opacity: 0, y: 15 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.7, delay: 0.25, ease: "easeOut" }}
          className="text-base sm:text-lg md:text-xl text-silver-300 font-sans max-w-2xl font-normal leading-relaxed mb-10 text-balance drop-shadow-[0_2px_12px_rgba(0,0,0,0.9)]"
        >
          Aracınızdan evinize, sağlığınızdan iş yerinize kadar değer verdiğiniz her
          şeyi doğru teminatlarla koruyun.
        </motion.p>

        {/* DUAL CTA BUTTONS */}
        <motion.div
          initial={{ opacity: 0, y: 15 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.6, delay: 0.35, ease: "easeOut" }}
          className="flex flex-col sm:flex-row items-center gap-4 sm:gap-5 w-full sm:w-auto"
        >
          <MagneticButton
            variant="primary"
            size="lg"
            onClick={() => scrollTo("#teklif-al")}
            className="w-full sm:w-auto text-sm px-9 py-4 font-semibold tracking-wider shadow-[0_0_35px_rgba(0,102,255,0.45)]"
          >
            Teklif Al
            <ArrowRight className="w-4 h-4 stroke-[2.2]" />
          </MagneticButton>

          <MagneticButton
            variant="secondary"
            size="lg"
            onClick={() => scrollTo("#sigortalar")}
            className="w-full sm:w-auto text-sm px-8 py-4 text-silver-100 bg-black/40 border-white/20 backdrop-blur-md hover:bg-black/60"
          >
            Sigortaları İncele
          </MagneticButton>
        </motion.div>
      </motion.div>

      {/* BOTTOM TELEMETRY / TRUST METRICS TICKER */}
      <motion.div
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        transition={{ duration: 1, delay: 0.55 }}
        className="relative z-10 max-w-6xl mx-auto px-6 w-full pt-4"
      >
        <div className="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 py-4 sm:py-5 px-5 sm:px-6 rounded-2xl bg-navy-950/70 border border-white/[0.08] backdrop-blur-xl shadow-[0_10px_35px_rgba(0,0,0,0.6)]">
          <div className="flex items-center gap-3">
            <div className="w-8 h-8 rounded-lg bg-electric/15 border border-electric/30 flex items-center justify-center text-electric-light shrink-0">
              <ShieldCheck className="w-4 h-4" />
            </div>
            <div className="flex flex-col">
              <span className="text-xs font-semibold text-silver-100">20+ Şirket</span>
              <span className="text-[11px] text-silver-400">Tek Noktadan Karşılaştırma</span>
            </div>
          </div>

          <div className="flex items-center gap-3">
            <div className="w-8 h-8 rounded-lg bg-accent-violet/15 border border-accent-violet/30 flex items-center justify-center text-accent-violet shrink-0">
              <Award className="w-4 h-4" />
            </div>
            <div className="flex flex-col">
              <span className="text-xs font-semibold text-silver-100">Terzi Dikimi Teminat</span>
              <span className="text-[11px] text-silver-400">Gereksiz Madde Olmadan</span>
            </div>
          </div>

          <div className="flex items-center gap-3">
            <div className="w-8 h-8 rounded-lg bg-emerald-500/15 border border-emerald-500/30 flex items-center justify-center text-emerald-400 shrink-0">
              <Clock className="w-4 h-4" />
            </div>
            <div className="flex flex-col">
              <span className="text-xs font-semibold text-silver-100">3 Dakikada Teklif</span>
              <span className="text-[11px] text-silver-400">Hızlı WhatsApp & E-posta</span>
            </div>
          </div>

          <div className="flex items-center gap-3">
            <div className="w-8 h-8 rounded-lg bg-blue-500/15 border border-blue-500/30 flex items-center justify-center text-blue-400 shrink-0">
              <div className="w-2 h-2 rounded-full bg-emerald-400 animate-pulse" />
            </div>
            <div className="flex flex-col">
              <span className="text-xs font-semibold text-silver-100">7/24 Hasar Masası</span>
              <span className="text-[11px] text-silver-400">Birebir Danışman Desteği</span>
            </div>
          </div>
        </div>

        {/* SCROLL DOWN INDICATOR */}
        <div className="flex justify-center mt-5">
          <button
            onClick={() => scrollTo("#sigortalar")}
            aria-label="Aşağı kaydır"
            className="flex flex-col items-center text-silver-400 hover:text-silver-200 transition-colors cursor-pointer group"
          >
            <span className="text-[10px] tracking-[0.25em] uppercase font-mono mb-1 text-silver-400 group-hover:text-silver-300">
              Keşfet
            </span>
            <ChevronDown className="w-4 h-4 animate-bounce text-electric-light" />
          </button>
        </div>
      </motion.div>
    </section>
  );
}
