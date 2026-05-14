<?php
/**
 * Template Name: Homepage
 */
get_header(); ?>

<!-- SECTION 1: HERO -->
<section class="hero-section" style="position: relative; height: 100vh; width: 100vw; overflow: hidden; background-color: var(--color-bg-dark);">
    
    <div class="hero-media" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;">
        <?php 
        $hero_video = get_template_directory_uri() . '/video.mp4';
        ?>
        <video autoplay muted loop playsinline preload="auto" style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0;">
            <source src="<?php echo esc_url($hero_video); ?>" type="video/mp4">
        </video>
    </div>

    <!-- Gradient Overlay -->
    <div class="hero-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: linear-gradient(180deg, rgba(12, 48, 34, 0.75) 0%, rgba(12, 48, 34, 0.45) 50%, rgba(12, 48, 34, 0) 100%);"></div>

    <!-- Content (Anchored Bottom Left) -->
    <div class="hero-content" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; z-index: 3; width: 100%; max-width: 900px; padding: 0 20px;">
        <p class="hero-eyebrow gsap-fade-up" style="font-family: var(--font-body); font-size: 13px; font-weight: 600; text-transform: uppercase; color: var(--color-gold); letter-spacing: 0.2em; margin-bottom: 24px; text-shadow: 0 2px 12px rgba(0,0,0,0.8);">
            Sports Law &middot; Strategy &middot; Disputes
        </p>
        <h1 class="hero-headline gsap-fade-up" style="font-size: clamp(64px, 8vw, 110px); font-weight: 600; line-height: 1.05; margin-bottom: 24px; text-shadow: 0 8px 40px rgba(0,0,0,0.8), 0 2px 10px rgba(0,0,0,0.5);">
            Gameplan Legal.
        </h1>
        <p class="hero-subheadline gsap-fade-up" style="font-size: clamp(18px, 2vw, 24px); font-weight: 500; color: #EDEBE6; margin: 0 auto; max-width: 100%; white-space: nowrap; text-shadow: 0 4px 20px rgba(0,0,0,0.9), 0 1px 5px rgba(0,0,0,0.6);">
            Advising on strategy, disputes, and the business of sport.
            </p>
        <a href="<?php echo is_front_page() ? '#enquiries' : home_url('/#enquiries'); ?>" class="hero-mobile-enquire gsap-fade-up">Enquire &rarr;</a>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator" style="position: absolute; bottom: 40px; right: 40px; z-index: 3;">
        <span style="font-family: var(--font-body); font-size: 11px; color: var(--color-gold); text-transform: uppercase; letter-spacing: 0.1em; display: inline-block; animation: bounce 2s infinite;">Scroll &darr;</span>
    </div>
</section>

