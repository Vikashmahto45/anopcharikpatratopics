<?php
/**
 * index.php (Premium Homepage Redesign)
 */
require_once __DIR__ . '/includes/header.php';
?>

<style>
/* Homepage Specific Premium Styles */
.hero-redesign {
    background: linear-gradient(135deg, var(--brand-dark) 0%, var(--brand-primary) 100%);
    padding: 100px 20px;
    text-align: center;
    color: white;
    position: relative;
    overflow: hidden;
}
.hero-redesign::after {
    content: '';
    position: absolute;
    bottom: -50px;
    left: 0;
    right: 0;
    height: 100px;
    background: var(--surface);
    transform: skewY(-2deg);
    z-index: 1;
}
.hero-content {
    position: relative;
    z-index: 2;
    max-width: 800px;
    margin: 0 auto;
}
.hero-title-main {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 20px;
    line-height: 1.2;
    letter-spacing: -1px;
}
.hero-subtitle {
    font-size: 1.25rem;
    margin-bottom: 40px;
    opacity: 0.9;
    line-height: 1.6;
}
.cta-group {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}
.cta-btn-primary {
    background: white;
    color: var(--brand-dark);
    padding: 15px 30px;
    border-radius: 50px;
    font-weight: 700;
    text-decoration: none;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}
.cta-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px rgba(0,0,0,0.15);
}
.cta-btn-outline {
    background: rgba(255,255,255,0.1);
    color: white;
    border: 2px solid white;
    padding: 15px 30px;
    border-radius: 50px;
    font-weight: 700;
    text-decoration: none;
    font-size: 1.1rem;
    transition: all 0.3s ease;
}
.cta-btn-outline:hover {
    background: white;
    color: var(--brand-dark);
}

/* Features Section */
.features-section {
    padding: 80px 20px;
    background: var(--surface);
    position: relative;
    z-index: 2;
}
.feature-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
}
.feature-card {
    background: white;
    padding: 40px 30px;
    border-radius: var(--radius-lg);
    box-shadow: 0 4px 6px rgba(0,0,0,0.02);
    border: 1px solid var(--border-color);
    text-align: center;
    transition: transform 0.3s ease;
}
.feature-card:hover {
    transform: translateY(-5px);
    border-color: var(--brand-primary);
}
.feature-icon {
    width: 60px;
    height: 60px;
    background: var(--brand-light);
    color: var(--brand-dark);
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}
.feature-icon svg { width: 30px; height: 30px; }

/* Keyword Keyword Grid */
.keyword-section {
    padding: 80px 20px;
    background: white;
}
.keyword-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    justify-content: center;
    max-width: 1200px;
    margin: 0 auto;
}
.keyword-tag {
    background: var(--surface);
    color: var(--brand-dark);
    padding: 12px 25px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    border: 1px solid var(--border-color);
    transition: all 0.2s ease;
}
.keyword-tag:hover {
    background: var(--brand-primary);
    color: white;
    border-color: var(--brand-primary);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(15, 118, 110, 0.2);
}

/* SEO Content Block */
.seo-content-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 80px 20px;
    align-items: center;
}
@media(max-width: 768px) {
    .seo-content-grid { grid-template-columns: 1fr; }
    .hero-title-main { font-size: 2.5rem; }
}
.content-box h3 { color: var(--brand-dark); font-size: 2rem; margin-bottom: 20px; }
.content-box p { font-size: 1.1rem; line-height: 1.8; color: var(--text-light); margin-bottom: 20px; }

</style>

<!-- HERO SECTION -->
<section class="hero-redesign">
    <div class="hero-content">
        <h1 class="hero-title-main">Master the Art of Anopcharik Patra Topics</h1>
        <p class="hero-subtitle">The definitive, highest-quality educational resource for CBSE, ICSE, and State Board Hindi grammar. We provide 34 deeply researched, 1000+ word execution guides to guarantee perfect marks in the writing section.</p>
        <div class="cta-group">
            <a href="<?php echo url('best-anopcharik-patra-in-hindi.php'); ?>" class="cta-btn-primary">View the #1 Best Letter</a>
            <a href="#topics" class="cta-btn-outline">Explore All 34 Topics</a>
        </div>
    </div>
</section>

<!-- FEATURES SECTION -->
<section class="features-section">
    <div class="container">
        <div class="feature-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3>100% Board Compliant</h3>
                <p style="color: var(--text-light); margin-top: 15px;">Every format follows the strict left-aligned (Block Layout) mandated by current CBSE & State educational bodies.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h3>1,000+ Word Deep Dives</h3>
                <p style="color: var(--text-light); margin-top: 15px;">No superficial examples. We analyze vocabulary, emotional tones, and 'Matra' accuracy to ensure profound understanding.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h3>34 Targeted Keyword Guides</h3>
                <p style="color: var(--text-light); margin-top: 15px;">From writing to your bank manager to understanding Marathi structural translations, we cover every possible search intent.</p>
            </div>
        </div>
    </div>
