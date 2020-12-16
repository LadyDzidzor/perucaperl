<?php
/**
 * Constrix Elementor Global Widget Title.
 *
 * @package    Aucreative
 * @subpackage Arch Decor
 * @since      Arc Decor 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Statum_Elementor_Global_Widgets_Portfolio extends Widget_Base {

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Title widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Statum-Global-Widgets-Portfolio';
	}

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Title widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Portfolio', 'statum' );
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
				'label' => esc_html__( 'Portfolio', 'statum' ),
			)
		);

		$this->add_control(
			'widget_number',
			array(
				'label'       => esc_html__( 'Number of Posts:', 'statum' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your number of posts', 'statum' ),
				'label_block' => true,
				'default'     => 6
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
				'label'       => esc_html__( 'Sort Portfolio:', 'statum' ),
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
			'filter',
			array(
				'label'       => esc_html__( 'Turn On/Off Filter:', 'statum' ),
				'type'        => Controls_Manager::SELECT,
				'placeholder' => '',
				'default' => 'off',
				'options' => array(
					'off'     => esc_html__( 'Off', 'statum' ),
					'on'     => esc_html__( 'On', 'statum' ),
					
				),
			)
		);
		$this->add_control(
			'load',
			array(
				'label'       => esc_html__( 'Turn On/Off Load More Button:', 'statum' ),
				'type'        => Controls_Manager::SELECT,
				'placeholder' => '',
				'default' => 'on',
				'options' => array(
					'off'     => esc_html__( 'Off', 'statum' ),
					'on'     => esc_html__( 'On', 'statum' ),
					
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
					'latest'     => esc_html__( 'Latest Portfolio', 'statum' ),
					'categories' => esc_html__( 'Categories', 'statum' ),
				),
			)
		);

		$categories = get_terms('portfolio_category' , 'hide_empty=0');
    
	    $category_option = array();
	    $category_option['All'] = 'all';
	    foreach ($categories as $category) {

	    $category_option[$category->name] = $category->slug;

	    }

		$this->add_control(
			'categories_selected',
			array(
				'label'     => esc_html__( 'Select categories:', 'statum' ),
				'type'      => Controls_Manager::SELECT,
				'default' => 'all',
				'options'   => $category_option,
				'condition' => array(
					'display_type' => 'categories',
				),
			)
		);

		$this->add_control(
			'thumbnail_size',
			array(
				'label'       => esc_html__( 'Thumbnail Size', 'statum' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add thumbnail size', 'statum' ),
				'label_block' => true,
				'default'     => ''
			)
		);
		$this->add_control(
			'custom_class',
			array(
				'label'       => esc_html__( 'Custom section class:', 'statum' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add custom class for section', 'statum' ),
				'label_block' => true,
				'default'     => ''
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
		$custom_class        = $this->get_settings( 'custom_class' );
		$display_type        = $this->get_settings( 'display_type' );
		$order        = $this->get_settings( 'order' );
		$filter        = $this->get_settings( 'filter' );
		$offset_posts_number = $this->get_settings( 'offset_posts_number' );
		$categories_selected = $this->get_settings( 'categories_selected' );
		$thumbnail_size = $this->get_settings( 'thumbnail_size' );
		$load = $this->get_settings( 'load' );
		
		 if ( get_query_var('paged') ) {
	    $paged = get_query_var('paged');
	    } elseif ( get_query_var('page') ) {
	        $paged = get_query_var('page');
	    } else {
	        $paged = 1;
	    }   

		$args = array(
			'posts_per_page'      => $posts_number,
			'post_type'           => 'portfolio',
			'ignore_sticky_posts' => true,
			
		);
		
		if ( $order!='default' ) {
			$args[ 'order' ] = $order;
		}

		// Display from the category selected
		if ( 'categories' == $display_type and $display_type!='all' ) {
			$args[ 'tax_query' ] = array(
											array(
												'taxonomy' => 'portfolio_category',
												'field'    => 'slug',
												'terms'    => $categories_selected,
											),
										);
		}

		// Offset the posts
		if ( ! empty( $offset_posts_number ) ) {
			$args[ 'offset' ] = $offset_posts_number;
		}

		
		$portfolio = new \WP_Query($args); ?>


			<!-- portfolio-section 
				================================================== -->
			<section class="portfolio-section">
				<?php if($filter=='on'){ ?>
					<div class="container">
						
						<ul class="filter">
							<li><a class="active" href="#" data-filter="*"><?php esc_html_e('All', 'statum'); ?></a></li>
							<?php $portfolio_skills = get_terms('portfolio_tag'); ?>
				        	<?php foreach($portfolio_skills as $portfolio_skill) { ?>
							<li><a href="#" data-filter=".<?php echo esc_attr($portfolio_skill->slug); ?>"><?php echo esc_attr($portfolio_skill->name); ?></a></li>
							<?php } ?>
						</ul>
					</div>
				<?php } ?>
				<div class="portfolio-box iso-call <?php echo esc_attr($custom_class); ?>">

					<?php  while($portfolio->have_posts()) : $portfolio->the_post(); ?>
					<?php
			            $item_classes = '';
			            $item_skill = '';
			            $item_cats = get_the_terms(get_the_ID(), 'portfolio_tag');
			            if(! is_wp_error( $item_cats )){
			            	$i=1; foreach((array)$item_cats as $item_cat){
				                if($item_cat){
				                    $item_classes .= $item_cat->slug . ' ';
				                    
				                }

				                if($i==1){
				                    $item_skill .= $item_cat->name;
				                }else{
				                    $item_skill .= ' / '. $item_cat->name;
				                }

				            $i++; }
			            }
			            $custom_class = get_post_meta(get_the_ID(), '_statum_project_class', true);
			            if($custom_class!=''){
			            	$item_classes .= ' '.$custom_class;
			            }
			        ?>

					<div class="item project-post <?php echo esc_attr($item_classes); ?>">
						
						<?php if(has_post_thumbnail()){ ?>
							<div class="project-gal">
								<?php the_post_thumbnail($thumbnail_size); ?>
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

					<?php endwhile; wp_reset_postdata(); ?>

				</div>
				<?php if($load!='off'){ ?>
					<div class="center-button">
						<a class="button-one load-post-container1" 
							data-cat="<?php if ( 'categories' == $display_type and $display_type!='all' ) { echo esc_attr($categories_selected); }else{ echo "all"; } ?>" data-thumb="<?php echo esc_attr($thumbnail_size); ?>" data-found="<?php echo esc_attr($portfolio->found_posts); ?>" data-load="<?php echo esc_attr($posts_number); ?>"
							data-page="2" data-max="<?php echo esc_attr($portfolio->max_num_pages); ?>"
							href="#">
							<i class="la la-refresh"></i>
							<?php esc_html_e('Load More Projects','statum'); ?>
						</a>
					</div>
				<?php } ?>
			</section>
			<!-- End portfolio section -->

		<?php 

	}
}
