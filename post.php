<?php
/**
 * Post Page - Individual Letter Topic
 * Displays full letter content with SEO optimization
 */

require_once 'config.php';
require_once 'includes/functions.php';

// --- Quality Gate ---
// Check post ID using slug
$check_sql = "SELECT id FROM posts WHERE slug = :slug";
$check_stmt = $pdo->prepare($check_sql);
$check_stmt->execute(['slug' => $_GET['slug'] ?? '']);
$p_id = $check_stmt->fetchColumn();

// If ID > 4440 or not found, 301 redirect to homepage to protect AdSense
if (!$p_id || $p_id > 4440) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . url());
    exit;
}
// --------------------

// Get slug from URL
$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';

if (empty($slug)) {
    header('Location: ' . url());
    exit;
}

// Get post by slug
$post = get_post_by_slug($pdo, $slug);

if (!$post) {
    // Post not found - show 404
    http_response_code(404);
    include '404.php';
    exit;
}

// Page Meta from database
$page_title = $post['meta_title'] ?: $post['title'];
$page_desc = $post['meta_desc'] ?: truncate_text(strip_tags($post['content']), 160);
$page_keywords = $post['keywords'] ? $post['keywords'] . ', anopcharik patra topics' : 'anopcharik patra topics, अनौपचारिक पत्र, ' . $post['title'];
$canonical_url = post_url($post['slug']);

// Set page image (featured image or default favicon)
$page_image = !empty($post['featured_image']) ? url($post['featured_image']) : url('images/favicon.png');

// Get related posts
$related_posts = get_related_posts($pdo, $post['category'], $post['slug'], 4);

// Get category info
$category = get_category_by_slug($pdo, $post['category']);

include 'includes/header.php';
?>

<!-- Article Structured Data -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": "<?php echo htmlspecialchars($post['title']); ?>",
    "description": "<?php echo htmlspecialchars($page_desc); ?>",
    "datePublished": "<?php echo date('c', strtotime($post['created_at'])); ?>",
    "dateModified": "<?php echo date('c', strtotime($post['updated_at'] ?? $post['created_at'])); ?>",
    "author": {
        "@type": "Organization",
        "name": "Anopcharik Patra Topics"
    },
    "publisher": {
        "@type": "Organization",
        "name": "Anopcharik Patra Topics",
        "url": "<?php echo url(); ?>"
    },
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?php echo $canonical_url; ?>"
    },
    "inLanguage": "hi",
    "keywords": "<?php echo htmlspecialchars($page_keywords); ?>"
}
</script>

<!-- Breadcrumb -->
<nav class="breadcrumb">
    <div class="container">
        <ol class="breadcrumb-list" itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="<?php echo url(); ?>" title="होम"><span itemprop="name">होम</span></a>
                <meta itemprop="position" content="1" />
            </li>
            <?php if ($category): ?>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="<?php echo category_url($category['slug']); ?>" title="<?php echo htmlspecialchars($category['name']); ?>"><span itemprop="name">
                            <?php echo $category['name']; ?>
                        </span></a>
                    <meta itemprop="position" content="2" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span itemprop="name">
                        <?php echo truncate_text($post['title'], 50); ?>
                    </span>
                    <meta itemprop="position" content="3" />
                </li>
            <?php else: ?>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span itemprop="name">
                        <?php echo truncate_text($post['title'], 50); ?>
                    </span>
                    <meta itemprop="position" content="2" />
                </li>
            <?php endif; ?>
        </ol>
    </div>
</nav>

