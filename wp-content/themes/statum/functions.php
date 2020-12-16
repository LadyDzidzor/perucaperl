<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'STATUM_PARENT_DIR', get_template_directory() );
define( 'STATUM_CHILD_DIR', get_stylesheet_directory() );
define( 'STATUM_INCLUDES_DIR', STATUM_PARENT_DIR . '/framework' );
define( 'STATUM_CSS_DIR', STATUM_PARENT_DIR . '/css' );
define( 'STATUM_JS_DIR', STATUM_PARENT_DIR . '/js' );
define( 'STATUM_LANGUAGES_DIR', STATUM_PARENT_DIR . '/languages' );
define( 'STATUM_WIDGETS_DIR', STATUM_INCLUDES_DIR . '/widgets' );
define( 'STATUM_ELEMENTOR_DIR', STATUM_INCLUDES_DIR . '/elementor' );
define( 'STATUM_ELEMENTOR_WIDGETS_DIR', STATUM_ELEMENTOR_DIR . '/widgets' );

/**
 * Define URL Location Constants
 */
define( 'STATUM_PARENT_URL', get_template_directory_uri() );
define( 'STATUM_CHILD_URL', get_stylesheet_directory_uri() );
define( 'STATUM_INCLUDES_URL', STATUM_PARENT_URL . '/framework' );
define( 'STATUM_CSS_URL', STATUM_PARENT_URL . '/css' );
define( 'STATUM_JS_URL', STATUM_PARENT_URL . '/js' );
define( 'STATUM_LANGUAGES_URL', STATUM_PARENT_URL . '/languages' );
define( 'STATUM_WIDGETS_URL', STATUM_INCLUDES_URL . '/widgets' );
define( 'STATUM_ELEMENTOR_URL', STATUM_INCLUDES_URL . '/elementor' );
define( 'STATUM_ELEMENTOR_WIDGETS_URL', STATUM_ELEMENTOR_URL . '/widgets' );

/** Add the Elementor compatibility file */
if ( defined( 'ELEMENTOR_VERSION' ) ) {
  require_once( STATUM_ELEMENTOR_DIR . '/elementor.php' );
}

if(class_exists( 'Menu_Item_Custom_Fields' )){
  require_once STATUM_INCLUDES_DIR  . '/menu-item-custom-fields.php';
}

require_once STATUM_INCLUDES_DIR . '/meta-box.php';
require_once STATUM_INCLUDES_DIR . '/statum_bootstrap_navwalker.php';
require_once STATUM_INCLUDES_DIR . '/import.php';
require_once STATUM_INCLUDES_DIR . '/customize.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
  $content_width = 900;
}

// Set up theme support
function statum_setup() {

  add_theme_support( 'post-thumbnails' );
  add_image_size( 'statum-thumb', 740, 620, true );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'custom-header');
  add_theme_support( 'custom-background');
  add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
  add_theme_support( 'custom-logo' );
  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus( array(
    'primary'    => esc_html__( 'Primary Menu', 'statum' ),
  ) );
  add_theme_support( 'editor-styles' );
  add_editor_style( 'css/style-editor.css' );
  load_theme_textdomain( 'statum', get_template_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'statum_setup' );

