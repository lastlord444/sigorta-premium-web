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
  name: "AURA SİGORTA",
  tagline: "Bağımsız & Premium Sigorta Danışmanlığı",
  licenseNo: "SEDDK Acente Sicil: G1204-8931",
  phone: "+90 (850) 308 44 20",
  phoneRaw: "+908503084420",
  whatsapp: "+90 (532) 100 20 20",
  whatsappRaw: "905321002020",
  email: "destek@aurasigorta.com.tr",
  address: "Büyükdere Cad. No: 193, Levent Loft, Kat: 14, Beşiktaş / İstanbul",
  workingHours: "Hafta İçi: 08:30 - 18:30 | 7/24 Hasar Destek Masası",
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
    name: "KASKO",
    headline: "Aracınızı değil, hareket özgürlüğünüzü koruyun.",
    description: "Kaza, çarpma, doğal afet, yangın ve hırsızlığa karşı aracınızı tam güvenceye alın. İkame araç, orijinal cam değişimi ve yetkili servis güvencesiyle standart poliçelerin ötesine geçin.",
    highlights: [
      "Orijinal parça & yetkili servis garantisi",
      "Sınırsız ikame araç seçeneği",
      "Mini onarım ve çekici asistanı",
      "Yurtdışı ek teminat olanağı"
    ],
    metaBadge: "Genişletilmiş Kasko",
    formType: "kasko"
  },
  {
    id: "trafik",
    order: "02",
    name: "TRAFİK SİGORTASI",
    headline: "Yola çıktığınız her anda yanınızda.",
    description: "Zorunlu mali sorumluluk sigortanızı sadece yasal zorunluluk olarak görmeyin. 20'den fazla sigorta şirketinden saniyeler içinde karşılaştırma yaparak en iyi prim ve ek yol yardım teminatlarına ulaşın.",
    highlights: [
      "Yasal üst limitlerle tam uyumlu koruma",
      "7/24 ücretsiz yol yardım ve çekici",
      "Maddi ve bedeni üçüncü şahıs teminatı",
      "Tek tıkla anında poliçe yenileme"
    ],
    metaBadge: "Zorunlu Mali Sorumluluk",
    formType: "trafik"
  },
  {
    id: "saglik",
    order: "03",
    name: "ÖZEL SAĞLIK SİGORTASI",
    headline: "Sağlığınız söz konusu olduğunda beklemeyin.",
    description: "Türkiye'nin en seçkin A+ özel hastane ağlarında sıra beklemeden, doktorunuzu özgürce seçerek tedavi olun. Tamamlayıcı ve Özel Sağlık planlarıyla ailenizin geleceğini koruyun.",
    highlights: [
      "Seçkin A+ özel hastane ağları",
      "Limitsiz yatarak tedavi güvencesi",
      "Yıllık check-up ve diş bakım hediyesi",
      "Doğum ve yurtdışı tedavi opsiyonları"
    ],
    metaBadge: "Bireysel & Aile Planı",
    formType: "saglik"
  },
  {
    id: "konut",
    order: "04",
    name: "KONUT SİGORTASI",
    headline: "Eviniz dört duvardan fazlasıdır.",
    description: "Evinizi, değerli eşyalarınızı ve anılarınızı yangın, hırsızlık, su baskını ve dahili su sızıntılarına karşı eksiksiz teminat altına alın. Çilingir ve kombi bakım asistanı dahil.",
    highlights: [
      "Bina ve eşya tam değer koruması",
      "Komşu ve kiracı mali sorumluluğu",
      "7/24 çilingir, camcı ve tesisatçı asistanı",
      "Elektronik cihaz arıza güvencesi"
    ],
    metaBadge: "Tam Kapsamlı Yuva",
    formType: "konut"
  },
  {
    id: "dask",
    order: "05",
    name: "DASK",
    headline: "Beklenmeyene karşı hazırlıklı olun.",
    description: "Zorunlu Deprem Sigortası ile binanızı deprem ve deprem kaynaklı yangın, patlama, tsunami tehlikelerine karşı güvenceye alın. En güncel metrekare teminatlarıyla poliçenizi yenileyin.",
    highlights: [
      "Yasal DASK teminat tavanı koruması",
      "Deprem sonrası doğrudan hasar tazmini",
      "Elektrik, su, doğalgaz abonelik uyumlu",
      "Hızlı ve resmi sistem sorgulama"
    ],
    metaBadge: "Zorunlu Deprem Teminatı",
    formType: "dask"
  },
  {
    id: "isyeri",
    order: "06",
    name: "İŞYERİ SİGORTASI",
    headline: "Yıllarca kurduğunuz işi tek poliçeyle riske bırakmayın.",
    description: "İşletmenizin demirbaşlarını, emtiasını, çalışanlarını ve iş durması risklerini çok yönlü teminat paketiyle koruyun. Butik ofislerden büyük ölçekli tesislere özel çözümler.",
    highlights: [
      "İş durması & ciro kaybı telafisi",
      "Demirbaş, makine kırılması ve emtia",
      "Üçüncü şahıs & işveren mali mesuliyet",
      "Sektöre özel risk analizi ve muafiyet optimizasyonu"
    ],
    metaBadge: "Kurumsal Risk Yönetimi",
    formType: "isyeri"
  }
];

