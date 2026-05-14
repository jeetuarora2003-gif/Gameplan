<?php
/**
 * Template Name: Insights Archive
 */
get_header();

$gameplan_insight_filters = array(
    'category' => array(
        'label'    => __( 'All Practice Areas', 'gameplan' ),
        'empty'    => __( 'No practice areas yet', 'gameplan' ),
        'taxonomy' => 'practice_area',
    ),
    'sector' => array(
        'label'    => __( 'All Sectors', 'gameplan' ),
        'empty'    => __( 'No sectors yet', 'gameplan' ),
        'taxonomy' => 'sector',
    ),
    'topic' => array(
        'label'    => __( 'All Topics', 'gameplan' ),
        'empty'    => __( 'No topics yet', 'gameplan' ),
        'taxonomy' => 'topic',
    ),
);

$gameplan_filter_terms = array();
foreach ( $gameplan_insight_filters as $filter_key => $filter_config ) {
    $terms = get_terms(
        array(
            'taxonomy'   => $filter_config['taxonomy'],
            'hide_empty' => false,
            'orderby'    => 'name',
            'order'      => 'ASC',
        )
    );

    $gameplan_filter_terms[ $filter_key ] = is_wp_error( $terms ) ? array() : $terms;
}
?>

<style>
    .insights-hero {
        display: flex;
        min-height: 100vh;
        background-color: var(--color-bg-dark);
        border-bottom: 1px solid rgba(6,95,70,0.24);
    }
    .hero-left {
        width: 45%;
        padding: 180px 60px 80px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        border-right: 1px solid rgba(6,95,70,0.22);
        position: relative;
        z-index: 10;
        background-color: var(--color-bg-dark);
    }
    .hero-right {
        width: 55%;
        background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop');
        background-size: cover;
        background-position: center;
        position: relative;
    }
    .hero-right::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(5,10,9,0.28), rgba(6,95,70,0.42));
        pointer-events: none;
    }
    .hero-left h1 {
        font-family: var(--font-serif);
        
        font-size: clamp(48px, 6vw, 80px);
        font-weight: 400;
        line-height: 1.05;
        letter-spacing: -0.02em;
        margin-bottom: 40px;
        color: var(--color-text-light);
    }
    .hero-left p {
        font-family: var(--font-body);
        font-size: 20px;
        color: var(--color-text-light);
        max-width: 400px;
        line-height: 1.4;
        margin-bottom: 60px;
        opacity: 0.8;
    }
    .filter-row {
        padding: 20px 0;
        border-bottom: 1px solid rgba(6,95,70,0.42);
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .filter-row:hover {
        opacity: 0.7;
    }
    .filter-row span {
        font-family: var(--font-body);
        font-size: 14px;
        font-weight: 500;
        color: var(--color-text-light);
    }
    .filter-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease-out;
        background: var(--color-bg-dark);
    }
    .filter-content ul {
        list-style: none;
        padding: 20px 0;
    }
    .filter-content li {
        padding: 8px 0;
        font-family: var(--font-body);
        font-size: 13px;
        color: var(--color-muted);
        cursor: pointer;
        transition: color 0.3s;
    }
    .filter-content li:hover {
        color: #fff;
    }
    .filter-content li.is-active {
        color: var(--color-text-light);
    }
    .filter-content li.no-filter-options {
        cursor: default;
        opacity: 0.6;
    }
    .filter-content li.no-filter-options:hover {
        color: var(--color-muted);
    }
    .filter-reset {
        margin-top: 30px;
        padding: 12px 16px 12px 0;
        min-height: 44px;
        font-family: var(--font-body);
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: rgba(255,255,255,0.4);
        cursor: pointer;
        display: inline-block;
        background: transparent;
        border: 0;
        text-align: left;
    }
    :root {
        --ease-luxury: cubic-bezier(0.19, 1, 0.22, 1);
    }
    .insights-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0;
        background-color: var(--color-bg-dark);
    }
    .insight-block {
        padding: 60px;
        border-right: 1px solid rgba(6,95,70,0.18);
        border-bottom: 1px solid rgba(6,95,70,0.18);
        min-height: 550px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        text-decoration: none;
        position: relative;
        overflow: hidden;
        background-color: var(--color-bg-dark);
        color: var(--color-text-light);
    }
    .pill-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(6,95,70,0.94) 0%, rgba(5,10,9,0.98) 100%);
        border-radius: 0px;
        transform: scale(1.02);
        transition: all 0.8s var(--ease-luxury);
        z-index: 1;
    }
    .insight-block:hover .pill-overlay {
        top: 10%;
        left: 5%;
        width: 90%;
        height: 80%;
        transform: scale(1);
        border-radius: 1000px;
        box-shadow: 0 30px 60px rgba(0,0,0,0.42), 0 0 0 1px rgba(6,95,70,0.22);
    }
    .insight-block .content-wrap {
        position: relative;
        z-index: 2;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transition: transform 0.8s var(--ease-luxury);
    }
    .insight-block:hover .content-wrap {
        transform: scale(1.02);
    }
    .meta-tag {
        font-family: var(--font-body);
        font-size: 11px;
        font-weight: 500;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        margin-bottom: 30px;
        opacity: 0.9;
    }
    .insight-block h3 {
        font-family: var(--font-serif);
        font-weight: 400;
        font-size: 32px;
        line-height: 1.2;
        max-width: 450px;
        color: var(--color-text-light);
        margin: 0;
    }
    .insight-block.newsletter {
        background-color: var(--color-bg-dark);
    }
    .insight-block.newsletter .pill-overlay {
        display: none;
    }
    .insight-article[hidden],
    .insight-placeholder[hidden],
    .insights-no-results[hidden] {
        display: none !important;
    }
    .insights-no-results {
        padding: 80px 24px;
        background-color: var(--color-bg-dark);
        border-top: 1px solid rgba(255,255,255,0.08);
        color: rgba(250,249,246,0.68);
        font-family: var(--font-body);
        font-size: 16px;
        text-align: center;
    }
    
    .hero-right {
        overflow: hidden;
    }
    .hero-image-zoom {
        width: 100%;
        height: 100%;
        background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop');
        background-size: cover;
        background-position: center;
        animation: heroZoom 20s infinite alternate linear;
    }
    @keyframes heroZoom {
        from { transform: scale(1); }
        to { transform: scale(1.1); }
    }
    .btn-hover-line {
        position: relative;
        z-index: 2;
    }
    .btn-hover-line span {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 1px;
        background: var(--color-gold);
        transform: scaleX(1);
        transform-origin: left;
        transition: transform 0.3s;
    }
    .btn-hover-line:hover span {
        transform: scaleX(0);
        transform-origin: right;
    }
