<?php
/**
 * scripts/authority_booster.php
 * Boost word count and pedagogical value across 65 literature chapters.
 */
$dir = dirname(__DIR__);
$files = glob($dir . "/*-summary.php");

echo "Boosting Authority Layer...\n";

foreach ($files as $file) {
    $content = file_get_contents($file);
    if (strpos($content, 'pedagogical-footer') !== false)
        continue;

    $filename = basename($file);
    $name = ucwords(str_replace(['-summary.php', '-'], ['', ' '], $filename));

    $booster_html = '
        <div class="content-card pedagogical-footer" style="background: #fdf2f2; border-color: #fecaca; margin-top: 50px;">
            <h2 class="sub-header" style="color: #991b1b; border-bottom-color: #fee2e2;">Board Exam Preparation Tips: ' . $name . '</h2>
            <div class="content-block">
                <p>To excel in the CBSE Board examinations for <strong>' . $name . '</strong>, students should focus on the following key areas:</p>
                <ul style="margin: 15px 0;">
                    <li><strong>Identify the Central Theme:</strong> Often, boards ask about the underlying message (e.g., Faith in A Letter to God or Freedom in Nelson Mandela).</li>
                    <li><strong>Character Analysis:</strong> Prepare 100-word sketches for all protagonists and antagonists mentioned in ' . $name . '.</li>
                    <li><strong>Contextual Reference:</strong> Practice writing answers starting with a brief introduction to the author/poet and the setting.</li>
                </ul>
            </div>
            
            <h3 style="margin-top: 25px; color: #991b1b;">Vocabulary Bank (High-Intent Keywords)</h3>
            <table style="width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 0.95rem;">
                <tr style="background: #fee2e2;">
                    <th style="padding: 10px; border: 1px solid #fecaca; text-align: left;">Word</th>
                    <th style="padding: 10px; border: 1px solid #fecaca; text-align: left;">Contextual Meaning</th>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #fecaca;">Poignant</td>
                    <td style="padding: 10px; border: 1px solid #fecaca;">Evoking a keen sense of sadness or regret.</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #fecaca;">Metaphor</td>
                    <td style="padding: 10px; border: 1px solid #fecaca;">A figure of speech in which a word or phrase is applied to an action.</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #fecaca;">Resilience</td>
                    <td style="padding: 10px; border: 1px solid #fecaca;">The capacity to recover quickly from difficulties.</td>
                </tr>
            </table>

            <div style="margin-top: 30px; padding: 20px; background: white; border-radius: 12px; text-align: center;">
                <h4>Boost Your Mastery</h4>
                <p>Try our interactive tools to test your knowledge of ' . $name . ':</p>
                <div style="display: flex; gap: 10px; justify-content: center; margin-top: 15px;">
                    <a href="mcq-practice-engine.php" style="padding: 10px 20px; background: var(--brand-dark); color: white; border-radius: 8px; text-decoration: none; font-size: 0.9rem;">MCQ Practice</a>
                    <a href="character-comparison.php" style="padding: 10px 20px; background: var(--brand-primary); color: white; border-radius: 8px; text-decoration: none; font-size: 0.9rem;">Character Analysis</a>
                </div>
            </div>
        </div>
    ';

    // Insert before the footer or final closing tag 
    $content = str_replace('<?php include(\'includes/footer.php\'); ?>', $booster_html . '<?php include(\'includes/footer.php\'); ?>', $content);

    file_put_contents($file, $content);
    echo "Boosted: $filename\n";
}

echo "Authority Boosting Complete.\n";
