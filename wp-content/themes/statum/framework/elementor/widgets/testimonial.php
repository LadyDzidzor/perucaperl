<?php
/**
 * Statum Elementor Global Widget Title.
 *
 * @package    Nunforest
 * @subpackage Statum
 * @since      Statum 1.2.3
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Statum_Elementor_Global_Widgets_Testimonials extends Widget_Base {

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Testimonials widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Statum-Global-Widgets-Testimonials';
	}

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Testimonials widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Statum Testimonials', 'statum' );
	}

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Testimonials widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-type-tool';
	}

	/**
	 * Retrieve the list of categories the Statum_Elementor_Global_Widgets_Testimonials widget belongs to.
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
	 * Register Statum_Elementor_Global_Widgets_Testimonials widget controls.
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
				'label' => esc_html__( 'Testimonials Logo', 'statum' ),
			)
		);

		$this->add_control(
			'style',
			array(
				'label'       => esc_html__( 'Style:', 'statum' ),
				'type'        => Controls_Manager::SELECT,
				'placeholder' => esc_html__( 'Sort posts by', 'statum' ),
				'default' => 'default',
				'options' => array(
					'default'     => esc_html__( 'Default', 'statum' ),
					'style2'     => esc_html__( 'Style2', 'statum' ),
				),
			)
		);

		$this->add_control(
			'number',
			array(
				'label'       => esc_html__( 'Number of item carousel:', 'statum' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your number of items', 'statum' ),
				'label_block' => true,
				'default'     => 1
			)
		);

		$this->add_control(
			'client',
			[
				'label' => esc_html__( 'Testimonials List', 'statum' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'client_title' => esc_html__( 'Testimonials #1', 'statum' ),
						
					],
					[
						'client_title' => esc_html__( 'Testimonials #2', 'statum' ),
						
					],
				],
				'fields' => [

					
					[
						'name' => 'client_title',
						'label' => esc_html__( 'Title', 'statum' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'Testimonial Title' , 'statum' ),
						'label_block' => true,
					],[
						'name' => 'client_content',
						'label' => esc_html__( 'Description', 'statum' ),
						'type' => Controls_Manager::TEXTAREA,
						'default' => '#',
						'label_block' => true,
					],[
						'name' => 'client_name',
						'label' => esc_html__( 'Subtitle', 'statum' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'Client Name' , 'statum' ),
						'label_block' => true,
					],[
						'name' => 'client_job',
						'label' => esc_html__( 'Subtitle', 'statum' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'Client Job' , 'statum' ),
						'label_block' => true,
					]
				],
				'title_field' => '{{{ client_title }}}',
			]
		);

		
		$this->end_controls_section();


	}

	/**
	 * Render Statum_Elementor_Global_Widgets_Testimonials widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		
		?>

		<div class="testimonial-box">
			<div class="owl-wrapper">
				<div class="owl-carousel" data-num="<?php echo esc_attr($settings['number']); ?>">
				<?php $t = count($settings['client']); ?>
				<?php  $j=1; foreach ( $settings['client'] as $item ) { ?>

					<div class="item">
						<div class="testimonial-post">
							<?php if($settings['style']=='style2'){ ?>
								<span class="quote">
									<i class="la la-quote-right"></i>
								</span>
								<h2 class="heading2"><?php echo esc_html($item['client_title']);?></h2>
								<p><?php echo do_shortcode($item['client_content']);?> </p>
								<span class="name-quote"><?php echo esc_html($item['client_name']);?></span>
								<span class="name-desc"><?php echo esc_html($item['client_job']);?></span>
							<?php }else{ ?>
								<h2 class="heading2"><?php echo esc_html($item['client_title']);?></h2>
								<p><?php echo do_shortcode($item['client_content']);?></p>
								<h3 class="heading3"><?php echo esc_html($item['client_name']);?></h3>
								<span><?php echo esc_html($item['client_job']);?></span>
								<p class="testimonial-number">
									<span><?php echo sprintf("%02d", $j); ?></span>  /  <?php echo sprintf("%02d", $t); ?>
								</p>
							<?php } ?>
						</div>
					</div>

				<?php $j++; } ?>

				</div>
			</div>
		</div>

		<?php 

	}
}
