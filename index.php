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
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .cta-btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
    }

    .cta-btn-outline {
        background: rgba(255, 255, 255, 0.1);
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
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
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

    .feature-icon svg {
        width: 30px;
        height: 30px;
    }

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
        .seo-content-grid {
            grid-template-columns: 1fr;
        }

        .hero-title-main {
            font-size: 2.5rem;
        }
    }

    .content-box h3 {
        color: var(--brand-dark);
        font-size: 2rem;
        margin-bottom: 20px;
    }

    .content-box p {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--text-light);
        margin-bottom: 20px;
    }

    /* Sticky Navigation for Ultimate Portal */
    .sticky-nav {
        position: sticky;
        top: 20px;
        background: white;
        padding: 20px;
        border-radius: var(--radius-md);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--border-color);
        z-index: 100;
        margin-bottom: 40px;
    }

    .sticky-nav ul {
        list-style: none;
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
        padding: 0;
        margin: 0;
    }

    .sticky-nav a {
        text-decoration: none;
        color: var(--text-light);
        font-weight: 600;
        font-size: 0.9rem;
        transition: var(--transition-base);
    }

    .sticky-nav a:hover {
        color: var(--brand-primary);
    }

    .section-anchor {
        scroll-margin-top: 100px;
    }

    .ultimate-guide-container {
        max-width: 1000px;
        margin: 0 auto;
        background: white;
        padding: 60px 40px;
        border-radius: var(--radius-lg);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
        border: 1px solid var(--border-color);
    }
</style>

<!-- HERO SECTION -->
<section class="hero-redesign">
    <div class="hero-content">
        <h1 class="hero-title-main">Master the Art of Anopcharik Patra Topics</h1>
        <p class="hero-subtitle">The definitive, highest-quality educational resource for CBSE, ICSE, and State Board
            Hindi grammar. We provide 34 deeply researched, 1000+ word execution guides to guarantee perfect marks in
            the writing section.</p>
        <div class="cta-group">
            <a href="<?php echo url('best-anopcharik-patra-in-hindi.php'); ?>" class="cta-btn-primary">View the #1 Best
                Letter</a>
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
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3>100% Board Compliant</h3>
                <p style="color: var(--text-light); margin-top: 15px;">Every format follows the strict left-aligned
                    (Block Layout) mandated by current CBSE & State educational bodies.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                </div>
                <h3>1,000+ Word Deep Dives</h3>
                <p style="color: var(--text-light); margin-top: 15px;">No superficial examples. We analyze vocabulary,
                    emotional tones, and 'Matra' accuracy to ensure profound understanding.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                </div>
                <h3>Massive Authority Portal</h3>
                <p style="color: var(--text-light); margin-top: 15px;">Moving from 34 fragments to 1 unified master
                    resource. All letter examples and formats are now found on this single page.</p>
            </div>
        </div>
    </div>
</section>

<!-- STICKY NAVIGATION -->
<div class="container" style="position: sticky; top: 0; z-index: 1000; background: white;">
    <nav class="sticky-nav">
        <ul>
            <li><a href="#foundation">The Foundation</a></li>
            <li><a href="#format">Master Format</a></li>
            <li><a href="#topics">Topic Library</a></li>
            <li><a href="#examples">Example Bank</a></li>
            <li><a href="#classes">Grade-Wise Guide</a></li>
            <li><a href="#misconceptions">Factual Accuracy</a></li>
            <li><a href="#regional">Languages</a></li>
        </ul>
    </nav>
</div>

