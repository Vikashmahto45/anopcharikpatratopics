<?php
/**
 * Homepage - Anopcharik Patra Topics
 * SEO-optimized landing page with format guide and topic grid
 */

require_once 'config.php';
require_once 'includes/functions.php';

// Page Meta
$page_title = 'अनौपचारिक पत्र के उदाहरण | Informal Letter in Hindi | Anopcharik Patra Topics';
$page_desc = 'Anopcharik Patra Topics - CBSE और ICSE बोर्ड परीक्षाओं के लिए हिंदी में अनौपचारिक पत्र लेखन के 100+ विषय, प्रारूप और उदाहरण। पिता, माता, मित्र, भाई-बहन को पत्र कैसे लिखें।';
$page_keywords = 'anopcharik patra topics, अनौपचारिक पत्र विषय, anopcharik patra, informal letter hindi, patra lekhan, anopcharik patra format, anopcharik patra lekhan, class 10 letter writing, CBSE letter format, ICSE patra lekhan, hindi letter writing, पत्र लेखन';

include 'includes/header.php';

// Get all posts and categories
$categories = get_all_categories($pdo);

// Pagination Configuration
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 20;

// Get posts and guarantee we have enough "letters" for the hero section
// We specifically look for "पत्र" or "Letter" in the title to ensure relevance to "Anopcharik Patra"
$stmt = $pdo->query("SELECT * FROM posts WHERE (title LIKE '%पत्र%' OR title LIKE '%Letter%') ORDER BY created_at DESC LIMIT 50");
$hero_letters = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get paginated posts for the main content areas
$letter_cats_array = ['father-mother', 'friends', 'siblings', 'congratulatory', 'hindi-writing'];
$letters = get_paginated_posts($pdo, $letter_cats_array, $page, $per_page);
$total_letters = get_total_posts_count($pdo, $letter_cats_array);
$total_pages = ceil($total_letters / $per_page);

$others = get_paginated_posts($pdo, null, $page, $per_page); 

?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container hero-container">
        <div class="hero-grid">
            <!-- Left: Introduction & Features -->
            <div class="hero-text">
                <h1>Anopcharik Patra Topics | 8 अनौपचारिक पत्र के उदाहरण | 8 Informal Letter</h1>                <p class="hero-description">
                    Anopcharik Patra Topics - CBSE और ICSE बोर्ड परीक्षाओं के लिए सबसे विस्तृत और सरल मार्गदर्शिका। 
                    100+ अनौपचारिक पत्र विषयों के साथ उदाहरण, प्रारूप, और परीक्षा टिप्स।
                </p>
                
                <ul class="hero-features">
                    <?php 
                    // Select a few different topics for the features list (starting from index 4 to avoid duplication)
                    $feature_topics = array_slice($hero_letters, 4, 4);
                    foreach($feature_topics as $topic): 
                    ?>
                    <li>
                        <a href="<?php echo post_url($topic['slug']); ?>" title="<?php echo htmlspecialchars($topic['title']); ?>" style="display: flex; align-items: center; gap: 10px; width: 100%; text-decoration: none; color: inherit;">
                            <span class="feature-icon">✉️</span>
                            <span class="feature-text"><?php echo htmlspecialchars($topic['title']); ?></span>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                
                <div class="hero-buttons">
                    <a href="#latest-letters" title="नवीनतम पत्र देखें" class="hero-btn primary">Browse Letters</a>
                    <a href="#format" title="पत्र का प्रारूप सीखें" class="hero-btn secondary">Learn Format</a>
                </div>
            </div>
            
            <!-- Right: Popular Topics Grid -->
            <div class="hero-topics-card">
                <h3>🔥 सबसे लोकप्रिय विषय</h3>
                <div class="popular-topics-grid">
                    <?php 
                    // Get popular letter topics
                    $popular_topics = array_slice($hero_letters, 0, 4);
                    foreach($popular_topics as $topic): 
                    ?>
                    <a href="<?php echo post_url($topic['slug']); ?>" title="<?php echo htmlspecialchars($topic['title']); ?>" class="topic-box">
                        <span class="topic-emoji">✉️</span>
                        <span class="topic-title"><?php echo htmlspecialchars($topic['title']); ?></span>
                        <span class="topic-arrow">→</span>
                    </a>
                    <?php endforeach; ?>
                </div>
                <a href="#latest-letters" title="सभी विषय देखें" class="view-all-link">View All Topics →</a>
            </div>
        </div>
    </div>
