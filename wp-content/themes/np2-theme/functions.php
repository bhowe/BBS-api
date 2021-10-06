<?php 
/* Add Some Default Wordpress Functionality */
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 300, 200, true ); // Normal post thumbnails
	add_image_size( 'single-post-thumbnail', 300, 9999 ); // Permalink thumbnail size
	add_image_size( 'full-post-thumbnail', 600, 400, true ); // For full width blog listing
	add_image_size( 'landscape', 400, 200, true ); // rectangle image for column blog layout

	add_filter( 'image_size_names_choose', 'my_custom_sizes' );

		function my_custom_sizes( $sizes ) {
		    return array_merge( $sizes, array(
		        'single-post-thumbnail' => __('Single Post Thumbnail'),
		    ) );
		}

// Add custom colors to gutenberg pallette
function custom_colors_theme_support() {
    add_theme_support( 'editor-color-palette', bm2_gutenberg_colors() );
  }
  add_action('after_setup_theme','custom_colors_theme_support', 16);

function bm2_gutenberg_colors() {
	global $colors;
	$green_color = get_theme_mod( 'green_color', '' );
	$green_color_name = get_theme_mod( 'green_color_name', '' );
	$green_color_slug = get_theme_mod( 'green_color_slug', '' );
	if( !empty($green_color) ) {
		$green_color = get_theme_mod( 'green_color', '' );
	} else {
		$green_color = '#33A798';
	}
	if( $green_color_name !== "" ) {
		$green_color_name = get_theme_mod( 'green_color_name', '' );
	} else {
		$green_color_name = set_theme_mod( 'green_color_name', 'Green' );
	}
	if( $green_color_slug !=="" ) {
		$green_color_slug = get_theme_mod( 'green_color_slug', '' );
	} else {
		$green_color_slug = set_theme_mod( 'green_color_slug', 'green' );
	}

	$dark_green_color = get_theme_mod( 'dark_green_color', '' );
	$dark_green_color_name = get_theme_mod( 'green_color_name', '' );
	$dark_green_color_slug = get_theme_mod( 'green_color_slug', '' );
	if( !empty($dark_green_color) ) {
		$dark_green_color = get_theme_mod( 'dark_green_color', '' );
	} else {
		$dark_green_color = '#287a70';
	}
	if( $dark_green_color_name !== "" ) {
		$dark_green_color_name = get_theme_mod( 'dark_green_color_name', '' );
	} else {
		$dark_green_color_name = set_theme_mod( 'dark_green_color_name', 'Dark Green' );
	}
	if( $dark_green_color_slug !=="" ) {
		$dark_green_color_slug = get_theme_mod( 'dark_green_color_slug', '' );
	} else {
		$dark_green_color_slug = set_theme_mod( 'dark_green_color_slug', 'dark-green' );
	}

    $purple_color = get_theme_mod( 'purple_color', '' );
    $purple_color_name = get_theme_mod( 'purple_color_name', '' );
    $purple_color_slug = get_theme_mod( 'purple_color_slug', '' );
    //var_dump($purple_color_name);
    if( !empty($purple_color) ) {
		$purple_color = get_theme_mod( 'purple_color', '' );
	} else {
		$purple_color = '#794280';
	}
	if( $purple_color_name !== "" ) {
		$purple_color_name = get_theme_mod( 'purple_color_name', '' );
	} else {
		$purple_color_name = set_theme_mod( 'purple_color_name', 'Purple' );
	}
	if( $purple_color_slug !=="" ) {
		$purple_color_slug = get_theme_mod( 'purple_color_slug', '' );
	} else {
		$purple_color_slug = set_theme_mod( 'purple_color_slug', 'purple' );
	}

    $blue_color = get_theme_mod( 'blue_color', '' );
    $blue_color_name = get_theme_mod( 'blue_color_name', '' );
	$blue_color_slug = get_theme_mod( 'blue_color_slug', '' );
    if( !empty($blue_color) ) {
		$blue_color = get_theme_mod( 'blue_color', '' );
	} else {
		$blue_color = '#2FD3F5';
	}
	if( $blue_color_name !== "" ) {
		$blue_color_name = get_theme_mod( 'blue_color_name', '' );
	} else {
		$blue_color_name = set_theme_mod( 'blue_color_name', 'Blue' );
	}
	if( $blue_color_slug !=="" ) {
		$blue_color_slug = get_theme_mod( 'blue_color_slug', '' );
	} else {
		$blue_color_slug = set_theme_mod( 'blue_color_slug', 'blue' );
	}

    $teal_color = get_theme_mod( 'teal_color', '' );
    $teal_color_name = get_theme_mod( 'teal_color_name', '' );
	$teal_color_slug = get_theme_mod( 'teal_color_slug', '' );
    if( !empty($teal_color) ) {
		$teal_color = get_theme_mod( 'teal_color', '' );
	} else {
		$teal_color = '#14CAB3';
	}
	if( $teal_color_name !== "" ) {
		$teal_color_name = get_theme_mod( 'teal_color_name', '' );
	} else {
		$teal_color_name = set_theme_mod( 'teal_color_name', 'Teal' );
	}
	if( $teal_color_slug !=="" ) {
		$teal_color_slug = get_theme_mod( 'teal_color_slug', '' );
	} else {
		$teal_color_slug = set_theme_mod( 'teal_color_slug', 'teal' );
	}

    $dark_purple_color = get_theme_mod( 'dark_purple_color', '' );
    $dark_purple_color_name = get_theme_mod( 'dark_purple_color_name', '' );
	$dark_purple_color_slug = get_theme_mod( 'dark_purple_color_slug', '' );
    if( !empty($dark_purple_color) ) {
		$dark_purple_color = get_theme_mod( 'dark_purple_color', '' );
	} else {
		$dark_purple_color = '#6A5387';
	}
	if( $dark_purple_color_name !== "" ) {
		$dark_purple_color_name = get_theme_mod( 'dark_purple_color_name', '' );
	} else {
		$dark_purple_color_name = set_theme_mod( 'dark_purple_color_name', 'Dark Purple' );
	}
	if( $dark_purple_color_slug !== "" ) {
		$dark_purple_color_slug = get_theme_mod( 'dark_purple_color_slug', '' );
	} else {
		$dark_purple_color_slug = set_theme_mod( 'dark_purple_color_slug', 'dark-purple' );
	}
	
   $colors = array(
      array(
         'name' => __( 'Black', 'bmighty2' ),
         'slug' => 'black',
         'color' => '#333',
      ),
      array(
         'name' => __( 'White', 'bmighty2' ),
         'slug' => 'white',
         'color' => '#ffffff',
      ),
      array(
         'name' => __( 'Gray', 'bmighty2' ),
         'slug' => 'gray',
         'color' => '#95989A',
      ),
      array(
         'name' => __( 'Light Gray', 'bmighty2' ),
         'slug' => 'light-gray',
         'color' => '#F2F2F2',
      ),
      array(
         'name' => $green_color_name,
         'slug' => $green_color_slug,
         'color' => $green_color,
      ),
      array(
         'name' => $dark_green_color_name,
         'slug' => $dark_green_color_slug,
         'color' => $dark_green_color,
      ),
      array(
         'name' => $purple_color_name,
         'slug' => $purple_color_slug,
         'color' => $purple_color,
      ),
      array(
         'name' => $blue_color_name,
         'slug' => $blue_color_slug,
         'color' => $blue_color,
      ),
      array(
         'name' => $teal_color_name,
         'slug' => $teal_color_slug,
         'color' => $teal_color,
      ),
      array(
         'name' => $dark_purple_color_name,
         'slug' => $dark_purple_color_slug,
         'color' => $dark_purple_color,
      ),
    );
    return $colors;
}

