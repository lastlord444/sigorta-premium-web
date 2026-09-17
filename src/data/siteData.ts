export interface InsuranceProduct {
  id: string;
  order: string;
  name: string;
  headline: string;
  description: string;
  highlights: string[];
  metaBadge: string;
  formType: "kasko" | "trafik" | "saglik" | "konut" | "dask" | "isyeri" | "diger";
}

export interface AdvantageItem {
  id: string;
  title: string;
  description: string;
  number: string;
  tag: string;
}

export interface MetricItem {
  value: string;
  label: string;
  sublabel: string;
}

export interface PartnerCompany {
  id: string;
  name: string;
  shortName: string;
  category: string;
}

export interface FaqItem {
  question: string;
  answer: string;
  category: string;
}

export const siteConfig = {
  name: "AURA INSURANCE",
  tagline: "Independent & Bespoke Insurance Advisory",
  licenseNo: "Licensed Independent Insurance Advisory & Brokerage",
  phone: "+1 (800) 555-AURA",
  phoneRaw: "+18005552872",
  whatsapp: "+1 (555) 019-2020",
  whatsappRaw: "15550192020",
  email: "concierge@aurainsurance.com",
  address: "Financial District, 550 Grand Avenue, Suite 1400",
  workingHours: "Weekdays: 08:30 - 18:30 | 24/7 Concierge Claims Desk",
  socials: {
    instagram: "https://instagram.com",
    linkedin: "https://linkedin.com",
    x: "https://x.com",
    facebook: "https://facebook.com",
  },
};

export const productsData: InsuranceProduct[] = [
  {
    id: "kasko",
    order: "01",
    name: "COMPREHENSIVE AUTO",
    headline: "Protect your freedom on every journey.",
    description: "Full-coverage protection against collision, theft, natural perils, vandalism, and third-party liabilities. Elevate beyond standard policies with agreed-value coverage, prestige loaner vehicles, and OEM certified repair facilities.",
    highlights: [
      "OEM replacement parts & certified repair guarantee",
      "Unlimited prestige loaner vehicle option",
      "24/7 priority roadside dispatch & towing",
      "International cross-border coverage extension"
    ],
    metaBadge: "Agreed Value Protection",
    formType: "kasko"
  },
  {
    id: "konut",
    order: "02",
    name: "ESTATE & PROPERTY",
    headline: "A home is far more than four walls.",
    description: "Safeguard your residence, architectural investments, luxury furnishings, and private collections against fire, severe storm, internal water damage, and comprehensive personal liability. Complete with 24/7 emergency artisan support.",
    highlights: [
      "Guaranteed building & contents replacement value",
      "Global personal & premises liability protection",
      "24/7 rapid-response emergency home repair concierge",
      "Smart home systems & valuable electronics coverage"
    ],
    metaBadge: "Prime Residential Coverage",
    formType: "konut"
  },
  {
    id: "trafik",
    order: "03",
    name: "MOTOR LIABILITY",
    headline: "Unshakable confidence on every highway.",
    description: "Far beyond standard statutory minimums. We tailor elevated excess liability limits and comprehensive legal defense packages to ensure complete financial insulation against unexpected multi-party road incidents.",
    highlights: [
      "Substantially elevated third-party bodily & property limits",
      "24/7 complimentary nationwide roadside assistance",
      "Integrated legal defense & litigation coverage",
      "Instant digital certificate & automated renewals"
    ],
    metaBadge: "Excess Liability Protection",
    formType: "trafik"
  },
  {
    id: "saglik",
    order: "04",
    name: "PRIVATE HEALTH & LIFE",
    headline: "When health is at stake, compromise is never an option.",
    description: "Direct priority access to elite private medical centers, top surgical specialists, and world-renowned clinics without waiting lists. Bespoke family wellness, preventive care, and global emergency evacuation.",
    highlights: [
      "Premier global hospital & specialist networks",
      "Comprehensive inpatient and outpatient medical coverage",
      "Annual executive wellness & diagnostic screenings",
      "Worldwide medical concierge & air ambulance dispatch"
    ],
    metaBadge: "Executive Wellness Plan",
    formType: "saglik"
  },
  {
    id: "dask",
    order: "05",
    name: "DISASTER & RESILIENCE",
    headline: "Built to withstand the unexpected.",
    description: "Robust catastrophic protection insulating your real estate portfolios against earthquake, seismic tremors, flood, and extreme atmospheric phenomena. Backed by institutional reinsurance and rapid claims liquidity.",
    highlights: [
      "Comprehensive catastrophic & seismic event coverage",
      "Expedited liquidity payout protocol upon disaster declaration",
      "Structural reconstruction & temporary accommodation support",
      "Streamlined institutional underwriting & title verification"
    ],
    metaBadge: "Catastrophe Contingency",
    formType: "dask"
  },
  {
    id: "isyeri",
    order: "06",
    name: "COMMERCIAL & ENTERPRISE",
    headline: "Never leave what took decades to build vulnerable.",
    description: "Multidimensional enterprise risk engineering protecting corporate facilities, machinery, intellectual assets, and key executives. From boutique advisory firms to multi-tier industrial operations.",
    highlights: [
      "Business interruption & lost revenue reimbursement",
      "Machinery breakdown, cyber risk & data restoration",
      "Comprehensive employer & commercial general liability",
      "Custom risk audit by certified industry underwriters"
    ],
    metaBadge: "Corporate Risk Advisory",
    formType: "isyeri"
  }
];

