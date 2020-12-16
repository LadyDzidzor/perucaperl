<?php
/**
 * Statum Elementor Global Widget Statistic.
 *
 * @package    Nunforest
 * @subpackage Statum
 * @since      Statum 1.2.3
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Statum_Elementor_Global_Widgets_Statistic extends Widget_Base {

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Statistic widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Statum-Global-Widgets-Statistic';
	}

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Statistic widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'QK Statistic Box', 'statum' );
	}

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Statistic widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-type-tool';
	}

	/**
	 * Retrieve the list of categories the Statum_Elementor_Global_Widgets_Statistic widget belongs to.
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
	 * Register Statum_Elementor_Global_Widgets_Statistic widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_colormag_featured_posts_block_1_title_manage',
			array(
				'label' => esc_html__( 'Statistic Box', 'statum' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'       => esc_html__( 'Title:', 'statum' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your custom block title', 'statum' ),
				'label_block' => true,
			)
		);
		
		$this->add_control(
			'number',
			array(
				'label'       => esc_html__( 'Number:', 'statum' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your number counter here', 'statum' ),
				'label_block' => true,
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
			'after',
			array(
				'label'       => esc_html__( 'After Number:', 'statum' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			)
		);


		$this->end_controls_section();

	}

	/**
	 * Render Statum_Elementor_Global_Widgets_Statistic widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( ! empty( $settings['title']) ) : ?>

			<div class="statistic-post">
				<i class="<?php echo esc_attr($settings['icon']); ?>"></i>
				<span class="timer" data-from="0" data-to="<?php echo esc_attr($settings['number']); ?>"></span><?php echo esc_html($settings['after']); ?>
				<p><?php echo esc_html($settings['title']); ?></p>
			</div>


			<?php
		endif;

	}

	protected function _content_template() { ?>

		<# if ( '' != settings.title ) { #>

			<div class="statistic-post">
				<i class="{{{ settings.icon }}}"></i>
				<span class="timer" data-from="0" data-to="{{{ settings.number }}}"></span>{{{ settings.after }}}
				<p>{{{ settings.title }}}</p>
			</div>

		<# } #>
	<?php }
}
