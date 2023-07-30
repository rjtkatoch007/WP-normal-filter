<?php
/**
 * Sungit Lite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sungit_Lite
 */

if ( ! function_exists( 'sungit_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sungit_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'sungit-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sungit-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'sungit-lite-featured-image', 640, 9999 );
	add_image_size( 'portfolio', 619, 462 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Nav', 'sungit-lite' ),
		) );

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 200,
		'width'       => 200,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sungit_lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( 'post-formats', apply_filters( 'sungit_lite_post_formats', array('image', 'video', 'gallery', 'audio')) );
    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    add_editor_style( get_template_directory(). '/assets/css/editor-style.css' );
}
endif;
add_action( 'after_setup_theme', 'sungit_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sungit_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sungit_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'sungit_lite_content_width', 0 );

/**
 * Return early if Custom Logos are not available.
 *
 * @todo Remove after WP 4.7
 */
function sungit_lite_the_custom_logo() {
	if ( ! function_exists( 'the_custom_logo' ) ) {
		return;
	} else {
		the_custom_logo();
	}
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sungit_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sungit-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Pre-footer 1', 'sungit-lite' ),
		'id'            => 'prefooter-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Pre-footer 2', 'sungit-lite' ),
		'id'            => 'prefooter-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Pre-footer 3', 'sungit-lite' ),
		'id'            => 'prefooter-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sungit_lite_widgets_init' );
if ( ! function_exists( 'sungit_lite_header_style' ) ) :
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @see resortica_lite_custom_header_setup().
     */
    function sungit_lite_header_style($output = '') {
        $header_text_color = get_header_textcolor();


            $output ='.sl-header-sec .nav-wrapper .navbar .navbar-brand,.site-description {
                        color: #'.esc_attr( $header_text_color ).' }';
            return $output;
    }
endif;

if ( ! function_exists( 'sungit_lite_fonts_url' ) ) :
    function sungit_lite_fonts_url() {
        $fonts_url = '';
        $fonts     = array();

        if ( 'off' !== _x( 'on', 'Anton font: on or off', 'sungit-lite' ) ) {
            $fonts[] = 'Anton';
        }

        if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'sungit-lite' ) ) {
            $fonts[] = 'Poppins';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
            ), '//fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;

/**
 * Enqueue scripts and styles.
 */
