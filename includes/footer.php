</main>

<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- About Section -->
            <div class="footer-section">
                <h3 class="footer-title">Anopcharik Patra Topics - अनौपचारिक पत्र</h3>
                <p class="footer-desc">
                    Anopcharik Patra Topics - CBSE और ICSE बोर्ड परीक्षाओं के लिए हिंदी में अनौपचारिक पत्र लेखन के 100+ विषय।
                    पिता, माता, मित्र, भाई-बहन को पत्र के सही प्रारूप और उदाहरण यहाँ पाएं।
                </p>
            </div>

            <!-- Categories -->
            <div class="footer-section">
                <h3 class="footer-title">पत्र श्रेणियाँ</h3>
                <ul class="footer-links">
                    <?php
                    if (isset($pdo)):
                        $footer_cats = get_all_categories($pdo);
                        foreach ($footer_cats as $cat):
                            ?>
                            <li><a href="<?php echo category_url($cat['slug']); ?>" title="<?php echo htmlspecialchars($cat['name']); ?> के सभी पत्र">
                                    <?php echo $cat['name']; ?>
                                </a></li>
                        <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>

            <!-- Popular Topics -->
            <div class="footer-section">
                <h3 class="footer-title">लोकप्रिय विषय</h3>
                <ul class="footer-links">
                    <?php
                    if (isset($pdo)):
                        $popular_posts = get_all_posts($pdo, 5);
                        foreach ($popular_posts as $post):
                            ?>
                            <li><a href="<?php echo post_url($post['slug']); ?>" title="<?php echo htmlspecialchars($post['title']); ?>">
                                    <?php echo truncate_text($post['title'], 40); ?>
                                </a></li>
                        <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>

            <!-- SEO Keywords Section -->
            <div class="footer-section">
                <h3 class="footer-title">महत्वपूर्ण विषय</h3>
                <div class="seo-keywords">
                    <span class="keyword-tag">anopcharik patra topics</span>
                    <span class="keyword-tag">anopcharik patra topics for class 10</span>
                    <span class="keyword-tag">anopcharik patra lekhan</span>
                    <span class="keyword-tag">Hindi informal letter format</span>
                    <span class="keyword-tag">patra lekhan examples</span>
                    <span class="keyword-tag">informal letter samples in Hindi</span>
                    <span class="keyword-tag">CBSE letter writing</span>
                    <span class="keyword-tag">ICSE patra lekhan</span>
                    <span class="keyword-tag">अनौपचारिक पत्र विषय</span>
                    <span class="keyword-tag">पत्र लेखन हिंदी</span>
                </div>
                <!-- Link to all topics -->
                <div style="margin-top: 15px;">
                    <a href="<?php echo url('links.php'); ?>" title="सभी पत्र विषयों की सूची" style="color: var(--color-gold); text-decoration: none; font-weight: 600;">
                        View All 26,000+ Topics →
                    </a>
                </div>
            </div>

            <!-- AdSense Compliance Links -->
            <div class="footer-section">
                <h3 class="footer-title">त्वरित लिंक</h3>
                <ul class="footer-links">
                    <li><a href="<?php echo url('about'); ?>" title="About Us - Anopcharik Patra Topics">हमारे बारे में (About Us)</a></li>
                    <li><a href="<?php echo url('contact'); ?>" title="Contact Us - Anopcharik Patra Topics">संपर्क करें (Contact Us)</a></li>
                    <li><a href="<?php echo url('privacy-policy'); ?>" title="Privacy Policy - Anopcharik Patra Topics">गोपनीयता नीति (Privacy Policy)</a></li>
                    <li><a href="<?php echo url('disclaimer'); ?>" title="Disclaimer - Anopcharik Patra Topics">अस्वीकरण (Disclaimer)</a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="footer-bottom">
            <p class="copyright">
                &copy;
                <?php echo date('Y'); ?> अनौपचारिक पत्र विषय (Anopcharik Patra Topics). सर्वाधिकार सुरक्षित।
            </p>
            <p class="footer-tagline">
                Anopcharik Patra Topics - हिंदी पत्र लेखन सीखें - CBSE, ICSE कक्षा 10, 12 के लिए
            </p>
        </div>
    </div>
</footer>

<!-- JavaScript -->
<script src="<?php echo url('js/main.js'); ?>"></script>
</body>

</html>