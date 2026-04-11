<?php
/**
 * scripts/generate_sitemap.php
 * Automated sitemap generation for 99+ pages.
 */

$domain = "https://anopcharikpatratopics.in/";
$dir = dirname(__DIR__);
$files = glob($dir . "/*.php");

$sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

foreach ($files as $file) {
    $filename = basename($file);

    // Skip system files and private directories
    if (in_array($filename, ['config.php', 'sitemap.php', '.php']) || strpos($filename, '_') === 0) {
        continue;
    }

    $url = $domain . ($filename === 'index.php' ? '' : $filename);
    $lastmod = date('Y-m-d', filemtime($file));

    $priority = 0.8;
    if ($filename === 'index.php')
        $priority = 1.0;
    elseif (strpos($filename, 'academy') !== false)
        $priority = 0.9;
    elseif (strpos($filename, '-summary') !== false)
        $priority = 0.85;

    $sitemap .= "  <url>\n";
    $sitemap .= "    <loc>$url</loc>\n";
    $sitemap .= "    <lastmod>$lastmod</lastmod>\n";
    $sitemap .= "    <changefreq>weekly</changefreq>\n";
    $sitemap .= "    <priority>$priority</priority>\n";
    $sitemap .= "  </url>\n";
}

$sitemap .= '</urlset>';

file_put_contents($dir . "/sitemap.xml", $sitemap);
echo "Sitemap generated successfully with " . count($files) . " URLs.\n";
