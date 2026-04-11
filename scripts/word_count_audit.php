<?php
/**
 * scripts/word_count_audit.php
 */
$dir = dirname(__DIR__);
$files = glob($dir . "/*-summary.php");

echo "Word Count Audit (Literature Chapters)\n";
echo "--------------------------------------\n";

$below_threshold = 0;
foreach ($files as $file) {
    $content = file_get_contents($file);
    $text = strip_tags($content);
    $count = str_word_count($text);

    if ($count < 800) { // 800-1000 range for safety
        echo "[WARNING] " . basename($file) . " -> $count words\n";
        $below_threshold++;
    }
}

echo "\nAudit Complete. Files below threshold: $below_threshold\n";
?>