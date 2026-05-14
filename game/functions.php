<?php
/**
 * Gameplan Legal functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function gameplan_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__( 'Primary', 'gameplan' ),
            'footer' => esc_html__( 'Footer Menu', 'gameplan' ),
        )
    );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );
}
add_action( 'after_setup_theme', 'gameplan_setup' );

/**
 * Enqueue scripts and styles.
 */
function gameplan_scripts() {
    // Enqueue Google Fonts used by the reference typography system.
    wp_enqueue_style( 'gameplan-fonts', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300;1,9..40,400;1,9..40,500;1,9..40,600&family=Fraunces:ital,opsz,wght,WONK@0,9..144,300..400,0;1,9..144,300..400,0&family=Inter+Tight:wght@300;400;500&family=Playfair+Display:ital,wght@1,500&display=swap', array(), null );

    // Enqueue Theme CSS
    wp_enqueue_style( 'gameplan-style', get_stylesheet_uri(), array(), '1.0.0' );
    wp_enqueue_style( 'gameplan-main', get_template_directory_uri() . '/assets/css/main.css', array(), '2.0.5' );

    // Global Font Override to prevent stylistic reverts
    $custom_css = "h1, h2, h3, span, p { font-feature-settings: 'ss01' 0, 'cv11' 0, 'ss02' 0 !important; font-variation-settings: 'opsz' 72, 'SOFT' 0, 'WONK' 0 !important; font-optical-sizing: none !important; }";
    wp_add_inline_style( 'gameplan-main', $custom_css );

    // Enqueue GSAP
    wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), '3.12.2', true );
    wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap'), '3.12.2', true );

    // Enqueue Theme JS
    wp_enqueue_script( 'gameplan-main-js', get_template_directory_uri() . '/assets/js/main.js', array('gsap', 'gsap-scrolltrigger'), '2.0.1', true );
    if ( is_page_template( 'page-insights.php' ) || is_post_type_archive( 'insights' ) || is_page( 'insights' ) ) {
        wp_enqueue_script( 'gameplan-insights-filter', get_template_directory_uri() . '/assets/js/insights-filter.js', array(), time(), true );
    }
}
add_action( 'wp_enqueue_scripts', 'gameplan_scripts' );

/**
 * Register Custom Post Types
 */
function gameplan_register_post_types() {
    $team_labels = array(
        'name'                  => _x( 'Team Members', 'Post type general name', 'gameplan' ),
        'singular_name'         => _x( 'Team Member', 'Post type singular name', 'gameplan' ),
        'menu_name'             => _x( 'Team Members', 'Admin Menu text', 'gameplan' ),
        'name_admin_bar'        => _x( 'Team Member', 'Add New on Toolbar', 'gameplan' ),
        'add_new'               => __( 'Add New', 'gameplan' ),
        'add_new_item'          => __( 'Add New Team Member', 'gameplan' ),
        'new_item'              => __( 'New Team Member', 'gameplan' ),
        'edit_item'             => __( 'Edit Team Member', 'gameplan' ),
        'view_item'             => __( 'View Team Member', 'gameplan' ),
        'all_items'             => __( 'All Team Members', 'gameplan' ),
        'search_items'          => __( 'Search Team Members', 'gameplan' ),
        'not_found'             => __( 'No team members found.', 'gameplan' ),
        'not_found_in_trash'    => __( 'No team members found in Trash.', 'gameplan' ),
    );

    $team_args = array(
        'labels'             => $team_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'team' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    );

    register_post_type( 'team_member', $team_args );

    // Insights Post Type
    $insights_labels = array(
        'name'               => _x( 'Insights', 'post type general name', 'gameplan' ),
        'singular_name'      => _x( 'Insight', 'post type singular name', 'gameplan' ),
        'menu_name'          => _x( 'Insights', 'admin menu', 'gameplan' ),
        'add_new'            => _x( 'Add New', 'insight', 'gameplan' ),
        'add_new_item'       => __( 'Add New Insight', 'gameplan' ),
        'edit_item'          => __( 'Edit Insight', 'gameplan' ),
        'new_item'           => __( 'New Insight', 'gameplan' ),
        'all_items'          => __( 'All Insights', 'gameplan' ),
        'view_item'          => __( 'View Insight', 'gameplan' ),
        'search_items'       => __( 'Search Insights', 'gameplan' ),
        'not_found'          => __( 'No insights found', 'gameplan' ),
        'not_found_in_trash' => __( 'No insights found in Trash', 'gameplan' ),
    );

    $insights_args = array(
        'labels'             => $insights_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'insights' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author' ),
        'show_in_rest'       => true, // Enable Gutenberg editor
    );

    register_post_type( 'insights', $insights_args );

    $insight_taxonomies = array(
        'practice_area' => array(
            'label'    => __( 'Practice Areas', 'gameplan' ),
            'singular' => __( 'Practice Area', 'gameplan' ),
            'slug'     => 'practice-area',
        ),
        'sector' => array(
            'label'    => __( 'Sectors', 'gameplan' ),
            'singular' => __( 'Sector', 'gameplan' ),
            'slug'     => 'sector',
        ),
        'topic' => array(
            'label'    => __( 'Topics', 'gameplan' ),
            'singular' => __( 'Topic', 'gameplan' ),
            'slug'     => 'topic',
        ),
    );

    foreach ( $insight_taxonomies as $taxonomy => $config ) {
        register_taxonomy(
            $taxonomy,
            'insights',
            array(
                'labels'            => array(
                    'name'              => $config['label'],
                    'singular_name'     => $config['singular'],
                    'search_items'      => sprintf( __( 'Search %s', 'gameplan' ), $config['label'] ),
                    'all_items'         => sprintf( __( 'All %s', 'gameplan' ), $config['label'] ),
                    'parent_item'       => sprintf( __( 'Parent %s', 'gameplan' ), $config['singular'] ),
                    'parent_item_colon' => sprintf( __( 'Parent %s:', 'gameplan' ), $config['singular'] ),
                    'edit_item'         => sprintf( __( 'Edit %s', 'gameplan' ), $config['singular'] ),
                    'update_item'       => sprintf( __( 'Update %s', 'gameplan' ), $config['singular'] ),
                    'add_new_item'      => sprintf( __( 'Add New %s', 'gameplan' ), $config['singular'] ),
                    'new_item_name'     => sprintf( __( 'New %s Name', 'gameplan' ), $config['singular'] ),
                    'menu_name'         => $config['label'],
                ),
                'hierarchical'      => true,
                'public'            => true,
                'show_ui'           => true,
                'show_admin_column' => true,
                'show_in_rest'      => true,
                'query_var'         => true,
                'rewrite'           => array( 'slug' => $config['slug'] ),
            )
        );
    }
}
add_action( 'init', 'gameplan_register_post_types' );