</style>

<main>
    <section class="insights-hero">
        <div class="hero-left">
            <div class="gsap-fade-up">
                <h1>Smart<br>Insights</h1>
                <p>What's coming next can shape legal strategy now. Read our insights for analysis on legal developments and the impact they have in the real world.</p>
            </div>
            
            <div class="filters-column gsap-fade-up">
                <!-- Search Bar -->
                <div style="margin-bottom: 40px; position: relative;">
                    <input type="text" id="insightSearch" placeholder="Search by keyword" style="width: 100%; background: transparent; border: none; border-bottom: 1px solid rgba(6,95,70,0.42); padding: 15px 0; font-family: var(--font-body); font-size: 16px; color: #fff; outline: none; transition: border-color 0.3s;" onfocus="this.style.borderColor='var(--color-gold)'" onblur="this.style.borderColor='rgba(6,95,70,0.42)'">
                    <span style="position: absolute; right: 0; top: 15px; color: var(--color-gold);">&rarr;</span>
                </div>

                <div style="border-top: 1px solid rgba(6,95,70,0.42);">
                    <?php foreach ( $gameplan_insight_filters as $filter_key => $filter_config ) : ?>
                        <div class="filter-group" data-filter-group="<?php echo esc_attr( $filter_key ); ?>" data-default-label="<?php echo esc_attr( $filter_config['label'] ); ?>">
                            <div class="filter-row">
                                <span><?php echo esc_html( $filter_config['label'] ); ?></span>
                                <span class="icon" style="transition: transform 0.3s ease; color: var(--color-text-light);">&darr;</span>
                            </div>
                            <div class="filter-content">
                                <ul class="filter-options" data-filter="<?php echo esc_attr( $filter_key ); ?>">
                                    <li class="filter-all-option filter-option" data-filter-type="<?php echo esc_attr( $filter_key ); ?>" data-filter-value="" data-value=""><?php echo esc_html( $filter_config['label'] ); ?></li>
                                    <?php if ( ! empty( $gameplan_filter_terms[ $filter_key ] ) ) : ?>
                                        <?php foreach ( $gameplan_filter_terms[ $filter_key ] as $filter_term ) : ?>
                                            <li class="filter-option" data-filter-type="<?php echo esc_attr( $filter_key ); ?>" data-filter-value="<?php echo esc_attr( $filter_term->slug ); ?>" data-value="<?php echo esc_attr( $filter_term->slug ); ?>"><?php echo esc_html( $filter_term->name ); ?></li>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <li class="no-filter-options"><?php echo esc_html( $filter_config['empty'] ); ?></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button type="button" class="filter-reset">
                    Reset &times;
                </button>
            </div>
        </div>
        <div class="hero-right"></div>
    </section>

    <section class="insights-grid">
        <div class="insight-block newsletter">
            <div class="content-wrap">
                <h2 style="font-family: var(--font-serif); font-size: 42px; font-weight: 400; color: #fff; margin-bottom: 24px; line-height: 1.1;">Subscribe to<br>the newsletter</h2>
                <a href="#" onclick="openNewsletter(event)" class="btn-hover-line" style="font-family: var(--font-body); font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; color: var(--color-gold); text-decoration: none; padding-bottom: 5px;">
                    JOIN US
                    <span></span>
                </a>
            </div>
        </div>

        <?php
        $insights_query = new WP_Query(
            array(
                'post_type'      => 'insights',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC',
            )
        );

        $total_posts = $insights_query->found_posts;
        $posts_shown = 0;

        if ( $insights_query->have_posts() ) :
            while ( $insights_query->have_posts() ) :
                $insights_query->the_post();
                $posts_shown++;

                $article_terms = array();
                $search_parts  = array( get_the_title(), wp_strip_all_tags( get_the_excerpt() ) );

                foreach ( $gameplan_insight_filters as $filter_key => $filter_config ) {
                    $assigned_terms = get_the_terms( get_the_ID(), $filter_config['taxonomy'] );
                    $term_slugs     = array();
                    $term_names     = array();

                    if ( ! is_wp_error( $assigned_terms ) && ! empty( $assigned_terms ) ) {
                        foreach ( $assigned_terms as $assigned_term ) {
                            $term_slugs[] = $assigned_term->slug;
                            $term_names[] = $assigned_term->name;
                        }
                    }

                    $article_terms[ $filter_key ] = array(
                        'slugs' => $term_slugs,
                        'names' => $term_names,
                    );
                    $search_parts = array_merge( $search_parts, $term_names );
                }

                $primary_topic = ! empty( $article_terms['topic']['names'] ) ? $article_terms['topic']['names'][0] : __( 'Insights', 'gameplan' );
                ?>
                <a href="<?php echo esc_url( get_permalink() ); ?>"
                    class="insight-block insight-article insight-card"
                    data-category="<?php echo esc_attr( implode( ' ', $article_terms['category']['slugs'] ) ); ?>"
                    data-sector="<?php echo esc_attr( implode( ' ', $article_terms['sector']['slugs'] ) ); ?>"
                    data-topic="<?php echo esc_attr( implode( ' ', $article_terms['topic']['slugs'] ) ); ?>"
                    data-search="<?php echo esc_attr( implode( ' ', array_filter( $search_parts ) ) ); ?>">
                    <div class="pill-overlay"></div>
                    <div class="content-wrap">
                        <span class="meta-tag"><?php echo esc_html( $primary_topic ); ?> &mdash; <?php echo esc_html( get_the_date( 'd.m.Y' ) ); ?></span>
                        <h3><?php echo esc_html( get_the_title() ); ?></h3>
                    </div>
                </a>
            <?php endwhile;
            wp_reset_postdata();
        endif; ?>

        <?php
        // Fill remaining grid slots to keep layout clean
        $items_in_grid = $posts_shown + 1; // +1 for newsletter block
        $remainder = $items_in_grid % 2;
        if ($remainder !== 0) :
            for ($i = 0; $i < (2 - $remainder); $i++) : ?>
                <div class="insight-block insight-placeholder" aria-hidden="true" style="background-color: var(--color-bg-dark);"></div>
            <?php endfor;
        endif; ?>
    </section>

    <div id="insightsNoResults" class="insights-no-results" hidden>No insights match your search or filters.</div>
