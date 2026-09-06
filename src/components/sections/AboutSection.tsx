"use client";

import React from "react";
import { motion } from "framer-motion";
import { Shield, Award, CheckCircle, FileCheck } from "lucide-react";
import { siteConfig } from "@/data/siteData";

export default function AboutSection() {
  return (
    <section
      id="hakkimizda"
      className="relative w-full py-28 px-6 sm:px-10 lg:px-16 bg-navy-950 text-white overflow-hidden border-t border-white/[0.06]"
    >
      <div className="max-w-5xl mx-auto relative z-10 text-center">
        {/* BADGE */}
        <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/[0.04] border border-white/[0.08] text-xs font-mono uppercase tracking-[0.2em] text-silver-300 mb-8">
          <Shield className="w-3.5 h-3.5 text-electric-light" />
          <span>Biz Kimiz?</span>
        </div>

        {/* PROMINENT EDITORIAL MANIFESTO */}
        <motion.blockquote
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
          className="font-serif text-2xl sm:text-4xl lg:text-5xl font-normal leading-[1.35] text-white text-balance mb-12"
        >
          “Sigortayı karmaşık maddelerden ibaret görmüyoruz. Görevimiz,
          ihtiyacınızı anlamak, doğru teminatı bulmak ve ihtiyaç duyduğunuz
          anda yanınızda olmak.”
        </motion.blockquote>

        {/* SUBTEXT EXPLANATION */}
        <p className="text-silver-400 text-sm sm:text-base font-sans max-w-2xl mx-auto leading-relaxed mb-12">
          {siteConfig.name}, tek bir sigorta markasına bağımlı olmadan çalışan,
          tüm sürecini şeffaflık ve dijital hız ilkeleriyle yöneten bağımsız bir
          sigorta acentesidir. Risklerinizi analiz eder, poliçenizi optimize ederiz.
        </p>

        {/* GUIDING PRINCIPLES */}
        <div className="pt-8 border-t border-white/[0.08] flex flex-wrap items-center justify-center gap-8 sm:gap-14 text-silver-400 font-mono text-xs">
          <div className="flex items-center gap-2">
            <Award className="w-4 h-4 text-electric-light" />
            <span>Birden Fazla Şirketten Teklif</span>
          </div>

          <div className="flex items-center gap-2">
            <FileCheck className="w-4 h-4 text-accent-violet" />
            <span>İhtiyacınıza Uygun Teminat Seçenekleri</span>
          </div>

          <div className="flex items-center gap-2">
            <CheckCircle className="w-4 h-4 text-emerald-400" />
            <span>Poliçe Sürecinde Destek</span>
          </div>
        </div>
      </div>
    </section>
  );
}
