<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
$page_title = 'Contact Gleamly';
$page_description = 'Contact Gleamly for cleaning quotes in East and Southeast London. Call, email, WhatsApp or send a message.';
$active = 'contact';

$sent = false;
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf($_POST['csrf_token'] ?? null)) {
        $error = 'Invalid security token. Please try again.';
    } elseif (!empty($_POST['website'])) {
        $sent = true; // honeypot
    } else {
        $name = trim((string)($_POST['name'] ?? ''));
        $email = trim((string)($_POST['email'] ?? ''));
        $phone = trim((string)($_POST['phone'] ?? ''));
        $note = trim((string)($_POST['note'] ?? ''));
        if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $note === '') {
            $error = 'Please complete name, email and message.';
        } else {
            $entry = [
                'id' => bin2hex(random_bytes(6)),
                'created_at' => date('c'),
                'type' => 'contact',
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'message' => $note,
                'status' => 'new',
            ];
            $file = DATA_DIR . '/quotes.json';
            $quotes = json_decode((string)file_get_contents($file), true) ?: [];
            array_unshift($quotes, $entry);
            file_put_contents($file, json_encode($quotes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            @mail(SITE_EMAIL, 'Gleamly contact from ' . $name, "From: $name <$email>\nPhone: $phone\n\n$note", 'Reply-To: ' . $email);
            $sent = true;
        }
    }
}

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="<?= e(url()) ?>">Home</a> <span>/</span>
      <span aria-current="page">Contact</span>
    </nav>
    <h1>Get in touch</h1>
    <p>Questions, quotes or feedback — we’d love to hear from you.</p>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="container">
    <div class="contact-cards">
      <div class="contact-card">
        <h3>Message us</h3>
        <p><a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a></p>
      </div>
      <div class="contact-card">
        <h3>Call us</h3>
        <p><a href="tel:<?= e(SITE_PHONE_TEL) ?>"><?= e(SITE_PHONE) ?></a></p>
      </div>
      <div class="contact-card">
        <h3>Prefer WhatsApp</h3>
        <p><a href="https://wa.me/<?= e(SITE_WHATSAPP) ?>" target="_blank" rel="noopener">Click here</a></p>
      </div>
    </div>

    <div class="split">
      <div class="form-panel">
        <?php if ($sent): ?>
          <div class="alert alert-ok">Thanks — your message is with us. We’ll reply soon.</div>
        <?php elseif ($error): ?>
          <div class="alert alert-err"><?= e($error) ?></div>
        <?php endif; ?>
        <form method="post" action="">
          <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
          <div class="honeypot"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
          <div class="form-grid two">
            <div class="field">
              <label for="name">Name</label>
              <input id="name" name="name" type="text" required autocomplete="name">
            </div>
            <div class="field">
              <label for="email">Email</label>
              <input id="email" name="email" type="email" required autocomplete="email">
            </div>
            <div class="field">
              <label for="phone">Phone</label>
              <input id="phone" name="phone" type="tel" autocomplete="tel" inputmode="tel">
            </div>
          </div>
          <div class="field" style="margin-top:1rem">
            <label for="note">Drop us a note</label>
            <textarea id="note" name="note" rows="5" required></textarea>
          </div>
          <button class="btn btn-primary" type="submit" style="margin-top:1rem">Submit</button>
        </form>
      </div>
      <aside>
        <div class="contact-card">
          <h3>Need a full quote?</h3>
          <p>Use our dedicated quote form with photo upload for the most accurate response.</p>
          <a class="btn btn-secondary btn-sm" href="<?= e(url('quote.php')) ?>">Request a Quote</a>
        </div>
      </aside>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