</section>

<!-- SEO CONTENT BLOCK -->
<section style="background: var(--surface);">
    <div class="seo-content-grid">
        <div class="content-box">
            <h3>Why is 'anopcharik patra lekhan' so Important?</h3>
            <p><strong>anopcharik patra lekhan</strong> (Informal Letter Writing) is the true test of a student's linguistic intimacy. Unlike formal correspondence, these letters require the writer to navigate complex Indian hierarchical structures—shifting from supreme reverence (Poojniya) for elders to authoritative affection (Anuj) for younger siblings.</p>
            <p>Our platform breaks down everything from the basic <em>class 5 hindi anopcharik patra topic</em> to the highly philosophical demands of an <em>anopcharik patra class 12</em> board exam. Whether you are searching for pure <em>hindi me anopcharik patra</em> translations or need <em>10 anopcharik patra in hindi for class 9</em>, we have built a structured roadmap for your success.</p>
            <a href="<?php echo url('anopcharik-patra-lekhan-kise-kahate-hain.php'); ?>" style="color: var(--brand-primary); font-weight: bold; text-decoration: none; border-bottom: 2px solid var(--brand-primary);">Read the Academic Definition &rarr;</a>
        </div>
        <div class="content-box" style="background: white; padding: 40px; border-radius: var(--radius-lg); box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid var(--brand-light);">
            <h4 style="color: var(--brand-dark); font-size: 1.25rem; margin-bottom: 15px; border-bottom: 2px solid var(--border-color); padding-bottom: 10px;">The Golden Left-Aligned Format</h4>
            <div style="font-family: monospace; font-size: 0.95rem; color: #475569; line-height: 1.8;">
                <strong>प्रेषक का पता</strong> (Sender Address)<br>
                <em>शहर का नाम</em><br><br>
                <strong>दिनांक</strong> (Date)<br><br>
                <strong>संबोधन</strong> (Salutation),<br>
                <strong>अभिवादन</strong> (Greeting)।<br><br>
                <em>[अनुच्छेद 1: कुशल-मंगल]</em><br>
                <em>[अनुच्छेद 2: मुख्य विषयवस्तु]</em><br>
                <em>[अनुच्छेद 3: समापन]</em><br><br>
                <strong>प्रेषक का संबंध</strong> (Relation)<br>
                <strong>नाम</strong> (Name)
            </div>
            <div style="margin-top: 20px;">
                <a href="<?php echo url('what-is-the-format-of-anopcharik-patra-in-hindi.php'); ?>" style="display: block; text-align: center; background: var(--brand-dark); color: white; padding: 10px; border-radius: 8px; text-decoration: none; font-weight: bold;">Master The Format Guide</a>
            </div>
        </div>
    </div>
</section>

<!-- LIVE EXAMPLE SECTION -->
<section style="padding: 80px 20px; background: white;">
    <div class="container" style="max-width: 900px; margin: 0 auto;">
        <div style="text-align: center; margin-bottom: 40px;">
            <h2 style="font-size: 2.5rem; color: var(--brand-dark);">Live Example: A Perfect Anopcharik Patra</h2>
            <p style="font-size: 1.1rem; color: var(--text-light); margin-top: 15px;">Observe how the completely left-aligned format and emotional vocabulary are executed flawlessly to secure 5/5 marks in a board examination.</p>
        </div>

        <div class="letter-box" style="box-shadow: 0 10px 40px rgba(0,0,0,0.08); border-top: 5px solid var(--brand-primary); font-size: 1.15rem; background: #fff;">
            <strong>प्रश्न:</strong> अपने मित्र को राज्य स्तरीय वाद-विवाद प्रतियोगिता (Debate Competition) में प्रथम आने पर बधाई देते हुए एक पत्र लिखिए।<br><br>

            फ्लैट नं. ४५, राजेंद्र नगर,<br>
            नई दिल्ली - ११००६०<br><br>

            दिनांक: २० अगस्त २०२६<br><br>

            प्रिय मित्र आयुष,<br>
            सप्रेम नमस्ते।<br><br>

            मैं यहाँ सकुशल हूँ और आशा करता हूँ कि तुम भी सपरिवार आनंदपूर्वक होगे। आज सुबह समाचार पत्र में तुम्हारी तस्वीर और राज्य स्तरीय वाद-विवाद प्रतियोगिता में तुम्हारे प्रथम आने का समाचार पढ़ा। मित्र, यह शुभ समाचार पढ़कर मेरी प्रसन्नता का कोई ठिकाना न रहा। इस ऐतिहासिक सफलता पर तुम्हें मेरी ओर से बहुत-बहुत हार्दिक बधाई!<br><br>

            मुझे हमेशा से तुम्हारी तार्किक क्षमता और भाषा पर तुम्हारी पकड़ पर पूरा विश्वास था। आज तुमने पूरे राज्य में अपने माता-पिता और विद्यालय का नाम रोशन कर दिया है। यह तुम्हारी निरंतर मेहनत का ही परिणाम है। ईश्वर करे तुम इसी प्रकार जीवन में सफलता के नए शिखर छूते रहो।<br><br>

            अंकल और आंटी जी को मेरी ओर से बधाई और सादर प्रणाम कहना। जब मैं अगले महीने तुमसे मिलूँगा, तो हम शानदार पार्टी करेंगे।<br><br>

            तुम्हारा अभिन्न मित्र,<br>
            रोहित
        </div>
    </div>
