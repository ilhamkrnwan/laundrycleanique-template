/**
 * Cleanique Laundry - Frontend Scripts (Vanilla JS, Zero-Dependency)
 * Brand: PT Indotech Berkah Abadi
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Sticky Header Shrink & Shadow on Scroll
  const header = document.querySelector('#site-header');
  if (header) {
    const handleScroll = () => {
      if (window.scrollY > 20) {
        header.classList.add('is-scrolled');
      } else {
        header.classList.remove('is-scrolled');
      }
    };
    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();
  }

  // 2. Accessible Mobile Navigation Drawer
  const navToggle = document.querySelector('#cq-nav-toggle');
  const drawer = document.querySelector('#cq-mobile-drawer');
  const drawerClose = document.querySelector('#cq-drawer-close');
  const drawerBackdrop = document.querySelector('#cq-drawer-backdrop');

  const openDrawer = () => {
    if (!drawer) return;
    drawer.classList.add('is-open');
    drawer.setAttribute('aria-hidden', 'false');
    if (navToggle) navToggle.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
  };

  const closeDrawer = () => {
    if (!drawer) return;
    drawer.classList.remove('is-open');
    drawer.setAttribute('aria-hidden', 'true');
    if (navToggle) navToggle.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  };

  if (navToggle) {
    navToggle.addEventListener('click', () => {
      const isOpen = drawer && drawer.classList.contains('is-open');
      isOpen ? closeDrawer() : openDrawer();
    });
  }

  if (drawerClose) drawerClose.addEventListener('click', closeDrawer);
  if (drawerBackdrop) drawerBackdrop.addEventListener('click', closeDrawer);

  // Close drawer on clicking internal link or pressing ESC
  if (drawer) {
    drawer.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', closeDrawer);
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && drawer.classList.contains('is-open')) {
        closeDrawer();
      }
    });
  }

  // 3. Smooth Scroll for Internal Anchor Links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const targetId = this.getAttribute('href');
      if (targetId.length > 1 && document.querySelector(targetId)) {
        e.preventDefault();
        const targetElement = document.querySelector(targetId);
        targetElement.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });

  // 4. Form Free Trial 7 Hari Handler -> WhatsApp Lead Routing
  const trialForm = document.querySelector('#form-trial-laundry');
  if (trialForm) {
    trialForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const laundryName = document.querySelector('#trial-nama-laundry')?.value.trim() || '';
      const ownerName = document.querySelector('#trial-nama-owner')?.value.trim() || '';
      const whatsapp = document.querySelector('#trial-wa')?.value.trim() || '';
      const email = document.querySelector('#trial-email')?.value.trim() || '';
      const city = document.querySelector('#trial-kota')?.value.trim() || '';

      const waNumber = (window.CleaniqueConfig && window.CleaniqueConfig.waNumber) 
        ? window.CleaniqueConfig.waNumber 
        : '6281234567890';

      const textMsg = `Halo Tim Cleanique Laundry,\nSaya ingin aktivasi *FREE TRIAL 7 HARI* Aplikasi Kasir Laundry Digital (app.laundrycleanique.com).\n\n*Nama Usaha:* ${laundryName}\n*Pemilik:* ${ownerName}\n*No. WA:* ${whatsapp}\n*Email:* ${email}\n*Kota:* ${city}\n\nMohon dibantu pembuatan akun demo trial gratisnya. Terima kasih!`;
      
      const encodedUrl = `https://api.whatsapp.com/send?phone=${waNumber}&text=${encodeURIComponent(textMsg)}`;
      
      const submitBtn = trialForm.querySelector('button[type="submit"]');
      if (submitBtn) {
        submitBtn.innerHTML = 'Memproses Trial...';
        submitBtn.disabled = true;
      }

      setTimeout(() => {
        window.open(encodedUrl, '_blank');
        if (submitBtn) {
          submitBtn.innerHTML = '<i class="ri-check-line" aria-hidden="true"></i> Berhasil! Membuka WhatsApp';
          setTimeout(() => {
            submitBtn.innerHTML = '<i class="ri-rocket-2-line" aria-hidden="true"></i> Daftar & Dapatkan Trial 7 Hari Sekarang';
            submitBtn.disabled = false;
          }, 3000);
        }
      }, 500);
    });
  }

  // 5. Interactive ROI Calculator Logic
  const calcKg = document.querySelector('#calc-kg');
  const calcPrice = document.querySelector('#calc-price');
  const calcCostPct = document.querySelector('#calc-cost-pct');
  const calcBtn = document.querySelector('#cq-calc-btn');
  const resultOmzet = document.querySelector('#calc-result-omzet');
  const resultProfit = document.querySelector('#calc-result-profit');

  const runCalculator = () => {
    const kgPerHari = parseFloat(calcKg?.value || 60);
    const hargaPerKg = parseFloat(calcPrice?.value || 7000);
    const biayaOpsPersen = parseFloat(calcCostPct?.value || 35);

    const omzetHarian = kgPerHari * hargaPerKg;
    const omzetBulanan = omzetHarian * 30;
    const biayaBulanan = omzetBulanan * (biayaOpsPersen / 100);
    const profitBersihBulanan = omzetBulanan - biayaBulanan;

    const formatRupiah = (num) => {
      return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(num);
    };

    if (resultOmzet) resultOmzet.textContent = formatRupiah(omzetBulanan);
    if (resultProfit) resultProfit.textContent = formatRupiah(profitBersihBulanan);
  };

  if (calcBtn) {
    calcBtn.addEventListener('click', runCalculator);

    // Real-time reactive update on input/change
    [calcKg, calcPrice, calcCostPct].forEach(input => {
      if (input) {
        input.addEventListener('input', runCalculator);
        input.addEventListener('change', runCalculator);
      }
    });

    // Preset chips (40 kg, 60 kg, 100 kg, 150 kg)
    document.querySelectorAll('.cq-calc-preset-chip').forEach(chip => {
      chip.addEventListener('click', () => {
        document.querySelectorAll('.cq-calc-preset-chip').forEach(c => c.classList.remove('is-active'));
        chip.classList.add('is-active');
        const val = chip.getAttribute('data-kg');
        if (val && calcKg) {
          calcKg.value = val;
          runCalculator();
        }
      });
    });
  }

  // Proposal / Lead Booking Form on Paket Usaha
  const proposalForm = document.querySelector('#cq-proposal-form');
  if (proposalForm) {
    // 3-Box Package Selector Cards Sync
    const paketRadios = proposalForm.querySelectorAll('input[name="paket_radio"]');
    const hiddenPaket = proposalForm.querySelector('#investor-paket');
    paketRadios.forEach(radio => {
      radio.addEventListener('change', function() {
        proposalForm.querySelectorAll('.cq-paket-choice-card').forEach(card => card.classList.remove('is-selected'));
        this.closest('.cq-paket-choice-card')?.classList.add('is-selected');
        if (hiddenPaket) {
          hiddenPaket.value = this.value;
        }
      });
    });

    proposalForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const name = document.querySelector('#investor-name')?.value.trim() || '';
      const wa = document.querySelector('#investor-wa')?.value.trim() || '';
      const city = document.querySelector('#investor-city')?.value.trim() || '';
      const paket = document.querySelector('#investor-paket')?.value || 'Commercial Pro';

      const waNumber = typeof CleaniqueConfig !== 'undefined' ? CleaniqueConfig.waNumber : '6285600061005';
      const cleanWa = waNumber.replace(/[^0-9]/g, '');

      const msg = `Halo Tim Cleanique Laundry (PT Indotech Berkah Abadi), saya tertarik konsultasi Paket Usaha Laundry:\n\n` +
                  `• Nama: ${name}\n` +
                  `• WhatsApp: ${wa}\n` +
                  `• Kota / Lokasi Usaha: ${city}\n` +
                  `• Pilihan Paket: ${paket}\n\n` +
                  `Mohon kirimkan proposal rincian modal, estimasi BEP, dan voucher promo. Terima kasih.`;

      const encodedUrl = `https://api.whatsapp.com/send?phone=${cleanWa}&text=${encodeURIComponent(msg)}`;

      const submitBtn = proposalForm.querySelector('button[type="submit"]');
      if (submitBtn) {
        submitBtn.innerHTML = '<i class="ri-loader-4-line ri-spin" aria-hidden="true"></i> Menyiapkan Proposal...';
        submitBtn.disabled = true;
      }

      setTimeout(() => {
        window.open(encodedUrl, '_blank');
        if (submitBtn) {
          submitBtn.innerHTML = '<i class="ri-check-line" aria-hidden="true"></i> Terhubung ke WhatsApp!';
          setTimeout(() => {
            submitBtn.innerHTML = '<i class="ri-cursor-fill" aria-hidden="true"></i> Klik Segera Daftar Promo Kemitraan';
            submitBtn.disabled = false;
          }, 3000);
        }
      }, 500);
    });
  }

  // 6. Accessible FAQ Accordion Toggle
  document.querySelectorAll('.cq-accordion-trigger, .cq-accordion-header').forEach(trigger => {
    trigger.addEventListener('click', () => {
      const item = trigger.closest('.cq-accordion-item');
      if (!item) return;
      const isOpen = item.classList.contains('is-open');

      // Optional: close other accordions in the same container for cleaner view
      const parent = item.closest('.cq-accordion');
      if (parent) {
        parent.querySelectorAll('.cq-accordion-item').forEach(other => {
          if (other !== item) {
            other.classList.remove('is-open');
            other.querySelector('.cq-accordion-trigger, .cq-accordion-header')?.setAttribute('aria-expanded', 'false');
          }
        });
      }

      if (isOpen) {
        item.classList.remove('is-open');
        trigger.setAttribute('aria-expanded', 'false');
      } else {
        item.classList.add('is-open');
        trigger.setAttribute('aria-expanded', 'true');
      }
    });
  });

  // 7. Universal Promo Countdown Timer
  const initCountdowns = () => {
    const timerElements = document.querySelectorAll('[data-countdown-deadline]');
    if (!timerElements.length) return;

    const updateTimer = () => {
      const now = new Date().getTime();

      timerElements.forEach(timerEl => {
        const deadlineStr = timerEl.getAttribute('data-countdown-deadline');
        const deadline = new Date(deadlineStr).getTime();
        const diff = deadline - now;

        const dayEl = timerEl.querySelector('.cq-cd-days');
        const hourEl = timerEl.querySelector('.cq-cd-hours');
        const minEl = timerEl.querySelector('.cq-cd-mins');
        const secEl = timerEl.querySelector('.cq-cd-secs');

        if (diff <= 0) {
          if (dayEl) dayEl.textContent = '00';
          if (hourEl) hourEl.textContent = '00';
          if (minEl) minEl.textContent = '00';
          if (secEl) secEl.textContent = '00';
          return;
        }

        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diff % (1000 * 60)) / 1000);

        const pad = (n) => String(n).padStart(2, '0');

        if (dayEl) dayEl.textContent = pad(days);
        if (hourEl) hourEl.textContent = pad(hours);
        if (minEl) minEl.textContent = pad(minutes);
        if (secEl) secEl.textContent = pad(seconds);
      });
    };

    updateTimer();
    setInterval(updateTimer, 1000);
  };

  initCountdowns();

  // 8. Pricing Plan Monthly / Annual Switcher
  const btnMonthly = document.querySelector('#cq-btn-monthly');
  const btnYearly = document.querySelector('#cq-btn-yearly');
  const proVal = document.querySelector('#price-pro-val');
  const proPeriod = document.querySelector('#price-pro-period');
  const bizVal = document.querySelector('#price-biz-val');
  const bizPeriod = document.querySelector('#price-biz-period');

  if (btnMonthly && btnYearly) {
    btnMonthly.addEventListener('click', () => {
      btnMonthly.classList.add('is-active');
      btnMonthly.setAttribute('aria-selected', 'true');
      btnYearly.classList.remove('is-active');
      btnYearly.setAttribute('aria-selected', 'false');

      if (proVal) proVal.textContent = 'Rp 60.000';
      if (proPeriod) proPeriod.textContent = '/ bulan';
      if (bizVal) bizVal.textContent = 'Rp 149.000';
      if (bizPeriod) bizPeriod.textContent = '/ bulan';
    });

    btnYearly.addEventListener('click', () => {
      btnYearly.classList.add('is-active');
      btnYearly.setAttribute('aria-selected', 'true');
      btnMonthly.classList.remove('is-active');
      btnMonthly.setAttribute('aria-selected', 'false');

      if (proVal) proVal.textContent = 'Rp 48.000';
      if (proPeriod) proPeriod.textContent = '/ bln (hemat 20%)';
      if (bizVal) bizVal.textContent = 'Rp 119.000';
      if (bizPeriod) bizPeriod.textContent = '/ bln (hemat 20%)';
    });
  }

  // ========================================================
  // 9. Article Detail Page & Global Features
  // ========================================================

  // 9.1 Reading Progress Bar
  const progressBar = document.querySelector('#cq-reading-progress');
  const articleBody = document.querySelector('.cq-single-main');

  if (progressBar && articleBody) {
    const updateReadingProgress = () => {
      const rect = articleBody.getBoundingClientRect();
      const articleHeight = articleBody.offsetHeight;
      const windowHeight = window.innerHeight;
      
      const scrolled = window.scrollY - articleBody.offsetTop + 100;
      let progress = (scrolled / (articleHeight - windowHeight + 200)) * 100;
      progress = Math.min(100, Math.max(0, progress));
      progressBar.style.width = `${progress}%`;
    };

    window.addEventListener('scroll', updateReadingProgress, { passive: true });
    updateReadingProgress();
  }

  // 9.2 Global Search Modal
  const searchModal = document.querySelector('#cq-search-modal');
  const searchOpenBtn = document.querySelector('#cq-search-open-btn');
  const searchCloseBtn = document.querySelector('#cq-search-close-btn');
  const searchBackdrop = document.querySelector('#cq-search-backdrop');
  const searchInput = document.querySelector('.cq-search-modal-input');

  const openSearchModal = () => {
    if (!searchModal) return;
    searchModal.classList.add('is-open');
    searchModal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    setTimeout(() => {
      if (searchInput) searchInput.focus();
    }, 100);
  };

  const closeSearchModal = () => {
    if (!searchModal) return;
    searchModal.classList.remove('is-open');
    searchModal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  };

  if (searchOpenBtn) searchOpenBtn.addEventListener('click', openSearchModal);
  if (searchCloseBtn) searchCloseBtn.addEventListener('click', closeSearchModal);
  if (searchBackdrop) searchBackdrop.addEventListener('click', closeSearchModal);

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && searchModal && searchModal.classList.contains('is-open')) {
      closeSearchModal();
    }
    // Shortcut Ctrl+K or Cmd+K to open search
    if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') {
      e.preventDefault();
      if (searchModal && searchModal.classList.contains('is-open')) {
        closeSearchModal();
      } else {
        openSearchModal();
      }
    }
  });

  // 9.3 Table of Contents (TOC) Toggle
  const tocToggle = document.querySelector('#cq-toc-toggle');
  const tocNav = document.querySelector('#cq-toc-list');

  if (tocToggle && tocNav) {
    tocToggle.addEventListener('click', () => {
      const isCollapsed = tocNav.classList.toggle('is-collapsed');
      tocToggle.setAttribute('aria-expanded', !isCollapsed);
      const toggleText = tocToggle.querySelector('.cq-toc-toggle-text');
      const toggleIcon = tocToggle.querySelector('i');

      if (toggleText) {
        toggleText.textContent = isCollapsed ? 'Tampilkan' : 'Sembunyikan';
      }
      if (toggleIcon) {
        toggleIcon.className = isCollapsed ? 'ri-arrow-down-s-line' : 'ri-arrow-up-s-line';
      }
    });
  }

  // 9.4 Sources / References Toggle
  const refToggle = document.querySelector('#cq-ref-toggle-btn');
  const refBody = document.querySelector('#cq-ref-content');

  if (refToggle && refBody) {
    refToggle.addEventListener('click', () => {
      const isCollapsed = refBody.classList.toggle('is-collapsed');
      refToggle.setAttribute('aria-expanded', !isCollapsed);
      const toggleText = refToggle.querySelector('.cq-ref-toggle-text');
      const toggleIcon = refToggle.querySelector('i');

      if (toggleText) {
        toggleText.textContent = isCollapsed ? 'Buka Referensi' : 'Tutup Referensi';
      }
      if (toggleIcon) {
        toggleIcon.className = isCollapsed ? 'ri-arrow-down-s-line' : 'ri-arrow-up-s-line';
      }
    });
  }

  // 9.5 Copy Link to Clipboard with Toast Notification
  const copyBtns = document.querySelectorAll('.cq-copy-link-btn');
  const toast = document.querySelector('#cq-toast-notification');

  const showToast = (message = 'Tautan artikel berhasil disalin!') => {
    if (!toast) return;
    const msgEl = toast.querySelector('#cq-toast-message');
    if (msgEl) msgEl.textContent = message;
    toast.classList.add('show');
    toast.setAttribute('aria-hidden', 'false');
    setTimeout(() => {
      toast.classList.remove('show');
      toast.setAttribute('aria-hidden', 'true');
    }, 3200);
  };

  copyBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const urlToCopy = btn.getAttribute('data-url') || window.location.href;
      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(urlToCopy).then(() => {
          showToast('Tautan artikel berhasil disalin ke clipboard!');
        }).catch(() => {
          showToast('Tautan artikel berhasil disalin!');
        });
      } else {
        // Fallback input method
        const tempInput = document.createElement('input');
        tempInput.value = urlToCopy;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        showToast('Tautan artikel berhasil disalin ke clipboard!');
      }
    });
  });

  // 9.6 Save / Bookmark Article Feature (LocalStorage)
  const bookmarkBtn = document.querySelector('#cq-bookmark-btn');
  if (bookmarkBtn) {
    const postId = bookmarkBtn.getAttribute('data-post-id');
    const getBookmarks = () => {
      try {
        return JSON.parse(localStorage.getItem('cq_saved_articles') || '[]');
      } catch (e) {
        return [];
      }
    };

    const isBookmarked = (id) => getBookmarks().includes(id);

    const updateBookmarkUI = (saved) => {
      const icon = bookmarkBtn.querySelector('i');
      const text = bookmarkBtn.querySelector('.cq-bookmark-text');
      if (saved) {
        bookmarkBtn.classList.add('is-bookmarked');
        if (icon) icon.className = 'ri-bookmark-fill';
        if (text) text.textContent = 'Tersimpan';
      } else {
        bookmarkBtn.classList.remove('is-bookmarked');
        if (icon) icon.className = 'ri-bookmark-line';
        if (text) text.textContent = 'Simpan';
      }
    };

    // Check on page load
    if (isBookmarked(postId)) {
      updateBookmarkUI(true);
    }

    bookmarkBtn.addEventListener('click', () => {
      let bookmarks = getBookmarks();
      if (bookmarks.includes(postId)) {
        bookmarks = bookmarks.filter(id => id !== postId);
        localStorage.setItem('cq_saved_articles', JSON.stringify(bookmarks));
        updateBookmarkUI(false);
        showToast('Artikel dihapus dari daftar simpanan.');
      } else {
        bookmarks.push(postId);
        localStorage.setItem('cq_saved_articles', JSON.stringify(bookmarks));
        updateBookmarkUI(true);
        showToast('Artikel disimpan! Akses kembali kapan saja.');
      }
    });
  }

  // 9.7 Sidebar Table of Contents Scrollspy
  const sidebarTocLinks = document.querySelectorAll('.cq-stoc-link');
  if (sidebarTocLinks.length > 0) {
    const sections = [];
    sidebarTocLinks.forEach(link => {
      const targetId = link.getAttribute('href');
      if (targetId && targetId.startsWith('#')) {
        const el = document.querySelector(targetId);
        if (el) sections.push({ link, el });
      }
    });

    const handleScrollspy = () => {
      const scrollPos = window.scrollY + 140;
      sections.forEach(({ link, el }) => {
        const top = el.offsetTop;
        const height = el.offsetHeight;
        if (scrollPos >= top && scrollPos < top + height) {
          sidebarTocLinks.forEach(l => l.classList.remove('active'));
          link.classList.add('active');
        }
      });
    };

    window.addEventListener('scroll', handleScrollspy, { passive: true });
    handleScrollspy();
  }

  // ========================================================
  // 10. Universal Image Preview Lightbox Modal
  // ========================================================
  const initImagePreviewModal = () => {
    const modal = document.querySelector('#cq-img-modal');
    if (!modal) return;

    const modalImg = modal.querySelector('#cq-img-modal-img');
    const modalCaption = modal.querySelector('#cq-img-modal-caption');
    const modalCounter = modal.querySelector('#cq-img-modal-counter');
    const modalSpinner = modal.querySelector('#cq-img-modal-spinner');
    const modalDownload = modal.querySelector('#cq-img-modal-download');
    const modalClose = modal.querySelector('#cq-img-modal-close');
    const modalBackdrop = modal.querySelector('#cq-img-modal-backdrop');
    const modalPrev = modal.querySelector('#cq-img-modal-prev');
    const modalNext = modal.querySelector('#cq-img-modal-next');
    const modalZoom = modal.querySelector('#cq-img-modal-zoom');
    const modalZoomIcon = modal.querySelector('#cq-img-modal-zoom-icon');
    const modalLinkBtn = modal.querySelector('#cq-img-modal-link-btn');
    const modalFigure = modal.querySelector('#cq-img-modal-figure');
    const modalStage = modal.querySelector('#cq-img-modal-stage');

    let currentGallery = [];
    let currentIndex = 0;
    let isZoomed = false;

    // Filter to identify previewable content images
    const isPreviewable = (img) => {
      if (!img || !(img instanceof HTMLElement)) return false;

      // Ignore if explicitly disabled
      if (
        img.classList.contains('no-preview') ||
        img.hasAttribute('data-no-preview') ||
        img.hasAttribute('data-modal-ignore')
      ) {
        return false;
      }

      // Ignore lightbox's own image
      if (img.id === 'cq-img-modal-img' || img.closest('#cq-img-modal')) {
        return false;
      }

      // Ignore website logos
      if (
        img.classList.contains('cq-brand-logo-img') ||
        img.classList.contains('custom-logo') ||
        img.closest('.cq-brand') ||
        img.closest('.cq-payno-footer-brand') ||
        img.closest('#site-header .cq-brand')
      ) {
        return false;
      }

      // Ignore small avatars, user profile icons, badges
      if (
        img.classList.contains('avatar') ||
        img.classList.contains('cq-avatar') ||
        img.closest('.cq-testi-card-avatar') ||
        img.closest('.cq-author-avatar') ||
        img.closest('.cq-comment-avatar') ||
        img.closest('.cq-bio-avatar')
      ) {
        return false;
      }

      // Ignore tiny tracking pixels, decorative icons (< 45px)
      const rect = img.getBoundingClientRect();
      const naturalW = img.naturalWidth;
      const naturalH = img.naturalHeight;
      const displayW = rect.width;
      const displayH = rect.height;

      if (
        (displayW > 0 && displayW < 45 && displayH > 0 && displayH < 45) ||
        (naturalW > 0 && naturalW < 45 && naturalH > 0 && naturalH < 45)
      ) {
        return false;
      }

      // Ensure valid image source exists
      const src = img.currentSrc || img.getAttribute('src');
      if (!src || src.trim() === '' || src.startsWith('data:image/svg')) {
        return false;
      }

      return true;
    };

    // Mark previewable images with styling class & attributes
    const markPreviewableImages = () => {
      document.querySelectorAll('img').forEach((img) => {
        if (isPreviewable(img)) {
          img.classList.add('cq-previewable-img');
          img.setAttribute('data-previewable', 'true');
          if (!img.getAttribute('title') && img.getAttribute('alt')) {
            img.setAttribute('title', 'Klik untuk memperbesar pratinjau gambar');
          }
        }
      });
    };

    markPreviewableImages();

    // Reset zoom state
    const setZoom = (zoomed) => {
      isZoomed = zoomed;
      if (modalFigure) {
        modalFigure.classList.toggle('is-zoomed', isZoomed);
      }
      if (modalZoomIcon) {
        modalZoomIcon.className = isZoomed ? 'ri-zoom-out-line' : 'ri-zoom-in-line';
      }
    };

    // Open Modal
    const openModal = () => {
      modal.classList.add('is-open');
      modal.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
      if (modalClose) modalClose.focus();
    };

    // Close Modal
    const closeModal = () => {
      modal.classList.remove('is-open');
      modal.setAttribute('aria-hidden', 'true');
      setZoom(false);
      document.body.style.overflow = '';
      if (modalImg) {
        modalImg.classList.remove('is-loaded');
      }
    };

    // Render image by index
    const displayImage = (index) => {
      if (!currentGallery.length) return;

      // Wrap-around index
      currentIndex = (index + currentGallery.length) % currentGallery.length;
      const targetImg = currentGallery[currentIndex];
      if (!targetImg) return;

      // Reset zoom
      setZoom(false);

      // Extract image source (prefer high-res if provided via data attributes or currentSrc)
      const fullSrc =
        targetImg.getAttribute('data-full-src') ||
        targetImg.getAttribute('data-large-src') ||
        targetImg.getAttribute('data-src') ||
        targetImg.currentSrc ||
        targetImg.src;

      // Extract caption
      let captionText = '';
      const parentFigure = targetImg.closest('figure');
      const figcaption = parentFigure ? parentFigure.querySelector('figcaption') : null;

      if (figcaption && figcaption.textContent.trim()) {
        captionText = figcaption.textContent.trim();
      } else if (targetImg.getAttribute('alt')) {
        captionText = targetImg.getAttribute('alt').trim();
      } else if (targetImg.getAttribute('title')) {
        captionText = targetImg.getAttribute('title').trim();
      }

      if (modalCaption) {
        modalCaption.textContent = captionText;
        modalCaption.style.display = captionText ? 'block' : 'none';
      }

      // Contextual link (if image was wrapped in a page link)
      const parentLink = targetImg.closest('a');
      if (parentLink && parentLink.href) {
        const href = parentLink.href.trim();
        const isImageDirectLink = /\.(jpe?g|png|gif|webp|svg)(\?.*)?$/i.test(href);
        const isHashOrEmpty = href === '#' || href.startsWith('javascript:');

        if (!isImageDirectLink && !isHashOrEmpty) {
          modalLinkBtn.href = href;
          modalLinkBtn.style.display = 'inline-flex';
        } else {
          modalLinkBtn.style.display = 'none';
        }
      } else {
        modalLinkBtn.style.display = 'none';
      }

      // Counter
      if (modalCounter) {
        if (currentGallery.length > 1) {
          modalCounter.textContent = `${currentIndex + 1} / ${currentGallery.length}`;
          modalCounter.style.display = 'block';
        } else {
          modalCounter.style.display = 'none';
        }
      }

      // Prev / Next button visibility
      if (modalPrev) modalPrev.classList.toggle('is-hidden', currentGallery.length <= 1);
      if (modalNext) modalNext.classList.toggle('is-hidden', currentGallery.length <= 1);

      // Download / Full Resolution button
      if (modalDownload) {
        modalDownload.href = fullSrc;
      }

      // Load Image with Spinner & Immediate Render
      if (modalImg) {
        modalImg.classList.remove('is-loaded');
        modalImg.src = fullSrc;
        modalImg.alt = captionText || 'Pratinjau Gambar Cleanique';

        if (modalImg.complete && modalImg.naturalWidth > 0) {
          if (modalSpinner) modalSpinner.classList.remove('is-visible');
          modalImg.classList.add('is-loaded');
        } else {
          if (modalSpinner) modalSpinner.classList.add('is-visible');
          modalImg.onload = () => {
            if (modalSpinner) modalSpinner.classList.remove('is-visible');
            modalImg.classList.add('is-loaded');
          };
          modalImg.onerror = () => {
            modalImg.src = targetImg.src;
            if (modalSpinner) modalSpinner.classList.remove('is-visible');
            modalImg.classList.add('is-loaded');
          };
        }
      }
    };

    // Open lightbox with specific clicked image
    const openLightbox = (img) => {
      // Refresh current gallery of visible previewable images
      currentGallery = Array.from(document.querySelectorAll('img')).filter((el) => {
        return isPreviewable(el) && el.offsetParent !== null;
      });

      if (!currentGallery.length) {
        currentGallery = Array.from(document.querySelectorAll('img')).filter(isPreviewable);
      }

      currentIndex = currentGallery.indexOf(img);
      if (currentIndex === -1) {
        currentGallery.unshift(img);
        currentIndex = 0;
      }

      displayImage(currentIndex);
      openModal();
    };

    // Global Event Delegation for clicking any previewable image
    document.addEventListener('click', (e) => {
      let img = e.target.closest('img');
      if (!img) {
        const previewTrigger = e.target.closest('.cq-kemitraan-gallery-thumb, .cq-kemitraan-gallery-item, .cq-kemitraan-hero-frame, [data-preview-trigger]');
        if (previewTrigger) {
          img = previewTrigger.querySelector('img');
        }
      }
      if (!img || !isPreviewable(img)) return;

      // Prevent parent navigation if inside a link or card
      e.preventDefault();
      e.stopPropagation();

      openLightbox(img);
    });

    // Control buttons listeners
    if (modalClose) modalClose.addEventListener('click', closeModal);
    if (modalBackdrop) modalBackdrop.addEventListener('click', closeModal);
    if (modalPrev) modalPrev.addEventListener('click', () => displayImage(currentIndex - 1));
    if (modalNext) modalNext.addEventListener('click', () => displayImage(currentIndex + 1));

    // Zoom Toggle Button & Image Click Zoom
    if (modalZoom) {
      modalZoom.addEventListener('click', (e) => {
        e.stopPropagation();
        setZoom(!isZoomed);
      });
    }

    if (modalImg) {
      modalImg.addEventListener('click', (e) => {
        e.stopPropagation();
        setZoom(!isZoomed);
      });
    }

    // Keyboard Shortcuts
    document.addEventListener('keydown', (e) => {
      if (!modal.classList.contains('is-open')) return;

      if (e.key === 'Escape') {
        closeModal();
      } else if (e.key === 'ArrowLeft') {
        displayImage(currentIndex - 1);
      } else if (e.key === 'ArrowRight') {
        displayImage(currentIndex + 1);
      } else if (e.key === '+' || e.key === '=') {
        setZoom(true);
      } else if (e.key === '-') {
        setZoom(false);
      }
    });

    // Mobile Swipe Gestures
    if (modalStage) {
      let touchStartX = 0;
      let touchStartY = 0;
      let touchEndX = 0;
      let touchEndY = 0;

      modalStage.addEventListener('touchstart', (e) => {
        if (e.touches.length === 1) {
          touchStartX = e.touches[0].clientX;
          touchStartY = e.touches[0].clientY;
        }
      }, { passive: true });

      modalStage.addEventListener('touchend', (e) => {
        if (e.changedTouches.length === 1) {
          touchEndX = e.changedTouches[0].clientX;
          touchEndY = e.changedTouches[0].clientY;

          const diffX = touchEndX - touchStartX;
          const diffY = touchEndY - touchStartY;

          if (isZoomed) return;

          // Horizontal swipe
          if (Math.abs(diffX) > 50 && Math.abs(diffX) > Math.abs(diffY)) {
            if (diffX < 0) {
              displayImage(currentIndex + 1);
            } else {
              displayImage(currentIndex - 1);
            }
          }
          // Vertical swipe down to close
          else if (diffY > 80 && Math.abs(diffY) > Math.abs(diffX)) {
            closeModal();
          }
        }
      }, { passive: true });
    }
  };

  initImagePreviewModal();

  // ========================================================
  // 11. Tiered Bento Pricing Switcher (Full vs Termin 50%)
  // ========================================================
  const initPricingSwitcher = () => {
    const wrap = document.querySelector('.cq-pricing-switcher-wrap');
    if (!wrap) return;

    const pillBtns = wrap.querySelectorAll('.cq-pricing-pill-btn');
    const noteFull = wrap.querySelector('.cq-scheme-note-full');
    const noteTermin = wrap.querySelector('.cq-scheme-note-termin');

    const updatePricing = (scheme) => {
      // Toggle active states on notes
      if (noteFull) noteFull.classList.toggle('is-active', scheme === 'full');
      if (noteTermin) noteTermin.classList.toggle('is-active', scheme === 'termin');

      // Update all prices and labels in any pricing layouts
      document.querySelectorAll('.cq-pricing-bento-layout').forEach((layout) => {
        // Price numbers with smooth micro-animation
        layout.querySelectorAll('.cq-price-val, [data-price-full]').forEach((el) => {
          const targetVal = scheme === 'termin' ? el.getAttribute('data-price-termin') : el.getAttribute('data-price-full');
          if (targetVal) {
            el.style.transition = 'opacity 0.15s ease, transform 0.15s ease';
            el.style.opacity = '0.2';
            el.style.transform = 'translateY(-2px)';
            setTimeout(() => {
              el.textContent = targetVal;
              el.style.opacity = '1';
              el.style.transform = 'translateY(0)';
            }, 120);
          }
        });

        // Top tags
        layout.querySelectorAll('[data-label-full]').forEach((el) => {
          const targetLabel = scheme === 'termin' ? el.getAttribute('data-label-termin') : el.getAttribute('data-label-full');
          if (targetLabel) el.textContent = targetLabel;
        });

        // Sub units
        layout.querySelectorAll('[data-sub-full]').forEach((el) => {
          const targetSub = scheme === 'termin' ? el.getAttribute('data-sub-termin') : el.getAttribute('data-sub-full');
          if (targetSub !== null) el.textContent = targetSub;
        });
      });
    };

    pillBtns.forEach((btn) => {
      btn.addEventListener('click', () => {
        if (btn.classList.contains('is-active')) return;
        pillBtns.forEach((b) => {
          b.classList.remove('is-active');
          b.setAttribute('aria-selected', 'false');
        });
        btn.classList.add('is-active');
        btn.setAttribute('aria-selected', 'true');

        const scheme = btn.getAttribute('data-scheme') || 'full';
        updatePricing(scheme);
      });
    });
  };

  initPricingSwitcher();
});

// Global Function for Helpfulness Rating
window.cleaniqueVoteHelpful = function(isHelpful) {
  const buttonsWrap = document.querySelector('#cq-helpfulness-btns');
  const thankYouBox = document.querySelector('#cq-helpfulness-thanks');
  if (buttonsWrap) buttonsWrap.style.display = 'none';
  if (thankYouBox) thankYouBox.style.display = 'flex';
};
