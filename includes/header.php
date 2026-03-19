<?php
/**
 * Site Header - Anopcharik Patra Topics
 */
?>
<!DOCTYPE html>
<html lang="hi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- SEO Meta Tags -->
    <title>
        <?php echo isset($page_title) ? $page_title . ' | ' . SITE_NAME : SITE_TITLE; ?>
    </title>
    <meta name="description" content="<?php echo isset($page_desc) ? $page_desc : SITE_DESC; ?>">
    <meta name="keywords"
        content="<?php echo isset($page_keywords) ? $page_keywords : 'anopcharik patra topics, अनौपचारिक पत्र, informal letter hindi, patra lekhan, anopcharik patra format, anopcharik patra lekhan, class 10 letter writing, CBSE letter format, ICSE patra lekhan, hindi letter writing'; ?>">
    <meta name="author" content="Anopcharik Patra Topics">
    <meta name="robots" content="<?php echo isset($page_robots) ? $page_robots : 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1'; ?>">
    <meta name="googlebot" content="index, follow">
    <meta name="language" content="Hindi">
    <meta name="revisit-after" content="3 days">

    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo isset($page_title) ? $page_title : SITE_TITLE; ?>">
    <meta property="og:description" content="<?php echo isset($page_desc) ? $page_desc : SITE_DESC; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo isset($canonical_url) ? $canonical_url : url(); ?>">
    <meta property="og:locale" content="hi_IN">
    <meta property="og:site_name" content="Anopcharik Patra Topics">
    <meta property="og:image" content="<?php echo isset($page_image) ? $page_image : url('images/favicon.png'); ?>">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo isset($page_title) ? $page_title : SITE_TITLE; ?>">
    <meta name="twitter:description" content="<?php echo isset($page_desc) ? $page_desc : SITE_DESC; ?>">
    <meta name="twitter:image" content="<?php echo isset($page_image) ? $page_image : url('images/favicon.png'); ?>">

    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo isset($canonical_url) ? $canonical_url : url(); ?>">

    <!-- Google Fonts - Noto Sans Devanagari -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo url('css/style.css'); ?>?v=<?php echo time(); ?>">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo url('images/favicon.png'); ?>">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "Anopcharik Patra Topics",
        "alternateName": "अनौपचारिक पत्र विषय",
        "url": "<?php echo url(); ?>",
        "description": "<?php echo isset($page_desc) ? $page_desc : SITE_DESC; ?>",
        "inLanguage": "hi",
        "publisher": {
            "@type": "Organization",
            "name": "Anopcharik Patra Topics",
            "url": "<?php echo url(); ?>"
        },
        "potentialAction": {
            "@type": "SearchAction",
            "target": "<?php echo url(); ?>?s={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>
</head>

<body>
    <!-- Header -->
    <header class="site-header">
        <div class="container">
            <div class="header-content">
                <!-- Logo -->
                <a href="<?php echo url(); ?>" title="Anopcharik Patra Topics Home" class="logo">
                    <span class="logo-icon">✉️</span>
                    <span class="logo-text">Anopcharik Patra Topics</span>
                </a>


                <!-- Navigation Toggle (Mobile) -->
                <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <!-- Navigation -->
                <nav class="main-nav" id="mainNav">
                    <ul class="nav-menu">
                        <li><a href="<?php echo url(); ?>" title="होम पेज" class="nav-link">होम</a></li>
                        <li class="has-dropdown">
                            <a href="#" title="विषय श्रेणियाँ" class="nav-link">विषय श्रेणियाँ <span class="dropdown-arrow">▼</span></a>
                            <ul class="dropdown-menu">
                                <?php
                                $categories = get_all_categories($pdo);
                                foreach ($categories as $cat):
                                    ?>
                                    <li><a href="<?php echo category_url($cat['slug']); ?>" title="<?php echo htmlspecialchars($cat['name']); ?> के पत्र">
                                            <?php echo $cat['name']; ?>
                                        </a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li><a href="<?php echo url('#format'); ?>" title="पत्र का प्रारूप" class="nav-link">पत्र प्रारूप</a></li>
                        <li><a href="<?php echo url('#about'); ?>" title="हमारे बारे में" class="nav-link">हमारे बारे में</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content Wrapper -->
    <main class="site-main">