"use client";

import React, { useRef, useEffect } from "react";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ArrowRight, ChevronDown, CheckCircle2 } from "lucide-react";
import MagneticButton from "@/components/ui/MagneticButton";
import { useLenis } from "@/components/providers/SmoothScrollProvider";

if (typeof window !== "undefined") {
  gsap.registerPlugin(ScrollTrigger);
}

interface HeroProps {
  onSelectProductForQuote?: (productId: string) => void;
}

export default function Hero({ onSelectProductForQuote }: HeroProps) {
  const containerRef = useRef<HTMLDivElement>(null);
  const stickyRef = useRef<HTMLDivElement>(null);
  const videoWrapperRef = useRef<HTMLDivElement>(null);
  const videoRef = useRef<HTMLVideoElement>(null);
  const heroContentRef = useRef<HTMLDivElement>(null);
  const kaskoContentRef = useRef<HTMLDivElement>(null);
  const scrollIndicatorRef = useRef<HTMLDivElement>(null);

  const { scrollTo } = useLenis();

  useEffect(() => {
    const video = videoRef.current;
    if (video) {
      video.play().catch(() => {
        // Autoplay policy fallback
      });
    }

    if (typeof window === "undefined" || !containerRef.current) return;

    const ctx = gsap.context(() => {
      const mm = gsap.matchMedia();

      // DESKTOP: True cinematic pinned ScrollTrigger transition (140-180vh range: 160vh)
      mm.add("(min-width: 769px)", () => {
        const tl = gsap.timeline({
          scrollTrigger: {
            trigger: containerRef.current,
            start: "top top",
            end: "bottom bottom",
            pin: stickyRef.current,
            pinSpacing: false,
            scrub: 0.8,
          },
        });

        // 1. Hero text fades out smoothly
        tl.to(
          heroContentRef.current,
          {
            opacity: 0,
            y: -35,
            ease: "power1.out",
            duration: 0.35,
          },
          0
        );

        // 2. Scroll indicator quickly disappears
        tl.to(
          scrollIndicatorRef.current,
          {
            opacity: 0,
            duration: 0.15,
            ease: "power1.out",
          },
          0
        );

        // 3. Automobile video subtle scale (1 -> 1.06) & gentle translate
        tl.to(
          videoWrapperRef.current,
          {
            scale: 1.06,
            yPercent: 3,
            ease: "none",
            duration: 1,
          },
          0
        );

        // 4. Kasko narrative gracefully reveals over the continuous visual atmosphere
        tl.fromTo(
          kaskoContentRef.current,
          {
            opacity: 0,
            y: 35,
            pointerEvents: "none",
          },
          {
            opacity: 1,
            y: 0,
            pointerEvents: "auto",
            ease: "power2.out",
            duration: 0.4,
          },
          0.32
        );
      });

      // MOBILE: No pin/scrub locking, natural smooth mobile scroll
      mm.add("(max-width: 768px)", () => {
        gsap.set(heroContentRef.current, { opacity: 1, y: 0 });
        gsap.set(videoWrapperRef.current, { scale: 1, yPercent: 0 });
        gsap.set(kaskoContentRef.current, { opacity: 1, y: 0, pointerEvents: "auto" });
      });
    }, containerRef);

    return () => ctx.revert();
  }, []);

  const handleKaskoQuote = () => {
    if (onSelectProductForQuote) {
      onSelectProductForQuote("kasko");
    }
    scrollTo("#teklif-al");
  };

  return (
    <section
      ref={containerRef}
      id="hero-kasko"
      className="relative w-full md:min-h-[160vh] bg-background"
    >
      {/* STICKY CINEMATIC VIEWPORT (DESKTOP) / NATURAL FULL-HEIGHT HERO (MOBILE) */}
      <div
        ref={stickyRef}
        className="md:sticky md:top-0 min-h-[100svh] md:h-screen w-full overflow-hidden flex flex-col justify-between"
      >
        {/* 
          CINEMATIC AUTOMOBILE VIDEO BACKGROUND (PORSCHE)
          Continuous, seamless visual atmosphere with organic edge blending
        */}
        <div
          ref={videoWrapperRef}
          className="absolute inset-0 w-full h-full pointer-events-none select-none overflow-hidden z-0 will-change-transform"
          aria-hidden="true"
        >
          <video
            ref={videoRef}
            src="/videos/kasko-car.mp4"
            muted
            autoPlay
            playsInline
            loop
            preload="auto"
            className="w-full h-full object-cover object-center filter brightness-[0.9] contrast-[1.05]"
          />

          {/* ORGANIC MULTI-LAYER BLEND MASKS (Melts video edges into obsidian dark background) */}
          <div className="absolute inset-x-0 top-0 h-44 bg-gradient-to-b from-[#030712] via-[#030712]/75 to-transparent pointer-events-none" />
          <div className="absolute inset-x-0 bottom-0 h-64 bg-gradient-to-t from-[#030712] via-[#030712]/85 to-transparent pointer-events-none" />
          <div className="absolute inset-y-0 left-0 w-32 sm:w-64 bg-gradient-to-r from-[#030712] via-[#030712]/60 to-transparent pointer-events-none" />
          <div className="absolute inset-y-0 right-0 w-32 sm:w-64 bg-gradient-to-l from-[#030712] via-[#030712]/60 to-transparent pointer-events-none" />
          <div className="absolute inset-0 bg-[radial-gradient(ellipse_at_center,transparent_35%,#030712_88%)] pointer-events-none" />

          {/* Ambient lighting */}
          <div className="absolute top-1/3 left-1/4 w-[500px] h-[500px] bg-electric/10 rounded-full blur-[160px] pointer-events-none" />
          <div className="absolute bottom-1/4 right-1/4 w-[450px] h-[450px] bg-accent-violet/10 rounded-full blur-[170px] pointer-events-none" />
        </div>

        {/* 
          1. SIMPLIFIED HERO COMPOSITION
          Clean, confident, automotive commercial aesthetic
          Priority: Automobile, Main Headline, Short Subtitle, Primary CTA
        */}
        <div
          ref={heroContentRef}
          className="relative z-10 max-w-5xl mx-auto px-6 text-center flex flex-col items-center my-auto pt-28 sm:pt-32 pb-12 will-change-transform"
        >
          {/* CINEMATIC DISPLAY HEADLINE */}
          <h1 className="font-serif text-4xl sm:text-6xl md:text-7xl lg:text-8xl tracking-tight text-white font-medium leading-[1.08] mb-6 max-w-4xl drop-shadow-[0_4px_24px_rgba(0,0,0,0.85)]">
            Hayat sürprizlerle dolu.{" "}
            <span className="block italic font-light bg-gradient-to-r from-silver-100 via-silver-200 to-electric-light bg-clip-text text-transparent">
              Güvencen hazır olsun.
            </span>
          </h1>

          {/* SUBTITLE */}
          <p className="text-base sm:text-lg md:text-xl text-silver-300 font-sans max-w-2xl font-normal leading-relaxed mb-10 text-balance drop-shadow-[0_2px_12px_rgba(0,0,0,0.9)]">
            Aracınızdan evinize, sağlığınızdan iş yerinize kadar değer verdiğiniz her
            şeyi doğru teminatlarla koruyun.
          </p>

          {/* CTA BUTTONS */}
          <div className="flex flex-col sm:flex-row items-center gap-4 sm:gap-5 w-full sm:w-auto">
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
          </div>
        </div>

        {/* 
          2. KASKO REVEAL NARRATIVE (DESKTOP PINNED REVEAL)
          Seamless continuation of the visual atmosphere on scroll (Desktop only)
        */}
        <div
          ref={kaskoContentRef}
          id="scene-kasko"
          className="hidden md:flex absolute inset-0 z-20 max-w-5xl mx-auto px-6 flex-col justify-center items-center text-center opacity-0 pointer-events-none will-change-transform pt-24 pb-8"
        >
          <span className="font-mono text-xs tracking-[0.3em] text-electric-light uppercase font-semibold mb-3">
            01 / KASKO
          </span>

          <h2 className="font-serif text-3xl sm:text-5xl lg:text-6xl text-white font-medium leading-[1.15] mb-5 max-w-3xl drop-shadow-[0_4px_24px_rgba(0,0,0,0.9)]">
            Hareket özgürlüğünüzü güvence altına alın.
          </h2>

          <p className="text-silver-300 text-sm sm:text-base md:text-lg font-sans leading-relaxed max-w-2xl mb-8 drop-shadow-[0_2px_12px_rgba(0,0,0,0.9)]">
            Kaza, çarpma, doğal afet, yangın ve hırsızlığa karşı aracınızı tam güvenceye alın. İhtiyacınıza uygun teminat seçenekleriyle standart poliçelerin ötesine geçin.
          </p>

          {/* HIGHLIGHT CHIPS */}
          <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 max-w-xl w-full mb-8 text-left">
            <div className="flex items-center gap-2.5 p-3 rounded-xl bg-black/50 border border-white/10 backdrop-blur-md">
              <CheckCircle2 className="w-4 h-4 text-electric-light shrink-0" />
              <span className="text-xs sm:text-sm text-silver-200 font-sans">
                Birden fazla şirketten teklif
              </span>
            </div>

            <div className="flex items-center gap-2.5 p-3 rounded-xl bg-black/50 border border-white/10 backdrop-blur-md">
              <CheckCircle2 className="w-4 h-4 text-electric-light shrink-0" />
              <span className="text-xs sm:text-sm text-silver-200 font-sans">
                İhtiyacınıza uygun teminat seçenekleri
              </span>
            </div>

            <div className="flex items-center gap-2.5 p-3 rounded-xl bg-black/50 border border-white/10 backdrop-blur-md">
              <CheckCircle2 className="w-4 h-4 text-electric-light shrink-0" />
              <span className="text-xs sm:text-sm text-silver-200 font-sans">
                Poliçe sürecinde destek
              </span>
            </div>

            <div className="flex items-center gap-2.5 p-3 rounded-xl bg-black/50 border border-white/10 backdrop-blur-md">
              <CheckCircle2 className="w-4 h-4 text-electric-light shrink-0" />
              <span className="text-xs sm:text-sm text-silver-200 font-sans">
                Orijinal parça & servis güvencesi
              </span>
            </div>
          </div>

          <div className="flex flex-col sm:flex-row items-center gap-4">
            <button
              onClick={handleKaskoQuote}
              className="px-8 py-3.5 rounded-xl bg-gradient-to-r from-blue-600 via-blue-500 to-indigo-600 text-white font-semibold text-xs tracking-wider uppercase shadow-[0_0_25px_rgba(0,102,255,0.4)] hover:shadow-[0_0_35px_rgba(0,102,255,0.6)] transition-all cursor-pointer flex items-center gap-2"
            >
              <span>Kasko Teklifi Al</span>
              <ArrowRight className="w-4 h-4" />
            </button>

            <button
              onClick={() => scrollTo("#sigortalar")}
              className="px-6 py-3.5 rounded-xl bg-black/40 border border-white/20 text-silver-200 hover:text-white font-medium text-xs tracking-wider uppercase backdrop-blur-md transition-all cursor-pointer"
            >
              Diğer Sigortaları Gör
            </button>
          </div>
        </div>

        {/* SUBTLE SCROLL DOWN INDICATOR */}
        <div
          ref={scrollIndicatorRef}
          className="relative z-10 flex justify-center pb-6 pointer-events-auto"
        >
          <button
            onClick={() => scrollTo("#scene-kasko")}
            aria-label="Aşağı kaydır"
            className="flex flex-col items-center text-silver-400 hover:text-silver-200 transition-colors cursor-pointer group"
          >
            <span className="text-[10px] tracking-[0.25em] uppercase font-mono mb-1 text-silver-400 group-hover:text-silver-300">
              Kaydırın
            </span>
            <ChevronDown className="w-4 h-4 animate-bounce text-electric-light" />
          </button>
        </div>
      </div>

      {/* 
        3. MOBILE KASKO FLOW SECTION
        Clean, natural document flow without scroll-jacking or overlaps on small screens
      */}
      <div
        id="scene-kasko-mobile"
        className="md:hidden relative z-10 w-full py-16 px-6 text-center flex flex-col items-center bg-navy-950 border-t border-white/[0.06]"
      >
        <span className="font-mono text-xs tracking-[0.3em] text-electric-light uppercase font-semibold mb-3">
          01 / KASKO
        </span>

        <h2 className="font-serif text-3xl text-white font-medium leading-[1.2] mb-4 max-w-sm">
          Hareket özgürlüğünüzü güvence altına alın.
        </h2>

        <p className="text-silver-300 text-sm font-sans leading-relaxed mb-6 max-w-sm">
          Kaza, çarpma, doğal afet, yangın ve hırsızlığa karşı aracınızı tam güvenceye alın. İhtiyacınıza uygun teminat seçenekleriyle standart poliçelerin ötesine geçin.
        </p>

        <div className="grid grid-cols-1 gap-2.5 w-full max-w-sm mb-6 text-left">
          <div className="flex items-center gap-2.5 p-3 rounded-xl bg-white/[0.03] border border-white/10">
            <CheckCircle2 className="w-4 h-4 text-electric-light shrink-0" />
            <span className="text-xs text-silver-200 font-sans">
              Birden fazla şirketten teklif
            </span>
          </div>

          <div className="flex items-center gap-2.5 p-3 rounded-xl bg-white/[0.03] border border-white/10">
            <CheckCircle2 className="w-4 h-4 text-electric-light shrink-0" />
            <span className="text-xs text-silver-200 font-sans">
              İhtiyacınıza uygun teminat seçenekleri
            </span>
          </div>

          <div className="flex items-center gap-2.5 p-3 rounded-xl bg-white/[0.03] border border-white/10">
            <CheckCircle2 className="w-4 h-4 text-electric-light shrink-0" />
            <span className="text-xs text-silver-200 font-sans">
              Poliçe sürecinde destek
            </span>
          </div>

          <div className="flex items-center gap-2.5 p-3 rounded-xl bg-white/[0.03] border border-white/10">
            <CheckCircle2 className="w-4 h-4 text-electric-light shrink-0" />
            <span className="text-xs text-silver-200 font-sans">
              Orijinal parça & servis güvencesi
            </span>
          </div>
        </div>

        <div className="flex flex-col gap-3 w-full max-w-sm">
          <button
            onClick={handleKaskoQuote}
            className="w-full py-3.5 rounded-xl bg-gradient-to-r from-blue-600 via-blue-500 to-indigo-600 text-white font-semibold text-xs tracking-wider uppercase shadow-[0_0_25px_rgba(0,102,255,0.4)] flex items-center justify-center gap-2"
          >
            <span>Kasko Teklifi Al</span>
            <ArrowRight className="w-4 h-4" />
          </button>

          <button
            onClick={() => scrollTo("#sigortalar")}
            className="w-full py-3 rounded-xl bg-white/[0.05] border border-white/15 text-silver-300 text-xs font-mono uppercase tracking-wider"
          >
            Diğer Sigortaları Gör
          </button>
        </div>
      </div>
    </section>
  );
}
