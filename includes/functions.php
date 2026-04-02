<?php
/**
 * Helper Functions for Anopcharik Patra Topics
 */

/**
 * Get all posts from database
 */
function get_all_posts($pdo, $limit = null)
{
    $sql = "SELECT * FROM posts WHERE id <= " . MAX_HIGH_QUALITY_ID . " ORDER BY created_at DESC";
    if ($limit) {
        $sql .= " LIMIT " . (int) $limit;
    }
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

/**
 * Get post by slug
 */
function get_post_by_slug($pdo, $slug)
{
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE slug = ?");
    $stmt->execute([$slug]);
    return $stmt->fetch();
}

/**
 * Get posts by category
 */
function get_posts_by_category($pdo, $category)
{
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE category = ? AND id <= " . MAX_HIGH_QUALITY_ID . " ORDER BY created_at DESC");
    $stmt->execute([$category]);
    return $stmt->fetchAll();
}

/**
 * Get all categories
 */
function get_all_categories($pdo)
{
    $stmt = $pdo->query("SELECT * FROM categories ORDER BY name");
    return $stmt->fetchAll();
}

/**
 * Get category by slug
 */
function get_category_by_slug($pdo, $slug)
{
    $stmt = $pdo->prepare("SELECT * FROM categories WHERE slug = ?");
    $stmt->execute([$slug]);
    return $stmt->fetch();
}

/**
 * Count posts in category
 */
function count_posts_in_category($pdo, $category)
{
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM posts WHERE category = ?");
    $stmt->execute([$category]);
    return $stmt->fetchColumn();
}

/**
 * Generate slug from Hindi title
 */
function generate_slug($title)
{
    // Transliteration map for Hindi to English
    $transliteration = [
        'पिता' => 'pita',
        'माता' => 'mata',
        'मित्र' => 'mitra',
        'भाई' => 'bhai',
        'बहन' => 'bahan',
        'दादा' => 'dada',
        'दादी' => 'dadi',
        'जी' => 'ji',
        'को' => 'ko',
        'पत्र' => 'patra',
        'पैसे' => 'paise',
        'जन्मदिन' => 'janmadin',
        'पढ़ाई' => 'padhai',
        'सलाह' => 'salah',
        'स्वास्थ्य' => 'swasthya',
        'परीक्षा' => 'pariksha',
        'बधाई' => 'badhai',
        'छुट्टी' => 'chhutti',
        'हॉस्टल' => 'hostel',
        'दिनचर्या' => 'dincharya',
        'गर्मी' => 'garmi',
        'निमंत्रण' => 'nimantran',
        'प्रथम' => 'pratham',
        'बोर्ड' => 'board',
        'हेतु' => 'hetu',
        'मँगवाने' => 'mangwane',
        'छोटे' => 'chote',
        'जानकारी' => 'jankari',
        'बिताने' => 'bitane',
        'बताना' => 'batana'
    ];

    $slug = $title;
    foreach ($transliteration as $hindi => $english) {
        $slug = str_replace($hindi, $english, $slug);
    }

    // Remove remaining non-alphanumeric characters and convert to lowercase
    $slug = preg_replace('/[^a-zA-Z0-9\s-]/', '', $slug);
    $slug = strtolower(trim($slug));
    $slug = preg_replace('/[\s-]+/', '-', $slug);
    $slug = preg_replace('/-+/', '-', $slug);

    return trim($slug, '-');
}

/**
 * Truncate text to specified length
 */
function truncate_text($text, $length = 150)
{
    $text = strip_tags($text);
    if (strlen($text) <= $length) {
        return $text;
    }
    return substr($text, 0, $length) . '...';
}

/**
 * Format date in Hindi
 */
function format_date_hindi($date)
{
    $months = [
        1 => 'जनवरी',
        2 => 'फरवरी',
        3 => 'मार्च',
        4 => 'अप्रैल',
        5 => 'मई',
        6 => 'जून',
        7 => 'जुलाई',
        8 => 'अगस्त',
        9 => 'सितंबर',
        10 => 'अक्टूबर',
        11 => 'नवंबर',
        12 => 'दिसंबर'
    ];

    $timestamp = strtotime($date);
    $day = date('j', $timestamp);
    $month = $months[(int) date('n', $timestamp)];
    $year = date('Y', $timestamp);

    return "$day $month $year";
}


/**
 * Get related posts (same category, excluding current)
 */
function get_related_posts($pdo, $category, $current_slug, $limit = 4)
{
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE category = ? AND slug != ? ORDER BY RAND() LIMIT ?");
    $stmt->execute([$category, $current_slug, $limit]);
    return $stmt->fetchAll();
}

// Functions removed to avoid redeclaration
/**
 * Get paginated posts (High-Quality range only)
 */
function get_paginated_posts($pdo, $category_filter = null, $page = 1, $per_page = 50)
{
    $offset = ($page - 1) * $per_page;
    $sql = "SELECT * FROM posts WHERE id <= " . MAX_HIGH_QUALITY_ID;
    $params = [];

    if ($category_filter) {
        if (is_array($category_filter)) {
            $sql .= " AND category IN (" . implode(',', array_fill(0, count($category_filter), '?')) . ")";
            $params = $category_filter;
        } else {
            $sql .= " AND category = ?";
            $params = [$category_filter];
        }
    } else {
        // Exclude letter categories if getting 'others'
        $letter_cats = ['father-mother', 'friends', 'siblings', 'congratulatory', 'hindi-writing'];
        $sql .= " AND category NOT IN (" . implode(',', array_fill(0, count($letter_cats), '?')) . ")";
        $params = $letter_cats;
    }

    $sql .= " ORDER BY created_at DESC LIMIT " . (int)$per_page . " OFFSET " . (int)$offset;
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

/**
 * Get total post count for pagination (High-Quality range only)
 */
function get_total_posts_count($pdo, $category_filter = null)
{
    $sql = "SELECT COUNT(*) FROM posts WHERE id <= " . MAX_HIGH_QUALITY_ID;
    $params = [];

    if ($category_filter) {
        if (is_array($category_filter)) {
            $sql .= " AND category IN (" . implode(',', array_fill(0, count($category_filter), '?')) . ")";
            $params = $category_filter;
        } else {
            $sql .= " AND category = ?";
            $params = [$category_filter];
        }
    } else {
        $letter_cats = ['father-mother', 'friends', 'siblings', 'congratulatory', 'hindi-writing'];
        $sql .= " AND category NOT IN (" . implode(',', array_fill(0, count($letter_cats), '?')) . ")";
        $params = $letter_cats;
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchColumn();
}

/**
 * Generate Pagination HTML
 */
function generate_pagination($current_page, $total_pages, $base_url)
{
    if ($total_pages <= 1) return '';

    $html = '<div class="pagination" style="margin-top: 2rem; display: flex; justify-content: center; gap: 0.5rem; flex-wrap: wrap;">';
    
    // Previous Button
    if ($current_page > 1) {
        $html .= '<a href="' . $base_url . '?page=' . ($current_page - 1) . '#latest-letters" class="page-link" style="padding: 8px 16px; border: 1px solid #ddd; background: white; color: #333; text-decoration: none; border-radius: 4px;">&laquo; Prev</a>';
    }

    // Determine range of page numbers to show
    $start_page = max(1, $current_page - 2);
    $end_page = min($total_pages, $current_page + 2);

    if ($start_page > 1) {
        $html .= '<a href="' . $base_url . '?page=1#latest-letters" class="page-link" style="padding: 8px 16px; border: 1px solid #ddd; background: white; color: #333; text-decoration: none; border-radius: 4px;">1</a>';
        if ($start_page > 2) $html .= '<span class="page-dots" style="padding: 8px;">...</span>';
    }

    // Page Numbers
    for ($i = $start_page; $i <= $end_page; $i++) {
        $active_style = ($i == $current_page) ? 'background: #3498db; color: white; border-color: #3498db;' : 'background: white; color: #333; border-color: #ddd;';
        $html .= '<a href="' . $base_url . '?page=' . $i . '#latest-letters" class="page-link" style="padding: 8px 16px; border: 1px solid #ddd; text-decoration: none; border-radius: 4px; ' . $active_style . '">' . $i . '</a>';
    }

    if ($end_page < $total_pages) {
        if ($end_page < $total_pages - 1) $html .= '<span class="page-dots" style="padding: 8px;">...</span>';
        $html .= '<a href="' . $base_url . '?page=' . $total_pages . '#latest-letters" class="page-link" style="padding: 8px 16px; border: 1px solid #ddd; background: white; color: #333; text-decoration: none; border-radius: 4px;">' . $total_pages . '</a>';
    }

    // Next Button
    if ($current_page < $total_pages) {
        $html .= '<a href="' . $base_url . '?page=' . ($current_page + 1) . '#latest-letters" class="page-link" style="padding: 8px 16px; border: 1px solid #ddd; background: white; color: #333; text-decoration: none; border-radius: 4px;">Next &raquo;</a>';
    }

    $html .= '</div>';
    return $html;
}

?>