<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
$page_title = 'Frequently Asked Questions';
$page_description = 'Answers to common questions about Gleamly cleaning services, pricing, booking and coverage in East and Southeast London.';
$active = '';
$faqs = [
    ['Which areas do you cover?', 'We serve East and Southeast London. Share your postcode on the quote form and we’ll confirm availability.'],
    ['How does pricing work?', 'Listed prices are starting points. Your final quote depends on property size, condition, helpers and add-ons. Try our price estimator for a ballpark.'],
    ['Are your cleaners insured and vetted?', 'Yes. Our teams are insured and DBS-checked. We treat your home or workplace with care and respect.'],
    ['Can I book a one-off clean?', 'Absolutely — one-off, deep clean, end-of-tenancy or regular schedules are all available.'],
    ['Do I need to provide cleaning products?', 'We can bring professional supplies, or use your preferred products if you ask us to.'],
    ['How do I get a quote?', 'Use the Request a Quote form (photo upload welcome), WhatsApp us, or call ' . SITE_PHONE . '.'],
    ['What if I need to cancel?', 'You can cancel anytime. Please give as much notice as possible so we can reallocate the team.'],
    ['Do you offer end-of-tenancy cleans?', 'Yes — inventory-minded deep cleans with optional oven, fridge and clearance support.'],
];

$schema_extra = '<script type="application/ld+json">' . json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array_map(static fn($f) => [
        '@type' => 'Question',
        'name' => $f[0],
        'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f[1]],
    ], $faqs),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="<?= e(url()) ?>">Home</a> <span>/</span>
      <span aria-current="page">FAQ</span>
    </nav>
    <h1>Frequently asked questions</h1>
    <p>Quick answers before you book. Still unsure? Call or WhatsApp — we’re happy to help.</p>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="container">
    <div class="faq-list">
      <?php foreach ($faqs as [$q, $a]): ?>
      <details class="faq-item">
        <summary><?= e($q) ?></summary>
        <div class="faq-body"><?= e($a) ?></div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
