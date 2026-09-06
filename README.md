# 🛡️ AURA SİGORTA — Premium Web Platformu (`sigorta-premium-web`)

Türkiye'de faaliyet gösteren bağımsız sigorta acenteleri için özel olarak tasarlanmış; lüks otomobil markaları, üst düzey fintech ve kreatif ajansların estetik çizgisini buluşturan, sinematik ve yüksek dönüşüm (conversion) odaklı modern web platformu.

---

## 🌟 Öne Çıkan Özellikler

- **Sinematik Hero & 3D WebGL Deneyimi:** Three.js ile geliştirilmiş, 60fps çalışan koyu metalik lüks koruma çekirdeği, jiroskopik halkalar, mouse parallax ve scroll hareketine duyarlı 3D sahne.
- **Scroll Storytelling (GSAP & ScrollTrigger):** 6 temel sigorta branşı (Kasko, Trafik, Özel Sağlık, Konut, DASK, İşyeri) için dev kartlar yerine tek sahnenin akıcı biçimde dönüştüğü, kullanıcıyı kilitlemeyen hikaye akışı.
- **Lenis Smooth Scroll:** GSAP ticker ile senkronize, ipeksi kaydırma deneyimi ve `prefers-reduced-motion` erişilebilirlik desteği.
- **Yüksek Dönüşümlü Çok Adımlı Teklif Motoru:**
  - Branş seçimi (Kasko, Trafik, Sağlık, Konut, DASK, İşyeri, Diğer)
  - Seçilen branşa göre dinamik form alanları (Plaka, TC, Doğum Yılı, m² vb.)
  - İstemci taraflı doğrulama (validation)
  - Başarılı gönderim sonrası kutlama konfetisi (`canvas-confetti`) ve doğrudan WhatsApp referans kodu bağlantısı.
- **Acil Hasar Destek Masası & 3 Altın Kural:** 7/24 interaktif "Hasar Bildir" modalı ve WhatsApp fotoğraf/tutanak hattı.
- **Kurumsal İş Birlikleri Marquee:** Türkiye'nin önde gelen 20+ sigorta şirketi için platin görünümlü kesintisiz yatay akış.
- **Lüks Tipografi & Mikro Etkileşimler:** Başlıklarda Playfair Display / Cormorant serif asaleti, gövde metinlerinde Plus Jakarta Sans modernliği, manyetik butonlar ve desktop custom cursor.
- **Mobil Öncelikli Deneyim:** Mobilde performansı koruyan hafifletilmiş 3D sahne, tam ekran lüks overlay menü ve ekranda sürekli erişilebilir kalan yapışkan (sticky) teklif çubuğu.
- **SEO & Yapılandırılmış Veri:** Schema.org `InsuranceAgency` JSON-LD, OpenGraph ve Twitter Card meta etiketleri.

---

## 🛠️ Teknoloji Yığını

| Kategori | Teknoloji |
|---|---|
| **Framework** | Next.js 16 (App Router, Turbopack) |
| **Kütüphane** | React 19, TypeScript |
| **Stil / CSS** | Tailwind CSS, Autoprefixer, PostCSS |
| **Scroll Motoru** | Lenis Smooth Scroll |
| **Scroll Storytelling** | GSAP 3 + ScrollTrigger |
| **Arayüz Geçişleri** | Framer Motion |
| **3D / WebGL** | Three.js (Hafifletilmiş Canvas) |
| **İkonlar** | Lucide React |
| **Efektler** | Canvas Confetti |

---

## 🚀 Kurulum ve Yerel Çalıştırma

### Gereksinimler
- Node.js >= 18.17 (Tavsiye edilen: Node.js 20 veya 24)
- npm, pnpm veya yarn

### 1. Depoyu Klonlayın veya İndirin
```bash
cd d:/sigortam
```

### 2. Bağımlılıkları Yükleyin
```bash
npm install
```

### 3. Geliştirme Sunucusunu Başlatın
```bash
npm run dev
```
Tarayıcınızda [http://localhost:3000](http://localhost:3000) adresini açarak siteyi görüntüleyebilirsiniz.

### 4. Kod Denetimi (Lint)
```bash
npm run lint
```

### 5. Üretim Derlemesi (Production Build)
```bash
npm run build
npm run start
```

---

## 📁 Proje Dizin Yapısı

```text
/src
  /app
    globals.css             # Tema renkleri, film grain dokusu, custom scrollbar
    layout.tsx              # Fontlar, SEO metadata, JSON-LD Schema
    page.tsx                # Ana vitrin sayfası
  /components
    /canvas
      HeroCanvas.tsx        # Three.js 3D koruma metaforu ve parallax
    /providers
      SmoothScrollProvider.tsx # Lenis + GSAP ScrollTrigger senkronizasyonu
    /sections
      Navbar.tsx            # Minimal cam navbar ve tam ekran mobil menü
      Hero.tsx              # Sinematik hero, başlık ve ikili CTA
      ScrollStorytelling.tsx# 01-06 Branş scroll sahnesi (GSAP Pinned)
      WhyUs.tsx             # 4 Temel avantaj ve metrik sayaçları
      PartnersMarquee.tsx   # Anlaşmalı sigorta şirketleri marquee alanı
      ProposalSection.tsx   # Yüksek dönüşümlü dinamik teklif formu
      ClaimSupport.tsx      # Hasar masası, 3 adım ve modal bildirimi
      AboutSection.tsx      # Manifestolu kurumsal anlatım
      FaqSection.tsx        # Akordiyon SSS bölümü
      Footer.tsx            # Minimal footer ve KVKK/Gizlilik modalı
    /ui
      CustomCursor.tsx      # Desktop lerp custom imleç
      MagneticButton.tsx    # Manyetik çekim kuvvetli butonlar
      MobileStickyBar.tsx   # Mobilde sabit hızlı teklif & WhatsApp barı
  /data
    siteData.ts             # Acente konfigürasyonu, ürünler, şirketler, SSS
  /lib
    utils.ts                # Tailwind merge ve yardımcı fonksiyonlar
```

---

## ☁️ Vercel Deployment

Proje herhangi bir harici environment variable'a zorunlu ihtiyaç duymadan Vercel üzerinde tek tıkla deploy edilecek şekilde hazırlanmıştır.

1. Depoyu GitHub hesabınıza push edin:
   ```bash
   git remote add origin <GITHUB_REPO_URL>
   git push -u origin main
   ```
2. [Vercel](https://vercel.com) paneline gidin ve **Add New Project** seçeneğine tıklayın.
3. `sigorta-premium-web` reposunu seçin.
4. Framework Preset: **Next.js** olarak otomatik tanınacaktır.
5. **Deploy** butonuna tıklayın.

Önerilen demo alan adı: `sigorta-premium-web.vercel.app`

---

## 📄 Lisans & Yasal Uyarı
Bu proje bağımsız sigorta acenteleri için tasarlanmış premium bir vitrin arayüzüdür.
Poliçe verileri ve acente unvanı `src/data/siteData.ts` dosyasından dilediğiniz gibi güncellenebilir.
