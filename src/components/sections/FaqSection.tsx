"use client";

import React, { useState } from "react";
import { motion, AnimatePresence } from "framer-motion";
import { Plus, Minus, HelpCircle, ArrowUpRight } from "lucide-react";
import WhatsAppIcon from "@/components/icons/WhatsAppIcon";
import { faqItems, siteConfig } from "@/data/siteData";

export default function FaqSection() {
  const [openIndex, setOpenIndex] = useState<number | null>(0);

  const toggleAccordion = (index: number) => {
    setOpenIndex(openIndex === index ? null : index);
  };

  return (
    <section
      id="sss"
      className="relative w-full py-28 px-6 sm:px-10 lg:px-16 bg-background text-white overflow-hidden border-t border-white/[0.06]"
    >
      <div className="max-w-4xl mx-auto relative z-10">
        {/* HEADER */}
        <div className="text-center mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/[0.04] border border-white/[0.08] text-xs font-mono uppercase tracking-[0.2em] text-silver-300 mb-5">
            <HelpCircle className="w-3.5 h-3.5 text-electric-light" />
            <span>Merak Edilenler</span>
          </div>

          <h2 className="font-serif text-3xl sm:text-5xl font-medium text-white mb-4">
            Sıkça Sorulan Sorular
          </h2>

          <p className="text-silver-400 text-base max-w-xl mx-auto font-sans">
            Sigorta poliçeleri, teminat kapsamları ve hasar süreçleri hakkında en
            çok merak edilen soruların yanıtları.
          </p>
        </div>

        {/* ACCORDION LIST */}
        <div className="space-y-4">
          {faqItems.map((item, idx) => {
            const isOpen = openIndex === idx;
            return (
              <div
                key={idx}
                className={`rounded-2xl border transition-all duration-300 overflow-hidden ${
                  isOpen
                    ? "bg-white/[0.04] border-white/20 shadow-[0_10px_30px_rgba(0,0,0,0.4)]"
                    : "bg-white/[0.015] border-white/[0.07] hover:border-white/15"
                }`}
              >
                <button
                  onClick={() => toggleAccordion(idx)}
                  className="w-full p-6 text-left flex items-center justify-between gap-4 cursor-pointer select-none"
                  aria-expanded={isOpen}
                >
                  <div className="flex items-center gap-4">
                    <span className="font-mono text-xs text-electric-light font-medium">
                      0{idx + 1}
                    </span>
                    <span className="font-serif text-lg sm:text-xl text-white font-medium">
                      {item.question}
                    </span>
                  </div>

                  <div
                    className={`w-8 h-8 rounded-full border border-white/15 flex items-center justify-center shrink-0 transition-colors ${
                      isOpen
                        ? "bg-electric text-white border-electric"
                        : "bg-white/[0.03] text-silver-400"
                    }`}
                  >
                    {isOpen ? <Minus className="w-4 h-4" /> : <Plus className="w-4 h-4" />}
                  </div>
                </button>

                <AnimatePresence initial={false}>
                  {isOpen && (
                    <motion.div
                      initial={{ height: 0, opacity: 0 }}
                      animate={{ height: "auto", opacity: 1 }}
                      exit={{ height: 0, opacity: 0 }}
                      transition={{ duration: 0.3, ease: "easeInOut" }}
                    >
                      <div className="px-6 pb-6 pt-1 text-silver-400 font-sans text-sm sm:text-base leading-relaxed border-t border-white/[0.04]">
                        <p>{item.answer}</p>
                        <div className="mt-3 flex items-center gap-2 text-xs font-mono text-silver-500">
                          <span>Kategori:</span>
                          <span className="text-silver-300">{item.category}</span>
                        </div>
                      </div>
                    </motion.div>
                  )}
                </AnimatePresence>
              </div>
            );
          })}
        </div>

        {/* EXTRA QUESTION FOOTER */}
        <div className="mt-12 text-center p-6 rounded-2xl bg-white/[0.02] border border-white/[0.06] flex flex-col sm:flex-row items-center justify-between gap-4">
          <span className="text-sm text-silver-400">
            Aklınıza takılan farklı bir durum mu var?
          </span>
          <a
            href={`https://wa.me/${siteConfig.whatsappRaw}?text=Sigorta%20poliçem%20hakkında%20özel%20bir%20sorum%20var.`}
            target="_blank"
            rel="noopener noreferrer"
            aria-label="WhatsApp'tan Danışın"
            className="inline-flex items-center gap-2 text-xs font-mono uppercase tracking-wider text-emerald-400 hover:text-emerald-300 transition-colors"
          >
            <WhatsAppIcon className="w-4 h-4 text-emerald-400" />
            <span>Danışmanımıza WhatsApp'tan Danışın</span>
            <ArrowUpRight className="w-4 h-4 text-silver-400" />
          </a>
        </div>
      </div>
    </section>
  );
}
