<?php
/**
 * Implements the compatibility for the Elementor plugin in Statum  theme.
 *
 * @package    Nunforest
 * @subpackage Statum 
 * @since      Statum  1.2.3
 */


if ( ! function_exists( 'statum_elementor_active_page_check' ) ) :

	/**
	 * Check whether Elementor plugin is activated and is active on current page or not
	 *
	 * @return bool
	 *
	 * @since Statum  1.2.3
	 */
	function statum_elementor_active_page_check() {
		global $post;

		if ( defined( 'ELEMENTOR_VERSION' ) && get_post_meta( $post->ID, '_elementor_edit_mode', true ) ) {
			return true;
		}

		return false;
	}

endif;

if ( ! function_exists( 'statum_elementor_widget_render_filter' ) ) :

	/**
	 * Render the default WordPress widget settings, ie, divs
	 *
	 * @param $args the widget id
	 *
	 * @return array register sidebar divs
	 *
	 * @since Statum  1.2.3
	 */
	function statum_elementor_widget_render_filter( $args ) {

		return
			array(
				'before_widget' => '<section class="widget ' . statum_widget_class_names( $args[ 'widget_id' ] ) . ' clearfix">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="heading2 widget-title">',
				'after_title'   => '</h2>',
			);
	}

endif;

add_filter( 'elementor/widgets/wordpress/widget_args', 'statum_elementor_widget_render_filter' ); // WPCS: spelling ok.

if ( ! function_exists( 'statum_widget_class_names' ) ) :

	/**
	 * Render the widget classes for Elementor plugin compatibility
	 *
	 * @param $widgets_id the widgets of the id
	 *
	 * @return mixed the widget classes of the id passed
	 *
	 * @since Statum Decor 1.2.3
	 */
	function statum_widget_class_names( $widgets_id ) {

		$widgets_id = str_replace( 'wp-widget-', '', $widgets_id );

		$classes = statum_widgets_classes();

		$return_value = isset( $classes[ $widgets_id ] ) ? $classes[ $widgets_id ] : 'widget_featured_block';

		return $return_value;
	}

endif;

if ( ! function_exists( 'statum_widgets_classes' ) ) :

	/**
	 * Return all the arrays of widgets classes and classnames of same respectively
	 *
	 * @return array the array of widget classnames and its respective classes
	 *
	 * @since Statum Decor 1.2.3
	 */
	function statum_widgets_classes() {

		return
			array(
				'statum_featured_posts_slider_widget'   => 'widget_featured_slider widget_featured_meta',
				'statum_highlighted_posts_widget'       => 'widget_highlighted_posts widget_featured_meta',
				'statum_featured_posts_widget'          => 'widget_featured_posts widget_featured_meta',
				'statum_featured_posts_vertical_widget' => 'widget_featured_posts widget_featured_posts_vertical widget_featured_meta',
				'statum_728x90_advertisement_widget'    => 'widget_300x250_advertisement',
				'statum_300x250_advertisement_widget'   => 'widget_728x90_advertisement',
				'statum_125x125_advertisement_widget'   => 'widget_125x125_advertisement',
			);
	}

endif;

/**
 * Load the Statum Decor Elementor widgets file and registers it
 */
