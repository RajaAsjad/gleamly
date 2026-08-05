(() => {
  const header = document.getElementById('site-header');
  const toggle = document.querySelector('.nav-toggle');
  const mobileNav = document.getElementById('mobile-nav');
  const cookieBanner = document.getElementById('cookie-banner');

  // Sticky header state
  const onScroll = () => {
    if (!header) return;
    header.classList.toggle('is-scrolled', window.scrollY > 12);
  };
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  // Mobile nav
  if (toggle && mobileNav) {
    toggle.addEventListener('click', () => {
      const open = toggle.getAttribute('aria-expanded') === 'true';
      toggle.setAttribute('aria-expanded', String(!open));
      mobileNav.hidden = open;
    });
  }

  // Reveal on scroll
  const revealEls = document.querySelectorAll('.step, .service-band, .reveal');
  if (revealEls.length && 'IntersectionObserver' in window) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.18, rootMargin: '0px 0px -40px 0px' });
    revealEls.forEach((el) => io.observe(el));
  } else {
    revealEls.forEach((el) => el.classList.add('is-visible'));
  }

  // Cookie consent
  const COOKIE_KEY = 'gleamly_cookie_consent';
  if (cookieBanner) {
    const saved = localStorage.getItem(COOKIE_KEY);
    if (!saved) cookieBanner.hidden = false;

    const setConsent = (value) => {
      localStorage.setItem(COOKIE_KEY, value);
      cookieBanner.hidden = true;
      if (value === 'accepted' && typeof gtag === 'function') {
        gtag('consent', 'update', { analytics_storage: 'granted' });
      }
    };
    document.getElementById('cookie-accept')?.addEventListener('click', () => setConsent('accepted'));
    document.getElementById('cookie-decline')?.addEventListener('click', () => setConsent('declined'));
  }

  // Price estimator
  const estimator = document.getElementById('price-estimator');
  if (estimator) {
    const out = document.getElementById('estimate-amount');
    const detail = document.getElementById('estimate-detail');
    const bases = {
      home: Number(estimator.dataset.home || 150),
      deep: Number(estimator.dataset.deep || 300),
      business: Number(estimator.dataset.business || 200),
      tenancy: Number(estimator.dataset.tenancy || 300),
      other: Number(estimator.dataset.other || 100),
    };

    const calc = () => {
      const service = estimator.querySelector('[name="service"]')?.value || 'home';
      const rooms = Math.max(1, Number(estimator.querySelector('[name="rooms"]')?.value || 2));
      const helpers = Number(estimator.querySelector('[name="helpers"]')?.value || 2);
      const addons = [...estimator.querySelectorAll('[name="addons"]:checked')].map((el) => el.value);

      let total = bases[service] || bases.home;
      if (rooms > 2) total += (rooms - 2) * 35;
      if (helpers > 2) total += (helpers - 2) * 40;
      const addonPrices = { oven: 35, fridge: 30, windows: 40, carpet: 45 };
      addons.forEach((a) => { total += addonPrices[a] || 0; });

      if (out) out.textContent = '£' + total;
      if (detail) {
        detail.textContent = `${rooms} room${rooms > 1 ? 's' : ''}, ${helpers} helper${helpers > 1 ? 's' : ''}` +
          (addons.length ? `, + ${addons.length} add-on${addons.length > 1 ? 's' : ''}` : '') +
          ' · indicative only';
      }
    };

    estimator.addEventListener('input', calc);
    estimator.addEventListener('change', calc);
    calc();
  }

  // Quote form file label
  const fileInput = document.getElementById('photos');
  const fileLabel = document.getElementById('photos-label');
  if (fileInput && fileLabel) {
    fileInput.addEventListener('change', () => {
      const n = fileInput.files?.length || 0;
      fileLabel.textContent = n ? `${n} file${n > 1 ? 's' : ''} selected` : 'No files chosen';
    });
  }
})();
