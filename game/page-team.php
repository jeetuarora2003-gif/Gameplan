<?php
/**
 * Template Name: Team Page
 */
get_header(); ?>

<section class="team-landing section-light" style="padding: 180px 0 120px;">
    <div class="container">
        <h1 class="gsap-fade-up" style="font-size: clamp(40px, 5vw, 64px); margin-bottom: 80px; max-width: 800px;">
            Internationally qualified lawyers. <span class="italic text-gold">Real-world insight.</span>
        </h1>
        
        <div class="team-grid grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 60px;">
            <?php
            // Query Custom Post Type "team_member"
            $team_args = array(
                'post_type'      => 'team_member',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC'
            );
            $team_query = new WP_Query( $team_args );

            if ( $team_query->have_posts() ) :
                while ( $team_query->have_posts() ) : $team_query->the_post();
                    $position = get_field('position'); // ACF field
            ?>
                    <a href="<?php the_permalink(); ?>" class="team-card gsap-fade-up" style="display: block; text-decoration: none;">
                        <div class="team-image" style="width: 100%; aspect-ratio: 3/4; overflow: hidden; margin-bottom: 24px; background-color: #e5e5e5;">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%); transition: filter 0.4s ease;' ) ); ?>
                            <?php endif; ?>
                        </div>
                        <h3 style="font-family: var(--font-body); font-size: 20px; font-weight: 500; color: var(--color-text-light); margin-bottom: 8px;">
                            <?php the_title(); ?>
                        </h3>
                        <p style="font-family: var(--font-body); font-size: 15px; color: var(--color-muted);">
                            <?php echo esc_html( $position ? $position : 'Partner' ); ?>
                        </p>
                    </a>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Team members will appear here.</p>';
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Custom CSS for team card hover -->
<style>
    .team-card:hover .team-image img {
        filter: grayscale(0%) !important;
    }
</style>

<?php get_footer(); ?>


