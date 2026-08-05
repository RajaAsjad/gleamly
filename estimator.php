<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
$page_title = 'Instant Price Estimator';
$page_description = 'Get a non-binding price estimate for Gleamly cleaning services across East and Southeast London.';
$active = 'pricing';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="<?= e(url()) ?>">Home</a> <span>/</span>
      <span aria-current="page">Price Estimator</span>
    </nav>
    <h1>Instant price estimator</h1>
    <p>Adjust the options for a quick, non-binding ballpark. Final quotes are confirmed after we review your space.</p>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="container estimator-wrap">
    <form class="form-panel" id="price-estimator"
      data-home="<?= (int)PRICE_HOME_BASE ?>"
      data-deep="<?= (int)PRICE_DEEP_BASE ?>"
      data-business="<?= (int)PRICE_BUSINESS_BASE ?>"
      data-tenancy="<?= (int)PRICE_END_TENANCY_BASE ?>"
      data-other="<?= (int)PRICE_OTHER_BASE ?>">
      <div class="form-grid">
        <div class="field">
          <label for="est-service">Service type</label>
          <select id="est-service" name="service">
            <option value="home">Home Cleaning (Gleamly Reset)</option>
            <option value="deep">Deep Cleaning</option>
            <option value="business">Business Cleaning</option>
            <option value="tenancy">End of Tenancy</option>
            <option value="other">Other / Specialty</option>
          </select>
        </div>
        <div class="field">
          <label for="est-rooms">Approximate rooms / areas</label>
          <input id="est-rooms" name="rooms" type="number" min="1" max="20" value="3" inputmode="numeric">
        </div>
        <div class="field">
          <label for="est-helpers">Preferred helpers</label>
          <select id="est-helpers" name="helpers">
            <option value="2">2 helpers</option>
            <option value="3">3 helpers</option>
            <option value="4">4 helpers</option>
            <option value="5">5 helpers</option>
          </select>
        </div>
        <fieldset class="field" style="border:0;padding:0;margin:0">
          <legend style="font-size:0.88rem;font-weight:600;margin-bottom:0.5rem">Add-ons</legend>
          <label style="display:flex;gap:0.5rem;align-items:center;margin-bottom:0.4rem;font-weight:400">
            <input type="checkbox" name="addons" value="oven"> Oven clean (+£35)
          </label>
          <label style="display:flex;gap:0.5rem;align-items:center;margin-bottom:0.4rem;font-weight:400">
            <input type="checkbox" name="addons" value="fridge"> Fridge clean (+£30)
          </label>
          <label style="display:flex;gap:0.5rem;align-items:center;margin-bottom:0.4rem;font-weight:400">
            <input type="checkbox" name="addons" value="windows"> Internal windows (+£40)
          </label>
          <label style="display:flex;gap:0.5rem;align-items:center;font-weight:400">
            <input type="checkbox" name="addons" value="carpet"> Carpet refresh (+£45)
          </label>
        </fieldset>
      </div>
    </form>

    <aside class="estimate-result">
      <h3>Indicative estimate</h3>
      <p class="estimate-price" id="estimate-amount">£150</p>
      <p id="estimate-detail">3 rooms, 2 helpers · indicative only</p>
      <p class="estimate-note">This is not a binding quote. For an accurate price, send photos via our quote form or WhatsApp.</p>
      <a class="btn btn-primary" style="margin-top:1.25rem;background:#fff;color:var(--teal-deep)" href="<?= e(url('quote.php')) ?>">Request exact quote</a>
    </aside>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
