<?php
/**
 * Gleamly site configuration
 */
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('SITE_NAME', 'Gleamly');
define('SITE_TAGLINE', 'Your all-in-one cleaning services');

// Auto-detect public URL (localhost / Vercel / custom domain)
$__scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https')
    ? 'https'
    : 'http';
$__host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$__isLocal = str_contains($__host, 'localhost') || str_contains($__host, '127.0.0.1');
$__base = $__scheme . '://' . $__host . ($__isLocal ? '/gleamly' : '');
// Prefer explicit production override when set
if (getenv('SITE_URL')) {
    $__base = rtrim((string) getenv('SITE_URL'), '/');
}
define('SITE_URL', $__base);

define('SITE_EMAIL', 'info@gleamly.uk');
define('SITE_PHONE', '07356 089 122');
define('SITE_PHONE_TEL', '+447356089122');
define('SITE_WHATSAPP', '447356089122');
define('SITE_AREA', 'East and Southeast London');
define('SITE_NAP_ADDRESS', 'East & Southeast London, UK');

// Admin credentials — change after first login
define('ADMIN_USER', 'admin');
define('ADMIN_PASS_HASH', '$2y$10$e0fNVwCf20HJuWo6.A37HeHwJN3U.jyX9udwxbrH6r7Wr7kVB6P2C'); // Default: gleamly2026

// Vercel serverless FS is read-only except /tmp
$__writable = getenv('VERCEL') ? (rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR) . '/gleamly') : dirname(__DIR__);
define('DATA_DIR', $__writable . '/data');
define('UPLOAD_DIR', $__writable . '/uploads');
define('MAX_UPLOAD_BYTES', 5 * 1024 * 1024); // 5MB

// Pricing baselines for estimator (non-binding)
define('PRICE_HOME_BASE', 150);
define('PRICE_DEEP_BASE', 300);
define('PRICE_BUSINESS_BASE', 200);
define('PRICE_END_TENANCY_BASE', 300);
define('PRICE_OTHER_BASE', 100);

function e(string $str): string
{
    return htmlspecialchars($str, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function asset(string $path): string
{
    return rtrim(SITE_URL, '/') . '/assets/' . ltrim($path, '/');
}

function url(string $path = ''): string
{
    $path = ltrim($path, '/');
    return rtrim(SITE_URL, '/') . ($path !== '' ? '/' . $path : '');
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf(?string $token): bool
{
    return is_string($token)
        && isset($_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $token);
}

function is_admin(): bool
{
    return !empty($_SESSION['admin_logged_in']);
}

function ensure_data_files(): void
{
    if (!is_dir(DATA_DIR)) {
        @mkdir(DATA_DIR, 0755, true);
    }
    if (!is_dir(UPLOAD_DIR)) {
        @mkdir(UPLOAD_DIR, 0755, true);
    }
    $quotes = DATA_DIR . '/quotes.json';
    if (!file_exists($quotes)) {
        @file_put_contents($quotes, '[]');
    }
}

ensure_data_files();
