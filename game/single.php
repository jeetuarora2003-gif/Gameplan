<?php
/**
 * The template for displaying all single posts
 */

get_header(); ?>

<style>
    :root {
        --color-bg-dark: #050A09;
        --color-gold: #065F46;
        --color-text-light: #FAF9F6;
    }
    
    .article-hero {
        background-color: var(--color-bg-dark);
        padding: 200px 0 100px;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    
    .article-meta-header {
        font-family: var(--font-body);
        font-size: 12px;
        font-weight: 500;
        text-transform: uppercase;
        color: var(--color-gold);
        margin-bottom: 30px;
        letter-spacing: 0.1em;
        display: block;
    }
    
    .article-h1 {
        font-family: var(--font-serif);
        font-size: clamp(48px, 6vw, 84px);
        font-weight: 300;
        color: var(--color-text-light);
        line-height: 1.05;
        max-width: 1000px;
        margin-bottom: 40px;
    }
    
    .article-intro {
        font-family: var(--font-body);
        font-size: 24px;
        font-weight: 300;
        color: rgba(250, 249, 246, 0.7);
        max-width: 800px;
        line-height: 1.5;
    }
    
    .article-body-wrapper {
        background-color: var(--color-bg-light);
    }
    
    .article-layout {
        display: grid;
        grid-template-columns: 250px 1fr 250px;
        gap: 80px;
        padding: 100px 0;
    }
    
    .sticky-sidebar {
        position: sticky;
        top: 140px;
        height: fit-content;
    }
    
    .sidebar-label {
        font-family: var(--font-body);
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        color: rgba(0,0,0,0.4);
        margin-bottom: 20px;
        display: block;
        border-bottom: 1px solid rgba(0,0,0,0.1);
        padding-bottom: 10px;
    }
    
    .author-card {
        margin-bottom: 40px;
    }
    
    .author-name {
        font-family: var(--font-heading);
        font-size: 20px;
        font-weight: 600;
        color: var(--color-text-dark);
        margin-bottom: 5px;
        display: block;
    }
    
    .author-title {
        font-family: var(--font-body);
        font-size: 13px;
        color: rgba(0,0,0,0.6);
    }

    .article-reading-time {
        font-family: var(--font-body);
        font-size: 14px;
        color: rgba(0,0,0,0.6);
    }
    
    .article-body {
        font-family: var(--font-body);
        font-size: 19px;
        line-height: 1.8;
        color: rgba(0,0,0,0.85);
    }
    
    .article-body h2 {
        font-family: var(--font-serif);
        font-size: 42px;
        font-weight: 400;
        margin: 80px 0 30px;
        line-height: 1.2;
        color: var(--color-text-dark);
    }
    
    .article-body h3 {
        font-family: var(--font-heading);
        font-size: 28px;
        font-weight: 600;
        margin: 50px 0 20px;
        color: var(--color-gold);
    }
    
    .article-body p {
        margin-bottom: 30px;
    }
    
    .article-body blockquote {
        margin: 60px 0;
        padding: 40px;
        background-color: #f5f5f5;
        border-left: 4px solid var(--color-gold);
        font-family: var(--font-serif);
        font-size: 28px;
        font-style: italic;
        line-height: 1.4;
        color: var(--color-text-dark);
    }
    
    .article-body ul, .article-body ol {
        margin-bottom: 28px;
        padding-left: 20px;
    }

    .article-body ul {
        list-style: disc;
    }

    .article-body ol {
        list-style: decimal;
    }

    .article-body li {
        margin-bottom: 12px;
    }
    
    .share-links a {
        display: block;
        margin-bottom: 15px;
        font-family: var(--font-body);
        font-size: 13px;
        color: rgba(0,0,0,0.6);
        text-decoration: none;
        transition: color 0.3s;
    }
    
    .share-links a:hover {
        color: var(--color-gold);
    }

    .article-cta {
        margin-top: 100px;
        padding: 60px;
        background-color: var(--color-bg-dark);
        color: var(--color-text-light);
        text-align: center;
        border-radius: 24px;
    }

    .article-cta h4 {
        font-family: var(--font-serif);
        font-size: 32px;
        margin-bottom: 20px;
        line-height: 1.15;
    }

    .article-cta p {
        margin-bottom: 30px;
        opacity: 0.7;
    }
    
    @media (max-width: 1200px) {
        .article-layout {
            grid-template-columns: 1fr;
            padding: 60px 20px;
        }
        .sticky-sidebar {
            position: static;
            margin-bottom: 60px;
        }
    }

    @media (max-width: 768px) {
        .article-hero {
            padding: 138px 0 64px;
        }

        .article-hero .container,
        .article-layout.container {
            width: 100% !important;
            padding-left: 32px !important;
            padding-right: 32px !important;
        }

        .article-meta-header {
            font-size: 11px;
            letter-spacing: 0.14em;
            margin-bottom: 20px;
        }

        .article-h1 {
            max-width: 330px;
            font-size: clamp(38px, 11vw, 48px);
            line-height: 1.04;
            margin-bottom: 28px;
            text-wrap: balance;
        }

        .article-intro {
            max-width: 330px;
            font-size: 18px;
            line-height: 1.65;
        }

        .article-layout {
            gap: 0;
            padding-top: 48px;
            padding-bottom: 72px;
        }

        .article-info {
            display: block;
            margin-bottom: 46px;
            padding-bottom: 32px;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }

        .article-info .sidebar-label {
            margin: 0;
        }

        .article-info .sidebar-label {
            margin-bottom: 10px;
            padding-bottom: 8px;
        }

        .article-info .author-card {
            margin-bottom: 28px;
        }

        .author-name {
            font-size: 19px;
            line-height: 1.25;
        }

        .article-body {
            font-size: 17px;
            line-height: 1.78;
        }

        .article-body p {
            margin-bottom: 24px;
        }

        .article-body h2 {
            font-size: clamp(34px, 10vw, 42px);
            line-height: 1.1;
            margin: 56px 0 22px;
            text-wrap: balance;
        }

        .article-body h3 {
            font-size: 24px;
            line-height: 1.2;
            margin: 40px 0 16px;
        }

        .article-body ul,
        .article-body ol {
            padding-left: 20px;
            margin-bottom: 24px;
        }

        .article-body blockquote {
            margin: 44px 0;
            padding: 28px 24px;
            font-size: 24px;
            line-height: 1.45;
        }

        .article-cta {
            margin-top: 64px;
            padding: 40px 24px;
            border-radius: 18px;
        }

        .article-cta h4 {
            font-size: 30px;
        }

        .article-cta .btn-pill {
            width: auto !important;
            min-width: 142px;
            display: inline-flex !important;
        }

        .article-share {
            margin: 56px 0 0;
            padding-top: 32px;
            border-top: 1px solid rgba(0,0,0,0.1);
        }

        .share-links {
            display: flex;
            flex-wrap: wrap;
            gap: 14px 24px;
        }

        .share-links a {
            margin-bottom: 0;
        }
    }
</style>

<main>
    <?php
    while ( have_posts() ) :
        the_post();
        
        $author_1_name = get_post_meta( get_the_ID(), '_article_author_1_name', true );
        $author_1_title = get_post_meta( get_the_ID(), '_article_author_1_title', true );
        $author_2_name = get_post_meta( get_the_ID(), '_article_author_2_name', true );
        $author_2_title = get_post_meta( get_the_ID(), '_article_author_2_title', true );
        $reading_time = get_post_meta( get_the_ID(), '_article_reading_time', true );
        
        $categories = get_the_category();
        $cat_name = !empty($categories) ? $categories[0]->name : 'Insights';
    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <section class="article-hero">
                <div class="container">
                    <span class="article-meta-header gsap-fade-up"><?php echo esc_html( $cat_name ); ?> &mdash; <?php echo get_the_date('d.m.Y'); ?></span>
                    <h1 class="article-h1 gsap-fade-up"><?php the_title(); ?></h1>
                    <?php if ( has_excerpt() ) : ?>
                        <p class="article-intro gsap-fade-up"><?php echo get_the_excerpt(); ?></p>
                    <?php endif; ?>
                </div>
            </section>

            <div class="article-body-wrapper">
                <section class="article-layout container">
                    <!-- Sidebar Left -->
                    <aside class="sticky-sidebar article-info gsap-fade-up">
                        <span class="sidebar-label">Published By</span>
                        
                        <div class="author-card">
                            <span class="author-name">Litsan Chong</span>
                        </div>
                        
                        <?php if ( $reading_time ) : ?>
                            <span class="sidebar-label">Reading Time</span>
                            <span class="article-reading-time"><?php echo esc_html( $reading_time ); ?></span>
                        <?php endif; ?>
                    </aside>

                    <!-- Main Content -->
                    <div class="article-body gsap-fade-up">
                        <?php the_content(); ?>
                        
                        <div class="article-cta">
                            <h4>Discuss your situation with us</h4>
                            <p>Contact Gameplan Legal for strategic legal support on player contracts and sports disputes.</p>
                            <a href="mailto:connect@gameplanlegal.com" class="btn-pill" style="background: var(--color-gold); border: none; color: #fff;">Get in touch &rarr;</a>
                        </div>
                    </div>
                    
                    <!-- Sidebar Right -->
                    <aside class="sticky-sidebar article-share gsap-fade-up">
                        <span class="sidebar-label">Share This</span>
                        <div class="share-links">
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener">LinkedIn</a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener">Twitter / X</a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener">Facebook</a>
                            <a href="#" onclick="event.preventDefault(); navigator.clipboard.writeText('<?php echo esc_js(get_permalink()); ?>'); alert('Link copied to clipboard!');">Copy Link</a>
                        </div>
                    </aside>
                </section>
            </div>

        </article>
    <?php endwhile; ?>
</main>

<?php
get_footer();


