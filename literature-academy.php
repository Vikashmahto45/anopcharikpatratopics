<?php include('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="hi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Literature Academy: Master 65 Hindi & English Chapters</title>
    <meta name="description"
        content="The ultimate Literature Academy. Find deep-dive summaries, character sketches, and board-exam Q&A for 35 Hindi Course B chapters and 30 English First Flight & Footprints chapters.">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Outfit:wght@400;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #8b5cf6;
            --secondary: #6d28d9;
            --accent: #f59e0b;
            --bg-light: #f5f3ff;
            --text-dark: #1e1b4b;
        }

        .academy-wrap {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
            font-family: 'Inter', sans-serif;
            color: var(--text-dark);
        }

        .hero-banner {
            background: linear-gradient(135deg, #4c1d95 0%, #1e1b4b 100%);
            color: white;
            padding: 80px 40px;
            border-radius: 30px;
            text-align: center;
            margin-bottom: 50px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .hero-banner h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 3.5rem;
            margin-bottom: 15px;
        }

        .category-section {
            margin-bottom: 60px;
        }

        .category-title {
            font-family: 'Outfit', sans-serif;
            font-size: 2.2rem;
            color: var(--secondary);
            margin-bottom: 30px;
            border-left: 8px solid var(--accent);
            padding-left: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .chapter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .chapter-link {
            background: white;
            padding: 20px;
            border-radius: 15px;
            border: 1px solid #e2e8f0;
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .chapter-link:hover {
            transform: translateY(-3px);
            border-color: var(--primary);
            color: var(--primary);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .chapter-icon {
            font-size: 1.2rem;
            opacity: 0.7;
        }

        .stats-bar {
            background: white;
            padding: 20px;
            border-radius: 20px;
            display: flex;
            justify-content: space-around;
            margin-bottom: 40px;
            border: 1px solid #e2e8f0;
        }

        .stat-item {
            text-align: center;
        }

        .stat-val {
            display: block;
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
        }

        .stat-label {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.6;
        }

        @media(max-width: 768px) {
            .hero-banner h1 {
                font-size: 2.5rem;
            }

            .chapter-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <?php include('includes/header.php'); ?>

    <div class="academy-wrap">
        <div class="hero-banner">
            <h1>The Literature Academy</h1>
            <p>65 High-Authority Deep Dives | Character Sketches | Board Exam Solutions</p>
        </div>

        <!-- PHASE 3: INTERACTIVE UTILITY INTEGRATION -->
        <div
            style="background: white; border: 2px solid var(--primary); border-radius: 24px; padding: 40px; margin-bottom: 50px; display: flex; align-items: center; gap: 30px; box-shadow: 0 20px 25px -5px rgba(139, 92, 246, 0.1);">
            <div style="flex: 1;">
                <span
                    style="background: #f5f3ff; color: var(--primary); padding: 4px 12px; border-radius: 8px; font-weight: 700; font-size: 0.8rem; text-transform: uppercase;">New
                    Interactive Tool</span>
                <h2 style="font-family: 'Outfit', sans-serif; font-size: 2rem; margin: 10px 0;">Character Comparison
                    Engine</h2>
                <p style="color: #64748b; margin-bottom: 20px;">Master the complex art of character analysis. Contrast
                    protagonists from different chapters to understand their psychological depth and motivations.</p>
                <a href="character-comparison.php" class="chapter-link"
                    style="background: var(--primary); color: white; border: none; display: inline-block;">Launch
                    Comparison Engine →</a>
            </div>
            <div style="flex: 1; display: flex; gap: 10px; opacity: 0.8;">
                <div
                    style="flex: 1; height: 120px; background: #fee2e2; border-radius: 12px; border: 2px solid #ef4444; display: flex; align-items: center; justify-content: center; font-weight: 800; color: #ef4444;">
                    Lencho</div>
                <div style="align-self: center; font-weight: 900; color: #1e1b4b;">VS</div>
                <div
                    style="flex: 1; height: 120px; background: #dbeafe; border-radius: 12px; border: 2px solid #3b82f6; display: flex; align-items: center; justify-content: center; font-weight: 800; color: #3b82f6;">
                    Valli</div>
            </div>
        </div>

        <div class="stats-bar">
            <div class="stat-item">
                <span class="stat-val">35</span>
                <span class="stat-label">Hindi Chapters</span>
            </div>
            <div class="stat-item">
                <span class="stat-val">30</span>
                <span class="stat-label">English Chapters</span>
            </div>
            <div class="stat-item">
                <span class="stat-val">65,000+</span>
                <span class="stat-label">Words of Authority</span>
            </div>
        </div>

        <!-- PHASE 3: INTERACTIVE ASSESSMENT INTEGRATION -->
        <div
            style="background: white; border: 2px solid #14b8a6; border-radius: 24px; padding: 40px; margin-bottom: 50px; display: flex; align-items: center; gap: 30px; box-shadow: 0 20px 25px -5px rgba(20, 184, 166, 0.1);">
            <div style="flex: 1;">
                <span
                    style="background: #f0fdfa; color: #14b8a6; padding: 4px 12px; border-radius: 8px; font-weight: 700; font-size: 0.8rem; text-transform: uppercase;">Mastery
                    Assessment</span>
                <h2 style="font-family: 'Outfit', sans-serif; font-size: 2rem; margin: 10px 0;">MCQ Practice Engine</h2>
                <p style="color: #64748b; margin-bottom: 20px;">Test your grasp of core literary themes with our
                    automated MCQ engine. Instant feedback and detailed board-exam explanations for every answer.</p>
                <a href="mcq-practice-engine.php" class="chapter-link"
                    style="background: #14b8a6; color: white; border: none; display: inline-block;">Start Practice Quiz
                    →</a>
            </div>
            <div style="flex: 1; position: relative;">
                <div
                    style="background: white; padding: 20px; border-radius: 12px; border: 1px solid #e2e8f0; transform: rotate(-2deg); box-shadow: 0 10px 15px rgba(0,0,0,0.05);">
                    <div
                        style="width: 20px; height: 20px; border-radius: 50%; border: 2px solid #14b8a6; margin-bottom: 10px;">
                    </div>
                    <div style="width: 80%; height: 8px; background: #f1f5f9; border-radius: 4px;"></div>
                </div>
                <div
                    style="background: white; padding: 20px; border-radius: 12px; border: 2px solid #14b8a6; position: absolute; top: 10px; left: 20px; width: 100%; box-shadow: 0 10px 15px rgba(0,0,0,0.1);">
                    <div
                        style="width: 20px; height: 20px; border-radius: 50%; background: #14b8a6; margin-bottom: 10px;">
                    </div>
                    <div style="width: 60%; height: 8px; background: #14b8a6; opacity: 0.2; border-radius: 4px;"></div>
                </div>
            </div>
        </div>

        <!-- ENGLISH LITERATURE SECTION -->
        <section class="category-section">
            <h2 class="category-title">
                English (First Flight & Footprints)
                <span style="font-size: 1rem; font-weight: 400; opacity: 0.6;">30 Total Guides</span>
            </h2>
            <div class="chapter-grid">
                <a href="a-letter-to-god-summary.php" class="chapter-link"><span class="chapter-icon">📖</span> A Letter
                    to God</a>
                <a href="nelson-mandela-summary.php" class="chapter-link"><span class="chapter-icon">📖</span> Nelson
                    Mandela</a>
                <a href="two-stories-about-flying-summary.php" class="chapter-link"><span class="chapter-icon">📖</span>
                    Two Stories About Flying</a>
                <a href="from-the-diary-of-anne-frank-summary.php" class="chapter-link"><span
                        class="chapter-icon">📖</span> From the Diary of Anne Frank</a>
                <a href="a-baker-from-goa-summary.php" class="chapter-link"><span class="chapter-icon">📖</span> A Baker
                    from Goa</a>
                <a href="coorg-summary.php" class="chapter-link"><span class="chapter-icon">📖</span> Coorg</a>
                <a href="tea-from-assam-summary.php" class="chapter-link"><span class="chapter-icon">📖</span> Tea from
                    Assam</a>
                <a href="mijbil-the-otter-summary.php" class="chapter-link"><span class="chapter-icon">📖</span> Mijbil
                    the Otter</a>
                <a href="madam-rides-the-bus-summary.php" class="chapter-link"><span class="chapter-icon">📖</span>
                    Madam Rides the Bus</a>
                <a href="the-sermon-at-benares-summary.php" class="chapter-link"><span class="chapter-icon">📖</span>
                    The Sermon at Benares</a>
                <a href="the-proposal-summary.php" class="chapter-link"><span class="chapter-icon">📖</span> The
                    Proposal</a>
                <a href="dust-of-snow-summary.php" class="chapter-link"><span class="chapter-icon">🖋️</span> Dust of
                    Snow</a>
                <a href="fire-and-ice-summary.php" class="chapter-link"><span class="chapter-icon">🖋️</span> Fire and
                    Ice</a>
                <a href="a-tiger-in-the-zoo-summary.php" class="chapter-link"><span class="chapter-icon">🖋️</span> A
                    Tiger in the Zoo</a>
                <a href="how-to-tell-wild-animals-summary.php" class="chapter-link"><span
                        class="chapter-icon">🖋️</span> How to Tell Wild Animals</a>
                <a href="the-ball-poem-summary.php" class="chapter-link"><span class="chapter-icon">🖋️</span> The Ball
                    Poem</a>
                <a href="amanda-summary.php" class="chapter-link"><span class="chapter-icon">🖋️</span> Amanda!</a>
                <a href="the-trees-summary.php" class="chapter-link"><span class="chapter-icon">🖋️</span> The Trees</a>
                <a href="fog-summary.php" class="chapter-link"><span class="chapter-icon">🖋️</span> Fog</a>
                <a href="tale-of-custard-the-dragon-summary.php" class="chapter-link"><span
                        class="chapter-icon">🖋️</span> Tale of Custard the Dragon</a>
                <a href="for-anne-gregory-summary.php" class="chapter-link"><span class="chapter-icon">🖋️</span> For
                    Anne Gregory</a>
                <a href="a-triumph-of-surgery-summary.php" class="chapter-link"><span class="chapter-icon">👟</span> A
                    Triumph of Surgery</a>
                <a href="the-thiefs-story-summary.php" class="chapter-link"><span class="chapter-icon">👟</span> The
                    Thief's Story</a>
                <a href="the-midnight-visitor-summary.php" class="chapter-link"><span class="chapter-icon">👟</span> The
                    Midnight Visitor</a>
                <a href="a-question-of-trust-summary.php" class="chapter-link"><span class="chapter-icon">👟</span> A
                    Question of Trust</a>
                <a href="footprints-without-feet-summary.php" class="chapter-link"><span class="chapter-icon">👟</span>
                    Footprints without Feet</a>
                <a href="the-making-of-a-scientist-summary.php" class="chapter-link"><span
                        class="chapter-icon">👟</span> The Making of a Scientist</a>
                <a href="the-necklace-summary.php" class="chapter-link"><span class="chapter-icon">👟</span> The
                    Necklace</a>
                <a href="bholi-summary.php" class="chapter-link"><span class="chapter-icon">👟</span> Bholi</a>
                <a href="the-book-that-saved-the-earth-summary.php" class="chapter-link"><span
                        class="chapter-icon">👟</span> The Book That Saved the Earth</a>
            </div>
        </section>

        <!-- HINDI LITERATURE SECTION -->
        <section class="category-section">
            <h2 class="category-title">
                Hindi Course B (Sparsh & Sanchayan)
                <span style="font-size: 1rem; font-weight: 400; opacity: 0.6;">35 Total Guides</span>
            </h2>
            <div class="chapter-grid">
                <a href="bade-bhai-sahab-summary.php" class="chapter-link"><span class="chapter-icon">📙</span> बड़े भाई
                    साहब</a>
                <a href="diary-ka-ek-panna-summary.php" class="chapter-link"><span class="chapter-icon">📙</span> डायरी
                    का एक पन्ना</a>
                <a href="tatara-vamiro-katha-summary.php" class="chapter-link"><span class="chapter-icon">📙</span>
                    तताँरा-वामीरो कथा</a>
                <a href="teesri-kasam-ke-shilpkar-shailendra-summary.php" class="chapter-link"><span
                        class="chapter-icon">📙</span> तीसरी कसम के शिल्पकार</a>
                <a href="girgit-summary.php" class="chapter-link"><span class="chapter-icon">📙</span> गिरगिट</a>
                <a href="ab-kahan-doosre-ke-dukh-mein-dukhi-hone-wale-summary.php" class="chapter-link"><span
                        class="chapter-icon">📙</span> अब कहाँ दूसरों के दुख में...</a>
                <a href="nowbat-khane-mein-ibadat-summary.php" class="chapter-link"><span class="chapter-icon">📙</span>
                    नौबतखाने में इबादत</a>
                <a href="sanskriti-summary.php" class="chapter-link"><span class="chapter-icon">📙</span> संस्कृति</a>
                <a href="kabir-ki-sakhi-summary.php" class="chapter-link"><span class="chapter-icon">🌸</span> कबीर की
                    साखी</a>
                <a href="meera-ke-pad-summary.php" class="chapter-link"><span class="chapter-icon">🌸</span> मीरा के
                    पद</a>
                <a href="manushyata-summary.php" class="chapter-link"><span class="chapter-icon">🌸</span> मनुष्यता</a>
                <a href="parvat-pradesh-mein-pawas-summary.php" class="chapter-link"><span
                        class="chapter-icon">🌸</span> पर्वत प्रदेश में पावस</a>
                <a href="madhur-madhur-mere-deepak-jal-summary.php" class="chapter-link"><span
                        class="chapter-icon">🌸</span> मधुर-मधुर मेरे दीपक जल</a>
                <a href="top-summary.php" class="chapter-link"><span class="chapter-icon">🌸</span> तोप</a>
                <a href="kar-chale-hum-fida-summary.php" class="chapter-link"><span class="chapter-icon">🌸</span> कर
                    चले हम फ़िदा</a>
                <a href="atmatran-summary.php" class="chapter-link"><span class="chapter-icon">🌸</span> आत्मत्राण</a>
                <a href="harihar-kaka-summary.php" class="chapter-link"><span class="chapter-icon">📚</span> हरिहर
                    काका</a>
                <a href="sapnon-ke-se-din-summary.php" class="chapter-link"><span class="chapter-icon">📚</span> सपनों
                    के-से दिन</a>
                <a href="topi-shukla-summary.php" class="chapter-link"><span class="chapter-icon">📚</span> टोपी
                    शुक्ला</a>
                <a href="surdas-ke-pad-summary.php" class="chapter-link"><span class="chapter-icon">📙</span> सूरदास के
                    पद</a>
                <a href="ram-lakshman-parshuram-sanvad-summary.php" class="chapter-link"><span
                        class="chapter-icon">📙</span> राम-लक्ष्मण-परशुराम संवाद</a>
                <a href="sanskriti-summary.php" class="chapter-link"><span class="chapter-icon">📙</span> संस्कृति</a>
                <a href="balgobin-bhagat-summary.php" class="chapter-link"><span class="chapter-icon">📙</span> बालगोबिन
                    भगत</a>
                <a href="lakhnavi-andaaz-summary.php" class="chapter-link"><span class="chapter-icon">📙</span> लखनवी
                    अंदाज़</a>
                <a href="ek-kahani-yeh-bhi-summary.php" class="chapter-link"><span class="chapter-icon">📙</span> एक
                    कहानी यह भी</a>
                <a href="nowbat-khane-mein-ibadat-summary.php" class="chapter-link"><span class="chapter-icon">📙</span>
                    नौबतखाने में इबादत</a>
                <a href="atmakathya-summary.php" class="chapter-link"><span class="chapter-icon">🌸</span> आत्मकथ्य</a>
                <a href="utsah-at-nahi-rahi-hai-summary.php" class="chapter-link"><span class="chapter-icon">🌸</span>
                    उत्साह और अट नहीं रही है</a>
                <a href="yah-danturit-muskan-fasal-summary.php" class="chapter-link"><span
                        class="chapter-icon">🌸</span> यह दंतुरित मुस्कान और फसल</a>
                <a href="sangatkar-summary.php" class="chapter-link"><span class="chapter-icon">🌸</span> संगतकार</a>
                <a href="mata-ka-anchal-summary.php" class="chapter-link"><span class="chapter-icon">📚</span> माता का
                    अंचल</a>
                <a href="sana-sana-hath-jodi-summary.php" class="chapter-link"><span class="chapter-icon">📚</span>
                    साना-साना हाथ जोड़ी</a>
                <a href="main-kyun-likhta-hun-summary.php" class="chapter-link"><span class="chapter-icon">📚</span> मैं
                    क्यों लिखता हूँ?</a>
                <a href="ginnita-ka-sona-summary.php" class="chapter-link"><span class="chapter-icon">📙</span> गिन्नी
                    का सोना</a>
                <a href="kartoos-summary.php" class="chapter-link"><span class="chapter-icon">📙</span> कारतूस</a>
            </div>
        </section>

        <div
            style="text-align: center; margin-top: 50px; padding: 40px; background: white; border-radius: 20px; border: 1px solid #e2e8f0;">
            <h3>Expert Board Preparation</h3>
            <p>Every guide is crafted manually to ensure 100% emotional and factual accuracy for secondary students.</p>
            <a href="index.php" class="stat-label"
                style="text-decoration: none; color: var(--primary); font-weight: 700;">← Back to Main Portal</a>
        </div>

    </div>

    <?php include('includes/footer.php'); ?>

</body>

</html>