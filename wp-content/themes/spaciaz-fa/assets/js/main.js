/**
 * Spaciaz FA - Main JavaScript
 */
(function() {
    'use strict';

    // Header scroll effect
    const header = document.getElementById('spaciaz-header');
    if (header) {
        let lastScroll = 0;
        window.addEventListener('scroll', function() {
            const scroll = window.scrollY;
            if (scroll > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
            lastScroll = scroll;
        }, { passive: true });
    }

    // Mobile menu toggle
    const menuToggle = document.getElementById('spaciaz-menu-toggle');
    const mobileMenu = document.getElementById('spaciaz-mobile-menu');
    const mobileOverlay = document.getElementById('spaciaz-mobile-overlay');

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function() {
            menuToggle.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            if (mobileOverlay) mobileOverlay.classList.toggle('active');
            menuToggle.setAttribute('aria-expanded', menuToggle.classList.contains('active'));
            document.body.style.overflow = menuToggle.classList.contains('active') ? 'hidden' : '';
        });

        if (mobileOverlay) {
            mobileOverlay.addEventListener('click', function() {
                menuToggle.classList.remove('active');
                mobileMenu.classList.remove('active');
                mobileOverlay.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            });
        }
    }

    // Reveal animations on scroll
    const revealElements = document.querySelectorAll('.reveal-up');
    if (revealElements.length > 0) {
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const delay = entry.target.getAttribute('data-delay') || 0;
                    setTimeout(function() {
                        entry.target.classList.add('revealed');
                    }, parseInt(delay));
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        revealElements.forEach(function(el) {
            observer.observe(el);
        });
    }

    // Counter animation for stats
    const statValues = document.querySelectorAll('.spaciaz-stat-value');
    if (statValues.length > 0) {
        const statObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.getAttribute('data-target'));
                    const duration = 2000;
                    const startTime = performance.now();

                    function updateCounter(currentTime) {
                        const elapsed = currentTime - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        const easeOut = 1 - Math.pow(1 - progress, 3);
                        const value = Math.floor(easeOut * target);
                        el.textContent = value.toLocaleString('fa-IR');
                        if (progress < 1) {
                            requestAnimationFrame(updateCounter);
                        } else {
                            el.textContent = target.toLocaleString('fa-IR');
                        }
                    }
                    requestAnimationFrame(updateCounter);
                    statObserver.unobserve(el);
                }
            });
        }, { threshold: 0.5 });

        statValues.forEach(function(el) {
            statObserver.observe(el);
        });
    }

    // Testimonials slider
    const testimonialSlider = document.getElementById('spaciaz-testimonials');
    if (testimonialSlider) {
        const track = testimonialSlider.querySelector('.spaciaz-testimonials-track');
        const slides = testimonialSlider.querySelectorAll('.spaciaz-testimonial');
        const prevBtn = testimonialSlider.querySelector('.spaciaz-slider-prev');
        const nextBtn = testimonialSlider.querySelector('.spaciaz-slider-next');
        let currentSlide = 0;
        const totalSlides = slides.length;

        function goToSlide(index) {
            currentSlide = (index + totalSlides) % totalSlides;
            track.style.transform = 'translateX(' + (-currentSlide * 100) + '%)';
        }

        if (prevBtn) prevBtn.addEventListener('click', function() { goToSlide(currentSlide - 1); });
        if (nextBtn) nextBtn.addEventListener('click', function() { goToSlide(currentSlide + 1); });

        // Auto-play
        let autoPlay = setInterval(function() { goToSlide(currentSlide + 1); }, 5000);

        testimonialSlider.addEventListener('mouseenter', function() { clearInterval(autoPlay); });
        testimonialSlider.addEventListener('mouseleave', function() {
            autoPlay = setInterval(function() { goToSlide(currentSlide + 1); }, 5000);
        });
    }

    // Contact form submission (demo)
    const forms = document.querySelectorAll('.spaciaz-contact-form');
    forms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const msgEl = form.querySelector('.spaciaz-form-message');
            if (msgEl) {
                msgEl.textContent = 'پیام شما با موفقیت ارسال شد. به زودی با شما تماس خواهیم گرفت.';
                msgEl.classList.add('show', 'success');
                form.reset();
                setTimeout(function() {
                    msgEl.classList.remove('show', 'success');
                }, 5000);
            }
        });
    });

    // Project filter
    const filterSelects = document.querySelectorAll('.spaciaz-filter-select');
    if (filterSelects.length > 0) {
        filterSelects.forEach(function(select) {
            select.addEventListener('change', function() {
                const projectCards = document.querySelectorAll('.spaciaz-projects-archive .spaciaz-project-card');
                // This is a demo filter - in production would use AJAX
                const tax = this.getAttribute('data-tax');
                const value = this.value;
                // For now, just visual feedback
                projectCards.forEach(function(card) {
                    card.style.opacity = value ? '0.5' : '1';
                });
            });
        });
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#' || href === '#0') return;
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

})();
