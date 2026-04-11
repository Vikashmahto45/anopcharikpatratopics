<?php
/**
 * header.php
 * Included at the top of every physical page.
 */
require_once __DIR__ . '/config.php';

$current_filename = basename($_SERVER['PHP_SELF']);
$current_seo = get_seo_data($pdo, $current_filename);
?>
<!DOCTYPE html>
<html lang="hi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($current_seo['meta_description']); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($current_seo['meta_keywords']); ?>">
    <title><?php echo htmlspecialchars($current_seo['meta_title']); ?></title>

    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo url($current_filename === 'index.php' ? '' : $current_filename); ?>">

    <!-- Branding Assets -->
    <link rel="icon" type="image/png" href="<?php echo url('img/favicon.png'); ?>">
    <link rel="apple-touch-icon" href="<?php echo url('img/favicon.png'); ?>">

    <!-- Open Graph (Facebook/WhatsApp/LinkedIn) -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo url($current_filename === 'index.php' ? '' : $current_filename); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($current_seo['meta_title']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($current_seo['meta_description']); ?>">
    <meta property="og:image" content="<?php echo url('img/logo.png'); ?>">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo url($current_filename === 'index.php' ? '' : $current_filename); ?>">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($current_seo['meta_title']); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($current_seo['meta_description']); ?>">
    <meta name="twitter:image" content="<?php echo url('img/logo.png'); ?>">

    <link rel="stylesheet" href="<?php echo url('css/style.css'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800&display=swap" rel="stylesheet">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5732057974916980"
        crossorigin="anonymous"></script>
</head>

<body>

    <header class="site-header">
        <div class="container header-contents">
            <a href="<?php echo url(); ?>" class="site-logo">
                <img src="<?php echo url('img/logo.png'); ?>" alt="Patra Topics Logo"
                    style="height: 45px; margin-right: 10px;">
                <span>Patra<span style="color: var(--accent-light);">Topics</span></span>
            </a>
            <nav class="header-nav">
                <ul>
                    <li><a href="<?php echo url(); ?>">Home</a></li>
                    <li><a href="<?php echo url('#foundation'); ?>">Foundation</a></li>
                    <li><a href="<?php echo url('#format'); ?>">Master Format</a></li>
                    <li><a href="<?php echo url('#topics'); ?>">Topic Library</a></li>
                    <li><a href="<?php echo url('#examples'); ?>">Master Bank</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="site-main">