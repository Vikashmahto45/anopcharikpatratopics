<?php
/**
 * scripts/metadata_audit.php
 * Scan for missing or duplicate metadata across 113 URLs.
 */

$dir = dirname(__DIR__);
$files = glob($dir . "/*.php");

$audit_results = [];
$titles = [];
$descriptions = [];

foreach ($files as $file) {
    $filename = basename($file);
    if (in_array($filename, ['config.php', 'sitemap.php', '.php']))
        continue;

    $content = file_get_contents($file);

    $title = "";
    if (preg_match('/<title>(.*?)<\/title>/', $content, $matches)) {
        $title = $matches[1];
    }

    $desc = "";
    if (preg_match('/<meta name="description" content="(.*?)"/i', $content, $matches)) {
        $desc = $matches[1];
    }

    $entry = [
        'filename' => $filename,
        'title' => $title,
        'desc' => $desc,
        'status' => 'OK'
    ];

    if (empty($title))
        $entry['status'] = 'MISSING_TITLE';
    if (empty($desc))
        $entry['status'] = 'MISSING_DESC';
    if (strlen($desc) < 50)
        $entry['status'] = 'THIN_DESC';

    // Check for duplicates
    if (!empty($title)) {
        if (isset($titles[$title])) {
            $entry['status'] = 'DUPLICATE_TITLE';
        }
        $titles[$title][] = $filename;
    }

    $audit_results[] = $entry;
}

// Print summary
$issues = array_filter($audit_results, function ($e) {
    return $e['status'] !== 'OK'; });

echo "Audit Complete. Total Files Scanned: " . count($audit_results) . "\n";
echo "Issues Found: " . count($issues) . "\n\n";

foreach ($issues as $issue) {
    echo "[" . $issue['status'] . "] " . $issue['filename'] . " -> " . $issue['title'] . "\n";
}
