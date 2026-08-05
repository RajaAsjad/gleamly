<?php
declare(strict_types=1);
require_once __DIR__ . '/../includes/config.php';
$page_title = 'Home Cleaning Services';
$page_description = 'Reliable home cleaning across East and Southeast London. Regular, one-off and tailored packages from Gleamly.';
$active = 'services';
$page_canonical = url('services/home-cleaning.php');
$schema_extra = '<script type="application/ld+json">' . json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => 'Home Cleaning Service',
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
      <span aria-current="page">Home Cleaning</span>
    </nav>
    <h1>Home cleaning that gives you your weekends back</h1>
    <p>Trusted cleaners for flats and houses across East and Southeast London — regular upkeep or a one-off reset.</p>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="container split">
    <div class="prose">
      <img src="<?= e(asset('images/living.jpg')) ?>" alt="Bright living room after Gleamly home clean" loading="lazy" width="900" height="600" style="border-radius:16px;margin-bottom:1.75rem">
      <h2>What we cover</h2>
      <p>Every home is different. We agree a checklist with you so kitchens, bathrooms, living areas and bedrooms get the attention they need — without you hovering over the process.</p>
      <ul class="feature-list">
        <li>Dusting, vacuuming and mopping throughout</li>
        <li>Kitchen surfaces, sinks and appliance exteriors</li>
        <li>Bathrooms: basins, showers, toilets and mirrors</li>
        <li>Bedrooms and living areas reset and tidy</li>
        <li>Optional add-ons: oven, fridge, windows, carpets</li>
      </ul>
      <h2>Flexible scheduling</h2>
      <p>Weekly, fortnightly or one-off visits. From £150 for a Gleamly Reset starting with two helpers.</p>
      <p><a class="btn btn-primary" href="<?= e(url('quote.php?plan=home')) ?>">Request a home clean quote</a></p>
    </div>
    <aside>
      <div class="form-panel">
        <h3 style="font-size:1.25rem">From £150 / visit</h3>
        <p>Starting price for standard home cleans. Final quote depends on size and extras.</p>
        <a class="btn btn-primary" href="<?= e(url('estimator.php')) ?>">Estimate price</a>
        <a class="btn btn-ghost" style="margin-top:0.5rem" href="https://wa.me/<?= e(SITE_WHATSAPP) ?>" target="_blank" rel="noopener">WhatsApp photos</a>
      </div>
    </aside>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
