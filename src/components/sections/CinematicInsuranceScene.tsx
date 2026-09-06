"use client";

import React, { useRef, useEffect } from "react";
import {
  CheckCircle2,
  ArrowRight,
  Shield
} from "lucide-react";
import { cn } from "@/lib/utils";

export interface CinematicInsuranceSceneProps {
  id: string;
  order: string;
  eyebrow: string;
  title: string;
  description: string;
  videoSrc?: string;
  poster?: string;
  alignment?: "left" | "right";
  badge?: string;
  highlights?: string[];
  ctaText?: string;
  onQuoteClick?: () => void;
  icon?: React.ReactNode;
}

export default function CinematicInsuranceScene({
  id,
  order,
  eyebrow,
  title,
  description,
  videoSrc,
  poster,
  alignment = "right",
  badge,
  highlights = [],
  ctaText,
  onQuoteClick,
  icon,
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
      className="relative w-full py-20 lg:py-28 px-6 sm:px-10 lg:px-16 overflow-hidden border-b border-white/[0.04]"
    >
      {/* AMBIENT SOFT ATMOSPHERIC GLOW */}
      <div
        className={cn(
          "absolute top-1/2 -translate-y-1/2 w-[600px] h-[600px] rounded-full blur-[180px] pointer-events-none opacity-25 -z-10",
          isTextLeft ? "right-[-10%] bg-electric/20" : "left-[-10%] bg-accent-violet/15"
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
            {/* EYEBROW & BADGE */}
            <div className="flex items-center gap-4 mb-4">
              <span className="font-mono text-xs tracking-[0.25em] text-electric-light uppercase font-semibold">
                {eyebrow}
              </span>
              {badge && (
                <>
                  <div className="h-3 w-px bg-white/20" />
                  <span className="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full bg-white/[0.04] border border-white/10 text-xs font-mono uppercase tracking-wider text-silver-300">
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
                    className="flex items-start gap-2.5 p-3.5 rounded-2xl bg-white/[0.02] border border-white/[0.05] backdrop-blur-sm"
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
                className="group inline-flex items-center gap-3 px-8 py-4 rounded-xl bg-gradient-to-r from-blue-600 via-blue-500 to-indigo-600 text-white font-semibold text-xs tracking-wider uppercase shadow-[0_0_25px_rgba(0,102,255,0.3)] hover:shadow-[0_0_35px_rgba(0,102,255,0.5)] transition-all cursor-pointer"
              >
                <span>{ctaText || "Bu Teminat İçin Teklif Al"}</span>
                <ArrowRight className="w-4 h-4 group-hover:translate-x-1 transition-transform" />
              </button>

              <span className="text-xs font-mono text-silver-500">
                Birden fazla şirketten teklif
              </span>
            </div>
          </div>

          {/* CINEMATIC MEDIA COLUMN */}
          <div
            className={cn(
              "lg:col-span-6 relative flex items-center justify-center",
              isTextLeft ? "lg:order-2" : "lg:col-start-1 lg:order-1"
            )}
          >
            {videoSrc ? (
              /* FULL-BLEED SEAMLESS CINEMATIC VIDEO (NO UI CARD, NO BORDERS, NO SHADOWS) */
              <div className="relative w-full aspect-[16/10] sm:aspect-[16/9] overflow-hidden">
                <video
                  ref={videoRef}
                  src={videoSrc}
                  poster={poster}
                  muted
                  autoPlay
                  playsInline
                  preload="metadata"
                  className="w-full h-full object-cover object-center scale-[1.02] filter brightness-[0.92] contrast-[1.05]"
                />

                {/* ORGANIC MULTI-LAYER BLEND MASKS (Dissolves video edges seamlessly into dark background) */}
                <div className="absolute inset-x-0 top-0 h-24 bg-gradient-to-b from-[#030712] via-[#030712]/60 to-transparent pointer-events-none" />
                <div className="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-[#030712] via-[#030712]/60 to-transparent pointer-events-none" />
                <div className="absolute inset-y-0 left-0 w-24 bg-gradient-to-r from-[#030712] via-[#030712]/60 to-transparent pointer-events-none" />
                <div className="absolute inset-y-0 right-0 w-24 bg-gradient-to-l from-[#030712] via-[#030712]/60 to-transparent pointer-events-none" />
                <div className="absolute inset-0 bg-[radial-gradient(ellipse_at_center,transparent_45%,#030712_92%)] pointer-events-none" />
              </div>
            ) : (
              /* CLEAN EDITORIAL ATMOSPHERE FOR PRODUCTS WITHOUT VIDEO (NO TECHNICAL / DEV PLACEHOLDERS) */
              <div className="relative w-full aspect-[16/10] sm:aspect-[16/9] rounded-2xl bg-gradient-to-br from-white/[0.02] to-transparent p-8 flex flex-col justify-between overflow-hidden border border-white/[0.04]">
                {/* Soft ambient background glow */}
                <div className="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(0,102,255,0.08),transparent_60%)] pointer-events-none" />
                <div className="absolute -bottom-10 -left-10 w-48 h-48 bg-accent-violet/10 rounded-full blur-3xl pointer-events-none" />

                {/* Top minimalist indicator */}
                <div className="relative z-10 flex items-center justify-between text-xs font-mono text-silver-500">
                  <span className="tracking-[0.2em] uppercase">{eyebrow}</span>
                  <span className="text-silver-400">Teminat Paketi</span>
                </div>

                {/* Center subtle icon & thematic typography */}
                <div className="relative z-10 my-auto text-center flex flex-col items-center py-6">
                  <div className="w-16 h-16 rounded-2xl bg-white/[0.03] border border-white/[0.08] flex items-center justify-center text-electric-light mb-4 shadow-[0_0_25px_rgba(0,102,255,0.15)]">
                    {icon || <Shield className="w-7 h-7 stroke-[1.5]" />}
                  </div>
                  <h4 className="font-serif text-2xl sm:text-3xl text-white font-medium mb-2 tracking-tight">
                    {badge || title}
                  </h4>
                  <p className="text-xs sm:text-sm text-silver-400 max-w-sm font-sans leading-relaxed">
                    İhtiyacınıza uygun teminat seçenekleriyle güvence altındasınız.
                  </p>
                </div>

                {/* Bottom subtle detail */}
                <div className="relative z-10 pt-4 border-t border-white/[0.04] flex items-center justify-between text-[11px] font-mono text-silver-500">
                  <span>Özelleştirilmiş Koruma</span>
                  <span>{order}</span>
                </div>
              </div>
            )}
          </div>
        </div>
      </div>
    </div>
  );
}
