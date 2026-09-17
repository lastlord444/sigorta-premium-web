export type Language = "en" | "tr" | "de" | "fr" | "es";

export interface LanguageOption {
  code: Language;
  name: string;
  nativeName: string;
  flag: string;
}

export const supportedLanguages: LanguageOption[] = [
  { code: "en", name: "English", nativeName: "English", flag: "🇬🇧" },
  { code: "tr", name: "Turkish", nativeName: "Türkçe", flag: "🇹🇷" },
  { code: "de", name: "German", nativeName: "Deutsch", flag: "🇩🇪" },
  { code: "fr", name: "French", nativeName: "Français", flag: "🇫🇷" },
  { code: "es", name: "Spanish", nativeName: "Español", flag: "🇪🇸" },
];

export interface SiteTranslations {
  common: {
    brandName: string;
    brandSubtitle: string;
    getQuote: string;
    callNow: string;
    chatWhatsApp: string;
    online: string;
    chatWithAdvisor: string;
  };
  nav: {
    coverage: string;
    philosophy: string;
    underwriters: string;
    claimsDesk: string;
    aboutUs: string;
    faq: string;
    navigation: string;
    claimsActiveNotice: string;
  };
  hero: {
    headline1: string;
    headline2: string;
    subtitle: string;
    requestQuote: string;
    exploreCoverages: string;
    scroll: string;
    autoEyebrow: string;
    autoTitle: string;
    autoDesc: string;
    autoHighlights: string[];
    autoCta: string;
    autoExplore: string;
  };
  scenes: {
    headerBadge: string;
    headerTitle: string;
    navPills: { id: string; order: string; label: string }[];
    estate: {
      eyebrow: string;
      title: string;
      description: string;
      badge: string;
      highlights: string[];
      ctaText: string;
    };
    liability: {
      eyebrow: string;
      title: string;
      description: string;
      badge: string;
      highlights: string[];
      ctaText: string;
    };
    health: {
      eyebrow: string;
      title: string;
      description: string;
      badge: string;
      highlights: string[];
      ctaText: string;
    };
    disaster: {
      eyebrow: string;
      title: string;
      description: string;
      badge: string;
      highlights: string[];
      ctaText: string;
    };
    commercial: {
      eyebrow: string;
      title: string;
      description: string;
      badge: string;
      highlights: string[];
      ctaText: string;
    };
  };
  whyUs: {
    badge: string;
    title1: string;
    title2: string;
    desc: string;
    advantages: { id: string; number: string; tag: string; title: string; description: string }[];
    metrics: { value: string; label: string; sublabel: string }[];
  };
  marquee: {
    badge: string;
    subtext: string;
  };
  proposal: {
    badge: string;
    title: string;
    desc: string;
    step1Label: string;
    activeLabel: string;
    types: { id: string; name: string; tag: string }[];
    step2Prefix: string;
    fields: Record<string, { label: string; placeholder: string; helper: string }>;
    step3Label: string;
    fullNamePlaceholder: string;
    phonePlaceholder: string;
    emailPlaceholder: string;
    consent: string;
    submitBtn: string;
    submittingBtn: string;
    sslNotice: string;
    successTitle: string;
    successCodeLabel: string;
    successDesc: string;
    whatsappBtn: string;
    resetBtn: string;
    validation: {
      nameRequired: string;
      phoneRequired: string;
      emailRequired: string;
      extraRequired: string;
      consentRequired: string;
    };
  };
  claim: {
    badge: string;
    title: string;
    desc: string;
    reportBtn: string;
    hotlinePrefix: string;
    stepPrefix: string;
    steps: { step: string; title: string; desc: string }[];
    bannerBadge: string;
    bannerTitle: string;
    bannerDesc: string;
    bannerBtn: string;
    modal: {
      badge: string;
      title: string;
      desc: string;
      nameLabel: string;
      namePlaceholder: string;
      phoneLabel: string;
      phonePlaceholder: string;
      typeLabel: string;
      typeOptions: { value: string; label: string }[];
      noteLabel: string;
      notePlaceholder: string;
      submitBtn: string;
      successTitle: string;
      successDesc: string;
      closeBtn: string;
    };
  };
  about: {
    badge: string;
    manifesto: string;
    desc: string;
    principles: [string, string, string];
  };
  faq: {
    badge: string;
    title: string;
    desc: string;
    items: { question: string; answer: string; category: string }[];
    extraQuestionText: string;
    extraQuestionBtn: string;
    categoryLabel: string;
  };
  footer: {
    brandDesc: string;
    coveragesTitle: string;
    practiceTitle: string;
    contactTitle: string;
    allRightsReserved: string;
    privacy: string;
    terms: string;
    cookies: string;
    backToTop: string;
    legalPrivacyTitle: string;
    legalTermsTitle: string;
    legalCookiesTitle: string;
    legalDisclosures: string[];
  };
}

