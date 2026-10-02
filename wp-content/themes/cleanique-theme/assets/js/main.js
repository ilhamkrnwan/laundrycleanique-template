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

      const textMsg = `Halo Tim Cleanique Laundry,\nSaya ingin aktivasi *FREE TRIAL 7 HARI* Aplikasi Kasir Laundry Digital (laundry.indotechbot.my.id).\n\n*Nama Usaha:* ${laundryName}\n*Pemilik:* ${ownerName}\n*No. WA:* ${whatsapp}\n*Email:* ${email}\n*Kota:* ${city}\n\nMohon dibantu pembuatan akun demo trial gratisnya. Terima kasih!`;
      
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
  }

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

  // Proposal / Lead Booking Form on Paket Usaha
  const proposalForm = document.querySelector('#cq-proposal-form');
  if (proposalForm) {
    proposalForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const name = document.querySelector('#investor-name')?.value.trim() || '';
      const wa = document.querySelector('#investor-wa')?.value.trim() || '';
      const city = document.querySelector('#investor-city')?.value.trim() || '';
      const paket = document.querySelector('#investor-paket')?.value || 'Commercial Pro';

      const waNumber = typeof CleaniqueConfig !== 'undefined' ? CleaniqueConfig.waNumber : '6281234567890';
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
  document.querySelectorAll('.cq-accordion-trigger').forEach(trigger => {
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
            other.querySelector('.cq-accordion-trigger')?.setAttribute('aria-expanded', 'false');
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
});

// Global Function for Helpfulness Rating
window.cleaniqueVoteHelpful = function(isHelpful) {
  const buttonsWrap = document.querySelector('#cq-helpfulness-btns');
  const thankYouBox = document.querySelector('#cq-helpfulness-thanks');
  if (buttonsWrap) buttonsWrap.style.display = 'none';
  if (thankYouBox) thankYouBox.style.display = 'flex';
};