$siteColors = bm2_gutenberg_colors();
//var_dump($siteColors);
$hexColor  = array_column($siteColors, 'color');
$colorName = array_column($siteColors, 'slug');


add_action('customize_controls_print_footer_scripts', function () {
	global $hexColor;
    ?>
  <script>
    jQuery(document).ready(function($){
    	var colors = <?php echo json_encode($hexColor); ?>;
    	// console.log(colors);
      $('.wp-picker-container').iris({
        mode: 'hsl',
        controls: { 
          horiz: 'h', // square horizontal displays hue
          vert: 's', // square vertical displays saturdation
          strip: 'l' // slider displays lightness
        },
        palettes: colors
      })
    });
  </script>
  <?php
});

/**
 * Register Google Fonts
 */
function gutenberg_starter_theme_fonts_url() {
	$headings_font = esc_html(get_theme_mod('google_header_fonts'));
	$text_font = esc_html(get_theme_mod('google_text_fonts'));

	if( $headings_font ) {
		wp_enqueue_style( 'np3-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );
	} else {
		//wp_enqueue_style( 'np3-source-times', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
	}
	if( $text_font ) {
		wp_enqueue_style( 'np3-body-fonts', '//fonts.googleapis.com/css?family='. $text_font );
	} elseif ( $text_font == 'Default') {
		wp_enqueue_style( 'np3-source-body', '//fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,600, 800');
	} else {
		wp_enqueue_style( 'np3-source-body', '//fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,600, 800');
	}
}
add_action( 'wp_enqueue_scripts', 'gutenberg_starter_theme_fonts_url' );
add_action( 'admin_enqueue_scripts', 'gutenberg_starter_theme_fonts_url' );
// This adds support to customize header image area
	$header_defaults = array(
	'default-image'          => get_template_directory_uri() . '/images/header.png',
	'random-default'         => false,
	// 'width'                  => ,
	// 'height'                 => ,
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => '',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
	add_theme_support( 'custom-header', $header_defaults );

// Add support for rss feed links
	add_theme_support( 'automatic-feed-links' );

//This feature allows the use of HTML5 markup for the search forms, comment forms, comment lists, gallery, and caption
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

// This adds support for pre-styled posts selected from drop-down on post edit pages
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

// Add theme support for title tags
   add_theme_support( 'title-tag' );

// Add theme support for editor styles
   add_theme_support( 'editor-styles' );
   add_editor_style( '/css/custom-editor-style/style.css' );

// Add theme support for gutenberg
   add_theme_support(
	    'gutenberg',
	    array( 'wide-images' => true )
	);
   add_theme_support( 'align-wide' );
   add_theme_support( 'responsive-embeds' );
   
// This adds theme support for custom menus via wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'bmighty2' ),
		'secondary' => __( 'Secondary Navigation', 'bmighty2' ),
	) );