<!-- SECTION 1: ABOUT -->
<section id="about" class="about-section" style="background-color: oklch(97% 0.008 90); padding: clamp(80px, 10vw, 120px) 4vw; position: relative;">
    <div style="max-width: 1400px; margin: 0 auto; display: grid; grid-template-columns: 5fr 7fr; gap: 6vw;">
        
        <!-- Left Column -->
        <div class="gsap-fade-up" style="display: flex; flex-direction: column;">
            <div style="margin-bottom: 80px; padding-top: 10px;">
                <span style="font-family: 'Inter Tight', sans-serif; font-size: 0.75rem; font-weight: 500; text-transform: uppercase; letter-spacing: 0.22em; color: rgba(0,0,0,0.4);">01 &mdash; About</span>
            </div>
            
            <div class="about-image-col" style="aspect-ratio: 4/5; overflow: hidden; width: 100%;">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/about-ball-vFJJwoFK.jpg' ); ?>" loading="lazy" decoding="async" alt="Sports Strategy" style="width: 100%; height: 100%; object-fit: cover; display: block;">
            </div>
        </div>

        <!-- Right Column -->
        <div class="about-content-col gsap-fade-up" style="display: flex; flex-direction: column;">
            <div style="margin-bottom: 120px;">
                <h2 style="font-family: 'Fraunces', ui-serif, Georgia, serif; font-size: clamp(36px, 4vw, 56px); font-weight: 600; line-height: 1.1; letter-spacing: -0.02em; color: oklch(18% 0.03 240); margin: 0; max-width: 800px; text-wrap: balance;">
                    Strategic legal counsel across the global sports ecosystem &mdash; <span style="color: oklch(42% .09 165);">commercially driven, tailored, and international in scope.</span>
                </h2>
            </div>

            <div style="display: flex; flex-direction: column; justify-content: flex-end; flex-grow: 1; padding-bottom: 40px;">
                <p style="font-family: 'Inter Tight', sans-serif; font-size: clamp(16px, 1.25vw, 18px); line-height: 1.7; color: oklch(45% 0.02 240); margin-bottom: 40px; max-width: 580px; font-weight: 400;">
                    Gameplan Legal advises every stakeholder in the sports ecosystem &mdash; from individuals to organisations of all sizes. We approach each matter with focus, commercial awareness, and an international mindset.
                </p>

                <p style="font-family: 'Fraunces', ui-serif, Georgia, serif; font-size: clamp(22px, 2vw, 28px); line-height: 1.35; color: oklch(45% 0.02 240); max-width: 540px; font-weight: 400; font-style: italic; margin: 0;">
                    Every client is different. Every situation is different. Our job is to tailor the right gameplan &mdash; and execute it.
                </p>
                
                <!-- CTA Button -->
                <div class="header-cta" style="margin-top: 40px;">
                    <a href="<?php echo is_front_page() ? '#enquiries' : home_url('/#enquiries'); ?>" style="padding: 12px 24px; border: 1px solid #000; text-decoration: none; color: #000; font-weight: 600;">Enquire &rarr;</a>
                </div>
            </div>
        </div>
        
    </div>
</section>

