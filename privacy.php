<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
$page_title = 'Privacy Policy';
$page_description = 'How Gleamly collects, uses and protects your personal information.';
$active = '';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <h1>Privacy Policy</h1>
    <p>Last updated: August 2026</p>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="container prose">
    <p>Gleamly (“we”, “us”) respects your privacy. This policy explains what we collect when you use <?= e(SITE_URL) ?> and how we use it.</p>
    <h2>Information we collect</h2>
    <p>When you submit a quote or contact form we collect your name, email, phone number, postcode, message content and any photos you upload. We also collect basic technical data such as IP address and browser type for security and analytics.</p>
    <h2>How we use information</h2>
    <ul>
      <li>To respond to enquiries and provide quotes</li>
      <li>To schedule and deliver cleaning services</li>
      <li>To improve our website and measure conversions (with your cookie consent)</li>
      <li>To meet legal and insurance obligations</li>
    </ul>
    <h2>Cookies</h2>
    <p>We use essential cookies for site security and optional analytics cookies (e.g. Google Analytics) only if you accept them via our cookie banner.</p>
    <h2>Sharing</h2>
    <p>We do not sell your data. We may share information with trusted processors (hosting, email) solely to operate the business, or when required by law.</p>
    <h2>Your rights</h2>
    <p>Under UK GDPR you may request access, correction, deletion or restriction of your personal data. Contact <?= e(SITE_EMAIL) ?>.</p>
    <h2>Contact</h2>
    <p>Email <a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a> or call <a href="tel:<?= e(SITE_PHONE_TEL) ?>"><?= e(SITE_PHONE) ?></a>.</p>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
