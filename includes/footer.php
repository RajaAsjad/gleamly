<?php
declare(strict_types=1);
?>
</main>

<footer class="site-footer">
  <div class="container footer-grid">
    <div class="footer-brand">
      <a class="brand" href="<?= e(url()) ?>">
        <img class="brand-logo brand-logo-light" src="<?= e(asset('images/logo-light.png')) ?>" alt="Gleamly" width="44" height="44">
        <span class="brand-text">Gleamly</span>
      </a>
      <p>We clean deeply so you can rest easy. Professional cleaners across East and Southeast London.</p>
      <div class="footer-contact">
        <a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a>
        <a href="tel:<?= e(SITE_PHONE_TEL) ?>"><?= e(SITE_PHONE) ?></a>
        <a class="whatsapp-link" href="https://wa.me/<?= e(SITE_WHATSAPP) ?>" target="_blank" rel="noopener">WhatsApp us</a>
      </div>
    </div>

    <div>
      <h3>Company</h3>
      <ul>
        <li><a href="<?= e(url('about.php')) ?>">About us</a></li>
        <li><a href="<?= e(url('contact.php')) ?>">Contact</a></li>
        <li><a href="<?= e(url('reviews.php')) ?>">Reviews</a></li>
        <li><a href="<?= e(url('faq.php')) ?>">FAQ</a></li>
        <li><a href="<?= e(url('become-a-cleaner.php')) ?>">Become a cleaner</a></li>
      </ul>
    </div>

    <div>
      <h3>Services</h3>
      <ul>
        <li><a href="<?= e(url('services/home-cleaning.php')) ?>">Home Cleaning</a></li>
        <li><a href="<?= e(url('services/business-cleaning.php')) ?>">Business Cleaning</a></li>
        <li><a href="<?= e(url('services/deep-cleaning.php')) ?>">Deep Cleaning</a></li>
        <li><a href="<?= e(url('services/end-of-tenancy.php')) ?>">End of Tenancy</a></li>
      </ul>
    </div>

    <div>
      <h3>Get started</h3>
      <ul>
        <li><a href="<?= e(url('quote.php')) ?>">Request a Quote</a></li>
        <li><a href="<?= e(url('estimator.php')) ?>">Price Estimator</a></li>
        <li><a href="<?= e(url('pricing.php')) ?>">Pricing</a></li>
        <li><a href="<?= e(url('how-it-works.php')) ?>">How it works</a></li>
      </ul>
    </div>
  </div>

  <div class="container footer-bottom">
    <p>&copy; <?= date('Y') ?> Gleamly UK. All rights reserved.</p>
    <div class="footer-legal">
      <a href="<?= e(url('privacy.php')) ?>">Privacy Policy</a>
      <a href="<?= e(url('terms.php')) ?>">Terms of Service</a>
    </div>
  </div>
</footer>

<div class="mobile-cta" role="region" aria-label="Quick actions">
  <a href="tel:<?= e(SITE_PHONE_TEL) ?>">Call Now</a>
  <a href="<?= e(url('quote.php')) ?>" class="primary">Get a Quote</a>
  <a href="https://wa.me/<?= e(SITE_WHATSAPP) ?>" target="_blank" rel="noopener" class="wa">WhatsApp</a>
</div>

<div class="cookie-banner" id="cookie-banner" hidden>
  <div class="container cookie-inner">
    <p>We use cookies for analytics and to improve your experience. See our <a href="<?= e(url('privacy.php')) ?>">Privacy Policy</a>.</p>
    <div class="cookie-actions">
      <button type="button" class="btn btn-ghost btn-sm" id="cookie-decline">Decline</button>
      <button type="button" class="btn btn-primary btn-sm" id="cookie-accept">Accept</button>
    </div>
  </div>
</div>

<a class="whatsapp-float" href="https://wa.me/<?= e(SITE_WHATSAPP) ?>?text=Hi%20Gleamly%2C%20I%27d%20like%20a%20cleaning%20quote" target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
  <svg viewBox="0 0 24 24" width="28" height="28" aria-hidden="true"><path fill="currentColor" d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 6.045L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
</a>

<script src="<?= e(asset('js/main.js')) ?>" defer></script>
</body>
</html>
