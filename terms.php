<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
$page_title = 'Terms of Service';
$page_description = 'Terms of service for using the Gleamly website and requesting cleaning services.';
$active = '';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <h1>Terms of Service</h1>
    <p>Last updated: August 2026</p>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="container prose">
    <p>By using the Gleamly website and requesting services, you agree to these terms.</p>
    <h2>Quotes &amp; bookings</h2>
    <p>Website price estimators and listed starting prices are indicative only. A booking is confirmed once we accept your enquiry and agree a date, scope and price with you.</p>
    <h2>Your responsibilities</h2>
    <p>Please provide accurate information about the property, access and any hazards (pets, parking, alarms). Secure valuables before our visit.</p>
    <h2>Cancellations</h2>
    <p>You may cancel at any time. Reasonable notice helps us reallocate teams. Late cancellations may incur a fee as agreed at booking.</p>
    <h2>Liability</h2>
    <p>We are insured for cleaning services. Please report any concerns promptly so we can investigate and resolve them.</p>
    <h2>Website use</h2>
    <p>Content on this site is for information. Do not misuse forms (spam, automated abuse). We may block abusive traffic.</p>
    <h2>Contact</h2>
    <p><a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a> · <a href="tel:<?= e(SITE_PHONE_TEL) ?>"><?= e(SITE_PHONE) ?></a></p>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