// Theme Scripts & Styles
function statum_scripts_styles() {

  wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
  wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.min.css');
  wp_enqueue_style( 'line-awesome', get_template_directory_uri().'/css/line-awesome.min.css');
  wp_enqueue_style( 'magnific-popup', get_template_directory_uri().'/css/magnific-popup.css');
  wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/css/owl.carousel.css');
  wp_enqueue_style( 'owl-theme', get_template_directory_uri().'/css/owl.theme.css');
  wp_enqueue_style( 'jquery-ui', get_template_directory_uri().'/css/jquery-ui.min.css');
  wp_enqueue_style( 'flexslider', get_template_directory_uri().'/css/flexslider.css');
	wp_enqueue_style( 'statum-default', get_template_directory_uri().'/css/style.css');
  wp_enqueue_style( 'statum', get_stylesheet_uri() );
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

    // enqueue the javascript that performs in-link comment reply fanciness
    wp_enqueue_script( 'comment-reply' ); 

  }
  wp_enqueue_script('jquery-ui-core');
 	wp_enqueue_script('masonry');
  wp_enqueue_script('magnific-popup', get_template_directory_uri().'/js/jquery.magnific-popup.min.js',array('jquery'),false,true);
  wp_enqueue_script('isotope', get_template_directory_uri().'/js/jquery.isotope.min.js',array('jquery'),false,true);
  wp_enqueue_script('flexslider', get_template_directory_uri().'/js/jquery.flexslider.js',array('jquery'),false,true);
  wp_enqueue_script('owl-carousel', get_template_directory_uri().'/js/owl.carousel.min.js',array('jquery'),false,true);
  wp_enqueue_script('appear', get_template_directory_uri().'/js/jquery.appear.js',array('jquery'),false,true);
  wp_enqueue_script('countto', get_template_directory_uri().'/js/jquery.countTo.js',array('jquery'),false,true);
  wp_enqueue_script('popper', get_template_directory_uri().'/js/popper.js',array('jquery'),false,true);
  wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),false,true);
  $key = get_theme_mod('map_api');
  if(isset($key) and $key !=''){
    wp_enqueue_script("statum-googleapis", "//maps.googleapis.com/maps/api/js?key=".get_theme_mod('map_api'),array('jquery'),false,true);
    wp_enqueue_script( 'statum-gmap3', get_template_directory_uri().'/js/gmap3.min.js', array( 'jquery' ), '1.0', true );
  }
  
  if ( defined( 'ELEMENTOR_VERSION' ) ) {

    wp_enqueue_script( 'statum-elementor', get_template_directory_uri().'/js/elementor-frontend.js', array( 'jquery' ), '1.0', true );

  }
  wp_enqueue_script('statum-script', get_template_directory_uri().'/js/script.js',array('jquery'),false,true);

}
add_action( 'wp_enqueue_scripts', 'statum_scripts_styles' );