// Add theme support for selective refresh for widgets
	add_theme_support( 'customize-selective-refresh-widgets' );

/**
 * Check if WooCommerce is activated
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}

if( is_woocommerce_activated() ) {
// Add themes support for woocommerce
	function mytheme_add_woocommerce_support() {
	    add_theme_support( 'woocommerce' );
	    add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}

	add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
}

// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'bmighty2', get_template_directory() . '/languages' );
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
		
// Include default content width specs
	if ( ! isset( $content_width ) ) $content_width = 1200;

//Add comment reply js
	function xtreme_enqueue_comments_reply() {
		if( get_option( 'thread_comments' ) )  {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'comment_form_before', 'xtreme_enqueue_comments_reply' );

if ( ! function_exists( 'shape_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Shape 1.0
 */
function shape_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
    ?>
    <li class="post pingback">
        <p><?php _e( 'Pingback:', 'shape' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'shape' ), ' ' ); ?></p>
    <?php
            break;
        default :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment">
            <footer>
                <div class="comment-author vcard">
                	<div class="avatar-wrapper">
                    	<?php echo get_avatar( $comment, 74 ); ?>
                    </div>
                    <div class="comment-author-wrapper">
                    	<?php printf( __( '%s', 'shape' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                    </div>
                </div><!-- .comment-author .vcard -->
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em><?php _e( 'Your comment is awaiting moderation.', 'shape' ); ?></em>
                    <br />
                <?php endif; ?>
 
                <div class="comment-meta commentmetadata">
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
                    <?php
                        /* translators: 1: date, 2: time */
                        printf( __( '%1$s at %2$s', 'shape' ), get_comment_date(), get_comment_time() ); ?>
                    </time></a>
                    <?php edit_comment_link( __( '(Edit)', 'shape' ), ' ' );
                    ?>
                </div><!-- .comment-meta .commentmetadata -->
            </footer>
 
            <div class="comment-content"><?php comment_text(); ?></div>
 
            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div><!-- .reply -->
        </article><!-- #comment-## -->
 
    <?php
            break;
    endswitch;
}
endif; // ends check for shape_comment()

function custom_comment_reply_link($content) {
    $extra_classes = 'button small';
    return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content);
}

add_filter('comment_reply_link', 'custom_comment_reply_link', 99);

//Remove wp version from showing in head
	remove_action('wp_head', 'wp_generator');

// Add excerpt box support to pages and posts
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

function wpse_allowedtags() {
    // Add custom tags to this string
        return '<strong>,<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<img>,<video>,<audio>';
    }

