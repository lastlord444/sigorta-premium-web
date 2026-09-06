"use client";

import React, { useState, useEffect } from "react";
import { motion, AnimatePresence } from "framer-motion";
import confetti from "canvas-confetti";
import {
  Car,
  ShieldAlert,
  HeartPulse,
  Home,
  Building2,
  Briefcase,
  Sparkles,
  ArrowRight,
  CheckCircle2,
  AlertCircle,
  Clock,
  MessageSquare,
  RefreshCw,
  Lock
} from "lucide-react";
import { siteConfig } from "@/data/siteData";

interface FormErrors {
  fullName?: string;
  phone?: string;
  email?: string;
  extraField?: string;
  kvkk?: string;
}

interface ProposalProps {
  initialProduct?: string;
}

export default function ProposalSection({ initialProduct = "kasko" }: ProposalProps) {
  const [selectedType, setSelectedType] = useState(initialProduct);
  const [fullName, setFullName] = useState("");
  const [phone, setPhone] = useState("");
  const [email, setEmail] = useState("");
  const [extraField, setExtraField] = useState("");
  const [kvkkAccepted, setKvkkAccepted] = useState(false);
  const [errors, setErrors] = useState<FormErrors>({});
  const [isSubmitting, setIsSubmitting] = useState(false);
  const [isSuccess, setIsSuccess] = useState(false);
  const [refCode, setRefCode] = useState("");

  // Sync with initialProduct prop if provided externally
  useEffect(() => {
    if (initialProduct) {
      setSelectedType(initialProduct);
    }
  }, [initialProduct]);

  const insuranceTypes = [
    { id: "kasko", name: "Kasko", icon: Car, tag: "Tam Güvence" },
    { id: "trafik", name: "Trafik", icon: ShieldAlert, tag: "Zorunlu Mali" },
    { id: "saglik", name: "Sağlık", icon: HeartPulse, tag: "Özel & TSS" },
    { id: "konut", name: "Konut", icon: Home, tag: "Bina & Eşya" },
    { id: "dask", name: "DASK", icon: Building2, tag: "Zorunlu Deprem" },
    { id: "isyeri", name: "İşyeri", icon: Briefcase, tag: "Kurumsal Koruma" },
    { id: "diger", name: "Diğer", icon: Sparkles, tag: "Özel Branşlar" },
  ];

  const getExtraFieldConfig = () => {
    switch (selectedType) {
      case "kasko":
      case "trafik":
        return {
          label: "Araç Plakası",
          placeholder: "Örn: 34 ABC 1234",
          helper: "Aracınızın ruhsatındaki plaka no",
        };
      case "saglik":
        return {
          label: "Doğum Yılı ve Şehir",
          placeholder: "Örn: 1988, İstanbul",
          helper: "Yaş grubu ve anlaşmalı hastane bölgesi için",
        };
      case "konut":
      case "dask":
        return {
          label: "Bina İl / İlçe ve m²",
          placeholder: "Örn: Kadıköy, 120 m²",
          helper: "DASK ve konut teminat hesabı için",
        };
      case "isyeri":
        return {
          label: "Sektör ve Şehir",
          placeholder: "Örn: Bilişim / Ofis, Levent İstanbul",
          helper: "İşletmenizin faaliyet alanı",
        };
      default:
        return {
          label: "Talep Detayı / Notunuz",
          placeholder: "İhtiyaç duyduğunuz teminat hakkında kısa bilgi...",
          helper: "Yat, ferdi kaza, siber sigorta vb.",
        };
    }
  };

  const validate = (): boolean => {
    const errs: FormErrors = {};

    if (!fullName.trim() || fullName.trim().length < 3) {
      errs.fullName = "Lütfen geçerli bir ad soyad giriniz.";
    }

    const cleanPhone = phone.replace(/[^0-9]/g, "");
    if (!cleanPhone || cleanPhone.length < 10) {
      errs.phone = "Lütfen en az 10 haneli geçerli bir telefon numarası giriniz.";
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.trim() || !emailRegex.test(email)) {
      errs.email = "Lütfen geçerli bir e-posta adresi giriniz.";
    }

    if (!extraField.trim()) {
      errs.extraField = "Lütfen bu alanı doldurunuz.";
    }

    if (!kvkkAccepted) {
      errs.kvkk = "Devam etmek için aydınlatma metnini onaylamalısınız.";
    }

    setErrors(errs);
    return Object.keys(errs).length === 0;
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (!validate()) return;

    setIsSubmitting(true);

    // Simulate luxury instant quote aggregation (1.2s)
    setTimeout(() => {
      setIsSubmitting(false);
      setIsSuccess(true);
      const generatedCode = `AUR-${Math.floor(10000 + Math.random() * 90000)}`;
      setRefCode(generatedCode);

      // Fire celebratory confetti
      try {
        confetti({
          particleCount: 80,
          spread: 70,
          origin: { y: 0.6 },
          colors: ["#0066FF", "#38BDF8", "#8B5CF6", "#FFFFFF"],
        });
      } catch {
        // Fallback gracefully
      }
    }, 1200);
  };

  const handleReset = () => {
    setIsSuccess(false);
    setFullName("");
    setPhone("");
    setEmail("");
    setExtraField("");
    setKvkkAccepted(false);
    setErrors({});
  };

  const extraConfig = getExtraFieldConfig();

  return (
    <section
      id="teklif-al"
      className="relative w-full py-28 px-6 sm:px-10 lg:px-16 bg-background text-white overflow-hidden"
    >
      {/* BACKGROUND ACCENT RADIANCE */}
      <div className="absolute top-1/3 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-electric/10 rounded-full blur-[170px] pointer-events-none" />

      <div className="max-w-4xl mx-auto relative z-10">
        {/* HEADER */}
        <div className="text-center mb-14">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/[0.04] border border-white/[0.08] text-xs font-mono uppercase tracking-[0.2em] text-silver-300 mb-5">
            <Clock className="w-3.5 h-3.5 text-electric-light" />
            <span>3 Dakikada Çoklu Şirket Karşılaştırması</span>
          </div>

          <h2 className="font-serif text-3xl sm:text-5xl lg:text-6xl font-medium text-white mb-4">
            Teklif almak birkaç dakikanızı alır.
          </h2>

          <p className="text-silver-400 text-base sm:text-lg max-w-xl mx-auto font-sans">
            İhtiyacınız olan güvenceyi seçin; danışmanlarımız 20'yi aşkın şirketin
            tekliflerini sizin için hazırlasın.
          </p>
        </div>

        {/* MAIN PROPOSAL CARD */}
        <div className="relative rounded-3xl bg-white/[0.03] border border-white/[0.09] backdrop-blur-2xl p-6 sm:p-10 lg:p-12 shadow-[0_20px_70px_rgba(0,0,0,0.7)]">
          <AnimatePresence mode="wait">
            {!isSuccess ? (
              <motion.form
                key="proposal-form"
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                exit={{ opacity: 0 }}
                onSubmit={handleSubmit}
                className="space-y-8"
              >
                {/* STEP 1: INSURANCE TYPE SELECTOR CHIPS */}
                <div>
                  <div className="flex items-center justify-between mb-4">
                    <label className="text-xs font-mono uppercase tracking-widest text-silver-300">
                      1. Sigorta Türünü Seçin
                    </label>
                    <span className="text-[11px] font-mono text-silver-500">
                      Aktif: {insuranceTypes.find((t) => t.id === selectedType)?.name}
                    </span>
                  </div>

                  <div className="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-7 gap-2.5">
                    {insuranceTypes.map((type) => {
                      const Icon = type.icon;
                      const isSelected = selectedType === type.id;
                      return (
                        <button
                          key={type.id}
                          type="button"
                          onClick={() => setSelectedType(type.id)}
                          className={`flex flex-col items-center text-center p-3 rounded-2xl border transition-all duration-200 cursor-pointer ${
                            isSelected
                              ? "bg-electric/20 border-electric-light text-white shadow-[0_0_20px_rgba(0,102,255,0.4)]"
                              : "bg-white/[0.02] border-white/[0.06] text-silver-400 hover:text-white hover:bg-white/[0.05]"
                          }`}
                        >
                          <Icon
                            className={`w-5 h-5 mb-2 ${
                              isSelected ? "text-electric-light" : "text-silver-400"
                            }`}
                          />
                          <span className="text-xs font-medium">{type.name}</span>
                          <span className="text-[9px] font-mono text-silver-500 uppercase mt-0.5">
                            {type.tag}
                          </span>
                        </button>
                      );
                    })}
                  </div>
                </div>

                {/* STEP 2: DYNAMIC PRODUCT SPECIFIC FIELD */}
                <div className="p-5 rounded-2xl bg-white/[0.02] border border-white/[0.06]">
                  <div className="flex flex-col sm:flex-row sm:items-center justify-between gap-1 mb-2">
                    <label
                      htmlFor="extraField"
                      className="text-xs font-mono uppercase tracking-wider text-silver-300"
                    >
                      2. {extraConfig.label} <span className="text-rose-400">*</span>
                    </label>
                    <span className="text-[11px] text-silver-500 font-sans">
                      {extraConfig.helper}
                    </span>
                  </div>
                  <input
                    id="extraField"
                    type="text"
                    value={extraField}
                    onChange={(e) => setExtraField(e.target.value)}
                    placeholder={extraConfig.placeholder}
                    className={`w-full px-4 py-3 rounded-xl bg-white/[0.04] border text-white placeholder-silver-600 text-sm font-sans focus:outline-none focus:ring-2 focus:ring-electric transition-all ${
                      errors.extraField ? "border-rose-500/70" : "border-white/10"
                    }`}
                  />
                  {errors.extraField && (
                    <p className="flex items-center gap-1 text-xs text-rose-400 mt-1.5">
                      <AlertCircle className="w-3.5 h-3.5" />
                      {errors.extraField}
                    </p>
                  )}
                </div>

                {/* STEP 3: CONTACT INFORMATION */}
                <div>
                  <label className="text-xs font-mono uppercase tracking-widest text-silver-300 block mb-4">
                    3. İletişim Bilgileriniz
                  </label>

                  <div className="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    {/* FULL NAME */}
                    <div>
                      <input
                        type="text"
                        value={fullName}
                        onChange={(e) => setFullName(e.target.value)}
                        placeholder="Adınız Soyadınız *"
                        className={`w-full px-4 py-3 rounded-xl bg-white/[0.04] border text-white placeholder-silver-600 text-sm font-sans focus:outline-none focus:ring-2 focus:ring-electric transition-all ${
                          errors.fullName ? "border-rose-500/70" : "border-white/10"
                        }`}
                      />
                      {errors.fullName && (
                        <p className="text-[11px] text-rose-400 mt-1">
                          {errors.fullName}
                        </p>
                      )}
                    </div>

                    {/* PHONE */}
                    <div>
                      <input
                        type="tel"
                        value={phone}
                        onChange={(e) => setPhone(e.target.value)}
                        placeholder="Telefon Numaranız (05XX) *"
                        className={`w-full px-4 py-3 rounded-xl bg-white/[0.04] border text-white placeholder-silver-600 text-sm font-sans focus:outline-none focus:ring-2 focus:ring-electric transition-all ${
                          errors.phone ? "border-rose-500/70" : "border-white/10"
                        }`}
                      />
                      {errors.phone && (
                        <p className="text-[11px] text-rose-400 mt-1">
                          {errors.phone}
                        </p>
                      )}
                    </div>

                    {/* EMAIL */}
                    <div>
                      <input
                        type="email"
                        value={email}
                        onChange={(e) => setEmail(e.target.value)}
                        placeholder="E-posta Adresiniz *"
                        className={`w-full px-4 py-3 rounded-xl bg-white/[0.04] border text-white placeholder-silver-600 text-sm font-sans focus:outline-none focus:ring-2 focus:ring-electric transition-all ${
                          errors.email ? "border-rose-500/70" : "border-white/10"
                        }`}
                      />
                      {errors.email && (
                        <p className="text-[11px] text-rose-400 mt-1">
                          {errors.email}
                        </p>
                      )}
                    </div>
                  </div>
                </div>

                {/* KVKK / CONSENT CHECKBOX */}
                <div className="pt-2">
                  <label className="flex items-start gap-3 cursor-pointer group">
                    <input
                      type="checkbox"
                      checked={kvkkAccepted}
                      onChange={(e) => setKvkkAccepted(e.target.checked)}
                      className="mt-1 w-4 h-4 rounded border-white/20 bg-white/5 text-electric focus:ring-electric accent-blue-600 cursor-pointer"
                    />
                    <span className="text-xs text-silver-400 group-hover:text-silver-300 font-sans leading-relaxed">
                      6698 sayılı KVKK uyarınca kişisel verilerimin teklif
                      hazırlanması ve sigorta poliçesi bilgilendirmesi amacıyla
                      işlenmesini, aydınlatma metnini okuduğumu kabul ediyorum.
                    </span>
                  </label>
                  {errors.kvkk && (
                    <p className="flex items-center gap-1 text-xs text-rose-400 mt-1.5">
                      <AlertCircle className="w-3.5 h-3.5" />
                      {errors.kvkk}
                    </p>
                  )}
                </div>

                {/* SUBMIT BUTTON */}
                <div className="pt-2 flex flex-col sm:flex-row items-center justify-between gap-4">
                  <button
                    type="submit"
                    disabled={isSubmitting}
                    className="w-full sm:w-auto px-10 py-4 rounded-xl bg-gradient-to-r from-blue-600 via-blue-500 to-indigo-600 text-white font-semibold text-sm tracking-wider uppercase shadow-[0_0_25px_rgba(0,102,255,0.4)] hover:shadow-[0_0_40px_rgba(0,102,255,0.7)] transition-all cursor-pointer flex items-center justify-center gap-3 disabled:opacity-50"
                  >
                    {isSubmitting ? (
                      <>
                        <RefreshCw className="w-4 h-4 animate-spin" />
                        <span>Teklifler taranıyor...</span>
                      </>
                    ) : (
                      <>
                        <span>Ücretsiz Karşılaştırmalı Teklif Al</span>
                        <ArrowRight className="w-4 h-4" />
                      </>
                    )}
                  </button>

                  <div className="flex items-center gap-2 text-xs text-silver-500 font-mono">
                    <Lock className="w-3.5 h-3.5 text-emerald-400" />
                    <span>256-Bit SSL Uçtan Uca Şifreli Güvenli Form</span>
                  </div>
                </div>
              </motion.form>
            ) : (
              /* SUCCESS CONFIRMATION STATE */
              <motion.div
                key="proposal-success"
                initial={{ opacity: 0, scale: 0.95 }}
                animate={{ opacity: 1, scale: 1 }}
                transition={{ duration: 0.4 }}
                className="py-8 text-center flex flex-col items-center"
              >
                <div className="w-20 h-20 rounded-full bg-emerald-500/15 border border-emerald-400/30 flex items-center justify-center text-emerald-400 mb-6 shadow-[0_0_40px_rgba(16,185,129,0.3)]">
                  <CheckCircle2 className="w-10 h-10 stroke-[2]" />
                </div>

                <span className="px-3 py-1 rounded-full bg-white/[0.05] border border-white/10 font-mono text-xs text-silver-300 mb-3">
                  REFERANS KODU: <strong className="text-white">{refCode}</strong>
                </span>

                <h3 className="font-serif text-3xl sm:text-4xl text-white font-medium mb-3">
                  Talebiniz alındı.
                </h3>

                <p className="text-silver-300 text-base max-w-lg mb-8 font-sans leading-relaxed">
                  En kısa sürede sizinle iletişime geçeceğiz. Lisanslı danışmanımız
                  seçtiğiniz <span className="text-electric-light font-medium uppercase">{selectedType}</span> için 20 farklı sigorta şirketinden en avantajlı teminat ve prim seçeneklerini derlemektedir.
                </p>

                {/* FAST DIRECT ACTIONS */}
                <div className="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto">
                  <a
                    href={`https://wa.me/${siteConfig.whatsappRaw}?text=Merhaba,%20${refCode}%20referans%20koduyla%20${selectedType}%20sigortası%20teklifim%20için%20yazıyorum.`}
                    target="_blank"
                    rel="noopener noreferrer"
                    className="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-medium text-xs uppercase tracking-wider transition-colors shadow-[0_0_20px_rgba(16,185,129,0.4)]"
                  >
                    <MessageSquare className="w-4 h-4" />
                    WhatsApp'tan Hemen Yazın
                  </a>

                  <button
                    onClick={handleReset}
                    className="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-white/[0.05] hover:bg-white/[0.1] border border-white/10 text-silver-200 font-medium text-xs uppercase tracking-wider transition-colors"
                  >
                    <RefreshCw className="w-4 h-4" />
                    Yeni Teklif Talebi Oluştur
                  </button>
                </div>
              </motion.div>
            )}
          </AnimatePresence>
        </div>
      </div>
    </section>
  );
}
