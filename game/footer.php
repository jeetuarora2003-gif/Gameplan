</main> <!-- #primary -->

<footer class="site-footer section-dark">
    <hr class="divider-gold" style="opacity: 0.3;">
    <div class="container" style="padding: 40px 0; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
        <div class="footer-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="text-decoration: none;">
                <span style="font-family: 'Fraunces', ui-serif, Georgia, serif; font-size: 28px; font-weight: 400; color: #FAF9F6; letter-spacing: -0.02em;">Gameplan<span style="color: oklch(55% 0.15 150);">.</span></span>
            </a>
        </div>
        
        <div class="footer-copyright">
            <p style="font-size: 12px; color: var(--color-muted);">
                &copy; <?php echo date('Y'); ?> Gameplan Legal. All rights reserved.
            </p>
        </div>
        
        <div class="footer-links" style="position: relative; z-index: 1001;">
            <ul style="display: flex; gap: 30px; list-style: none; padding: 0; margin: 0;">
                <li><a href="<?php echo esc_url( home_url( '/disclaimer.html' ) ); ?>" onclick="window.location.href=this.href;" style="font-family: var(--font-body); font-size: 11px; text-transform: uppercase; letter-spacing: 0.1em; color: rgba(255,255,255,0.8); text-decoration: none; transition: all 0.3s ease;">Disclaimer</a></li>
                <li><a href="<?php echo esc_url( home_url( '/terms-and-conditions.html' ) ); ?>" onclick="window.location.href=this.href;" style="font-family: var(--font-body); font-size: 11px; text-transform: uppercase; letter-spacing: 0.1em; color: rgba(255,255,255,0.8); text-decoration: none; transition: all 0.3s ease;">Terms & Conditions</a></li>
                <li><a href="<?php echo esc_url( home_url( '/privacy-policy.html' ) ); ?>" onclick="window.location.href=this.href;" style="font-family: var(--font-body); font-size: 11px; text-transform: uppercase; letter-spacing: 0.1em; color: rgba(255,255,255,0.8); text-decoration: none; transition: all 0.3s ease;">Privacy Policy</a></li>
            </ul>
        </div>
    </div>
</footer>

<!-- Cookie Consent Bar -->
<div id="cookieConsent" class="cookie-consent">
    <p>We use cookies to ensure that we give you the best experience on our website. By continuing to use this site, you agree to our use of cookies.</p>
    <div class="cookie-actions">
        <button id="acceptCookies" class="cookie-btn-accept">Accept</button>
        <button id="declineCookies" class="cookie-btn-decline">Decline</button>
    </div>
</div>

<script>
    // Cookie Consent Logic
    document.addEventListener('DOMContentLoaded', function() {
        const consentBar = document.getElementById('cookieConsent');
        const acceptBtn = document.getElementById('acceptCookies');
        
        if (!localStorage.getItem('cookiesAccepted')) {
            setTimeout(() => {
                consentBar.classList.add('active');
            }, 2000);
        }

        acceptBtn.addEventListener('click', function() {
            localStorage.setItem('cookiesAccepted', 'true');
            consentBar.classList.remove('active');
        });

        document.getElementById('declineCookies').addEventListener('click', function() {
            consentBar.classList.remove('active');
        });
    });
</script>

<!-- Premium Newsletter Modal -->
<div id="newsletterModal" class="newsletter-modal" aria-hidden="true">
    <div class="modal-overlay" onclick="closeNewsletter()"></div>
    <div class="modal-content">
        <button class="modal-close" onclick="closeNewsletter()" aria-label="Close">&times;</button>
        <div class="modal-inner">
            <span class="modal-label">Exclusive Updates</span>
            <h2 class="modal-title">Join the <span class="text-gold">gameplan.</span></h2>
            <p class="modal-description">Strategic legal insights for the sports ecosystem, delivered to your inbox.</p>
            
            <form id="premiumNewsletterForm" class="premium-form">
                <div class="input-group">
                    <input type="email" id="subscriberEmail" placeholder=" " required>
                    <label for="subscriberEmail">Email Address</label>
                </div>
                <button type="submit" class="btn-filled-gold">
                    Subscribe <span>&rarr;</span>
                </button>
            </form>
            
            <div id="newsletterSuccess" class="newsletter-success" style="display: none;">
                <div class="success-icon">✓</div>
                <h3>Welcome to the gameplan.</h3>
                <p>You'll receive our next strategic update shortly.</p>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
