<?php
declare(strict_types=1);
require_once __DIR__ . '/../includes/config.php';
$page_title = 'Cleaning Services in East & Southeast London';
$page_description = 'Home, business, deep and end-of-tenancy cleaning from Gleamly across East and Southeast London.';
$active = 'services';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="<?= e(url()) ?>">Home</a> <span>/</span>
      <span aria-current="page">Services</span>
    </nav>
    <h1>Cleaning services built around your life</h1>
    <p>Four focused offerings — choose what fits, then tailor rooms, add-ons and timing.</p>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="container services-index">
    <a class="service-card-link" href="<?= e(url('services/home-cleaning.php')) ?>">
      <img src="<?= e(asset('images/kitchen.jpg')) ?>" alt="Home kitchen after professional clean" loading="lazy" width="800" height="500">
      <div class="body">
        <h3>Home Cleaning</h3>
        <p>Regular or one-off cleans that keep your home guest-ready without the weekend slog.</p>
      </div>
    </a>
    <a class="service-card-link" href="<?= e(url('services/business-cleaning.php')) ?>">
      <img src="<?= e(asset('images/office.jpg')) ?>" alt="Clean modern office" loading="lazy" width="800" height="500">
      <div class="body">
        <h3>Business Cleaning</h3>
        <p>Offices and workspaces cleaned to a professional standard your clients will notice.</p>
      </div>
    </a>
    <a class="service-card-link" href="<?= e(url('services/deep-cleaning.php')) ?>">
      <img src="<?= e(asset('images/deep.jpg')) ?>" alt="Deep cleaning detail" loading="lazy" width="800" height="500">
      <div class="body">
        <h3>Deep Cleaning</h3>
        <p>Top-to-bottom resets for spring cleans, special occasions, or when life gets busy.</p>
      </div>
    </a>
    <a class="service-card-link" href="<?= e(url('services/end-of-tenancy.php')) ?>">
      <img src="<?= e(asset('images/tenancy.jpg')) ?>" alt="Empty flat ready for end of tenancy clean" loading="lazy" width="800" height="500">
      <div class="body">
        <h3>End of Tenancy</h3>
        <p>Inventory-ready cleans and clearance support so you can hand keys back with confidence.</p>
      </div>
    </a>
  </div>
</section>

<section class="cta-band">
  <div class="container">
    <div>
      <h2>Not sure which service you need?</h2>
      <p>Send a quick enquiry — we’ll recommend the right package for your space.</p>
    </div>
    <div class="cta-actions">
      <a class="btn btn-primary" href="<?= e(url('quote.php')) ?>">Get a Quote</a>
      <a class="btn btn-secondary" href="tel:<?= e(SITE_PHONE_TEL) ?>">Call <?= e(SITE_PHONE) ?></a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
