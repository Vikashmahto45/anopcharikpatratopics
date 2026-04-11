<?php
/**
 * scripts/rebuild_all_pages.php
 * Final reconciliation of all-pages.php directory.
 */
require_once dirname(__DIR__) . '/includes/config.php';

$dir = dirname(__DIR__);
$files = glob($dir . "/*.php");

$letters = [];
$literature = [];
$utilities = [];
$hubs = [];

foreach ($files as $file) {
    $filename = basename($file);
    if (in_array($filename, ['all-pages.php', 'config.php', 'sitemap.php', '.php']))
        continue;

    // Fetch Title from DB
    $stmt = $pdo->prepare("SELECT meta_title FROM seo_pages WHERE page_filename = ?");
    $stmt->execute([$filename]);
    $title = $stmt->fetchColumn();

    if (!$title) {
        $title = ucwords(str_replace(['.php', '-'], ['', ' '], $filename));
    } else {
        $title = explode(':', $title)[0]; // Clean up class/exam markers
    }

    if (strpos($filename, '-summary.php') !== false) {
        $literature[] = ['url' => $filename, 'title' => $title];
    } elseif (strpos($filename, 'academy') !== false || in_array($filename, ['character-comparison.php', 'interactive-format-switcher.php', 'mcq-practice-engine.php'])) {
        $utilities[] = ['url' => $filename, 'title' => $title];
    } elseif (strpos($filename, 'patra') !== false) {
        $letters[] = ['url' => $filename, 'title' => $title];
    } else {
        $hubs[] = ['url' => $filename, 'title' => $title];
    }
}

// Build the HTML
$html = '<?php require_once __DIR__ . "/includes/header.php"; ?>' . "\n";
$html .= '<div class="content-wrapper">' . "\n";
$html .= '    <h1 class="article-title" style="text-align: center; margin-bottom: 40px;">Academy Master Directory</h1>' . "\n";

// Utilities Section
$html .= '    <h2 style="color: var(--brand-dark); margin-bottom: 20px;">Interactive Utilities & Hubs</h2>' . "\n";
$html .= '    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 15px; margin-bottom: 50px;">' . "\n";
foreach ($utilities as $u) {
    $html .= "        <a href=\"<?php echo url('{$u['url']}'); ?>\" class=\"directory-link\">{$u['title']}</a>\n";
}
foreach ($hubs as $h) {
    $html .= "        <a href=\"<?php echo url('{$h['url']}'); ?>\" class=\"directory-link\">{$h['title']}</a>\n";
}
$html .= '    </div>' . "\n";

// Letters Section
$html .= '    <h2 style="color: var(--brand-dark); margin-bottom: 20px;">Hindi Letter Writing Guides (34 Topics)</h2>' . "\n";
$html .= '    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 15px; margin-bottom: 50px;">' . "\n";
foreach ($letters as $l) {
    $html .= "        <a href=\"<?php echo url('{$l['url']}'); ?>\" class=\"directory-link\">{$l['title']}</a>\n";
}
$html .= '    </div>' . "\n";

// Literature Section
$html .= '    <h2 style="color: var(--brand-dark); margin-bottom: 20px;">Literature Academy Deep-Dives (65 Chapters)</h2>' . "\n";
$html .= '    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 15px;">' . "\n";
foreach ($literature as $lit) {
    $html .= "        <a href=\"<?php echo url('{$lit['url']}'); ?>\" class=\"directory-link\">{$lit['title']}</a>\n";
}
$html .= '    </div>' . "\n";

$html .= '</div>' . "\n";
$html .= '<style>.directory-link{display:block;background:#fff;padding:15px;border-radius:12px;border:1px solid #e2e8f0;text-decoration:none;color:var(--text-dark);font-weight:600;transition:all 0.3s;text-align:center;font-size:0.9rem;}.directory-link:hover{transform:translateY(-3px);box-shadow:0 10px 15px -3px rgba(0,0,0,0.1);border-color:var(--brand-primary);color:var(--brand-primary);}</style>' . "\n";
$html .= '<?php require_once __DIR__ . "/includes/footer.php"; ?>';

file_put_contents($dir . "/all-pages.php", $html);
echo "Rebuilt all-pages.php with " . (count($letters) + count($literature) + count($utilities) + count($hubs)) . " URLs.\n";