<!-- SECTION 3: PROFILE -->
<section id="profile" class="expertise-section section-dark" style="background-color: var(--color-bg-dark); padding: clamp(80px, 10vw, 120px) 0;">
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 4vw;">
        
        <!-- Top Header Row -->
        <div style="display: flex; gap: 40px; margin-bottom: 80px;">
            <div style="width: 40%;">
                <span style="font-family: var(--font-body); font-size: 11px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.15em; color: rgba(255, 255, 255, 0.4); display: block; padding-top: 16px;">
                    02 &mdash; Profile
                </span>
            </div>
            <div style="width: 60%;">
                <h2 style="font-size: clamp(36px, 4vw, 60px); font-weight: 300; line-height: 1.1; letter-spacing: -0.02em; color: #FAF9F6; margin: 0; max-width: 100%;">
                    The full lifecycle of the<br>sports industry &mdash; <span style="font-style: italic; color: oklch(55% 0.15 150);">covered.</span>
                </h2>
            </div>
        </div>

        <!-- Content Row -->
        <div style="display: flex; gap: 40px; align-items: flex-start;">
            <!-- Left: Image -->
            <div class="expertise-image-panel" style="width: 40%; position: sticky; top: 120px; height: calc(100vh - 240px); overflow: hidden; min-height: 600px;">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/expertise_office.png' ); ?>" loading="lazy" decoding="async" alt="Boardroom View" style="width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%); opacity: 0.85;">
            </div>

            <!-- Right: List -->
            <div class="expertise-list-container" style="width: 60%; display: flex; flex-direction: column;">
                
                <!-- Item 1 -->
                <div class="expertise-list-item" style="padding: 32px 0; border-top: 1px solid rgba(255, 255, 255, 0.1); display: flex; align-items: center; justify-content: space-between; gap: 20px; transition: all 0.3s ease; cursor: pointer;">
                    <div style="display: flex; align-items: center; gap: 30px;">
                            <h3 style="font-size: clamp(24px, 2.5vw, 30px); font-weight: 400; letter-spacing: -0.02em; color: #FAF9F6; margin: 0; line-height: 1.1;">Football Disputes</h3>
                    </div>
                    <span style="font-family: 'Inter Tight', sans-serif; font-size: 12px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.18em; color: rgba(255, 255, 255, 0.5); text-align: right;">FIFA / CAS PROCEEDINGS</span>
                </div>
                
                <!-- Item 2 -->
                <div class="expertise-list-item" style="padding: 32px 0; border-top: 1px solid rgba(255, 255, 255, 0.1); display: flex; align-items: center; justify-content: space-between; gap: 20px; transition: all 0.3s ease; cursor: pointer;">
                    <div style="display: flex; align-items: center; gap: 30px;">
                            <h3 style="font-size: clamp(24px, 2.5vw, 30px); font-weight: 400; letter-spacing: -0.02em; color: #FAF9F6; margin: 0; line-height: 1.1;">Arbitration</h3>
                    </div>
                    <span style="font-family: 'Inter Tight', sans-serif; font-size: 12px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.18em; color: rgba(255, 255, 255, 0.5); text-align: right;">INTERNATIONAL COMMERCIAL & SPORTS</span>
                </div>

                <!-- Item 3 -->
                <div class="expertise-list-item" style="padding: 32px 0; border-top: 1px solid rgba(255, 255, 255, 0.1); display: flex; align-items: center; justify-content: space-between; gap: 20px; transition: all 0.3s ease; cursor: pointer;">
                    <div style="display: flex; align-items: center; gap: 30px;">
                            <h3 style="font-size: clamp(24px, 2.5vw, 30px); font-weight: 400; letter-spacing: -0.02em; color: #FAF9F6; margin: 0; line-height: 1.1;">Litigation</h3>
                    </div>
                    <span style="font-family: 'Inter Tight', sans-serif; font-size: 12px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.18em; color: rgba(255, 255, 255, 0.5); text-align: right;">CIVIL & COMMERCIAL COURTS</span>
                </div>

                <!-- Item 4 -->
                <div class="expertise-list-item" style="padding: 32px 0; border-top: 1px solid rgba(255, 255, 255, 0.1); display: flex; align-items: center; justify-content: space-between; gap: 20px; transition: all 0.3s ease; cursor: pointer;">
                    <div style="display: flex; align-items: center; gap: 30px;">
                            <h3 style="font-size: clamp(24px, 2.5vw, 30px); font-weight: 400; letter-spacing: -0.02em; color: #FAF9F6; margin: 0; line-height: 1.1;">Sponsorship & Endorsement</h3>
                    </div>
                    <span style="font-family: 'Inter Tight', sans-serif; font-size: 12px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.18em; color: rgba(255, 255, 255, 0.5); text-align: right;">ADVISORY & NEGOTIATION</span>
                </div>

                <!-- Item 5 -->
                <div class="expertise-list-item" style="padding: 32px 0; border-top: 1px solid rgba(255, 255, 255, 0.1); display: flex; align-items: center; justify-content: space-between; gap: 20px; transition: all 0.3s ease; cursor: pointer;">
                    <div style="display: flex; align-items: center; gap: 30px;">
                            <h3 style="font-size: clamp(24px, 2.5vw, 30px); font-weight: 400; letter-spacing: -0.02em; color: #FAF9F6; margin: 0; line-height: 1.1;">Talent Management</h3>
                    </div>
                    <span style="font-family: 'Inter Tight', sans-serif; font-size: 12px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.18em; color: rgba(255, 255, 255, 0.5); text-align: right;">CONTRACTS & CAREER STRATEGY</span>
                </div>

                <!-- Item 6 -->
                <div class="expertise-list-item" style="padding: 32px 0; border-top: 1px solid rgba(255, 255, 255, 0.1); display: flex; align-items: center; justify-content: space-between; gap: 20px; transition: all 0.3s ease; cursor: pointer;">
                    <div style="display: flex; align-items: center; gap: 30px;">
                            <h3 style="font-size: clamp(24px, 2.5vw, 30px); font-weight: 400; letter-spacing: -0.02em; color: #FAF9F6; margin: 0; line-height: 1.1;">Player Contracts & Transfers</h3>
                    </div>
                    <span style="font-family: 'Inter Tight', sans-serif; font-size: 12px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.18em; color: rgba(255, 255, 255, 0.5); text-align: right;">CROSS-BORDER EXECUTION</span>
                </div>

                <!-- Item 7 -->
                <div class="expertise-list-item" style="padding: 32px 0; border-top: 1px solid rgba(255, 255, 255, 0.1); display: flex; align-items: center; justify-content: space-between; gap: 20px; transition: all 0.3s ease; cursor: pointer;">
                    <div style="display: flex; align-items: center; gap: 30px;">
                            <h3 style="font-size: clamp(24px, 2.5vw, 30px); font-weight: 400; letter-spacing: -0.02em; color: #FAF9F6; margin: 0; line-height: 1.1;">Anti-Doping & Regulatory</h3>
                    </div>
                    <span style="font-family: 'Inter Tight', sans-serif; font-size: 12px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.18em; color: rgba(255, 255, 255, 0.5); text-align: right;">COMPLIANCE & DEFENCE</span>
                </div>

                <!-- Item 8 -->
                <div class="expertise-list-item" style="padding: 32px 0; border-top: 1px solid rgba(255, 255, 255, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.1); display: flex; align-items: center; justify-content: space-between; gap: 20px; transition: all 0.3s ease; cursor: pointer;">
                    <div style="display: flex; align-items: center; gap: 30px;">
                            <h3 style="font-size: clamp(24px, 2.5vw, 30px); font-weight: 400; letter-spacing: -0.02em; color: #FAF9F6; margin: 0; line-height: 1.1;">Esports &amp; Gaming</h3>
                    </div>
                    <span style="font-family: 'Inter Tight', sans-serif; font-size: 12px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.18em; color: rgba(255, 255, 255, 0.5); text-align: right;">COMMERCIAL &amp; REGULATORY</span>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- SECTION 4: TEAM -->
