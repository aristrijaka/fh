<?php
global $universo_option;
if ( !class_exists( 'ReduxFramework' ) && file_exists( get_template_directory() . '/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( get_template_directory() . '/ReduxFramework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( get_template_directory() . '/ReduxFramework/sample/sample-config.php' ) ) {
    require_once( get_template_directory() . '/ReduxFramework/sample/sample-config.php' );
}
//Custom fields:
require_once get_template_directory() . '/framework/bfi_thumb-master/BFI_Thumb.php';
require_once get_template_directory() . '/framework/meta-boxes.php';
require_once get_template_directory() . '/framework/widget/widget.php';
require_once get_template_directory() . '/shortcodes.php';
require_once get_template_directory() . '/framework/woocommerce.php';
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';

//Theme Set up:
function universo_theme_setup() {

   /*

     * Make theme available for translation.

     * Translations can be filed in the /languages/ directory.

     * If you're building a theme based on cubic, use a find and replace

     * to change 'cubic' to the name of your theme in all the template files

     */

    load_theme_textdomain( 'universo', get_template_directory() . '/languages' );

    /** Set Content width **/
    if ( ! isset( $content_width ) ) 
        $content_width = 900;
    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
	add_theme_support( 'custom-header' ); 
	add_theme_support( 'custom-background' );
	
    add_theme_support( 'post-thumbnails' );
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    // Switches default core markup for search form, comment form, and comments
    // to output valid HTML5.
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
    //Post formats
    add_theme_support( 'post-formats', array(
        'audio',  'gallery', 'image', 'video',
    ) );
	
    // This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
        'primary'   => __('Primary Menu', 'universo'),
        'top'       => __('Top Menu', 'universo'),
		'bottom'    => __('Footer Menu', 'universo'),
	) );
}
add_action( 'after_setup_theme', 'universo_theme_setup' );

function universo_load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/framework/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'universo_load_custom_wp_admin_style' );

/*Register Fonts*/
function universo_theme_fonts_url() {
    $fonts_url = '';
 
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'universo' );
    
    $mon = _x( 'on', 'Montserrat font: on or off', 'universo' );

    if ( 'off' !== $open_sans || 'off' !== $mon ) {
        $font_families = array();
 
        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800';
        }
        if ( 'off' !== $mon ) {
            $font_families[] = 'Montserrat:400,700';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );

}
/*
Enqueue scripts and styles.
*/
function universo_theme_scripts() {
    wp_enqueue_style( 'universo-fonts', universo_theme_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'universo_theme_scripts' );

function universo_theme_scripts_styles() {
	global $universo_option;
	$protocol = is_ssl() ? 'https' : 'http';

    /** All frontend css files **/ 
    wp_enqueue_style( 'universo-bootstrap', get_template_directory_uri().'/bootstrap/css/bootstrap.css');
	wp_enqueue_style( 'universo-selectize', get_template_directory_uri().'/css/selectize.css');
    wp_enqueue_style( 'universo-owl-car', get_template_directory_uri().'/css/owl.carousel.css');
    wp_enqueue_style( 'universo-woocommerce', get_template_directory_uri().'/css/woocommerce.css');
    wp_enqueue_style( 'universo-rev-settings', get_template_directory_uri().'/css/vanillabox/vanillabox.css');
	wp_enqueue_style( 'universo-font-awesome', get_template_directory_uri().'/css/font-awesome.css');
	wp_enqueue_style( 'universo-style', get_stylesheet_uri(), array(), '21-05-2015' );
	
    /** theme option for color **/
    wp_enqueue_style( 'universo-color', get_template_directory_uri() .'/framework/color.php');
		
    /** Js for comment on single post **/    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
    	wp_enqueue_script( 'comment-reply' );
	}

    /** All frontend js files **/		
    wp_enqueue_script("universo-maps-js", "$protocol://maps.googleapis.com/maps/api/js?v=3.exp&hl=en&sensor=true",array(),false,true);
	wp_enqueue_script("universo-bootstrap", get_template_directory_uri()."/bootstrap/js/bootstrap.min.js",array(),false,true);
	wp_enqueue_script("universo-fitvids", get_template_directory_uri()."/js/jquery.fitvids.js",array(),false,true);
    wp_enqueue_script("universo-migrate", get_template_directory_uri()."/js/jquery-migrate-1.2.1.min.js",array(),false,true);
	wp_enqueue_script("universo-equalHeights", get_template_directory_uri()."/js/jQuery.equalHeights.js",array(),false,true);
    wp_enqueue_script("universo-selectize", get_template_directory_uri()."/js/selectize.min.js",array(),false,true);
    wp_enqueue_script("universo-flexslider", get_template_directory_uri()."/js/jquery.flexslider-min.js",array(),false,true);
    if ( !is_home() && !is_single()) {
    wp_enqueue_script("universo-icheck", get_template_directory_uri()."/js/icheck.min.js",array(),false,true);
    wp_enqueue_script("universo-placeholder", get_template_directory_uri()."/js/jquery.placeholder.js",array(),false,true);
	wp_enqueue_script("universo-tablesort", get_template_directory_uri()."/js/jquery.tablesorter.min.js",array(),false,true);
    }
    wp_enqueue_script("universo-vanillabox", get_template_directory_uri()."/js/jquery.vanillabox-0.1.5.min.js",array(),false,true);
    wp_enqueue_script("universo-owl", get_template_directory_uri()."/js/owl.carousel.min.js",array(),false,true);
	wp_enqueue_script("universo-retina", get_template_directory_uri()."/js/retina-1.1.0.min.js",array(),false,true);		
	wp_enqueue_script("universo-custom", get_template_directory_uri()."/js/custom.js",array(),false,true);		
	
}
add_action( 'wp_enqueue_scripts', 'universo_theme_scripts_styles');

