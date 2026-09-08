/**
 * Plused Sigorta - Premium Cinematic Theme JS
 */

document.addEventListener("DOMContentLoaded", function () {
  "use strict";

  // Check prefers-reduced-motion
  var prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  // 1. LENIS SMOOTH SCROLLING (DESKTOP ONLY - NEVER LOCK MOBILE SCROLL)
  var lenis = null;
  var isMobileScreen = window.innerWidth <= 768 || ("ontouchstart" in window);
  if (!prefersReducedMotion && typeof Lenis !== "undefined" && !isMobileScreen) {
    try {
      lenis = new Lenis({
        duration: 1.2,
        easing: function (t) {
          return Math.min(1, 1.001 - Math.pow(2, -10 * t));
        },
        orientation: "vertical",
        gestureOrientation: "vertical",
        smoothWheel: true,
        wheelMultiplier: 1,
      });

      if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
        lenis.on("scroll", ScrollTrigger.update);
        gsap.ticker.add(function (time) {
          lenis.raf(time * 1000);
        });
        gsap.ticker.lagSmoothing(0);
      } else {
        function raf(time) {
          lenis.raf(time);
          requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);
      }
    } catch (e) {
      console.warn("Lenis init fallback:", e);
    }
  }

  // Smooth scroll helper
  function smoothScrollTo(target) {
    if (lenis) {
      if (typeof target === "number") {
        lenis.scrollTo(target);
      } else {
        lenis.scrollTo(target, { offset: -60 });
      }
    } else {
      if (typeof target === "number") {
        window.scrollTo({ top: target, behavior: "smooth" });
      } else {
        var el = typeof target === "string" ? document.querySelector(target) : target;
        if (el) {
          el.scrollIntoView({ behavior: "smooth" });
        }
      }
    }
  }

  // Delegate smooth scroll for internal anchors
  document.querySelectorAll('a[href^="#"], button[data-scroll]').forEach(function (el) {
    el.addEventListener("click", function (e) {
      var targetId = this.getAttribute("data-scroll") || this.getAttribute("href");
      if (targetId && targetId !== "#" && targetId.startsWith("#")) {
        var targetEl = document.querySelector(targetId);
        if (targetEl) {
          e.preventDefault();
          smoothScrollTo(targetEl);
          // Close mobile menu if open
          var mobileMenu = document.getElementById("mobile-menu-overlay");
          if (mobileMenu) {
            mobileMenu.classList.remove("active");
          }
        }
      }
    });
  });

  // 2. GSAP SCROLLTRIGGER FOR HERO KASKO TIMELINE
  if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
    gsap.registerPlugin(ScrollTrigger);

    var heroContainer = document.getElementById("hero-kasko");
    var stickyViewport = document.getElementById("hero-sticky");
    var heroContent = document.getElementById("hero-content");
    var heroVideoWrapper = document.getElementById("hero-video-wrapper");
    var kaskoContent = document.getElementById("scene-kasko");
    var scrollIndicator = document.getElementById("hero-scroll-indicator");

    if (heroContainer && stickyViewport && !prefersReducedMotion) {
      var mm = gsap.matchMedia();

      // DESKTOP: True cinematic pinned ScrollTrigger transition (160vh)
      mm.add("(min-width: 769px)", function () {
        var tl = gsap.timeline({
          scrollTrigger: {
            trigger: heroContainer,
            start: "top top",
            end: "bottom bottom",
            pin: stickyViewport,
            pinSpacing: false,
            scrub: 0.8,
          },
        });

        // 1. Hero text fades out smoothly
        if (heroContent) {
          tl.to(
            heroContent,
            {
              opacity: 0,
              y: -35,
              ease: "power1.out",
              duration: 0.35,
            },
            0
          );
        }

        // 2. Scroll indicator disappears quickly
        if (scrollIndicator) {
          tl.to(
            scrollIndicator,
            {
              opacity: 0,
              duration: 0.15,
              ease: "power1.out",
            },
            0
          );
        }

        // 3. Automobile video subtle scale (1 -> 1.06)
        if (heroVideoWrapper) {
          tl.to(
            heroVideoWrapper,
            {
              scale: 1.06,
              yPercent: 3,
              ease: "none",
              duration: 1,
            },
            0
          );
        }

        // 4. Kasko narrative gracefully reveals over visual atmosphere
        if (kaskoContent) {
          tl.fromTo(
            kaskoContent,
            {
              opacity: 0,
              y: 35,
              pointerEvents: "none",
            },
            {
              opacity: 1,
              y: 0,
              pointerEvents: "auto",
              ease: "power2.out",
              duration: 0.4,
            },
            0.32
          );
        }
      });

      // MOBILE: No pin/scrub locking, natural smooth mobile scroll
      mm.add("(max-width: 768px)", function () {
        if (heroContent) gsap.set(heroContent, { opacity: 1, y: 0 });
        if (heroVideoWrapper) gsap.set(heroVideoWrapper, { scale: 1, yPercent: 0 });
        if (kaskoContent) gsap.set(kaskoContent, { opacity: 1, y: 0, pointerEvents: "auto" });
      });
    }
  }

  // 3. INTERSECTION OBSERVER FOR SMART VIDEO PLAYBACK
  if ("IntersectionObserver" in window) {
    var videoObserver = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          var video = entry.target;
          if (entry.isIntersecting) {
            video.play().catch(function () {});
          } else {
            video.pause();
          }
        });
      },
      { threshold: 0.15 }
    );

    document.querySelectorAll("video").forEach(function (video) {
      videoObserver.observe(video);
    });
  }

  // 4. NAVBAR SCROLL STATE & MOBILE MENU TOGGLE
  var siteHeader = document.getElementById("site-header");
  var mobileMenuToggle = document.getElementById("mobile-menu-toggle");
  var mobileMenuClose = document.getElementById("mobile-menu-close");
  var mobileMenuOverlay = document.getElementById("mobile-menu-overlay");

  window.addEventListener(
    "scroll",
    function () {
      if (siteHeader) {
        if (window.scrollY > 40) {
          siteHeader.classList.add("scrolled");
        } else {
          siteHeader.classList.remove("scrolled");
        }
      }

      // Mobile sticky bar toggle
      var mobileStickyBar = document.getElementById("mobile-sticky-bar");
      if (mobileStickyBar) {
        if (window.scrollY > 250) {
          mobileStickyBar.style.display = "block";
        } else {
          mobileStickyBar.style.display = "none";
        }
      }
    },
    { passive: true }
  );

  if (mobileMenuToggle && mobileMenuOverlay) {
    mobileMenuToggle.addEventListener("click", function () {
      mobileMenuOverlay.classList.add("active");
    });
  }
  if (mobileMenuClose && mobileMenuOverlay) {
    mobileMenuClose.addEventListener("click", function () {
      mobileMenuOverlay.classList.remove("active");
    });
  }

  // 5. CUSTOM CURSOR FOR DESKTOP
  var hasPointer = window.matchMedia("(pointer: fine)").matches;
  var cursorDot = document.getElementById("custom-cursor-dot");
  var cursorRing = document.getElementById("custom-cursor-ring");

  if (hasPointer && cursorDot && cursorRing && !prefersReducedMotion) {
    var mouseX = window.innerWidth / 2;
    var mouseY = window.innerHeight / 2;
    var ringX = mouseX;
    var ringY = mouseY;
    var isCursorVisible = false;

    document.addEventListener("mousemove", function (e) {
      mouseX = e.clientX;
      mouseY = e.clientY;
      if (!isCursorVisible) {
        isCursorVisible = true;
        cursorDot.style.opacity = "1";
        cursorRing.style.opacity = "1";
      }

      cursorDot.style.transform = "translate3d(" + mouseX + "px," + mouseY + "px,0)";

      var target = e.target;
      if (
        target &&
        (target.closest("a") ||
          target.closest("button") ||
          target.closest(".proposal-chip") ||
          target.closest("input") ||
          target.closest("select") ||
          target.closest("textarea"))
      ) {
        document.body.classList.add("cursor-hover");
      } else {
        document.body.classList.remove("cursor-hover");
      }
    });

    document.addEventListener("mouseleave", function () {
      cursorDot.style.opacity = "0";
      cursorRing.style.opacity = "0";
      isCursorVisible = false;
    });

    function renderRing() {
      ringX += (mouseX - ringX) * 0.18;
      ringY += (mouseY - ringY) * 0.18;
      cursorRing.style.transform = "translate3d(" + ringX + "px," + ringY + "px,0)";
      requestAnimationFrame(renderRing);
    }
    requestAnimationFrame(renderRing);
  }

  // 6. INTERACTIVE PROPOSAL SELECTION & DIRECT WHATSAPP FLOW
  var proposalChips = document.querySelectorAll(".proposal-chip");
  var hiddenProductType = document.getElementById("proposal-product-type");
  var vehicleActionBox = document.getElementById("proposal-action-vehicle");
  var otherActionBox = document.getElementById("proposal-action-other");
  var vehicleWhatsappBtn = document.getElementById("proposal-vehicle-whatsapp-btn");
  var vehicleBtnLabel = document.getElementById("proposal-vehicle-btn-label");
  var vehicleTitle = document.getElementById("proposal-vehicle-title");
  var otherWhatsappBtn = document.getElementById("proposal-other-whatsapp-btn");
  var otherTitle = document.getElementById("proposal-other-title");
  var otherBtnLabel = document.getElementById("proposal-other-btn-label");

  var productConfigs = {
    kasko: {
      name: "Kasko Sigortası",
      isVehicle: true,
      whatsappMsg: "Merhaba, Kasko Sigortası için teklif almak istiyorum. Ruhsat fotoğrafımı iletiyorum.",
      btnLabel: "Ruhsatı WhatsApp'tan Gönder",
    },
    trafik: {
      name: "Trafik Sigortası",
      isVehicle: true,
      whatsappMsg: "Merhaba, Trafik Sigortası için teklif almak istiyorum. Ruhsat fotoğrafımı iletiyorum.",
      btnLabel: "Ruhsatı WhatsApp'tan Gönder",
    },
    saglik: {
      name: "Sağlık Sigortası",
      isVehicle: false,
      whatsappMsg: "Merhaba, Sağlık Sigortası için teklif almak istiyorum.",
      btnLabel: "WhatsApp'tan Teklif Al",
    },
    konut: {
      name: "Konut Sigortası",
      isVehicle: false,
      whatsappMsg: "Merhaba, Konut Sigortası için teklif almak istiyorum.",
      btnLabel: "WhatsApp'tan Teklif Al",
    },
    dask: {
      name: "DASK Zorunlu Deprem Sigortası",
      isVehicle: false,
      whatsappMsg: "Merhaba, DASK Zorunlu Deprem Sigortası için teklif almak istiyorum.",
      btnLabel: "WhatsApp'tan Teklif Al",
    },
    isyeri: {
      name: "İşyeri Sigortası",
      isVehicle: false,
      whatsappMsg: "Merhaba, İşyeri Sigortası için teklif almak istiyorum.",
      btnLabel: "WhatsApp'tan Teklif Al",
    },
    diger: {
      name: "Özel Sigorta",
      isVehicle: false,
      whatsappMsg: "Merhaba, sigorta teklifi almak istiyorum.",
      btnLabel: "WhatsApp'tan Teklif Al",
    },
  };

  function selectProposalProduct(productId) {
    var config = productConfigs[productId] || productConfigs["kasko"];

    proposalChips.forEach(function (chip) {
      if (chip.getAttribute("data-product") === productId) {
        chip.classList.add("active");
      } else {
        chip.classList.remove("active");
      }
    });

    if (hiddenProductType) {
      hiddenProductType.value = productId;
    }

    var whatsappNum = (typeof plused_settings !== "undefined" && plused_settings.whatsapp_raw) ? plused_settings.whatsapp_raw : "905304777737";
    var whatsappUrl = "https://wa.me/" + whatsappNum + "?text=" + encodeURIComponent(config.whatsappMsg);

    if (config.isVehicle) {
      if (vehicleActionBox) vehicleActionBox.style.display = "flex";
      if (otherActionBox) otherActionBox.style.display = "none";
      if (vehicleTitle) vehicleTitle.textContent = config.name + " İçin Hızlı İşlem";
      if (vehicleBtnLabel) vehicleBtnLabel.textContent = config.btnLabel;
      if (vehicleWhatsappBtn) vehicleWhatsappBtn.href = whatsappUrl;
    } else {
      if (vehicleActionBox) vehicleActionBox.style.display = "none";
      if (otherActionBox) otherActionBox.style.display = "flex";
      if (otherTitle) otherTitle.textContent = config.name + " Teklif Talebi";
      if (otherBtnLabel) otherBtnLabel.textContent = config.btnLabel;
      if (otherWhatsappBtn) otherWhatsappBtn.href = whatsappUrl;
    }
  }

  proposalChips.forEach(function (chip) {
    chip.addEventListener("click", function () {
      var prod = this.getAttribute("data-product");
      selectProposalProduct(prod);
    });
  });

  // Auto-select product from URL parameter (?urun=kasko)
  try {
    var urlParams = new URLSearchParams(window.location.search);
    var productParam = urlParams.get("urun");
    if (productParam && productConfigs[productParam]) {
      selectProposalProduct(productParam);
    }
  } catch (e) {}

  // Global trigger for quote buttons across the page
  window.plusedSelectProductAndScroll = function (productId) {
    selectProposalProduct(productId);
    var proposalSection = document.getElementById("teklif-al");
    if (proposalSection) {
      smoothScrollTo(proposalSection);
    }
  };

  document.querySelectorAll("[data-quote-product]").forEach(function (btn) {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      var prod = this.getAttribute("data-quote-product");
      window.plusedSelectProductAndScroll(prod);
    });
  });

  // 7. EMERGENCY CLAIM SUPPORT MODAL (HASAR DESTEK)
  var claimModal = document.getElementById("claim-modal");
  var claimOpenBtns = document.querySelectorAll(".open-claim-modal");

  claimOpenBtns.forEach(function (btn) {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      if (claimModal) claimModal.classList.add("active");
    });
  });

  if (claimModal) {
    var closeButtons = claimModal.querySelectorAll("#close-claim-modal, .close-modal-btn");
    closeButtons.forEach(function (cb) {
      cb.addEventListener("click", function () {
        claimModal.classList.remove("active");
      });
    });

    claimModal.addEventListener("click", function (e) {
      if (e.target === claimModal) {
        claimModal.classList.remove("active");
      }
    });
  }

  // VIDEO PLAY/PAUSE OBSERVER (PREVENTS EXCESSIVE DATA USAGE)
  var lazyVideos = document.querySelectorAll(".lazy-video");
  if ("IntersectionObserver" in window && lazyVideos.length > 0) {
    var videoObserver = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          var video = entry.target;
          if (entry.isIntersecting) {
            var playPromise = video.play();
            if (playPromise !== undefined) {
              playPromise.catch(function () {});
            }
          } else {
            video.pause();
          }
        });
      },
      { rootMargin: "150px 0px", threshold: 0.15 }
    );
    lazyVideos.forEach(function (v) {
      videoObserver.observe(v);
    });
  }

  // 8. FAQ & PRODUCT LANDING ACCORDIONS
  var accordionHeaders = document.querySelectorAll(".accordion-header");
  accordionHeaders.forEach(function (header) {
    header.addEventListener("click", function () {
      var item = this.closest(".accordion-item");
      if (!item) return;
      var isOpen = item.classList.contains("open");
      var body = item.querySelector(".accordion-body");
      var icon = item.querySelector(".accordion-icon") || item.querySelector(".accordion-toggle-icon");

      if (isOpen) {
        item.classList.remove("open");
        if (body) body.style.maxHeight = "0px";
        if (icon) icon.innerHTML = "&#43;";
      } else {
        item.classList.add("open");
        if (body) body.style.maxHeight = (body.scrollHeight + 30) + "px";
        if (icon) icon.innerHTML = "&minus;";
      }
    });
  });

  // 9. LEGAL MODALS (KVKK, Gizlilik, Çerez)
  var legalModal = document.getElementById("legal-modal");
  var legalTitle = document.getElementById("legal-modal-title");
  var legalBody = document.getElementById("legal-modal-body");
  var legalClose = document.getElementById("legal-modal-close");

  var legalTexts = {
    kvkk: {
      title: "KVKK Aydınlatma Metni",
      text: "6698 sayılı Kişisel Verilerin Korunması Kanunu uyarınca, veri sorumlusu sıfatıyla Plused Sigorta tarafından işlenen kişisel verileriniz; yalnızca sigorta poliçesi teklifi hazırlama, risk analizi ve poliçe tanzimi amaçlarıyla sınırlı olarak işlenmektedir. Bilgileriniz yasal mevzuat dışında üçüncü şahıslarla paylaşılmaz.",
    },
    privacy: {
      title: "Gizlilik Politikası",
      text: "Plused Sigorta olarak kullanıcılarımızın gizliliğine saygı duyuyoruz. Formlar aracılığıyla iletilen ad, telefon ve araç bilgileri yalnızca teklif oluşturmak ve poliçe danışmanlığı sağlamak amacıyla kullanılır.",
    },
    cookies: {
      title: "Çerez Politikası",
      text: "Sitemizde kullanıcı deneyimini iyileştirmek, performansı analiz etmek ve temel site işlevlerini sürdürmek amacıyla zorunlu çerezler kullanılmaktadır. Sitemizi kullanarak bu çerezleri kabul etmiş olursunuz.",
    },
  };

  document.querySelectorAll("[data-legal]").forEach(function (btn) {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      var key = this.getAttribute("data-legal");
      var data = legalTexts[key];
      if (data && legalModal && legalTitle && legalBody) {
        legalTitle.textContent = data.title;
        legalBody.textContent = data.text;
        legalModal.classList.add("active");
      }
    });
  });

  if (legalClose && legalModal) {
    legalClose.addEventListener("click", function () {
      legalModal.classList.remove("active");
    });
  }
  if (legalModal) {
    legalModal.addEventListener("click", function (e) {
      if (e.target === legalModal) {
        legalModal.classList.remove("active");
      }
    });
  }

  // ESC key closes modals
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
      if (claimModal) claimModal.classList.remove("active");
      if (legalModal) legalModal.classList.remove("active");
      if (mobileMenuOverlay) mobileMenuOverlay.classList.remove("active");
    }
  });
});