add_action( 'wp_enqueue_scripts', 'statum_add_frontend_ajax_javascript_file' );
function statum_add_frontend_ajax_javascript_file()
{
  wp_enqueue_script( 'statum_ajax_custom_script',  get_template_directory_uri().'/js/ajax-javascript.js', array('jquery') );
  wp_localize_script( 'statum_ajax_custom_script', 'ajaxurl', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

}

function statum_load_custom_wp_admin_style() {

  wp_register_style( 'line-awesome', get_template_directory_uri().'/css/line-awesome.min.css', false, '1.0.0' );
  wp_enqueue_style( 'line-awesome' );

}
add_action( 'admin_enqueue_scripts', 'statum_load_custom_wp_admin_style' );

/* Function which displays your post date in time ago format */
function statum_time_ago() {

  return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.esc_html__( 'ago','statum' );

}

/**WOOCOMMERCE**/
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'statum_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'statum_wrapper_end', 10);

add_filter('loop_shop_columns', 'statum_loop_columns', 999);
if (!function_exists('statum_loop_columns')) {
  function statum_loop_columns() {
    return 3; // 3 products per row
  }
}
add_filter('woocommerce_show_page_title', 'statum_show_page_title', 999);
if (!function_exists('statum_show_page_title')) {
  function statum_show_page_title() {
    return false; // 3 products per row
  }
}

add_filter( 'woocommerce_output_related_products_args', 'statum_change_number_related_products' );

function statum_change_number_related_products( $args ) {
 
 $args['posts_per_page'] = 3;
 $args['columns'] = 3; //change number of upsells here
 return $args;
}

// Register Elementor Locations
function statum_register_elementor_locations( $elementor_theme_manager ) {

	$elementor_theme_manager->register_all_core_location();

};
add_action( 'elementor/theme/register_locations', 'statum_register_elementor_locations' );

function statum_excerpt($limit = 30) {
 
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

function statum_elementor_categories() {

    $output     = array();
    $categories = get_categories();
    $output[  ] = 'Select';
    foreach ( $categories as $category ) {
        $output[ $category->term_id ] = $category->name;
    }

    return $output;
}


/**
 * Display custom color CSS.
 */
function statum_colors_css_wrap() {
    global  $wp_query;
    $main_color = get_theme_mod( 'main_color','#4885ff'); 
    $header_img = get_header_image();
    $logo_dimensions = get_theme_mod('logo_dimensions');
?>
    <style type="text/css" id="custom-theme-colors">
        <?php 
            $css="
              .dropdown > li > a:hover, .title-section span,a.text-btn, .page-list ul li a:hover, section.services-section .services-box .services-post .services-content span, section.services-section2 .services-box .services-post a,section.what-we-do .article-box span,section.what-we-do .article-box a, section.collapse-section .card-header h2 button:before, section.career-section .career-box .career-post i,section.pricing-section .pricing-box .pricing-table.standard h1,section.portfolio-section ul.filter li a:hover,
      section.portfolio-section ul.filter li a.active,section.video-section .video-box a.video-link i,section.video-section .video-box a.video-link:hover,section.video-section2 a i,section.feature-section .feature-post a,section.feature-section.second-style  .feature-post a,section.news-section .news-box .news-post p.auth-paragraph a:hover,section.news-section .news-box .news-post h2 a:hover,section.news-section .news-box .news-post > a,section.blog-section .blog-box .blog-post p.auth-paragraph a:hover,section.blog-section .blog-box .blog-post h2 a:hover,section.blog-section .blog-box .blog-post > a,.pagination-list-box a.prev:hover,footer .up-footer .footer-widget ul.social-list li a:hover,
          footer .up-footer .footer-widget ul.quick-list li a:hover,footer .up-footer .footer-widget ul.recent-posts li h2 a:hover,
  .pagination-list-box a.next:hover,.sidebar .category-widget ul li a:hover,.sidebar .popular-widget ul.popular-list li .side-content h2 a:hover,section.about-section .about-box .article-box span,section.about-section .about-box .article-box a,section.about-section2 .about-box .article-box span,section.about-section2 .about-box .article-box a,section.about-section2 .video-box .hover-video a i,.statistic-post i,section.mision-section .mision-post span,section.mision-section3 .mision-box .mision-post span,.single-post p.auth-paragraph a:hover,.single-post__list-item a:hover,.single-post__quote:before,.other-posts__prev:hover i, .other-posts__next:hover i,.comment-area-box > ul li .comment-box .comment-content a:hover,.comment-area-box > ul li .comment-box .comment-content h4 a,section.single-project-section .single-content .project-content ul.social-icons li a:hover,section.similar-projects-section .similar-projects-box .project-post .project-content h2 a:hover,section.contact-section .contact-info .info-post span,section.services-section.grey-background .services-box .services-post .services-content a,.widget_recent_entries ul li a:hover, .widget_recent_comments ul li a:hover, .widget_archive ul li a:hover, .widget_categories ul li a:hover, .widget_meta ul li a:hover, .widget_pages ul li a:hover, .widget_rss ul li a:hover, .widget_nav_menu ul li a:hover, .product-categories li a:hover, .widget_featured_posts ul li a:hover,.single-content blockquote:before,.pagination-list li .current, .pagination-list li a:hover,.dropdown > li.current-menu-item > a,.image-block .services-content span{
                color: $main_color;
              }
              .navbar-nav > li > a:hover,
  .navbar-nav > li > a.active {
    color: $main_color !important; }
              section.contact-section #contact-form input[type='submit'],section.contact-section .contact-info .info-post span:hover,section.contact-section .contact-info .info-post span:hover:after,.contact-form__submit,.contact-form__submit:hover,a.button-one, .ban-line-section,section.testimonial-section2 .testimonial-box .testimonial-post span.quote, section.testimonial-section2 .testimonial-box .owl-buttons div:hover, section.services-section.grey-background .strategy-post a i,section.services-section2 .services-box .services-post a:hover,section.services-section2 .services-box .services-post a:hover:after,section.pricing-section .pricing-box .pricing-table.advance,section.feature-section .feature-post a:hover, section.feature-section .feature-post a:hover:after,section.feature-section.second-style  .feature-post a:hover,section.feature-section.second-style  .feature-post a:hover:after,section.feature-section2 .feature-box,section.feature-section2 .feature-box .feature-post span:hover, section.news-section.second-style .news-box .owl-buttons div:hover,.pagination-list-box ul.pages-list li a:hover,section.contact-section #contact-form input[type='submit']:hover,
      .pagination-list-box ul.pages-list li a.active,section.subscribe-section form button,table td#today,input[type='submit']{
                background: $main_color;
              }
              .dropdown{
                border-top-color: $main_color;
              }
              a.text-btn:hover, .page-list ul li a:hover,section.portfolio-section ul.filter li a:hover,
      section.portfolio-section ul.filter li a.active{
                border-bottom-color: $main_color;
              }
              input[type='text']:focus, input[type='email']:focus,input[type='password']:focus,input[type='search']:focus,input[type='number']:focus,input[type='url']:focus, textarea:focus,section.services-section2 .services-box .services-post a:after,section.pricing-section .pricing-box .pricing-table.standard,section.pricing-section .pricing-box .pricing-table.advance,section.feature-section.second-style  .feature-post a:after,section.subscribe-section form button,.contact-form__input-text:hover, .contact-form__textarea:hover,section.contact-section .contact-info .info-post span:after,section.contact-section #contact-form input[type='text']:focus,
    section.contact-section #contact-form textarea:focus{
                border-color: $main_color;
              }
            ";

            $id= $wp_query->get_queried_object_id();
            $bg = get_post_meta($wp_query->get_queried_object_id(), "_statum_banner", true);
            if($bg!=''){
                $css .= ".page-id-$id section.page-banner-section{
                    background: url($bg) !important;
                }";
            }
            if($header_img!=''){
              $css .= "section.page-banner-section{
                    background-image: url($header_img) !important;
                }";
            }

            if($logo_dimensions){
              $css .="
                .navbar-brand img{
                  max-width: ".$logo_dimensions['max-width'].";
                }
              ";
            }
            echo do_shortcode($css);
        ?>
    </style>
