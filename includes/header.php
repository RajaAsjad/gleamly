<?php
declare(strict_types=1);
require_once __DIR__ . '/config.php';

$page_title = $page_title ?? 'Professional Cleaners in East & Southeast London';
$page_description = $page_description ?? 'Trusted home, business and deep cleaning across East and Southeast London. Get a free quote from Gleamly.';
$page_canonical = $page_canonical ?? url(ltrim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/', '/'));
$body_class = $body_class ?? '';
$og_image = $og_image ?? asset('images/og-share.jpg');
$schema_extra = $schema_extra ?? '';
$active = $active ?? '';
?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($page_title) ?> | <?= e(SITE_NAME) ?></title>
  <meta name="description" content="<?= e($page_description) ?>">
  <link rel="canonical" href="<?= e($page_canonical) ?>">
  <meta name="robots" content="index, follow">

  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
  <meta property="og:title" content="<?= e($page_title) ?> | <?= e(SITE_NAME) ?>">
  <meta property="og:description" content="<?= e($page_description) ?>">
  <meta property="og:url" content="<?= e($page_canonical) ?>">
  <meta property="og:image" content="<?= e($og_image) ?>">
  <meta name="twitter:card" content="summary_large_image">

  <link rel="icon" href="<?= e(asset('images/favicon.svg')) ?>" type="image/svg+xml">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Sora:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= e(asset('css/style.css')) ?>">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "Gleamly",
    "image": "<?= e(asset('images/og-share.jpg')) ?>",
    "url": "<?= e(SITE_URL) ?>",
    "telephone": "<?= e(SITE_PHONE_TEL) ?>",
    "email": "<?= e(SITE_EMAIL) ?>",
    "description": "Professional cleaning services across East and Southeast London.",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "London",
      "addressRegion": "England",
      "addressCountry": "GB"
    },
    "areaServed": ["East London", "Southeast London"],
    "priceRange": "££",
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "4.9",
      "reviewCount": "86"
    }
  }
  </script>
  <?= $schema_extra ?>
  <!-- Google Analytics 4 placeholder — replace G-XXXXXXXXXX -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-XXXXXXXXXX');
  </script>
</head>
<body class="<?= e($body_class) ?>">
<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header" id="site-header">
  <div class="container header-inner">
    <a class="brand" href="<?= e(url()) ?>" aria-label="Gleamly home">
      <span class="brand-mark" aria-hidden="true"></span>
      <span class="brand-text">Gleamly</span>
    </a>

    <nav class="nav-desktop" aria-label="Primary">
      <a href="<?= e(url('how-it-works.php')) ?>" class="<?= $active === 'how' ? 'is-active' : '' ?>">How it works</a>
      <a href="<?= e(url('services/')) ?>" class="<?= $active === 'services' ? 'is-active' : '' ?>">Services</a>
      <a href="<?= e(url('pricing.php')) ?>" class="<?= $active === 'pricing' ? 'is-active' : '' ?>">Pricing</a>
      <a href="<?= e(url('reviews.php')) ?>" class="<?= $active === 'reviews' ? 'is-active' : '' ?>">Reviews</a>
      <a href="<?= e(url('about.php')) ?>" class="<?= $active === 'about' ? 'is-active' : '' ?>">About</a>
      <a href="<?= e(url('contact.php')) ?>" class="<?= $active === 'contact' ? 'is-active' : '' ?>">Contact</a>
    </nav>

    <div class="header-actions">
      <a class="header-phone" href="tel:<?= e(SITE_PHONE_TEL) ?>"><?= e(SITE_PHONE) ?></a>
      <a class="btn btn-primary btn-sm" href="<?= e(url('quote.php')) ?>">Get a Quote</a>
      <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="mobile-nav" aria-label="Open menu">
        <span></span><span></span>
      </button>
    </div>
  </div>

  <nav class="nav-mobile" id="mobile-nav" hidden>
    <a href="<?= e(url('how-it-works.php')) ?>">How it works</a>
    <a href="<?= e(url('services/')) ?>">Services</a>
    <a href="<?= e(url('pricing.php')) ?>">Pricing</a>
    <a href="<?= e(url('reviews.php')) ?>">Reviews</a>
    <a href="<?= e(url('faq.php')) ?>">FAQ</a>
    <a href="<?= e(url('about.php')) ?>">About</a>
    <a href="<?= e(url('contact.php')) ?>">Contact</a>
    <a href="<?= e(url('quote.php')) ?>" class="btn btn-primary">Request a Quote</a>
    <a href="tel:<?= e(SITE_PHONE_TEL) ?>" class="btn btn-ghost">Call <?= e(SITE_PHONE) ?></a>
  </nav>
</header>

<main id="main">