export const whyUsAdvantages: AdvantageItem[] = [
  {
    id: "multi-quote",
    number: "01",
    tag: "OBJEKTİF KARŞILAŞTIRMA",
    title: "Birden fazla sigorta şirketinden teklif",
    description: "Tek bir şirkete bağlı kalmadan, 20'yi aşkın lider sigorta şirketinin tekliflerini aynı tabloda tarafsızca karşılaştırır, bütçenize en uygun en geniş teminatı sunarız."
  },
  {
    id: "tailored-coverage",
    number: "02",
    tag: "HASSAS MİMARİ",
    title: "İhtiyaca özel teminat",
    description: "Size hiçbir fayda sağlamayacak şişirilmiş maddeler yerine, yaşam tarzınıza ve gerçek risklerinize odaklanan, terzi dikimi poliçe tasarlarız."
  },
  {
    id: "full-lifecycle",
    number: "03",
    tag: "KESİNTİSİZ DESTEK",
    title: "Poliçe öncesi ve sonrası destek",
    description: "İlişkimiz poliçeyi imzaladığınızda bitmez. Vade takibi, zeyil işlemleri, poliçe yenileme dönemleri ve teminat revizyonlarında daima yanınızdayız."
  },
  {
    id: "human-claim",
    number: "04",
    tag: "GERÇEK DANIŞMANLIK",
    title: "Hasar sürecinde gerçek insan desteği",
    description: "Kaza ve hasar anında robotik çağrı merkezi menüleriyle değil; dosyanızı bizzat takip eden, eksper ve servis sürecini yöneten lisanslı uzmanınızla muhatap olursunuz."
  }
];

export const metricsData: MetricItem[] = [
  {
    value: "20+",
    label: "Sigorta Şirketi",
    sublabel: "Lisanslı yetkili acentelik"
  },
  {
    value: "10.000+",
    label: "Aktif Poliçe",
    sublabel: "Bireysel ve kurumsal portföy"
  },
  {
    value: "15+",
    label: "Yıllık Deneyim",
    sublabel: "Sektörde güvenilir tecrübe"
  },
  {
    value: "%99.4",
    label: "Müşteri Memnuniyeti",
    sublabel: "Hasar çözümlerinde hızlı sonuç"
  }
];

export const partnerCompanies: PartnerCompany[] = [
  { id: "allianz", name: "Allianz Sigorta", shortName: "ALLIANZ", category: "Global Lider" },
  { id: "anadolu", name: "Anadolu Sigorta", shortName: "ANADOLU", category: "Köklü Güvence" },
  { id: "axa", name: "Axa Sigorta", shortName: "AXA", category: "Uluslararası" },
  { id: "aksigorta", name: "Aksigorta", shortName: "AK SİGORTA", category: "Sabancı Grubu" },
  { id: "turkiye", name: "Türkiye Sigorta", shortName: "TÜRKİYE SİGORTA", category: "Güçlü Kamu" },
  { id: "sompo", name: "Sompo Sigorta", shortName: "SOMPO", category: "Japon Güvencesi" },
  { id: "mapfre", name: "Mapfre Sigorta", shortName: "MAPFRE", category: "Global Acente" },
  { id: "hdi", name: "HDI Sigorta", shortName: "HDI", category: "Alman Finans" },
  { id: "neova", name: "Neova Katılım", shortName: "NEOVA", category: "Katılım Sigortacılığı" },
  { id: "quick", name: "Quick Sigorta", shortName: "QUICK", category: "Dijital Hızlı" },
  { id: "ray", name: "Ray Sigorta", shortName: "RAY SİGORTA", category: "VIG Grubu" },
  { id: "zurich", name: "Zurich Sigorta", shortName: "ZURICH", category: "İsviçre Standardı" },
];

