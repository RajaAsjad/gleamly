<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
$page_title = 'Cleaning Prices';
$page_description = 'Simple, transparent cleaning prices from Gleamly. Home reset from £150, deep cleans from £300 across East and Southeast London.';
$active = 'pricing';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="<?= e(url()) ?>">Home</a> <span>/</span>
      <span aria-current="page">Pricing</span>
    </nav>
    <h1>Simple pricing that’s right for you</h1>
    <p>Starting prices include applicable taxes. Final quotes reflect your property and extras.</p>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="container">
    <div class="pricing-grid">
      <article class="price-plan featured">
        <h3>Gleamly Reset</h3>
        <p class="price-amount">£150 <span>per visit</span></p>
        <ul>
          <li>Total cleaning for your rooms</li>
          <li>Starts with 2 helpers</li>
          <li>2–3 hrs of standard cleaning</li>
          <li>Regular services welcome</li>
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
          <li>Specialty &amp; targeted cleans</li>
          <li>Helpers matched to the job</li>
          <li>2–3 hrs typical duration</li>
          <li>Removal services available</li>
        </ul>
        <a class="btn btn-secondary" href="<?= e(url('quote.php?plan=other')) ?>">Book now</a>
      </article>
    </div>
    <p class="center text-muted" style="margin-top:2rem">
      Want a personalised figure? <a href="<?= e(url('estimator.php')) ?>">Use the estimator</a> or <a href="<?= e(url('quote.php')) ?>">request a quote</a>.
    </p>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
