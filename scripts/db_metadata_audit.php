<?php
/**
 * scripts/db_metadata_audit.php
 * Check which pages are missing from the seo_pages table.
 */
require_once dirname(__DIR__) . '/includes/config.php';

$dir = dirname(__DIR__);
$files = glob($dir . "/*.php");

echo "Database Metadata Audit\n";
echo "-----------------------\n";

foreach ($files as $file) {
    $filename = basename($file);
    if (in_array($filename, ['config.php', 'sitemap.php', '.php']))
        continue;

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM seo_pages WHERE page_filename = ?");
    $stmt->execute([$filename]);
    $exists = $stmt->fetchColumn();

    if (!$exists) {
        echo "[MISSING] $filename\n";
    }
}
?>