//Add custom widget areas
function bmighty2_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Header Widget Area', 'bmighty2' ),
		'id' => 'header-widget-area',
		'description' => __( 'The header widget area', 'bmighty2' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s small-12 medium-4 large-4 columns clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Blog Widget Area', 'bmighty2' ),
		'id' => 'blog-widget-area',
		'description' => __( 'The blog widget area', 'bmighty2' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s small-12">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	

	register_sidebar( array(
		'name' => __( 'Top Footer Widget Area', 'bmighty2' ),
		'id' => 'top-footer-widget-area',
		'description' => __( 'The top footer widget area', 'bmighty2' ),
		'before_widget' => '<div id="%1$s" class="small-6 medium-auto widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	if ( is_active_sidebar( 'top-footer-widget-area' )) {
		$divAlign = 'auto';
	} else {
		$divAlign = 'shrink';
	}
	register_sidebar( array(
		'name' => __( 'Bottom Footer Widget Area', 'bmighty2' ),
		'id' => 'bottom-footer-widget-area',
		'description' => __( 'The bottom footer widget area', 'bmighty2' ),
		'before_widget' => '<div id="%1$s" class="cell '.$divAlign.' widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	if( is_woocommerce_activated() ) {
		register_sidebar( array(
			'name' => __( 'Shop Widget Area', 'bmighty2' ),
			'id' => 'shop-widget-area',
			'description' => __( 'The shop widget area', 'bmighty2' ),
			'before_widget' => '<div id="%1$s" class="cell auto widget-container %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}

}

add_action( 'widgets_init', 'bmighty2_widgets_init' );

//Add any meta info, etc to header here
function bm2_head() {
	echo '<link rel="profile" href="http://gmpg.org/xfn/11" />';
	echo '<link rel="pingback" href="'; bloginfo( "pingback_url" ); echo '" />';
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1" />';
	echo '<meta name="format-detection" content="telephone=no">';
	echo '<link rel="shortcut icon" href="'.esc_url( get_theme_mod( 'themeslug_favicon' ) ).'" />';
	echo '<link rel="apple-touch-icon" sizes="144x144" href="'.esc_url( get_theme_mod( 'themeslug_favicon' ) ).'" />';
	echo '<link rel="apple-touch-icon" sizes="114x114" href="'.esc_url( get_theme_mod( 'themeslug_favicon' ) ).'" />';
	echo '<link rel="apple-touch-icon" sizes="72x72" href="'.esc_url( get_theme_mod( 'themeslug_favicon' ) ).'" />';
	echo '<link rel="apple-touch-icon" href="'.esc_url( get_theme_mod( 'themeslug_favicon' ) ).'" />';
}
add_action('wp_head', 'bm2_head');


//Register all scripts for site here
function add_bm2_scripts() {
	wp_register_script( 'whatinput', get_template_directory_uri() . '/js/what-input.js', array('jquery'),'',true  );
	wp_enqueue_script( 'whatinput' );
	wp_register_script( 'zurb', 'https://cdn.jsdelivr.net/npm/foundation-sites@6.5.3/dist/js/foundation.min.js', array('jquery'),'',true  );
	wp_enqueue_script( 'zurb' );
	wp_register_script( 'font-awesome', 'https://kit.fontawesome.com/c788a16803.js', array('jquery'),'',true  );
	wp_enqueue_script( 'font-awesome' );
	// wp_register_script( 'aniview', 'https://unpkg.com/jquery-aniview/dist/jquery.aniview.js', array('jquery'),'',true  );
	// wp_enqueue_script( 'aniview' );
	wp_register_script( 'bm2-custom-scripts', get_template_directory_uri() . '/js/bm2.js', array('jquery'),'',true  );
	wp_enqueue_script( 'bm2-custom-scripts' );
	wp_register_script( 'zurb-modernizer-scripts', get_template_directory_uri() . '/js/modernizr.js', array('jquery'),'',false  );
	wp_enqueue_script( 'zurb-modernizer-scripts' );
}
add_action( 'wp_enqueue_scripts', 'add_bm2_scripts');

// Enqueue scripts for standard block editor
function be_gutenberg_scripts() {

	wp_enqueue_script(
		'be-editor', 
		get_stylesheet_directory_uri() . '/js/editor.js', 
		array( 'wp-blocks', 'wp-dom' ), 
		filemtime( get_stylesheet_directory() . '/js/editor.js' ),
		true
	);
}
//add_action( 'enqueue_block_editor_assets', 'be_gutenberg_scripts' );

//Register all css stylesheets here
function add_bm2_styles() {
	
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
	wp_register_style( 'Zurb_css', 'https://cdn.jsdelivr.net/npm/foundation-sites@6.5.3/dist/css/foundation.min.css' );
	wp_enqueue_style('Zurb_css');
	// wp_register_style( 'animatecss', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css' );
	// wp_enqueue_style('animatecss');
	wp_enqueue_style( 'editor', get_template_directory_uri() . '/style-editor.css' );
	wp_enqueue_style( 'gutenberg-starter-theme-fonts', gutenberg_starter_theme_fonts_url() );
	wp_enqueue_style( 'bmighty2-style', get_template_directory_uri() .'/style.css' );
	// wp_register_style( 'animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css' );
	// wp_enqueue_style('animate');
}
add_action('wp_enqueue_scripts', 'add_bm2_styles');

//Customize Read More Button
// Replaces the excerpt "more" text by a link
function new_excerpt_more( $more ) {
	return ' <a class="read-more button small" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More...', 'your-text-domain' ) . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

//* Changing excerpt more - only works where excerpt IS hand-crafted
function manual_excerpt_more( $excerpt ) {
	$excerpt_more = '';
	if( has_excerpt() ) {
    	$excerpt_more = '&nbsp;<a class="read-more button small" href="' . get_permalink() . '" rel="nofollow">Read More...</a>';
	}
	return $excerpt . $excerpt_more;
}
add_filter( 'get_the_excerpt', 'manual_excerpt_more' );

/******PREVENT ADMIN DELTETION********/
add_action( 'delete_user', 'squirell_contingency' );
function squirell_contingency( $id ) {

	$dont_delete_ids = array( 1 );
	if ( in_array( $id, $dont_delete_ids ) )
		wp_die( 'You cannot delete this user account.' );
}

// unregister some default WP Widgets
function unregister_default_wp_widgets() {
  unregister_widget('WP_Widget_Pages');
  unregister_widget('WP_Widget_Calendar');
  unregister_widget('WP_Widget_Meta');
  unregister_widget('WP_Widget_RSS');
  unregister_widget('WP_Widget_Tag_Cloud');
}
add_action('widgets_init', 'unregister_default_wp_widgets', 1);

//import widgets and misc files as needed
	// require_once 'widgets/about-widget.php';
	// require_once 'widgets/featured-blocks.php';
	require_once 'inc/widgets/ms-connect-widget.php';
	// require_once 'widgets/ms-contact-widget.php';
	require_once 'inc/widgets/mightymail_widget.php';
	// require_once 'widgets/ms-map-widget.php';
	// require_once 'widgets/ms-img-block.php';
	require_once 'custom-posts/campaigns.php';

	/**
	 * Theme Settings
	 */
	require get_template_directory() . '/inc/customizer.php';

// Set admin favicon
function pa_admin_area_favicon() {
	echo '<link rel="shortcut icon" href="'.get_template_directory_uri().'/images/bM2-favicon.ico" />';
}
add_action('admin_head', 'pa_admin_area_favicon');

/*Let's add some customization to the dashboard */

function custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_template_directory_uri().'/images/logo-login.png) !important;background-size:100% 100% !important;width:270px !important; }
		body.login {background:#fff;}
    </style>';
}
add_action('login_head', 'custom_login_logo');

function custom_url(){
    return ('http://www.bmighty2.com/');
}
add_filter('login_headerurl', 'custom_url');

function remove_footer_admin () {
    echo 'Website by <a href="http://www.bmighty2.com">bMighty2</a> | For Help with your Mighty Site, call 1-800-975-2396 or check out our <a href=" https://www.youtube.com/user/bMighty2">video tutorials</a>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/* On Theme Activation add some default pages */
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {

	$new_page_title = 'Contact';
	$new_page_content = 'Use Contact Form 7 to create form for this page. Be sure to use Really Simple Captcha plugin.';
	$new_page_template = 'contact-page.php'; 
	$page_check = get_page_by_title($new_page_title);
	$new_page = array(
		'post_type' => 'page',
		'post_title' => $new_page_title,
		'post_content' => $new_page_content,
		'post_status' => 'publish',
		'post_author' => 1,
	);
	if(!isset($page_check->ID)){
		$new_page_id = wp_insert_post($new_page);
		if(!empty($new_page_template)){
			update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
		}
	}

	$new_page_title = 'Home';
	$new_page_content = 'This is the page content';
	$new_page_template = ''; 
	$page_check = get_page_by_title($new_page_title);
	$new_page = array(
		'post_type' => 'page',
		'post_title' => $new_page_title,
		'post_content' => $new_page_content,
		'post_status' => 'publish',
		'post_author' => 1,
	);
	if(!isset($page_check->ID)){
		$new_page_id = wp_insert_post($new_page);
		if(!empty($new_page_template)){
			update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
		}
	}

	$new_page_title = 'Latest News';
	$new_page_content = 'News Feed is Dynamically Added';
	$new_page_template = ''; 

	$page_check = get_page_by_title($new_page_title);
	$new_page = array(
		'post_type' => 'page',
		'post_title' => $new_page_title,
		'post_content' => $new_page_content,
		'post_status' => 'publish',
		'post_author' => 1,
	);
	if(!isset($page_check->ID)){
		$new_page_id = wp_insert_post($new_page);
		if(!empty($new_page_template)){
			update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
		}
	}
	
	$new_page_title = 'Login';
	$new_page_content = '';
	$new_page_template = 'login-page.php'; 
	$page_check = get_page_by_title($new_page_title);
	$new_page = array(
		'post_type' => 'page',
		'post_title' => $new_page_title,
		'post_content' => $new_page_content,
		'post_status' => 'publish',
		'post_author' => 1,
	);
	if(!isset($page_check->ID)){
		$new_page_id = wp_insert_post($new_page);
		if(!empty($new_page_template)){
			update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
		}
	}

	$new_page_title = 'Register';
	$new_page_content = '';
	$new_page_template = 'register.php'; 
	$page_check = get_page_by_title($new_page_title);
	$new_page = array(
		'post_type' => 'page',
		'post_title' => $new_page_title,
		'post_content' => $new_page_content,
		'post_status' => 'publish',
		'post_author' => 1,
	);
	if(!isset($page_check->ID)){
		$new_page_id = wp_insert_post($new_page);
		if(!empty($new_page_template)){
			update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
		}
	}

	$new_page_title = 'Lost Password';
	$new_page_content = '';
	$new_page_template = 'lost-password.php'; 
	$page_check = get_page_by_title($new_page_title);
	$new_page = array(
		'post_type' => 'page',
		'post_title' => $new_page_title,
		'post_content' => $new_page_content,
		'post_status' => 'publish',
		'post_author' => 1,
	);
	if(!isset($page_check->ID)){
		$new_page_id = wp_insert_post($new_page);
		if(!empty($new_page_template)){
			update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
		}
	}

	//don't change the code bellow, unless you know what you're doing

	$page_check = get_page_by_title($new_page_title);
	$new_page = array(
		'post_type' => 'page',
		'post_title' => $new_page_title,
		'post_content' => $new_page_content,
		'post_status' => 'publish',
		'post_author' => 1,
	);
	if(!isset($page_check->ID)){
		$new_page_id = wp_insert_post($new_page);
		if(!empty($new_page_template)){
			update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
		}
	}
	
/* Add Custom Site Roles */
add_role('site_owner', 'Site Owner', array(
		'read' => true,
		'moderate_comments' => true,
		'manage_categories' => true,
		'manage_links' => true,
		'unfiltered_html' => true,
		'edit_others_posts' => true,
		'edit_pages' => true,
		'edit_others_pages' => true,
		'edit_published_pages' => true,
		'publish_pages' => true,
		'delete_pages' => true,
		'delete_others_pages' => true,
		'delete_published_pages' => true,
		'delete_others_posts' => true,
		'delete_private_posts' => true,
		'edit_private_posts' => true,
		'read_private_posts' => true,
		'delete_private_pages' => true,
		'edit_private_pages' => true,
		'read_private_pages' => true,
		'edit_published_posts' => true,
		'upload_files' => true,
		'publish_posts' => true,
		'delete_published_posts' => true,
		'edit_posts' => true,
		'delete_posts' => true,
		'unfiltered_html' => true,
		'create_users' => true,
		'delete_users' => true,
		'edit_files' => true,
		'edit_users' => true,
		'list_users' => true,
		'remove_users' => true,
		'unfiltered_upload' => true,
		'edit_dashboard' => true,
		'edit_theme_options' => true,
		
		/* They can't do these things */
		'update_core' => false,
		'install_themes' => false,
		'edit_themes' => false,
		'delete_themes' => false,
		'switch_themes' => false,
		'install_plugins' => false,
		'update_plugins' => false,
		'activate_plugins' => false,
		'edit_plugins' => false,
		'delete_plugins' => false,
		'manage_links' => false,
		'export' => false,
		'import' => false,
		'manage_options' => false,
		'promote_users' => false,
	));
	
}

if(!current_user_can( 'install_themes' ) ) {

	function hide_adminstrator_editable_roles( $roles ){
		if ( isset( $roles['administrator'] ) && !current_user_can('level_10') ){
			unset( $roles['administrator'] );
		}
		return $roles;
	}
	add_action( 'editable_roles' , 'hide_adminstrator_editable_roles' );
	
	function remove_menu_pages() {
			remove_menu_page( 'tools.php' );
			//remove_submenu_page( 'themes.php', 'widgets.php' );
			remove_submenu_page( 'themes.php', 'themes.php' );
			remove_submenu_page( 'themes.php', 'theme-settings' );
	}
	add_action( 'admin_menu', 'remove_menu_pages' );
	
	// remove links/menus from the admin bar
	function mytheme_admin_bar_render() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('appearance');
	}
	add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );
	
}

//Now let's add the ability to change the favicon via the wordpress customizer options
function themeslug_theme_customizer_favicon( $wp_customize ) {
    $wp_customize->add_section( 'themeslug_favicon_section' , array(
      'title'       => __( 'Favicon', 'themeslug' ),
      'priority'    => 30,
      'description' => 'Upload a favicon to your Wordpress',
  ) );
    $wp_customize->add_setting( 'themeslug_favicon' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_favicon', array(
      'label'    => __( 'Favicon', 'themeslug' ),
      'section'  => 'themeslug_favicon_section',
      'settings' => 'themeslug_favicon',
  ) ) );
}
add_action('customize_register', 'themeslug_theme_customizer_favicon');

//add numbered pagination
function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }
  
  /////Insert this code after loop to print out pagination links
  //change $happens to match query name
  ///
  ///if (function_exists(custom_pagination)) {
  ///custom_pagination($happens->max_num_pages,"",$paged);
  ///} 
  ///
  ///
  /// add this before the start of the query
  ///$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  ///
  /// add this to the query array
  ///'paged' => $paged

}

add_filter('next_posts_link_attributes', 'next_posts_link_attributes');
function next_posts_link_attributes() {
	return 'class="button small right"';
}


add_filter('previous_posts_link_attributes', 'posts_link_attributes');
function posts_link_attributes() {
    return 'class="button small left"';
}

/**
 * Hide email from Spam Bots using a shortcode.
 *
 * @param array  $atts    Shortcode attributes. Not used.
 * @param string $content The shortcode content. Should be an email address.
 *
 * @return string The obfuscated email address. 
 */
function wpcodex_hide_email_shortcode( $atts , $content = null ) {
	if ( ! is_email( $content ) ) {
		return;
	}

	$atts = shortcode_atts(
		array(
			'textalign' => 'left'
		), $atts, 'email'
	);

	if( $atts['textalign'] == 'center' ) {
		$setWidth = 'width:100%;display:block;';
	} else {
		$setWidth = 'width:auto;';
	}

	return '<a aria-label="click to email '.antispambot( $content ).'" style="text-align:'.$atts['textalign'] .';'.$setWidth.'" href="mailto:' . antispambot( $content ) . '">' . antispambot( $content ) . '</a>';
}
add_shortcode( 'email', 'wpcodex_hide_email_shortcode' );
add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'widget_text', 'do_shortcode' );

