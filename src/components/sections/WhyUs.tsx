"use client";

import React from "react";
import { motion } from "framer-motion";
import { whyUsAdvantages, metricsData } from "@/data/siteData";
import { Layers, Sliders, LifeBuoy, UserCheck, ShieldCheck } from "lucide-react";

const advantageIcons = [
  <Layers key="1" className="w-5 h-5 text-electric-light" />,
  <Sliders key="2" className="w-5 h-5 text-accent-violet" />,
  <LifeBuoy key="3" className="w-5 h-5 text-emerald-400" />,
  <UserCheck key="4" className="w-5 h-5 text-amber-400" />,
];

export default function WhyUs() {
  return (
    <section
      id="neden-biz"
      className="relative w-full py-28 px-6 sm:px-10 lg:px-16 bg-navy-950 text-white overflow-hidden border-t border-white/[0.06]"
    >
      {/* SUBTLE BACKGROUND AMBIENT GRADIENTS */}
      <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[500px] bg-electric/5 rounded-full blur-[160px] pointer-events-none" />

      <div className="max-w-7xl mx-auto relative z-10">
        {/* HEADER */}
        <div className="max-w-3xl mb-20">
          <div className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/[0.04] border border-white/[0.08] text-xs font-mono uppercase tracking-[0.2em] text-silver-300 mb-6">
            <ShieldCheck className="w-3.5 h-3.5 text-electric-light" />
            <span>Felsefemiz & Yaklaşımımız</span>
          </div>

          <h2 className="font-serif text-3xl sm:text-5xl lg:text-6xl font-medium leading-[1.15] text-white">
            Poliçe satmıyoruz.{" "}
            <span className="block italic font-light bg-gradient-to-r from-silver-100 via-silver-300 to-electric-light bg-clip-text text-transparent">
              Doğru teminatı buluyoruz.
            </span>
          </h2>

          <p className="mt-6 text-silver-400 text-base sm:text-lg font-sans leading-relaxed">
            Klasik acentelerin komisyon odaklı ezberlerinden ayrılıyoruz. Sizin risk haritanızı çıkarıyor, 
            20'yi aşkın sigorta şirketinin tekliflerini inceleyerek gerçekten ihtiyaç duyduğunuz korumayı inşa ediyoruz.
          </p>
        </div>

        {/* 4 ADVANTAGES GRID */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-20">
          {whyUsAdvantages.map((adv, idx) => (
            <motion.div
              key={adv.id}
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.5, delay: idx * 0.1 }}
              className="group relative p-8 sm:p-10 rounded-3xl bg-white/[0.02] hover:bg-white/[0.04] border border-white/[0.07] hover:border-white/20 transition-all duration-300 backdrop-blur-sm"
            >
              {/* CORNER NUMBER */}
              <div className="flex items-center justify-between mb-8">
                <div className="w-12 h-12 rounded-2xl bg-white/[0.04] border border-white/10 flex items-center justify-center group-hover:scale-110 group-hover:border-electric/40 transition-all duration-300">
                  {advantageIcons[idx]}
                </div>
                <span className="font-mono text-sm tracking-widest text-silver-500 group-hover:text-electric-light transition-colors">
                  {adv.number}
                </span>
              </div>

              <span className="text-[11px] font-mono uppercase tracking-[0.2em] text-silver-400 mb-2 block">
                {adv.tag}
              </span>

              <h3 className="font-serif text-2xl sm:text-3xl text-white font-medium mb-3 group-hover:text-electric-light transition-colors">
                {adv.title}
              </h3>

              <p className="text-silver-400 text-sm sm:text-base font-sans leading-relaxed">
                {adv.description}
              </p>

              {/* BOTTOM GLOW LINE ON HOVER */}
              <div className="absolute bottom-0 left-8 right-8 h-px bg-gradient-to-r from-transparent via-electric-light/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500" />
            </motion.div>
          ))}
        </div>

        {/* STATS / TRUST METRICS BANNER */}
        <div className="grid grid-cols-2 lg:grid-cols-4 gap-6 p-8 sm:p-10 rounded-3xl bg-gradient-to-b from-white/[0.04] to-white/[0.01] border border-white/10 backdrop-blur-xl">
          {metricsData.map((metric, idx) => (
            <motion.div
              key={idx}
              initial={{ opacity: 0, scale: 0.95 }}
              whileInView={{ opacity: 1, scale: 1 }}
              viewport={{ once: true }}
              transition={{ duration: 0.4, delay: idx * 0.1 }}
              className="flex flex-col"
            >
              <span className="font-serif text-3xl sm:text-4xl lg:text-5xl font-semibold text-white tracking-tight mb-2 bg-gradient-to-r from-white to-silver-300 bg-clip-text text-transparent">
                {metric.value}
              </span>
              <span className="text-sm font-medium text-silver-200">
                {metric.label}
              </span>
              <span className="text-xs text-silver-500 mt-1">
                {metric.sublabel}
              </span>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
