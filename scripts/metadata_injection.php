<?php
/**
 * scripts/metadata_injection.php
 * Bulk inject unique SEO metadata for 113 active URLs.
 */
require_once dirname(__DIR__) . '/includes/config.php';

$dir = dirname(__DIR__);
$files = glob($dir . "/*.php");

echo "Injecting Metadata...\n";

foreach ($files as $file) {
    $filename = basename($file);
    if (in_array($filename, ['config.php', 'sitemap.php', '.php']))
        continue;

    // Check if entry exists
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM seo_pages WHERE page_filename = ?");
    $stmt->execute([$filename]);
    if ($stmt->fetchColumn() > 0)
        continue;

    // Generate Metadata based on filename pattern
    $title = "";
    $desc = "";
    $keywords = "hindi letter writing, literal academy, cbse class 10 help";

    if (strpos($filename, '-summary.php') !== false) {
        $name = str_replace(['-summary.php', '-'], ['', ' '], $filename);
        $name = ucwords($name);
        $title = "$name Summary Class 10/12: Detailed Analysis & Hindi Meaning";
        $desc = "Get the complete $name summary for Class 10/12. Includes character sketches, board-exam Q&A, and detailed Hindi explanation for $name.";
        $keywords .= ", $name summary, $name character sketch";
    } elseif (strpos($filename, 'anopcharik') !== false || strpos($filename, 'patra') !== false) {
        $name = str_replace(['.php', '-'], ['', ' '], $filename);
        $name = ucwords($name);
        $title = "$name: 1,000+ Word Guide & Solved Format Examples";
        $desc = "Expert guide on $name. Explore professional formats, marking schemes, and 1,000+ word detailed examples for Class 9, 10, and 12 students.";
        $keywords .= ", $name format, $name in hindi";
    } else {
        // Fallback for hubs/other pages
        $name = ucwords(str_replace(['.php', '-'], ['', ' '], $filename));
        $title = "$name - Patra Topics Academy";
        $desc = "Access premium educational resources for $name at Patra Topics. Tailored for CBSE students seeking high-authority study materials.";
    }

    // Insert into DB
    $stmt = $pdo->prepare("INSERT INTO seo_pages (page_filename, meta_title, meta_description, meta_keywords) VALUES (?, ?, ?, ?)");
    $stmt->execute([$filename, $title, $desc, $keywords]);
    echo "Injected: $filename\n";
}

echo "Injection Complete.\n";
