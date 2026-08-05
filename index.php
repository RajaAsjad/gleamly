<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
$page_title = 'Professional Cleaners in East & Southeast London';
$page_description = 'Tired of spending your free time cleaning? Gleamly delivers spotless home, business and deep cleaning across East and Southeast London. Get a free quote today.';
$page_canonical = url();
$active = 'home';
$body_class = 'page-home';
require __DIR__ . '/includes/header.php';
?>

<section class="hero" aria-label="Welcome">
  <div class="hero-media">
    <img src="<?= e(asset('images/hero.jpg')) ?>" alt="Bright, freshly cleaned living room in a London home" width="1800" height="1200" fetchpriority="high">
  </div>
  <div class="hero-content">
    <p class="hero-brand">Gleamly</p>
    <h1>Professional cleaners in East and Southeast London.</h1>
    <p class="hero-lead">Tired of spending your free time cleaning? Let us take care of it — spotless results for deep cleans or weekly upkeep.</p>
    <div class="hero-cta">
      <a class="btn btn-primary" href="<?= e(url('quote.php')) ?>">Get Started</a>
      <a class="btn btn-secondary" href="<?= e(url('estimator.php')) ?>">Estimate Price</a>
    </div>
  </div>
</section>

<section class="trust-strip" aria-label="Trust signals">
  <div class="container trust-row">
    <span><i class="trust-dot" aria-hidden="true"></i> Fully insured team</span>
    <span><i class="trust-dot" aria-hidden="true"></i> DBS-checked cleaners</span>
    <span><i class="trust-dot" aria-hidden="true"></i> East &amp; SE London</span>
    <span><i class="trust-dot" aria-hidden="true"></i> Flexible scheduling</span>
  </div>
</section>

<section class="section" id="how-it-works">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">How it works</span>
      <h2>Get your day back. It’s easy.</h2>
      <p>Three simple steps from enquiry to a beautifully cleaned space.</p>
    </div>
    <div class="steps">
      <article class="step">
        <div class="step-num">01</div>
        <h3>Choose your service</h3>
        <p>One-off, special occasion, regular, standard or deep. You decide.</p>
        <em>You decide</em>
      </article>
      <article class="step">
        <div class="step-num">02</div>
        <h3>Tailor your request</h3>
        <p>Number of rooms, add-ons like fridge or oven, or any special requests.</p>
        <em>Your space, your way</em>
      </article>
      <article class="step">
        <div class="step-num">03</div>
        <h3>Schedule and relax</h3>
        <p>Choose your preferred date and time — we’ll take care of the rest.</p>
        <em>It’s that simple</em>
      </article>
    </div>
  </div>
</section>

<section class="section" style="padding-top:0" id="services">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Services</span>
      <h2>We clean every type of room</h2>
      <p>From cosy flats to busy offices — packages built around how you live and work.</p>
    </div>
    <div class="service-bands">
      <article class="service-band">
        <div class="service-band-media">
          <img src="<?= e(asset('images/kitchen.jpg')) ?>" alt="Spotless modern kitchen after Gleamly home clean" loading="lazy" width="800" height="600">
        </div>
        <div class="service-band-body">
          <h3>Home Cleaning</h3>
          <p>Packages to suit your home’s needs — size, thoroughness and how often you want us back.</p>
          <a class="btn btn-primary btn-sm" href="<?= e(url('services/home-cleaning.php')) ?>">Explore home cleaning</a>
        </div>
      </article>
      <article class="service-band">
        <div class="service-band-media">
          <img src="<?= e(asset('images/office.jpg')) ?>" alt="Clean commercial office workspace" loading="lazy" width="800" height="600">
        </div>
        <div class="service-band-body">
          <h3>Business Cleaning</h3>
          <p>Tailored office and workspace cleaning so your team works in a sanitised, welcoming space.</p>
          <a class="btn btn-primary btn-sm" href="<?= e(url('services/business-cleaning.php')) ?>">Explore business cleaning</a>
        </div>
      </article>
      <article class="service-band">
        <div class="service-band-media">
          <img src="<?= e(asset('images/deep.jpg')) ?>" alt="Deep clean detail work in a bathroom" loading="lazy" width="800" height="600">
        </div>
        <div class="service-band-body">
          <h3>Deep &amp; Specialty</h3>
          <p>Deep cleans, end-of-tenancy and clearance support when you need a serious reset.</p>
          <a class="btn btn-primary btn-sm" href="<?= e(url('services/deep-cleaning.php')) ?>">Explore deep cleaning</a>
        </div>
      </article>
    </div>
  </div>
