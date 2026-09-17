import type { Metadata } from "next";
import { Plus_Jakarta_Sans, Playfair_Display } from "next/font/google";
import "./globals.css";
import SmoothScrollProvider from "@/components/providers/SmoothScrollProvider";
import CustomCursor from "@/components/ui/CustomCursor";
import MobileStickyBar from "@/components/ui/MobileStickyBar";
import { siteConfig } from "@/data/siteData";

const sans = Plus_Jakarta_Sans({
  subsets: ["latin"],
  variable: "--font-sans",
  display: "swap",
});

const serif = Playfair_Display({
  subsets: ["latin"],
  variable: "--font-serif",
  display: "swap",
});

export const metadata: Metadata = {
  title: `${siteConfig.name} | Bespoke Automobile, Estate, Health & Commercial Insurance`,
  description:
    "Multi-carrier comparative underwriting for high-value automobiles, prime residential estates, private healthcare, and commercial risk. Bespoke advisory with radical transparency.",
  keywords: [
    "private client insurance",
    "luxury auto insurance",
    "estate insurance",
    "private healthcare coverage",
    "commercial risk advisory",
    "independent insurance broker",
    "high-value property underwriting",
    "multi-carrier quote comparison",
    "catastrophe insurance",
  ],
  authors: [{ name: siteConfig.name }],
  metadataBase: new URL("https://sigorta-premium-portfolio.vercel.app"),
  openGraph: {
    title: `${siteConfig.name} | Bespoke Automobile, Estate, Health & Commercial Insurance`,
    description:
      "Multi-carrier comparative underwriting for fine automobiles, prime estates, executive healthcare, and commercial assets.",
    url: "https://sigorta-premium-portfolio.vercel.app",
    siteName: siteConfig.name,
    locale: "en_US",
    type: "website",
  },
  twitter: {
    card: "summary_large_image",
    title: `${siteConfig.name} | Bespoke Private Insurance Advisory`,
    description:
      "Instant comparative underwriting across premier global insurance syndicates.",
  },
  robots: {
    index: true,
    follow: true,
  },
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  // Schema.org InsuranceAgency structured data
  const jsonLd = {
    "@context": "https://schema.org",
    "@type": "InsuranceAgency",
    name: siteConfig.name,
    description:
      "Independent private client brokerage delivering multi-carrier underwriting across premier international insurance syndicates.",
    url: "https://sigorta-premium-portfolio.vercel.app",
    telephone: siteConfig.phone,
    email: siteConfig.email,
    address: {
      "@type": "PostalAddress",
      streetAddress: "193 Buyukdere Ave, Levent Loft Suite 14",
      addressLocality: "Besiktas",
      addressRegion: "Istanbul",
      addressCountry: "TR",
    },
    openingHoursSpecification: [
      {
        "@type": "OpeningHoursSpecification",
        dayOfWeek: [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
        ],
        opens: "08:30",
        closes: "18:30",
      },
    ],
    priceRange: "$$$",
  };

  return (
    <html lang="en" className={`${sans.variable} ${serif.variable}`}>
      <head>
        <script
          type="application/ld+json"
          dangerouslySetInnerHTML={{ __html: JSON.stringify(jsonLd) }}
        />
      </head>
      <body className="font-sans antialiased bg-background text-foreground selection:bg-electric/30 selection:text-white">
        <SmoothScrollProvider>
          <CustomCursor />
          {children}
          <MobileStickyBar />
        </SmoothScrollProvider>
      </body>
    </html>
  );
}