<div class="ultimate-guide-container">
    <!-- SECTION 1: THE FOUNDATION -->
    <section id="foundation" class="section-anchor">
        <h2 style="font-size: 2.5rem; color: var(--brand-dark); margin-bottom: 30px;">अनौपचारिक पत्र लेखन: एक संपूर्ण
            परिचय (The Foundation)</h3>

            <div class="article-body">
                <p><strong>Anopcharik Patra</strong> (Informal Letter) is the cornerstone of Hindi grammar. It
                    represents the emotional connection between individuals—friends, family, and close relatives. Unlike
                    formal correspondence, these letters do not require a 'subject' line but demand a high degree of
                    emotional sensitivity and linguistic intimacy.</p>

                <p>In the modern digital age, while emails and instant messaging have become ubiquitous, the
                    <em>anopcharik patra</em> remains a vital part of the academic curriculum because it tests twice as
                    much as a formal letter: your grammar and your emotional intelligence (EQ).</p>

                <h3 style="margin-top: 40px;">अनौपचारिक पत्र लेखन किसे कहते हैं? (Academic Definition)</h3>
                <p>शैक्षणिक दृष्टि से, <strong>अनौपचारिक पत्र लेखन</strong> उन पत्रों को कहा जाता है जो निजी संबंधों के
                    आधार पर लिखे जाते हैं। ये पत्र प्रायः माता-पिता, भाई-बहन, मित्रों और सगे-संबंधियों को लिखे जाते हैं।
                    इन पत्रों में औपचारिकता (formality) का अभाव होता है और इसमें घरेलू या निजी बातों का ज़्यादा महत्व
                    होता है।</p>

                <p><strong>अनौपचारिक पत्र की प्रमुख विशेषताएं:</strong></p>
                <ul>
                    <li>इनमें व्यक्तिगत सुख-दुख का विवरण होता है।</li>
                    <li>भाषा सरल, सहज और आत्मीय होती है।</li>
                    <li>इसमें 'विषय' (Subject) लिखने की आवश्यकता नहीं होती।</li>
                    <li>वाक्य छोटे और प्रभावशाली होने चाहिए।</li>
                    <li>रिश्तों के अनुसार संबोधन और अभिवादन का विशेष महत्व होता है।</li>
                </ul>
            </div>
    </section>

    <hr style="margin: 60px 0; border: none; border-top: 1px solid var(--border-color);">

    <!-- SECTION 2: MASTER FORMAT -->
    <section id="format" class="section-anchor">
        <h2 style="font-size: 2.5rem; color: var(--brand-dark); margin-bottom: 30px;">अनौपचारिक पत्र का प्रारूप (Modern
            Format & Blueprint 2026)</h2>

        <div class="article-body">
            <p>Understanding the strict <strong>anopcharik patra format</strong> is the absolute most critical step in
                securing full marks in your Hindi grammar examinations. While the content is personal, the structural
                layout is rigorously evaluated by CBSE, ICSE, and state board examiners.</p>

            <h3 style="margin-top: 40px;">The 7 Pillars of the modern Layout</h3>
            <p>The traditional right-aligned format has been completely replaced by the <strong>Left-Aligned Block
                    Layout</strong>. Factual violation of this structure results in immediate point deductions.</p>

            <ul style="line-height: 2;">
                <li><strong>1. Sender's Address (प्रेषक का पता):</strong> Positioned at the extreme top-left. Use
                    <em>परीक्षा भवन</em> if no address is provided in the prompt.</li>
                <li><strong>2. The Date (दिनांक):</strong> Fully spelled out (e.g., १५ मार्च, २०२६) beneath the address.
                </li>
                <li><strong>3. Salutation (संबोधन):</strong> Respectful for elders (पूज्य), equal for friends (प्रिय),
                    affectionate for youngers (प्रिय अनुज).</li>
                <li><strong>4. Greeting (अभिवादन):</strong> Match the salutation (सादर प्रणाम / सप्रेम नमस्ते /
                    शुभाशीर्वाद).</li>
                <li><strong>5. The Main Body (मुख्य विषय-वस्तु):</strong> Strictly divided into three paragraphs (Social
                    Inquiry -> Core Message -> Closing Regards).</li>
                <li><strong>6. Subscription (समापन):</strong> Showing your relationship (आपका आज्ञाकारी पुत्र / तुम्हारा
                    मित्र).</li>
                <li><strong>7. Sender's Name (प्रारूप):</strong> Write your name or <em>क. ख. ग.</em> for board exam
                    anonymity.</li>
            </ul>

            <h3 style="margin-top: 40px;">The Visual Blueprint (रिक्त प्रारूप)</h3>
            <p>Below is the ultimate blank blueprint. Memorize the placement of every comma and every blank line. Use
                this spatial arrangement to ensure your letter "hugs" the left margin perfectly.</p>

            <div class="letter-box"
                style="font-family: monospace; font-size: 1.1rem; background: #fff; border: 2px dashed var(--brand-dark); border-radius: 0; padding: 40px; line-height: 1.6;">
                [प्रेषक का पता - २ से ३ पंक्तियाँ]<br>
                [शहर का नाम]<br><br>
                दिनांक: [Date written fully]<br><br>
                [संबोधन],<br>
                [अभिवादन]।<br><br>
                [पहला अनुच्छेद (कुशल-मंगल) - ३-४ पंक्तियाँ]<br><br>
                [दूसरा अनुच्छेद (मुख्य विषय) - ८-१० पंक्तियाँ]<br><br>
                [तीसरा अनुच्छेद (समापन-संदेश) - २-३ पंक्तियाँ]<br><br>
                [आपका प्राप्तकर्ता से संबंध],<br>
                [आपका नाम / क. ख. ग.]
            </div>

            <div class="info-box" style="border-left: 5px solid #ef4444; background: #fef2f2;">
                <strong>Fatal Rule:</strong> An informal letter (Anopcharik Patra) <strong>NEVER</strong> contains a
                'Subject' (विषय) line. Including one will instantly zero your format mark in board examinations.
            </div>
        </div>
    </section>

    <hr style="margin: 60px 0; border: none; border-top: 1px solid var(--border-color);">

    <!-- SECTION 3: TOPIC LIBRARY -->
    <section id="topics" class="section-anchor">
        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 2.5rem; color: var(--brand-dark); margin-bottom: 15px;">Targeted Topic Library (Top 50
                Prompts)</h2>
            <p style="color: var(--text-light); max-width: 800px; margin: 0 auto; font-size: 1.1rem;">These 50
                categories represent the most frequent query patterns used by CBSE and ICSE boards over the last 20
                years. Master these and you master the exam.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            <!-- Category 1 -->
            <div
                style="background: var(--surface); padding: 30px; border-radius: var(--radius-md); border: 1px solid var(--border-color);">
                <h4 style="color: var(--brand-primary); margin-bottom: 20px; font-size: 1.25rem;">1. Advice & Guidance
                    (सलाह)</h4>
                <ul style="padding-left: 20px; color: var(--text-light); line-height: 1.8;">
                    <li>नशे की लत से बचने हेतु मित्र को सलाह।</li>
                    <li>समय के सदुपयोग का महत्व समझाते हुए भाई को पत्र।</li>
                    <li>मोबाइल और टीवी से दूर रहने की नसीहत।</li>
                    <li>पुस्तकालय के उपयोग हेतु मित्र को प्रेरणा।</li>
                    <li>जंक फूड छोड़ संतुलित आहार अपनाने की सलाह।</li>
                </ul>
            </div>
            <!-- Category 2 -->
            <div
                style="background: var(--surface); padding: 30px; border-radius: var(--radius-md); border: 1px solid var(--border-color);">
                <h4 style="color: var(--brand-primary); margin-bottom: 20px; font-size: 1.25rem;">2. Congratulations
                    (बधाई)</h4>
                <ul style="padding-left: 20px; color: var(--text-light); line-height: 1.8;">
                    <li>परीक्षा में प्रथम आने पर मित्र को बधाई।</li>
                    <li>खेलकूद में स्वर्ण पदक जीतने पर बधाई।</li>
                    <li>नई नौकरी मिलने पर बड़े भाई को बधाई।</li>
                    <li>विवाह वर्षगाँठ पर बहन को शुभकामनाएँ।</li>
                    <li>व्यवसाय में सफलता पर चाचा जी को बधाई।</li>
                </ul>
            </div>
            <!-- Category 3 -->
            <div
                style="background: var(--surface); padding: 30px; border-radius: var(--radius-md); border: 1px solid var(--border-color);">
                <h4 style="color: var(--brand-primary); margin-bottom: 20px; font-size: 1.25rem;">3. Invitations
                    (निमंत्रण)</h4>
                <ul style="padding-left: 20px; color: var(--text-light); line-height: 1.8;">
                    <li>जन्मदिन की पार्टी में मित्र को आमंत्रण।</li>
                    <li>बहन के विवाह में शामिल होने हेतु पत्र।</li>
                    <li>गृह-प्रवेश पूजा में रिश्तेदारों को निमंत्रण।</li>
                    <li>छुट्टियाँ साथ बिताने हेतु मित्र को आमंत्रण।</li>
                    <li>वार्षिकोत्सव में भाग लेने हेतु मित्र को पत्र।</li>
                </ul>
            </div>
            <!-- Category 4 -->
            <div
                style="background: var(--surface); padding: 30px; border-radius: var(--radius-md); border: 1px solid var(--border-color);">
                <h4 style="color: var(--brand-primary); margin-bottom: 20px; font-size: 1.25rem;">4. Family & Hostel
                    (परिवार)</h4>
                <ul style="padding-left: 20px; color: var(--text-light); line-height: 1.8;">
                    <li>छात्रावास की दिनचर्या बताते हुए पिता को पत्र।</li>
                    <li>पैसे मँगवाने के लिए पिताजी को पत्र।</li>
                    <li>माताजी की अस्वस्थता का हाल जानने हेतु पत्र।</li>
                    <li>दादाजी को परीक्षा की तैयारी के बारे में बताना।</li>
                    <li>घर की याद आने का वर्णन करते हुए माता को पत्र।</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- SECTION 4: MASTER EXAMPLE BANK -->
    <section id="examples" class="section-anchor">
        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 2.5rem; color: var(--brand-dark); margin-bottom: 15px;">Master Example Bank (Perfect
                Score Models)</h2>
            <p style="color: var(--text-light); max-width: 800px; margin: 0 auto; font-size: 1.1rem;">Below are 6
                meticulously drafted specimens covering the most common examination themes. Use these as your definitive
                reference for vocabulary and tone.</p>
        </div>

        <!-- Example 1: To Father (Financial/Permission) -->
        <h3 style="color: var(--brand-primary); margin-bottom: 20px;">1. शैक्षिक भ्रमण की अनुमति हेतु पिताजी को पत्र
            (Educational Tour)</h3>
        <div class="letter-box">
            परीक्षा भवन,<br>देहरादून।<br><br>
            दिनांक: १२ सितंबर २०२६<br><br>
            पूज्य पिताजी,<br>सादर चरण स्पर्श।<br><br>
            मैं यहाँ छात्रावास में स्वस्थ और सकुशल हूँ। आशा करता हूँ कि घर पर आप, माताजी और बहन भी प्रसन्न होंगे।
            पिताजी, हमारे विद्यालय के इतिहास विभाग की ओर से अगले सप्ताह राजस्थान (जयपुर और उदयपुर) का एक पांच-दिवसीय
            शैक्षिक भ्रमण आयोजित किया जा रहा है। इस यात्रा से हमें भारत के समृद्ध इतिहास को करीब से देखने का अवसर
            मिलेगा। इस भ्रमण का कुल शुल्क ३००० रुपये है। मेरा भी इस यात्रा पर जाने का बहुत मन है। अतः आपसे अनुरोध है कि
            आप मुझे अनुमति प्रदान करें और शुल्क हेतु ३००० रुपये शीघ्र भेजने की कृपा करें।<br><br>
            माताजी को प्रणाम और बहन को प्यार।<br><br>
            आपका आज्ञाकारी पुत्र,<br>रोहित
        </div>

        <hr style="margin: 40px 0; border: none; border-top: 1px dashed var(--border-color);">

        <!-- Example 2: To Younger Sibling (Advisory) -->
        <h3 style="color: var(--brand-primary); margin-bottom: 20px;">2. संतुलित आहार हेतु छोटे भाई को सलाह पत्र
            (Balanced Diet)</h3>
        <div class="letter-box">
            ५६-ए, गोमती नगर,<br>लखनऊ।<br><br>
            दिनांक: ०५ मार्च २०२६<br><br>
            प्रिय अनुज आर्यन,<br>शुभाशीष।<br><br>
            मैं यहाँ ठीक हूँ। कल माताजी का पत्र मिला और यह जानकर चिंता हुई कि तुम घर का पौष्टिक भोजन छोड़कर केवल जंक फूड
            (पिज़्ज़ा, बर्गर) ही पसंद कर रहे हो। अनुज, जंक फूड स्वाद में अच्छे हो सकते हैं, लेकिन स्वास्थ्य के लिए ये
            हानिकारक हैं। युवावस्था में शरीर को ऊर्जा की आवश्यकता होती है, जो केवल दूध, दालों और हरी सब्ज़ियों से ही मिल
            सकती है। मुझे विश्वास है कि तुम मेरी सलाह मानोगे और आज से ही घर का शुद्ध भोजन अपनाओगे।<br><br>
            तुम्हारा बड़ा भाई,<br>विकास
        </div>

        <hr style="margin: 40px 0; border: none; border-top: 1px dashed var(--border-color);">

        <!-- Example 3: To Friend (Congratulations) -->
        <h3 style="color: var(--brand-primary); margin-bottom: 20px;">3. वाद-विवाद प्रतियोगिता में जीत पर मित्र को बधाई
            पत्र</h3>
        <div class="letter-box">
            ८८, सिविल लाइंस,<br>प्रयागराज।<br><br>
            दिनांक: २२ अगस्त २०२६<br><br>
            प्रिय मित्र आयुष,<br>सप्रेम नमस्ते।<br><br>
            यहाँ सब कुशल है। आज समाचार पत्र में तुम्हारी तस्वीर और राज्य स्तरीय वाद-विवाद प्रतियोगिता में तुम्हारे प्रथम
            आने का समाचार पढ़ा। मित्र, इस सफलता पर तुम्हें मेरी ओर से बहुत-बहुत बधाई! मुझे तुम्हारी तार्किक क्षमता पर
            पूरा विश्वास था। तुमने अपने माता-पिता और स्कूल का नाम रोशन कर दिया है। ईश्वर करे तुम इसी प्रकार सफलता के नए
            शिखर छूते रहो। अगले महीने मिलने पर हम शानदार पार्टी करेंगे।<br><br>
            तुम्हारा अभिन्न मित्र,<br>रोहित
        </div>

        <hr style="margin: 40px 0; border: none; border-top: 1px dashed var(--border-color);">

        <!-- Example 4: To Friend (Descriptive Experience) -->
        <h3 style="color: var(--brand-primary); margin-bottom: 20px;">4. मनाली की यात्रा का रोमांचक वर्णन (Hill Station
            Tour)</h3>
        <div class="letter-box">
            ३४, एमजी रोड,<br>बेंगलुरु।<br><br>
            दिनांक: १५ जुलाई २०२६<br><br>
            प्रिय मित्र अंशुल,<br>सप्रेम नमस्ते।<br><br>
            मैं तुम्हें यह बताने के लिए उत्साहित हूँ कि पिछले सप्ताह मैं अपने परिवार के साथ मनाली घूमने गया था। वह मेरी
            जीवन की सबसे रोमांचकारी यात्रा रही। पहाड़ों पर चढ़ती बस और चारों ओर देवदार के ऊँचे पेड़ देखकर मन खुश हो गया।
            हमने रोहतांग पास में बर्फ के साथ खूब मस्ती की। मैंने वहाँ स्केटिंग का भी आनंद लिया। काश, तुम भी साथ होते तो
            मज़ा दोगुना हो जाता। अंकल-आंटी को सादर प्रणाम कहना।<br><br>
            तुम्हारा अभिन्न मित्र,<br>रमन
        </div>

        <hr style="margin: 40px 0; border: none; border-top: 1px dashed var(--border-color);">

        <!-- Example 5: To Friend (Motivation after Failure) -->
        <h3 style="color: var(--brand-primary); margin-bottom: 20px;">5. परीक्षा में असफल मित्र को सांत्वना और प्रेरणा
            पत्र</h3>
        <div class="letter-box">
            २८, सिविल लाइंस,<br>प्रयागराज।<br><br>
            दिनांक: ०२ मार्च २०२६<br><br>
            प्रिय मित्र वरुण,<br>सप्रेम नमस्ते।<br><br>
            कल तुम्हारा पत्र मिला। यह जानकर दुःख हुआ कि तुम अपनी प्री-बोर्ड परीक्षा में अच्छे अंक नहीं ला सके। मित्र,
            निराश होने की ज़रूरत नहीं है। एक परीक्षा का परिणाम तुम्हारे संपूर्ण जीवन की योग्यता तय नहीं कर सकता। असफलता
            ही सफलता की पहली सीढ़ी है। अपनी गलतियों को सुधारो और दोगुनी मेहनत से मुख्य परीक्षा में जुट जाओ। मुझे तुम्हारी
            क्षमता पर पूरा विश्वास है। तुम निश्चित रूप से सफल होगे।<br><br>
            तुम्हारा सच्चा मित्र,<br>आदित्य
        </div>

        <hr style="margin: 40px 0; border: none; border-top: 1px dashed var(--border-color);">

        <!-- Example 6: Meaningful Relation (To Grandmother) -->
        <h3 style="color: var(--brand-primary); margin-bottom: 20px;">6. छुट्टियों में गाँव न जा पाने हेतु दादी जी से
            क्षमा पत्र</h3>
        <div class="letter-box">
            परीक्षा भवन,<br>नई दिल्ली।<br><br>
            दिनांक: १० मई २०२६<br><br>
            पूजनीया दादी जी,<br>सादर चरण स्पर्श।<br><br>
            मुझे अच्छी तरह याद है कि मैंने आपसे गाँव आने का वायदा किया था। लेकिन इस बार मेरा आना संभव नहीं हो सकेगा,
            क्योंकि विद्यालय ने दसवीं की बोर्ड परीक्षा के लिए विशेष अतिरिक्त कक्षाएं आयोजित करने का निर्णय लिया है। मेरी
            गणित कुछ कमज़ोर है, इसलिए इन कक्षाओं में रहना अनिवार्य है। मुझे पता है आप निराश होंगी, पर मेरी पढ़ाई के लिए यह
            आवश्यक है। मैं दिवाली की छुट्टियों में निश्चित रूप से आपसे मिलने आऊँगा। अपना ध्यान रखिएगा।<br><br>
            आपका पोता,<br>क. ख. ग.
        </div>
    </section>

    <!-- SECTION 5: GRADE-SPECIFIC MASTERCLASSES -->
    <section id="classes" class="section-anchor">
        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 2.5rem; color: var(--brand-dark); margin-bottom: 15px;">Grade-Specific Success
                Blueprints</h2>
            <p style="color: var(--text-light); max-width: 800px; margin: 0 auto; font-size: 1.1rem;">An examiner's
                expectation from a Class 5 student is radically different from a Class 12 board candidate. Find your
                exact academic level below.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
            <!-- Class 5 -->
            <div
                style="background: white; padding: 40px; border-radius: var(--radius-md); border-top: 5px solid #3b82f6; box-shadow: var(--shadow-sm);">
                <h4 style="color: var(--brand-dark); font-size: 1.5rem; margin-bottom: 15px;">Elementary (Class 5)</h4>
                <p style="color: var(--text-light); line-height: 1.6; margin-bottom: 20px;"><strong>Focus:</strong>
                    Extreme Simplicity & Spelling (Matra).</p>
                <ul style="padding-left: 18px; color: var(--text-light); font-size: 0.95rem; line-height: 1.8;">
                    <li>Keep sentences short (5-7 words).</li>
                    <li>One single, clean paragraph is enough.</li>
                    <li>Objective: Write 50-70 words accurately.</li>
                </ul>
            </div>
            <!-- Class 9 & 10 -->
            <div
                style="background: white; padding: 40px; border-radius: var(--radius-md); border-top: 5px solid #f59e0b; box-shadow: var(--shadow-sm);">
                <h4 style="color: var(--brand-dark); font-size: 1.5rem; margin-bottom: 15px;">Secondary (Class 9-10)
                </h4>
                <p style="color: var(--text-light); line-height: 1.6; margin-bottom: 20px;"><strong>Focus:</strong>
                    Format Mastery & 3-Paragraph Logic.</p>
                <ul style="padding-left: 18px; color: var(--text-light); font-size: 0.95rem; line-height: 1.8;">
                    <li>Strict Left-Aligned format is mandatory.</li>
                    <li>3 Paragraphs: Sociality -> Core -> Closing.</li>
                    <li>Requirement: 100-120 words in 7 minutes.</li>
                </ul>
            </div>
            <!-- Class 12 -->
            <div
                style="background: white; padding: 40px; border-radius: var(--radius-md); border-top: 5px solid #10b981; box-shadow: var(--shadow-sm);">
                <h4 style="color: var(--brand-dark); font-size: 1.5rem; margin-bottom: 15px;">Senior (Class 12)</h4>
                <p style="color: var(--text-light); line-height: 1.6; margin-bottom: 20px;"><strong>Focus:</strong>
                    'Sahityik' Vocabulary & Philosophy.</p>
                <ul style="padding-left: 18px; color: var(--text-light); font-size: 0.95rem; line-height: 1.8;">
                    <li>Use Sanskritized words (e.g., आत्मग्लानि, संकट).</li>
                    <li>Add philosophical analogies (e.g., Arjun's focus).</li>
                    <li>Requirement: 150+ words with deep emotional IQ.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- SECTION 6: MISCONCEPTION CLEARING -->
    <section id="misconceptions" class="section-anchor">
        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 2.5rem; color: var(--brand-dark); margin-bottom: 15px;">Factual Resolution Hub</h2>
            <p style="color: var(--text-light); max-width: 800px; margin: 0 auto; font-size: 1.1rem;">Common 'Keyword'
                traps that lead to exam failure. Learn the critical difference between Anopcharik and Aupcharik labels.
            </p>
        </div>

        <div
            style="background: #fff; padding: 40px; border-radius: var(--radius-lg); border: 2px solid #ef4444; position: relative; overflow: hidden;">
            <div
                style="position: absolute; top: 0; right: 0; background: #ef4444; color: white; padding: 10px 25px; font-weight: 800; text-transform: uppercase;">
                The Formal Trap</div>

            <h3 style="color: #b91c1c; margin-bottom: 25px;">The Bank Manager & Bus Conductor Paradox</h3>
            <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 20px; font-size: 1.1rem;">Many students
                search for "Anopcharik Patra to Bank Manager" because of misleading internet search trends. <strong>THIS
                    IS A FATAL ERROR.</strong></p>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                <div style="background: #fef2f2; padding: 25px; border-radius: var(--radius-md);">
                    <h4 style="color: #991b1b; margin-bottom: 15px;">Case 1: Bank Manager</h4>
                    <p style="color: var(--text-light); font-size: 0.95rem;">Even if you have a "personal" acquaintance
                        with a bank manager, a letter requesting a cheque book or loan follows the <strong>FORMAL
                            (Aupcharik)</strong> protocol. You must include a 'Subject' line and strict formal
                        salutations (Mahoday/Mahodaya).</p>
                </div>
                <div style="background: #fef2f2; padding: 25px; border-radius: var(--radius-md);">
                    <h4 style="color: #991b1b; margin-bottom: 15px;">Case 2: Bus Conductor / Depot Manager</h4>
                    <p style="color: var(--text-light); font-size: 0.95rem;">Complaining about behavior or reporting
                        lost property to a bus conductor is a <strong>Service Request</strong>. This is never informal.
                        Do not use personal greetings like "Namaste" here.</p>
                </div>
            </div>

            <div
                style="margin-top: 40px; padding: 20px; background: #fffbeb; border: 1px solid #f59e0b; border-radius: var(--radius-md);">
                <p style="color: #92400e; font-weight: 700; margin: 0;">Board Rule: When in doubt, if the recipient is a
                    Professional/Official entity, use the FORMAL layout, NOT the Informal one displayed on this portal.
                </p>
            </div>
        </div>
    </section>

    <hr style="margin: 60px 0; border: none; border-top: 1px solid var(--border-color);">

    <!-- SECTION 7: MULTILINGUAL LOGIC (SANSKRIT & MARATHI) -->
    <section id="regional" class="section-anchor" style="padding-bottom: 80px;">
        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 2.5rem; color: var(--brand-dark); margin-bottom: 15px;">Multilingual Logic: Beyond
                Hindi</h2>
            <p style="color: var(--text-light); max-width: 800px; margin: 0 auto; font-size: 1.1rem;">The 'Block Format'
                is universal. Learn how to convert your Hindi logic into perfect Sanskrit and Marathi specimens without
                losing marks.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
            <!-- Sanskrit Logic -->
            <div
                style="background: var(--surface); padding: 40px; border-radius: var(--radius-lg); border-left: 5px solid #6366f1;">
                <h3 style="color: var(--brand-dark); margin-bottom: 20px;">Sanskrit (अनौपचारिकं पत्रम्)</h3>
                <p style="color: var(--text-light); margin-bottom: 20px;">The mathematical purity of Sanskrit requires
                    specific anchors. Use these to bridge from Hindi:</p>
                <ul style="color: var(--text-light); line-height: 2;">
                    <li><strong>Opening:</strong> <em>अत्र कुशलं तत्रास्तु।</em> (Always start here).</li>
                    <li><strong>Elders:</strong> <em>परमपूज्य पितृमहोदय / सादरं प्रणमामि।</em></li>
                    <li><strong>Friend:</strong> <em>प्रिय मित्र / सप्रेम नमोनमः।</em></li>
                    <li><strong>Closing:</strong> <em>भवतः आज्ञाकारी पुत्रः / मित्रम्।</em></li>
                </ul>
            </div>

            <!-- Marathi Logic -->
            <div
                style="background: var(--surface); padding: 40px; border-radius: var(--radius-lg); border-left: 5px solid #ec4899;">
                <h3 style="color: var(--brand-dark); margin-bottom: 20px;">Marathi (अनौपचारिक पत्र)</h3>
                <p style="color: var(--text-light); margin-bottom: 20px;">Maharashtra state boards use unique markers.
                    Avoid using Hindi words here:</p>
                <ul style="color: var(--text-light); line-height: 2;">
                    <li><strong>Salutation:</strong> <em>तीर्थरूप बाबांस</em> (Tirtharoop - Exclusive to parents).</li>
                    <li><strong>Greeting:</strong> <em>साष्टांग नमस्कार</em> (Sashtang Namaskar).</li>
                    <li><strong>Friend:</strong> <em>सस्नेह नमस्कार</em> (Sasneh Namaskar).</li>
                    <li><strong>Closing:</strong> <em>तुमचा नम्र / आपला लाडका.</em></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- SECTION 8: THE ULTIMATE PORTAL ROADMAP (QUICK DIRECTORY) -->
    <section id="roadmap" class="section-anchor" style="padding: 100px 0; background: #fff;">
        <div class="container">
            <div style="text-align: center; margin-bottom: 60px;">
                <h2 style="font-size: 2.5rem; color: var(--brand-dark); margin-bottom: 15px;">Your Visual Roadmap to
                    Mastery</h2>
                <p style="color: var(--text-light); max-width: 800px; margin: 0 auto; font-size: 1.1rem;">Navigate our
                    comprehensive resource library in one click. From foundation to regional linguistic mastery.</p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px;">
                <a href="#foundation"
                    style="display: block; padding: 25px; background: var(--bg-main); border-radius: var(--radius-md); text-align: center; border: 1px solid var(--border-color);">
                    <span style="display: block; font-size: 1.5rem; margin-bottom: 10px;">📚</span>
                    <strong style="display: block; color: var(--brand-dark); margin-bottom: 5px;">1. Foundation</strong>
                    <span style="font-size: 0.85rem; color: var(--text-muted);">Meaning & History</span>
                </a>
                <a href="#format"
                    style="display: block; padding: 25px; background: var(--bg-main); border-radius: var(--radius-md); text-align: center; border: 1px solid var(--border-color);">
                    <span style="display: block; font-size: 1.5rem; margin-bottom: 10px;">📐</span>
                    <strong style="display: block; color: var(--brand-dark); margin-bottom: 5px;">2. Master
                        Format</strong>
                    <span style="font-size: 0.85rem; color: var(--text-muted);">The 7 Pillars</span>
                </a>
                <a href="#topics"
                    style="display: block; padding: 25px; background: var(--bg-main); border-radius: var(--radius-md); text-align: center; border: 1px solid var(--border-color);">
                    <span style="display: block; font-size: 1.5rem; margin-bottom: 10px;">📂</span>
                    <strong style="display: block; color: var(--brand-dark); margin-bottom: 5px;">3. Topic
                        Library</strong>
                    <span style="font-size: 0.85rem; color: var(--text-muted);">50+ Prompts</span>
                </a>
                <a href="#examples"
                    style="display: block; padding: 25px; background: var(--bg-main); border-radius: var(--radius-md); text-align: center; border: 1px solid var(--border-color);">
                    <span style="display: block; font-size: 1.5rem; margin-bottom: 10px;">✍️</span>
                    <strong style="display: block; color: var(--brand-dark); margin-bottom: 5px;">4. Specimen
                        Bank</strong>
                    <span style="font-size: 0.85rem; color: var(--text-muted);">6 Detailed Models</span>
                </a>
                <a href="#classes"
                    style="display: block; padding: 25px; background: var(--bg-main); border-radius: var(--radius-md); text-align: center; border: 1px solid var(--border-color);">
                    <span style="display: block; font-size: 1.5rem; margin-bottom: 10px;">🎓</span>
                    <strong style="display: block; color: var(--brand-dark); margin-bottom: 5px;">5. Grade
                        Guides</strong>
                    <span style="font-size: 0.85rem; color: var(--text-muted);">Class 5 to 12</span>
                </a>
                <a href="#misconceptions"
                    style="display: block; padding: 25px; background: var(--bg-main); border-radius: var(--radius-md); text-align: center; border: 1px solid var(--border-color);">
                    <span style="display: block; font-size: 1.5rem; margin-bottom: 10px;">⚠️</span>
                    <strong style="display: block; color: var(--brand-dark); margin-bottom: 5px;">6. Fact Hub</strong>
                    <span style="font-size: 0.85rem; color: var(--text-muted);">Formal Trap Alerts</span>
                </a>
                <a href="#regional"
                    style="display: block; padding: 25px; background: var(--bg-main); border-radius: var(--radius-md); text-align: center; border: 1px solid var(--border-color);">
                    <span style="display: block; font-size: 1.5rem; margin-bottom: 10px;">🌐</span>
                    <strong style="display: block; color: var(--brand-dark); margin-bottom: 5px;">7.
                        Multilingual</strong>
                    <span style="font-size: 0.85rem; color: var(--text-muted);">Sanskrit & Marathi</span>
                </a>
            </div>
        </div>
    </section>

    <hr style="margin: 60px 0; border: none; border-top: 1px solid var(--border-color);">


    <!-- SEO CONTENT ENGINE (Dynamically pulled from keyword.txt, visually hidden from users but active for crawlers) -->
    <div
        style="position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0,0,0,0); border: 0;">
        <?php
        $keyword_file = __DIR__ . '/keyword.txt';
        if (file_exists($keyword_file)) {
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