</section>

<!-- ADDITIONAL EDUCATIONAL CONTENT -->
<section style="padding: 80px 20px; background: var(--surface);">
    <div class="container" style="max-width: 1100px; margin: 0 auto; text-align: center;">
        <h3 style="font-size: 2.2rem; color: var(--brand-dark); margin-bottom: 40px;">Mastering the Board Exam: Top 3 Fatal Mistakes</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; text-align: left;">
            <div style="background: white; padding: 30px; border-radius: var(--radius-md); border-left: 5px solid #ef4444; box-shadow: 0 4px 6px rgba(0,0,0,0.02)">
                <h4 style="color: #ef4444; font-size: 1.25rem; margin-bottom: 12px; font-weight: 700;">1. Adding a 'Vishay' (Subject)</h4>
                <p style="color: var(--text-light); font-size: 1.05rem; line-height: 1.6;">Never write a subject line in an informal relationship. This is exclusively a formal letter rule. Including it here results in an instant 0 for formatting.</p>
            </div>
            <div style="background: white; padding: 30px; border-radius: var(--radius-md); border-left: 5px solid #f59e0b; box-shadow: 0 4px 6px rgba(0,0,0,0.02)">
                <h4 style="color: #f59e0b; font-size: 1.25rem; margin-bottom: 12px; font-weight: 700;">2. Slanted / Indented Layouts</h4>
                <p style="color: var(--text-light); font-size: 1.05rem; line-height: 1.6;">The signature and date are no longer written on the right side of the page. Every single line and paragraph start MUST hit the absolute left margin.</p>
            </div>
            <div style="background: white; padding: 30px; border-radius: var(--radius-md); border-left: 5px solid #10b981; box-shadow: 0 4px 6px rgba(0,0,0,0.02)">
                <h4 style="color: #10b981; font-size: 1.25rem; margin-bottom: 12px; font-weight: 700;">3. Misspelling 'Poojniya'</h4>
                <p style="color: var(--text-light); font-size: 1.05rem; line-height: 1.6;">When addressing elders, completely spell out <strong>पूजनीय</strong>. Writing 'Pujyaniya' (पुज्यनीय) is a severe grammatical matra error heavily penalized by examiners.</p>
            </div>
        </div>
    </div>
</section>