</section>

<style>
    .hero-section {
        background: linear-gradient(135deg, var(--color-navy) 0%, #1a252f 100%);
        color: white;
        padding: 30px 0;
        border-bottom: 5px solid var(--color-gold);
        position: relative;
        overflow: hidden;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 50%;
        height: 100%;
        background: rgba(255, 255, 255, 0.03);
        clip-path: polygon(20% 0%, 100% 0%, 100% 100%, 0% 100%);
    }

    .hero-container {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .hero-grid {
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        gap: 60px;
        align-items: center;
    }

    .hero-text h1 {
        font-size: 2.2rem;
        margin-bottom: 8px;
        color: white;
        line-height: 1.2;
        font-weight: 700;
    }
    
    .hero-subtitle {
        font-size: 1.3rem;
        color: var(--color-gold);
        margin-bottom: 20px;
        font-weight: 500;
    }
    
    .hero-description {
        font-size: 0.95rem;
        line-height: 1.5;
        opacity: 0.95;
        margin-bottom: 15px;
    }

    .hero-features {
        list-style: none;
        padding: 0;
        margin-bottom: 15px;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .hero-features li {
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.1);
        padding: 8px 14px;
        border-radius: 8px;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s;
    }
    
    .hero-features li:hover {
        transform: translateX(5px);
        background: rgba(255, 255, 255, 0.15);
    }

    .feature-icon {
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .feature-text {
        font-weight: 500;
        letter-spacing: 0.3px;
    }
    
    .hero-buttons {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .hero-btn {
        display: inline-block;
        padding: 14px 30px;
        font-weight: 600;
        text-decoration: none;
        border-radius: 8px;
        transition: all 0.3s;
        font-size: 1.05rem;
    }

    .hero-btn.primary {
        background: var(--color-gold);
        color: var(--color-navy);
        box-shadow: 0 4px 0 #d4a017;
    }
    
    .hero-btn.primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 0 #d4a017;
    }

    .hero-btn.primary:active {
        transform: translateY(2px);
        box-shadow: 0 2px 0 #d4a017;
    }

    .hero-btn.secondary {
        background: transparent;
        border: 2px solid white;
        color: white;
    }

    .hero-btn.secondary:hover {
        background: white;
        color: var(--color-navy);
    }
    
    /* Right Side: Topics Card */
    .hero-topics-card {
        background: white;
        padding: 20px;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        color: var(--color-navy);
    }

    .hero-topics-card h3 {
        margin-top: 0;
        margin-bottom: 15px;
        color: var(--color-navy);
        font-size: 1.2rem;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
    }
    
    .popular-topics-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 8px;
        margin-bottom: 12px;
    }
    
    .topic-box {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        background: #f8f9fa;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s;
        border: 2px solid transparent;
    }
    
    .topic-box:hover {
        background: #fff;
        border-color: var(--color-gold);
        transform: translateX(5px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .topic-emoji {
        font-size: 1.5rem;
        flex-shrink: 0;
    }
    
    .topic-title {
        flex: 1;
        font-size: 0.95rem;
        color: var(--color-navy);
        font-weight: 500;
        line-height: 1.4;
    }
    
    .topic-arrow {
        color: var(--color-saffron);
        font-weight: bold;
        font-size: 1.2rem;
        opacity: 0;
        transition: opacity 0.3s;
    }
    
    .topic-box:hover .topic-arrow {
        opacity: 1;
    }
    
    .view-all-link {
        display: block;
        text-align: center;
        color: var(--color-saffron);
        font-weight: 600;
        text-decoration: none;
        padding: 10px;
        border-radius: 6px;
        transition: all 0.3s;
    }
    
    .view-all-link:hover {
        background: #f8f9fa;
    }

    @media (max-width: 768px) {
        .hero-features {
            display: none !important;
        }
        
        .hero-grid {
            grid-template-columns: 1fr;
            gap: 40px;
        }
        
        .hero-text {
            text-align: center;
        }
        
        .hero-text h1 {
            font-size: 2.2rem;
        }
        
        .hero-buttons {
            justify-content: center;
        }
    }
</style>

<!-- Main Content Section with Sidebar -->
<section class="section main-content-section" id="about">
    <div class="container">
        <!-- Split Layout -->
        <div class="split-layout">

            <!-- Left Content -->
            <div class="left-content">
                <!-- Latest Letters Preview -->
                <div class="content-block" id="latest-letters">
                    <h2 class="block-title">
                        <span class="title-icon">🆕</span>
                        नवीनतम पत्र (Latest Letters)
                    </h2>
                    <div class="letters-grid">
                        <?php 
                        foreach($letters as $post): 
                        ?>
                        <a href="<?php echo post_url($post['slug']); ?>" title="<?php echo htmlspecialchars($post['title']); ?>" class="letter-preview-card">
                            <div class="letter-icon">✉️</div>
                            <div class="letter-info">
                                <h4><?php echo htmlspecialchars($post['title']); ?></h4>
                                <span class="read-more">Read Letter →</span>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <?php echo generate_pagination($page, $total_pages, url()); ?>
                </div>

                <style>
                .letters-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                    gap: 15px;
                    margin-top: 20px;
                }
                .letter-preview-card {
                    display: flex;
                    align-items: center;
                    gap: 15px;
                    background: #fff;
                    border: 1px solid #eee;
                    padding: 15px;
                    border-radius: 8px;
                    text-decoration: none;
                    transition: all 0.2s;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
                }
                .letter-preview-card:hover {
                    border-color: var(--color-gold);
                    transform: translateY(-3px);
                    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
                }
                .letter-icon {
                    font-size: 2rem;
                    background: #f0f7ff;
                    width: 50px;
                    height: 50px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 50%;
                }
                .letter-info h4 {
                    margin: 0 0 5px;
                    font-size: 1rem;
                    color: var(--color-navy);
                }
                .read-more {
                    font-size: 0.8rem;
                    color: var(--color-saffron);
                    font-weight: bold;
                }
                </style>

                <!-- Introduction Content -->
                <div class="content-block intro-block">
                    <h2 class="block-title">
                        <span class="title-icon">📜</span>
                        अनौपचारिक पत्र क्या है?
                    </h2>

                    <div class="intro-text">
                        <p>
                            <strong>अनौपचारिक पत्र (Informal Letter)</strong> वह पत्र है जो हम अपने परिवार के सदस्यों,
                            मित्रों, रिश्तेदारों और परिचितों को लिखते हैं। इसे व्यक्तिगत पत्र या निजी पत्र भी कहा जाता
                            है।
                        </p>
                        <p>
                            CBSE और ICSE बोर्ड की कक्षा 10 और 12 की हिंदी परीक्षाओं में <strong>पत्र लेखन (Patra
                                Lekhan)</strong> एक महत्वपूर्ण भाग है। सही प्रारूप और भाषा का उपयोग करने से आप इसमें
                            पूरे अंक प्राप्त कर सकते हैं।
                        </p>
                    </div>
                </div>

                <!-- Format Section -->
                <div class="content-block" id="format">
                    <h2 class="block-title">
                        <span class="title-icon">✍️</span>
                        अनौपचारिक पत्र का प्रारूप
                    </h2>
                    <p class="english-subtitle">The 7 Parts of an Informal Letter</p>

                    <div class="format-list">
                        <div class="format-item">
                            <span class="format-num">1</span>
                            <div class="format-info">
                                <h4>भेजने वाले का पता</h4>
                                <p>पत्र के दाहिने कोने में अपना पूरा पता लिखें।</p>
                            </div>
                        </div>
                        <div class="format-item">
                            <span class="format-num">2</span>
                            <div class="format-info">
                                <h4>दिनांक (Date)</h4>
                                <p>पते के नीचे पत्र लिखने की तिथि लिखें।</p>
                            </div>
                        </div>
                        <div class="format-item">
                            <span class="format-num">3</span>
                            <div class="format-info">
                                <h4>संबोधन (Salutation)</h4>
                                <p>पूज्य पिताजी, प्रिय मित्र, आदरणीय माताजी</p>
                            </div>
                        </div>
                        <div class="format-item">
                            <span class="format-num">4</span>
                            <div class="format-info">
                                <h4>अभिवादन (Greeting)</h4>
                                <p>सादर प्रणाम, नमस्कार, स्नेहिल नमस्ते</p>
                            </div>
                        </div>
                        <div class="format-item">
                            <span class="format-num">5</span>
                            <div class="format-info">
                                <h4>मुख्य भाग (Body)</h4>
                                <p>पत्र का मुख्य विषय 2-3 अनुच्छेदों में लिखें।</p>
                            </div>
                        </div>
                        <div class="format-item">
                            <span class="format-num">6</span>
                            <div class="format-info">
                                <h4>समापन (Closing)</h4>
                                <p>शेष कुशल है, आपके पत्र की प्रतीक्षा में</p>
                            </div>
                        </div>
                        <div class="format-item">
                            <span class="format-num">7</span>
                            <div class="format-info">
                                <h4>हस्ताक्षर (Signature)</h4>
                                <p>आपका आज्ञाकारी पुत्र/पुत्री, आपका मित्र</p>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- FAQ Section -->
                <div class="content-block" id="faq">
                    <h2 class="block-title">
                        <span class="title-icon">❓</span>
                        अक्सर पूछे जाने वाले प्रश्न
                    </h2>

                    <div class="faq-list">
                        <div class="faq-item">
                            <div class="faq-question">अनौपचारिक पत्र और औपचारिक पत्र में क्या अंतर है?</div>
                            <div class="faq-answer">
                                <p>अनौपचारिक पत्र परिवार और मित्रों को लिखे जाते हैं जबकि औपचारिक पत्र सरकारी कार्यालयों
                                    को। अनौपचारिक पत्र में भाषा आत्मीय होती है।</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question">बड़ों को पत्र में संबोधन कैसे करें?</div>
                            <div class="faq-answer">
                                <p>"पूज्य", "आदरणीय", "माननीय" जैसे शब्दों का प्रयोग करें। जैसे: पूज्य पिताजी, आदरणीय
                                    माताजी।</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question">परीक्षा में पूर्ण अंक कैसे प्राप्त करें?</div>
                            <div class="faq-answer">
                                <p>सही प्रारूप का पालन करें, उचित संबोधन लिखें, विषय से संबंधित सामग्री लिखें, भाषा
                                    शुद्ध रखें।</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar - Scrolling Topic Cards -->
            <div class="right-sidebar">
                <div class="sidebar-header">
                    <h3>📚 महत्वपूर्ण पत्र विषय</h3>
                    <p>Select a Letter Topic to Read</p>
                </div>

                <div class="topic-cards-container">

                    <!-- Letters Section -->
                    <div class="section-divider" style="padding: 10px 5px; color: var(--color-navy); font-weight: bold; border-bottom: 2px solid var(--color-gold);">
                        ✉️ अनौपचारिक पत्र (Letters)
                    </div>
                    <?php foreach ($hero_letters as $post): ?>
                        <a href="<?php echo post_url($post['slug']); ?>" title="<?php echo htmlspecialchars($post['title']); ?>" class="mini-topic-card">
                            <h4><?php echo htmlspecialchars($post['title']); ?></h4>
                            <span class="card-arrow">→</span>
                        </a>
                    <?php endforeach; ?>

                    <!-- Others Section -->
                     <div class="section-divider" style="padding: 10px 5px; margin-top: 15px; color: var(--color-navy); font-weight: bold; border-bottom: 2px solid var(--color-gold);">
                        📚 अध्ययन सामग्री (Other Topics)
                    </div>
                    <?php foreach ($others as $post): ?>
                        <a href="<?php echo post_url($post['slug']); ?>" title="<?php echo htmlspecialchars($post['title']); ?>" class="mini-topic-card">
                            <h4><?php echo htmlspecialchars($post['title']); ?></h4>
                            <span class="card-arrow">→</span>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="sidebar-help">
                    <h4>Need Help?</h4>
                    <p>Can't find your topic? Check all categories.</p>
                </div>

                <!-- Category Quick Links -->
                <div class="category-quick-links">
                    <?php foreach ($categories as $cat): ?>
                        <a href="<?php echo category_url($cat['slug']); ?>" title="<?php echo htmlspecialchars($cat['name']); ?> के सभी पत्र" class="category-pill">
                            <?php echo $cat['name']; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- SEO Image Gallery Section -->
<section class="section image-gallery-section" id="gallery">
    <div class="container">
        <h2 style="text-align:center;margin-bottom:10px;">&#128444;&#65039; अनौपचारिक पत्र के उदाहरण - देखें और सीखें</h2>
        <p style="text-align:center;color:#666;margin-bottom:30px;">Anopcharik Patra Topics - Visual Guide for Board Exam Students</p>
        <div class="image-gallery-grid">
            <figure class="gallery-item">
                <img src="<?php echo url('images/anopcharik-patra-example.png'); ?>" alt="अनौपचारिक पत्र के उदाहरण - Anopcharik Patra Examples in Hindi" title="अनौपचारिक पत्र के उदाहरण" loading="lazy"/>
                <figcaption><h3>अनौपचारिक पत्र के उदाहरण</h3><span>Anopcharik Patra Examples in Hindi</span></figcaption>
            </figure>
            <figure class="gallery-item">
                <img src="<?php echo url('images/anopcharik-patra-format.png'); ?>" alt="Anopcharik Patra Format - अनौपचारिक पत्र का प्रारूप" title="Anopcharik Patra Format" loading="lazy"/>
                <figcaption><h3>Anopcharik Patra Format</h3><span>अनौपचारिक पत्र का सही प्रारूप</span></figcaption>
            </figure>
            <figure class="gallery-item">
                <img src="<?php echo url('images/anopcharik-patra-topics.png'); ?>" alt="Anopcharik Patra Topics - अनौपचारिक पत्र के विषय" title="Anopcharik Patra Topics" loading="lazy"/>
                <figcaption><h3>Anopcharik Patra Topics</h3><span>अनौपचारिक पत्र के सभी विषय</span></figcaption>
            </figure>
            <figure class="gallery-item">
                <img src="<?php echo url('images/anopcharik-patra-class-10.png'); ?>" alt="Anopcharik Patra Class 10 - कक्षा 10 अनौपचारिक पत्र" title="Anopcharik Patra Class 10" loading="lazy"/>
                <figcaption><h3>Anopcharik Patra Class 10</h3><span>कक्षा 10 के लिए अनौपचारिक पत्र</span></figcaption>
            </figure>
        </div>
    </div>
</section>
<style>
.image-gallery-section{background:#f8f9fa;padding:50px 0;border-top:3px solid var(--color-gold)}
.image-gallery-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:25px}
.gallery-item{background:white;border-radius:12px;overflow:hidden;box-shadow:0 4px 15px rgba(0,0,0,.08);transition:all .3s;border:2px solid transparent;margin:0}
.gallery-item:hover{transform:translateY(-5px);box-shadow:0 10px 30px rgba(0,0,0,.15);border-color:var(--color-gold)}
.gallery-item img{width:100%;height:200px;object-fit:cover;display:block}
.gallery-item figcaption{padding:15px}
.gallery-item figcaption h3{margin:0 0 5px;font-size:1rem;color:var(--color-navy);font-weight:700}
.gallery-item figcaption span{font-size:.8rem;color:var(--color-saffron);font-weight:500}
@media(max-width:600px){.image-gallery-grid{grid-template-columns:repeat(2,1fr);gap:12px}.gallery-item img{height:130px}}
</style>

<script>
    // FAQ Toggle & Observations
    document.querySelectorAll('.faq-question').forEach(function (question) {
        question.addEventListener('click', function () {
            this.parentElement.classList.toggle('active');
        });
    });

    const observerOptions = { threshold: 0.1, rootMargin: '0px' };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) entry.target.classList.add('visible');
        });
    }, observerOptions);

    document.querySelectorAll('.mini-topic-card').forEach(card => observer.observe(card));