<?php }
add_action( 'wp_head', 'statum_colors_css_wrap' );


//pagination
function statum_pagination($prev = '', $next = '', $pages='') {

  global $wp_query, $wp_rewrite;
  $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
  if($pages==''){
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages){
      $pages = 1;
    }
    }if(is_front_page() and !is_home()) {
    $curent = (get_query_var('page')) ? get_query_var('page') : 1;
  } else {
    $curent = (get_query_var('paged')) ? get_query_var('paged') : 1;
  }
    $pagination = array(
      'base'      => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
      'format'    => '',
      'current'     => max( 1, $curent),
      'total'     => $pages,
      'prev_text' => $prev,
      'next_text' => $next,
      'type'      => 'list',
      'end_size'    => 2,
      'mid_size'    => 1
  );
    $return =  paginate_links( $pagination );
  echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination-list">', $return );
  
}


add_filter('wp_list_categories', 'statum_span_cat_count');
function statum_span_cat_count($links) {

  $links = str_replace('</a> (', '</a> <span>(', $links);
  $links = str_replace(')', ')</span>', $links);
  return $links;

}


function statum_load_portfolio_grid(){
  global $statum_options;
  $response = '';
  $cat = $_POST['cat'];
  $order = $_POST['order'];
  $page = $_POST['page'];
  $thumb = $_POST['thumb'];

  if(isset($cat) and $cat!='all'){
    $args = array('post_type' => 'portfolio','post_status' => 'publish', 'posts_per_page' => $order, 'paged'=>$page, 'tax_query' => array(
    array(
      'taxonomy' => 'portfolio_category',
      'field'    => 'slug',
      'terms'    => $cat,
    ),
  ));
  }else{
    $args = array('post_type' => 'portfolio', 'post_status' => 'publish', 'posts_per_page' => $order, 'paged'=>$page);
  }

  $portfolio = new WP_Query($args);
?>  

<?php 
      if($portfolio->have_posts()) :
             $i=1; while($portfolio->have_posts()) : $portfolio->the_post(); 
    ?>
  
    <?php
      $item_classes = '';
      $item_skill = '';
      $item_cats = get_the_terms(get_the_ID(), 'portfolio_tag');
      $i=1; foreach((array)$item_cats as $item_cat){
          if(count($item_cat)>0){
              $item_classes .= $item_cat->slug . ' ';
              
          }

          if($i==1){
              $item_skill .= $item_cat->name;
          }else{
              $item_skill .= ' / '. $item_cat->name;
          }
          $custom_class = get_post_meta(get_the_ID(), '_statum_project_class', true);
            if($custom_class!=''){
              $item_classes .= ' '.$custom_class;
          }
      $i++; }
    ?>
    <div class="item project-post <?php echo esc_attr($item_classes); ?>">
          
      <?php if(has_post_thumbnail()){ ?>
        <div class="project-gal">
          <?php the_post_thumbnail($thumb); ?>
        </div>
      <?php } ?>
      
      <div class="hover-box">
        <a class="zoom" href="<?php echo get_the_post_thumbnail_url(); ?>"><i class="la la-arrows"></i></a>
        <h2 class="heading2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <ul class="project-tags">
          <li><?php echo esc_html($item_skill);?></li>
          
        </ul>
      </div>
      
    </div>

  <?php $i++; endwhile; ?>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>

<?php 
  echo do_shortcode($response);
  die();
}
add_action('wp_ajax_statum_load_portfolio_grid', 'statum_load_portfolio_grid');
add_action('wp_ajax_nopriv_statum_load_portfolio_grid', 'statum_load_portfolio_grid');



