<?php require_once __DIR__ . "/includes/header.php"; ?>

<div class="hero-mini" style="background: linear-gradient(135deg, var(--brand-dark) 0%, var(--brand-primary) 100%); color: white; padding: 60px 20px; text-align: center; border-radius: 0 0 40px 40px; margin-bottom: 50px;">
    <h1 style="font-size: 2.8rem; font-weight: 800; margin-bottom: 15px;">Patra Master Bank</h1>
    <p style="font-size: 1.1rem; opacity: 0.9; max-width: 700px; margin: 0 auto;">A complete repository of Anopcharik Patra (Informal Letter) topics, meticulously drafted for students and academic excellence.</p>
</div>

<div class="container">
    <div class="grid-heading">
        <span style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 2px; color: var(--brand-primary); font-weight: 700;">Topic Library</span>
        <h2>Explore The Authority Hubs</h2>
    </div>

    <div class="topic-grid">
        <?php
        $topics = [
            ['anopcharik-patra-grammar-rules.php', 'Grammar Rules & Format Blueprint', 'The definitive guide on exact margins, structural definitions, and essential formatting rules.'],
            ['anopcharik-patra-class-9-10.php', 'Class 9 & 10 Examination Guide', 'Marking schemes, standard board questions, and advanced high-scoring vocabulary for Junior & Middle schoolers.'],
            ['anopcharik-patra-class-12.php', 'Class 12 Advanced Models', 'Philosophical advice letters, deep apologies, and Sahityik-level Hindi translations.'],
            ['anopcharik-patra-family-friends.php', 'Family & Friends Core Scenarios', 'The nuanced differences between writing to a reverent mother versus an equal friend.']
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
    .hero-mini h1, .hero-mini p { margin: 0; }
    .btn-text:hover { text-decoration: underline; }
</style>

<?php require_once __DIR__ . "/includes/footer.php"; ?>