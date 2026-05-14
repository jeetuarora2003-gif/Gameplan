<?php
/**
 * Template Name: Contact Page
 */
get_header(); ?>

<section class="contact-section section-dark" style="padding: 180px 0 120px; min-height: 100vh;">
    <div class="container grid" style="grid-template-columns: 1fr 1fr; gap: 120px;">
        
        <!-- Contact Info Left -->
        <div class="contact-info gsap-fade-up">
            <span style="font-family: var(--font-body); font-size: 11px; text-transform: uppercase; color: var(--color-gold); letter-spacing: 0.1em; display: block; margin-bottom: 40px;">
                Contact
            </span>
            <h2 style="font-size: clamp(40px, 5vw, 64px); margin-bottom: 60px;">
                Let's build your <span class="italic text-gold">gameplan.</span>
            </h2>
            
            <div class="contact-details" style="font-family: var(--font-body); font-size: 16px; color: var(--color-text-dark); display: flex; flex-direction: column; gap: 24px;">
                <p>Email: <a href="mailto:hello@gameplanlegal.com" class="text-gold">hello@gameplanlegal.com</a></p>
                <p>Location: Bangkok, Thailand</p>
                <p>Phone: +66 985857707</p>
                <div class="social-links" style="margin-top: 24px; display: flex; gap: 24px;">
                    <a href="#" class="text-gold" style="font-size: 13px; text-transform: uppercase; letter-spacing: 0.1em;">LinkedIn</a>
                    <a href="#" class="text-gold" style="font-size: 13px; text-transform: uppercase; letter-spacing: 0.1em;">Instagram</a>
                </div>
            </div>
        </div>

        <!-- Enquiry Form Right -->
        <div class="contact-form-wrapper gsap-fade-up">
            <h3 style="font-size: 24px; margin-bottom: 40px;">Send an Enquiry</h3>
            <!-- Assuming Contact Form 7 shortcode or native HTML fallback -->
            <?php 
            $cf7_shortcode = get_field('contact_form_shortcode'); // Optional ACF field to allow client to select form
            if ($cf7_shortcode) {
                echo do_shortcode($cf7_shortcode);
            } else {
            ?>
                <form class="custom-enquiry-form" style="display: flex; flex-direction: column; gap: 32px;">
                    <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 32px;">
                        <input type="text" placeholder="First Name" style="width: 100%; background: transparent; border: none; border-bottom: 1px solid var(--color-gold); padding: 12px 0; color: #fff; font-family: var(--font-body); font-size: 16px; outline: none;" required>
                        <input type="text" placeholder="Last Name" style="width: 100%; background: transparent; border: none; border-bottom: 1px solid var(--color-gold); padding: 12px 0; color: #fff; font-family: var(--font-body); font-size: 16px; outline: none;" required>
                    </div>
                    <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 32px;">
                        <input type="tel" placeholder="Phone" style="width: 100%; background: transparent; border: none; border-bottom: 1px solid var(--color-gold); padding: 12px 0; color: #fff; font-family: var(--font-body); font-size: 16px; outline: none;">
                        <input type="text" placeholder="Country" style="width: 100%; background: transparent; border: none; border-bottom: 1px solid var(--color-gold); padding: 12px 0; color: #fff; font-family: var(--font-body); font-size: 16px; outline: none;">
                    </div>
                    <input type="email" placeholder="Email" style="width: 100%; background: transparent; border: none; border-bottom: 1px solid var(--color-gold); padding: 12px 0; color: #fff; font-family: var(--font-body); font-size: 16px; outline: none;" required>
                    <textarea placeholder="Message" rows="4" style="width: 100%; background: transparent; border: none; border-bottom: 1px solid var(--color-gold); padding: 12px 0; color: #fff; font-family: var(--font-body); font-size: 16px; outline: none; resize: none;" required></textarea>
                    
                    <button type="submit" class="btn-filled" style="align-self: flex-start; margin-top: 16px;">
                        Send &rarr;
                    </button>
                </form>
            <?php } ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>