function sungit_lite_scripts() {
	wp_enqueue_style( 'sungit-lite-fonts', sungit_lite_fonts_url() , array(), null);
	wp_enqueue_style( 'sungit-lite-style', get_stylesheet_uri() );
	$sungit_lite_theme_options = sungit_lite_theme_options();
    $sungit_lite_style = sungit_lite_header_style();
    wp_add_inline_style( 'sungit-lite-style', $sungit_lite_style );
    wp_enqueue_style( 'sungit-lite-allstyles', get_template_directory_uri() . '/assets/css/sungit-lite.css' );
	//wp_enqueue_style( 'foundation', "https://cdn.jsdelivr.net/npm/foundation-sites@6.7.5/dist/css/foundation.min.css" );
	//wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.6.0', true );
	wp_enqueue_script( 'jquery-jaudio', get_template_directory_uri() . '/assets/js/jaudio.js', array('jquery'), '0.2', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	wp_enqueue_script( 'sungit-lite-app', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '20160913', true );
	wp_enqueue_script( 'filterizr', get_template_directory_uri() . '/assets/js/jquery.filterizr.min.js', array(), '3.3.7', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '3.3.7', true );
	wp_localize_script( 'custom', 'bobz', array(
        'nonce'    => wp_create_nonce( 'bobz' ),
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), '3.3.7', true );
	//wp_enqueue_script( 'foundation', "https://cdn.jsdelivr.net/npm/foundation-sites@6.7.5/dist/js/foundation.min.js" );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sungit_lite_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom Header.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Sungit functions.
 */
require get_template_directory() . '/inc/lib/sungit-lite-functions.php';

/**
 * Load Sungit Nav Walker.
 */
require get_template_directory() . '/inc/lib/sungit-lite-nav-walker.php';

/*
 * Include resortca customizer control.
 */
 require get_template_directory() . '/inc/customizer/customizer-control.php';

 require get_template_directory() . '/inc/customizer/class-pro-discount.php';

 // Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Portfolios', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Portfolios', 'text_domain' ),
		'name_admin_bar'        => __( 'Portfolios', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Portfolio', 'text_domain' ),
		'description'           => __( 'Portfolio', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'portfolio_category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'custom_post_type', 0 );

// Register Custom Taxonomy
function custom_portfolio_category() {

	$labels = array(
		'name'                       => _x( 'Portfolio Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Portfolio Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Portfolio Categories', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );

}
add_action( 'init', 'custom_portfolio_category', 0 );

/**
 * AJAC filter posts by taxonomy term
 */
function vb_filter_posts() {

    if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'bobz' ) )
        die('Permission denied');

    /**
     * Default response
     */
    $response = [
        'status'  => 500,
        'message' => 'Something is wrong, please try again later ...',
        'content' => false,
        'found'   => 0
    ];

    $tax  = sanitize_text_field($_POST['params']['tax']);
    $term = sanitize_text_field($_POST['params']['term']);
    $page = intval($_POST['params']['page']);
    $qty  = intval($_POST['params']['qty']);

    /**
     * Check if term exists
     */
    if (!term_exists( $term, $tax) && $term != 'all-terms') :
        $response = [
            'status'  => 501,
            'message' => 'Term doesn\'t exist',
            'content' => 0
        ];

        die(json_encode($response));
    endif;

    if ($term == 'all-terms') : 

        $tax_qry[] = [
            'taxonomy' => $tax,
            'field'    => 'slug',
            'terms'    => $term,
            'operator' => 'NOT IN'
        ];

    else :

        $tax_qry[] = [
            'taxonomy' => $tax,
            'field'    => 'slug',
            'terms'    => $term,
        ];

    endif;

    /**
     * Setup query
     */
    $args = [
        'paged'          => $page,
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => $qty,
        'tax_query'      => $tax_qry
    ];

    $qry = new WP_Query($args);

    ob_start();
        if ($qry->have_posts()) :
            while ($qry->have_posts()) : $qry->the_post(); ?>

                <article class="loop-item">
                    <header>
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </header>
                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div>
                </article>

            <?php endwhile;

            /**
             * Pagination
             */
            vb_ajax_pager($qry,$page);

            $response = [
                'status'=> 200,
                'found' => $qry->found_posts
            ];

            
        else :

            $response = [
                'status'  => 201,
                'message' => 'No posts found'
            ];

        endif;

    $response['content'] = ob_get_clean();

    die(json_encode($response));

}
add_action('wp_ajax_do_filter_posts', 'vb_filter_posts');
add_action('wp_ajax_nopriv_do_filter_posts', 'vb_filter_posts');


/**
 * Shortocde for displaying terms filter and results on page
 */
function vb_filter_posts_sc($atts) {

    $a = shortcode_atts( array(
        'tax'      => 'category', // Taxonomy
        'terms'    => false, // Get specific taxonomy terms only
        'active'   => false, // Set active term by ID
        'per_page' => 12 // How many posts per page
    ), $atts );

    $result = NULL;
    $terms  = get_terms($a['tax']);

    if (count($terms)) :
        ob_start(); ?>
            <div id="container-async" data-paged="<?php echo $a['per_page']; ?>" class="sc-ajax-filter">
                <ul class="nav-filter">
                    <?php foreach ($terms as $term) : ?>
                        <li<?php if ($term->term_id == $a['active']) :?> class="active"<?php endif; ?>>
                            <a href="<?php echo get_term_link( $term, $term->taxonomy ); ?>" data-filter="<?php echo $term->taxonomy; ?>" data-term="<?php echo $term->slug; ?>" data-page="1">
                                <?php echo $term->name; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="status"></div>
                <div class="content"></div>
            </div>
        
        <?php $result = ob_get_clean();
    endif;

    return $result;
}
add_shortcode( 'ajax_filter_posts', 'vb_filter_posts_sc');



/**
 * Pagination
 */
function vb_ajax_pager( $query = null, $paged = 1 ) {

    if (!$query)
        return;

    $paginate = paginate_links([
        'base'      => '%_%',
        'type'      => 'array',
        'total'     => $query->max_num_pages,
        'format'    => '#page=%#%',
        'current'   => max( 1, $paged ),
        'prev_text' => 'Prev',
        'next_text' => 'Next'
    ]);

    if ($query->max_num_pages > 1) : ?>
        <ul class="pagination">
            <?php foreach ( $paginate as $page ) :?>
                <li><?php echo $page; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif;
}