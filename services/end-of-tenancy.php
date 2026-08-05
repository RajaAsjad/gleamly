<?php
declare(strict_types=1);
require_once __DIR__ . '/../includes/config.php';
$page_title = 'End of Tenancy Cleaning';
$page_description = 'End of tenancy and checkout cleaning in East and Southeast London. Inventory-ready cleans to help protect your deposit.';
$active = 'services';
$page_canonical = url('services/end-of-tenancy.php');
$schema_extra = '<script type="application/ld+json">' . json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => 'End of Tenancy Cleaning',
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
      <span aria-current="page">End of Tenancy</span>
    </nav>
    <h1>End of tenancy cleaning you can hand over with confidence</h1>
    <p>Checkout-ready cleans and optional clearance support across East and Southeast London.</p>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="container split">
    <div class="prose">
      <img src="<?= e(asset('images/tenancy.jpg')) ?>" alt="Empty apartment prepared for end of tenancy inspection" loading="lazy" width="900" height="600" style="border-radius:16px;margin-bottom:1.75rem">
      <h2>Deposit-minded detail</h2>
      <p>We clean to a high standard expected at check-out — kitchens, bathrooms, appliances and living spaces — so you can focus on the move.</p>
      <ul class="feature-list">
        <li>Full property deep clean aligned to typical inventories</li>
        <li>Oven, fridge and cupboard interiors available as add-ons</li>
        <li>Larger teams for faster turnaround before key handback</li>
        <li>Optional removals &amp; clearance support</li>
        <li>From £300 depending on property size</li>
      </ul>
      <p><a class="btn btn-primary" href="<?= e(url('quote.php?plan=tenancy')) ?>">Request end-of-tenancy quote</a></p>
    </div>
    <aside>
      <div class="form-panel">
        <h3 style="font-size:1.25rem">Moving soon?</h3>
        <p>Share your move-out date and postcode — we’ll confirm availability quickly.</p>
        <a class="btn btn-primary" href="<?= e(url('quote.php?plan=tenancy')) ?>">Get a Quote</a>
        <a class="btn btn-ghost" style="margin-top:0.5rem" href="tel:<?= e(SITE_PHONE_TEL) ?>">Call <?= e(SITE_PHONE) ?></a>
      </div>
    </aside>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
