<?php
/**
 * scripts/breadcrumb_rollout.php
 * Bulk rollout of breadcrumbs and CSS path fixes.
 */

$dir = dirname(__DIR__);
$files = glob($dir . "/*.php");

foreach ($files as $file) {
    $filename = basename($file);

    // Skip hubs and meta pages
    if (in_array($filename, ['index.php', 'literature-academy.php', 'patra-lekhan-academy.php', 'all-pages.php', 'about.php', 'contact.php'])) {
        continue;
    }

    $content = file_get_contents($file);
    $original = $content;

    // 1. Fix CSS path if assets/ is present
    $content = str_replace('assets/css/style.css', 'css/style.css', $content);

    // 2. Identify Hub for Breadcrumb
    $parent_name = "Home";
    $parent_url = "index.php";
    $hub_name = "";
    $hub_url = "";

    if (strpos($filename, '-summary.php') !== false) {
        $hub_name = "Literature Academy";
        $hub_url = "literature-academy.php";
    } elseif (strpos($filename, 'anopcharik') !== false || strpos($filename, 'patra') !== false) {
        $hub_name = "Patra Lekhan Academy";
        $hub_url = "patra-lekhan-academy.php";
    }

    if ($hub_name) {
        $topic_title = "";
        if (preg_match('/<title>(.*?)<\/title>/', $content, $matches)) {
            $topic_title = explode(':', $matches[1])[0];
            $topic_title = trim(str_replace(['Summary', 'Class 10', 'Class 12', 'Class 9'], '', $topic_title));
        }

        $breadcrumb_html = "\n        <div class=\"breadcrumb-wrap\">\n            <a href=\"index.php\">Home</a> <span>&rsaquo;</span>\n            <a href=\"$hub_url\">$hub_name</a> <span>&rsaquo;</span>\n            $topic_title\n        </div>\n";

        // Insert after header include or deep-dive-wrap start
        if (strpos($content, '<div class="deep-dive-wrap">') !== false) {
            $content = str_replace('<div class="deep-dive-wrap">', "<div class=\"deep-dive-wrap\">" . $breadcrumb_html, $content);
        } elseif (strpos($content, '<div class="content-wrapper">') !== false) {
            $content = str_replace('<div class="content-wrapper">', "<div class=\"content-wrapper\">" . $breadcrumb_html, $content);
        }
    }

    if ($content !== $original) {
        file_put_contents($file, $content);
        echo "Updated: $filename\n";
    }
}
echo "Rollout Complete.\n";