<section id="team" class="team-section section-light" style="padding: clamp(80px, 10vw, 120px) 0 clamp(60px, 8vw, 80px) 0;">
    <div class="container">
        <div class="grid" style="grid-template-columns: 1fr 2fr; gap: 40px;">
            <div class="team-label-col">
                <span style="font-family: var(--font-body); font-size: 11px; text-transform: uppercase; color: rgba(0,0,0,0.4); letter-spacing: 0.1em; display: block; margin-top: 10px;">
                    03 &mdash; Team
                </span>
            </div>
            <div class="team-content-col" style="display: flex; flex-direction: column; align-items: flex-start;">
                <h2 class="gsap-fade-up">
                    Internationally qualified lawyers. <span class="text-italic-accent">Real-world insight.</span>
                </h2>
                <div class="team-body gsap-fade-up" style="max-width: 700px; margin-bottom: 40px;">
                    <p style="font-size: 15px; opacity: 0.85;">Our team pairs internationally qualified lawyers with sports industry professionals &mdash; including licensed football agents &mdash; bringing both legal expertise and operational insight to every matter. We act for athletes, agents, clubs, and sports-related businesses on complex disputes, commercial arrangements, and career management.</p>
                </div>
                <a href="/team" class="btn-outline gsap-fade-up" style="justify-self: start;">View Our Team &rarr;</a>
            </div>
        </div>
    </div>
</section>

<!-- DIVIDER IMAGE: Stadium Seats -->
<section class="seats-divider" style="width: 100%; height: clamp(300px, 40vw, 550px); overflow: hidden; position: relative; padding-bottom: 80px; background-color: var(--color-bg-light);">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seats.jpg" alt="Stadium seating" loading="lazy" decoding="async" style="width: 100%; height: 100%; object-fit: cover; display: block;">
</section>

