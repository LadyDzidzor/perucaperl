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

class Statum_Elementor_Global_Widgets_Service2_Post extends Widget_Base {

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Service2_Post widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Statum-Global-Widgets-Service2-Post';
	}

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Service2_Post widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'QK Service Post 2', 'statum' );
	}

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Service2_Post widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-type-tool';
	}

	/**
	 * Retrieve the list of categories the Statum_Elementor_Global_Widgets_Service2_Post widget belongs to.
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
	 * Register Statum_Elementor_Global_Widgets_Service2_Post widget controls.
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
				'label' => esc_html__( 'Service2 Post', 'statum' ),
			)
		);

		$this->add_control(
		    'icon',
		    [
		        'label' => esc_html__( 'Icon Class Name', 'statum' ),
		        'type' => Controls_Manager::TEXT,
		        'description' => esc_html__('Line Awesome Statistic class name Example "la la-futbol-o". You can find more icon class here:','statum').'<a target="_blank" href="https://icons8.com/line-awesome">https://icons8.com/line-awesome</a>' ,
		        
		    ]
		);
		
		$this->add_control(
			'title',
			array(
				'label'       => esc_html__( 'Title:', 'statum' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,	
			)
		);
		$this->add_control(
			'subtitle',
			array(
				'label'       => esc_html__( 'Subtitle:', 'statum' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,	
			)
		);
		$this->add_control(
			'link',
			array(
				'label'       => esc_html__( 'Custom Link:', 'statum' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,	
			)
		);
		
		$this->add_control(
			'description',
			array(
				'label'       => esc_html__( 'Description:', 'statum' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,	
			)
		);
		
		
		$this->end_controls_section();


	}

	/**
	 * Render Statum_Elementor_Global_Widgets_Service2_Post widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		
		?>

		<div class="strategy-post">
			<a href="<?php echo esc_url($settings['link']); ?>"><i class="<?php echo esc_attr($settings['icon']); ?>"></i></a>
			<h2 class="heading2"><?php echo esc_html($settings['title']); ?></h2>
			<span><?php echo esc_html($settings['subtitle']); ?></span>
			<p><?php echo do_shortcode($settings['description']); ?></p>
		</div>
		
		<?php 

	}
}