/* Header */
function statum_header() {

    global $wp_query;
    $header_layout = get_post_meta($wp_query->get_queried_object_id(), '_statum_header_layout', true);
    if($header_layout!='' and $header_layout!='1'){
        $header_layout = $header_layout;
    }else{ 
    $header_layout = get_theme_mod( 'header_layout', '1' );
    }

    if($header_layout!='' and $header_layout!='1'){
      $header_layout = $header_layout;
    }else{
      
        $header_layout = '1';
      
    }
   
   get_template_part('template-parts/header', $header_layout);
}

function statum_footer() {

    global $wp_query;
    $footer_layout = get_post_meta($wp_query->get_queried_object_id(), '_statum_footer_layout', true);
    if($footer_layout!='' and $footer_layout!='1'){
        $footer_layout = $footer_layout;
    }else{ 
      $footer_layout = get_theme_mod( 'footer_layout', '1' );
    }

    if($footer_layout!='' and $footer_layout!='1'){
      $footer_layout = $footer_layout;
    }else{
      
        $footer_layout = '1';
      
    }
    
   get_template_part('template-parts/footer', $footer_layout);

}

/*
Register Fonts
*/
function statum_fonts_url() {

  $font_url = '';
  
  /*
  Translators: If there are characters in your language that are not supported
  by chosen font(s), translate this to 'off'. Do not translate into your own language.
   */
  if ( 'off' !== _x( 'on', 'Google font: on or off', 'statum' ) ) {
    $font_url = add_query_arg( 'family', urlencode( 'Hind:300,400,500,600,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,800,900' ), "//fonts.googleapis.com/css" );
  }
  return $font_url;
}


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function statum_widgets_init() {

  register_sidebar( array(
    'name'          => esc_html__( 'Blog sidebar', 'statum' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here to appear in your blog sidebar.', 'statum' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="heading2 title-sidebar">',
    'after_title'   => '</h2>',
  ) );
  
  register_sidebar( array(
    'name'          => esc_html__( 'Footer 1', 'statum' ),
    'id'            => 'footer-1',
    'description'   => esc_html__( 'Add widgets here to appear in your Footer 1.', 'statum' ),
    'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="heading2 title-sidebar">',
    'after_title'   => '</h2>',
  ) );
  
  register_sidebar( array(
    'name'          => esc_html__( 'Footer 2', 'statum' ),
    'id'            => 'footer-2',
    'description'   => esc_html__( 'Add widgets here to appear in your Footer 2.', 'statum' ),
    'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="heading2 title-sidebar">',
    'after_title'   => '</h2>',
  ) );
  
  register_sidebar( array(
    'name'          => esc_html__( 'Footer 3', 'statum' ),
    'id'            => 'footer-3',
    'description'   => esc_html__( 'Add widgets here to appear in your Footer 3.', 'statum' ),
    'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="heading2 title-sidebar">',
    'after_title'   => '</h2>',
  ) );
  
  register_sidebar( array(
    'name'          => esc_html__( 'Footer 4', 'statum' ),
    'id'            => 'footer-4',
    'description'   => esc_html__( 'Add widgets here to appear in your Footer 4.', 'statum' ),
    'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="heading2 title-sidebar">',
    'after_title'   => '</h2>',
  ) );
  
  
}
add_action( 'widgets_init', 'statum_widgets_init' );

/*
Enqueue scripts and styles.
*/
function statum_font_scripts() {
  
  wp_enqueue_style( 'statum-fonts', statum_fonts_url(), array(), '1.0.0' );
  
}
add_action( 'wp_enqueue_scripts', 'statum_font_scripts' );

function statum_get_comment_depth( $my_comment_id ) {

  $depth_level = 0;
  while( $my_comment_id > 0  ) { // if you have ideas how we can do it without a loop, please, share it with us in comments
    $my_comment = get_comment( $my_comment_id );
    $my_comment_id = $my_comment->comment_parent;
    $depth_level++;
  }
  return $depth_level;
  
}

//Custom comment List:
function statum_theme_comment($comment, $args, $depth) {
    
  $GLOBALS['comment'] = $comment; ?>
  <!--=======  COMMENTS =========-->

  <li <?php comment_class(''); ?> id="comment-<?php comment_ID() ?>" >

    <div class="comment-box">
      <?php if($comment->user_id!='0' and get_user_meta($comment->user_id, '_statum_avatar' ,true)!=''){ ?>
        <?php $image = get_user_meta($comment->user_id, '_statum_avatar' ,true); ?>
        <img src="<?php echo esc_attr($image); ?>" />
      <?php }else{ ?>
        <?php echo get_avatar($comment); ?>
      <?php } ?>
        <div class="comment-content">
            <h4><?php printf(esc_html__('%s','statum'), get_comment_author_link()) ?> </h4>
            <?php if(get_user_meta(get_the_author_meta('ID'), '_statum_user_address' ,true)!=''){ ?>
            <span class="reviews-list__item-location">
              <?php echo get_user_meta($comment->user_id, '_statum_user_address' ,true); ?>
            </span>
          <?php } ?>
            <?php comment_reply_link( array_merge($args, array(
              'reply_text' => '<i class="la la-mail-forward"></i>'.esc_html__('Reply', 'statum'),
              'depth'      => $depth,
              'max_depth'  => $args['max_depth']
              )
            )); ?>
           
            <span class="date-comm"><?php printf(esc_html__('%1$s','statum'), get_comment_date()) ?> |</span>
            <?php comment_text() ?>
             <?php if ($comment->comment_approved == '0') : ?>
               <em><?php esc_html_e('Your comment is awaiting moderation.','statum') ?></em>
               <br />
            <?php endif; ?>
        </div>
    </div>

<?php
}


function statum_excerpt_more( $more ) {
  return '...';
}
add_filter( 'excerpt_more', 'statum_excerpt_more' );

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme construct for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'statum_register_required_plugins' );
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
function statum_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
             // This is an example of how to include a plugin from a private repo in your theme.

        array(            
            'name'               => esc_html__('Revolution Slider', 'statum' ), // The plugin name.
            'slug'               => 'revslider', // The plugin slug (typically the folder name).
            'source'             => get_template_directory() . '/framework/plugins/revslider.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),array(            
            'name'               => esc_html__('QK Register Post Type', 'statum' ), // The plugin name.
            'slug'               => 'qk-post_type', // The plugin slug (typically the folder name).
            'source'             => get_template_directory() . '/framework/plugins/qk-post_type.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),
        
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
    
       array(
            'name'      => esc_html__( 'Kirki', 'statum' ),
            'slug'      => 'kirki',
            'required'  => true,
        ), array(
            'name'      => esc_html__( 'Elementor Page Builder', 'statum' ),
            'slug'      => 'elementor',
            'required'  => true,
        ),array(
            'name'      => esc_html__( 'CMB2', 'statum' ),
            'slug'      => 'cmb2',
            'required'  => true,
        ),array(
            'name'      => esc_html__( 'Contact Form 7', 'statum' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),array(
            'name'      => esc_html__( 'One Click Demo Import', 'statum' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        )
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'statum' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'statum' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'statum' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'statum' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'statum' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'statum' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'statum' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'statum' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'statum' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'statum' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'statum' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'statum' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'statum' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'statum' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'statum' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'statum' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'statum' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}