<!-- Main Content -->
<section class="section">
    <div class="container">
        <div class="content-with-sidebar">
            <!-- Main Article -->
            <article class="post-content" itemscope itemtype="https://schema.org/Article">
                <!-- Post Header -->
                <header class="post-header">
                    <h1 class="post-title" itemprop="headline">
                        <?php echo htmlspecialchars($post['title']); ?>
                    </h1>

                    <div class="post-meta">
                        <?php if ($category): ?>
                            <span class="post-category">
                                <a href="<?php echo category_url($category['slug']); ?>" title="<?php echo htmlspecialchars($category['name']); ?>">
                                    <?php echo $category['name']; ?>
                                </a>
                            </span>
                        <?php endif; ?>
                        <span class="post-date" itemprop="datePublished"
                            content="<?php echo date('Y-m-d', strtotime($post['created_at'])); ?>">
                            <?php echo format_date_hindi($post['created_at']); ?>
                        </span>
                    </div>
                </header>

                <!-- Post Body -->
                <div class="post-body" itemprop="articleBody">
                    <?php echo $post['content']; ?>
                </div>

                <!-- Share Buttons -->
                <div class="share-buttons">
                    <span>इस पत्र को शेयर करें:</span>
                    <a href="https://wa.me/?text=<?php echo urlencode($post['title'] . ' - ' . post_url($post['slug'])); ?>"
                        title="Share on WhatsApp" target="_blank" class="share-btn whatsapp">WhatsApp</a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(post_url($post['slug'])); ?>"
                        title="Share on Facebook" target="_blank" class="share-btn facebook">Facebook</a>
                    <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode($post['title']); ?>&url=<?php echo urlencode(post_url($post['slug'])); ?>"
                        title="Share on Twitter" target="_blank" class="share-btn twitter">Twitter</a>
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="sidebar">
                <!-- Related Posts -->
                <?php if (count($related_posts) > 0): ?>
                    <div class="sidebar-widget">
                        <h4>संबंधित पत्र विषय</h4>
                        <?php foreach ($related_posts as $related): ?>
                            <a href="<?php echo post_url($related['slug']); ?>" title="<?php echo htmlspecialchars($related['title']); ?>" class="related-post-item">
                                <?php echo htmlspecialchars($related['title']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Categories Widget -->
                <div class="sidebar-widget">
                    <h4>पत्र श्रेणियाँ</h4>
                    <?php
                    $all_categories = get_all_categories($pdo);
                    foreach ($all_categories as $cat):
                        ?>
                        <a href="<?php echo category_url($cat['slug']); ?>" title="<?php echo htmlspecialchars($cat['name']); ?> के विषय" class="related-post-item">
                            <?php echo $cat['name']; ?> (
                            <?php echo count_posts_in_category($pdo, $cat['slug']); ?>)
                        </a>
                    <?php endforeach; ?>
                </div>

                <!-- Quick Tips Widget -->
                <div class="sidebar-widget">
                    <h4>परीक्षा टिप्स</h4>
                    <ul style="padding-left: 1.2rem; line-height: 2;">
                        <li>प्रारूप का सही पालन करें</li>
                        <li>संबोधन और अभिवादन सही लिखें</li>
                        <li>भाषा सरल और शुद्ध रखें</li>
                        <li>समापन उचित तरीके से करें</li>
                        <li>शब्द सीमा का ध्यान रखें</li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>

<style>
    /* Post Page Specific Styles */
    .post-header {
        margin-bottom: var(--spacing-2xl);
        padding-bottom: var(--spacing-lg);
        border-bottom: 2px solid var(--color-saffron);
    }

    .post-title {
        font-size: 2.2rem;
        color: var(--color-navy);
        margin-bottom: var(--spacing-md);
    }

    .post-meta {
        display: flex;
        gap: var(--spacing-lg);
        color: var(--color-gray);
        font-size: 0.95rem;
    }

    .post-category a {
        background: var(--color-gold-light);
        color: var(--color-navy);
        padding: var(--spacing-xs) var(--spacing-sm);
        border-radius: var(--radius-sm);
    }

    .post-body {
        font-size: 1.1rem;
        line-height: 2;
    }

    .post-body h2 {
        margin-top: var(--spacing-2xl);
        margin-bottom: var(--spacing-md);
        color: var(--color-navy);
        border-left: 4px solid var(--color-saffron);
        padding-left: var(--spacing-md);
    }

    .post-body h3 {
        margin-top: var(--spacing-xl);
        color: var(--color-navy-light);
    }

    .post-body ul,
    .post-body ol {
        margin: var(--spacing-md) 0;
        padding-left: var(--spacing-xl);
    }

    .post-body li {
        margin-bottom: var(--spacing-sm);
    }

    .share-buttons {
        margin-top: var(--spacing-2xl);
        padding-top: var(--spacing-lg);
        border-top: 1px solid var(--color-light-gray);
        display: flex;
        align-items: center;
        gap: var(--spacing-md);
        flex-wrap: wrap;
    }

    .share-btn {
        padding: var(--spacing-sm) var(--spacing-md);
        border-radius: var(--radius-md);
        color: white;
        font-weight: 500;
        font-size: 0.9rem;
    }

    .share-btn.whatsapp {
        background: #25D366;
    }

    .share-btn.facebook {
        background: #1877F2;
    }

    .share-btn.twitter {
        background: #1DA1F2;
    }

    .share-btn:hover {
        opacity: 0.9;
        color: white;
    }
</style>

<?php include 'includes/footer.php'; ?>