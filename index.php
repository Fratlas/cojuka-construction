<?php
/**
 * Hostinger shared hosting entry point.
 * Prefer configuring the domain document root to /public when available.
 * This wrapper delegates to Laravel's canonical public/index.php.
 */
require __DIR__ . '/public/index.php';
