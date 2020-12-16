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

class Statum_Elementor_Global_Widgets_Team_Carousel extends Widget_Base {

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Team_Carousel widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Statum-Global-Widgets-Team-Carousel';
	}

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Team_Carousel widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Statum Team Carousel', 'statum' );
	}

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Team_Carousel widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-type-tool';
	}

	/**
	 * Retrieve the list of categories the Statum_Elementor_Global_Widgets_Team_Carousel widget belongs to.
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
	 * Register Statum_Elementor_Global_Widgets_Team_Carousel widget controls.
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
				'label' => esc_html__( 'Team Carousel', 'statum' ),
			)
		);

		$this->add_control(
			'client',
			[
				'label' => esc_html__( 'Team List', 'statum' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'client_title' => esc_html__( 'Team_Carousel #1', 'statum' ),
						
					],
					[
						'client_title' => esc_html__( 'Team_Carousel #2', 'statum' ),
						
					],
				],
				'fields' => [

					
					[
						'name' => 'client_logo',
						'label' => esc_html__( 'Avatar', 'statum' ),
						'type' => Controls_Manager::MEDIA,
						'default' => '',
						'label_block' => true,
					],[
						'name' => 'client_title',
						'label' => esc_html__( 'Name', 'statum' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'Client Name' , 'statum' ),
						'label_block' => true,
					],[
						'name' => 'client_job',
						'label' => esc_html__( 'Job', 'statum' ),
						'type' => Controls_Manager::TEXT,
						'default' => '#',
						'label_block' => true,
					],[
						'name' => 'client_content',
						'label' => esc_html__( 'Description', 'statum' ),
						'type' => Controls_Manager::TEXTAREA,
						'default' => '',
						'label_block' => true,
					],[
						'name' => 'client_socials',
						'label' => esc_html__( 'Social Icons', 'statum' ),
						'type' => Controls_Manager::CODE,
						'default' => '',
						'label_block' => true,
					]
				],
				'title_field' => '{{{ client_title }}}',
			]
		);

		
		$this->end_controls_section();


	}

	/**
	 * Render Statum_Elementor_Global_Widgets_Team_Carousel widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		
		?>

		<div class="team-box owl-wrapper">
			<div class="owl-carousel" data-num="4">
				<?php  $j=0; foreach ( $settings['client'] as $item ) { ?>

					<div class="item team-post">
						<div class="inner-team-post">
							<div class="team-gal">
								<img src="<?php echo esc_url($item['client_logo']['url']);?>" alt="<?php echo esc_attr($item['client_title']);?>">
							</div>
							<h2 class="heading2"><?php echo esc_html($item['client_title']);?></h2>
							<span><?php echo esc_html($item['client_job']);?></span>
							<p><?php echo do_shortcode($item['client_content']);?></p>
							<?php echo do_shortcode($item['client_socials']);?>
						</div>
					</div>

				<?php $j++; } ?>
			</div>
		</div>


		<?php 

	}
}
