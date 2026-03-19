<?php
/**
 * 404 Error Page
 */

require_once 'config.php';
require_once 'includes/functions.php';

$page_title = 'पृष्ठ नहीं मिला - 404 | Anopcharik Patra Topics';
$page_desc = 'Anopcharik Patra Topics - माफ़ कीजिए, आप जिस पृष्ठ की तलाश कर रहे हैं वह उपलब्ध नहीं है। अनौपचारिक पत्र विषय होमपेज पर जाएं।';
$page_robots = 'noindex, follow';

include 'includes/header.php';
?>

<section class="error-page">
    <div class="container">
        <span class="error-code">404</span>
        <h1 class="error-message">पृष्ठ नहीं मिला!</h1>
        <p>माफ़ कीजिए, आप जिस पृष्ठ की तलाश कर रहे हैं वह उपलब्ध नहीं है।</p>
        <a href="<?php echo url(); ?>" class="category-tab active"
            style="display: inline-block; margin-top: var(--spacing-lg);">होमपेज पर जाएं</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>