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

class Statum_Elementor_Global_Widgets_Blog_Col extends Widget_Base {

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Title widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Statum-Global-Widgets-Blog-Col';
	}

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Title widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Blog Col', 'statum' );
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
				'label' => esc_html__( 'Blog Col Style', 'statum' ),
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

		$this->add_control(
			'column',
			array(
				'label'   => esc_html__( 'Column:', 'statum' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '3',
				'options' => array(
					'3'     => esc_html__( '4 Column', 'statum' ),
					'4'     => esc_html__( '3 Column', 'statum' ),
					'6'     => esc_html__( '2 Column', 'statum' ),
				),
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
		
		
		$posts_number        = $this->get_settings( 'widget_number' );
		$offset_posts_number = $this->get_settings( 'offset_posts_number' );
		$display_type = $this->get_settings( 'display_type' );
		$categories_selected = $this->get_settings( 'categories_selected' );
		$order        = $this->get_settings( 'order' );
		$column        = $this->get_settings( 'column' );
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
			<?php $col = 12/$column; ?>
			<div class="news-box">
				<?php 
                $i=1; if($query->have_posts()) :
                                while($query->have_posts()) : $query->the_post(); 
                ?>
                <?php if($i%$col==1 or $i==1){ ?>
		            <div class="row">
		        <?php } ?> 
				
					<div class="col-lg-<?php echo esc_attr($column); ?> col-md-6">
						<div class="news-post">
							<?php the_post_thumbnail(); ?>
							<div class="news-content">
								<p class="auth-paragraph">
									<?php the_time(get_option( 'date_format' )); ?>, <?php
				             comments_popup_link( esc_html__('0 Comments','statum'), esc_html__('1 Comment','statum'), esc_html__('% Comments','statum'), '',  esc_html__('Comment off','statum'));
				            ?>
								</p>
								<h2 class="heading2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p><?php echo statum_excerpt($limit = 16); ?></p>
								<a class="text-btn" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','statum'); ?> <i class="la la-long-arrow-right"></i></a>
							</div>
						</div>
					</div>
					
				 <?php if($i%$col==0 or $i == $query->post_count){ ?>    
		              </div>
		            <?php } ?>

                <?php $i++; endwhile; ?>
			<?php else: ?>
                    <div class="blog-post not-found">
                            <h2 class="heading2"><?php esc_html_e('Nothing Found Here!','statum'); ?></h2>
                            <p ><?php esc_html_e('Search with other keyword:', 'statum') ?></p>
                            
                             <?php get_search_form(); ?>
                            
                    </div>
                <?php endif; ?>
			</div>
			<?php wp_reset_postdata(); ?>
            
		<?php 

	}
}
