<?php
/**
 * Anopcharik Patra Topics - Configuration File
 * Database connection and site constants
 */

// Error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'anopcharik_patra');
define('DB_CHARSET', 'utf8mb4');

// API Keys removed

// Define your live site URL (Always use HTTPS in production)
define('BASE_URL', 'https://anopcharikpatratopics.in'); 
define('IS_LOCAL', false); // Set to true only during local development

// Site Constants
define('SITE_NAME', 'Anopcharik Patra Topics - अनौपचारिक पत्र विषय');
define('SITE_TITLE', 'अनौपचारिक पत्र के उदाहरण | Informal Letter in Hindi | Anopcharik Patra Topics');
define('SITE_DESC', 'Anopcharik Patra Topics - CBSE और ICSE बोर्ड परीक्षाओं के लिए हिंदी में अनौपचारिक पत्र लेखन के 100+ विषय, प्रारूप और उदाहरण। पिता, माता, मित्र, भाई-बहन को पत्र कैसे लिखें।');

// Database Connection
try {
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
} catch (PDOException $e) {
    die("Database connection failed. Please run db_schema.sql first.");
}

// Helper function to get full URL
function url($path = '')
{
    $base = rtrim(BASE_URL, '/');
    if (empty($path)) {
        return $base . '/';
    }

    // Separate fragment (#) and query (?) if present before encoding path
    $fragment = '';
    if (($pos = strpos($path, '#')) !== false) {
        $fragment = substr($path, $pos);
        $path = substr($path, 0, $pos);
    }

    $query = '';
    if (($pos = strpos($path, '?')) !== false) {
        $query = substr($path, $pos);
        $path = substr($path, 0, $pos);
    }
    
    // Encode path segments to handle spaces, but keep slashes
    $segments = explode('/', ltrim($path, '/'));
    $encoded_segments = array_map('rawurlencode', $segments);
    
    $final_path = implode('/', $encoded_segments);
    if (!empty($final_path) || strpos($path, '/') === 0) {
        $final_path = '/' . $final_path;
    }

    return $base . '/' . ltrim($final_path, '/') . $query . $fragment;
}

// Helper function to get post URL
function post_url($slug)
{
    return url($slug . '/');
}

// Helper function to get category URL  
function category_url($slug)
{
    return url('category/' . $slug . '/');
}
?>