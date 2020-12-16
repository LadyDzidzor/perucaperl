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

class Statum_Elementor_Global_Widgets_Feature_Post extends Widget_Base {

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Feature_Post widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Statum-Global-Widgets-Feature-Post';
	}

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Feature_Post widget title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'QK Feature Post', 'statum' );
	}

	/**
	 * Retrieve Statum_Elementor_Global_Widgets_Feature_Post widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-type-tool';
	}

	/**
	 * Retrieve the list of categories the Statum_Elementor_Global_Widgets_Feature_Post widget belongs to.
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
	 * Register Statum_Elementor_Global_Widgets_Feature_Post widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_arc_feature_posts_block_1_title_manage',
			array(
				'label' => esc_html__( 'Feature Post', 'statum' ),
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
			'icon_link',
			array(
				'label'       => esc_html__( 'Icon Link:', 'statum' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '#',
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
		
		$this->add_control(
			'style',
			array(
				'label'       => esc_html__( 'Style:', 'statum' ),
				'type'        => Controls_Manager::SELECT,
				'placeholder' => esc_html__( 'Sort posts by', 'statum' ),
				'default' => 'default',
				'options' => array(
					'default'     => esc_html__( 'Default', 'statum' ),
					'style2'     => esc_html__( 'Icon Left', 'statum' ),
				),
			)
		);
		
		$this->end_controls_section();


	}

	/**
	 * Render Statum_Elementor_Global_Widgets_Feature_Post widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		
		?>

		<div class="feature-post">
			<?php if($settings['style']=='style2'){ ?>
				<div class="icon-hold"><a href="<?php echo esc_url($settings['icon_link']); ?>"><i class="<?php echo esc_attr($settings['icon']); ?>"></i></a></div>
				<div class="features-post-content">
				    <h2 class="heading2"><?php echo esc_html($settings['title']); ?></h2>
					<p><?php echo do_shortcode($settings['description']); ?></p>
				</div>
			<?php }else{ ?>
				<span><a href="<?php echo esc_url($settings['icon_link']); ?>"><i class="<?php echo esc_attr($settings['icon']); ?>"></i></a></span>
				<div class="features-post-content">
					<h2 class="heading2"><?php echo esc_html($settings['title']); ?></h2>
					<p><?php echo do_shortcode($settings['description']); ?></p>
				</div>
			<?php } ?>
		</div>

		<?php 

	}
}
