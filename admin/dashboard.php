<?php
declare(strict_types=1);
require_once __DIR__ . '/../includes/config.php';

if (!is_admin()) {
    header('Location: index.php');
    exit;
}

if (isset($_GET['logout'])) {
    unset($_SESSION['admin_logged_in']);
    header('Location: index.php');
    exit;
}

if (isset($_POST['mark']) && isset($_POST['id']) && verify_csrf($_POST['csrf_token'] ?? null)) {
    $id = (string)$_POST['id'];
    $status = (string)$_POST['mark'];
    $file = DATA_DIR . '/quotes.json';
    $quotes = json_decode((string)file_get_contents($file), true) ?: [];
    foreach ($quotes as &$q) {
        if (($q['id'] ?? '') === $id) {
            $q['status'] = $status;
        }
    }
    unset($q);
    file_put_contents($file, json_encode($quotes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    header('Location: dashboard.php');
    exit;
}

$quotes = json_decode((string)file_get_contents(DATA_DIR . '/quotes.json'), true) ?: [];
$newCount = count(array_filter($quotes, static fn($q) => ($q['status'] ?? '') === 'new'));
?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | Gleamly Admin</title>
  <meta name="robots" content="noindex, nofollow">
  <link rel="stylesheet" href="<?= e(asset('css/style.css')) ?>">
</head>
<body class="admin-body">
  <div class="admin-shell">
    <div style="display:flex;justify-content:space-between;align-items:center;gap:1rem;margin-bottom:1.25rem;flex-wrap:wrap">
      <div>
        <h1 style="font-size:1.6rem;margin:0">Enquiries</h1>
        <p class="text-muted mb-0"><?= count($quotes) ?> total · <?= (int)$newCount ?> new</p>
      </div>
      <div style="display:flex;gap:0.5rem">
        <a class="btn btn-ghost btn-sm" href="<?= e(url()) ?>" target="_blank">View site</a>
        <a class="btn btn-secondary btn-sm" href="?logout=1">Log out</a>
      </div>
    </div>

    <?php if (!$quotes): ?>
      <div class="admin-card"><p class="mb-0">No enquiries yet. Quote and contact forms will appear here.</p></div>
    <?php else: ?>
      <?php foreach ($quotes as $q): ?>
        <article class="admin-card">
          <div style="display:flex;justify-content:space-between;gap:1rem;flex-wrap:wrap;margin-bottom:0.75rem">
            <strong>
              <?= e(($q['first_name'] ?? '') . ' ' . ($q['last_name'] ?? '')) ?: e($q['name'] ?? 'Contact') ?>
              <span class="text-muted" style="font-weight:400"> · <?= e($q['status'] ?? 'new') ?></span>
            </strong>
            <span class="text-muted" style="font-size:0.85rem"><?= e(date('d M Y H:i', strtotime($q['created_at'] ?? 'now'))) ?></span>
          </div>
          <p style="margin:0 0 0.35rem"><a href="mailto:<?= e($q['email'] ?? '') ?>"><?= e($q['email'] ?? '') ?></a>
            <?php if (!empty($q['phone'])): ?> · <a href="tel:<?= e(preg_replace('/\s+/', '', $q['phone'])) ?>"><?= e($q['phone']) ?></a><?php endif; ?>
          </p>
          <?php if (!empty($q['service'])): ?><p style="margin:0 0 0.35rem">Service: <strong><?= e($q['service']) ?></strong><?php if (!empty($q['postcode'])): ?> · <?= e($q['postcode']) ?><?php endif; ?></p><?php endif; ?>
          <?php if (!empty($q['preferred_date'])): ?><p style="margin:0 0 0.35rem">Preferred date: <?= e($q['preferred_date']) ?></p><?php endif; ?>
          <p style="margin:0.75rem 0"><?= nl2br(e($q['message'] ?? $q['note'] ?? '')) ?></p>
          <?php if (!empty($q['photos']) && is_array($q['photos'])): ?>
            <p style="font-size:0.9rem">Photos:
              <?php foreach ($q['photos'] as $photo): ?>
                <a href="<?= e(asset('uploads/' . $photo)) ?>" target="_blank" rel="noopener"><?= e($photo) ?></a>
              <?php endforeach; ?>
            </p>
          <?php endif; ?>
          <form method="post" style="display:flex;gap:0.5rem;flex-wrap:wrap;margin-top:0.75rem">
            <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
            <input type="hidden" name="id" value="<?= e($q['id'] ?? '') ?>">
            <button class="btn btn-ghost btn-sm" name="mark" value="contacted" type="submit">Mark contacted</button>
            <button class="btn btn-ghost btn-sm" name="mark" value="closed" type="submit">Mark closed</button>
            <button class="btn btn-ghost btn-sm" name="mark" value="new" type="submit">Mark new</button>
          </form>
        </article>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</body>
</html>
