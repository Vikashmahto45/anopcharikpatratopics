<?php
/**
 * Dynamic XML Sitemap
 * Auto-generates sitemap with all post URLs (STRICT HARDCODED DOMAIN)
 */

require_once 'config.php';
require_once 'includes/functions.php';

// STRICT HARDCODED LIVE DOMAIN
$sitemap_live_domain = 'https://anopcharikpatratopics.in';

// Set XML content type
header('Content-Type: application/xml; charset=utf-8');

// Get all posts
$posts = get_all_posts($pdo);
$categories = get_all_categories($pdo);

// Start XML
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// 1. Homepage
echo "    <url>\n";
echo "        <loc>" . $sitemap_live_domain . "/</loc>\n";
echo "        <lastmod>" . date('Y-m-d') . "</lastmod>\n";
echo "        <changefreq>daily</changefreq>\n";
echo "        <priority>1.0</priority>\n";
echo "    </url>\n";

// 2. Categories
foreach ($categories as $category) {
    // Ensure safe URL encoding
    $encoded_cat = rawurlencode($category['slug']);
    echo "    <url>\n";
    echo "        <loc>" . $sitemap_live_domain . "/category/" . $encoded_cat . "</loc>\n";
    echo "        <lastmod>" . date('Y-m-d') . "</lastmod>\n";
    echo "        <changefreq>weekly</changefreq>\n";
    echo "        <priority>0.8</priority>\n";
    echo "    </url>\n";
}

// 3. Posts
foreach ($posts as $post) {
    // Ensure safe URL encoding
    $encoded_post = rawurlencode($post['slug']);
    // Fallback date if updated_at is missing
    $last_mod_date = !empty($post['updated_at']) ? date('Y-m-d', strtotime($post['updated_at'])) : date('Y-m-d', strtotime($post['created_at']));
    
    echo "    <url>\n";
    echo "        <loc>" . $sitemap_live_domain . "/" . $encoded_post . "</loc>\n";
    echo "        <lastmod>" . $last_mod_date . "</lastmod>\n";
    echo "        <changefreq>monthly</changefreq>\n";
    echo "        <priority>0.7</priority>\n";
    echo "    </url>\n";
}

echo "</urlset>\n";
?>