export const translations: Record<Language, SiteTranslations> = {
  en: {
    common: {
      brandName: "AURA INSURANCE",
      brandSubtitle: "Private Client Advisory",
      getQuote: "Get a Quote",
      callNow: "Call Now",
      chatWhatsApp: "WhatsApp",
      online: "Online",
      chatWithAdvisor: "Chat with Advisor (Online)",
    },
    nav: {
      coverage: "Coverage",
      philosophy: "Philosophy",
      underwriters: "Underwriters",
      claimsDesk: "Claims Desk",
      aboutUs: "About Us",
      faq: "FAQ",
      navigation: "Navigation",
      claimsActiveNotice: "24/7 Dedicated Claims Desk Active",
    },
    hero: {
      headline1: "Life is unpredictable.",
      headline2: "Your protection is absolute.",
      subtitle: "From fine automobiles and private estates to executive health and commercial ventures, secure everything you value with bespoke multi-carrier underwriting.",
      requestQuote: "Request a Quote",
      exploreCoverages: "Explore Coverages",
      scroll: "Scroll",
      autoEyebrow: "01 / AUTOMOBILE",
      autoTitle: "Uncompromised protection for premier automobiles.",
      autoDesc: "Full comprehensive coverage against collision, total loss, natural perils, vandalism, and theft. Customized policy structures engineered beyond standard limitations.",
      autoHighlights: [
        "Multi-carrier comparative quotes",
        "Tailored coverage & agreed value",
        "Concierge claims management",
        "OEM certified replacement parts",
      ],
      autoCta: "Request Auto Quote",
      autoExplore: "Explore All Coverages",
    },
    scenes: {
      headerBadge: "Coverage Portfolio",
      headerTitle: "Precision Underwriting for What Matters Most",
      navPills: [
        { id: "kasko", order: "01", label: "AUTO" },
        { id: "konut", order: "02", label: "ESTATE" },
        { id: "trafik", order: "03", label: "LIABILITY" },
        { id: "saglik", order: "04", label: "HEALTH" },
        { id: "dask", order: "05", label: "DISASTER" },
        { id: "isyeri", order: "06", label: "COMMERCIAL" },
      ],
      estate: {
        eyebrow: "02 / LUXURY HOME & ESTATE",
        title: "Your sanctuary deserves unconditional protection.",
        description: "Comprehensive coverage safeguarding architectural residences, fine art, private estates, and luxury interiors against catastrophic loss, water intrusion, liability, and structural hazards. 24/7 private concierge restoration included.",
        badge: "Private Estate & Residence",
        highlights: [
          "Full replacement cost for prime residential structures",
          "Fine art, jewelry, and collector's inventory valuation",
          "24/7 dedicated emergency concierge & rapid restoration",
          "Comprehensive domestic & personal liability limits",
        ],
        ctaText: "Request Estate Coverage Quote",
      },
      liability: {
        eyebrow: "03 / MOTOR LIABILITY",
        title: "Uncompromising security for every mile ahead.",
        description: "Statutory motor liability upgraded with elevated limits. We benchmark quotes across leading global carriers to guarantee optimal legal indemnification and roadside support.",
        badge: "Mandatory & Excess Liability",
        highlights: [
          "Full statutory limit alignment with excess indemnity options",
          "24/7 VIP roadside recovery and nationwide assistance",
          "Bodily injury and property damage legal indemnification",
          "Expedited digital policy issuance",
        ],
        ctaText: "Request Liability Quote",
      },
      health: {
        eyebrow: "04 / PRIVATE HEALTHCARE",
        title: "When well-being is at stake, accept no compromises.",
        description: "Direct access to premier international hospital networks without wait times. Choose your preferred medical specialists and secure comprehensive outpatient and inpatient clinical care.",
        badge: "Individual & Family Executive Health",
        highlights: [
          "Unrestricted access to top-tier accredited hospitals",
          "100% inpatient surgery and comprehensive outpatient care",
          "Executive annual health screenings & dental coverage",
          "International treatment and maternity extension options",
        ],
        ctaText: "Request Healthcare Quote",
      },
      disaster: {
        eyebrow: "05 / CATASTROPHE & SEISMIC",
        title: "Preparedness against nature's unforeseen events.",
        description: "Compulsory seismic risk underwriting paired with excess disaster insurance. Safeguard your property foundations against seismic shock, tsunami, fire, and structural displacement.",
        badge: "Seismic & Natural Hazard Protection",
        highlights: [
          "Maximum statutory pool indemnity limits",
          "Fast-track post-disaster claim disbursements",
          "Official compliance for deeds and institutional registry",
          "Automated renewal and inflation adjustment tracking",
        ],
        ctaText: "Inquire Catastrophe Coverage",
      },
      commercial: {
        eyebrow: "06 / COMMERCIAL PROPERTY",
        title: "Protect what you have spent years building.",
        description: "Multi-peril commercial underwriting covering fixed assets, inventory, business interruption, and employer liability. Bespoke solutions from boutique executive suites to multi-site operations.",
        badge: "Corporate Risk Advisory",
        highlights: [
          "Business interruption & lost revenue reimbursement",
          "Equipment breakdown, machinery, and inventory coverage",
          "Third-party, employer, and product liability limits",
          "Tailored industry-specific risk engineering",
        ],
        ctaText: "Request Commercial Quote",
      },
    },
    whyUs: {
      badge: "Our Philosophy & Approach",
      title1: "We do not sell standard policies.",
      title2: "We engineer precision protection.",
      desc: "We depart from conventional commission-driven brokerage models. By mapping your holistic exposure profile and conducting rigorous multi-carrier syndicate comparisons, we construct institutional coverage tailored for what you hold dearest.",
      advantages: [
        {
          id: "1",
          number: "01",
          tag: "Independence",
          title: "Multi-Carrier Comparison",
          description: "Rather than pushing single-insurer quotas, we independently analyze and benchmark policies across premier international insurance syndicates.",
        },
        {
          id: "2",
          number: "02",
          tag: "Bespoke Engineering",
          title: "Precision Risk Architecture",
          description: "Eliminating redundant generic clauses, we construct tailored indemnity ceilings specifically calibrated to your unique asset portfolio.",
        },
        {
          id: "3",
          number: "03",
          tag: "Claims Defense",
          title: "24/7 Dedicated Concierge Desk",
          description: "When a claim arises, you bypass automated call centers and work directly with an experienced advocate who personally champions your recovery.",
        },
        {
          id: "4",
          number: "04",
          tag: "Client Partnership",
          title: "End-to-End Lifecycle Advisory",
          description: "From digital onboarding to annual inflationary revaluation, we continuously safeguard your wealth against fluctuating risks.",
        },
      ],
      metrics: [
        { value: "15+", label: "Elite Carrier Syndicates", sublabel: "Direct institutional underwriting" },
        { value: "%99.4", label: "Claims Settlement Ratio", sublabel: "Expedited loss recovery" },
        { value: "12 min", label: "Average Response Time", sublabel: "Dedicated private desk" },
        { value: "24/7", label: "Emergency Operations", sublabel: "Concierge claim assistance" },
      ],
    },
    marquee: {
      badge: "Underwritten by Global Leaders",
      subtext: "Comparative quotes and institutional syndication across premier international carriers",
    },
    proposal: {
      badge: "Multi-Carrier Quote Engine",
      title: "Receive comparative proposals in minutes.",
      desc: "Select your coverage requirement and our private advisory desk will formulate customized underwriting options across leading global syndicates.",
      step1Label: "1. Select Coverage Type",
      activeLabel: "Active",
      types: [
        { id: "kasko", name: "Auto", tag: "Comprehensive" },
        { id: "trafik", name: "Liability", tag: "Third-Party" },
        { id: "saglik", name: "Health", tag: "Executive Care" },
        { id: "konut", name: "Estate", tag: "Home & Art" },
        { id: "dask", name: "Disaster", tag: "Catastrophe" },
        { id: "isyeri", name: "Commercial", tag: "Business Shield" },
        { id: "diger", name: "Bespoke", tag: "Specialty Lines" },
      ],
      step2Prefix: "2.",
      fields: {
        kasko: { label: "Vehicle Registration / VIN", placeholder: "e.g. 34 ABC 1234 or VIN", helper: "Official vehicle identification or license plate" },
        trafik: { label: "Vehicle Registration / VIN", placeholder: "e.g. 34 ABC 1234 or VIN", helper: "Official vehicle identification or license plate" },
        saglik: { label: "Year of Birth & City / Country", placeholder: "e.g. 1988, London / New York", helper: "For actuarial underwriting and regional hospital tiers" },
        konut: { label: "Property Location & Approx. Sq. Ft.", placeholder: "e.g. Manhattan, NY - 3,200 sq ft", helper: "For structural valuation and replacement cost analysis" },
        dask: { label: "Property Location & Approx. Sq. Ft.", placeholder: "e.g. Manhattan, NY - 3,200 sq ft", helper: "For structural valuation and replacement cost analysis" },
        isyeri: { label: "Industry Sector & Operational City", placeholder: "e.g. Wealth Advisory / Tech HQ, London", helper: "Primary commercial activities & employee scale" },
        diger: { label: "Coverage Requirements & Notes", placeholder: "Brief overview of requested protection...", helper: "Superyacht, aviation, fine art collection, cyber, etc." },
      },
      step3Label: "3. Contact Information",
      fullNamePlaceholder: "Full Name *",
      phonePlaceholder: "Phone Number *",
      emailPlaceholder: "Email Address *",
      consent: "I consent to the processing of my contact information strictly for the purpose of receiving tailored insurance proposals and risk advisory in compliance with privacy regulations.",
      submitBtn: "Receive Comparative Quotes",
      submittingBtn: "Aggregating Underwriters...",
      sslNotice: "256-Bit SSL End-to-End Encrypted Submission",
      successTitle: "Inquiry Received Successfully.",
      successCodeLabel: "REFERENCE CODE:",
      successDesc: "Our private client desk is currently evaluating underwriting terms from top-tier carriers for your portfolio. An advisor will contact you shortly.",
      whatsappBtn: "Connect via WhatsApp",
      resetBtn: "Submit Another Inquiry",
      validation: {
        nameRequired: "Please enter a valid full name.",
        phoneRequired: "Please enter a valid phone number (at least 10 digits).",
        emailRequired: "Please enter a valid email address.",
        extraRequired: "Please complete this required field.",
        consentRequired: "You must acknowledge the privacy consent to proceed.",
      },
    },
    claim: {
      badge: "24/7 Rapid Response & Claims Concierge",
      title: "When loss occurs, you are never alone.",
      desc: "Insurance is proven on the day of a claim. Whether vehicular damage, estate flooding, or medical emergency, you reach a dedicated private advocate—never an automated call queue.",
      reportBtn: "Report an Incident",
      hotlinePrefix: "24/7 Claims Desk:",
      stepPrefix: "STEP",
      steps: [
        {
          step: "01",
          title: "Secure & Document",
          desc: "Ensure personal safety first. Capture comprehensive, wide-angle incident photography before relocating vehicles or property, and complete standard accident documentation.",
        },
        {
          step: "02",
          title: "Contact 24/7 Concierge Desk",
          desc: "Call our emergency claims hotline or initiate instant WhatsApp reporting. We immediately coordinate authorized roadside towing and dispatch accredited adjusters.",
        },
        {
          step: "03",
          title: "End-to-End Settlement Tracking",
          desc: "From independent surveyor appointments and loss assessment to replacement vehicles and insurer payouts, our advisory desk personally champions your file.",
        },
      ],
      bannerBadge: "PRIORITY CLAIMS CONCIERGE",
      bannerTitle: "Submit accident documentation or scene photographs instantly.",
      bannerDesc: "Your file is routed immediately to the lead loss adjuster and syndicate claims desk.",
      bannerBtn: "Send Incident Details via WhatsApp",
      modal: {
        badge: "Initiate Incident File",
        title: "Report an Incident",
        desc: "Submit essential details and our emergency claims desk will contact you within 5 minutes to direct field response.",
        nameLabel: "Full Name *",
        namePlaceholder: "Full Name",
        phoneLabel: "Phone Number *",
        phonePlaceholder: "+1 (555) 000-0000",
        typeLabel: "Claim Category",
        typeOptions: [
          { value: "kasko", label: "Automobile Collision / Theft" },
          { value: "konut", label: "Residential / Fire / Water Intrusion" },
          { value: "saglik", label: "Medical Emergency" },
          { value: "isyeri", label: "Commercial Property / Business Interruption" },
          { value: "diger", label: "Other Specialty Claim" },
        ],
        noteLabel: "Brief Incident Summary (Optional)",
        notePlaceholder: "Location, immediate roadside assistance needed, or damages...",
        submitBtn: "Alert Claims Desk",
        successTitle: "Claims Alert Dispatched",
        successDesc: "Our emergency claims advocate will contact you within minutes. You are in safe hands.",
        closeBtn: "Close",
      },
    },
    about: {
      badge: "About Our Practice",
      manifesto: "“We do not view insurance as pages of obscure contractual clauses. Our mission is to comprehend your risk, engineer precision coverage, and stand decisively by your side when it matters most.”",
      desc: "AURA INSURANCE is an independent insurance advisory operating free from captive insurer mandates. Governed by radical transparency and rapid digital response, we analyze your exposures and optimize your portfolio across elite global syndicates.",
      principles: [
        "Multi-Carrier Comparative Underwriting",
        "Bespoke Coverage Architecture",
        "Dedicated Claims Advocates",
      ],
    },
    faq: {
      badge: "Knowledge Base",
      title: "Frequently Asked Questions",
      desc: "Insights on bespoke policy structuring, multi-carrier coverage limits, and rapid claims management.",
      categoryLabel: "Coverage Category:",
      extraQuestionText: "Have a specific scenario or unique underwriting inquiry?",
      extraQuestionBtn: "Consult Our Advisors on WhatsApp",
      items: [
        {
          question: "How does an independent brokerage differ from single-brand insurance agents?",
          answer: "Traditional captive agents represent a single insurance company and are bound by internal quotas. As an independent brokerage, we evaluate institutional underwriters across the global market simultaneously, securing superior policy wording, higher indemnity ceilings, and negotiated premiums.",
          category: "Advisory Model",
        },
        {
          question: "How does the agreed-value clause protect my automobile or fine estate?",
          answer: "Under agreed-value endorsements, both parties contractually lock in the verified asset value at inception. In the event of total loss or major peril, settlements are paid without subjective market depreciation disputes.",
          category: "Policy Structuring",
        },
        {
          question: "What happens immediately after I submit a claim to your concierge desk?",
          answer: "Our 24/7 claims response protocol initiates within 5 minutes. We dispatch authorized recovery services, assign senior independent adjusters, and directly oversee repairs with certified OEM facilities.",
          category: "Claims Management",
        },
        {
          question: "Can private healthcare policies provide international hospital access?",
          answer: "Yes. Our executive healthcare suites offer seamless direct-billing access across leading European and North American medical institutions, including specialized cancer centers and emergency air ambulance extraction.",
          category: "Private Healthcare",
        },
        {
          question: "How do you calculate catastrophe and seismic replacement limits?",
          answer: "We employ advanced engineering assessments factoring in architectural materials, inflation indexes, and geographic soil ratings to guarantee full reconstruction financing rather than generic municipal minimums.",
          category: "Catastrophe & Real Estate",
        },
        {
          question: "Can corporate policies protect against business interruption and lost revenue?",
          answer: "Absolutely. Our commercial coverage bundles property damage with ongoing gross profit replacement, payroll indemnification, and supplier supply-chain contingent business interruption.",
          category: "Commercial Risk",
        },
      ],
    },
    footer: {
      brandDesc: "Uncompromising coverage structures tailored to high-value assets and individual risk profiles. Comparative multi-carrier syndication.",
      coveragesTitle: "Coverages",
      practiceTitle: "Practice",
      contactTitle: "Headquarters & Inquiries",
      allRightsReserved: "All rights reserved.",
      privacy: "Privacy",
      terms: "Terms",
      cookies: "Cookies",
      backToTop: "Back to Top",
      legalPrivacyTitle: "Privacy Policy & Regulatory Disclosures",
      legalTermsTitle: "Terms of Advisory Engagement",
      legalCookiesTitle: "Cookie & Tracking Policy",
      legalDisclosures: [
        "In accordance with international data privacy frameworks (including GDPR) and applicable insurance regulatory guidelines, personal data processed by AURA INSURANCE is handled strictly for risk assessment, multi-carrier policy formulation, underwriting syndication, and claims representation.",
        "Your contact details and risk disclosures are shared solely with authorized underwriting insurance syndicates, authorized loss adjusters, and statutory oversight authorities. We do not sell, barter, or distribute your private client information to third-party marketing entities.",
        "To exercise your data protection rights, request full record deletion, or inquire about underwriting disclosures, contact our privacy desk directly at concierge@aurainsurance.com.",
      ],
    },
  },
  tr: {
    common: {
      brandName: "AURA SİGORTA",
      brandSubtitle: "Özel Müşteri Danışmanlığı",
      getQuote: "Teklif Al",
      callNow: "Hemen Ara",
      chatWhatsApp: "WhatsApp",
      online: "Çevrimiçi",
      chatWithAdvisor: "Danışmanla Görüşün (Aktif)",
    },
    nav: {
      coverage: "Sigortalar",
      philosophy: "Felsefemiz",
      underwriters: "Şirketler",
      claimsDesk: "Hasar Masası",
      aboutUs: "Hakkımızda",
      faq: "SSS",
      navigation: "Navigasyon",
      claimsActiveNotice: "7/24 Kesintisiz Hasar Destek Masası Aktif",
    },
    hero: {
      headline1: "Hayat sürprizlerle dolu.",
      headline2: "Güvencen hazır olsun.",
      subtitle: "Aracınızdan lüks konutunuza, sağlığınızdan ticari varlıklarınıza kadar değer verdiğiniz her şeyi bağımsız çoklu şirket teminatıyla koruyun.",
      requestQuote: "Teklif Al",
      exploreCoverages: "Sigortaları İncele",
      scroll: "Kaydırın",
      autoEyebrow: "01 / KASKO",
      autoTitle: "Seçkin otomobiller için tavizsiz güvence.",
      autoDesc: "Kaza, çarpma, doğal afet, yangın ve hırsızlığa karşı aracınızı tam güvenceye alın. İhtiyacınıza uygun teminat seçenekleriyle standart poliçelerin ötesine geçin.",
      autoHighlights: [
        "Birden fazla şirketten karşılaştırmalı teklif",
        "İhtiyaca özel teminat ve mutabakatlı değer",
        "7/24 hasar anında kişisel destek masası",
        "Orijinal parça ve yetkili servis güvencesi",
      ],
      autoCta: "Kasko Teklifi Al",
      autoExplore: "Tüm Sigortaları Gör",
    },
    scenes: {
      headerBadge: "Güvence Portföyü",
      headerTitle: "Değerlerinizi Doğru Teminatla Koruyun",
      navPills: [
        { id: "kasko", order: "01", label: "KASKO" },
        { id: "konut", order: "02", label: "KONUT" },
        { id: "trafik", order: "03", label: "TRAFİK" },
        { id: "saglik", order: "04", label: "SAĞLIK" },
        { id: "dask", order: "05", label: "DASK" },
        { id: "isyeri", order: "06", label: "İŞYERİ" },
      ],
      estate: {
        eyebrow: "02 / LÜKS KONUT & VİLLA",
        title: "Eviniz dört duvardan fazlasıdır.",
        description: "Evinizi, değerli eşyalarınızı ve anılarınızı yangın, hırsızlık, dahili su sızıntıları ve komşu sorumluluğuna karşı eksiksiz teminat altına alın. 7/24 çilingir, camcı ve özel asistan hizmeti dahil.",
        badge: "Tam Kapsamlı Yuva & Mülk",
        highlights: [
          "Bina ve eşya tam yeniden yapım değeri koruması",
          "Sanat eserleri, mücevher ve koleksiyon teminatı",
          "7/24 özel çilingir, tesisatçı ve onarım asistanı",
          "Genişletilmiş aile ve komşuluk mali mesuliyeti",
        ],
        ctaText: "Konut Sigortası Teklifi Al",
      },
      liability: {
        eyebrow: "03 / TRAFİK SİGORTASI",
        title: "Yola çıktığınız her anda yanınızda.",
        description: "Zorunlu mali sorumluluk sigortanızı yalnızca yasal zorunluluk olarak görmeyin. Yüksek teminat limitleri ve ücretsiz yol yardımıyla yolculuklarınızı güvenceye alın.",
        badge: "Zorunlu Mali Mesuliyet",
        highlights: [
          "Yasal üst limitlerle tam uyumlu koruma",
          "7/24 ücretsiz yol yardım ve çekici desteği",
          "Maddi ve bedeni üçüncü şahıs tazminat teminatı",
          "Hızlı ve anında dijital poliçe tanzimi",
        ],
        ctaText: "Trafik Sigortası Teklifi Al",
      },
      health: {
        eyebrow: "04 / ÖZEL SAĞLIK",
        title: "Sağlığınız söz konusu olduğunda beklemeyin.",
        description: "Geniş anlaşmalı özel hastane ağlarında sıra beklemeden, doktorunuzu özgürce seçerek tedavi olun. Tamamlayıcı ve Özel Sağlık planlarıyla geleceğinizi koruyun.",
        badge: "Bireysel & Aile Sağlığı",
        highlights: [
          "Türkiye ve dünyanın seçkin özel hastane ağları",
          "Yatarak ve ayakta tedavi güvencesi",
          "Yıllık check-up, mamografi ve diş bakım seçenekleri",
          "Doğum ve yurtdışı acil tedavi opsiyonları",
        ],
        ctaText: "Sağlık Sigortası Teklifi Al",
      },
      disaster: {
        eyebrow: "05 / DASK & DOĞAL AFET",
        title: "Beklenmeyene karşı hazırlıklı olun.",
        description: "Zorunlu Deprem Sigortası ile binanızı deprem ve deprem kaynaklı risklere karşı güvenceye alın. En güncel metrekare teminatlarıyla poliçenizi yenileyin.",
        badge: "Deprem & Afet Güvencesi",
        highlights: [
          "Yasal DASK teminat tavanı tam koruması",
          "Afet sonrası hızlı tazminat ve ödeme protokolü",
          "Tapu ve abonelik işlemleri için resmi kayıt",
          "Otomatik enflasyon ve yenileme takibi",
        ],
        ctaText: "DASK Poliçesi Sorgula",
      },
      commercial: {
        eyebrow: "06 / İŞYERİ SİGORTASI",
        title: "Yıllarca kurduğunuz işi riske bırakmayın.",
        description: "İşletmenizin demirbaşlarını, emtiasını, çalışanlarını ve iş durması risklerini çok yönlü teminat paketiyle koruyun. Butik ofislerden büyük tesislerimize özel çözümler.",
        badge: "Kurumsal Risk Yönetimi",
        highlights: [
          "İş durması ve ciro kaybı telafisi",
          "Makine kırılması, elektronik cihaz ve emtia koruması",
          "İşveren ve üçüncü şahıs mali mesuliyeti",
          "Sektöre özel risk analizi ve mühendislik desteği",
        ],
        ctaText: "İşyeri Sigortası Teklifi Al",
      },
    },
    whyUs: {
      badge: "Felsefemiz & Yaklaşımımız",
      title1: "Poliçe satmıyoruz.",
      title2: "Doğru teminatı buluyoruz.",
      desc: "Klasik acentelerin komisyon odaklı ezberlerinden ayrılıyoruz. Sizin risk haritanızı çıkarıyor, birden fazla sigorta şirketinin tekliflerini inceleyerek gerçekten ihtiyaç duyduğunuz korumayı inşa ediyoruz.",
      advantages: [
        {
          id: "1",
          number: "01",
          tag: "Bağımsızlık",
          title: "Birden Fazla Şirketten Teklif",
          description: "Tek bir sigorta şirketine bağlı kalmadan, tüm saygın şirketlerin tekliflerini sizin lehinize karşılaştırırız.",
        },
        {
          id: "2",
          number: "02",
          tag: "Özelleştirme",
          title: "İhtiyaca Uygun Teminat",
          description: "Kullanmayacağınız gereksiz maddeleri ayıklar, gerçekten risk taşıyan noktaları en yüksek limitlerle koruruz.",
        },
        {
          id: "3",
          number: "03",
          tag: "Hasar Desteği",
          title: "7/24 Kesintisiz Hasar Masası",
          description: "Hasar anında robotlarla değil, dosyanızı bizzat sahiplenen deneyimli sigorta uzmanınızla muhatap olursunuz.",
        },
        {
          id: "4",
          number: "04",
          tag: "Süreklilik",
          title: "Poliçe Sürecinde Destek",
          description: "Poliçeniz tanzim edildikten sonra da yanınızdayız. Yenileme takipleri ve risk güncellemelerini sizin için takip ederiz.",
        },
      ],
      metrics: [
        { value: "15+", label: "Lider Sigorta Şirketi", sublabel: "Karşılaştırmalı portföy" },
        { value: "%99.4", label: "Müşteri Memnuniyeti", sublabel: "Hasar ve tazminat başarısı" },
        { value: "12 dk", label: "Ortalama Dönüş Süresi", sublabel: "Hızlı teklif hazırlığı" },
        { value: "7/24", label: "Kesintisiz Destek", sublabel: "Acil hasar yardım masası" },
      ],
    },
    marquee: {
      badge: "Sigorta Şirketleri",
      subtext: "Birden fazla şirketten karşılaştırmalı teklif seçenekleri",
    },
    proposal: {
      badge: "Karşılaştırmalı Teklif Motoru",
      title: "Teklif almak birkaç dakikanızı alır.",
      desc: "İhtiyacınız olan güvenceyi seçin; danışmanlarımız birden fazla şirketin tekliflerini sizin için hazırlasın.",
      step1Label: "1. Sigorta Türünü Seçin",
      activeLabel: "Aktif",
      types: [
        { id: "kasko", name: "Kasko", tag: "Tam Güvence" },
        { id: "trafik", name: "Trafik", tag: "Zorunlu Mali" },
        { id: "saglik", name: "Sağlık", tag: "Özel & TSS" },
        { id: "konut", name: "Konut", tag: "Bina & Eşya" },
        { id: "dask", name: "DASK", tag: "Zorunlu Deprem" },
        { id: "isyeri", name: "İşyeri", tag: "Kurumsal Koruma" },
        { id: "diger", name: "Diğer", tag: "Özel Branşlar" },
      ],
      step2Prefix: "2.",
      fields: {
        kasko: { label: "Araç Plakası", placeholder: "Örn: 34 ABC 1234", helper: "Aracınızın ruhsatındaki plaka no" },
        trafik: { label: "Araç Plakası", placeholder: "Örn: 34 ABC 1234", helper: "Aracınızın ruhsatındaki plaka no" },
        saglik: { label: "Doğum Yılı ve Şehir", placeholder: "Örn: 1988, İstanbul", helper: "Yaş grubu ve anlaşmalı hastane bölgesi için" },
        konut: { label: "Bina İl / İlçe ve m²", placeholder: "Örn: Kadıköy, 120 m²", helper: "DASK ve konut teminat hesabı için" },
        dask: { label: "Bina İl / İlçe ve m²", placeholder: "Örn: Kadıköy, 120 m²", helper: "DASK ve konut teminat hesabı için" },
        isyeri: { label: "Sektör ve Şehir", placeholder: "Örn: Bilişim / Ofis, Levent İstanbul", helper: "İşletmenizin faaliyet alanı" },
        diger: { label: "Talep Detayı / Notunuz", placeholder: "İhtiyaç duyduğunuz teminat hakkında kısa bilgi...", helper: "Yat, ferdi kaza, siber sigorta vb." },
      },
      step3Label: "3. İletişim Bilgileriniz",
      fullNamePlaceholder: "Adınız Soyadınız *",
      phonePlaceholder: "Telefon Numaranız (05XX) *",
      emailPlaceholder: "E-posta Adresiniz *",
      consent: "6698 sayılı KVKK uyarınca kişisel verilerimin teklif hazırlanması ve sigorta bilgilendirmesi amacıyla işlenmesini, aydınlatma metnini okuduğumu kabul ediyorum.",
      submitBtn: "Ücretsiz Karşılaştırmalı Teklif Al",
      submittingBtn: "Teklifler taranıyor...",
      sslNotice: "256-Bit SSL Uçtan Uca Şifreli Güvenli Form",
      successTitle: "Talebiniz alındı.",
      successCodeLabel: "REFERANS KODU:",
      successDesc: "Danışmanımız seçtiğiniz branş için birden fazla sigorta şirketinden en avantajlı teminat ve prim seçeneklerini derlemektedir.",
      whatsappBtn: "WhatsApp'tan Hemen Yazın",
      resetBtn: "Yeni Teklif Talebi Oluştur",
      validation: {
        nameRequired: "Lütfen geçerli bir ad soyad giriniz.",
        phoneRequired: "Lütfen en az 10 haneli geçerli bir telefon numarası giriniz.",
        emailRequired: "Lütfen geçerli bir e-posta adresi giriniz.",
        extraRequired: "Lütfen bu alanı doldurunuz.",
        consentRequired: "Devam etmek için aydınlatma metnini onaylamalısınız.",
      },
    },
    claim: {
      badge: "7/24 Acil Müdahale & Dosya Takibi",
      title: "Hasar olduğunda yalnız değilsiniz.",
      desc: "Poliçe yaptırmanın asıl sebebi hasar günüdür. Kaza, yangın veya sağlık acilinde robotlara değil, dosyanızı sahiplenen gerçek uzmanınıza ulaşırsınız.",
      reportBtn: "Acil Hasar Bildir",
      hotlinePrefix: "7/24 Hasar Hattı:",
      stepPrefix: "ADIM",
      steps: [
        {
          step: "01",
          title: "Güvenliği Sağlayın & Fotoğraflayın",
          desc: "Öncelikle can güvenliğinizi sağlayın. Kaza alanını hareket ettirmeden geniş açılı fotoğraflarını çekin ve Kaza Tespit Tutanağı'nı doldurun.",
        },
        {
          step: "02",
          title: "7/24 Masamızı Arayın",
          desc: "Hasar destek hattımızı veya WhatsApp hattımızı arayarak acente danışmanınıza bilgi verin. Size en yakın yetkili servisi ve ücretsiz çekiciyi yönlendirelim.",
        },
        {
          step: "03",
          title: "Dosya ve Onarım Takibi",
          desc: "Eksper atanması, dosya açılışı, ikame araç temini ve sigorta şirketi onay sürecini baştan sona acenteniz olarak bizzat takip edelim.",
        },
      ],
      bannerBadge: "ÖNCELİKLİ WHATSAPP DESTEK HATTI",
      bannerTitle: "Kaza tutanağı veya hasar fotoğraflarını anında iletin.",
      bannerDesc: "Dosyanız anında ilgili sigorta şirketi eksperine yönlendirilir.",
      bannerBtn: "WhatsApp ile Fotoğraf Gönder",
      modal: {
        badge: "Acil Hasar Dosyası Başlat",
        title: "Hasar Bildirimi",
        desc: "Bilgilerinizi bırakın, hasar operasyon masamız 5 dakika içinde sizi arayıp süreci yönlendirsin.",
        nameLabel: "Adınız Soyadınız *",
        namePlaceholder: "Ad Soyad",
        phoneLabel: "Telefon Numaranız *",
        phonePlaceholder: "05XX XXX XX XX",
        typeLabel: "Hasar Türü",
        typeOptions: [
          { value: "kasko", label: "Kasko / Trafik Kazası" },
          { value: "konut", label: "Konut / Yangın / Su Baskını" },
          { value: "saglik", label: "Sağlık Acil Durumu" },
          { value: "isyeri", label: "İşyeri Hasarı" },
          { value: "diger", label: "Diğer" },
        ],
        noteLabel: "Kısa Durum Notu (Opsiyonel)",
        notePlaceholder: "Kaza yeri, çekici ihtiyacı veya özet durum...",
        submitBtn: "Hasar Masasını Uyar",
        successTitle: "Hasar Çağrısı Alındı",
        successDesc: "Hasar uzmanımız telefon numaranız üzerinden birkaç dakika içinde sizinle temas kuracaktır. Geçmiş olsun.",
        closeBtn: "Kapat",
      },
    },
    about: {
      badge: "Biz Kimiz?",
      manifesto: "“Sigortayı karmaşık maddelerden ibaret görmüyoruz. Görevimiz, ihtiyacınızı anlamak, doğru teminatı bulmak ve ihtiyaç duyduğunuz anda yanınızda olmak.”",
      desc: "AURA SİGORTA, tek bir markaya bağımlı olmadan çalışan, tüm sürecini şeffaflık ve dijital hız ilkeleriyle yöneten bağımsız bir sigorta acentesidir.",
      principles: [
        "Birden Fazla Şirketten Teklif",
        "İhtiyaca Uygun Teminat Seçenekleri",
        "Poliçe ve Hasar Sürecinde Kesintisiz Destek",
      ],
    },
    faq: {
      badge: "Merak Edilenler",
      title: "Sıkça Sorulan Sorular",
      desc: "Sigorta poliçeleri, teminat kapsamları ve hasar süreçleri hakkında en çok merak edilen soruların yanıtları.",
      categoryLabel: "Kategori:",
      extraQuestionText: "Aklınıza takılan farklı bir durum mu var?",
      extraQuestionBtn: "Danışmanımıza WhatsApp'tan Danışın",
      items: [
        {
          question: "Neden tek bir sigorta şirketi yerine bağımsız acente seçmeliyim?",
          answer: "Tek bir şirkete bağlı temsilciler yalnızca o şirketin ürünlerini sunabilir. Bağımsız acente olarak biz ise 15'ten fazla sigorta şirketinin fiyat ve teminatlarını kıyaslar, sizin için en avantajlı poliçeyi buluruz.",
          category: "Acentelik Modeli",
        },
        {
          question: "Kasko poliçesinde 'Mutabakatlı Değer' neden önemlidir?",
          answer: "Mutabakatlı değer, olası bir tam hasar (pert) durumunda aracınızın değer kaybı tartışmalarına girmeden, poliçede peşinen belirlenen güncel değer üzerinden doğrudan tazminat almanızı sağlar.",
          category: "Kasko",
        },
        {
          question: "Hasar anında ilk olarak ne yapmalıyım?",
          answer: "Can güvenliğinizi sağladıktan sonra 7/24 hasar destek masamızı arayın. Tutanak tutulmasından ücretsiz çekici yönlendirilmesine kadar tüm süreci sizin adınıza acenteniz yönetir.",
          category: "Hasar Yönetimi",
        },
        {
          question: "Özel sağlık sigortası ile tamamlayıcı sağlık sigortası arasındaki fark nedir?",
          answer: "Tamamlayıcı sağlık sigortası SGK anlaşmalı özel hastanelerdeki fark ücretini karşılarken; Özel Sağlık Sigortası SGK şartı aranmaksızın A+ özel hastaneler ve yurtdışı dahil en kapsamlı tedavi imkanını sunar.",
          category: "Sağlık",
        },
        {
          question: "DASK ile konut sigortası arasındaki fark nedir?",
          answer: "DASK yalnızca deprem ve deprem kaynaklı yangın/tsunami hasarlarını yasal limit dahilinde karşılar. Konut sigortası ise hırsızlık, su baskını, fırtına, eşyalarınız ve komşuluk mali mesuliyetini eksiksiz korur.",
          category: "Konut & DASK",
        },
        {
          question: "İşyeri sigortası işletmemin ciro kaybını karşılar mı?",
          answer: "Evet, iş durması teminatı bulunan kurumsal poliçeler yangın, su baskını gibi felaketler sonrası işletmenizin faaliyet gösteremediği dönemdeki kâr kaybını ve sabit giderlerini tazmin eder.",
          category: "Kurumsal",
        },
      ],
    },
    footer: {
      brandDesc: "Gereksiz maddelerden arındırılmış, ihtiyaca özel teminat seçenekleri. Birden fazla sigorta şirketinin teklifleriyle yanınızdayız.",
      coveragesTitle: "Sigortalar",
      practiceTitle: "Kurumsal",
      contactTitle: "İletişim & Merkez",
      allRightsReserved: "Tüm hakları saklıdır.",
      privacy: "KVKK",
      terms: "Gizlilik",
      cookies: "Çerez Politikası",
      backToTop: "Sayfa Başına Dön",
      legalPrivacyTitle: "KVKK Aydınlatma Metni",
      legalTermsTitle: "Kullanım Koşulları & Aracılık Prensipleri",
      legalCookiesTitle: "Çerez Politikası",
      legalDisclosures: [
        "6698 sayılı Kişisel Verilerin Korunması Kanunu (\"KVKK\") uyarınca, AURA SİGORTA tarafından işlenen kişisel verileriniz yalnızca teklif hazırlama, risk analizi ve poliçe tanzimi amacıyla işlenmektedir.",
        "Bilgileriniz teklif talep edilen yetkili sigorta şirketleri, Sigorta Bilgi Merkezi (SBM) ve yasal merciler dışında hiçbir üçüncü tarafla ticari amaçla paylaşılmaz.",
        "KVKK kapsamındaki haklarınız için concierge@aurainsurance.com adresimizden bize dilediğiniz an ulaşabilirsiniz.",
      ],
    },
  },
  de: {
    common: {
      brandName: "AURA VERSICHERUNG",
      brandSubtitle: "Private Kundenberatung & Makler",
      getQuote: "Angebot anfordern",
      callNow: "Jetzt anrufen",
      chatWhatsApp: "WhatsApp",
      online: "Online",
      chatWithAdvisor: "Mit Berater chatten (Online)",
    },
    nav: {
      coverage: "Deckungen",
      philosophy: "Philosophie",
      underwriters: "Versicherer",
      claimsDesk: "Schaden-Desk",
      aboutUs: "Über uns",
      faq: "FAQ",
      navigation: "Navigation",
      claimsActiveNotice: "24/7 Notfall-Schaden-Desk aktiv",
    },
    hero: {
      headline1: "Das Leben ist unberechenbar.",
      headline2: "Ihr Schutz ist absolut.",
      subtitle: "Von erstklassigen Automobilen und Privatanwesen bis hin zu Firmenwerten: Schützen Sie Ihr Vermögen mit maßgeschneiderter Multi-Carrier-Deckung.",
      requestQuote: "Angebot anfordern",
      exploreCoverages: "Deckungen entdecken",
      scroll: "Scrollen",
      autoEyebrow: "01 / AUTOMOBIL",
      autoTitle: "Kompromissloser Schutz für Premium-Fahrzeuge.",
      autoDesc: "Vollkaskoschutz gegen Kollision, Totalschaden, Naturgewalten, Vandalismus und Diebstahl. Individuelle Versicherungskonzepte jenseits von Standardpolicen.",
      autoHighlights: [
        "Unabhängiger Multi-Carrier-Vergleich",
        "Vereinbarter Versicherungswert & Maßarbeit",
        "24/7 persönliches Schaden-Management",
        "Garantierte OEM-Originalersatzteile",
      ],
      autoCta: "Auto-Angebot anfordern",
      autoExplore: "Alle Deckungen anzeigen",
    },
    scenes: {
      headerBadge: "Deckungsportfolio",
      headerTitle: "Präzise Absicherung für höchste Ansprüche",
      navPills: [
        { id: "kasko", order: "01", label: "AUTO" },
        { id: "konut", order: "02", label: "IMMOBILIE" },
        { id: "trafik", order: "03", label: "HAFTPFLICHT" },
        { id: "saglik", order: "04", label: "GESUNDHEIT" },
        { id: "dask", order: "05", label: "KATASTROPHE" },
        { id: "isyeri", order: "06", label: "GEWERBE" },
      ],
      estate: {
        eyebrow: "02 / LUXUSIMMOBILIEN & ANWESEN",
        title: "Ihr Zuhause verdient bedingungslosen Schutz.",
        description: "Umfassender Versicherungsschutz für architektonische Residenzen, Kunstsammlungen und Luxusinterieur gegen Elementarschäden, Wassereinbruch und Haftpflichtansprüche. Inklusive 24/7 Handwerker-Notdienst.",
        badge: "Private Residenzen & Sammlungen",
        highlights: [
          "Volle Wiederbeschaffungskosten für Gebäude & Inventar",
          "Schutz für Kunst, Schmuck und Wertgegenstände",
          "24/7 VIP-Notfallservice und Wiederherstellung",
          "Weltweite private Haftpflichtdeckung",
        ],
        ctaText: "Immobilien-Angebot anfordern",
      },
      liability: {
        eyebrow: "03 / KFZ-HAFTPFLICHT",
        title: "Sicherheit auf jedem Kilometer.",
        description: "Gesetzliche Kfz-Haftpflicht erweitert mit signifikant erhöhten Deckungssummen. Wir vergleichen die führenden Gesellschaften für Ihren optimalen Schutz.",
        badge: "Gesetzliche & Exzess-Haftpflicht",
        highlights: [
          "Maximale Deckungssummen für Personen- & Sachschäden",
          "24/7 Pannen- und Abschlepphilfe inklusive",
          "Integrierter Verkehrs-Rechtsschutz",
          "Schnelle digitale Policenausstellung",
        ],
        ctaText: "Haftpflicht-Angebot anfordern",
      },
      health: {
        eyebrow: "04 / PRIVATE GESUNDHEITSVORSORGE",
        title: "Wenn es um Ihre Gesundheit geht, keine Kompromisse.",
        description: "Direkter Zugang zu führenden internationalen Privatkliniken ohne Wartezeiten. Freie Arztwahl und erstklassige ambulante wie stationäre Versorgung.",
        badge: "Exklusive Vorsorge für Familie & Führungskräfte",
        highlights: [
          "Erstklassige weltweite Klinik- und Facharztnetzwerke",
          "100% Kostenübernahme für stationäre & ambulante Eingriffe",
          "Jährliche Executive-Check-ups und Zahnvorsorge",
          "Weltweiter medizinischer Rücktransport",
        ],
        ctaText: "Gesundheits-Angebot anfordern",
      },
      disaster: {
        eyebrow: "05 / KATASTROPHEN & ERDBEBEN",
        title: "Vorbereitet auf unvorhersehbare Naturgewalten.",
        description: "Robuster Schutz für Ihr Immobilienportfolio gegen Erdbeben, seismische Erschütterungen, Fluten und extreme Wetterphänomene mit schneller Liquiditätsauszahlung.",
        badge: "Elementar- & Katastrophenschutz",
        highlights: [
          "Maximale Deckungssummen institutioneller Pools",
          "Beschleunigte Direktauszahlung im Schadenfall",
          "Rechtssichere Zertifizierung für Grundbuchämter",
          "Automatische Inflations- und Wertanpassung",
        ],
        ctaText: "Katastrophenschutz anfragen",
      },
      commercial: {
        eyebrow: "06 / GEWERBE & UNTERNEHMEN",
        title: "Schützen Sie, was Sie jahrelang aufgebaut haben.",
        description: "Ganzheitliches Risikomanagement für Betriebsanlagen, Maschinen, Betriebsunterbrechungen und Arbeitgeberhaftung für den gehobenen Mittelstand.",
        badge: "Betriebliches Risikomanagement",
        highlights: [
          "Ertragsausfall- & Betriebsunterbrechungsentschädigung",
          "Maschinenbruch-, IT- und Warenlagerschutz",
          "Betriebs- & Produkthaftpflicht auf Top-Niveau",
          "Branchenspezifische Risikoanalyse",
        ],
        ctaText: "Gewerbe-Angebot anfordern",
      },
    },
    whyUs: {
      badge: "Unsere Philosophie & Arbeitsweise",
      title1: "Wir verkaufen keine Standardpolicen.",
      title2: "Wir konstruieren maßgeschneiderten Schutz.",
      desc: "Wir lösen uns von traditionellen, provisionsgetriebenen Mustern. Durch Analyse Ihres individuellen Risikoprofils und Multi-Carrier-Benchmarking erstellen wir Schutzkonzepte von institutioneller Qualität.",
      advantages: [
        {
          id: "1",
          number: "01",
          tag: "Unabhängigkeit",
          title: "Multi-Carrier-Vergleich",
          description: "Ohne Bindung an eine einzelne Gesellschaft analysieren wir unabhängig die Angebote renommierter internationaler Assekuranzen.",
        },
        {
          id: "2",
          number: "02",
          tag: "Individualität",
          title: "Präzise Risikostruktur",
          description: "Wir eliminieren überflüssige Klauseln und sichern echte Vermögensrisiken mit den höchstmöglichen Deckungssummen ab.",
        },
        {
          id: "3",
          number: "03",
          tag: "Schadensfall",
          title: "24/7 Persönlicher Schaden-Desk",
          description: "Im Schadensfall sprechen Sie nicht mit Callcentern, sondern mit Ihrem persönlichen Anwalt für die Schadenregulierung.",
        },
        {
          id: "4",
          number: "04",
          tag: "Partnerschaft",
          title: "Ganzheitliche Lebenszyklusberatung",
          description: "Auch nach Abschluss begleiten wir Sie kontinuierlich bei Vertragsanpassungen und Wertsicherungen.",
        },
      ],
      metrics: [
        { value: "15+", label: "Führende Assekuranzen", sublabel: "Direkter Maklerzugang" },
        { value: "%99.4", label: "Kundenzufriedenheit", sublabel: "Erfolgreiche Schadenregulierung" },
        { value: "12 Min.", label: "Reaktionszeit", sublabel: "Schnelle Angebotsausarbeitung" },
        { value: "24/7", label: "Erreichbarkeit", sublabel: "Persönlicher Notfall-Desk" },
      ],
    },
    marquee: {
      badge: "Internationale Assekuranzpartner",
      subtext: "Vergleichende Angebote und Konsortialdeckung renommierter Erstversicherer",
    },
    proposal: {
      badge: "Vergleichs-Angebotsrechner",
      title: "Ihr Angebot in wenigen Minuten.",
      desc: "Wählen Sie Ihren Absicherungsbedarf; unsere Berater analysieren die besten Konditionen für Sie.",
      step1Label: "1. Versicherungsart wählen",
      activeLabel: "Aktiv",
      types: [
        { id: "kasko", name: "Kasko", tag: "Vollschutz" },
        { id: "trafik", name: "Haftpflicht", tag: "Kfz-Schutz" },
        { id: "saglik", name: "Gesundheit", tag: "Privatpatient" },
        { id: "konut", name: "Wohnen", tag: "Immobilie & Kunst" },
        { id: "dask", name: "Elementar", tag: "Katastrophe" },
        { id: "isyeri", name: "Betrieb", tag: "Gewerbeschutz" },
        { id: "diger", name: "Spezial", tag: "Sonderrisiken" },
      ],
      step2Prefix: "2.",
      fields: {
        kasko: { label: "Kennzeichen / FIN", placeholder: "z.B. B-AU 1234 oder FIN", helper: "Fahrzeug-Identifizierungsnummer oder Kennzeichen" },
        trafik: { label: "Kennzeichen / FIN", placeholder: "z.B. B-AU 1234 oder FIN", helper: "Fahrzeug-Identifizierungsnummer oder Kennzeichen" },
        saglik: { label: "Geburtsjahr & Wohnort", placeholder: "z.B. 1988, Frankfurt", helper: "Für versicherungsmathematische Altersgruppen" },
        konut: { label: "Standort & ca. Wohnfläche (m²)", placeholder: "z.B. München, 240 m²", helper: "Zur Ermittlung des Wiederbeschaffungswerts" },
        dask: { label: "Standort & ca. Wohnfläche (m²)", placeholder: "z.B. München, 240 m²", helper: "Zur Ermittlung des Wiederbeschaffungswerts" },
        isyeri: { label: "Branche & Unternehmenssitz", placeholder: "z.B. Finanzen / Software, Berlin", helper: "Betrieblicher Tätigkeitsbereich" },
        diger: { label: "Angaben zum Absicherungsbedarf", placeholder: "Kurze Beschreibung des Bedarfs...", helper: "Yacht, Kunstsammlung, Cyber etc." },
      },
      step3Label: "3. Ihre Kontaktdaten",
      fullNamePlaceholder: "Vollständiger Name *",
      phonePlaceholder: "Telefonnummer *",
      emailPlaceholder: "E-Mail-Adresse *",
      consent: "Ich willige in die Verarbeitung meiner Kontaktdaten zur Angebotserstellung und Versicherungsberatung gemäß den Datenschutzbestimmungen ein.",
      submitBtn: "Kostenlosen Vergleich anfordern",
      submittingBtn: "Angebote werden analysiert...",
      sslNotice: "256-Bit SSL-verschlüsselte Datenübertragung",
      successTitle: "Anfrage erfolgreich übermittelt.",
      successCodeLabel: "REFERENZNUMMER:",
      successDesc: "Unser Beratungsteam vergleicht aktuell die Konditionen führender Assekuranzen für Sie. Wir melden uns zeitnah.",
      whatsappBtn: "Per WhatsApp kontaktieren",
      resetBtn: "Weitere Anfrage stellen",
      validation: {
        nameRequired: "Bitte geben Sie einen gültigen Namen ein.",
        phoneRequired: "Bitte geben Sie eine gültige Telefonnummer ein.",
        emailRequired: "Bitte geben Sie eine gültige E-Mail-Adresse ein.",
        extraRequired: "Bitte füllen Sie dieses Feld aus.",
        consentRequired: "Bitte stimmen Sie der Datenschutzerklärung zu.",
      },
    },
    claim: {
      badge: "24/7 Notfall- & Schadenregulierung",
      title: "Im Schadensfall sind Sie nicht allein.",
      desc: "Der wahre Wert einer Versicherung zeigt sich am Tag des Schadens. Sie erreichen stets einen festen Experten, keine Warteschleifen.",
      reportBtn: "Schaden sofort melden",
      hotlinePrefix: "24/7 Schaden-Hotline:",
      stepPrefix: "SCHRITT",
      steps: [
        {
          step: "01",
          title: "Sichern & Dokumentieren",
          desc: "Sorgen Sie zuerst für Sicherheit. Fotografieren Sie den Schadensort detailliert, bevor Gegenstände bewegt werden, und füllen Sie den Unfallbericht aus.",
        },
        {
          step: "02",
          title: "24/7 Schaden-Desk anrufen",
          desc: "Kontaktieren Sie unsere Notfall-Hotline oder WhatsApp. Wir organisieren sofort Abschleppdienste und vereidigte Gutachter.",
        },
        {
          step: "03",
          title: "Vollständige Regulierung",
          desc: "Von der Gutachterbestellung über das Ersatzfahrzeug bis zur Auszahlung durch den Versicherer steuern wir den gesamten Prozess.",
        },
      ],
      bannerBadge: "PRIORITÄTS-SCHADEN-DESK",
      bannerTitle: "Schadensfotos und Unfallberichte direkt senden.",
      bannerDesc: "Ihre Unterlagen gehen unmittelbar an den leitenden Sachverständigen.",
      bannerBtn: "Fotos via WhatsApp senden",
      modal: {
        badge: "Schadensfall eröffnen",
        title: "Schadensmeldung",
        desc: "Hinterlassen Sie Ihre Angaben; unser Notfall-Team kontaktiert Sie innerhalb von 5 Minuten.",
        nameLabel: "Vollständiger Name *",
        namePlaceholder: "Name Vorname",
        phoneLabel: "Telefonnummer *",
        phonePlaceholder: "+49 170 0000000",
        typeLabel: "Schadensart",
        typeOptions: [
          { value: "kasko", label: "Kfz-Kollision / Diebstahl" },
          { value: "konut", label: "Wohngebäude / Feuer / Leitungswasser" },
          { value: "saglik", label: "Medizinischer Notfall" },
          { value: "isyeri", label: "Betriebsschaden / Betriebsunterbrechung" },
          { value: "diger", label: "Sonstiger Schadensfall" },
        ],
        noteLabel: "Kurzbeschreibung (Optional)",
        notePlaceholder: "Ort, Abschleppbedarf oder kurze Zusammenfassung...",
        submitBtn: "Schadensmeldung absenden",
        successTitle: "Meldung erfolgreich eingegangen",
        successDesc: "Unser Schadenspezialist meldet sich in wenigen Minuten telefonisch bei Ihnen.",
        closeBtn: "Schließen",
      },
    },
    about: {
      badge: "Über unsere Kanzlei",
      manifesto: "„Wir begreifen Versicherungen nicht als Ansammlung unleserlicher Klauseln. Unsere Aufgabe ist es, Ihr Risiko exakt zu verstehen, perfekten Schutz zu bauen und im Ernstfall bedingungslos an Ihrer Seite zu stehen.“",
      desc: "AURA VERSICHERUNG ist eine unabhängige Maklerkanzlei für gehobene Privat- und Firmenkunden ohne Bindung an einzelne Gesellschaften.",
      principles: [
        "Unabhängiger Multi-Carrier-Marktvergleich",
        "Maßgeschneiderte Risikodeckungen",
        "Persönliche Begleitung im Schadensfall",
      ],
    },
    faq: {
      badge: "Wissensdatenbank",
      title: "Häufig gestellte Fragen",
      desc: "Antworten zu Policenstrukturierung, Deckungssummen und schneller Schadenabwicklung.",
      categoryLabel: "Kategorie:",
      extraQuestionText: "Haben Sie eine spezifische Anfrage zu Ihrem Portfolio?",
      extraQuestionBtn: "Berater via WhatsApp kontaktieren",
      items: [
        {
          question: "Worin liegt der Unterschied zwischen einem Makler und einem Ausschließlichkeitsvertreter?",
          answer: "Einfirmenvertreter sind vertraglich an ihre Gesellschaft gebunden. Wir hingegen agieren als unabhängige Sachwalter Ihrer Interessen und vergleichen den gesamten Assekuranzmarkt.",
          category: "Maklerstatus",
        },
        {
          question: "Was bedeutet die Klausel 'Vereinbarter Wert' (Agreed Value)?",
          answer: "Hierbei wird der Fahrzeug- oder Immobilienwert im Vorfeld vertraglich festgeschrieben, sodass im Totalschadenfall keine Streitigkeiten über Marktwertabzüge entstehen.",
          category: "Policenstruktur",
        },
        {
          question: "Wie schnell reagiert der Schaden-Desk im Notfall?",
          answer: "Unsere Notfallhotline schaltet innerhalb von wenigen Minuten Sofortmaßnahmen wie Abschleppdienste oder Notinstandsetzungen frei.",
          category: "Schadenregulierung",
        },
        {
          question: "Können Privatversicherungen auch weltweite Spitzenkliniken abdecken?",
          answer: "Ja, unsere Premium-Tarife bieten weltweiten Direktabrechnungsservice in führenden Privatkliniken inklusive Notfall-Ambulanzflug.",
          category: "Gesundheit",
        },
        {
          question: "Wie wird der Wiederaufbauwert bei Elementarschäden berechnet?",
          answer: "Wir nutzen professionelle Baukostenindizes, um eine Unterversicherung im Katastrophenfall verlässlich auszuschließen.",
          category: "Elementarschutz",
        },
        {
          question: "Ersetzt die Betriebsversicherung auch den entgangenen Gewinn?",
          answer: "Ja, die Betriebsunterbrechungsversicherung deckt den fortlaufenden Deckungsbeitrag sowie Fixkosten ab.",
          category: "Gewerberisiko",
        },
      ],
    },
    footer: {
      brandDesc: "Präzise Deckungskonzepte für erlesene Sachwerte und unternehmerische Risiken. Unabhängige Konsortialberatung.",
      coveragesTitle: "Deckungen",
      practiceTitle: "Kanzlei",
      contactTitle: "Zentrale & Kontakt",
      allRightsReserved: "Alle Rechte vorbehalten.",
      privacy: "Datenschutz",
      terms: "Impressum & AGB",
      cookies: "Cookie-Richtlinie",
      backToTop: "Nach oben",
      legalPrivacyTitle: "Datenschutzerklärung (DSGVO)",
      legalTermsTitle: "Vermittlerstatus & Geschäftsbedingungen",
      legalCookiesTitle: "Cookie- und Tracking-Richtlinie",
      legalDisclosures: [
        "Gemäß der Datenschutz-Grundverordnung (DSGVO) verarbeitet AURA VERSICHERUNG personenbezogene Daten ausschließlich zur Angebotserstellung, Risikoanalyse und Schadenabwicklung.",
        "Ihre Daten werden nur an beteiligte Risikoträger und Sachverständige weitergeleitet und niemals an Dritte veräußert.",
        "Für Datenschutzanfragen erreichen Sie uns jederzeit unter concierge@aurainsurance.com.",
      ],
    },
  },
  fr: {
    common: {
      brandName: "AURA ASSURANCE",
      brandSubtitle: "Conseil en Gestion des Risques Privés",
      getQuote: "Obtenir un devis",
      callNow: "Appeler",
      chatWhatsApp: "WhatsApp",
      online: "En ligne",
      chatWithAdvisor: "Contacter un conseiller (En ligne)",
    },
    nav: {
      coverage: "Couvertures",
      philosophy: "Philosophie",
      underwriters: "Assureurs",
      claimsDesk: "Sinistres",
      aboutUs: "À propos",
      faq: "FAQ",
      navigation: "Navigation",
      claimsActiveNotice: "Plateforme Sinistres 24h/24 & 7j/7 active",
    },
    hero: {
      headline1: "La vie est imprévisible.",
      headline2: "Votre protection est absolue.",
      subtitle: "De l'automobile d'exception aux domaines de prestige et patrimoines d'entreprise : sécurisez ce qui compte avec un courtage indépendant multi-compagnies.",
      requestQuote: "Obtenir un devis",
      exploreCoverages: "Découvrir les couvertures",
      scroll: "Défiler",
      autoEyebrow: "01 / AUTOMOBILE",
      autoTitle: "Une protection sans compromis pour véhicules de prestige.",
      autoDesc: "Couverture tous risques intégrale : collision, vol, incendie, catastrophes naturelles et bris d'éléments. Des garanties sur mesure au-delà des contrats standards.",
      autoHighlights: [
        "Comparatif indépendant multi-assureurs",
        "Valeur agréée contractuelle & sur-mesure",
        "Gestion dédiée des sinistres 24/7",
        "Pièces d'origine & réparateurs agréés",
      ],
      autoCta: "Devis Automobile",
      autoExplore: "Voir toutes les couvertures",
    },
    scenes: {
      headerBadge: "Portefeuille de Garanties",
      headerTitle: "Souscription de Haute Précision",
      navPills: [
        { id: "kasko", order: "01", label: "AUTO" },
        { id: "konut", order: "02", label: "PROPRIÉTÉ" },
        { id: "trafik", order: "03", label: "RESPONSABILITÉ" },
        { id: "saglik", order: "04", label: "SANTÉ" },
        { id: "dask", order: "05", label: "CATASTROPHE" },
        { id: "isyeri", order: "06", label: "ENTREPRISE" },
      ],
      estate: {
        eyebrow: "02 / DEMEURES & PROPRIÉTÉS DE LUXE",
        title: "Votre sanctuaire mérite une protection absolue.",
        description: "Couverture globale protégeant vos résidences architecturales, œuvres d'art et biens de valeur contre l'incendie, les dégâts des eaux et les aléas majeurs. Conciergerie d'urgence 24/7 incluse.",
        badge: "Résidences de Prestige & Collections",
        highlights: [
          "Reconstruction à valeur à neuf intégrale",
          "Expertise dédiée pour art, haute joaillerie et mobilier",
          "Artisans qualifiés et assistance d'urgence 24h/24",
          "Responsabilité civile vie privée étendue",
        ],
        ctaText: "Devis Propriété de Prestige",
      },
      liability: {
        eyebrow: "03 / RESPONSABILITÉ CIVILE AUTOMOBILE",
        title: "La sérénité à chaque kilomètre.",
        description: "Responsabilité civile automobile renforcée avec des plafonds considérablement rehaussés. Nous négocions auprès des plus grands souscripteurs internationaux.",
        badge: "Responsabilité Civile & Protection Juridique",
        highlights: [
          "Plafonds élevés pour dommages corporels et matériels",
          "Dépannage et remorquage VIP 24h/24",
          "Protection juridique et recours complets",
          "Émission dématérialisée immédiate",
        ],
        ctaText: "Devis Responsabilité",
      },
      health: {
        eyebrow: "04 / SANTÉ & PRÉVOYANCE PRIVÉE",
        title: "Pour votre santé, n'acceptez aucun compromis.",
        description: "Accès prioritaire direct aux plus grands centres hospitaliers et cliniques spécialisées internationales sans liste d'attente. Prise en charge hospitalière et ambulatoire totale.",
        badge: "Santé Exécutive & Famille",
        highlights: [
          "Réseau mondial d'hôpitaux et praticiens renommés",
          "Prise en charge à 100% en chirurgie et ambulatoire",
          "Bilans de santé annuels et soins dentaires complets",
          "Rapatriement sanitaire d'urgence mondial",
        ],
        ctaText: "Devis Santé Privée",
      },
      disaster: {
        eyebrow: "05 / RISQUES MAJEURS & SÉISMES",
        title: "Anticiper l'imprévisible avec sérénité.",
        description: "Protection contre les séismes, inondations et aléas climatiques extrêmes garantissant la pérennité financière de vos investissements immobiliers.",
        badge: "Catastrophes Naturelles & Résilience",
        highlights: [
          "Plafonds maximaux d'indemnisation",
          "Déblocage accéléré des fonds après sinistre",
          "Conformité légale pour actes et registres",
          "Indexation automatique sur l'inflation",
        ],
        ctaText: "Consulter la Couverture Catastrophes",
      },
      commercial: {
        eyebrow: "06 / RISQUES D'ENTREPRISE",
        title: "Protégez les fruits d'années d'efforts.",
        description: "Solutions d'ingénierie des risques pour installations industrielles, parcs machines, pertes d'exploitation et responsabilités des dirigeants.",
        badge: "Gestion des Risques d'Entreprise",
        highlights: [
          "Indemnisation des pertes de marge et de chiffre d'affaires",
          "Garantie bris de machine, stocks et matériels IT",
          "Responsabilité civile exploitation et produits",
          "Audit d'exposition sur mesure",
        ],
        ctaText: "Devis Risques Entreprise",
      },
    },
    whyUs: {
      badge: "Notre Démarche & Philosophie",
      title1: "Nous ne vendons pas de simples contrats.",
      title2: "Nous concevons une protection sur mesure.",
      desc: "Nous dépassons les schémas traditionnels axés sur les commissions. En cartographiant précisément votre exposition, nous combinons les offres des meilleurs assureurs mondiaux pour une couverture irréprochable.",
      advantages: [
        {
          id: "1",
          number: "01",
          tag: "Indépendance",
          title: "Comparatif Multi-Assureurs",
          description: "Libres de tout engagement captif, nous négocions exclusivement dans votre intérêt auprès des plus grands groupes d'assurance.",
        },
        {
          id: "2",
          number: "02",
          tag: "Sur-Mesure",
          title: "Architecture de Risque Précise",
          description: "Nous supprimons les exclusions inutiles et concentrons les garanties sur vos actifs les plus sensibles avec des plafonds adaptés.",
        },
        {
          id: "3",
          number: "03",
          tag: "Gestion Sinistres",
          title: "Cellule Dédiée 24h/24",
          description: "En cas de sinistre, vous échangez directement avec votre conseiller attitré qui défend activement votre dossier d'indemnisation.",
        },
        {
          id: "4",
          number: "04",
          tag: "Pérennité",
          title: "Accompagnement à Long Terme",
          description: "Réévaluation annuelle, mise à jour des valeurs et ajustement face à l'inflation : nous veillons en continu sur votre sérénité.",
        },
      ],
      metrics: [
        { value: "15+", label: "Compagnies Partenaires", sublabel: "Accès direct aux syndicats" },
        { value: "%99.4", label: "Taux de Satisfaction", sublabel: "Règlement effectif des sinistres" },
        { value: "12 min", label: "Délai de Réponse", sublabel: "Étude et devis accélérés" },
        { value: "24/7", label: "Assistance d'Urgence", sublabel: "Service dédié aux sinistres" },
      ],
    },
    marquee: {
      badge: "Souscrit par les Leaders Mondiaux",
      subtext: "Cotations comparatives et co-assurance auprès des plus grandes compagnies mondiales",
    },
    proposal: {
      badge: "Moteur de Comparaison Tarifaire",
      title: "Recevez vos propositions en quelques minutes.",
      desc: "Sélectionnez votre besoin de garantie et nos experts élaborent une étude personnalisée parmi les meilleurs souscripteurs.",
      step1Label: "1. Choisir le type d'assurance",
      activeLabel: "Actif",
      types: [
        { id: "kasko", name: "Auto", tag: "Tous Risques" },
        { id: "trafik", name: "Responsabilité", tag: "Auto RC" },
        { id: "saglik", name: "Santé", tag: "Exécutive" },
        { id: "konut", name: "Propriété", tag: "Demeure & Art" },
        { id: "dask", name: "Catastrophes", tag: "Séisme" },
        { id: "isyeri", name: "Entreprise", tag: "Professionnel" },
        { id: "diger", name: "Spécial", tag: "Sur-Mesure" },
      ],
      step2Prefix: "2.",
      fields: {
        kasko: { label: "Immatriculation ou N° de châssis (VIN)", placeholder: "Ex: 34 ABC 1234 ou VIN", helper: "Identifiant officiel de votre véhicule" },
        trafik: { label: "Immatriculation ou N° de châssis (VIN)", placeholder: "Ex: 34 ABC 1234 ou VIN", helper: "Identifiant officiel de votre véhicule" },
        saglik: { label: "Année de naissance & Ville de résidence", placeholder: "Ex: 1988, Paris", helper: "Pour le calcul actuariel et les réseaux de soins" },
        konut: { label: "Localisation & Surface approximative (m²)", placeholder: "Ex: Neuilly, 250 m²", helper: "Pour l'estimation de la valeur de reconstruction" },
        dask: { label: "Localisation & Surface approximative (m²)", placeholder: "Ex: Neuilly, 250 m²", helper: "Pour l'estimation de la valeur de reconstruction" },
        isyeri: { label: "Secteur d'activité & Ville du siège", placeholder: "Ex: Conseil financier / Tech, Lyon", helper: "Domaine d'exploitation et effectifs" },
        diger: { label: "Précisions sur vos besoins", placeholder: "Brève description de la couverture souhaitée...", helper: "Yacht, collection d'art, cyber-risques, etc." },
      },
      step3Label: "3. Vos Coordonnées",
      fullNamePlaceholder: "Nom & Prénom *",
      phonePlaceholder: "Numéro de téléphone *",
      emailPlaceholder: "Adresse e-mail *",
      consent: "J'accepte le traitement de mes coordonnées pour l'élaboration de devis d'assurance et le conseil en conformité avec la réglementation sur les données personnelles.",
      submitBtn: "Obtenir une étude comparative gratuite",
      submittingBtn: "Analyse des compagnies en cours...",
      sslNotice: "Formulaire sécurisé et chiffré SSL 256 bits",
      successTitle: "Demande transmise avec succès.",
      successCodeLabel: "CODE DE RÉFÉRENCE :",
      successDesc: "Notre cabinet analyse actuellement les meilleures conditions auprès des compagnies. Un conseiller prendra contact très prochainement.",
      whatsappBtn: "Échanger via WhatsApp",
      resetBtn: "Nouvelle demande de devis",
      validation: {
        nameRequired: "Veuillez renseigner un nom valide.",
        phoneRequired: "Veuillez renseigner un numéro de téléphone valide.",
        emailRequired: "Veuillez renseigner une adresse e-mail valide.",
        extraRequired: "Veuillez compléter ce champ requis.",
        consentRequired: "Vous devez accepter les conditions pour continuer.",
      },
    },
    claim: {
      badge: "Assistance Sinistres 24/7",
      title: "Lors d'un sinistre, vous n'êtes jamais seul.",
      desc: "La valeur réelle d'une assurance se juge au moment du sinistre. Vous dialoguez directement avec un expert attitré, sans serveur vocal interactif.",
      reportBtn: "Déclarer un sinistre urgent",
      hotlinePrefix: "Ligne d'urgence 24/7 :",
      stepPrefix: "ÉTAPE",
      steps: [
        {
          step: "01",
          title: "Sécuriser & Photographier",
          desc: "Assurez en priorité votre sécurité physique. Prenez des photos détaillées du lieu avant tout déplacement et remplissez le constat d'accident.",
        },
        {
          step: "02",
          title: "Appeler notre Permanence 24/7",
          desc: "Contactez notre ligne d'urgence ou WhatsApp. Nous missionnons immédiatement le dépannage et mandatons un expert agréé.",
        },
        {
          step: "03",
          title: "Suivi Intégral du Dossier",
          desc: "De la mise à disposition d'un véhicule de remplacement jusqu'au versement des indemnités, nous pilotons chaque phase.",
        },
      ],
      bannerBadge: "CONCIERGERIE SINISTRES PRIORITAIRE",
      bannerTitle: "Transmettez vos constats et photos instantanément.",
      bannerDesc: "Votre dossier est immédiatement orienté vers l'expert dédié.",
      bannerBtn: "Envoyer les photos via WhatsApp",
      modal: {
        badge: "Déclarer un Sinistre",
        title: "Notification de Sinistre",
        desc: "Renseignez vos coordonnées ; notre service de permanence vous contacte sous 5 minutes.",
        nameLabel: "Nom & Prénom *",
        namePlaceholder: "Nom complet",
        phoneLabel: "Numéro de téléphone *",
        phonePlaceholder: "+33 6 00 00 00 00",
        typeLabel: "Type de Sinistre",
        typeOptions: [
          { value: "kasko", label: "Collision Automobile / Vol" },
          { value: "konut", label: "Habitation / Incendie / Dégât des Eaux" },
          { value: "saglik", label: "Urgence Médicale" },
          { value: "isyeri", label: "Sinistre Professionnel / Pertes d'Exploitation" },
          { value: "diger", label: "Autre Sinistre Spécifique" },
        ],
        noteLabel: "Résumé des faits (Optionnel)",
        notePlaceholder: "Lieu, besoin de remorquage ou brève description...",
        submitBtn: "Alerter la permanence sinistres",
        successTitle: "Alerte Sinistre Enregistrée",
        successDesc: "Notre expert prendra contact avec vous dans quelques instants. Vous êtes accompagné.",
        closeBtn: "Fermer",
      },
    },
    about: {
      badge: "Notre Cabinet",
      manifesto: "« Nous ne concevons pas l'assurance comme une succession de clauses absconses. Notre rôle est de comprendre avec précision votre risque, d'élaborer une couverture sans faille et d'être à vos côtés au moment décisif. »",
      desc: "AURA ASSURANCE est un cabinet de courtage indépendant opérant en toute liberté vis-à-vis des compagnies, guidé par la transparence et la réactivité.",
      principles: [
        "Comparatif Indépendant Multi-Compagnies",
        "Architecture de Garanties Sur-Mesure",
        "Défense Dédiée de Vos Intérêts Sinistres",
      ],
    },
    faq: {
      badge: "Centre de Ressources",
      title: "Questions Fréquentes",
      desc: "Éléments de réponse sur nos méthodes de souscription et la gestion réactive de vos sinistres.",
      categoryLabel: "Catégorie :",
      extraQuestionText: "Vous avez une demande spécifique concernant vos garanties ?",
      extraQuestionBtn: "Consulter nos experts sur WhatsApp",
      items: [
        {
          question: "En quoi un courtier indépendant diffère-t-il d'un agent général d'assurance ?",
          answer: "L'agent général est mandataire exclusif d'une seule compagnie. En tant que courtier indépendant, nous sommes mandataires de nos clients et consultons l'ensemble des assureurs du marché international pour obtenir les meilleures garanties.",
          category: "Statut de Courtier",
        },
        {
          question: "Pourquoi privilégier la garantie en 'Valeur Agréée' pour un véhicule ou une propriété ?",
          answer: "La valeur agréée fixe contractuellement la valeur d'indemnisation dès la souscription, évitant toute décote marchande discutable en cas de perte totale.",
          category: "Structure de Contrat",
        },
        {
          question: "Quelle est la procédure immédiate en cas de sinistre ?",
          answer: "Notre permanence 24/7 prend immédiatement le relais : assistance remorquage, envoi d'experts indépendants et prise en charge intégrale des réparations.",
          category: "Gestion des Sinistres",
        },
        {
          question: "Les contrats de santé permettent-ils des soins dans des cliniques internationales ?",
          answer: "Oui, nos formules haut de gamme intègrent le tiers-payant international dans les centres médicaux de premier ordre en Europe et en Amérique du Nord.",
          category: "Santé Internationale",
        },
        {
          question: "Comment évaluez-vous les capitaux de reconstruction après catastrophe naturelle ?",
          answer: "Nous utilisons des grilles d'évaluation précises tenant compte des matériaux de prestige et des indices réels du coût de la construction.",
          category: "Risques Immobiliers",
        },
        {
          question: "Une police professionnelle compense-t-elle la baisse de chiffre d'affaires ?",
          answer: "Absolument. La garantie pertes d'exploitation compense la marge brute perdue et prend en charge les frais fixes durant la période d'interruption.",
          category: "Risques d'Entreprise",
        },
      ],
    },
    footer: {
      brandDesc: "Ingénierie de garanties personnalisée pour biens précieux et risques d'exception. Courtage indépendant d'élite.",
      coveragesTitle: "Couvertures",
      practiceTitle: "Le Cabinet",
      contactTitle: "Siège & Contacts",
      allRightsReserved: "Tous droits réservés.",
      privacy: "Confidentialité",
      terms: "Mentions Légales",
      cookies: "Politique de Cookies",
      backToTop: "Haut de page",
      legalPrivacyTitle: "Protection des Données Personnelles (RGPD)",
      legalTermsTitle: "Conditions d'Exercice & Réglementation",
      legalCookiesTitle: "Politique d'Utilisation des Cookies",
      legalDisclosures: [
        "Conformément au Règlement Général sur la Protection des Données (RGPD), les données traitées par AURA ASSURANCE sont réservées à l'évaluation des risques et à la souscription des polices.",
        "Vos informations ne sont transmises qu'aux assureurs et experts mandatés pour vos dossiers et ne font l'objet d'aucune commercialisation tierce.",
        "Pour exercer vos droits d'accès ou d'effacement, contactez notre délégué à la protection des données : concierge@aurainsurance.com.",
      ],
    },
  },
  es: {
    common: {
      brandName: "AURA SEGUROS",
      brandSubtitle: "Asesoría de Seguros Privados",
      getQuote: "Solicitar cotización",
      callNow: "Llamar ahora",
      chatWhatsApp: "WhatsApp",
      online: "En línea",
      chatWithAdvisor: "Chatear con Asesor (En línea)",
    },
    nav: {
      coverage: "Coberturas",
      philosophy: "Filosofía",
      underwriters: "Aseguradoras",
      claimsDesk: "Siniestros",
      aboutUs: "Sobre nosotros",
      faq: "Preguntas",
      navigation: "Navegación",
      claimsActiveNotice: "Mesa de Siniestros 24/7 Activa",
    },
    hero: {
      headline1: "La vida es impredecible.",
      headline2: "Su protección es absoluta.",
      subtitle: "Desde automóviles selectos y fincas exclusivas hasta salud ejecutiva y empresas: proteja todo su patrimonio con suscripción independiente multirriesgo.",
      requestQuote: "Solicitar cotización",
      exploreCoverages: "Explorar coberturas",
      scroll: "Desplazar",
      autoEyebrow: "01 / AUTOMÓVIL",
      autoTitle: "Protección sin concesiones para vehículos selectos.",
      autoDesc: "Cobertura total a todo riesgo: colisión, robo, fenómenos naturales y vandalismo. Pólizas a medida diseñadas más allá de los límites habituales.",
      autoHighlights: [
        "Cotizaciones comparativas multiaseguradora",
        "Valor acordado y coberturas a medida",
        "Gestión personalizada de siniestros 24/7",
        "Piezas de recambio originales y talleres certificados",
      ],
      autoCta: "Cotizar Seguro Auto",
      autoExplore: "Ver todas las coberturas",
    },
    scenes: {
      headerBadge: "Portafolio de Coberturas",
      headerTitle: "Suscripción de Alta Precisión para su Patrimonio",
      navPills: [
        { id: "kasko", order: "01", label: "AUTO" },
        { id: "konut", order: "02", label: "HOGAR" },
        { id: "trafik", order: "03", label: "RESPONSABILIDAD" },
        { id: "saglik", order: "04", label: "SALUD" },
        { id: "dask", order: "05", label: "CATÁSTROFE" },
        { id: "isyeri", order: "06", label: "EMPRESAS" },
      ],
      estate: {
        eyebrow: "02 / FINCAS & HOGARES DE LUJO",
        title: "Su hogar merece una protección incondicional.",
        description: "Cobertura integral para residencias arquitectónicas, colecciones de arte y bienes valiosos contra incendios, daños por agua y responsabilidad personal. Asistencia 24/7 incluida.",
        badge: "Residencias Privadas & Colecciones",
        highlights: [
          "Reposición a valor nuevo de estructura y contenido",
          "Tasación especializada de obras de arte y joyas",
          "Asistencia de emergencia en el hogar 24 horas",
          "Límites ampliados de responsabilidad civil familiar",
        ],
        ctaText: "Cotizar Seguro Hogar",
      },
      liability: {
        eyebrow: "03 / RESPONSABILIDAD CIVIL AUTOMÓVIL",
        title: "Confianza total en cada trayecto.",
        description: "Responsabilidad civil obligatoria y voluntaria con límites superiores. Comparamos las mejores aseguradoras internacionales para su máxima tranquilidad legal.",
        badge: "Responsabilidad Civil & Defensa",
        highlights: [
          "Límites superiores en daños corporales y materiales",
          "Asistencia en carretera y remolque 24/7 sin coste",
          "Cobertura legal y defensa jurídica integrada",
          "Emisión digital inmediata de la póliza",
        ],
        ctaText: "Cotizar Responsabilidad Civil",
      },
      health: {
        eyebrow: "04 / SALUD PRIVADA & VIDA",
        title: "Cuando su salud está en juego, no acepte concesiones.",
        description: "Acceso preferente a los hospitales privados más prestigiosos del mundo sin listas de espera. Libre elección de especialistas médicos y cobertura clínica completa.",
        badge: "Salud Ejecutiva & Familiar",
        highlights: [
          "Red hospitalaria internacional de primer nivel",
          "100% de cobertura en hospitalización y cirugías",
          "Chequeos ejecutivos anuales y cobertura dental",
          "Evacuación médica de emergencia mundial",
        ],
        ctaText: "Cotizar Salud Privada",
      },
      disaster: {
        eyebrow: "05 / RIESGOS CATASTRÓFICOS & SÍSMICOS",
        title: "Preparados ante cualquier fenómeno imprevisto.",
        description: "Protección frente a terremotos, inundaciones y fenómenos meteorológicos extremos con liquidación ágil de indemnizaciones.",
        badge: "Protección Sísmica & Catastrófica",
        highlights: [
          "Límites máximos de indemnización garantizados",
          "Protocolo de desembolso rápido post-catástrofe",
          "Validez legal para registros notariales y propiedad",
          "Ajuste automático por inflación y revalorización",
        ],
        ctaText: "Consultar Cobertura Catástrofes",
      },
      commercial: {
        eyebrow: "06 / SEGUROS DE EMPRESA",
        title: "Proteja lo que ha tardado años en construir.",
        description: "Ingeniería de riesgos para instalaciones comerciales, maquinaria, paralización de actividad y responsabilidad patronal para medianas y grandes corporaciones.",
        badge: "Gestión de Riesgos Corporativos",
        highlights: [
          "Compensación por pérdida de ingresos y lucro cesante",
          "Avería de maquinaria, equipamiento tecnológico y stock",
          "Responsabilidad civil patronal y de productos",
          "Auditoría de riesgos específica por sector",
        ],
        ctaText: "Cotizar Seguro de Empresa",
      },
    },
    whyUs: {
      badge: "Nuestra Filosofía & Método",
      title1: "No vendemos pólizas genéricas.",
      title2: "Diseñamos una protección de precisión.",
      desc: "Dejamos atrás los modelos tradicionales de comisión fija. Analizamos su perfil integral de riesgo y contrastamos propuestas de aseguradoras globales para estructurar una protección impecable.",
      advantages: [
        {
          id: "1",
          number: "01",
          tag: "Independencia",
          title: "Comparativa Multiaseguradora",
          description: "Sin ataduras a una sola marca aseguradora, negociamos en el mercado global exclusivamente en favor de sus intereses.",
        },
        {
          id: "2",
          number: "02",
          tag: "Personalización",
          title: "Estructura de Riesgo a Medida",
          description: "Eliminamos coberturas innecesarias y blindamos sus activos estratégicos con los capitales asegurados más elevados.",
        },
        {
          id: "3",
          number: "03",
          tag: "Atención al Siniestro",
          title: "Mesa de Siniestros 24/7",
          description: "En caso de incidente, trata con un experto dedicado que defiende activamente su expediente de indemnización.",
        },
        {
          id: "4",
          number: "04",
          tag: "Confianza Continua",
          title: "Asesoramiento Continuo",
          description: "Actualización de pólizas, seguimiento de valoraciones y gestión ante la inflación: protegemos su patrimonio permanentemente.",
        },
      ],
      metrics: [
        { value: "15+", label: "Aseguradoras Líderes", sublabel: "Acceso directo a consorcios" },
        { value: "%99.4", label: "Satisfacción en Siniestros", sublabel: "Resolución ágil de expedientes" },
        { value: "12 min", label: "Tiempo de Respuesta", sublabel: "Estudio comparativo ágil" },
        { value: "24/7", label: "Atención Permanente", sublabel: "Mesa de ayuda para siniestros" },
      ],
    },
    marquee: {
      badge: "Respaldado por Aseguradoras Globales",
      subtext: "Cotizaciones comparativas y coseguro institucional con aseguradoras de primer nivel",
    },
    proposal: {
      badge: "Motor de Cotización Comparativa",
      title: "Reciba sus propuestas en pocos minutos.",
      desc: "Seleccione la cobertura requerida y nuestro equipo de asesoría formulará opciones personalizadas entre los mejores consorcios aseguradores.",
      step1Label: "1. Seleccione el Tipo de Seguro",
      activeLabel: "Activo",
      types: [
        { id: "kasko", name: "Auto", tag: "Todo Riesgo" },
        { id: "trafik", name: "Responsabilidad", tag: "RC Auto" },
        { id: "saglik", name: "Salud", tag: "Ejecutiva" },
        { id: "konut", name: "Hogar", tag: "Fincas & Arte" },
        { id: "dask", name: "Catástrofes", tag: "Sísmico" },
        { id: "isyeri", name: "Empresa", tag: "Comercial" },
        { id: "diger", name: "Especial", tag: "A Medida" },
      ],
      step2Prefix: "2.",
      fields: {
        kasko: { label: "Matrícula o N° de Bastidor (VIN)", placeholder: "Ej: 34 ABC 1234 o VIN", helper: "Identificador oficial del vehículo" },
        trafik: { label: "Matrícula o N° de Bastidor (VIN)", placeholder: "Ej: 34 ABC 1234 o VIN", helper: "Identificador oficial del vehículo" },
        saglik: { label: "Año de Nacimiento y Ciudad", placeholder: "Ej: 1988, Madrid", helper: "Para tarificación actuarial y red hospitalaria" },
        konut: { label: "Ubicación y Superficie aprox. (m²)", placeholder: "Ej: Salamanca, 220 m²", helper: "Para estimar el valor de reposición" },
        dask: { label: "Ubicación y Superficie aprox. (m²)", placeholder: "Ej: Salamanca, 220 m²", helper: "Para estimar el valor de reposición" },
        isyeri: { label: "Sector de Actividad y Ciudad", placeholder: "Ej: Consultoría / Tecnología, Barcelona", helper: "Ámbito empresarial y plantilla" },
        diger: { label: "Detalles sobre la cobertura deseada", placeholder: "Breve descripción de los requisitos...", helper: "Embarcación, obras de arte, ciberriesgo, etc." },
      },
      step3Label: "3. Datos de Contacto",
      fullNamePlaceholder: "Nombre y Apellidos *",
      phonePlaceholder: "Teléfono de Contacto *",
      emailPlaceholder: "Correo Electrónico *",
      consent: "Acepto el tratamiento de mis datos personales para la elaboración de propuestas de seguro y asesoramiento conforme a la normativa de privacidad.",
      submitBtn: "Obtener Cotización Comparativa",
      submittingBtn: "Analizando aseguradoras...",
      sslNotice: "Formulario con encriptación SSL de 256 bits",
      successTitle: "Solicitud Recibida con Éxito.",
      successCodeLabel: "CÓDIGO DE REFERENCIA:",
      successDesc: "Nuestro equipo está evaluando las condiciones con las principales aseguradoras para su cobertura. Un asesor se comunicará a la brevedad.",
      whatsappBtn: "Contactar por WhatsApp",
      resetBtn: "Enviar Otra Solicitud",
      validation: {
        nameRequired: "Por favor, introduzca un nombre válido.",
        phoneRequired: "Por favor, introduzca un número de teléfono válido.",
        emailRequired: "Por favor, introduzca un correo electrónico válido.",
        extraRequired: "Por favor, complete este campo obligatorio.",
        consentRequired: "Debe aceptar la cláusula de privacidad para continuar.",
      },
    },
    claim: {
      badge: "Asistencia Inmediata 24/7",
      title: "Ante un siniestro, nunca estará solo.",
      desc: "El valor real de una póliza se demuestra en el siniestro. Tratará directamente con un asesor personal, sin esperas en locuciones automatizadas.",
      reportBtn: "Notificar Siniestro Urgente",
      hotlinePrefix: "Línea de Siniestros 24/7:",
      stepPrefix: "PASO",
      steps: [
        {
          step: "01",
          title: "Proteger & Fotografiar",
          desc: "Priorice su seguridad personal. Tome fotografías de ángulo amplio antes de mover vehículos o enseres y complete el parte de accidente.",
        },
        {
          step: "02",
          title: "Llamar a la Mesa 24/7",
          desc: "Contacte con nuestra línea de emergencias o WhatsApp. Gestionamos de inmediato el servicio de grúa y asignamos perito autorizado.",
        },
        {
          step: "03",
          title: "Seguimiento y Liquidación",
          desc: "Desde la peritación y el vehículo de cortesía hasta el cobro de la indemnización, gestionamos su expediente íntegramente.",
        },
      ],
      bannerBadge: "ATENCIÓN DE SINIESTROS PRIORITARIA",
      bannerTitle: "Envíe atestados o fotografías del siniestro al instante.",
      bannerDesc: "Su expediente se transmite inmediatamente al perito responsable.",
      bannerBtn: "Enviar Fotografías por WhatsApp",
      modal: {
        badge: "Abrir Expediente de Siniestro",
        title: "Declaración de Siniestro",
        desc: "Indique sus datos; nuestro equipo de guardia le llamará en menos de 5 minutos.",
        nameLabel: "Nombre y Apellidos *",
        namePlaceholder: "Nombre completo",
        phoneLabel: "Teléfono de Contacto *",
        phonePlaceholder: "+34 600 000 000",
        typeLabel: "Tipo de Siniestro",
        typeOptions: [
          { value: "kasko", label: "Colisión de Vehículo / Robo" },
          { value: "konut", label: "Hogar / Incendio / Daños por Agua" },
          { value: "saglik", label: "Urgencia Médica" },
          { value: "isyeri", label: "Daños en Empresa / Lucro Cesante" },
          { value: "diger", label: "Otro Siniestro Específico" },
        ],
        noteLabel: "Resumen del suceso (Opcional)",
        notePlaceholder: "Lugar, necesidad de grúa o resumen de los hechos...",
        submitBtn: "Avisar a la Mesa de Siniestros",
        successTitle: "Aviso de Siniestro Registrado",
        successDesc: "Nuestro especialista en siniestros le llamará en unos minutos. Está en buenas manos.",
        closeBtn: "Cerrar",
      },
    },
    about: {
      badge: "Sobre Nuestra Firma",
      manifesto: "«No entendemos el seguro como un conjunto de cláusulas incomprensibles. Nuestra labor es entender al detalle su riesgo, diseñar una cobertura impecable y defenderle cuando más lo necesita.»",
      desc: "AURA SEGUROS es una correduría independiente sin compromisos de exclusividad, guiada por la transparencia total y la agilidad de respuesta.",
      principles: [
        "Comparativa Multiaseguradora Independiente",
        "Diseño de Coberturas Personalizadas",
        "Defensa Activa en Siniestros",
      ],
    },
    faq: {
      badge: "Centro de Información",
      title: "Preguntas Frecuentes",
      desc: "Respuestas clave sobre estructuración de pólizas y resolución rápida de siniestros.",
      categoryLabel: "Categoría:",
      extraQuestionText: "¿Tiene una consulta o un caso específico de aseguramiento?",
      extraQuestionBtn: "Consultar con Asesores por WhatsApp",
      items: [
        {
          question: "¿Qué diferencia a una correduría independiente de una agencia exclusiva?",
          answer: "Las agencias exclusivas solo ofrecen pólizas de su compañía. Como correduría independiente, analizamos imparcialmente todo el mercado para conseguir las condiciones más ventajosas.",
          category: "Modelo de Correduría",
        },
        {
          question: "¿Cómo funciona la cláusula de 'Valor Acordado' en vehículos y propiedades?",
          answer: "El valor acordado establece contractualmente la suma de reposición en el momento de emisión, eliminando discusiones sobre depreciación de mercado en caso de siniestro total.",
          category: "Estructura de Póliza",
        },
        {
          question: "¿Qué ocurre inmediatamente después de declarar un siniestro?",
          answer: "Nuestra mesa activa el protocolo de emergencia en menos de 5 minutos, tramitando asistencia en viaje, peritaje y coordinación directa de reparaciones.",
          category: "Siniestros",
        },
        {
          question: "¿Puedo acceder a clínicas internacionales con el seguro de salud privado?",
          answer: "Sí, nuestras coberturas de salud ejecutiva cuentan con liquidación directa en centros hospitalarios de referencia en Europa y Norteamérica.",
          category: "Salud Internacional",
        },
        {
          question: "¿Cómo se calculan los límites de reconstrucción ante catástrofes naturales?",
          answer: "Empleamos índices arquitectónicos y baremos de edificación reales para evitar situaciones de infraseguro en caso de desastre sísmico o climático.",
          category: "Bienes Inmuebles",
        },
        {
          question: "¿La póliza comercial cubre la paralización de negocio y pérdida de beneficios?",
          answer: "Por supuesto. La cobertura de lucro cesante compensa el margen bruto no generado y abona los costes fijos durante el periodo de inactividad de la empresa.",
          category: "Riesgos de Empresa",
        },
      ],
    },
    footer: {
      brandDesc: "Ingeniería aseguradora a medida para patrimonios exclusivos y riesgos empresariales. Corretaje independiente de referencia.",
      coveragesTitle: "Coberturas",
      practiceTitle: "La Firma",
      contactTitle: "Sede Central & Contacto",
      allRightsReserved: "Todos los derechos reservados.",
      privacy: "Privacidad",
      terms: "Términos Legales",
      cookies: "Política de Cookies",
      backToTop: "Volver arriba",
      legalPrivacyTitle: "Política de Privacidad y Protección de Datos",
      legalTermsTitle: "Términos de Mediación Aseguradora",
      legalCookiesTitle: "Política de Cookies",
      legalDisclosures: [
        "Conforme a la normativa europea de protección de datos (RGPD), los datos tratados por AURA SEGUROS se destinan estrictamente a la tarificación, suscripción de pólizas y atención de siniestros.",
        "Sus datos se compartirán únicamente con las aseguradoras y peritos intervinientes en su expediente, sin cesión comercial a terceros.",
        "Para ejercer sus derechos de acceso o cancelación, contacte con concierge@aurainsurance.com.",
      ],
    },
  },
};