if ( ! function_exists( 'statum_elementor_widgets_registered' ) ) :

	/**
	 * Load and register the required Elementor widgets file
	 *
	 * @param $widgets_manager
	 *
	 * @since Statum Decor 1.2.3
	 */
	function statum_elementor_widgets_registered( $widgets_manager ) {

		// Require the files
		// 1. Block Widgets
		
		//require STATUM_ELEMENTOR_WIDGETS_DIR . '/blog.php';
		require STATUM_ELEMENTOR_WIDGETS_DIR . '/title.php';
		require STATUM_ELEMENTOR_WIDGETS_DIR . '/statistic.php';
		require STATUM_ELEMENTOR_WIDGETS_DIR . '/feature.php';
		require STATUM_ELEMENTOR_WIDGETS_DIR . '/service.php';
		require STATUM_ELEMENTOR_WIDGETS_DIR . '/service2.php';
		require STATUM_ELEMENTOR_WIDGETS_DIR . '/member.php';
		require STATUM_ELEMENTOR_WIDGETS_DIR . '/image-block.php';
		require STATUM_ELEMENTOR_WIDGETS_DIR . '/testimonial.php';
		require STATUM_ELEMENTOR_WIDGETS_DIR . '/video.php';
		require STATUM_ELEMENTOR_WIDGETS_DIR . '/video2.php';
		require STATUM_ELEMENTOR_WIDGETS_DIR . '/portfolio.php';
		require STATUM_ELEMENTOR_WIDGETS_DIR . '/gmap.php';
		require STATUM_ELEMENTOR_WIDGETS_DIR . '/blog-col.php';
		require STATUM_ELEMENTOR_WIDGETS_DIR . '/blog-carousel.php';
		
		

		// Register the widgets
		// 1. Block Widgets
		
		$widgets_manager->register_widget_type( new \Elementor\Statum_Elementor_Global_Widgets_Title() );
		$widgets_manager->register_widget_type( new \Elementor\Statum_Elementor_Global_Widgets_Statistic() );
		$widgets_manager->register_widget_type( new \Elementor\Statum_Elementor_Global_Widgets_Feature_Post() );
		$widgets_manager->register_widget_type( new \Elementor\Statum_Elementor_Global_Widgets_Service_Post() );
		$widgets_manager->register_widget_type( new \Elementor\Statum_Elementor_Global_Widgets_Service2_Post() );
		$widgets_manager->register_widget_type( new \Elementor\Statum_Elementor_Global_Widgets_Team_Post() );
		$widgets_manager->register_widget_type( new \Elementor\Statum_Elementor_Global_Widgets_Image_Block() );
		$widgets_manager->register_widget_type( new \Elementor\Statum_Elementor_Global_Widgets_Testimonials() );
		$widgets_manager->register_widget_type( new \Elementor\Statum_Elementor_Global_Widgets_Video() );
		$widgets_manager->register_widget_type( new \Elementor\Statum_Elementor_Global_Widgets_Video2() );
		$widgets_manager->register_widget_type( new \Elementor\Statum_Elementor_Global_Widgets_Portfolio() );
		$widgets_manager->register_widget_type( new \Elementor\Statum_Elementor_Global_Widgets_Gmap() );
		$widgets_manager->register_widget_type( new \Elementor\Statum_Elementor_Global_Widgets_Blog_Col() );
		$widgets_manager->register_widget_type( new \Elementor\Statum_Elementor_Global_Widgets_Blog_Carousel() );
		
		
	}

endif;

add_action( 'elementor/widgets/widgets_registered', 'statum_elementor_widgets_registered' );

if ( ! function_exists( 'statum_elementor_category' ) ) :

	/**
	 * Add the Elementor category for use in Statum Decor widgets as seperator
	 *
	 * @since Statum Decor 1.2.3
	 */
	function statum_elementor_category() {

		// Register widget block category for Elementor section
		\Elementor\Plugin::instance()->elements_manager->add_category( 'statum-widget-blocks', array(
			'title' => esc_html__( 'Statum Decor Widget Blocks', 'statum' ),
		), 1 );

		// Register widget grid category for Elementor section
		\Elementor\Plugin::instance()->elements_manager->add_category( 'statum-widget-grid', array(
			'title' => esc_html__( 'Statum Decor Widget Grid', 'statum' ),
		), 1 );

		// Register widget global category for Elementor section
		\Elementor\Plugin::instance()->elements_manager->add_category( 'statum-widget-global', array(
			'title' => esc_html__( 'Statum Decor Global Widgets', 'statum' ),
		), 1 );
	}

endif;

add_action( 'elementor/init', 'statum_elementor_category' );

