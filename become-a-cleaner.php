<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
$page_title = 'Become a Cleaner';
$page_description = 'Join the Gleamly cleaning team serving East and Southeast London.';
$active = '';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="<?= e(url()) ?>">Home</a> <span>/</span>
      <span aria-current="page">Become a cleaner</span>
    </nav>
    <h1>Join the Gleamly team</h1>
    <p>Reliable, respectful cleaners wanted across East and Southeast London.</p>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="container prose">
    <p>We’re always interested in hearing from experienced cleaners who take pride in their work and treat clients’ homes with care.</p>
    <ul class="feature-list">
      <li>Flexible schedules</li>
      <li>Supportive coordination</li>
      <li>Fair pay for quality work</li>
    </ul>
    <p>Email your details and experience to <a href="mailto:<?= e(SITE_EMAIL) ?>?subject=Become%20a%20cleaner"><?= e(SITE_EMAIL) ?></a> or call <a href="tel:<?= e(SITE_PHONE_TEL) ?>"><?= e(SITE_PHONE) ?></a>.</p>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
