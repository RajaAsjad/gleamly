<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
$page_title = 'Customer Reviews';
$page_description = 'Read Gleamly customer reviews from homes and businesses across East and Southeast London.';
$active = 'reviews';
$schema_extra = '<script type="application/ld+json">' . json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => 'Gleamly',
    'aggregateRating' => [
        '@type' => 'AggregateRating',
        'ratingValue' => '4.9',
        'reviewCount' => '86',
        'bestRating' => '5',
    ],
    'review' => [
        [
            '@type' => 'Review',
            'author' => ['@type' => 'Person', 'name' => 'Amira K.'],
            'reviewRating' => ['@type' => 'Rating', 'ratingValue' => '5'],
            'reviewBody' => 'Booked a deep clean before moving out — deposit returned with no deductions.',
        ],
        [
            '@type' => 'Review',
            'author' => ['@type' => 'Person', 'name' => 'James'],
            'reviewRating' => ['@type' => 'Rating', 'ratingValue' => '5'],
            'reviewBody' => 'Weekly home cleans have given us our weekends back.',
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
require __DIR__ . '/includes/header.php';

$reviews = [
    ['Amira K.', 'Hackney · End of tenancy', 'Booked a deep clean before moving out — deposit returned with no deductions. The team were punctual and meticulous.'],
    ['James & Priya', 'Greenwich · Home cleaning', 'Weekly home cleans have given us our weekends back. Consistent quality every single visit.'],
    ['Daniel O.', 'Canary Wharf · Business cleaning', 'Our office feels fresher and more professional. Communication was easy and the quote was fair.'],
    ['Sophie L.', 'Lewisham · Deep clean', 'They transformed our flat after building work. Dust gone, bathrooms sparkling — worth every penny.'],
    ['Marcus T.', 'Stratford · Home cleaning', 'Friendly, careful with our pets, and always leave the place smelling fresh. Highly recommend.'],
    ['Elena R.', 'Peckham · End of tenancy', 'Needed a last-minute checkout clean. Gleamly fitted us in and the landlord was happy.'],
];
?>

<section class="page-hero">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="<?= e(url()) ?>">Home</a> <span>/</span>
      <span aria-current="page">Reviews</span>
    </nav>
    <h1>Reviews from neighbours across East &amp; SE London</h1>
    <p>Real feedback from homes and workplaces we’ve cleaned.</p>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="container">
    <div class="reviews-grid">
      <?php foreach ($reviews as [$name, $meta, $text]): ?>
      <article class="review">
        <div class="stars" aria-label="5 stars">★★★★★</div>
        <blockquote>“<?= e($text) ?>”</blockquote>
        <cite><?= e($name) ?><span><?= e($meta) ?></span></cite>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="container">
    <div>
      <h2>Ready to join them?</h2>
      <p>Request a quote and see why Londoners trust Gleamly.</p>
    </div>
    <div class="cta-actions">
      <a class="btn btn-primary" href="<?= e(url('quote.php')) ?>">Request a Quote</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
