<?php
/**
 * Template Name: Team Detail
 */
get_header(); ?>

<main class="section-light">
    <div class="container">
        <!-- Hero Profile Section -->
        <div class="team-detail-container">
            <div class="team-detail-sidebar">
                <div class="profile-image-wrapper gsap-fade-up" style="margin-bottom: 40px; aspect-ratio: 4/5; overflow: hidden; background: #eee;">
                    <!-- Placeholder image - user will replace with actual photo -->
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/team/ismail-abou-abbas.jpg' ); ?>" loading="lazy" decoding="async" alt="Ismail Abou-Abbas" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                
                <div class="contact-info gsap-fade-up">
                    <span class="team-label">Contact</span>
                    <p style="font-size: 14px; margin-bottom: 5px;">T +41 58 450 70 00</p>
                    <p style="font-size: 14px; margin-bottom: 20px;"><a href="mailto:info@gameplanlegal.com" class="text-gold">email<span class="at-fix">@</span>gameplanlegal.com</a></p>
                    
                    <span class="team-label">Languages</span>
                    <p style="font-size: 14px;">English, Arabic, French</p>
                </div>
            </div>

            <div class="team-detail-content">
                <div class="gsap-fade-up">
                    <span class="team-label" style="font-size: 13px; margin-bottom: 15px;">Senior Associate</span>
                    <h1 class="hero-headline">Ismail Abou-Abbas</h1>
                    
                    <div class="bio gsap-fade-up">
                        <p>Ismail Abou-Abbas is a senior associate in our Geneva office, where he is a member of the Arbitration and Litigation, and Sports groups. He specializes in international commercial and investment arbitration, with a particular focus on complex disputes in the sports sector.</p>
                        <p>He regularly advises athletes, sports federations, and clubs on regulatory matters, disciplinary proceedings, and commercial arrangements. His expertise extends to proceedings before the Court of Arbitration for Sport (CAS) and the Swiss Federal Tribunal.</p>
                    </div>

                    <div class="team-detail-item gsap-fade-up">
                        <span class="team-label">Professional Experience</span>
                        <p style="font-size: 16px; margin-top: 15px;">Joined Gameplan Legal (2020), Associate at Top Tier Law Firm (2016-2020), Intern at CAS (2015).</p>
                    </div>

                    <div class="team-detail-item gsap-fade-up">
                        <span class="team-label">Education and Admission</span>
                        <p style="font-size: 16px; margin-top: 15px;">LL.M. in International Dispute Settlement (MIDS), University of Geneva and Graduate Institute (2016), Admitted to the Lebanese Bar (2015), Bachelor of Laws (LL.B.), Saint-Joseph University of Beirut (2014).</p>
                    </div>

                    <div class="team-detail-item gsap-fade-up">
                        <span class="team-label">Practices</span>
                        <p style="font-size: 16px; margin-top: 15px;">Arbitration, Litigation, Sports Law, Commercial Contracts.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>


