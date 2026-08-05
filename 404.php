<?php
declare(strict_types=1);
http_response_code(404);
require_once __DIR__ . '/includes/config.php';
$page_title = 'Page Not Found';
$page_description = 'The page you requested could not be found.';
$active = '';
require __DIR__ . '/includes/header.php';
?>

<section class="state-page">
  <div class="container">
    <span class="eyebrow">404</span>
    <h1>This page has been tidied away</h1>
    <p class="text-muted" style="max-width:40ch;margin-inline:auto">The link may be outdated. Try one of these instead.</p>
    <div style="display:flex;flex-wrap:wrap;gap:0.75rem;justify-content:center;margin-top:1.75rem">
      <a class="btn btn-primary" href="<?= e(url()) ?>">Home</a>
      <a class="btn btn-secondary" href="<?= e(url('services/')) ?>">Services</a>
      <a class="btn btn-ghost" href="<?= e(url('quote.php')) ?>">Get a Quote</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
