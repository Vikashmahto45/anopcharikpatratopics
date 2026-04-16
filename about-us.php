<?php
/**
 * about.php - Professional About Us Page
 */
require_once __DIR__ . '/includes/header.php';
?>

<style>
    /* About Us Specific Styles */
    .about-hero {
        background: linear-gradient(135deg, var(--brand-dark) 0%, var(--brand-primary) 100%);
        padding: 80px 20px;
        text-align: center;
        color: white;
        border-radius: 0 0 40px 40px;
        margin-bottom: 50px;
    }

    .about-title {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 15px;
    }

    .about-subtitle {
        font-size: 1.15rem;
        opacity: 0.9;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .about-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 20px 80px;
    }

    .about-card {
        background: white;
        padding: 50px;
        border-radius: var(--radius-lg);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--border-color);
        margin-bottom: 40px;
    }

    .about-heading {
        color: var(--brand-dark);
        font-size: 2rem;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 15px;
    }

    .about-heading::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 4px;
        background: var(--brand-primary);
        border-radius: 2px;
    }

    .about-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--text-light);
        margin-bottom: 20px;
    }

    .mission-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }

    .mission-item {
        background: var(--surface);
        padding: 30px;
        border-radius: var(--radius-md);
        text-align: center;
        border: 1px solid var(--border-color);
    }

    .mission-icon {
        width: 60px;
        height: 60px;
        background: white;
        color: var(--brand-primary);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .mission-icon svg {
        width: 30px;
        height: 30px;
    }

    .mission-item h4 {
        color: var(--brand-dark);
        margin-bottom: 15px;
        font-size: 1.25rem;
    }

    .contact-cta {
        text-align: center;
        margin-top: 60px;
        padding: 40px;
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        border-radius: var(--radius-lg);
    }
</style>

<div class="about-hero">
    <h1 class="about-title">About Us</h1>
    <p class="about-subtitle">Empowering students with comprehensive, board-compliant resources for Hindi Grammar and English Literature.</p>
</div>

<div class="about-container">
    <div class="about-card">
        <h2 class="about-heading">Our Story</h2>
        <p class="about-text">
            Welcome to <strong>Anopcharik Patra Topics</strong>, the internet's most definitive and authoritative portal for CBSE, ICSE, and State Board academic writing preparations. 
        </p>
        <p class="about-text">
            We recognized a significant gap in digital education: while students had access to brief, superficial summaries of chapters and grammar formats, they lacked the deeply researched, 1,000+ word execution guides necessary to achieve perfect marks in their board examinations. To solve this, we built a centralized academic repository.
        </p>
        <p class="about-text">
            What started as a specialized master bank for "Anopcharik Patra" (Informal Letters) has now expanded into a comprehensive Literature Academy, covering 65+ deep-dive chapters across Hindi Course B and English First Flight & Footprints.
        </p>

        <h2 class="about-heading" style="margin-top: 50px;">Core Philosophy</h2>
        <div class="mission-grid">
            <div class="mission-item">
                <div class="mission-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h4>Accuracy First</h4>
                <p style="color: var(--text-light); line-height: 1.6; font-size: 0.95rem;">Every layout and vocabulary word is meticulously cross-referenced against official CBSE syllabus markings.</p>
            </div>
            <div class="mission-item">
                <div class="mission-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h4>Depth Over Breadth</h4>
                <p style="color: var(--text-light); line-height: 1.6; font-size: 0.95rem;">Instead of 100 thin pages, we dedicate massive 1,500-word hubs to ensure complete conceptual mastery.</p>
            </div>
        </div>
    </div>

    <div class="contact-cta">
        <h3 style="color: var(--brand-dark); font-size: 1.8rem; margin-bottom: 10px;">Got a Question?</h3>
        <p style="color: var(--text-light); font-size: 1.1rem; margin-bottom: 20px;">We are always here to help you navigate your academic journey.</p>
        <a href="contact.php" style="display: inline-block; background: var(--brand-primary); color: white; padding: 12px 30px; border-radius: 50px; font-weight: 700; text-decoration: none; transition: transform 0.2s;">Contact Us</a>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>