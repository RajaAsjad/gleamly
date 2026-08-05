<?php
declare(strict_types=1);
require_once __DIR__ . '/../includes/config.php';
$page_title = 'Deep Cleaning Services';
$page_description = 'Thorough deep cleaning across East and Southeast London. Ideal for spring resets, special occasions and neglected spaces.';
$active = 'services';
$page_canonical = url('services/deep-cleaning.php');
$schema_extra = '<script type="application/ld+json">' . json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => 'Deep Cleaning Service',
    'provider' => ['@type' => 'LocalBusiness', 'name' => 'Gleamly'],
    'areaServed' => 'East and Southeast London',
    'description' => $page_description,
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
require __DIR__ . '/../includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="<?= e(url()) ?>">Home</a> <span>/</span>
      <a href="<?= e(url('services/')) ?>">Services</a> <span>/</span>
      <span aria-current="page">Deep Cleaning</span>
    </nav>
    <h1>Deep cleaning for a true reset</h1>
    <p>More time, more detail, more hands — when standard cleaning isn’t enough.</p>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="container split">
    <div class="prose">
      <img src="<?= e(asset('images/deep.jpg')) ?>" alt="Detailed bathroom deep clean" loading="lazy" width="900" height="600" style="border-radius:16px;margin-bottom:1.75rem">
      <h2>When to book a deep clean</h2>
      <p>Moving season, post-renovation dust, hosting family, or simply reclaiming a home that’s fallen behind — our deep clean goes beyond the surface.</p>
      <ul class="feature-list">
        <li>Skirting, switches, and hard-to-reach spots</li>
        <li>Detailed kitchen and bathroom attention</li>
        <li>Larger team (from 5 helpers on standard packages)</li>
        <li>Typically 3–5 hours depending on property size</li>
        <li>From £300 per visit</li>
      </ul>
      <p><a class="btn btn-primary" href="<?= e(url('quote.php?plan=deep')) ?>">Book a deep clean quote</a></p>
    </div>
    <aside>
      <div class="form-panel">
        <h3 style="font-size:1.25rem">From £300 / visit</h3>
        <p>Upload photos on the quote form for a more accurate estimate.</p>
        <a class="btn btn-primary" href="<?= e(url('quote.php?plan=deep')) ?>">Get a Quote</a>
      </div>
    </aside>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
