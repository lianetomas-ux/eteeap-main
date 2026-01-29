<style>
@import url('https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;500;600;700&display=swap');

.clsu-footer {
    width: 100%;
    background: linear-gradient(135deg, #065a1f 0%, #087a29 100%);
    position: relative;
    font-family: 'Libre Franklin', -apple-system, BlinkMacSystemFont, sans-serif;
}

.clsu-footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #F9B233 0%, #D4AF37 50%, #F9B233 100%);
}

.clsu-footer-content {
    padding: 1.5rem 2rem;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
}

.clsu-footer-brand {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.clsu-footer-logo {
    width: 45px;
    height: 45px;
    background: #fff;
    border-radius: 50%;
    padding: 0.2rem;
    border: 2px solid #F9B233;
    display: flex;
    align-items: center;
    justify-content: center;
}

.clsu-footer-logo img {
    width: 100%;
    height: auto;
}

.clsu-footer-brand-text {
    display: flex;
    flex-direction: column;
}

.clsu-footer-title {
    font-size: 1rem;
    font-weight: 700;
    color: #F9B233;
    line-height: 1.2;
}

.clsu-footer-tagline {
    font-size: 0.7rem;
    color: rgba(255, 255, 255, 0.8);
    font-style: italic;
}

.clsu-footer-center {
    text-align: center;
}

.clsu-footer-copyright {
    color: #fff;
    font-size: 0.85rem;
    margin: 0;
}

.clsu-footer-copyright a {
    color: #F9B233;
    text-decoration: none;
    font-weight: 600;
}

.clsu-footer-copyright a:hover {
    text-decoration: underline;
}

.clsu-footer-links {
    display: flex;
    gap: 1.5rem;
}

.clsu-footer-link {
    color: rgba(255, 255, 255, 0.85);
    text-decoration: none;
    font-size: 0.8rem;
    font-weight: 500;
    transition: color 0.25s ease;
    display: flex;
    align-items: center;
    gap: 0.4rem;
}

.clsu-footer-link:hover {
    color: #F9B233;
}

.clsu-footer-link i {
    font-size: 0.9rem;
}

/* Simple Footer Version */
.clsu-footer-simple {
    padding: 1rem 2rem;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
}

.clsu-footer-simple p {
    color: #fff;
    font-size: 0.85rem;
    margin: 0;
}

.clsu-footer-simple .highlight {
    color: #F9B233;
    font-weight: 600;
}

/* Sticky Footer Behavior */
.clsu-footer-sticky {
    position: fixed;
    bottom: -100px;
    left: 0;
    transition: bottom 0.4s ease-in-out;
    z-index: 999;
}

.clsu-footer-sticky.show {
    bottom: 0;
}

/* Static Footer (always visible at bottom of content) */
.clsu-footer-static {
    position: relative;
    margin-top: auto;
}

/* Responsive */
@media (max-width: 768px) {
    .clsu-footer-content {
        flex-direction: column;
        text-align: center;
        padding: 1.25rem 1rem;
    }
    
    .clsu-footer-brand {
        justify-content: center;
    }
    
    .clsu-footer-links {
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .clsu-footer-simple {
        flex-direction: column;
        gap: 0.25rem;
    }
}
</style>

{{-- ============================================
    OPTION 1: Simple Footer (Recommended)
    ============================================ --}}
<footer class="clsu-footer" id="pageFooter">
    <div class="clsu-footer-simple">
        <p>&copy; {{ date('Y') }} <span class="highlight">Central Luzon State University</span> — ETEEAP. All rights reserved.</p>
    </div>
</footer>


{{-- ============================================
    OPTION 2: Full Footer with Brand & Links
    Uncomment below if you want a more detailed footer
    ============================================ --}}
{{--
<footer class="clsu-footer" id="pageFooter">
    <div class="clsu-footer-content">
        <div class="clsu-footer-brand">
            <div class="clsu-footer-logo">
                <img src="{{ asset('inspinia/img/landing/logo.png') }}" alt="CLSU Logo">
            </div>
            <div class="clsu-footer-brand-text">
                <span class="clsu-footer-title">CLSU ETEEAP</span>
                <span class="clsu-footer-tagline">Sieving for Excellence</span>
            </div>
        </div>
        
        <div class="clsu-footer-center">
            <p class="clsu-footer-copyright">
                &copy; {{ date('Y') }} <a href="{{ route('home') }}">Central Luzon State University</a>. All rights reserved.
            </p>
        </div>
        
        <div class="clsu-footer-links">
            <a href="{{ route('mission.vision') }}" class="clsu-footer-link">
                <i class="fa fa-bullseye"></i> Mission & Vision
            </a>
            <a href="{{ route('admission.requirements') }}" class="clsu-footer-link">
                <i class="fa fa-file-text"></i> Requirements
            </a>
            <a href="{{ route('procedures') }}" class="clsu-footer-link">
                <i class="fa fa-list-ol"></i> Procedures
            </a>
        </div>
    </div>
</footer>
--}}


{{-- ============================================
    STICKY FOOTER SCRIPT
    Only needed if you want footer to slide up
    when user scrolls to bottom
    ============================================ --}}
{{--
<script>
(function() {
    const footer = document.getElementById("pageFooter");
    if (!footer) return;
    
    // Add sticky class
    footer.classList.add('clsu-footer-sticky');
    
    function checkFooterVisibility() {
        const contentHeight = document.documentElement.scrollHeight;
        const viewportHeight = window.innerHeight;
        const scrollPosition = window.scrollY + viewportHeight;
        
        // Show footer if content fits in viewport OR user scrolled to bottom
        if (contentHeight <= viewportHeight || scrollPosition >= contentHeight - 10) {
            footer.classList.add("show");
        } else {
            footer.classList.remove("show");
        }
    }
    
    // Check on load
    checkFooterVisibility();
    
    // Check on scroll
    window.addEventListener("scroll", checkFooterVisibility, { passive: true });
    
    // Check on resize
    window.addEventListener("resize", checkFooterVisibility, { passive: true });
})();
</script>
--}}