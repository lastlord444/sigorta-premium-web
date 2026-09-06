"use client";

import React, { useState } from "react";
import { motion, AnimatePresence } from "framer-motion";
import {
  PhoneCall,
  MessageSquare,
  AlertTriangle,
  FileText,
  Truck,
  CheckCircle2,
  X,
  Send,
  ShieldAlert
} from "lucide-react";
import { siteConfig } from "@/data/siteData";

export default function ClaimSupport() {
  const [modalOpen, setModalOpen] = useState(false);
  const [claimSubmitted, setClaimSubmitted] = useState(false);
  const [claimName, setClaimName] = useState("");
  const [claimPhone, setClaimPhone] = useState("");
  const [claimType, setClaimType] = useState("kasko");
  const [claimNote, setClaimNote] = useState("");

  const handleClaimSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (!claimName || !claimPhone) return;
    setClaimSubmitted(true);
  };

  const closeModal = () => {
    setModalOpen(false);
    setClaimSubmitted(false);
    setClaimName("");
    setClaimPhone("");
    setClaimNote("");
  };

  const claimSteps = [
    {
      step: "01",
      title: "Güvenliği Sağlayın & Fotoğraflayın",
      desc: "Öncelikle can güvenliğinizi sağlayın. Kaza alanını hareket ettirmeden geniş açılı fotoğraflarını çekin ve Kaza Tespit Tutanağı'nı doldurun.",
      icon: FileText,
    },
    {
      step: "02",
      title: "7/24 Masamızı Arayın",
      desc: "Hasar destek hattımızı veya WhatsApp hattımızı arayarak acente danışmanınıza bilgi verin. Size en yakın yetkili servisi ve ücretsiz çekiciyi yönlendirelim.",
      icon: PhoneCall,
    },
    {
      step: "03",
      title: "Dosya ve Onarım Takibi",
      desc: "Eksper atanması, dosya açılışı, ikame araç temini ve sigorta şirketi onay sürecini baştan sona acenteniz olarak bizzat takip edelim.",
      icon: Truck,
    },
  ];

  return (
    <section
      id="hasar-destek"
      className="relative w-full py-28 px-6 sm:px-10 lg:px-16 bg-navy-950 text-white overflow-hidden border-t border-white/[0.06]"
    >
      {/* AMBIENT ALERT GLOW */}
      <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[500px] bg-blue-600/5 rounded-full blur-[170px] pointer-events-none" />

      <div className="max-w-7xl mx-auto relative z-10">
        {/* HEADER */}
        <div className="text-center max-w-3xl mx-auto mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-rose-500/10 border border-rose-500/30 text-xs font-mono uppercase tracking-[0.2em] text-rose-300 mb-5">
            <AlertTriangle className="w-3.5 h-3.5 text-rose-400" />
            <span>7/24 Acil Müdahale & Dosya Takibi</span>
          </div>

          <h2 className="font-serif text-3xl sm:text-5xl lg:text-6xl font-medium text-white mb-6">
            Hasar olduğunda yalnız değilsiniz.
          </h2>

          <p className="text-silver-400 text-base sm:text-lg font-sans leading-relaxed">
            Poliçe yaptırmanın asıl sebebi hasar günüdür. Kaza, yangın, su baskını
            veya sağlık acilinde robotlara değil, dosyanızı sahiplenen gerçek uzmanınıza
            ulaşırsınız.
          </p>

          <div className="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
            <button
              onClick={() => setModalOpen(true)}
              className="w-full sm:w-auto px-8 py-4 rounded-xl bg-gradient-to-r from-rose-600 to-red-700 hover:from-rose-500 hover:to-red-600 text-white font-semibold text-xs uppercase tracking-wider shadow-[0_0_30px_rgba(225,29,72,0.4)] transition-all cursor-pointer flex items-center justify-center gap-2"
            >
              <ShieldAlert className="w-4 h-4" />
              <span>Acil Hasar Bildir</span>
            </button>

            <a
              href={`tel:${siteConfig.phoneRaw}`}
              className="w-full sm:w-auto px-8 py-4 rounded-xl bg-white/[0.05] hover:bg-white/[0.1] border border-white/10 text-silver-100 font-medium text-xs uppercase tracking-wider transition-colors flex items-center justify-center gap-2"
            >
              <PhoneCall className="w-4 h-4 text-emerald-400" />
              <span>7/24 Hasar Hattı: {siteConfig.phone}</span>
            </a>
          </div>
        </div>

        {/* 3 STEPS GRID */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
          {claimSteps.map((step, idx) => {
            const Icon = step.icon;
            return (
              <div
                key={idx}
                className="p-8 rounded-3xl bg-white/[0.02] border border-white/[0.07] backdrop-blur-sm flex flex-col justify-between"
              >
                <div>
                  <div className="flex items-center justify-between mb-6">
                    <div className="w-12 h-12 rounded-2xl bg-white/[0.04] border border-white/10 flex items-center justify-center text-electric-light">
                      <Icon className="w-5 h-5" />
                    </div>
                    <span className="font-mono text-xs font-semibold text-silver-500 tracking-widest">
                      ADIM {step.step}
                    </span>
                  </div>
                  <h3 className="font-serif text-xl text-white font-medium mb-3">
                    {step.title}
                  </h3>
                  <p className="text-silver-400 text-sm font-sans leading-relaxed">
                    {step.desc}
                  </p>
                </div>
              </div>
            );
          })}
        </div>

        {/* FAST CONTACT BANNER */}
        <div className="rounded-3xl bg-gradient-to-r from-blue-950/40 via-navy-900/60 to-indigo-950/40 border border-white/10 p-8 sm:p-10 flex flex-col lg:flex-row items-center justify-between gap-6">
          <div className="flex flex-col text-center lg:text-left">
            <span className="text-xs font-mono tracking-widest text-electric-light uppercase mb-1">
              ÖNCELİKLİ WHATSAPP DESTEK HATTI
            </span>
            <h4 className="font-serif text-2xl text-white font-medium">
              Kaza tutanağı veya hasar fotoğraflarını anında iletin.
            </h4>
            <p className="text-sm text-silver-400 mt-1">
              Dosyanız anında ilgili sigorta şirketi eksperine yönlendirilir.
            </p>
          </div>

          <a
            href={`https://wa.me/${siteConfig.whatsappRaw}?text=Acil%20hasar%20bildirimi%20yapmak%20istiyorum.`}
            target="_blank"
            rel="noopener noreferrer"
            className="px-8 py-4 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-xs uppercase tracking-wider shadow-[0_0_20px_rgba(16,185,129,0.4)] transition-colors flex items-center gap-2 shrink-0 cursor-pointer"
          >
            <MessageSquare className="w-4 h-4" />
            <span>WhatsApp ile Fotoğraf Gönder</span>
          </a>
        </div>
      </div>

      {/* HASAR BİLDİR POPUP MODAL */}
      <AnimatePresence>
        {modalOpen && (
          <div className="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-md">
            <motion.div
              initial={{ opacity: 0, scale: 0.95 }}
              animate={{ opacity: 1, scale: 1 }}
              exit={{ opacity: 0, scale: 0.95 }}
              className="relative w-full max-w-lg rounded-3xl bg-navy-950 border border-white/15 p-6 sm:p-8 shadow-2xl"
            >
              <button
                onClick={closeModal}
                className="absolute top-5 right-5 p-2 rounded-full bg-white/5 text-silver-400 hover:text-white"
              >
                <X className="w-5 h-5" />
              </button>

              {!claimSubmitted ? (
                <form onSubmit={handleClaimSubmit} className="space-y-4">
                  <div className="flex items-center gap-2 text-rose-400 mb-2">
                    <ShieldAlert className="w-5 h-5" />
                    <span className="font-mono text-xs uppercase tracking-wider">
                      Acil Hasar Dosyası Başlat
                    </span>
                  </div>

                  <h3 className="font-serif text-2xl text-white font-medium">
                    Hasar Bildirimi
                  </h3>

                  <p className="text-xs text-silver-400 font-sans">
                    Bilgilerinizi bırakın, hasar operasyon masamız 5 dakika içinde
                    sizi arayıp süreci yönlendirsin.
                  </p>

                  <div>
                    <label className="block text-xs font-mono text-silver-300 mb-1">
                      Adınız Soyadınız *
                    </label>
                    <input
                      required
                      type="text"
                      value={claimName}
                      onChange={(e) => setClaimName(e.target.value)}
                      placeholder="Ad Soyad"
                      className="w-full px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-white text-sm focus:ring-2 focus:ring-rose-500 focus:outline-none"
                    />
                  </div>

                  <div>
                    <label className="block text-xs font-mono text-silver-300 mb-1">
                      Telefon Numaranız *
                    </label>
                    <input
                      required
                      type="tel"
                      value={claimPhone}
                      onChange={(e) => setClaimPhone(e.target.value)}
                      placeholder="05XX XXX XX XX"
                      className="w-full px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-white text-sm focus:ring-2 focus:ring-rose-500 focus:outline-none"
                    />
                  </div>

                  <div>
                    <label className="block text-xs font-mono text-silver-300 mb-1">
                      Hasar Türü
                    </label>
                    <select
                      value={claimType}
                      onChange={(e) => setClaimType(e.target.value)}
                      className="w-full px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-white text-sm focus:ring-2 focus:ring-rose-500 focus:outline-none"
                    >
                      <option value="kasko" className="bg-navy-950">
                        Kasko / Trafik Kazası
                      </option>
                      <option value="konut" className="bg-navy-950">
                        Konut / Yangın / Su Baskını
                      </option>
                      <option value="saglik" className="bg-navy-950">
                        Sağlık Acil Durumu
                      </option>
                      <option value="isyeri" className="bg-navy-950">
                        İşyeri Hasarı
                      </option>
                      <option value="diger" className="bg-navy-950">
                        Diğer
                      </option>
                    </select>
                  </div>

                  <div>
                    <label className="block text-xs font-mono text-silver-300 mb-1">
                      Kısa Durum Notu (Opsiyonel)
                    </label>
                    <textarea
                      rows={2}
                      value={claimNote}
                      onChange={(e) => setClaimNote(e.target.value)}
                      placeholder="Kaza yeri, çekici ihtiyacı veya özet durum..."
                      className="w-full px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-white text-sm focus:ring-2 focus:ring-rose-500 focus:outline-none"
                    />
                  </div>

                  <button
                    type="submit"
                    className="w-full py-3.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-semibold text-xs uppercase tracking-wider transition-colors flex items-center justify-center gap-2"
                  >
                    <Send className="w-4 h-4" />
                    <span>Hasar Masasını Uyar</span>
                  </button>
                </form>
              ) : (
                <div className="py-8 text-center flex flex-col items-center">
                  <div className="w-16 h-16 rounded-full bg-emerald-500/20 border border-emerald-400/30 flex items-center justify-center text-emerald-400 mb-4">
                    <CheckCircle2 className="w-8 h-8" />
                  </div>
                  <h4 className="font-serif text-2xl text-white font-medium mb-2">
                    Hasar Çağrısı Alındı
                  </h4>
                  <p className="text-sm text-silver-300 font-sans mb-6">
                    Hasar uzmanımız {claimPhone} numaranız üzerinden birkaç dakika
                    içinde sizinle temas kuracaktır. Geçmiş olsun.
                  </p>
                  <button
                    onClick={closeModal}
                    className="px-6 py-2.5 rounded-xl bg-white/10 text-white text-xs uppercase font-mono tracking-wider hover:bg-white/15"
                  >
                    Kapat
                  </button>
                </div>
              )}
            </motion.div>
          </div>
        )}
      </AnimatePresence>
    </section>
  );
}