export const whyUsAdvantages: AdvantageItem[] = [
  {
    id: "multi-quote",
    number: "01",
    tag: "MULTI-CARRIER",
    title: "Comparative Top-Tier Underwriting",
    description: "We are never beholden to a single carrier. We benchmark quotes across leading global underwriters to engineer optimal coverage tailored to your budget and exact risk profile."
  },
  {
    id: "tailored-coverage",
    number: "02",
    tag: "BESPOKE DESIGN",
    title: "Precision Coverage Architecture",
    description: "No generic boilerplate. We eliminate unnecessary exclusions and zero in on your authentic lifestyle and asset vulnerabilities."
  },
  {
    id: "full-lifecycle",
    number: "03",
    tag: "CONCIERGE CARE",
    title: "Full Policy Lifecycle Advisory",
    description: "From initial risk assessment and seamless policy bound execution to annual rate audits and effortless renewals, our advisors stand by your side."
  },
  {
    id: "human-claim",
    number: "04",
    tag: "ADVOCACY",
    title: "Dedicated Claims Advocacy",
    description: "When an incident occurs, you never deal with automated call centers. Your assigned claims advocate coordinates adjusters, repair logistics, and rapid financial settlements."
  }
];

export const metricsData: MetricItem[] = [
  {
    value: "20+",
    label: "Underwriter Partners",
    sublabel: "Independent multi-carrier benchmark"
  },
  {
    value: "100%",
    label: "Bespoke Policies",
    sublabel: "Tailored to your exact risk profile"
  },
  {
    value: "24/7",
    label: "Concierge Assistance",
    sublabel: "Direct emergency dispatch"
  },
  {
    value: "< 15m",
    label: "Rapid Quote Turnaround",
    sublabel: "Comparative advisory proposal"
  }
];

