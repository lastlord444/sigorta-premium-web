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
  title: `${siteConfig.name} | Kasko, Trafik, Sağlık ve Konut Sigortası`,
  description:
    "Kasko, trafik, sağlık, konut, DASK ve işyeri sigortalarında 20+ lider sigorta şirketinden tek tıkla karşılaştırmalı teklif alın. Bağımsız uzman danışmanlık ve 7/24 hasar desteği.",
  keywords: [
    "sigorta acentesi",
    "kasko teklifi",
    "trafik sigortası fiyatları",
    "özel sağlık sigortası",
    "tamamlayıcı sağlık sigortası",
    "konut sigortası",
    "DASK sorgulama",
    "işyeri sigortası",
    "bağımsız sigorta acentesi",
  ],
  authors: [{ name: siteConfig.name }],
  metadataBase: new URL("https://sigorta-premium-web.vercel.app"),
  openGraph: {
    title: `${siteConfig.name} | Kasko, Trafik, Sağlık ve Konut Sigortası`,
    description:
      "Kasko, trafik, sağlık, konut, DASK ve işyeri sigortalarında farklı sigorta şirketlerinden teklif alın.",
    url: "https://sigorta-premium-web.vercel.app",
    siteName: siteConfig.name,
    locale: "tr_TR",
    type: "website",
  },
  twitter: {
    card: "summary_large_image",
    title: `${siteConfig.name} | Premium Sigorta Çözümleri`,
    description:
      "Kasko, trafik, sağlık ve konut sigortalarında 20+ şirketten anında karşılaştırma.",
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
      "Türkiye genelinde 20+ lider sigorta şirketinden karşılaştırmalı kasko, trafik, sağlık, konut, DASK ve işyeri teklifleri sunan bağımsız sigorta acentesi.",
    url: "https://sigorta-premium-web.vercel.app",
    telephone: siteConfig.phone,
    email: siteConfig.email,
    address: {
      "@type": "PostalAddress",
      streetAddress: "Büyükdere Cad. No: 193, Levent Loft, Kat: 14",
      addressLocality: "Beşiktaş",
      addressRegion: "İstanbul",
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
    priceRange: "$$",
  };

  return (
    <html lang="tr" className={`${sans.variable} ${serif.variable}`}>
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
