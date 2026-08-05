<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
$page_title = 'Thank You';
$page_description = 'Thanks for contacting Gleamly. We’ll be in touch shortly.';
$active = '';
$body_class = 'page-thanks';
require __DIR__ . '/includes/header.php';
?>

<section class="state-page">
  <div class="container">
    <span class="eyebrow">Enquiry received</span>
    <h1>Thank you — we’ve got your message</h1>
    <p class="text-muted" style="max-width:42ch;margin-inline:auto">A member of the Gleamly team will reply shortly, usually within one working day.</p>
    <div style="display:flex;flex-wrap:wrap;gap:0.75rem;justify-content:center;margin-top:1.75rem">
      <a class="btn btn-primary" href="<?= e(url()) ?>">Back to home</a>
      <a class="btn btn-secondary" href="https://wa.me/<?= e(SITE_WHATSAPP) ?>" target="_blank" rel="noopener">WhatsApp us</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