/**
 * Configure ACF saving to JSON
 */
function gameplan_acf_json_save_point( $path ) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}
add_filter( 'acf/settings/save_json', 'gameplan_acf_json_save_point' );

function gameplan_acf_json_load_point( $paths ) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}
add_filter( 'acf/settings/load_json', 'gameplan_acf_json_load_point' );

// =========================================================================
// ARTICLE METADATA: CUSTOM FIELDS FOR BLOG POSTS
// =========================================================================

function gameplan_add_article_meta_boxes() {
    add_meta_box(
        'gameplan_article_metadata',
        'Article Metadata (Sidebar Info)',
        'gameplan_article_meta_box_html',
        'post',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'gameplan_add_article_meta_boxes' );

function gameplan_article_meta_box_html( $post ) {
    $author_1_name = get_post_meta( $post->ID, '_article_author_1_name', true );
    $author_1_title = get_post_meta( $post->ID, '_article_author_1_title', true );
    $author_2_name = get_post_meta( $post->ID, '_article_author_2_name', true );
    $author_2_title = get_post_meta( $post->ID, '_article_author_2_title', true );
    $reading_time = get_post_meta( $post->ID, '_article_reading_time', true );
    
    wp_nonce_field( 'gameplan_article_meta_nonce_action', 'gameplan_article_meta_nonce' );
    
    ?>
    <style>
        .gp-meta-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .gp-meta-field { margin-bottom: 15px; }
        .gp-meta-field label { display: block; font-weight: bold; margin-bottom: 5px; }
        .gp-meta-field input { width: 100%; padding: 6px 8px; }
    </style>
    
    <div class="gp-meta-grid">
        <div>
            <h4>Author 1 (Primary)</h4>
            <div class="gp-meta-field">
                <label for="author_1_name">Name</label>
                <input type="text" id="author_1_name" name="author_1_name" value="<?php echo esc_attr( $author_1_name ); ?>" placeholder="e.g. Litsan Chong">
            </div>
            <div class="gp-meta-field">
                <label for="author_1_title">Job Title</label>
                <input type="text" id="author_1_title" name="author_1_title" value="<?php echo esc_attr( $author_1_title ); ?>" placeholder="e.g. Sports Law">
            </div>
        </div>
        
        <div>
            <h4>Author 2 (Optional)</h4>
            <div class="gp-meta-field">
                <label for="author_2_name">Name</label>
                <input type="text" id="author_2_name" name="author_2_name" value="<?php echo esc_attr( $author_2_name ); ?>" placeholder="e.g. Co-author Name">
            </div>
            <div class="gp-meta-field">
                <label for="author_2_title">Job Title</label>
                <input type="text" id="author_2_title" name="author_2_title" value="<?php echo esc_attr( $author_2_title ); ?>" placeholder="e.g. Job Title">
            </div>
        </div>
    </div>
    
    <hr style="margin: 20px 0;">
    
    <div class="gp-meta-field">
        <label for="reading_time">Reading Time</label>
        <input type="text" id="reading_time" name="reading_time" value="<?php echo esc_attr( $reading_time ); ?>" placeholder="e.g. 6 Minutes" style="width: 50%;">
    </div>
    <?php
}

function gameplan_save_article_meta( $post_id ) {
    if ( ! isset( $_POST['gameplan_article_meta_nonce'] ) || ! wp_verify_nonce( $_POST['gameplan_article_meta_nonce'], 'gameplan_article_meta_nonce_action' ) ) {
        return;
    }
    
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    
    $fields = array(
        'author_1_name' => '_article_author_1_name',
        'author_1_title' => '_article_author_1_title',
        'author_2_name' => '_article_author_2_name',
        'author_2_title' => '_article_author_2_title',
        'reading_time' => '_article_reading_time',
    );
    
    foreach ( $fields as $post_key => $meta_key ) {
        if ( isset( $_POST[$post_key] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[$post_key] ) );
        }
    }
}
add_action( 'save_post', 'gameplan_save_article_meta' );