if(!function_exists('universo_custom_frontend_style')){
	function universo_custom_frontend_style(){
	global $universo_option;
	echo '<style type="text/css">'.$universo_option['custom-css'].'</style>';
}
}
add_action('wp_head', 'universo_custom_frontend_style');

// Widget Sidebar
function universo_widgets_init() {
	register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'universo' ),
        'id'            => 'sidebar-1',        
		'description'   => __( 'Appears in the sidebar section of the site.', 'universo' ),        
		'before_widget' => '<div id="%1$s" class="widget %2$s">',        
		'after_widget'  => '</div>',        
		'before_title'  => '<h2>',        
		'after_title'   => '</h2>'
    ) );
    register_sidebar( array(
        'name'          => __( 'Shop Sidebar', 'universo' ),
        'id'            => 'shop-sidebar',        
        'description'   => __( 'Appears in the sidebar shop of the site.', 'universo' ),        
        'before_widget' => '<div id="%1$s" class="widget %2$s">',        
        'after_widget'  => '</div>',        
        'before_title'  => '<h2>',        
        'after_title'   => '</h2>'
    ) );
    register_sidebar( array(
        'name'          => __( 'Events Sidebar', 'universo' ),
        'id'            => 'sidebar-event',        
        'description'   => __( 'Appears in the sidebar event of the site.', 'universo' ),        
        'before_widget' => '<div id="%1$s" class="widget %2$s">',        
        'after_widget'  => '</div>',        
        'before_title'  => '<h2>',        
        'after_title'   => '</h2>'
    ) );
    register_sidebar( array(
        'name'          => __( 'Courses Sidebar', 'universo' ),
        'id'            => 'sidebar-course',        
        'description'   => __( 'Appears in the sidebar course of the site.', 'universo' ),        
        'before_widget' => '<div id="%1$s" class="widget %2$s">',        
        'after_widget'  => '</div>',        
        'before_title'  => '<h2>',        
        'after_title'   => '</h2>'
    ) );
    register_sidebar( array(
        'name'          => __( 'Newsletter', 'universo' ),
        'id'            => 'sidebar-news',        
        'description'   => __( 'Appears in the sidebar event of the site.', 'universo' ),        
        'before_widget' => '<div id="%1$s" class="widget %2$s">',        
        'after_widget'  => '</div>',        
        'before_title'  => '<h2>',        
        'after_title'   => '</h2>'
    ) );
    register_sidebar( array(
        'name'          => __( 'Twitter Feed', 'universo' ),
        'id'            => 'twitter-feed',        
        'description'   => __( 'Appears in the sidebar event of the site.', 'universo' ),        
        'before_widget' => '<div id="%1$s" class="widget %2$s">',        
        'after_widget'  => '</div>',        
        'before_title'  => '<h2>',        
        'after_title'   => '</h2>'
    ) );
    register_sidebar( array(
		'name'          => __( 'Footer One Widget Area', 'universo' ),
		'id'            => 'footer-area-1',
		'description'   => __( 'Footer Widget that appears on the Footer.', 'universo' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Two Widget Area', 'universo' ),
		'id'            => 'footer-area-2',
		'description'   => __( 'Footer Widget that appears on the Footer.', 'universo' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Three Widget Area', 'universo' ),
		'id'            => 'footer-area-3',
		'description'   => __( 'Footer Widget that appears on the Footer.', 'universo' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Fourth Widget Area', 'universo' ),
		'id'            => 'footer-area-4',
		'description'   => __( 'Footer Widget that appears on the Footer.', 'universo' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );    
 
}
add_action( 'widgets_init', 'universo_widgets_init' );

function universo_breadcrumbs() {
    $text['home']     = __('Home', 'universo'); // text for the 'Home' link
    $text['category'] = '%s'; // text for a category page
    $text['tax']      = '%s'; // text for a taxonomy page
    $text['search']   = '%s'; // text for a search results page
    $text['tag']      = '%s'; // text for a tag page
    $text['author']   = '%s'; // text for an author page
    $text['404']      = '404'; // text for the 404 page
 
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter   = ''; // delimiter between crumbs
    $before      = '<li class="active">'; // tag before the current crumb
    $after       = '</li>'; // tag after the current crumb
    
 
    global $post;
    $homeLink = home_url('/') . '';
    $linkBefore = '<li>';
    $linkAfter = '</li>';
    $linkAttr = ' rel="v:url" property="v:title"';
    $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
 
    if (is_home() || is_front_page()) {
 
        if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . esc_url($homeLink) . '">' . $text['home'] . '</a></div>';
 
    } else {
 
        echo '<ol class="breadcrumb">' . sprintf($link, esc_url($homeLink), $text['home']) . $delimiter;
 
        
        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo htmlspecialchars_decode( $cats );
            }
            echo htmlspecialchars_decode( $before ) . sprintf($text['category'], single_cat_title('', false)) . htmlspecialchars_decode( $after );
 
        } elseif( is_tax() ){
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo htmlspecialchars_decode( $cats );
            }
            echo htmlspecialchars_decode( $before ) . sprintf($text['tax'], single_cat_title('', false)) . htmlspecialchars_decode( $after );
        
        }elseif ( is_search() ) {
            echo htmlspecialchars_decode( $before ) . sprintf($text['search'], get_search_query()) . htmlspecialchars_decode( $after );
 
        } elseif ( is_day() ) {
            echo sprintf($link, esc_url(get_year_link(get_the_time('Y'))), get_the_time('Y')) . $delimiter;
            echo sprintf($link, esc_url(get_month_link(get_the_time('Y'),get_the_time('m'))), get_the_time('F')) . $delimiter;
            echo htmlspecialchars_decode( $before ) . get_the_time('d') . htmlspecialchars_decode( $after );
 
        } elseif ( is_month() ) {
            echo sprintf($link, esc_url(get_year_link(get_the_time('Y'))), get_the_time('Y')) . $delimiter;
            echo htmlspecialchars_decode( $before ) . get_the_time('F') . htmlspecialchars_decode( $after );
 
        } elseif ( is_year() ) {
            echo htmlspecialchars_decode( $before ) . get_the_time('Y') . htmlspecialchars_decode( $after );
 
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                if ( get_post_type() == 'portfolio' ) {
                 printf(''); //Translate breadcrumb.
             }else{
              printf($link, esc_url($homeLink) . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
             }
                if ($showCurrent == 1) echo htmlspecialchars_decode( $delimiter ) . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo htmlspecialchars_decode( $cats );
                if ($showCurrent == 1) echo htmlspecialchars_decode( $before ) . get_the_title() . $after;
            }
 
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo htmlspecialchars_decode( $before ) . $post_type->labels->singular_name . htmlspecialchars_decode( $after );
 
        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
            $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
            echo htmlspecialchars_decode( $cats );
            printf($link, esc_url(get_permalink($parent)), $parent->post_title);
            if ($showCurrent == 1) echo htmlspecialchars_decode( $delimiter ) . $before . get_the_title() . $after;
 
        } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo htmlspecialchars_decode( $before ) . get_the_title() . $after;
 
        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = sprintf($link, esc_url(get_permalink($page->ID)), get_the_title($page->ID));
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo htmlspecialchars_decode( $breadcrumbs[$i] );
                if ($i != count($breadcrumbs)-1) echo htmlspecialchars_decode( $delimiter );
            }
            if ($showCurrent == 1) echo htmlspecialchars_decode( $delimiter ) . $before . get_the_title() . $after;
 
        } elseif ( is_tag() ) {
            echo htmlspecialchars_decode( $before ) . sprintf($text['tag'], single_tag_title('', false)) . $after;
 
        } elseif ( is_author() ) {
             global $author;
            $userdata = get_userdata($author);
            echo htmlspecialchars_decode( $before ) . sprintf($text['author'], $userdata->display_name) . $after;
 
        } elseif ( is_404() ) {
            echo htmlspecialchars_decode( $before ) . $text['404'] . $after;
        }
 
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() );
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() );
        }
 
        echo '</ol>';
 
    }
}

