<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
$page_title = 'About Gleamly';
$page_description = 'Gleamly is a trusted cleaning company serving East and Southeast London with calm, professional, reliable service.';
$active = 'about';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="<?= e(url()) ?>">Home</a> <span>/</span>
      <span aria-current="page">About</span>
    </nav>
    <h1>We clean deeply so you can rest easy</h1>
    <p>Gleamly exists to give busy Londoners their time back — with cleaning that’s calm, thorough and easy to book.</p>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="container split">
    <div class="prose">
      <img src="<?= e(asset('images/about.jpg')) ?>" alt="Gleamly cleaner preparing supplies" loading="lazy" width="900" height="600" style="border-radius:16px;margin-bottom:1.75rem">
      <h2>Our approach</h2>
      <p>We keep things simple: clear communication, respectful teams in your home or workplace, and results you can see and feel. No hard sell — just reliable cleaning across East and Southeast London.</p>
      <h2>What we stand for</h2>
      <ul class="feature-list">
        <li>Insured, DBS-checked cleaners</li>
        <li>Transparent pricing and honest quotes</li>
        <li>Respect for your space, time and privacy</li>
        <li>Flexible scheduling that fits real life</li>
      </ul>
      <p><a class="btn btn-primary" href="<?= e(url('quote.php')) ?>">Work with Gleamly</a></p>
    </div>
    <aside>
      <div class="contact-card">
        <h3>Serving</h3>
        <p><?= e(SITE_AREA) ?></p>
        <h3 style="margin-top:1.25rem">Contact</h3>
        <p class="mb-0"><a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a></p>
        <p><a href="tel:<?= e(SITE_PHONE_TEL) ?>"><?= e(SITE_PHONE) ?></a></p>
      </div>
    </aside>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