<!-- SECTION 4: CAREERS -->
<section id="careers" class="careers-section section-light" style="padding: clamp(60px, 8vw, 80px) 0 clamp(80px, 10vw, 120px) 0; border-top: 1px solid rgba(184, 151, 90, 0.1);">
    <div class="container">
        <div class="grid" style="grid-template-columns: 1fr 2fr; gap: 40px;">
            <!-- Left Column: Label -->
            <div class="careers-label-col">
                <span style="font-family: var(--font-body); font-size: 11px; text-transform: uppercase; color: rgba(0,0,0,0.4); letter-spacing: 0.1em; display: block; margin-top: 10px;">
                    04 &mdash; Careers
                </span>
            </div>
            
            <!-- Right Column: Content -->
            <div class="careers-content-col" style="display: flex; flex-direction: column; align-items: flex-start;">
                <h2 class="gsap-fade-up">
                    Join a firm where <span class="text-italic-accent">law meets sport.</span>
                </h2>
                <div class="careers-body gsap-fade-up" style="max-width: 600px; margin-bottom: 40px;">
                    <p style="font-size: 16px; line-height: 1.6; opacity: 0.85; text-wrap: balance; margin: 0;">We are always open to hearing from talented lawyers and industry professionals who share our standards.</p>
                </div>
                <div class="gsap-fade-up" style="width: 100%; max-width: 700px;">
                    <a href="mailto:hello@gameplanlegal.com" style="font-family: var(--font-body); font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.12em; color: var(--color-text-dark); text-decoration: none; display: inline-flex; align-items: center; gap: 10px; transition: color 0.3s;" onmouseover="this.style.color='#065F46'" onmouseout="this.style.color=''">GET IN TOUCH <span style="font-size: 18px; font-weight: 400;">&rarr;</span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 5: CONTACT -->
<section id="contact" class="contact-section section-dark" style="padding: clamp(80px, 10vw, 120px) 0; border-top: 1px solid rgba(255,255,255,0.08);">
    <div class="container">
        <div class="grid contact-grid-top" style="grid-template-columns: 1fr 2fr; gap: 40px; margin-bottom: 100px;">
            <div>
                <span style="font-family: var(--font-body); font-size: 11px; text-transform: uppercase; color: rgba(255,255,255,0.4); letter-spacing: 0.15em; display: block; margin-top: 10px;">05 &mdash; Contact</span>
            </div>
            <div>
                <h2 class="gsap-fade-up" style="font-size: clamp(48px, 6vw, 80px); font-weight: 400; line-height: 1.05; letter-spacing: -0.02em; color: var(--color-text-light); margin: 0;">
                    Let&rsquo;s build<br>your <span style="font-style: italic; color: oklch(55% 0.15 150);">gameplan.</span>
                </h2>
            </div>
        </div>
        <div class="grid contact-details-grid gsap-fade-up" style="grid-template-columns: 1fr 1fr; gap: 60px; padding-top: 60px; border-top: 1px solid rgba(255,255,255,0.08);">
            <div>
                <span style="font-family: var(--font-body); font-size: 11px; text-transform: uppercase; color: rgba(255,255,255,0.4); letter-spacing: 0.15em; display: block; margin-bottom: 20px;">Enquiries</span>
                <a href="mailto:hello@gameplanlegal.com" style="font-family: var(--font-body); font-size: 18px; color: var(--color-text-light); text-decoration: none;">hello@gameplanlegal.com</a>
            </div>
            <div>
                <span style="font-family: var(--font-body); font-size: 11px; text-transform: uppercase; color: rgba(255,255,255,0.4); letter-spacing: 0.15em; display: block; margin-bottom: 20px;">Office</span>
                <p style="font-family: var(--font-body); font-size: 18px; color: var(--color-text-light); line-height: 1.6; margin: 0;">By appointment<br>Worldwide representation</p>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 6: ENQUIRY FORM -->
