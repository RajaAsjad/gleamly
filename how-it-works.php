<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
$page_title = 'How Gleamly Works';
$page_description = 'Book Gleamly in three easy steps: choose a service, tailor your request, schedule and relax.';
$active = 'how';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="<?= e(url()) ?>">Home</a> <span>/</span>
      <span aria-current="page">How it works</span>
    </nav>
    <h1>Get your day back. It’s easy.</h1>
    <p>From first enquiry to a spotless finish — here’s what to expect.</p>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="container">
    <div class="steps">
      <article class="step is-visible">
        <div class="step-num">01</div>
        <h3>Choose your service</h3>
        <p>One-off, special occasion, regular, standard or deep. You decide what fits.</p>
        <em>You decide</em>
      </article>
      <article class="step is-visible">
        <div class="step-num">02</div>
        <h3>Tailor your request</h3>
        <p>Rooms, add-ons like fridge or oven, access notes — your space, your way.</p>
        <em>Your space, your way</em>
      </article>
      <article class="step is-visible">
        <div class="step-num">03</div>
        <h3>Schedule and relax</h3>
        <p>Pick a preferred date and time. We confirm, arrive, and clean thoroughly.</p>
        <em>It’s that simple</em>
      </article>
    </div>
    <p style="margin-top:2.5rem">
      <a class="btn btn-primary" href="<?= e(url('quote.php')) ?>">Start your enquiry</a>
      <a class="btn btn-ghost" href="<?= e(url('faq.php')) ?>">Read FAQ</a>
    </p>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