add_filter( 'wp_check_filetype_and_ext', 'wpse_file_and_ext_webp', 10, 4 );
function wpse_file_and_ext_webp( $types, $file, $filename, $mimes ) {
    if ( false !== strpos( $filename, '.svg' ) ) {
        $types['ext'] = 'svg';
        $types['type'] = 'image/svg+xml';
    }

    return $types;
}

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/*
* Hide WP version strings from scripts and styles
 * @return {string} $src
 * @filter script_loader_src
 * @filter style_loader_src
 */
function fjarrett_remove_wp_version_strings( $src ) {
     global $wp_version;
     parse_str(parse_url($src, PHP_URL_QUERY), $query);
     if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
          $src = remove_query_arg('ver', $src);
     }
     return $src;
}
add_filter( 'script_loader_src', 'fjarrett_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'fjarrett_remove_wp_version_strings' );

/* Hide WP version strings from generator meta tag */
function wpmudev_remove_version() {
return '';
}
add_filter('the_generator', 'wpmudev_remove_version');

/**** Create Site Integrated Login Page ******/
function redirect_login_page() {
    $login_page  = home_url( '/login/' );
    $page_viewed = basename($_SERVER['REQUEST_URI']);
 	
    if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
        wp_redirect($login_page);
        exit;
    }
}
add_action('init','redirect_login_page');

