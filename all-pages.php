<?php
/**
 * all-pages.php (Master Directory Page)
 */
require_once __DIR__ . '/includes/header.php';
?>

<div class="content-wrapper">
    <h1 class="article-title" style="text-align: center; margin-bottom: 40px; font-size: 2.5rem;">All Master Guides (A-Z)</h1>

    <div class="article-body">
        <p style="font-size: 1.15rem; text-align: center; max-width: 800px; margin: 0 auto 50px auto;">
            Welcome to the ultimate directory. Below is the complete archive of our 34 deep-research guides covering every possible variation, tone, format, and evaluation rubric regarding the Hindi Informal Letter. Select a topic to begin mastering the composition section of your board exams.
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">
            
            <a href="<?php echo url('index.php'); ?>" class="directory-link">anopcharik patra topics (Home)</a>
            <a href="<?php echo url('anopcharik-patra.php'); ?>" class="directory-link">anopcharik patra</a>
            <a href="<?php echo url('anopcharik-patra-format.php'); ?>" class="directory-link">anopcharik patra format</a>
            <a href="<?php echo url('anopcharik-patra-in-hindi.php'); ?>" class="directory-link">anopcharik patra in hindi</a>
            <a href="<?php echo url('what-is-the-format-of-anopcharik-patra-in-hindi.php'); ?>" class="directory-link">what is the format of anopcharik patra in hindi</a>
            <a href="<?php echo url('anopcharik-patra-lekhan.php'); ?>" class="directory-link">anopcharik patra lekhan</a>
            <a href="<?php echo url('anopcharik-patra-example.php'); ?>" class="directory-link">anopcharik patra example</a>
            <a href="<?php echo url('aupcharik-aur-anopcharik-patra.php'); ?>" class="directory-link">aupcharik aur anopcharik patra</a>
            <a href="<?php echo url('anopcharik-patra-class-10th.php'); ?>" class="directory-link">anopcharik patra class 10th</a>
            <a href="<?php echo url('anopcharik-patra-class-9.php'); ?>" class="directory-link">anopcharik patra class 9</a>
            <a href="<?php echo url('anopcharik-patra-ka-prarup.php'); ?>" class="directory-link">anopcharik patra ka prarup</a>
            
            <a href="<?php echo url('short-anopcharik-patra.php'); ?>" class="directory-link">short anopcharik patra</a>
            <a href="<?php echo url('5-anopcharik-patra-in-hindi.php'); ?>" class="directory-link">5 anopcharik patra in hindi</a>
            <a href="<?php echo url('3-anopcharik-patra-in-hindi.php'); ?>" class="directory-link">3 anopcharik patra in hindi</a>
            <a href="<?php echo url('2-anopcharik-patra-in-hindi.php'); ?>" class="directory-link">2 anopcharik patra in hindi</a>
            <a href="<?php echo url('anopcharik-patra-to-friend.php'); ?>" class="directory-link">anopcharik patra to friend</a>
            <a href="<?php echo url('apne-mummy-ko-anopcharik-patra.php'); ?>" class="directory-link">apne mummy ko anopcharik patra</a>
            <a href="<?php echo url('anopcharik-patra-topics-in-hindi.php'); ?>" class="directory-link">anopcharik patra topics in hindi</a>
            <a href="<?php echo url('anopcharik-patra-bank-manager-ko.php'); ?>" class="directory-link">anopcharik patra bank manager ko kaise likhen</a>
            <a href="<?php echo url('anopcharik-patra-bus-conductor.php'); ?>" class="directory-link">anopcharik patra topics in hindi for bus conductor</a>
            <a href="<?php echo url('kachra-prabandhan-par-anopcharik-patra.php'); ?>" class="directory-link">kachra pravandhan par anopcharik patra</a>
            
            <a href="<?php echo url('anopcharik-patra-madhur-smrutiya.php'); ?>" class="directory-link">anopcharik patra madhur smrutiya</a>
            <a href="<?php echo url('class-5-hindi-anopcharik-patra-topic.php'); ?>" class="directory-link">class 5 hindi anopcharik patra topic</a>
            <a href="<?php echo url('anopcharik-patra-wikipedia.php'); ?>" class="directory-link">anopcharik patra wikipedia</a>
            <a href="<?php echo url('do-anopcharik-patra.php'); ?>" class="directory-link">do anopcharik patra</a>
            <a href="<?php echo url('hindi-me-anopcharik-patra.php'); ?>" class="directory-link">hindi me anopcharik patra</a>
            <a href="<?php echo url('anopcharik-patra-hindi.php'); ?>" class="directory-link">anopcharik patra hindi</a>
            <a href="<?php echo url('anopcharik-patra-questions.php'); ?>" class="directory-link">anopcharik patra questions</a>
            <a href="<?php echo url('anopcharik-patra-format-class-9.php'); ?>" class="directory-link">anopcharik patra format class 9</a>
            <a href="<?php echo url('anopcharik-patra-in-sanskrit.php'); ?>" class="directory-link">anopcharik patra in sanskrit</a>
            <a href="<?php echo url('anopcharik-patra-in-marathi.php'); ?>" class="directory-link">anopcharik patra in marathi</a>
            
            <a href="<?php echo url('best-anopcharik-patra-in-hindi.php'); ?>" class="directory-link">best anopcharik patra in hindi</a>
            <a href="<?php echo url('10-anopcharik-patra-in-hindi-for-class-9.php'); ?>" class="directory-link">10 anopcharik patra in hindi for class 9</a>
            <a href="<?php echo url('anopcharik-patra-lekhan-kise-kahate-hain.php'); ?>" class="directory-link">anopcharik patra lekhan kise kahate hain</a>
            <a href="<?php echo url('anopcharik-patra-class-12.php'); ?>" class="directory-link">anopcharik patra class 12</a>

        </div>

    </div>
</div>

<style>
.directory-link {
    display: block;
    background: #fff;
    padding: 20px;
    border-radius: var(--radius-md);
    border: 1px solid var(--border-color);
    text-decoration: none;
    color: var(--text-dark);
    font-weight: 600;
    transition: var(--transition-base);
    box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    text-align: center;
}
.directory-link:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    border-color: var(--brand-primary);
    color: var(--brand-primary);
}
</style>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
