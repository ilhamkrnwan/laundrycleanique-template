/**
 * Cleanique Laundry - Payno Fintech Motion Design & Interactions (GSAP + ScrollTrigger)
 * Inspired by Orbix Studio's "Payno - Fintech App Landing Page Design" (Dribbble shot 27406371)
 * Features:
 * - Fluid hero entrance timeline with split heading & phone mockup elevation
 * - Real-time animated number ticker for Omzet Balance (Rp 0 -> Rp 1.450.000)
 * - Independent asynchronous ambient floating loops for the 3 glass cards
 * - Staggered scroll-reveals for 6 problem cards, feature pillars & pricing tiers
 * - Smooth parallax scrub on feature smartphone container
 * - Interactive price counter bounce on monthly/yearly billing toggle
 * - Respects prefers-reduced-motion for accessibility
 *
 * @package Cleanique
 */

document.addEventListener('DOMContentLoaded', () => {
  // Safety checks
  if (typeof gsap === 'undefined') {
    console.warn('[Cleanique Motion] GSAP is not loaded.');
    return;
  }

  // Register ScrollTrigger if available
  if (typeof ScrollTrigger !== 'undefined') {
    gsap.registerPlugin(ScrollTrigger);
  }

  // Respect user preference for reduced motion
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (prefersReducedMotion) {
    console.info('[Cleanique Motion] Reduced motion preferred. Skipping animations.');
    return;
  }

  /* ==========================================================================
     1. HERO SECTION ENTRANCE & AMBIENT FLOATING (PAYNO STAGE)
     ========================================================================== */
  const heroSection = document.querySelector('.cq-payno-hero');
  if (heroSection) {
    const heroTl = gsap.timeline({
      defaults: { ease: 'power3.out' },
      delay: 0.1
    });

    // 1.1 Header subtle entrance
    const siteHeader = document.querySelector('#site-header');
    if (siteHeader) {
      heroTl.from(siteHeader, {
        y: -20,
        opacity: 0,
        duration: 0.8,
        ease: 'power2.out'
      }, 0);
    }

    // 1.2 Top Split Row: Badge & Heading (Left)
    const heroBadge = document.querySelector('.cq-payno-hero-top .cq-badge-pill');
    if (heroBadge) {
      heroTl.from(heroBadge, {
        y: 25,
        opacity: 0,
        duration: 0.7,
        ease: 'power3.out'
      }, 0.15);
    }

    const heroHeading = document.querySelector('.cq-payno-heading');
    if (heroHeading) {
      heroTl.from(heroHeading, {
        y: 35,
        opacity: 0,
        duration: 0.9,
        ease: 'power3.out'
      }, 0.25);
    }

    // 1.3 Right Column: Description, Checkline, CTA Buttons
    const heroRightElements = document.querySelectorAll('.cq-payno-hero-right > *');
    if (heroRightElements.length) {
      heroTl.from(heroRightElements, {
        y: 25,
        opacity: 0,
        duration: 0.75,
        stagger: 0.1,
        ease: 'power3.out'
      }, 0.35);
    }

    // 1.4 Center Stage: Smartphone Mockup Device
    const phoneDevice = document.querySelector('.cq-payno-stage .cq-phone-device');
    if (phoneDevice) {
      heroTl.from(phoneDevice, {
        y: 80,
        scale: 0.93,
        opacity: 0,
        duration: 1.2,
        ease: 'power4.out'
      }, 0.3);

      // Inner Phone Screen Choreography
      const screenHeader = phoneDevice.querySelector('.cq-screen-header');
      if (screenHeader) {
        heroTl.from(screenHeader, {
          y: -12,
          opacity: 0,
          duration: 0.5
        }, 0.6);
      }

      const balanceCard = phoneDevice.querySelector('.cq-screen-card-balance');
      if (balanceCard) {
        heroTl.from(balanceCard, {
          scale: 0.92,
          y: 15,
          opacity: 0,
          duration: 0.6,
          ease: 'back.out(1.4)'
        }, 0.7);

        // Animated Numeric Counter for Omzet Harian (Rp 0 -> Rp 1.450.000)
        const balanceVal = balanceCard.querySelector('.cq-screen-balance-val');
        if (balanceVal) {
          const countObj = { val: 0 };
          const targetVal = 1450000;
          balanceVal.textContent = 'Rp 0';
          heroTl.to(countObj, {
            val: targetVal,
            duration: 1.6,
            ease: 'power2.out',
            onUpdate: () => {
              balanceVal.textContent = 'Rp ' + Math.floor(countObj.val).toLocaleString('id-ID');
            }
          }, 0.8);
        }
      }

      const actionBtns = phoneDevice.querySelectorAll('.cq-screen-action-btn');
      if (actionBtns.length) {
        heroTl.from(actionBtns, {
          scale: 0.6,
          opacity: 0,
          duration: 0.45,
          stagger: 0.08,
          ease: 'back.out(2)'
        }, 0.9);
      }

      const transItems = phoneDevice.querySelectorAll('.cq-screen-trans-item');
      if (transItems.length) {
        heroTl.from(transItems, {
          y: 15,
          opacity: 0,
          duration: 0.5,
          stagger: 0.1,
          ease: 'power2.out'
        }, 1.05);
      }
    }

    // 1.5 The 3 Floating Glass Cards Fly In (Orbix Studio Signature)
    const floatLeft = document.querySelector('.cq-float-left');
    const floatRight = document.querySelector('.cq-float-right');
    const floatBottom = document.querySelector('.cq-float-bottom');

    if (floatLeft) {
      heroTl.from(floatLeft, {
        x: -55,
        y: 25,
        opacity: 0,
        duration: 1.1,
        ease: 'power3.out'
      }, 0.6);
    }

    if (floatRight) {
      heroTl.from(floatRight, {
        x: 55,
        y: 25,
        opacity: 0,
        duration: 1.1,
        ease: 'power3.out'
      }, 0.75);
    }

    if (floatBottom) {
      heroTl.from(floatBottom, {
        y: 40,
        opacity: 0,
        duration: 0.95,
        ease: 'power3.out'
      }, 0.9);
    }

    // 1.6 Ambient Continuous Out-Of-Sync Floating Loops (Living UI)
    if (window.innerWidth > 767) {
      if (floatLeft) {
        gsap.to(floatLeft, {
          y: '-=10',
          duration: 2.8,
          repeat: -1,
          yoyo: true,
          ease: 'sine.inOut',
          delay: 1.8
        });
      }

      if (floatRight) {
        gsap.to(floatRight, {
          y: '+=12',
          duration: 3.4,
          repeat: -1,
          yoyo: true,
          ease: 'sine.inOut',
          delay: 2.1
        });
      }

      if (floatBottom) {
        gsap.to(floatBottom, {
          y: '-=8',
          duration: 3.1,
          repeat: -1,
          yoyo: true,
          ease: 'sine.inOut',
          delay: 2.4
        });
      }
    }

    // 1.7 Hero Glass Countdown Banner
    const heroCountdown = document.querySelector('.cq-payno-countdown-card');
    if (heroCountdown) {
      heroTl.from(heroCountdown, {
        y: 35,
        opacity: 0,
        duration: 0.9,
        ease: 'power3.out'
      }, 0.85);
    }
  }

  /* ==========================================================================
     1.8 PAYNO STATEMENT CARD (Section 2 - Concentric Arch Glow)
     ========================================================================== */
  const statementCard = document.querySelector('.cq-payno-statement-card');
  if (statementCard && typeof ScrollTrigger !== 'undefined') {
    gsap.fromTo(statementCard,
      { y: 40, scale: 0.98, opacity: 0 },
      {
        scrollTrigger: {
          trigger: statementCard,
          start: 'top 85%',
          toggleActions: 'play none none none'
        },
        y: 0,
        scale: 1,
        opacity: 1,
        duration: 0.9,
        ease: 'power3.out',
        clearProps: 'transform,opacity'
      }
    );

    const archGlow = statementCard.querySelector('.cq-payno-arch-glow');
    if (archGlow) {
      gsap.to(archGlow, {
        scale: 1.08,
        duration: 2.8,
        repeat: -1,
        yoyo: true,
        ease: 'sine.inOut'
      });
    }
  }

  /* ==========================================================================
     2. PROBLEM SECTION (#masalah) - 6 CARDS STAGGERED ELEVATION
     ========================================================================== */
  const problemSection = document.querySelector('#masalah');
  if (problemSection && typeof ScrollTrigger !== 'undefined') {
    // Header reveal
    const headerElements = problemSection.querySelectorAll('.cq-section-header > *');
    if (headerElements.length) {
      gsap.fromTo(headerElements,
        { y: 25, opacity: 0 },
        {
          scrollTrigger: {
            trigger: problemSection,
            start: 'top 85%',
            toggleActions: 'play none none none'
          },
          y: 0,
          opacity: 1,
          duration: 0.7,
          stagger: 0.1,
          ease: 'power3.out',
          clearProps: 'transform,opacity'
        }
      );
    }

    // 6 Cards Stagger Entrance
    const problemCards = problemSection.querySelectorAll('.cq-payno-problem-card');
    if (problemCards.length) {
      gsap.fromTo(problemCards,
        { y: 35, opacity: 0, scale: 0.97 },
        {
          scrollTrigger: {
            trigger: '.cq-payno-problem-grid',
            start: 'top 85%',
            toggleActions: 'play none none none'
          },
          y: 0,
          opacity: 1,
          scale: 1,
          duration: 0.7,
          stagger: 0.08,
          ease: 'power2.out',
          clearProps: 'transform,opacity'
        }
      );
    }
  }

  /* ==========================================================================
     3. CORE APP SHOWCASE (#fitur) - PAYNO PHONE & 2x2 FEATURE CARDS
     ========================================================================== */
  const featureSection = document.querySelector('#fitur');
  if (featureSection && typeof ScrollTrigger !== 'undefined') {
    // Phone Device Entrance (Left)
    const featurePhone = featureSection.querySelector('.cq-payno-showcase-phone-box .cq-phone-device');
    if (featurePhone) {
      gsap.fromTo(featurePhone,
        { y: 50, opacity: 0, scale: 0.96 },
        {
          scrollTrigger: {
            trigger: featureSection,
            start: 'top 82%',
            toggleActions: 'play none none none'
          },
          y: 0,
          opacity: 1,
          scale: 1,
          duration: 0.95,
          ease: 'power3.out',
          clearProps: 'transform,opacity'
        }
      );
    }

    // Heading & Description (Right)
    const showcaseTexts = featureSection.querySelectorAll('.cq-payno-showcase-heading, .cq-payno-showcase-desc');
    if (showcaseTexts.length) {
      gsap.fromTo(showcaseTexts,
        { y: 25, opacity: 0 },
        {
          scrollTrigger: {
            trigger: featureSection,
            start: 'top 80%',
            toggleActions: 'play none none none'
          },
          y: 0,
          opacity: 1,
          duration: 0.7,
          stagger: 0.1,
          ease: 'power3.out',
          clearProps: 'transform,opacity'
        }
      );
    }

    // 4 Feature Cards (2x2 Grid)
    const featureCards = featureSection.querySelectorAll('.cq-payno-feature-box');
    if (featureCards.length) {
      gsap.fromTo(featureCards,
        { y: 35, opacity: 0, scale: 0.96 },
        {
          scrollTrigger: {
            trigger: '.cq-payno-cards-grid',
            start: 'top 85%',
            toggleActions: 'play none none none'
          },
          y: 0,
          opacity: 1,
          scale: 1,
          duration: 0.7,
          stagger: 0.09,
          ease: 'power2.out',
          clearProps: 'transform,opacity'
        }
      );
    }

    // 3 Onboarding Steps Cards Stagger
    const stepCards = featureSection.querySelectorAll('.cq-grid-3 > div');
    if (stepCards.length) {
      gsap.fromTo(stepCards,
        { y: 30, opacity: 0 },
        {
          scrollTrigger: {
            trigger: '#fitur .cq-grid-3',
            start: 'top 85%',
            toggleActions: 'play none none none'
          },
          y: 0,
          opacity: 1,
          duration: 0.65,
          stagger: 0.1,
          ease: 'power3.out',
          clearProps: 'transform,opacity'
        }
      );
    }
  }

  /* ==========================================================================
     4. TESTIMONIALS SECTION (#testimoni)
     ========================================================================== */
  const testiSection = document.querySelector('#testimoni');
  if (testiSection && typeof ScrollTrigger !== 'undefined') {
    const testiHeader = testiSection.querySelectorAll('.cq-section-header > *');
    if (testiHeader.length) {
      gsap.fromTo(testiHeader,
        { y: 25, opacity: 0 },
        {
          scrollTrigger: {
            trigger: testiSection,
            start: 'top 85%',
            toggleActions: 'play none none none'
          },
          y: 0,
          opacity: 1,
          duration: 0.7,
          stagger: 0.1,
          ease: 'power3.out',
          clearProps: 'transform,opacity'
        }
      );
    }

    const testiTrack = testiSection.querySelector('.cq-payno-testi-track-wrap');
    if (testiTrack) {
      gsap.fromTo(testiTrack,
        { y: 25, opacity: 0 },
        {
          scrollTrigger: {
            trigger: testiTrack,
            start: 'top 85%',
            toggleActions: 'play none none none'
          },
          y: 0,
          opacity: 1,
          duration: 0.75,
          ease: 'power2.out',
          clearProps: 'transform,opacity'
        }
      );
    }
  }

  /* ==========================================================================
     5. PRICING SECTION (#pricing) - 3 CARDS & SWITCH POP
     ========================================================================== */
  const pricingSection = document.querySelector('#pricing');
  if (pricingSection && typeof ScrollTrigger !== 'undefined') {
    // Header & Toggle Switch
    const pricingHeader = pricingSection.querySelectorAll('.cq-section-header > *');
    if (pricingHeader.length) {
      gsap.fromTo(pricingHeader,
        { y: 25, opacity: 0 },
        {
          scrollTrigger: {
            trigger: pricingSection,
            start: 'top 85%',
            toggleActions: 'play none none none'
          },
          y: 0,
          opacity: 1,
          duration: 0.7,
          stagger: 0.1,
          ease: 'power3.out',
          clearProps: 'transform,opacity'
        }
      );
    }

    // 3 Pricing Cards Reveal (Center Navy Card pops out)
    const pricingCards = pricingSection.querySelectorAll('.cq-payno-pricing-grid > div');
    if (pricingCards.length) {
      gsap.fromTo(pricingCards,
        { y: 40, opacity: 0, scale: 0.96 },
        {
          scrollTrigger: {
            trigger: '.cq-payno-pricing-grid',
            start: 'top 80%',
            toggleActions: 'play none none none'
          },
          y: 0,
          opacity: 1,
          scale: 1,
          duration: 0.8,
          stagger: 0.12,
          ease: 'back.out(1.2)',
          clearProps: 'transform,opacity'
        }
      );
    }

    // Price Number Pop on Billing Switch
    const btnMonthly = document.querySelector('#cq-btn-monthly');
    const btnYearly = document.querySelector('#cq-btn-yearly');
    const priceElements = document.querySelectorAll('#price-pro-val, #price-biz-val');

    const animatePriceNumbers = () => {
      if (priceElements.length) {
        gsap.fromTo(priceElements, 
          { scale: 0.85, opacity: 0.4 },
          { scale: 1, opacity: 1, duration: 0.35, ease: 'back.out(2)' }
        );
      }
    };

    if (btnMonthly) btnMonthly.addEventListener('click', animatePriceNumbers);
    if (btnYearly) btnYearly.addEventListener('click', animatePriceNumbers);
  }

  /* ==========================================================================
     6. TRIAL REGISTRATION SECTION (#trial-form)
     ========================================================================== */
  const trialSection = document.querySelector('#trial-form');
  if (trialSection && typeof ScrollTrigger !== 'undefined') {
    // Left Perks
    const trialPerks = trialSection.querySelectorAll('.cq-trial-clean-perks li');
    if (trialPerks.length) {
      gsap.fromTo(trialPerks,
        { x: -20, opacity: 0 },
        {
          scrollTrigger: {
            trigger: '.cq-trial-clean-perks',
            start: 'top 85%',
            toggleActions: 'play none none none'
          },
          x: 0,
          opacity: 1,
          duration: 0.55,
          stagger: 0.08,
          ease: 'power2.out',
          clearProps: 'transform,opacity'
        }
      );
    }

    // Right Form Card Elevation
    const trialCard = trialSection.querySelector('.cq-trial-card');
    if (trialCard) {
      gsap.fromTo(trialCard,
        { y: 35, opacity: 0, scale: 0.98 },
        {
          scrollTrigger: {
            trigger: trialCard,
            start: 'top 85%',
            toggleActions: 'play none none none'
          },
          y: 0,
          opacity: 1,
          scale: 1,
          duration: 0.8,
          ease: 'power3.out',
          clearProps: 'transform,opacity'
        }
      );
    }
  }

  /* ==========================================================================
     7. FAQ ACCORDION (#faq)
     ========================================================================== */
  const faqSection = document.querySelector('#faq');
  if (faqSection && typeof ScrollTrigger !== 'undefined') {
    const faqItems = faqSection.querySelectorAll('.cq-accordion-item');
    if (faqItems.length) {
      gsap.fromTo(faqItems,
        { y: 20, opacity: 0 },
        {
          scrollTrigger: {
            trigger: '.cq-accordion',
            start: 'top 85%',
            toggleActions: 'play none none none'
          },
          y: 0,
          opacity: 1,
          duration: 0.55,
          stagger: 0.07,
          ease: 'power2.out',
          clearProps: 'transform,opacity'
        }
      );
    }
  }

  /* ==========================================================================
     8. BOTTOM CTA SECTION & FLOATING FOOTER
     ========================================================================== */
  const bottomCta = document.querySelector('.cq-sky-canvas.cq-section');
  if (bottomCta && typeof ScrollTrigger !== 'undefined') {
    const ctaElements = bottomCta.querySelectorAll('.cq-container > *');
    if (ctaElements.length) {
      gsap.fromTo(ctaElements,
        { y: 30, opacity: 0 },
        {
          scrollTrigger: {
            trigger: bottomCta,
            start: 'top 85%',
            toggleActions: 'play none none none'
          },
          y: 0,
          opacity: 1,
          duration: 0.8,
          stagger: 0.1,
          ease: 'power3.out',
          clearProps: 'transform,opacity'
        }
      );
    }
  }

  const footerCard = document.querySelector('.cq-payno-footer-card');
  if (footerCard && typeof ScrollTrigger !== 'undefined') {
    gsap.fromTo(footerCard,
      { y: 35, opacity: 0 },
      {
        scrollTrigger: {
          trigger: footerCard,
          start: 'top 90%',
          toggleActions: 'play none none none'
        },
        y: 0,
        opacity: 1,
        duration: 0.85,
        ease: 'power3.out',
        clearProps: 'transform,opacity'
      }
    );
  }

  /* ==========================================================================
     9. MICRO-INTERACTIONS: MAGNETIC & SPRING BUTTON HOVER
     ========================================================================== */
  const pillButtons = document.querySelectorAll('.cq-btn-primary, .cq-btn-white-pill, .cq-btn-trial-submit');
  pillButtons.forEach(btn => {
    btn.addEventListener('mouseenter', () => {
      gsap.to(btn, { scale: 1.03, duration: 0.25, ease: 'power1.out' });
    });
    btn.addEventListener('mouseleave', () => {
      gsap.to(btn, { scale: 1, duration: 0.35, ease: 'power2.out' });
    });
  });

  /* ==========================================================================
     10. COMPANY PROFILE MOTION ENGINE (GSAP + SCROLLTRIGGER)
     Authoritative, smooth staggered reveals, bento grid & corporate cards
     ========================================================================== */
  const corpHero = document.querySelector('.cq-corp-hero');
  if (corpHero) {
    const corpTl = gsap.timeline({
      defaults: { ease: 'power3.out' },
      delay: 0.1
    });

    const heroBadge = corpHero.querySelector('.cq-corp-hero-badge');
    if (heroBadge) {
      corpTl.from(heroBadge, { y: 20, opacity: 0, duration: 0.6 }, 0.1);
    }

    const heroTitle = corpHero.querySelector('.cq-corp-hero-title');
    if (heroTitle) {
      corpTl.from(heroTitle, { y: 30, opacity: 0, duration: 0.8 }, 0.2);
    }

    const heroDesc = corpHero.querySelector('.cq-corp-hero-desc');
    if (heroDesc) {
      corpTl.from(heroDesc, { y: 25, opacity: 0, duration: 0.7 }, 0.3);
    }

    const heroActions = corpHero.querySelectorAll('.cq-corp-hero-actions > *');
    if (heroActions.length) {
      corpTl.from(heroActions, { y: 20, opacity: 0, duration: 0.6, stagger: 0.1 }, 0.4);
    }

    const gatewayCards = corpHero.querySelectorAll('.cq-corp-gateway-card');
    if (gatewayCards.length) {
      corpTl.from(gatewayCards, { y: 40, opacity: 0, duration: 0.8, stagger: 0.15 }, 0.45);
    }

    const statCards = corpHero.querySelectorAll('.cq-corp-stat-card');
    if (statCards.length) {
      corpTl.from(statCards, { y: 30, opacity: 0, duration: 0.7, stagger: 0.1 }, 0.6);
    }
  }

  // Staggered reveal for Corporate Bento Grids
  const bentoSections = document.querySelectorAll('.cq-section');
  if (bentoSections.length && typeof ScrollTrigger !== 'undefined') {
    bentoSections.forEach(section => {
      const header = section.querySelector('.cq-section-header');
      if (header) {
        gsap.fromTo(header,
          { y: 30, opacity: 0 },
          {
            scrollTrigger: {
              trigger: section,
              start: 'top 85%',
              toggleActions: 'play none none none'
            },
            y: 0,
            opacity: 1,
            duration: 0.8,
            ease: 'power3.out'
          }
        );
      }

      const cards = section.querySelectorAll(
        '.cq-corp-card, .cq-kemitraan-card, .cq-corp-article-card, .cq-eco-card, .cq-machinery-card, .cq-testi-card, .cq-compare-wrap'
      );
      if (cards.length) {
        gsap.fromTo(cards,
          { y: 35, opacity: 0 },
          {
            scrollTrigger: {
              trigger: section,
              start: 'top 80%',
              toggleActions: 'play none none none'
            },
            y: 0,
            opacity: 1,
            duration: 0.8,
            stagger: 0.12,
            ease: 'power3.out',
            clearProps: 'transform,opacity'
          }
        );
      }
    });
  }

  /* ==========================================================================
     3. VERTICAL TIMELINE / KURIKULUM PELATIHAN ANIMATIONS
     ========================================================================== */
  const timelineSection = document.querySelector('.cq-timeline-section');
  if (timelineSection && typeof ScrollTrigger !== 'undefined') {
    // 3.1 Watermark subtle parallax
    const watermark = timelineSection.querySelector('.cq-timeline-watermark');
    if (watermark) {
      gsap.fromTo(watermark,
        { x: -40, opacity: 0.2 },
        {
          scrollTrigger: {
            trigger: timelineSection,
            start: 'top bottom',
            end: 'bottom top',
            scrub: 1
          },
          x: 20,
          opacity: 0.45,
          ease: 'none'
        }
      );
    }

    // 3.2 Vertical Track Line growth with Scroll Scrub
    const trackLine = timelineSection.querySelector('.cq-timeline-track');
    if (trackLine) {
      gsap.fromTo(trackLine,
        { scaleY: 0, transformOrigin: 'top center' },
        {
          scrollTrigger: {
            trigger: '.cq-timeline-wrap',
            start: 'top 75%',
            end: 'bottom 85%',
            scrub: 0.6
          },
          scaleY: 1,
          ease: 'none'
        }
      );
    }

    // 3.3 Timeline Items Staggered Entrance
    const timelineItems = timelineSection.querySelectorAll('.cq-timeline-item');
    timelineItems.forEach((item, idx) => {
      const node = item.querySelector('.cq-timeline-node');
      const badge = item.querySelector('.cq-timeline-badge-pill');
      const card = item.querySelector('.cq-timeline-card');

      const itemTl = gsap.timeline({
        scrollTrigger: {
          trigger: item,
          start: 'top 85%',
          toggleActions: 'play none none none'
        }
      });

      if (node) {
        itemTl.fromTo(node,
          { scale: 0, opacity: 0 },
          { scale: 1, opacity: 1, duration: 0.5, ease: 'back.out(2)' }
        );
      }

      if (badge) {
        itemTl.fromTo(badge,
          { y: -10, opacity: 0 },
          { y: 0, opacity: 1, duration: 0.4, ease: 'power2.out' },
          '-=0.25'
        );
      }

      if (card) {
        itemTl.fromTo(card,
          { x: 30, opacity: 0 },
          { x: 0, opacity: 1, duration: 0.65, ease: 'power3.out', clearProps: 'transform,opacity' },
          '-=0.3'
        );
      }
    });
  }

  /* ==========================================================================
     4. NUMBER TICKER ON CORPORATE HERO STATS
     ========================================================================== */
  const statNumbers = document.querySelectorAll('.cq-corp-stat-val');
  if (statNumbers.length && typeof ScrollTrigger !== 'undefined') {
    ScrollTrigger.create({
      trigger: '.cq-corp-stats-row',
      start: 'top 85%',
      onEnter: () => {
        statNumbers.forEach(el => {
          gsap.fromTo(el,
            { scale: 0.85, opacity: 0.5 },
            { scale: 1, opacity: 1, duration: 0.6, ease: 'back.out(1.7)' }
          );
        });
      },
      once: true
    });
  }

  console.info('[Cleanique Motion] GSAP & ScrollTrigger animations initialized successfully.');
});