function login_failed() {
    $login_page  = home_url( '/login/' );
    wp_redirect( $login_page . '?login=failed' );
    exit;
}
add_action( 'wp_login_failed', 'login_failed' );
 
function verify_username_password( $user, $username, $password ) {
    $login_page  = home_url( '/login/' );
    if( $username == "" || $password == "" ) {
        wp_redirect( $login_page . "?login=empty" );
        exit;
    }
}
add_filter( 'authenticate', 'verify_username_password', 1, 3);

function logout_page() {
    $login_page  = home_url();
    wp_redirect( $login_page . "?login=false" );
    exit;
}
add_action('wp_logout','logout_page');

function my_login_redirect( $url, $request, $user ){
    if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
        if( $user->has_cap( 'administrator' ) ) {
            $url = admin_url();
        } else {
            $url = home_url();
        }
    }
    return $url;
}
add_filter('login_redirect', 'my_login_redirect', 10, 3 );

/** Redirect Register Page **/
function redirect_register_page() {
    $login_page  = home_url( '/register/' );
    $page_viewed = basename($_SERVER['REQUEST_URI']);
 
    if( $page_viewed == "wp-login.php?action=register" && $_SERVER['REQUEST_METHOD'] == 'GET') {
        wp_redirect($login_page);
        exit;
    }
}
add_action('init','redirect_register_page');

