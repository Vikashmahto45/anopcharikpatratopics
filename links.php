<?php
/**
 * HTML Sitemap / All Links Page
 * Displays all 26,000+ links on a single page for SEO crawlers.
 */

require_once 'config.php';
require_once 'includes/functions.php';

// Fetch all posts - we only need the title and slug to keep memory usage low
$stmt = $pdo->query("SELECT title, slug FROM posts ORDER BY created_at DESC");
$all_links = $stmt->fetchAll(PDO::FETCH_ASSOC);

$page_title = "सभी पत्र विषय - Anopcharik Patra Topics | All Informal Letter Topics";
$page_desc = "Anopcharik Patra Topics - हिंदी में लिखे गए सभी 25,000+ पत्रों और विषयों की सूची।";

include 'includes/header.php';
?>

<div class="container" style="padding: 40px 0;">
    <h1 style="color: var(--color-navy); margin-bottom: 20px;">सभी पत्र विषय (All Letter Topics)</h1>
    <p style="margin-bottom: 30px; color: #666;">यहाँ हमारे वेबसाइट पर उपलब्ध सभी पत्रों और विषयों की पूरी सूची दी गई है।</p>

    <div class="links-container" style="column-count: 3; column-gap: 30px; font-size: 0.9rem;">
        <?php foreach ($all_links as $link): ?>
            <div style="margin-bottom: 8px; break-inside: avoid;">
                <a href="<?php echo post_url($link['slug']); ?>" title="<?php echo htmlspecialchars($link['title']); ?>" style="color: var(--color-navy); text-decoration: none; display: block; padding: 5px; border-radius: 4px; transition: background 0.2s;">
                    • <?php echo htmlspecialchars($link['title']); ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    .links-container a:hover {
        background: #f0f7ff;
        color: var(--color-saffron) !important;
    }
    
    @media (max-width: 992px) {
        .links-container {
            column-count: 2;
        }
    }
    
    @media (max-width: 600px) {
        .links-container {
            column-count: 1;
        }
    }
</style>

<?php include 'includes/footer.php'; ?>
