<?php
/**
 * Statum Elementor Global Widget Title.
 *
 * @package    Nunforest
 * @subpackage Arch Decor
 * @since      Statum 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Statum_Elementor_Global_Widgets_Blog_Masonry extends Widget_Base {

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Title widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Statum-Global-Widgets-Blog-Masonry';
	}

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Title widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Blog Masonry', 'statum' );
	}

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Title widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-type-tool';
	}

	/**
	 * Retrieve the list of categories the Statum_Elementor_Global_Widgets_Title widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'statum-widget-blocks' );
	}
	
	/**
	 * Register Statum_Elementor_Global_Widgets_Title widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_arc_featured_posts_block_1_title_manage',
			array(
				'label' => esc_html__( 'Blog Masonry', 'statum' ),
			)
		);

		$this->add_control(
			'widget_number',
			array(
				'label'       => esc_html__( 'Number of Posts:', 'statum' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your number of posts', 'statum' ),
				'label_block' => true,
				'default'     => 3
			)
		);

		$this->add_control(
			'offset_posts_number',
			array(
				'label' => esc_html__( 'Offset Posts:', 'statum' ),
				'type'  => Controls_Manager::TEXT,

			)
		);
		
		$this->add_control(
			'order',
			array(
				'label'       => esc_html__( 'Sort Posts:', 'statum' ),
				'type'        => Controls_Manager::SELECT,
				'placeholder' => esc_html__( 'Sort posts by', 'statum' ),
				'default' => 'default',
				'options' => array(
					'default'     => esc_html__( 'Default', 'statum' ),
					'ASC'     => esc_html__( 'ASC', 'statum' ),
					'DESC' => esc_html__( 'DESC', 'statum' ),
				),
			)
		);


		$this->add_control(
			'display_type',
			array(
				'label'   => esc_html__( 'Display the posts from:', 'statum' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'latest',
				'options' => array(
					'latest'     => esc_html__( 'Latest Posts', 'statum' ),
					'categories' => esc_html__( 'Categories', 'statum' ),
				),
			)
		);

		$this->add_control(
			'categories_selected',
			array(
				'label'     => esc_html__( 'Select categories:', 'statum' ),
				'type'      => Controls_Manager::SELECT2,
				'options'   => statum_elementor_categories(),
				'condition' => array(
					'display_type' => 'categories',
				),
				'multiple' => true,
			)
		);

		
		$this->end_controls_section();
	}

	/**
	 * Render Statum_Elementor_Global_Widgets_Title widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		
		$column        = $this->get_settings( 'column' );
		$posts_number        = $this->get_settings( 'widget_number' );
		$offset_posts_number = $this->get_settings( 'offset_posts_number' );
		$display_type = $this->get_settings( 'display_type' );
		$categories_selected = $this->get_settings( 'categories_selected' );
		$order        = $this->get_settings( 'order' );
		 if ( get_query_var('paged') ) {
	    $paged = get_query_var('paged');
	    } elseif ( get_query_var('page') ) {
	        $paged = get_query_var('page');
	    } else {
	        $paged = 1;
	    }   

		$args = array(
			'posts_per_page'      => $posts_number,
			'post_type'           => 'post',
			'ignore_sticky_posts' => true,
			'paged'               => $paged
			
		);

		// Display from the category selected
		if ( 'categories' == $display_type ) {
			if($categories_selected!=''){
				$categories_selected = implode(",",$categories_selected);
				$args[ 'cat' ] = $categories_selected;
			}
		}

		// Offset the posts
		if ( ! empty( $offset_posts_number ) ) {
			$args[ 'offset' ] = $offset_posts_number;
		}

		if ( $order!='default' ) {
			$args[ 'order' ] = $order;
		}
		
		$query = new \WP_Query($args); ?>

			<div class="news-box iso-call">
				
				<?php 
                    $i=1; if($query->have_posts()) :
                                    while($query->have_posts()) : $query->the_post(); 
                ?>
                 
                 <div <?php post_class('news-post'); ?>>
	                <?php the_post_thumbnail(); ?>
	                <h2 class="heading2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	                <p><?php echo statum_excerpt($limit = 10); ?></p>
	                <ul class="post-tags">
	                    <li><?php esc_html_e('by', 'statum'); ?> <?php the_author_posts_link(); ?></li>
	                    <li><?php echo statum_time_ago(); ?></li>
	                </ul>
	            </div>

                 <?php $i++; endwhile; ?>
                        
                <?php else: ?>
                    <div class="blog-post not-found">
                        <h2 class="heading2"><?php esc_html_e('Nothing Found Here!','statum'); ?></h2>
                        <p ><?php esc_html_e('Search with other keyword:', 'statum') ?></p>
                        
                         <?php get_search_form(); ?>
                        
                </div>
                <?php endif; ?>

			</div>

			 <div class="center-area">
	            <?php statum_pagination($prev = '<i class="fa fa-angle-left"></i> '.esc_html__('prev','statum'), $next = esc_html__('next','statum').' <i class="fa fa-angle-right"></i>', $pages=''); ?>
	        </div>
			<?php wp_reset_postdata(); ?>

			
            
		<?php 

	}
}
