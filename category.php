<?php
/**
 * Category Page - List posts by category
 */

require_once 'config.php';
require_once 'includes/functions.php';

// Get category slug from URL
$cat_slug = isset($_GET['cat']) ? trim($_GET['cat']) : '';

if (empty($cat_slug)) {
    header('Location: ' . url());
    exit;
}

// Get category info
$category = get_category_by_slug($pdo, $cat_slug);

if (!$category) {
    // Category not found - show 404
    http_response_code(404);
    include '404.php';
    exit;
}

// Pagination logic
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 20;

// Get paginated posts in this category
$posts = get_paginated_posts($pdo, $cat_slug, $page, $per_page);
$total_posts = get_total_posts_count($pdo, $cat_slug);
$total_pages = ceil($total_posts / $per_page);

// Page Meta
$page_title = $category['name'] . ' - Anopcharik Patra Topics | अनौपचारिक पत्र';
$page_desc = 'Anopcharik Patra Topics - ' . $category['name'] . ' के उदाहरण और प्रारूप। CBSE और ICSE के लिए हिंदी में पत्र लेखन।';
$page_keywords = 'anopcharik patra topics, ' . $category['name'] . ', अनौपचारिक पत्र, patra lekhan, informal letter hindi';
$canonical_url = category_url($category['slug']);

include 'includes/header.php';
?>

<!-- Breadcrumb -->
<nav class="breadcrumb" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb-list" itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="<?php echo url(); ?>" title="होम"><span itemprop="name">होम</span></a>
                <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span itemprop="name"><?php echo $category['name']; ?></span>
                <meta itemprop="position" content="2" />
            </li>
        </ol>
    </div>
</nav>

<!-- Category Header Removed as per request -->
<div class="container" style="padding-top: var(--spacing-xl);">
    <h1 style="color: var(--color-navy); margin-bottom: var(--spacing-lg);"><?php echo $category['name']; ?> - Anopcharik Patra Topics</h1>
</div>


<!-- Posts Grid -->
<section class="section topics-section">
    <div class="container">
        <?php if (count($posts) > 0): ?>
            <div class="topics-grid">
                <?php foreach ($posts as $post): ?>
                    <article class="topic-card">
                        <div class="topic-card-header">
                            <span class="topic-category">
                                <?php echo $category['name']; ?>
                            </span>
                            <h3>
                                <?php echo htmlspecialchars($post['title']); ?>
                            </h3>
                        </div>
                        <div class="topic-card-body">
                            <p>
                                <?php echo truncate_text(strip_tags($post['content']), 120); ?>
                            </p>
                            <a href="<?php echo post_url($post['slug']); ?>" title="<?php echo htmlspecialchars($post['title']); ?>" class="topic-link">पूरा पत्र पढ़ें</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
            
            <?php 
            // Generate Pagination Links
            $base_cat_url = category_url($category['slug']); 
            echo generate_pagination($page, $total_pages, $base_cat_url); 
            ?>
            
        <?php else: ?>
            <div class="no-posts" style="text-align: center; padding: var(--spacing-3xl);">
                <h3>इस श्रेणी में अभी कोई पत्र उपलब्ध नहीं है।</h3>
                <p>कृपया बाद में पुनः देखें या <a href="<?php echo url(); ?>" title="होमपेज">होमपेज</a> पर जाएं।</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>