</section>

<section class="section" id="pricing" style="background: rgba(255,255,255,0.55)">
  <div class="container">
    <div class="section-head center" style="margin-inline:auto">
      <span class="eyebrow">Pricing</span>
      <h2>Simple pricing that’s right for you</h2>
      <p>Transparent starting prices. Final quotes depend on size, access and extras.</p>
    </div>
    <div class="pricing-grid">
      <article class="price-plan featured">
        <h3>Gleamly Reset</h3>
        <p class="price-amount">£150 <span>per visit</span></p>
        <ul>
          <li>Total cleaning for your rooms</li>
          <li>Starts with 2 helpers</li>
          <li>2–3 hrs of standard cleaning</li>
          <li>Ideal for regular upkeep</li>
        </ul>
        <a class="btn btn-primary" href="<?= e(url('quote.php?plan=reset')) ?>">Book now</a>
      </article>
      <article class="price-plan">
        <h3>Deep Cleaning</h3>
        <p class="price-amount">£300 <span>per visit</span></p>
        <ul>
          <li>Thorough top-to-bottom clean</li>
          <li>Starts with 5 helpers</li>
          <li>3–5 hrs of deep cleaning</li>
          <li>End-of-tenancy ready</li>
        </ul>
        <a class="btn btn-secondary" href="<?= e(url('quote.php?plan=deep')) ?>">Book now</a>
      </article>
      <article class="price-plan">
        <h3>Other Services</h3>
        <p class="price-amount">£100 <span>per visit</span></p>
        <ul>
          <li>Targeted specialty cleans</li>
          <li>Helpers matched to the job</li>
          <li>2–3 hrs typical duration</li>
          <li>Removals &amp; clearance support</li>
        </ul>
        <a class="btn btn-secondary" href="<?= e(url('quote.php?plan=other')) ?>">Book now</a>
      </article>
    </div>
    <p class="center text-muted" style="margin-top:1.5rem;font-size:0.9rem">Prices include applicable taxes. Cancel anytime. <a href="<?= e(url('estimator.php')) ?>">Try the price estimator</a>.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Reviews</span>
      <h2>Trusted by busy London homes</h2>
      <p>Real feedback from clients across East and Southeast London.</p>
    </div>
    <div class="reviews-grid">
      <article class="review">
        <div class="stars" aria-label="5 stars">★★★★★</div>
        <blockquote>“Booked a deep clean before moving out — deposit returned with no deductions. The team were punctual and meticulous.”</blockquote>
        <cite>Amira K.<span>Hackney · End of tenancy</span></cite>
      </article>
      <article class="review">
        <div class="stars" aria-label="5 stars">★★★★★</div>
        <blockquote>“Weekly home cleans have given us our weekends back. Consistent quality every single visit.”</blockquote>
        <cite>James &amp; Priya<span>Greenwich · Home cleaning</span></cite>
      </article>
      <article class="review">
        <div class="stars" aria-label="5 stars">★★★★★</div>
        <blockquote>“Our office feels fresher and more professional. Communication was easy and the quote was fair.”</blockquote>
        <cite>Daniel O.<span>Canary Wharf · Business cleaning</span></cite>
      </article>
    </div>
    <p style="margin-top:1.75rem"><a class="btn btn-ghost" href="<?= e(url('reviews.php')) ?>">Read more reviews</a></p>
  </div>
</section>

<section class="cta-band">
  <div class="container">
    <div>
      <h2>Ready for a calmer, cleaner home?</h2>
      <p>Tell us about your space — we’ll reply with a clear, no-obligation quote.</p>
    </div>
    <div class="cta-actions">
      <a class="btn btn-primary" href="<?= e(url('quote.php')) ?>">Request a Quote</a>
      <a class="btn btn-secondary" href="https://wa.me/<?= e(SITE_WHATSAPP) ?>" target="_blank" rel="noopener">WhatsApp</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
