"use client";

import React from "react";
import {
  Car,
  Home,
  ShieldAlert,
  HeartPulse,
  Building2,
  Briefcase,
  Sparkles
} from "lucide-react";
import CinematicInsuranceScene from "@/components/sections/CinematicInsuranceScene";
import { useLenis } from "@/components/providers/SmoothScrollProvider";

interface ScrollStorytellingProps {
  onSelectProductForQuote?: (productId: string) => void;
}

export default function ScrollStorytelling({
  onSelectProductForQuote,
}: ScrollStorytellingProps) {
  const { scrollTo } = useLenis();

  const handleQuoteClick = (productId: string) => {
    if (onSelectProductForQuote) {
      onSelectProductForQuote(productId);
    }
    scrollTo("#teklif-al");
  };

  const scenes = [
    {
      id: "kasko",
      order: "01",
      eyebrow: "01 / KASKO",
      title: "Hareket özgürlüğünüzü güvence altına alın.",
      description:
        "Kaza, çarpma, doğal afet, yangın ve hırsızlığa karşı aracınızı tam güvenceye alın. İkame araç, orijinal cam değişimi ve yetkili servis güvencesiyle standart poliçelerin ötesine geçin.",
      videoSrc: "/videos/kasko-car.mp4",
      alignment: "right" as const,
      badge: "Genişletilmiş Kasko",
      icon: <Car className="w-4 h-4 text-electric-light" />,
      highlights: [
        "Orijinal parça & yetkili servis garantisi",
        "Sınırsız ikame araç seçeneği",
        "Mini onarım ve 7/24 çekici asistanı",
        "Yurtdışı ek teminat olanağı",
      ],
      ctaText: "Kasko İçin Teklif Al",
    },
    {
      id: "konut",
      order: "02",
      eyebrow: "02 / KONUT",
      title: "Eviniz dört duvardan fazlasıdır.",
      description:
        "Evinizi, değerli eşyalarınızı ve anılarınızı yangın, hırsızlık, dahili su sızıntıları ve komşu sorumluluğuna karşı eksiksiz teminat altına alın. Çilingir ve kombi bakım asistanı dahil.",
      // Ready for public/videos/konut-home.mp4 when user adds it
      videoSrc: undefined, // Seamlessly activates once public/videos/konut-home.mp4 is provided
      pendingVideoNotice:
        "public/videos/konut-home.mp4 dosyası için sinematik sahne altyapısı hazırlandı. Video yüklendiğinde otomatik olarak oynatılacaktır.",
      alignment: "left" as const,
      badge: "Tam Kapsamlı Yuva",
      icon: <Home className="w-4 h-4 text-emerald-400" />,
      highlights: [
        "Bina ve eşya tam değer koruması",
        "Komşu ve kiracı mali sorumluluğu",
        "7/24 çilingir, camcı ve tesisatçı asistanı",
        "Elektronik cihaz arıza güvencesi",
      ],
      ctaText: "Konut Sigortası Teklifi Al",
    },
    {
      id: "trafik",
      order: "03",
      eyebrow: "03 / TRAFİK SİGORTASI",
      title: "Yola çıktığınız her anda yanınızda.",
      description:
        "Zorunlu mali sorumluluk sigortanızı yalnızca yasal zorunluluk olarak görmeyin. 20'den fazla sigorta şirketinden saniyeler içinde karşılaştırma yaparak en iyi prim ve ek yol yardım teminatlarına ulaşın.",
      videoSrc: undefined,
      alignment: "right" as const,
      badge: "Zorunlu Mali Mesuliyet",
      icon: <ShieldAlert className="w-4 h-4 text-amber-400" />,
      highlights: [
        "Yasal üst limitlerle tam uyumlu koruma",
        "7/24 ücretsiz yol yardım ve çekici",
        "Maddi ve bedeni üçüncü şahıs teminatı",
        "Tek tıkla anında poliçe yenileme",
      ],
      ctaText: "Trafik Sigortası Teklifi Al",
    },
    {
      id: "saglik",
      order: "04",
      eyebrow: "04 / ÖZEL SAĞLIK",
      title: "Sağlığınız söz konusu olduğunda beklemeyin.",
      description:
        "Türkiye'nin en seçkin A+ özel hastane ağlarında sıra beklemeden, doktorunuzu özgürce seçerek tedavi olun. Tamamlayıcı ve Özel Sağlık planlarıyla ailenizin geleceğini koruyun.",
      videoSrc: undefined,
      alignment: "left" as const,
      badge: "Bireysel & Aile Sağlığı",
      icon: <HeartPulse className="w-4 h-4 text-rose-400" />,
      highlights: [
        "Seçkin A+ özel hastane ağları",
        "Limitsiz yatarak tedavi güvencesi",
        "Yıllık check-up ve diş bakım hediyesi",
        "Doğum ve yurtdışı tedavi opsiyonları",
      ],
      ctaText: "Sağlık Sigortası Teklifi Al",
    },
    {
      id: "dask",
      order: "05",
      eyebrow: "05 / DASK",
      title: "Beklenmeyene karşı hazırlıklı olun.",
      description:
        "Zorunlu Deprem Sigortası ile binanızı deprem ve deprem kaynaklı yangın, patlama ve hasar risklerine karşı resmi güvenceye alın. En güncel metrekare teminatlarıyla poliçenizi yenileyin.",
      videoSrc: undefined,
      alignment: "right" as const,
      badge: "Zorunlu Deprem Teminatı",
      icon: <Building2 className="w-4 h-4 text-sky-400" />,
      highlights: [
        "Yasal DASK teminat tavanı koruması",
        "Deprem sonrası doğrudan hasar tazmini",
        "Abonelik işlemleri için resmi kayıt",
        "Hızlı ve resmi sistem sorgulama",
      ],
      ctaText: "DASK Poliçesi Sorgula",
    },
    {
      id: "isyeri",
      order: "06",
      eyebrow: "06 / İŞYERİ SİGORTASI",
      title: "Yıllarca kurduğunuz işi tek poliçeyle riske bırakmayın.",
      description:
        "İşletmenizin demirbaşlarını, emtiasını, çalışanlarını ve iş durması risklerini çok yönlü teminat paketiyle koruyun. Butik ofislerden büyük ölçekli tesislere özel çözümler.",
      videoSrc: undefined,
      alignment: "left" as const,
      badge: "Kurumsal Risk Yönetimi",
      icon: <Briefcase className="w-4 h-4 text-accent-violet" />,
      highlights: [
        "İş durması & ciro kaybı telafisi",
        "Demirbaş, makine kırılması ve emtia",
        "Üçüncü şahıs & işveren mali mesuliyet",
        "Sektöre özel risk analizi",
      ],
      ctaText: "İşyeri Sigortası Teklifi Al",
    },
  ];

  return (
    <section id="sigortalar" className="relative w-full bg-navy-950 text-white">
      {/* SECTION ANCHOR HEADER */}
      <div className="pt-20 pb-10 px-6 sm:px-10 lg:px-16 border-b border-white/[0.06] bg-gradient-to-b from-background to-navy-950">
        <div className="max-w-7xl mx-auto flex flex-col md:flex-row md:items-end justify-between gap-6">
          <div>
            <div className="inline-flex items-center gap-2 text-xs font-mono tracking-[0.25em] text-electric-light uppercase mb-2">
              <Sparkles className="w-3.5 h-3.5" />
              <span>Sinematik Güvence Portföyü</span>
            </div>
            <h2 className="font-serif text-3xl sm:text-5xl font-medium text-white">
              Değerlerinizi Doğru Teminatla Koruyun
            </h2>
          </div>

          {/* QUICK JUMP NAVIGATION PILLS */}
          <div className="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none">
            {scenes.map((s) => (
              <button
                key={s.id}
                onClick={() => scrollTo(`#scene-${s.id}`)}
                className="px-3.5 py-1.5 rounded-full text-xs font-mono uppercase tracking-wider bg-white/[0.03] hover:bg-white/[0.08] text-silver-400 hover:text-white border border-white/[0.06] transition-all whitespace-nowrap cursor-pointer"
              >
                <span className="text-electric-light mr-1.5">{s.order}</span>
                {s.eyebrow.split("/")[1]?.trim() || s.id}
              </button>
            ))}
          </div>
        </div>
      </div>

      {/* REUSABLE CINEMATIC SCENES */}
      <div className="divide-y divide-white/[0.04]">
        {scenes.map((scene) => (
          <CinematicInsuranceScene
            key={scene.id}
            id={scene.id}
            order={scene.order}
            eyebrow={scene.eyebrow}
            title={scene.title}
            description={scene.description}
            videoSrc={scene.videoSrc}
            pendingVideoNotice={scene.pendingVideoNotice}
            alignment={scene.alignment}
            badge={scene.badge}
            highlights={scene.highlights}
            ctaText={scene.ctaText}
            icon={scene.icon}
            onQuoteClick={() => handleQuoteClick(scene.id)}
          />
        ))}
      </div>
    </section>
  );
}
