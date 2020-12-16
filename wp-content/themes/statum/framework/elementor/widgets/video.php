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

class Statum_Elementor_Global_Widgets_Video extends Widget_Base {

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Video widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Statum-Global-Widgets-Video';
	}

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Video widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'QK Video', 'statum' );
	}

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Video widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-type-tool';
	}

	/**
	 * Retrieve the list of categories the Statum_Elementor_Global_Widgets_Video widget belongs to.
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
	 * Register Statum_Elementor_Global_Widgets_Video widget controls.
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
				'label' => esc_html__( 'Video', 'statum' ),
			)
		);
		$this->add_control(
			'image',
			array(
				'label'       => esc_html__( 'Image:', 'statum' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,	
			)
		);

		$this->add_control(
			'title1',
			array(
				'label'       => esc_html__( 'Title1:', 'statum' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,	
			)
		);
		
		$this->add_control(
			'title2',
			array(
				'label'       => esc_html__( 'Title2:', 'statum' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,	
			)
		);
		$this->add_control(
			'video_url',
			array(
				'label'       => esc_html__( 'Video Url:', 'statum' ),
				'type'        => Controls_Manager::CODE,
				'label_block' => true,	
			)
		);
		
		$this->end_controls_section();


	}

	/**
	 * Render Statum_Elementor_Global_Widgets_Video widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		
		?>

		<div class="video-box">
			<img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr($settings['title1']); ?>">
			<div class="hover-video">
				<h2 class="heading2"><?php echo esc_html($settings['title1']); ?></h2>
				<a class="video-link iframe" href="<?php echo esc_url($settings['video_url']); ?>"><span><i class="fa fa-play"></i></span></a>
				<h2 class="heading2"><?php echo esc_html($settings['title2']); ?></h2>
			</div>
		</div>

		<?php 

	}
}