//Get search events
function universo_template_chooser_event($template)   
{    
  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if( $wp_query->is_search && $post_type == 'event' )   
  {
    return locate_template('events-search.php');  //  redirect to archive-search.php
  }   
  return $template;   
}
add_filter('template_include', 'universo_template_chooser_event');

//Get search courses
function universo_template_chooser_course($template)   
{    
  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if( $wp_query->is_search && $post_type == 'courses' )   
  {
    return locate_template('courses-search.php');  //  redirect to archive-search.php
  }   
  return $template;   
}
add_filter('template_include', 'universo_template_chooser_course');

//Create a nicely formatted and more specific title element text for output
function universo_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}
	
	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'universo' ), max( $paged, $page ) );
	}
	
	return $title;
}
add_filter( 'wp_title', 'universo_wp_title', 10, 2 );

/**custom function tag widgets**/
function universo_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 18; //largest tag
	$args['smallest'] = 11; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
	$args['exclude'] = array(20, 80, 92); //exclude tags by ID
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'universo_tag_cloud_widget' );

/** Custom theme option post excerpt **/
function universo_excerpt() {
  global $universo_option;
  if(isset($universo_option['blog_excerpt'])){
    $limit = $universo_option['blog_excerpt'];
  }else{
    $limit = 15;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

/** Excerpt Section Blog Post **/
function universo_blog_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

//pagination
function universo_pagination($prev = '<i class="fa fa-angle-double-left"></i>', $next = '<i class="fa fa-angle-double-right"></i>', $pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
		'base' 			=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
		'format' 		=> '',
		'current' 		=> max( 1, get_query_var('paged') ),
		'total' 		=> $pages,
		'prev_text'     => $prev,
        'next_text'     => $next,		
        'type'			=> 'list',
		'end_size'		=> 3,
		'mid_size'		=> 3
    );
    $return =  paginate_links( $pagination );
	echo str_replace( "<ul class='page-numbers'>", '', $return );
}

/* Custom form search */
function universo_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="search-form" action="' . home_url( '/' ) . '" >  
    	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.__('Type to search and hit enter', 'universo').'" />
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'universo_search_form' );

