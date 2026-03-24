<?php
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Strip query string and get the path
$path = $uri;

// Map .aspx and .ashx and .html extensions to their PHP counterparts
$path = preg_replace('/\.aspx$/i', '.php', $path);
$path = preg_replace('/\.ashx$/i', '.php', $path);
$path = preg_replace('/\.html$/i', '.php', $path);

$file = __DIR__ . $path;

// If the exact file exists, serve it
if (is_file($file)) {
    // Let PHP handle .php files natively
    if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
        require $file;
    } else {
        return false; // Let PHP serve static files
    }
    return;
}

// Try appending .php if no extension
if (!pathinfo($path, PATHINFO_EXTENSION)) {
    $phpFile = __DIR__ . rtrim($path, '/') . '.php';
    if (is_file($phpFile)) {
        require $phpFile;
        return;
    }
    // Try index.php inside directory
    $indexFile = __DIR__ . rtrim($path, '/') . '/index.php';
    if (is_file($indexFile)) {
        require $indexFile;
        return;
    }
}

// Return 404 for unmatched requests
http_response_code(404);
echo "404 Not Found";
