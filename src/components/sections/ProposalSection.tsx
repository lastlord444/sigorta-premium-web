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
  RefreshCw,
  Lock
} from "lucide-react";
import WhatsAppIcon from "@/components/icons/WhatsAppIcon";
import { siteConfig } from "@/data/siteData";
import { useLanguage } from "@/components/providers/LanguageProvider";

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
  const { t } = useLanguage();
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

  const typeIcons: Record<string, React.ComponentType<{ className?: string }>> = {
    kasko: Car,
    trafik: ShieldAlert,
    saglik: HeartPulse,
    konut: Home,
    dask: Building2,
    isyeri: Briefcase,
    diger: Sparkles,
  };

  const insuranceTypes = t.proposal.types.map((type) => ({
    ...type,
    icon: typeIcons[type.id] || Sparkles,
  }));

  const extraConfig = t.proposal.fields[selectedType] || t.proposal.fields.kasko || {
    label: "Details",
    placeholder: "Enter details",
    helper: "Required information",
  };

  const validate = (): boolean => {
    const errs: FormErrors = {};

    if (!fullName.trim() || fullName.trim().length < 3) {
      errs.fullName = t.proposal.validation.nameRequired;
    }

    const cleanPhone = phone.replace(/[^0-9]/g, "");
    if (!cleanPhone || cleanPhone.length < 10) {
      errs.phone = t.proposal.validation.phoneRequired;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.trim() || !emailRegex.test(email)) {
      errs.email = t.proposal.validation.emailRequired;
    }

    if (!extraField.trim()) {
      errs.extraField = t.proposal.validation.extraRequired;
    }

    if (!kvkkAccepted) {
      errs.kvkk = t.proposal.validation.consentRequired;
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
            <span>{t.proposal.badge}</span>
          </div>

          <h2 className="font-serif text-3xl sm:text-5xl lg:text-6xl font-medium text-white mb-4">
            {t.proposal.title}
          </h2>

          <p className="text-silver-400 text-base sm:text-lg max-w-xl mx-auto font-sans">
            {t.proposal.desc}
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
                      {t.proposal.step1Label}
                    </label>
                    <span className="text-[11px] font-mono text-silver-500">
                      {t.proposal.activeLabel} {insuranceTypes.find((t) => t.id === selectedType)?.name}
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
                      {t.proposal.step2Prefix} {extraConfig.label} <span className="text-rose-400">*</span>
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
                    {t.proposal.step3Label}
                  </label>

                  <div className="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    {/* FULL NAME */}
                    <div>
                      <input
                        type="text"
                        value={fullName}
                        onChange={(e) => setFullName(e.target.value)}
                        placeholder={t.proposal.fullNamePlaceholder}
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
                        placeholder={t.proposal.phonePlaceholder}
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
                        placeholder={t.proposal.emailPlaceholder}
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

                {/* PRIVACY / CONSENT CHECKBOX */}
                <div className="pt-2">
                  <label className="flex items-start gap-3 cursor-pointer group">
                    <input
                      type="checkbox"
                      checked={kvkkAccepted}
                      onChange={(e) => setKvkkAccepted(e.target.checked)}
                      className="mt-1 w-4 h-4 rounded border-white/20 bg-white/5 text-electric focus:ring-electric accent-blue-600 cursor-pointer"
                    />
                    <span className="text-xs text-silver-400 group-hover:text-silver-300 font-sans leading-relaxed">
                      {t.proposal.consent}
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
                        <span>{t.proposal.submittingBtn}</span>
                      </>
                    ) : (
                      <>
                        <span>{t.proposal.submitBtn}</span>
                        <ArrowRight className="w-4 h-4" />
                      </>
                    )}
                  </button>

                  <div className="flex items-center gap-2 text-xs text-silver-500 font-mono">
                    <Lock className="w-3.5 h-3.5 text-emerald-400" />
                    <span>{t.proposal.sslNotice}</span>
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
                  {t.proposal.successCodeLabel}: <strong className="text-white">{refCode}</strong>
                </span>

                <h3 className="font-serif text-3xl sm:text-4xl text-white font-medium mb-3">
                  {t.proposal.successTitle}
                </h3>

                <p className="text-silver-300 text-base max-w-lg mb-8 font-sans leading-relaxed">
                  {t.proposal.successDesc}
                </p>

                {/* FAST DIRECT ACTIONS */}
                <div className="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto">
                  <a
                    href={`https://wa.me/${siteConfig.whatsappRaw}?text=Hello,%20I%20am%20inquiring%20about%20reference%20code%20${refCode}%20for%20${selectedType}%20coverage.`}
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Connect via WhatsApp"
                    className="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-6 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-medium text-xs uppercase tracking-wider transition-colors shadow-[0_0_20px_rgba(16,185,129,0.4)]"
                  >
                    <WhatsAppIcon className="w-4 h-4 shrink-0 text-white" />
                    <span>{t.proposal.whatsappBtn}</span>
                  </a>

                  <button
                    onClick={handleReset}
                    className="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-white/[0.05] hover:bg-white/[0.1] border border-white/10 text-silver-200 font-medium text-xs uppercase tracking-wider transition-colors"
                  >
                    <RefreshCw className="w-4 h-4" />
                    {t.proposal.resetBtn}
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
