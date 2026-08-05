<?php
/**
 * Vercel front controller — single serverless function for Hobby plan limits.
 */
declare(strict_types=1);

$root = dirname(__DIR__);
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$path = rawurldecode($path);
$path = '/' . trim($path, '/');
if ($path === '/') {
    $path = '/index.php';
}

$candidate = $root . $path;
$file = null;

if (is_dir($candidate) && is_file($candidate . '/index.php')) {
    $file = $candidate . '/index.php';
} elseif (is_file($candidate)) {
    $file = $candidate;
} elseif (is_file($candidate . '.php')) {
    $file = $candidate . '.php';
} else {
    $file = $root . '/404.php';
    http_response_code(404);
}

$rootReal = realpath($root);
$real = realpath($file);

if (
    $real === false
    || $rootReal === false
    || !str_starts_with($real, $rootReal)
    || !str_ends_with(strtolower($real), '.php')
    || $real === realpath(__FILE__)
) {
    http_response_code(404);
    require $root . '/404.php';
    exit;
}

require $real;
