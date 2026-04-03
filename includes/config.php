<?php
/**
 * Core PHP Configuration
 * Focused on establishing DB connections for manual SEO metadata management.
 */

// Error reporting for dev phase
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database Credentials
if (php_sapi_name() === 'cli' || (isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1'))) {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'anopcharik_patra');
    define('BASE_URL', 'https://localhost/anopcharik%20patra%20topics'); 
} else {
    define('DB_HOST', 'localhost'); 
    define('DB_USER', 'u823814640_Rkmehta123123');
    define('DB_PASS', '|t7I$cw3&');
    define('DB_NAME', 'u823814640_Rkmehta123123');
    define('BASE_URL', 'https://anopcharikpatratopics.in'); 
}

// Ensure clean URL logic 
if (!function_exists('url')) {
    function url($path = '') {
        $domain = rtrim(BASE_URL, '/');
        $path = ltrim($path, '/');
        if (empty($path)) return $domain . '/';
        return $domain . '/' . $path;
    }
}

// Database Connection
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER, DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    if (php_sapi_name() !== 'cli') {
        die("Database connection failed. Ensure the 'anopcharik_patra' DB exists.");
    }
}

/**
 * Fetch SEO Data for the current physically requested page.
 */
function get_seo_data($pdo, $filename) {
    $stmt = $pdo->prepare("SELECT meta_title, meta_description, meta_keywords FROM seo_pages WHERE page_filename = ? LIMIT 1");
    $stmt->execute([$filename]);
    $data = $stmt->fetch();
    
    // Fallbacks if not yet in DB
    if (!$data) {
        return [
            'meta_title' => 'Anopcharik Patra Topics - अनौपचारिक पत्र विषय',
            'meta_description' => 'Comprehensive guide and 1,000+ word detailed examples on writing informal letters in Hindi and English.',
            'meta_keywords' => 'anopcharik patra topics, hindi letter writing, informal letter format'
        ];
    }
    return $data;
}
?>
