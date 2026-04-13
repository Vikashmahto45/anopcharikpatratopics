<?php require_once __DIR__ . "/includes/header.php"; ?>

<div class="hero-mini"
    style="background: linear-gradient(135deg, var(--brand-dark) 0%, var(--brand-primary) 100%); color: white; padding: 60px 20px; text-align: center; border-radius: 0 0 40px 40px; margin-bottom: 50px;">
    <h1 style="font-size: 2.8rem; font-weight: 800; margin-bottom: 15px;">Patra Master Bank</h1>
    <p style="font-size: 1.1rem; opacity: 0.9; max-width: 700px; margin: 0 auto;">A complete repository of 34 unique
        Anopcharik Patra (Informal Letter) topics, meticulously drafted for students and academic excellence.</p>
</div>

<div class="container">
    <div class="grid-heading">
        <span
            style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 2px; color: var(--brand-primary); font-weight: 700;">Topic
            Library</span>
        <h2>Explore 34 Letter Varieties</h2>
    </div>

    <div class="topic-grid">
        <?php
        $topics = [
            ['10-anopcharik-patra-in-hindi-for-class-9.php', '10 Patra Collection for Class 9', 'A curated set of 10 essential informal letters specifically for the Class 9 curriculum.'],
            ['2-anopcharik-patra-in-hindi.php', 'Core Informal Examples', 'Two foundational models showing traditional vs modern informal letter styles.'],
            ['3-anopcharik-patra-in-hindi.php', 'Essential Letter Models', 'Three high-scoring models covering family and social obligations.'],
            ['5-anopcharik-patra-in-hindi.php', 'Top 5 Practice Examples', 'The most frequently asked examination topics in informal writing.'],
            ['anopcharik-patra-bank-manager-ko.php', 'Letter to Bank Manager', 'How to write a personal yet professional request to a bank manager.'],
            ['anopcharik-patra-bus-conductor.php', 'Letter to Bus Conductor', 'Learning how to communicate regarding lost items or service feedback.'],
            ['anopcharik-patra-class-10th.php', 'Class 10 Board Essentials', 'Master the exact weightage and marking scheme for Class 10 boards.'],
            ['anopcharik-patra-class-12.php', 'Class 12 Senior Format', 'Advanced vocabulary and complex themes for senior secondary students.'],
            ['anopcharik-patra-class-9.php', 'Class 9 Study Material', 'Fundamental concepts and structure for early secondary levels.'],
            ['anopcharik-patra-example.php', 'Solved Model Bank', 'A gallery of perfectly drafted informal letters ready for reference.'],
            ['anopcharik-patra-format-class-9.php', 'Class 9 Structure Guide', 'Deep dive into the left-aligned block format used in schools.'],
            ['anopcharik-patra-format.php', 'Global Informal Format', 'The definitive modern layout for all unofficial correspondence.'],
            ['anopcharik-patra-hindi.php', 'Core Grammar Rules', 'Specific Hindi grammar and syntax tips for informal writing.'],
            ['anopcharik-patra-in-hindi.php', 'Ultimate Writing Guide', 'Our flagship guide on the art of personal expression in Hindi.'],
            ['anopcharik-patra-in-marathi.php', 'Marathi Language Hub', 'Regional variations and formats for Marathi informal letters.'],
            ['anopcharik-patra-in-sanskrit.php', 'Sanskrit Translation', 'Classical language adaptations of informal letter writing.'],
            ['anopcharik-patra-ka-arup.php', 'Visual Layout Guide', 'A diagrammatic approach to understanding the spacing and margins.'],
            ['anopcharik-patra-lekhan-kise-kahate-hain.php', 'Conceptual Definition', 'Deep understanding of when and why to write informal letters.'],
            ['anopcharik-patra-lekhan.php', 'Core Techniques', 'The psychology and emotional tone required for informal writing.'],
            ['anopcharik-patra-madhur-smrutiya.php', 'Beautiful Memories', 'Topics focused on nostalgia, past events, and shared history.'],
            ['anopcharik-patra-questions.php', 'Board Question Bank', 'A massive list of potential topics for intensive practice.'],
            ['anopcharik-patra-to-friend.php', 'Letters to Friends', 'Mastering the casual and affectionate tone for your peers.'],
            ['anopcharik-patra-topics-in-hindi.php', 'The Complete List', 'A bird\'s eye view of all possible informal letter categories.'],
            ['anopcharik-patra-wikipedia.php', 'Academic Fundamentals', 'Historical and cultural context of letter writing as a skill.'],
            ['anopcharik-patra.php', 'Meaning & Significance', 'The core definition and relevance of personal letters today.'],
            ['apne-mummy-ko-anopcharik-patra.php', 'Letter to Mother', 'Learning the respectful and loving tone for family matriarchs.'],
            ['aupcharik-aur-anopcharik-patra.php', 'Comparison Guide', 'A clear distinction between formal and informal domains.'],
            ['best-anopcharik-patra-in-hindi.php', 'Premium Models', 'The most sophisticated and well-structured samples in our library.'],
            ['class-5-hindi-anopcharik-patra-topic.php', 'Junior School Hub', 'Simplified language and topics for entry-level students.'],
            ['do-anopcharik-patra.php', 'Twin Sample Set', 'Comparative analysis of two different informal scenarios.'],
            ['hindi-me-anopcharik-patra.php', 'Holistic Resource', 'A comprehensive portal covering all aspects of Hindi letters.'],
            ['kachra-prabandhan-par-anopcharik-patra.php', 'Civic Awareness', 'Writing to neighbors or family about social responsibility.'],
            ['short-anopcharik-patra.php', 'Quick Templates', 'Brevity and efficiency in personal correspondence.'],
            ['what-is-the-format-of-anopcharik-patra-in-hindi.php', 'Format Solution', 'Direct answers to the most common format confusion.']
        ];

        foreach ($topics as $topic) {
            echo '
            <div class="topic-card">
                <h3><a href="' . url($topic[0]) . '">' . $topic[1] . '</a></h3>
                <p>' . $topic[2] . '</p>
                <a href="' . url($topic[0]) . '" class="btn-text" style="margin-top: 15px; color: var(--brand-primary); font-weight: 700; display: inline-block;">View Full Guide →</a>
            </div>';
        }
        ?>
    </div>
</div>

<style>
    .hero-mini h1,
    .hero-mini p {
        margin: 0;
    }

    .btn-text:hover {
        text-decoration: underline;
    }
</style>

<?php require_once __DIR__ . "/includes/footer.php"; ?>