</main>

<style>
    /* Mobile Responsiveness */
    @media (max-width: 992px) {
        .insights-hero {
            flex-direction: column;
            min-height: auto;
        }
        .hero-left, .hero-right {
            width: 100% !important;
        }
        .hero-left {
            padding: 144px 32px 54px !important;
            border-right: 0;
        }
        .hero-left h1 {
            font-size: clamp(44px, 13vw, 56px);
            line-height: 0.98;
            margin-bottom: 30px;
        }
        .hero-left p {
            max-width: 330px;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 52px;
        }
        .filter-reset {
            margin-top: 18px;
        }
        .hero-right {
            height: auto !important;
            aspect-ratio: 16 / 10;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .insights-grid {
            grid-template-columns: 1fr !important;
        }
        .insight-block {
            padding: 48px 30px !important;
            min-height: 340px !important;
        }
        .meta-tag {
            margin-bottom: 22px;
            font-size: 10px;
            letter-spacing: 0.16em;
        }
        .insight-block h3 {
            max-width: min(100%, 330px);
            font-size: clamp(28px, 7.6vw, 32px);
            line-height: 1.18;
        }
        .insight-block.newsletter h2 {
            font-size: clamp(34px, 9vw, 40px) !important;
            line-height: 1.08 !important;
            margin-bottom: 22px !important;
        }
    }
</style>

<?php get_footer(); ?>