<section id="enquiries" class="enquiry-section section-dark" style="padding: clamp(80px, 10vw, 120px) 0; border-top: 1px solid rgba(255,255,255,0.08);">
    <div class="container grid enquiry-grid" style="grid-template-columns: 1fr 1fr; gap: 120px;">
        <div class="contact-info gsap-fade-up">
            <span style="font-family: var(--font-body); font-size: 11px; text-transform: uppercase; color: rgba(255,255,255,0.4); letter-spacing: 0.15em; display: block; margin-bottom: 40px;">06 &mdash; Enquire</span>
            <h2 style="font-size: clamp(36px, 4vw, 56px); font-weight: 400; line-height: 1.1; letter-spacing: -0.02em; color: var(--color-text-light); margin-top: 0; margin-bottom: 40px;">Enquiries</h2>
            <div class="contact-details" style="font-family: var(--font-body); font-size: 16px; color: rgba(255,255,255,0.6); display: flex; flex-direction: column; gap: 24px;">
                <p style="margin-bottom: 20px;">If you have an enquiry or would like to learn more about our services, please complete the enquiry form or contact us using the details below.</p>
                <p>Based in Bangkok, we advise clients across jurisdictions with timely, tailored legal support, regardless of location or time zone.</p>
                <div style="margin-top: 40px; font-weight: 600; color: var(--color-text-light);">
                    <p>&bull; Bangkok, Thailand</p>
                    <p>&bull; connect@gameplanlegal.com</p>
                    <p>&bull; +66 813117767</p>
                </div>
            </div>
        </div>
        <div class="contact-form-wrapper gsap-fade-up">
            <form class="custom-enquiry-form" style="display: flex; flex-direction: column; gap: 32px;" onsubmit="event.preventDefault(); alert('Thank you for your enquiry. Our team will contact you shortly.'); this.reset();">
                <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 32px;">
                    <input type="text" placeholder="Your first name" style="width: 100%; background: transparent; border: none; border-bottom: 1px solid var(--color-gold); padding: 12px 0; color: #fff; font-family: var(--font-body); font-size: 16px; outline: none;">
                    <input type="text" placeholder="Your last name" style="width: 100%; background: transparent; border: none; border-bottom: 1px solid var(--color-gold); padding: 12px 0; color: #fff; font-family: var(--font-body); font-size: 16px; outline: none;">
                </div>
                <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 32px;">
                    <input type="tel" placeholder="Phone No." style="width: 100%; background: transparent; border: none; border-bottom: 1px solid var(--color-gold); padding: 12px 0; color: #fff; font-family: var(--font-body); font-size: 16px; outline: none;">
                    <input type="text" placeholder="Country" style="width: 100%; background: transparent; border: none; border-bottom: 1px solid var(--color-gold); padding: 12px 0; color: #fff; font-family: var(--font-body); font-size: 16px; outline: none;">
                </div>
                <input type="email" placeholder="Email" style="width: 100%; background: transparent; border: none; border-bottom: 1px solid var(--color-gold); padding: 12px 0; color: #fff; font-family: var(--font-body); font-size: 16px; outline: none;">
                <textarea placeholder="Tell us more" rows="4" style="width: 100%; background: transparent; border: none; border-bottom: 1px solid var(--color-gold); padding: 12px 0; color: #fff; font-family: var(--font-body); font-size: 16px; outline: none; resize: none;"></textarea>
                <button type="submit" class="btn-filled" style="align-self: flex-start; margin-top: 16px;">Send &rarr;</button>
            </form>
        </div>
    </div>
</section>

<!-- Custom CSS for Expertise Hover & Bounce Animation -->
<style>
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-10px); }
        60% { transform: translateY(-5px); }
    }
    .expertise-list-item:hover {
        background-color: rgba(184, 151, 90, 0.05);
    }
    .expertise-list-item:hover .expertise-title {
        color: var(--color-gold) !important;
    }
    ::placeholder {
        color: rgba(255,255,255,0.4);
    }
</style>

<?php get_footer(); ?>