</script>

<style>
    /* CSS unchanged */
    body {
        background-color: var(--color-off-white);
    }

    .main-content-section {
        padding: var(--spacing-xl) 0;
    }

    .split-layout {
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 40px;
        align-items: start;
    }

    /* ... (Rest of styles from previous steps) ... */
    /* Sidebar Styles */
    .right-sidebar {
        position: sticky;
        top: 100px;
        background: white;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        overflow: hidden;
        padding-bottom: var(--spacing-md);
    }

    .sidebar-header {
        background: var(--color-navy);
        padding: var(--spacing-lg);
        text-align: left;
    }

    .sidebar-header h3 {
        color: white;
        margin: 0;
        font-size: 1.3rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .sidebar-header p {
        color: var(--color-gold);
        margin: 5px 0 0;
        font-size: 0.85rem;
        opacity: 0.9;
    }

    .topic-cards-container {
        height: 600px;
        overflow-y: auto;
        padding: var(--spacing-md);
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .topic-cards-container::-webkit-scrollbar {
        width: 6px;
    }

    .topic-cards-container::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .topic-cards-container::-webkit-scrollbar-thumb {
        background: #ddd;
        border-radius: 4px;
    }

    .topic-cards-container::-webkit-scrollbar-thumb:hover {
        background: var(--color-saffron);
    }

    .mini-topic-card {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 8px;
        text-decoration: none;
        border-left: 3px solid transparent;
        transition: all 0.2s ease;
    }

    .mini-topic-card:hover {
        background: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        border-left-color: var(--color-saffron);
        transform: translateX(2px);
    }

    .mini-topic-card h4 {
        margin: 0;
        font-size: 0.95rem;
        color: var(--color-navy);
        font-weight: 600;
        line-height: 1.4;
        flex: 1;
    }

    .mini-topic-card .card-category {
        display: none;
    }

    .card-arrow {
        color: var(--color-saffron);
        font-weight: bold;
        font-size: 1.2rem;
        margin-left: 10px;
    }

    .sidebar-help {
        padding: 0 var(--spacing-md);
        margin-top: var(--spacing-sm);
        text-align: center;
    }

    .sidebar-help h4 {
        font-size: 1rem;
        margin: 0;
        color: var(--color-navy);
    }

    .sidebar-help p {
        font-size: 0.8rem;
        color: var(--color-gray);
        margin-top: 4px;
    }

    .category-quick-links {
        padding: var(--spacing-md);
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        justify-content: center;
    }

    .category-pill {
        font-size: 0.75rem;
        padding: 4px 10px;
    }

    @media (max-width: 1024px) {
        .split-layout {
            grid-template-columns: 1fr;
        }

        .right-sidebar {
            position: relative;
            top: 0;
            margin-top: var(--spacing-xl);
        }

        .topic-cards-container {
            height: auto;
            max-height: 500px;
        }
    }
</style>

<?php include 'includes/footer.php'; ?>