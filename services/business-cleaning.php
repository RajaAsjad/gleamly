<?php
declare(strict_types=1);
require_once __DIR__ . '/../includes/config.php';
$page_title = 'Business & Office Cleaning';
$page_description = 'Professional business and office cleaning in East and Southeast London. Sanitised workspaces tailored to your hours.';
$active = 'services';
$page_canonical = url('services/business-cleaning.php');
$schema_extra = '<script type="application/ld+json">' . json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => 'Business Cleaning Service',
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
      <span aria-current="page">Business Cleaning</span>
    </nav>
    <h1>Business cleaning that reflects your brand</h1>
    <p>Keep offices, studios and client-facing spaces spotless — scheduled around how your team works.</p>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="container split">
    <div class="prose">
      <img src="<?= e(asset('images/office.jpg')) ?>" alt="Professional office cleaned by Gleamly" loading="lazy" width="900" height="600" style="border-radius:16px;margin-bottom:1.75rem">
      <h2>Built for workplaces</h2>
      <p>We focus on high-touch areas, shared kitchens, washrooms and open-plan floors so your workspace feels sanitised and welcoming every morning.</p>
      <ul class="feature-list">
        <li>Desks, meeting rooms and communal areas</li>
        <li>Kitchenettes and breakout spaces</li>
        <li>Washrooms stocked and sanitised</li>
        <li>Flexible out-of-hours or daytime visits</li>
        <li>Consistent team familiar with your site</li>
      </ul>
      <p><a class="btn btn-primary" href="<?= e(url('quote.php?plan=business')) ?>">Request a business quote</a></p>
    </div>
    <aside>
      <div class="form-panel">
        <h3 style="font-size:1.25rem">Tailored contracts</h3>
        <p>Pricing depends on floor area, frequency and access. Typical starting point from £200.</p>
        <a class="btn btn-primary" href="<?= e(url('contact.php')) ?>">Talk to us</a>
      </div>
    </aside>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
