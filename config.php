<?php
/**
 * Anopcharik Patra Topics - Configuration File
 * Database connection and site constants
 */

// Error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Environment detection for Database Credentials and URLs
if (php_sapi_name() === 'cli' || (isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1'))) {
    // Localhost Credentials
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'anopcharik_patra');
    define('BASE_URL', 'https://localhost/anopcharik%20patra%20topics'); 
    define('IS_LOCAL', true);
} else {
    // Live Server Credentials
    define('DB_HOST', 'localhost'); 
    define('DB_USER', 'u823814640_Rkmehta123123');
    define('DB_PASS', '|t7I$cw3&');
    define('DB_NAME', 'u823814640_Rkmehta123123');
    define('BASE_URL', 'https://anopcharikpatratopics.in'); 
    define('IS_LOCAL', false);
}
define('DB_CHARSET', 'utf8mb4');
define('MAX_HIGH_QUALITY_ID', 4440);

// Site Constants
define('SITE_NAME', 'Anopcharik Patra Topics - अनौपचारिक पत्र विषय');
define('SITE_TITLE', 'अनौपचारिक पत्र के उदाहरण | Informal Letter in Hindi | Anopcharik Patra Topics');
define('SITE_DESC', 'Anopcharik Patra Topics - CBSE और ICSE बोर्ड परीक्षाओं के लिए हिंदी में अनौपचारिक पत्र लेखन के 100+ विषय, प्रारूप और उदाहरण। पिता, माता, मित्र, भाई-बहन को पत्र कैसे लिखें।');

// Database Connection
try {
    if (!isset($pdo)) {
        $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );
    }
} catch (PDOException $e) {
    if (php_sapi_name() !== 'cli') {
        die("Database connection failed. Please check config.inc.php");
    }
}

// Helper function to get full URL (Wrapped to prevent redeclaration)
if (!function_exists('url')) {
    function url($path = '')
    {
        $domain = rtrim(BASE_URL, '/');
        $path = ltrim($path, '/');
        if (empty($path)) return $domain . '/';
        
        // Remove trailing slash if it's a file (has an extension)
        $hasExtension = preg_match('/\.[a-z0-9]{2,4}$/i', $path);
        $hasQueryOrFragment = (strpos($path, '#') !== false || strpos($path, '?') !== false);
        
        $suffix = '';
        if (!$hasExtension && !$hasQueryOrFragment) {
            $suffix = '/';
        }
        
        return $domain . '/' . $path . $suffix;
    }
}

// Helper function to get post URL
if (!function_exists('post_url')) {
    function post_url($slug)
    {
        return url($slug);
    }
}

// Helper function to get category URL  
if (!function_exists('category_url')) {
    function category_url($slug)
    {
        return url('category/' . $slug);
    }
}
?>