/** Redirect Lost Password Page **/
function redirect_lost_password_page() {
    $login_page  = home_url( '/lost-password/' );
    $page_viewed = basename($_SERVER['REQUEST_URI']);
 
    if( $page_viewed == "wp-login.php?action=lostpassword" && $_SERVER['REQUEST_METHOD'] == 'GET') {
        wp_redirect($login_page);
        exit;
    }
}
add_action('lostpassword_form','redirect_lost_password_page');

// add_action('lostpassword_post', 'validate_reset', 99, 3);

// function validate_reset(){
//     if(isset($_POST['user_login']) && !empty($_POST['user_login'])){
// 			$email_address = $_POST['user_login'];
//         if(filter_var( $email_address, FILTER_VALIDATE_EMAIL )){
//             if(!email_exists( $email_address )){
//                 wp_redirect(home_url( '/lost-password' ));
//                 exit;
//             }
//         } else {
// 			$username = $_POST['user_login'];
// 			if ( !username_exists( $username ) ){
// 				wp_redirect(home_url( '/lost-password' ));
// 				exit;
// 			}
// 		} 
//     }else{
//         wp_redirect(home_url( 'login' ));
//         exit;   
//     }
// }

/*
 * Function for post duplication. Dups appear as drafts. User is redirected to the edit screen
 */