/* Custom comment List: */
function universo_theme_comment($comment, $args, $depth) {    
   $GLOBALS['comment'] = $comment; ?>
   <li class="author-block">
   		<figure class="author-picture">
		<?php echo get_avatar($comment,$size='80',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=70' ); ?>
		</figure>
        <article class="paragraph-wrapper">
            <div class="inner">
                <header><h5><?php printf(__('%s','universo'), get_comment_author()) ?></h5></header>
                
                <?php if ($comment->comment_approved == '0'){ ?>
                     <p><em><?php _e('Your comment is awaiting moderation.','universo') ?></em></p>
                <?php }else{ ?>
                    <?php comment_text() ?>
                <?php } ?>
                
            </div>
            <div class="comment-controls">
                <span><?php the_time('d-m-y'); ?></span>
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
        </article>
	   <div class="clearfix"></div>	
	</li> 
<?php
}

//Code Visual Compurso.
require_once get_template_directory() . '/vc_shortcode.php';
//if(class_exists('WPBakeryVisualComposerSetup')){
function universo_custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
    if($tag=='vc_row' || $tag=='vc_row_inner') {
        $class_string = str_replace('vc_row-fluid', '', $class_string);
    }
    if($tag=='vc_column' || $tag=='vc_column_inner') {
        $class_string = preg_replace('/vc_col-xs-(\d{1,2})/', 'col-xs-$1', $class_string);
        $class_string = preg_replace('/vc_col-sm-(\d{1,2})/', 'col-md-$1', $class_string);
        $class_string = preg_replace('/vc_col-md-(\d{1,2})/', 'col-sm-$1', $class_string);
        $class_string = preg_replace('/vc_col-lg-(\d{1,2})/', 'col-lg-$1', $class_string);
    }
    return $class_string;
}
// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'universo_custom_css_classes_for_vc_row_and_vc_column', 10, 2); 
// Add new Param in Row
if(function_exists('vc_add_param')){

vc_add_param('vc_row',array(
                              "type" => "dropdown",
                              "heading" => __('Fullwidth', 'wpb'),
                              "param_name" => "fullwidth",
                              "value" => array(   
                                                __('No', 'wpb') => 'no',  
                                                __('Yes', 'wpb') => 'yes',                                                                                
                                              ),
                              "description" => __("Select Fullwidth or not, Default: No fullwidth", "wpb"),      
                            ) 
    );
	
// Add new Param in Column	

vc_add_param('vc_column',array(
                              "type" => "textfield",
                              "heading" => __('Container Class', 'wpb'),
                              "param_name" => "wap_class",
                              "value" => "",
                              "description" => __("Container Class", "wpb"),      
                            ) 
    );
	
vc_remove_param( "vc_row", "parallax" );
vc_remove_param( "vc_row", "parallax_image" );
vc_remove_param( "vc_row", "full_width" );
vc_remove_param( "vc_row", "full_height" );
vc_remove_param( "vc_row", "video_bg" );
vc_remove_param( "vc_row", "video_bg_parallax" );
vc_remove_param( "vc_row", "content_placement" );
vc_remove_param( "vc_row", "video_bg_url" );
vc_remove_param( "vc_row", "columns_placement" );
vc_remove_param( "vc_row", "gap" );
vc_remove_param( "vc_row", "equal_height" );
vc_remove_element( "vc_basic_grid" );
vc_remove_element( "vc_masonry_grid" );
vc_remove_element( "vc_media_grid" );
vc_remove_element( "vc_post_grid" );
vc_remove_element( "vc_masonry_media_grid" );
}
//}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.0-alpha
 * @author     Thomas Griffin
 * @author     Gary Jones
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'universo_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function universo_theme_register_required_plugins() {

    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // Plugin Download the http://wordpress.org
        array(
            'name'               => 'Meta Box',
            'slug'               => 'meta-box',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(            
            'name'               => 'WPBakery Visual Composer', // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/js_composer.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),

        // This is an example of how to include a plugin from a private repo in your theme.
                        
        array(            
            'name'               => 'The Events Calendar', // The plugin name.
            'slug'               => 'the-events-calendar', // The plugin slug (typically the folder name).
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(            
            'name'               => 'Courses In Shop (WooCommerce)', // The plugin name.
            'slug'               => 'woocommerce', // The plugin slug (typically the folder name).
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(            
            'name'               => 'OT Courses', // The plugin name.
            'slug'               => 'ot_courses', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/ot_courses.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name'               => 'OT Testimonial', // The plugin name.
            'slug'               => 'ot_testimonial', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/ot_testimonial.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ), 
        array(
            'name'               => 'OT Professors', // The plugin name.
            'slug'               => 'ot_team', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/ot_team.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name'                     => 'Contact Form 7', // The plugin name
            'slug'                     => 'contact-form-7', // The plugin slug (typically the folder name)
            'required'                 => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                     => 'Newsletter', // The plugin name
            'slug'                     => 'newsletter', // The plugin slug (typically the folder name)
            'required'                 => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                     => 'FaceBook Feed', // The plugin name
            'slug'                     => 'facebook-feed', // The plugin slug (typically the folder name)
            'required'                 => false, // If false, the plugin is only 'recommended' instead of required
        ), 
        array(
            'name'                     => 'Twitter Feed', // The plugin name
            'slug'                     => 'kebo-twitter-feed', // The plugin slug (typically the folder name)
            'required'                 => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                     => 'Featured Post', // The plugin name
            'slug'                     => 'featured-post', // The plugin slug (typically the folder name)
            'required'                 => false, // If false, the plugin is only 'recommended' instead of required
        ),
    );

    /*
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are wrapped in a sprintf(), so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'universo' ),
            'menu_title'                      => __( 'Install Plugins', 'universo' ),
            'installing'                      => __( 'Installing Plugin: %s', 'universo' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'universo' ),
            'notice_can_install_required'     => _n_noop(
                'This theme requires the following plugin: %1$s.',
                'This theme requires the following plugins: %1$s.',
                'universo'
            ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop(
                'This theme recommends the following plugin: %1$s.',
                'This theme recommends the following plugins: %1$s.',
                'universo'
            ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop(
                'Sorry, but you do not have the correct permissions to install the %s plugin.',
                'Sorry, but you do not have the correct permissions to install the %s plugins.',
                'universo'
            ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop(
                'The following required plugin is currently inactive: %1$s.',
                'The following required plugins are currently inactive: %1$s.',
                'universo'
            ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop(
                'The following recommended plugin is currently inactive: %1$s.',
                'The following recommended plugins are currently inactive: %1$s.',
                'universo'
            ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop(
                'Sorry, but you do not have the correct permissions to activate the %s plugin.',
                'Sorry, but you do not have the correct permissions to activate the %s plugins.',
                'universo'
            ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop(
                'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                'universo'
            ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop(
                'Sorry, but you do not have the correct permissions to update the %s plugin.',
                'Sorry, but you do not have the correct permissions to update the %s plugins.',
                'universo'
            ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop(
                'Begin installing plugin',
                'Begin installing plugins',
                'universo'
            ),
            'activate_link'                   => _n_noop(
                'Begin activating plugin',
                'Begin activating plugins',
                'universo'
            ),
            'return'                          => __( 'Return to Required Plugins Installer', 'universo' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'universo' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'universo' ), // %s = dashboard link.
            'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tgmpa' ),

            'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}
?>