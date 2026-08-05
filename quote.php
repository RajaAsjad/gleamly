<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$plan = $_GET['plan'] ?? '';
$planMap = [
    'reset' => 'home',
    'deep' => 'deep',
    'other' => 'other',
    'home' => 'home',
    'business' => 'business',
    'tenancy' => 'tenancy',
];
$selected = $planMap[$plan] ?? 'home';

$page_title = 'Request a Quote';
$page_description = 'Request a free, no-obligation cleaning quote from Gleamly. Upload photos of your space for a more accurate estimate.';
$active = 'contact';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="<?= e(url()) ?>">Home</a> <span>/</span>
      <span aria-current="page">Request a Quote</span>
    </nav>
    <h1>Request a quote</h1>
    <p>Tell us about your space. We’ll reply with a clear, no-obligation quote — usually within one working day.</p>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="container split">
    <div class="form-panel">
      <div id="form-alert" hidden></div>
      <form id="quote-form" action="<?= e(url('api/quote-submit.php')) ?>" method="post" enctype="multipart/form-data" novalidate>
        <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
        <div class="honeypot" aria-hidden="true">
          <label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
        </div>

        <div class="form-grid two">
          <div class="field">
            <label for="first_name">First name</label>
            <input id="first_name" name="first_name" type="text" required autocomplete="given-name" maxlength="80">
          </div>
          <div class="field">
            <label for="last_name">Last name</label>
            <input id="last_name" name="last_name" type="text" required autocomplete="family-name" maxlength="80">
          </div>
          <div class="field">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" required autocomplete="email">
          </div>
          <div class="field">
            <label for="phone">Phone</label>
            <input id="phone" name="phone" type="tel" required autocomplete="tel" inputmode="tel">
          </div>
          <div class="field">
            <label for="service">Service</label>
            <select id="service" name="service" required>
              <option value="">Select…</option>
              <option value="home" <?= $selected === 'home' ? 'selected' : '' ?>>Home Cleaning</option>
              <option value="business" <?= $selected === 'business' ? 'selected' : '' ?>>Business Cleaning</option>
              <option value="deep" <?= $selected === 'deep' ? 'selected' : '' ?>>Deep Cleaning</option>
              <option value="tenancy" <?= $selected === 'tenancy' ? 'selected' : '' ?>>End of Tenancy</option>
              <option value="other" <?= $selected === 'other' ? 'selected' : '' ?>>Other / Specialty</option>
            </select>
          </div>
          <div class="field">
            <label for="postcode">Postcode</label>
            <input id="postcode" name="postcode" type="text" required autocomplete="postal-code" maxlength="12">
          </div>
          <div class="field">
            <label for="preferred_date">Preferred date (optional)</label>
            <input id="preferred_date" name="preferred_date" type="date">
          </div>
          <div class="field">
            <label for="photos">Photos of your space (optional)</label>
            <input id="photos" name="photos[]" type="file" accept="image/jpeg,image/png,image/webp,image/gif" multiple>
            <span class="field-hint" id="photos-label">Up to 5 images, 5MB each — helps us quote accurately</span>
          </div>
        </div>
        <div class="field" style="margin-top:1rem">
          <label for="message">Tell us more</label>
          <textarea id="message" name="message" rows="5" placeholder="Number of rooms, pets, access notes, add-ons…"></textarea>
        </div>
        <p class="field-hint" style="margin:1rem 0">By submitting, you agree to our <a href="<?= e(url('privacy.php')) ?>">Privacy Policy</a>. We never sell your details.</p>
        <button class="btn btn-primary" type="submit" id="quote-submit">Send enquiry</button>
      </form>
    </div>

    <aside>
      <div class="contact-card" style="margin-bottom:1rem">
        <h3>Prefer to talk?</h3>
        <p class="mb-0"><a href="tel:<?= e(SITE_PHONE_TEL) ?>"><?= e(SITE_PHONE) ?></a></p>
        <p class="mb-0"><a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a></p>
        <p style="margin-top:0.75rem"><a class="btn btn-ghost btn-sm" href="https://wa.me/<?= e(SITE_WHATSAPP) ?>" target="_blank" rel="noopener">WhatsApp us</a></p>
      </div>
      <div class="contact-card">
        <h3>Want a quick ballpark?</h3>
        <p>Use our non-binding price estimator before you enquire.</p>
        <a class="btn btn-secondary btn-sm" href="<?= e(url('estimator.php')) ?>">Open estimator</a>
      </div>
    </aside>
  </div>
</section>

<script>
document.getElementById('quote-form')?.addEventListener('submit', async (e) => {
  e.preventDefault();
  const form = e.target;
  const btn = document.getElementById('quote-submit');
  const alert = document.getElementById('form-alert');
  btn.disabled = true;
  btn.textContent = 'Sending…';
  try {
    const res = await fetch(form.action, {
      method: 'POST',
      body: new FormData(form),
      headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
    });
    const data = await res.json();
    if (!data.ok) throw new Error(data.error || 'Something went wrong');
    window.location.href = data.redirect || '<?= e(url('thank-you.php')) ?>';
  } catch (err) {
    alert.hidden = false;
    alert.className = 'alert alert-err';
    alert.textContent = err.message || 'Could not send. Please call or WhatsApp us.';
    btn.disabled = false;
    btn.textContent = 'Send enquiry';
  }
});
</script>

<?php require __DIR__ . '/includes/footer.php'; ?>