<!-- THE MASSIVE KEYWORD TOPIC INDEX -->
<section id="topics" class="keyword-section">
    <div class="container">
        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 2.5rem; color: var(--brand-dark); margin-bottom: 15px;">The Ultimate Topic Library</h2>
            <p style="color: var(--text-light); max-width: 600px; margin: 0 auto; font-size: 1.1rem;">Select any of the 34 meticulously researched guides below. Each link leads to a dedicated 1,000+ word masterclass on that exact topic.</p>
        </div>
        
        <div class="keyword-grid">
            <a href="<?php echo url('anopcharik-patra.php'); ?>" class="keyword-tag">anopcharik patra</a>
            <a href="<?php echo url('anopcharik-patra-format.php'); ?>" class="keyword-tag">anopcharik patra format</a>
            <a href="<?php echo url('anopcharik-patra-in-hindi.php'); ?>" class="keyword-tag">anopcharik patra in hindi</a>
            <a href="<?php echo url('what-is-the-format-of-anopcharik-patra-in-hindi.php'); ?>" class="keyword-tag">what is the format of anopcharik patra in hindi</a>
            <a href="<?php echo url('anopcharik-patra-lekhan.php'); ?>" class="keyword-tag">anopcharik patra lekhan</a>
            <a href="<?php echo url('anopcharik-patra-example.php'); ?>" class="keyword-tag">anopcharik patra example</a>
            <a href="<?php echo url('aupcharik-aur-anopcharik-patra.php'); ?>" class="keyword-tag">aupcharik aur anopcharik patra</a>
            <a href="<?php echo url('anopcharik-patra-class-10th.php'); ?>" class="keyword-tag">anopcharik patra class 10th</a>
            <a href="<?php echo url('anopcharik-patra-class-9.php'); ?>" class="keyword-tag">anopcharik patra class 9</a>
            <a href="<?php echo url('anopcharik-patra-ka-prarup.php'); ?>" class="keyword-tag">anopcharik patra ka prarup</a>
            
            <a href="<?php echo url('short-anopcharik-patra.php'); ?>" class="keyword-tag">short anopcharik patra</a>
            <a href="<?php echo url('5-anopcharik-patra-in-hindi.php'); ?>" class="keyword-tag">5 anopcharik patra in hindi</a>
            <a href="<?php echo url('3-anopcharik-patra-in-hindi.php'); ?>" class="keyword-tag">3 anopcharik patra in hindi</a>
            <a href="<?php echo url('2-anopcharik-patra-in-hindi.php'); ?>" class="keyword-tag">2 anopcharik patra in hindi</a>
            <a href="<?php echo url('anopcharik-patra-to-friend.php'); ?>" class="keyword-tag">anopcharik patra to friend</a>
            <a href="<?php echo url('apne-mummy-ko-anopcharik-patra.php'); ?>" class="keyword-tag">apne mummy ko anopcharik patra</a>
            <a href="<?php echo url('anopcharik-patra-topics-in-hindi.php'); ?>" class="keyword-tag">anopcharik patra topics in hindi</a>
            <a href="<?php echo url('anopcharik-patra-bank-manager-ko.php'); ?>" class="keyword-tag">anopcharik patra bank manager ko kaise likhen</a>
            <a href="<?php echo url('anopcharik-patra-bus-conductor.php'); ?>" class="keyword-tag">anopcharik patra topics in hindi for bus conductor</a>
            <a href="<?php echo url('kachra-prabandhan-par-anopcharik-patra.php'); ?>" class="keyword-tag">kachra pravandhan par anopcharik patra</a>

            <a href="<?php echo url('anopcharik-patra-madhur-smrutiya.php'); ?>" class="keyword-tag">anopcharik patra madhur smrutiya</a>
            <a href="<?php echo url('class-5-hindi-anopcharik-patra-topic.php'); ?>" class="keyword-tag">class 5 hindi anopcharik patra topic</a>
            <a href="<?php echo url('anopcharik-patra-wikipedia.php'); ?>" class="keyword-tag">anopcharik patra wikipedia</a>
            <a href="<?php echo url('do-anopcharik-patra.php'); ?>" class="keyword-tag">do anopcharik patra</a>
            <a href="<?php echo url('hindi-me-anopcharik-patra.php'); ?>" class="keyword-tag">hindi me anopcharik patra</a>
            <a href="<?php echo url('anopcharik-patra-hindi.php'); ?>" class="keyword-tag">anopcharik patra hindi</a>
            <a href="<?php echo url('anopcharik-patra-questions.php'); ?>" class="keyword-tag">anopcharik patra questions</a>
            <a href="<?php echo url('anopcharik-patra-format-class-9.php'); ?>" class="keyword-tag">anopcharik patra format class 9</a>
            <a href="<?php echo url('anopcharik-patra-in-sanskrit.php'); ?>" class="keyword-tag">anopcharik patra in sanskrit</a>
            <a href="<?php echo url('anopcharik-patra-in-marathi.php'); ?>" class="keyword-tag">anopcharik patra in marathi</a>

            <a href="<?php echo url('best-anopcharik-patra-in-hindi.php'); ?>" class="keyword-tag">best anopcharik patra in hindi</a>
            <a href="<?php echo url('10-anopcharik-patra-in-hindi-for-class-9.php'); ?>" class="keyword-tag">10 anopcharik patra in hindi for class 9</a>
            <a href="<?php echo url('anopcharik-patra-lekhan-kise-kahate-hain.php'); ?>" class="keyword-tag">anopcharik patra lekhan kise kahate hain</a>
            <a href="<?php echo url('anopcharik-patra-class-12.php'); ?>" class="keyword-tag">anopcharik patra class 12</a>
        </div>
    </div>
</section>

<!-- SEO CONTENT ENGINE (Dynamically pulled from keyword.txt, visually hidden from users but active for crawlers) -->
<div style="position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0,0,0,0); border: 0;">
    <?php
    $keyword_file = __DIR__ . '/keyword.txt';
    if(file_exists($keyword_file)){
        $keywords = file($keyword_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($keywords as $kw) {
            echo '<p>' . htmlspecialchars(trim($kw)) . '</p>';
        }
    }
    ?>
</div>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
