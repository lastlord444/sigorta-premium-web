"use client";

import React, { useState } from "react";
import Navbar from "@/components/sections/Navbar";
import Hero from "@/components/sections/Hero";
import ScrollStorytelling from "@/components/sections/ScrollStorytelling";
import WhyUs from "@/components/sections/WhyUs";
import PartnersMarquee from "@/components/sections/PartnersMarquee";
import ProposalSection from "@/components/sections/ProposalSection";
import ClaimSupport from "@/components/sections/ClaimSupport";
import AboutSection from "@/components/sections/AboutSection";
import FaqSection from "@/components/sections/FaqSection";
import Footer from "@/components/sections/Footer";

export default function Home() {
  const [selectedProductForQuote, setSelectedProductForQuote] = useState("kasko");

  const handleSelectProduct = (productId: string) => {
    setSelectedProductForQuote(productId);
  };

  return (
    <main className="relative min-h-screen bg-background overflow-x-hidden">
      <Navbar />
      <Hero />
      <ScrollStorytelling onSelectProductForQuote={handleSelectProduct} />
      <WhyUs />
      <PartnersMarquee />
      <ProposalSection initialProduct={selectedProductForQuote} />
      <ClaimSupport />
      <AboutSection />
      <FaqSection />
      <Footer />
    </main>
  );
}