export const partnerCompanies: PartnerCompany[] = [
  { id: "allianz", name: "Allianz Global", shortName: "ALLIANZ", category: "Global Underwriter" },
  { id: "axa", name: "AXA Group", shortName: "AXA", category: "International Insurer" },
  { id: "zurich", name: "Zurich Insurance", shortName: "ZURICH", category: "Corporate & Personal" },
  { id: "chubb", name: "Chubb Premium", shortName: "CHUBB", category: "High-Value Asset Underwriter" },
  { id: "swissre", name: "Swiss Re", shortName: "SWISS RE", category: "Reinsurance & Risk" },
  { id: "munichre", name: "Munich Re", shortName: "MUNICH RE", category: "Catastrophe Risk" },
  { id: "mapfre", name: "MAPFRE Global", shortName: "MAPFRE", category: "Multi-Line Insurer" },
  { id: "generali", name: "Generali Group", shortName: "GENERALI", category: "Global Protection" },
  { id: "sompo", name: "Sompo International", shortName: "SOMPO", category: "Commercial & Specialty" },
  { id: "travelers", name: "Travelers", shortName: "TRAVELERS", category: "Business & Personal" },
  { id: "berkshire", name: "Berkshire Hathaway Specialty", shortName: "BH SPECIALTY", category: "Specialty Lines" },
  { id: "lloyds", name: "Lloyd's Syndicate", shortName: "LLOYD'S", category: "Specialist Underwriters" },
];

export const faqItems: FaqItem[] = [
  {
    question: "How is a bespoke comprehensive auto insurance premium determined?",
    answer: "Premiums are calculated based on the vehicle's market or agreed replacement valuation, driver history and claim-free tier, geographic garaging location, and customized add-ons such as dedicated OEM repair clauses and luxury loaner car provisions. Our brokers scan multiple leading underwriters simultaneously to deliver maximum value.",
    category: "Automotive Coverage"
  },
  {
    question: "What distinguishes comprehensive estate coverage from standard homeowner policies?",
    answer: "Standard homeowner policies frequently cap payouts for water backup, architectural finishes, and high-value personal assets. Our prime residential policies provide guaranteed replacement cost coverage, elevated liability limits, worldwide protection for fine art and jewelry, and 24/7 concierge restoration support.",
    category: "Property & Estate"
  },
  {
    question: "Can I manage and bind my coverage digitally?",
    answer: "Yes. After reviewing your comparative proposal with your personal advisor via phone, email, or video consultation, policies can be bound instantly through encrypted digital signing and secure payment gateways, complete with immediate certificate generation.",
    category: "Advisory & Process"
  },
  {
    question: "How does private health insurance handle pre-existing conditions and waiting periods?",
    answer: "Emergency treatments and unexpected accidental injuries are covered immediately upon policy inception. For planned elective procedures and specific historical health conditions, waiting periods vary between 3 to 12 months depending on the carrier plan. We carefully match your medical profile to the most accommodating underwriter.",
    category: "Health & Wellness"
  },
  {
    question: "What exact protocol should I follow in the event of a claim?",
    answer: "First, ensure personal safety and document the scene with photographs or official reports. Then, contact our 24/7 Concierge Claims Desk immediately via phone or WhatsApp. Your dedicated claims advocate will manage adjuster assignments, emergency towing or home remediation, and expedite carrier settlement.",
    category: "Claims Advocacy"
  },
  {
    question: "Why work with an independent broker rather than purchasing directly from an insurer?",
    answer: "Captive agents can only sell their single company's products. As an independent brokerage, our fiduciary loyalty lies entirely with you. We objectively compare policy clauses, negotiate favorable terms across competing underwriters, and vigorously advocate on your behalf during complex claim disputes.",
    category: "Why Aura"
  }
];

export const proposalOptions = [
  { id: "kasko", label: "Auto Comprehensive", icon: "CarFront", desc: "Agreed-value prestige vehicle protection" },
  { id: "konut", label: "Estate & Property", icon: "Home", desc: "Full replacement home & contents" },
  { id: "trafik", label: "Motor Liability", icon: "ShieldAlert", desc: "Elevated statutory & excess liability" },
  { id: "saglik", label: "Private Health", icon: "HeartPulse", desc: "Elite hospital & specialist access" },
  { id: "dask", label: "Disaster Resilience", icon: "Building2", desc: "Catastrophic & seismic protection" },
  { id: "isyeri", label: "Enterprise Risk", icon: "Briefcase", desc: "Commercial property & business continuity" },
  { id: "diger", label: "Specialty Lines", icon: "Sparkles", desc: "Yacht, aviation, cyber, & fine art" },
];