function rd_duplicate_post_as_draft(){
	global $wpdb;
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
		wp_die('No post to duplicate has been supplied!');
	}
 
	/*
	 * Nonce verification
	 */
	if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
		return;
 
	/*
	 * get the original post id
	 */
	$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
	/*
	 * and all the original post data then
	 */
	$post = get_post( $post_id );
 
	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;
 
	/*
	 * if post data exists, create the post duplicate
	 */
	if (isset( $post ) && $post != null) {
 
		/*
		 * new post data array
		 */
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);
 
		/*
		 * insert the post by wp_insert_post() function
		 */
		$new_post_id = wp_insert_post( $args );
 
		/*
		 * get all current post terms ad set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}
 
		/*
		 * duplicate all post meta just in two SQL queries
		 */
		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		if (count($post_meta_infos)!=0) {
			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			foreach ($post_meta_infos as $meta_info) {
				$meta_key = $meta_info->meta_key;
				if( $meta_key == '_wp_old_slug' ) continue;
				$meta_value = addslashes($meta_info->meta_value);
				$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
			}
			$sql_query.= implode(" UNION ALL ", $sql_query_sel);
			$wpdb->query($sql_query);
		}
 
 
		/*
		 * finally, redirect to the edit post screen for the new draft
		 */
		wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
		exit;
	} else {
		wp_die('Post creation failed, could not find original post: ' . $post_id);
	}
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
	if (current_user_can('edit_posts')) {
		$actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
	}
	return $actions;
}
 
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/********* Initialize update checker *******/
require 'inc/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/bmighty2/NP2-theme',
	__FILE__,
	'np2-theme'
);

//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->setAuthentication('18960f6fe790a1e9daec1bc585700b12799c5830');

//Optional: Set the branch that contains the stable release.
//$myUpdateChecker->setBranch('master');

//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
        return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
    }
add_filter('language_attributes', 'add_opengraph_doctype');
 
//Lets add Open Graph Meta Info
 
function insert_fb_in_head() {
    global $post;
    if ( !is_singular()) //if it is not a post or a page
        return;
        // echo '<meta property="fb:admins" content="YOUR USER ID"/>';
        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:description" content="'.wp_strip_all_tags( get_the_excerpt(), false ).'"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
        echo '<meta property="og:site_name" content="'. get_bloginfo( 'name').'"/>';
    if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
        $default_image=get_stylesheet_directory_uri() . '/screenshot.png';
        echo '<meta property="og:image" content="' . $default_image . '"/>';
    }
    else{
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full-post-thumbnail' );
        echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
    }
    echo "
";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );