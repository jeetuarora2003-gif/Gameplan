<?php
/**
 * Template Name: Expertise Page
 */
get_header(); ?>

<section class="expertise-landing section-dark" style="padding: 180px 0 120px;">
    <div class="container">
        <h1 class="gsap-fade-up" style="font-size: clamp(40px, 5vw, 64px); margin-bottom: 80px; max-width: 800px;">
            Our <span class="italic text-gold">Expertise.</span>
        </h1>
        
        <div class="expertise-grid grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
            <?php
            $expertise_items = array(
                array("num" => "01", "title" => "Football Disputes", "subtitle" => "FIFA / CAS proceedings"),
                array("num" => "02", "title" => "Arbitration", "subtitle" => "International commercial & sports"),
                array("num" => "03", "title" => "Litigation", "subtitle" => "Civil & commercial courts"),
                array("num" => "04", "title" => "Sponsorship & Endorsement", "subtitle" => "Advisory & negotiation"),
                array("num" => "05", "title" => "Talent Management", "subtitle" => "Contracts & career strategy"),
                array("num" => "06", "title" => "Player Contracts & Transfers", "subtitle" => "Cross-border execution"),
                array("num" => "07", "title" => "Anti-Doping & Regulatory", "subtitle" => "Compliance & defence"),
                array("num" => "08", "title" => "Esports & Gaming", "subtitle" => "Commercial & regulatory")
            );

            foreach($expertise_items as $item) :
            ?>
            <div class="expertise-card gsap-fade-up" style="padding: 40px; border: 1px solid rgba(184, 151, 90, 0.3); background-color: rgba(255,255,255,0.02); transition: all 0.3s ease;">
                <div class="expertise-num" style="font-family: var(--font-heading); font-size: 16px; color: var(--color-gold); margin-bottom: 24px;">
                    <?php echo $item['num']; ?>
                </div>
                <h3 style="font-family: var(--font-body); font-size: 20px; font-weight: 600; color: #fff; margin-bottom: 12px;">
                    <?php echo $item['title']; ?>
                </h3>
                <p style="font-family: var(--font-body); font-size: 15px; color: var(--color-muted);">
                    <?php echo $item['subtitle']; ?>
                </p>
                <!-- Usually wraps in an <a> tag linking to the sub-page -->
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>


