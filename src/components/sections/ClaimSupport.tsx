"use client";

import React, { useState } from "react";
import { motion, AnimatePresence } from "framer-motion";
import {
  PhoneCall,
  AlertTriangle,
  FileText,
  Truck,
  CheckCircle2,
  X,
  Send,
  ShieldAlert
} from "lucide-react";
import WhatsAppIcon from "@/components/icons/WhatsAppIcon";
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
      title: "Secure & Document",
      desc: "Ensure personal safety first. Capture comprehensive, wide-angle incident photography before relocating vehicles or property, and complete standard accident documentation.",
      icon: FileText,
    },
    {
      step: "02",
      title: "Contact 24/7 Concierge Desk",
      desc: "Call our emergency claims hotline or initiate instant WhatsApp reporting. We immediately coordinate authorized roadside towing and dispatch accredited adjusters.",
      icon: PhoneCall,
    },
    {
      step: "03",
      title: "End-to-End Settlement Tracking",
      desc: "From independent surveyor appointments and loss assessment to replacement vehicles and insurer payouts, our advisory desk personally champions your file.",
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
            <span>24/7 Rapid Response & Claims Concierge</span>
          </div>

          <h2 className="font-serif text-3xl sm:text-5xl lg:text-6xl font-medium text-white mb-6">
            When loss occurs, you are never alone.
          </h2>

          <p className="text-silver-400 text-base sm:text-lg font-sans leading-relaxed">
            Insurance is proven on the day of a claim. Whether vehicular damage, estate flooding,
            or medical emergency, you reach a dedicated private advocate—never an automated call queue.
          </p>

          <div className="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
            <button
              onClick={() => setModalOpen(true)}
              className="w-full sm:w-auto px-8 py-4 rounded-xl bg-gradient-to-r from-rose-600 to-red-700 hover:from-rose-500 hover:to-red-600 text-white font-semibold text-xs uppercase tracking-wider shadow-[0_0_30px_rgba(225,29,72,0.4)] transition-all cursor-pointer flex items-center justify-center gap-2"
            >
              <ShieldAlert className="w-4 h-4" />
              <span>Report an Incident</span>
            </button>

            <a
              href={`tel:${siteConfig.phoneRaw}`}
              className="w-full sm:w-auto px-8 py-4 rounded-xl bg-white/[0.05] hover:bg-white/[0.1] border border-white/10 text-silver-100 font-medium text-xs uppercase tracking-wider transition-colors flex items-center justify-center gap-2"
            >
              <PhoneCall className="w-4 h-4 text-emerald-400" />
              <span>24/7 Claims Desk: {siteConfig.phone}</span>
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
                      STEP {step.step}
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
              PRIORITY CLAIMS CONCIERGE
            </span>
            <h4 className="font-serif text-2xl text-white font-medium">
              Submit accident documentation or scene photographs instantly.
            </h4>
            <p className="text-sm text-silver-400 mt-1">
              Your file is routed immediately to the lead loss adjuster and syndicate claims desk.
            </p>
          </div>

          <a
            href={`https://wa.me/${siteConfig.whatsappRaw}?text=I%20need%20to%20report%20an%20urgent%20insurance%20claim.`}
            target="_blank"
            rel="noopener noreferrer"
            aria-label="Send Incident Details via WhatsApp"
            className="w-full sm:w-auto px-8 py-4 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-xs uppercase tracking-wider shadow-[0_0_20px_rgba(16,185,129,0.4)] transition-colors flex items-center justify-center gap-2.5 shrink-0 cursor-pointer"
          >
            <WhatsAppIcon className="w-5 h-5 shrink-0 text-white" />
            <span>Send Incident Details via WhatsApp</span>
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
                      Initiate Incident File
                    </span>
                  </div>

                  <h3 className="font-serif text-2xl text-white font-medium">
                    Report an Incident
                  </h3>

                  <p className="text-xs text-silver-400 font-sans">
                    Submit essential details and our emergency claims desk will contact you within 5 minutes to direct field response.
                  </p>

                  <div>
                    <label className="block text-xs font-mono text-silver-300 mb-1">
                      Full Name *
                    </label>
                    <input
                      required
                      type="text"
                      value={claimName}
                      onChange={(e) => setClaimName(e.target.value)}
                      placeholder="Full Name"
                      className="w-full px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-white text-sm focus:ring-2 focus:ring-rose-500 focus:outline-none"
                    />
                  </div>

                  <div>
                    <label className="block text-xs font-mono text-silver-300 mb-1">
                      Phone Number *
                    </label>
                    <input
                      required
                      type="tel"
                      value={claimPhone}
                      onChange={(e) => setClaimPhone(e.target.value)}
                      placeholder="+1 (555) 000-0000"
                      className="w-full px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-white text-sm focus:ring-2 focus:ring-rose-500 focus:outline-none"
                    />
                  </div>

                  <div>
                    <label className="block text-xs font-mono text-silver-300 mb-1">
                      Claim Category
                    </label>
                    <select
                      value={claimType}
                      onChange={(e) => setClaimType(e.target.value)}
                      className="w-full px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-white text-sm focus:ring-2 focus:ring-rose-500 focus:outline-none"
                    >
                      <option value="kasko" className="bg-navy-950">
                        Automobile Collision / Theft
                      </option>
                      <option value="konut" className="bg-navy-950">
                        Residential / Fire / Water Intrusion
                      </option>
                      <option value="saglik" className="bg-navy-950">
                        Medical Emergency
                      </option>
                      <option value="isyeri" className="bg-navy-950">
                        Commercial Property / Business Interruption
                      </option>
                      <option value="diger" className="bg-navy-950">
                        Other Specialty Claim
                      </option>
                    </select>
                  </div>

                  <div>
                    <label className="block text-xs font-mono text-silver-300 mb-1">
                      Brief Incident Summary (Optional)
                    </label>
                    <textarea
                      rows={2}
                      value={claimNote}
                      onChange={(e) => setClaimNote(e.target.value)}
                      placeholder="Location, immediate roadside assistance needed, or damages..."
                      className="w-full px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-white text-sm focus:ring-2 focus:ring-rose-500 focus:outline-none"
                    />
                  </div>

                  <button
                    type="submit"
                    className="w-full py-3.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-semibold text-xs uppercase tracking-wider transition-colors flex items-center justify-center gap-2"
                  >
                    <Send className="w-4 h-4" />
                    <span>Alert Claims Desk</span>
                  </button>
                </form>
              ) : (
                <div className="py-8 text-center flex flex-col items-center">
                  <div className="w-16 h-16 rounded-full bg-emerald-500/20 border border-emerald-400/30 flex items-center justify-center text-emerald-400 mb-4">
                    <CheckCircle2 className="w-8 h-8" />
                  </div>
                  <h4 className="font-serif text-2xl text-white font-medium mb-2">
                    Claims Alert Dispatched
                  </h4>
                  <p className="text-sm text-silver-300 font-sans mb-6">
                    Our emergency claims advocate will contact you at {claimPhone} within minutes. You are in safe hands.
                  </p>
                  <button
                    onClick={closeModal}
                    className="px-6 py-2.5 rounded-xl bg-white/10 text-white text-xs uppercase font-mono tracking-wider hover:bg-white/15"
                  >
                    Close
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
