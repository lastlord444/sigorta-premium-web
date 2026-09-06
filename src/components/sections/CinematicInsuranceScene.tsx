"use client";

import React, { useRef, useEffect } from "react";
import {
  Shield,
  CheckCircle2,
  ArrowRight,
  Video,
  Layers
} from "lucide-react";
import { cn } from "@/lib/utils";

export interface CinematicInsuranceSceneProps {
  id: string;
  order: string;
  eyebrow: string; // e.g. "01 / KASKO" or "02 / KONUT"
  title: string; // e.g. "Hareket özgürlüğünüzü güvence altına alın."
  description: string;
  videoSrc?: string;
  alignment?: "left" | "right";
  badge?: string;
  highlights?: string[];
  ctaText?: string;
  onQuoteClick?: () => void;
  icon?: React.ReactNode;
  pendingVideoNotice?: string;
}

export default function CinematicInsuranceScene({
  id,
  order,
  eyebrow,
  title,
  description,
  videoSrc,
  alignment = "right",
  badge,
  highlights = [],
  ctaText,
  onQuoteClick,
  icon,
  pendingVideoNotice,
}: CinematicInsuranceSceneProps) {
  const videoRef = useRef<HTMLVideoElement>(null);

  useEffect(() => {
    const video = videoRef.current;
    if (!video) return;

    // Handle end of playback - stay on last frame smoothly
    const handleEnded = () => {
      video.pause();
    };

    video.addEventListener("ended", handleEnded);
    return () => {
      video.removeEventListener("ended", handleEnded);
    };
  }, [videoSrc]);

  const isTextLeft = alignment === "left";

  return (
    <div
      id={`scene-${id}`}
      className="relative w-full py-20 lg:py-28 px-6 sm:px-10 lg:px-16 overflow-hidden border-b border-white/[0.05]"
    >
      {/* AMBIENT SOFT LIGHT */}
      <div
        className={cn(
          "absolute top-1/2 -translate-y-1/2 w-[600px] h-[600px] rounded-full blur-[170px] pointer-events-none opacity-20 -z-10",
          isTextLeft ? "right-[-10%] bg-electric/20" : "left-[-10%] bg-accent-violet/20"
        )}
      />

      <div className="max-w-7xl mx-auto">
        <div
          className={cn(
            "grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center",
            isTextLeft ? "" : "lg:grid-flow-dense"
          )}
        >
          {/* TEXT CONTENT COLUMN */}
          <div
            className={cn(
              "lg:col-span-6 flex flex-col justify-center",
              isTextLeft ? "lg:order-1" : "lg:col-start-7 lg:order-2"
            )}
          >
            {/* EYEBROW & ORDER */}
            <div className="flex items-center gap-4 mb-4">
              <span className="font-mono text-sm tracking-[0.25em] text-electric-light uppercase font-semibold">
                {eyebrow}
              </span>
              {badge && (
                <>
                  <div className="h-3 w-px bg-white/20" />
                  <span className="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full bg-white/[0.05] border border-white/10 text-xs font-mono uppercase tracking-wider text-silver-300">
                    {icon}
                    {badge}
                  </span>
                </>
              )}
            </div>

            {/* MAIN SERIF HEADLINE */}
            <h3 className="font-serif text-3xl sm:text-4xl lg:text-5xl text-white font-medium leading-[1.2] mb-6 text-balance">
              “{title}”
            </h3>

            {/* DESCRIPTION */}
            <p className="text-silver-300 text-base sm:text-lg font-sans leading-relaxed mb-8 max-w-xl">
              {description}
            </p>

            {/* HIGHLIGHT CHECKPOINTS */}
            {highlights.length > 0 && (
              <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-10">
                {highlights.map((h, i) => (
                  <div
                    key={i}
                    className="flex items-start gap-2.5 p-3.5 rounded-2xl bg-white/[0.02] border border-white/[0.06] backdrop-blur-sm"
                  >
                    <CheckCircle2 className="w-4 h-4 text-electric-light shrink-0 mt-0.5" />
                    <span className="text-xs sm:text-sm text-silver-300 font-sans leading-snug">
                      {h}
                    </span>
                  </div>
                ))}
              </div>
            )}

            {/* ACTION CTA */}
            <div className="flex flex-wrap items-center gap-4">
              <button
                onClick={onQuoteClick}
                className="group inline-flex items-center gap-3 px-8 py-4 rounded-xl bg-gradient-to-r from-blue-600 via-blue-500 to-indigo-600 text-white font-semibold text-xs tracking-wider uppercase shadow-[0_0_25px_rgba(0,102,255,0.35)] hover:shadow-[0_0_35px_rgba(0,102,255,0.6)] transition-all cursor-pointer"
              >
                <span>{ctaText || "Bu Teminat İçin Teklif Al"}</span>
                <ArrowRight className="w-4 h-4 group-hover:translate-x-1 transition-transform" />
              </button>

              <span className="text-xs font-mono text-silver-500">
                20+ Şirket Karşılaştırmalı
              </span>
            </div>
          </div>

          {/* CINEMATIC MEDIA COLUMN */}
          <div
            className={cn(
              "lg:col-span-6 relative",
              isTextLeft ? "lg:order-2" : "lg:col-start-1 lg:order-1"
            )}
          >
            <div className="relative w-full aspect-[16/10] sm:aspect-[16/9] rounded-3xl overflow-hidden bg-navy-900/60 border border-white/[0.08] shadow-[0_20px_60px_rgba(0,0,0,0.8)] group">
              {videoSrc ? (
                /* VIDEO RENDER WITH ORGANIC EDGE BLENDING */
                <div className="relative w-full h-full overflow-hidden">
                  <video
                    ref={videoRef}
                    src={videoSrc}
                    muted
                    autoPlay
                    playsInline
                    preload="auto"
                    className="w-full h-full object-cover object-center scale-[1.03] transition-transform duration-1000 ease-out group-hover:scale-105"
                  />

                  {/* VIGNETTE & BLENDING MASKS (Video edges seamlessly melt into background) */}
                  <div className="absolute inset-0 bg-gradient-to-t from-background via-transparent to-background/50 pointer-events-none" />
                  <div className="absolute inset-0 bg-gradient-to-r from-background/60 via-transparent to-background/60 pointer-events-none" />
                  <div className="absolute inset-0 bg-[radial-gradient(ellipse_at_center,transparent_45%,#030712_90%)] pointer-events-none" />

                  {/* TOP TELEMETRY PILL */}
                  <div className="absolute top-4 left-4 right-4 flex items-center justify-between pointer-events-none z-10">
                    <div className="flex items-center gap-2 px-3 py-1 rounded-full bg-black/50 backdrop-blur-md border border-white/10 text-[10px] font-mono text-silver-300">
                      <span className="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse" />
                      <span>SİNEMATİK VİTRİN • {order}</span>
                    </div>

                    <span className="text-[10px] font-mono text-electric-light px-2.5 py-0.5 rounded-full bg-black/40 border border-white/10">
                      HD 60FPS
                    </span>
                  </div>
                </div>
              ) : (
                /* ARCHITECTURAL PREPARED FRAMEWORK (FOR KONUT-HOME.MP4 & OTHER UPCOMING SCENES) */
                <div className="relative w-full h-full flex flex-col justify-between p-8 bg-gradient-to-br from-white/[0.04] via-navy-950/80 to-black">
                  {/* Subtle decorative grid */}
                  <div className="absolute inset-0 bg-[linear-gradient(to_right,#ffffff08_1px,transparent_1px),linear-gradient(to_bottom,#ffffff08_1px,transparent_1px)] bg-[size:28px_28px] opacity-40 pointer-events-none" />

                  {/* Top Bar */}
                  <div className="relative z-10 flex items-center justify-between">
                    <div className="flex items-center gap-2 px-3 py-1 rounded-full bg-white/[0.05] border border-white/10 text-xs font-mono text-silver-400">
                      <Video className="w-3.5 h-3.5 text-accent-violet" />
                      <span>{order} • SİNEMATİK SAHNE MİMARİSİ</span>
                    </div>
                    <span className="text-xs font-mono text-silver-500">
                      ÖZEL TEMİNAT
                    </span>
                  </div>

                  {/* Center Emblem / Notice */}
                  <div className="relative z-10 my-auto text-center flex flex-col items-center">
                    <div className="w-16 h-16 rounded-2xl bg-white/[0.04] border border-white/15 flex items-center justify-center text-electric-light mb-4 shadow-[0_0_30px_rgba(0,102,255,0.2)]">
                      {icon || <Shield className="w-8 h-8 stroke-[1.5]" />}
                    </div>
                    <span className="font-mono text-xs text-electric-light uppercase tracking-widest mb-1.5">
                      {eyebrow}
                    </span>
                    <h4 className="font-serif text-xl sm:text-2xl text-white font-medium mb-2">
                      {title}
                    </h4>
                    <p className="text-xs sm:text-sm text-silver-400 max-w-sm font-sans">
                      {pendingVideoNotice ||
                        "Bu teminat için sinematik video sahnesi altyapısı hazırlandı. Çok yakında yayında."}
                    </p>
                  </div>

                  {/* Bottom Bar */}
                  <div className="relative z-10 pt-4 border-t border-white/[0.06] flex items-center justify-between text-[11px] font-mono text-silver-500">
                    <div className="flex items-center gap-2">
                      <Layers className="w-3.5 h-3.5 text-electric-light" />
                      <span>Genişletilmiş Koruma Paketi</span>
                    </div>
                    <span>SEDDK Yetkili Acente</span>
                  </div>
                </div>
              )}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
