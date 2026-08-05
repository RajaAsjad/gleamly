<?php
declare(strict_types=1);
require_once __DIR__ . '/../includes/config.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Method not allowed']);
    exit;
}

$token = $_POST['csrf_token'] ?? '';
if (!verify_csrf($token)) {
    http_response_code(403);
    echo json_encode(['ok' => false, 'error' => 'Invalid security token. Please refresh and try again.']);
    exit;
}

// Honeypot spam protection
if (!empty($_POST['website'])) {
    echo json_encode(['ok' => true, 'redirect' => url('thank-you.php')]);
    exit;
}

// Simple rate limit by session
$_SESSION['quote_submits'] = ($_SESSION['quote_submits'] ?? 0) + 1;
if ($_SESSION['quote_submits'] > 8) {
    http_response_code(429);
    echo json_encode(['ok' => false, 'error' => 'Too many submissions. Please try again later or call us.']);
    exit;
}

$first = trim((string)($_POST['first_name'] ?? ''));
$last = trim((string)($_POST['last_name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$phone = trim((string)($_POST['phone'] ?? ''));
$service = trim((string)($_POST['service'] ?? ''));
$postcode = trim((string)($_POST['postcode'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));
$preferred = trim((string)($_POST['preferred_date'] ?? ''));

$errors = [];
if ($first === '' || strlen($first) > 80) $errors[] = 'Please enter your first name.';
if ($last === '' || strlen($last) > 80) $errors[] = 'Please enter your last name.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Please enter a valid email.';
if ($phone === '' || strlen($phone) < 8) $errors[] = 'Please enter a valid phone number.';
if ($service === '') $errors[] = 'Please choose a service.';
if ($postcode === '') $errors[] = 'Please enter your postcode.';

$allowedServices = ['home', 'business', 'deep', 'tenancy', 'other', 'reset'];
if ($service !== '' && !in_array($service, $allowedServices, true)) {
    $errors[] = 'Invalid service selected.';
}

$savedFiles = [];
if (!empty($_FILES['photos']) && is_array($_FILES['photos']['name'])) {
    $count = count($_FILES['photos']['name']);
    if ($count > 5) {
        $errors[] = 'Please upload a maximum of 5 photos.';
    }
    $allowedMime = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
    for ($i = 0; $i < $count; $i++) {
        if ($_FILES['photos']['error'][$i] === UPLOAD_ERR_NO_FILE) continue;
        if ($_FILES['photos']['error'][$i] !== UPLOAD_ERR_OK) {
            $errors[] = 'One of the photos failed to upload.';
            continue;
        }
        if ($_FILES['photos']['size'][$i] > MAX_UPLOAD_BYTES) {
            $errors[] = 'Each photo must be under 5MB.';
            continue;
        }
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($_FILES['photos']['tmp_name'][$i]);
        if (!in_array($mime, $allowedMime, true)) {
            $errors[] = 'Photos must be JPG, PNG, WebP or GIF.';
            continue;
        }
        $ext = match ($mime) {
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/webp' => 'webp',
            default => 'gif',
        };
        $name = 'quote_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
        $dest = UPLOAD_DIR . '/' . $name;
        if (move_uploaded_file($_FILES['photos']['tmp_name'][$i], $dest)) {
            $savedFiles[] = $name;
        }
    }
}

if ($errors) {
    http_response_code(422);
    echo json_encode(['ok' => false, 'error' => implode(' ', $errors)]);
    exit;
}

$entry = [
    'id' => bin2hex(random_bytes(8)),
    'created_at' => date('c'),
    'first_name' => $first,
    'last_name' => $last,
    'email' => $email,
    'phone' => $phone,
    'service' => $service,
    'postcode' => $postcode,
    'preferred_date' => $preferred,
    'message' => $message,
    'photos' => $savedFiles,
    'ip' => $_SERVER['REMOTE_ADDR'] ?? '',
    'status' => 'new',
];

$file = DATA_DIR . '/quotes.json';
$fp = fopen($file, 'c+');
if ($fp === false) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => 'Could not save your enquiry. Please call or WhatsApp us.']);
    exit;
}
flock($fp, LOCK_EX);
$raw = stream_get_contents($fp);
$quotes = json_decode($raw ?: '[]', true);
if (!is_array($quotes)) $quotes = [];
array_unshift($quotes, $entry);
ftruncate($fp, 0);
rewind($fp);
fwrite($fp, json_encode($quotes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
flock($fp, LOCK_UN);
fclose($fp);

// Email notification (works when mail() is configured on hosting)
$subject = 'New Gleamly quote request — ' . $first . ' ' . $last;
$body = "New quote enquiry\n\n"
    . "Name: {$first} {$last}\n"
    . "Email: {$email}\n"
    . "Phone: {$phone}\n"
    . "Service: {$service}\n"
    . "Postcode: {$postcode}\n"
    . "Preferred date: {$preferred}\n"
    . "Message:\n{$message}\n"
    . "Photos: " . (count($savedFiles) ? implode(', ', $savedFiles) : 'none') . "\n";
@mail(SITE_EMAIL, $subject, $body, 'From: noreply@gleamly.uk' . "\r\n" . 'Reply-To: ' . $email);

$wantsJson = str_contains($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json')
    || (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');

if ($wantsJson) {
    echo json_encode(['ok' => true, 'redirect' => url('thank-you.php')]);
    exit;
}

header('Location: ' . url('thank-you.php'));
exit;
