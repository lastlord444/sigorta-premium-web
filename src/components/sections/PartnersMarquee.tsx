"use client";

import React from "react";
import { partnerCompanies } from "@/data/siteData";
import { Building } from "lucide-react";

export default function PartnersMarquee() {
  // Duplicate for infinite marquee loop
  const duplicatedPartners = [...partnerCompanies, ...partnerCompanies];

  return (
    <section
      id="sirketler"
      className="relative w-full py-16 bg-navy-950/80 border-y border-white/[0.06] overflow-hidden"
    >
      <div className="max-w-7xl mx-auto px-6 mb-8 text-center">
        <p className="text-[11px] font-mono tracking-[0.25em] uppercase text-silver-400">
          Anlaşmalı Yetkili Sigorta Şirketleri
        </p>
        <p className="text-xs text-silver-500 mt-1">
          20+ Lider şirketin kurumsal güvencesi tek çatı altında
        </p>
      </div>

      {/* MARQUEE TRACK WITH GRADIENT MASKS */}
      <div className="relative w-full overflow-hidden flex items-center">
        {/* Left & Right gradient masks */}
        <div className="absolute left-0 top-0 bottom-0 w-24 sm:w-40 bg-gradient-to-r from-navy-950 to-transparent z-10 pointer-events-none" />
        <div className="absolute right-0 top-0 bottom-0 w-24 sm:w-40 bg-gradient-to-l from-navy-950 to-transparent z-10 pointer-events-none" />

        <div className="flex animate-marquee hover:[animation-play-state:paused] whitespace-nowrap gap-6 sm:gap-8 select-none py-2">
          {duplicatedPartners.map((company, index) => (
            <div
              key={`${company.id}-${index}`}
              className="inline-flex items-center gap-3 px-6 py-3 rounded-2xl bg-white/[0.02] hover:bg-white/[0.06] border border-white/[0.07] hover:border-white/20 transition-all duration-300 group cursor-default"
            >
              <div className="w-8 h-8 rounded-lg bg-white/[0.04] border border-white/10 flex items-center justify-center text-silver-400 group-hover:text-electric-light transition-colors">
                <Building className="w-4 h-4 stroke-[1.75]" />
              </div>
              <div className="flex flex-col text-left">
                <span className="font-serif text-sm tracking-wider text-silver-200 group-hover:text-white font-medium transition-colors">
                  {company.name}
                </span>
                <span className="text-[10px] font-mono tracking-wider text-silver-500 uppercase">
                  {company.category}
                </span>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
