/**
 * Anopcharik Patra Topics - Main JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    // Mobile Navigation Toggle
    const navToggle = document.getElementById('navToggle');
    const mainNav = document.getElementById('mainNav');
    
    if (navToggle && mainNav) {
        navToggle.addEventListener('click', function() {
            mainNav.classList.toggle('active');
            navToggle.classList.toggle('active');
        });
    }
    
    // Dropdown Menu for Desktop
    const dropdownItems = document.querySelectorAll('.has-dropdown');
    
    dropdownItems.forEach(function(item) {
        item.addEventListener('mouseenter', function() {
            this.querySelector('.dropdown-menu').style.display = 'block';
        });
        
        item.addEventListener('mouseleave', function() {
            this.querySelector('.dropdown-menu').style.display = 'none';
        });
    });
    
    // Smooth Scroll for Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Copy Letter to Clipboard
    const copyButtons = document.querySelectorAll('.copy-letter-btn');
    
    copyButtons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const letterContent = this.closest('.letter-box').querySelector('.letter-content');
            const text = letterContent.innerText;
            
            navigator.clipboard.writeText(text).then(function() {
                btn.textContent = 'कॉपी हो गया! ✓';
                btn.classList.add('copied');
                
                setTimeout(function() {
                    btn.textContent = 'पत्र कॉपी करें';
                    btn.classList.remove('copied');
                }, 2000);
            });
        });
    });
    
    // Scroll to Top Button
    const scrollTopBtn = document.createElement('button');
    scrollTopBtn.className = 'scroll-top-btn';
    scrollTopBtn.innerHTML = '↑';
    scrollTopBtn.setAttribute('aria-label', 'Scroll to top');
    document.body.appendChild(scrollTopBtn);
    
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            scrollTopBtn.classList.add('visible');
        } else {
            scrollTopBtn.classList.remove('visible');
        }
    });
    
    scrollTopBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Active Navigation Link
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(function(link) {
        if (link.getAttribute('href') === currentPath || 
            currentPath.includes(link.getAttribute('href'))) {
            link.classList.add('active');
        }
    });
});