export const faqItems: FaqItem[] = [
  {
    question: "Kasko fiyatı nasıl belirlenir?",
    answer: "Kasko primi; aracınızın marka, model ve kasko değer listesindeki bedeli, sürücünün hasarsızlık kademesi, ikamet edilen il/ilçe, poliçede seçilen muafiyet ve ikame araç gibi ek teminat seçenekleri doğrultusunda algoritmik olarak belirlenir. Acentemiz 20 farklı şirketin risk primlerini anlık tarayarak en avantajlı teklifi sunar.",
    category: "Araç Sigortaları"
  },
  {
    question: "Trafik sigortası zorunlu mu?",
    answer: "Evet, 2918 sayılı Karayolları Trafik Kanunu uyarınca trafiğe çıkan her motorlu aracın Zorunlu Mali Sorumluluk (Trafik) Sigortası yaptırması yasal bir zorunluluktur. Sigortasız araçlar tespit edildiğinde trafikten men edilir, ceza uygulanır ve olası bir kazada karşı tarafa verilen tüm hasarlar şahsen ödenmek zorunda kalınır.",
    category: "Araç Sigortaları"
  },
  {
    question: "DASK ile konut sigortası arasındaki fark nedir?",
    answer: "DASK (Zorunlu Deprem Sigortası), yalnızca deprem ve deprem kaynaklı hasarları devlet tarafından belirlenen resmi metrekare tavan bedeline kadar karşılar; evdeki eşyaları kapsamaz. İsteğe bağlı Konut Sigortası ise DASK tavanını aşan bina hasarlarını, yangını, hırsızlığı, dahili su baskınlarını, cam kırılmasını ve değerli eşyalarınızı tam koruma altına alır.",
    category: "Ev & Mülk"
  },
  {
    question: "Sağlık sigortasında bekleme süresi nedir?",
    answer: "Özel sağlık sigortalarında poliçe başlangıç tarihinden önce var olan hastalıklar ile bazı planlı ameliyatlar (örneğin safra kesesi, fıtık, katarakt gibi) için şirketlerce 3 ila 12 ay arasında bekleme süresi uygulanır. Acil durumlar ve kazalar ise poliçeniz başladığı ilk andan itibaren bekleme süresi olmaksızın teminat altındadır.",
    category: "Sağlık"
  },
  {
    question: "Hasar durumunda ne yapmalıyım?",
    answer: "Öncelikle güvenliğinizi sağlayın. Trafik kazasında karşı tarafla birlikte 'Kaza Tespit Tutanağı' düzenleyin ve kaza yerinin fotoğraflarını çekin. Ardından 7/24 Hasar Masamızı arayarak ya da WhatsApp hattımızdan bize ulaşarak dosya açılışını başlatın. Anlaşmalı çekici, ikame araç ve eksper yönlendirmesini acenteniz olarak biz üstleniyoruz.",
    category: "Hasar & Destek"
  },
  {
    question: "Poliçemi online olarak alabilir miyim?",
    answer: "Evet. Teklif formunu doldurduktan sonra uzman danışmanımız sizin için hazırlanan karşılaştırmalı teklif dosyasını WhatsApp veya e-posta ile iletir. Onayınızın ardından 3D Secure güvenli ödeme bağlantısı üzerinden poliçeniz anında tanzim edilir ve e-Devlet sistemine resmi olarak işlenir.",
    category: "İşlem Kolaylığı"
  }
];

export const proposalOptions = [
  { id: "kasko", label: "Kasko", icon: "CarFront", desc: "Tam güvenceli araç koruması" },
  { id: "trafik", label: "Trafik Sigortası", icon: "ShieldAlert", desc: "Zorunlu mali mesuliyet" },
  { id: "saglik", label: "Özel Sağlık", icon: "HeartPulse", desc: "A+ hastane ve doktor güvencesi" },
  { id: "konut", label: "Konut Sigortası", icon: "Home", desc: "Bina, eşya ve asistan paketi" },
  { id: "dask", label: "DASK", icon: "Building2", desc: "Zorunlu deprem sigortası" },
  { id: "isyeri", label: "İşyeri Sigortası", icon: "Briefcase", desc: "Kurumsal işletme koruması" },
  { id: "diger", label: "Diğer", icon: "Sparkles", desc: "Seyahat, nakliyat, siber risk vb." },
];
