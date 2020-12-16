<?php
/**
 * An example file demonstrating how to add all controls.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2017, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       3.0.12
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}
/**
 * First of all, add the config.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/config.html
 */
Kirki::add_config(
	'kirki_demo', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);
/**
 * Add a panel.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/panels.html
 */
Kirki::add_panel(
	'statum_options_panel', array(
		'priority'    => 10,
		'title'       => esc_attr__( 'Statum Options Panel', 'statum' ),
		'description' => esc_attr__( 'Config Your Theme Options Here.', 'statum' ),
	)
);
/**
 * Add Sections.
 *
 * We'll be doing things a bit differently here, just to demonstrate an example.
 * We're going to define 1 section per control-type just to keep things clean and separate.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/sections.html
 */
$sections = array(
	'body'      => array( esc_attr__( 'Main Body Style', 'statum' ), '' ),
	'header'      => array( esc_attr__( 'Header Settings', 'statum' ), '' ),
	'blog'      => array( esc_attr__( 'BLog Settings', 'statum' ), '' ),
	'portfolio'      => array( esc_attr__( 'Portfolio Settings', 'statum' ), '' ),
	'copyright'      => array( esc_attr__( 'Footer Settings', 'statum' ), '' ),
	'typo'      => array( esc_attr__( 'Typography Settings', 'statum' ), '' ),
	
	
);
foreach ( $sections as $section_id => $section ) {
	$section_args = array(
		'title'       => $section[0],
		'description' => $section[1],
		'panel'       => 'statum_options_panel',
	);
	if ( isset( $section[2] ) ) {
		$section_args['type'] = $section[2];
	}
	Kirki::add_section( str_replace( '-', '_', $section_id ) . '_section', $section_args );
}
/**
 * A proxy function. Automatically passes-on the config-id.
 *
 * @param array $args The field arguments.
 */
function my_config_kirki_add_field( $args ) {
	Kirki::add_field( 'kirki_demo', $args );
}
/**
 * Background Control.
 *
 * @todo Triggers change on load.
 */
/**BLOG CONTROLS**/



my_config_kirki_add_field(
	array(
		'type'        => 'color',
		'settings'    => 'main_color',
		'label'       => esc_attr__( 'Chose Main Color 1', 'statum' ),
		'description' => esc_attr__( 'Chose your Main Color Style.', 'statum' ),
		'section'     => 'body_section',
		'default'     => '#4885ff',
		
	)
);


my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'blog_title',
		'label'       => esc_attr__( 'Blog Heading Title', 'statum' ),
		'description' => esc_attr__( 'insert your blog default title', 'statum' ),
		'section'     => 'header_section',
		'default'     => esc_html__('Our Blog','statum'),
	)
);
my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'sub_title',
		'label'       => esc_attr__( 'Blog Sub Title', 'statum' ),
		'description' => esc_attr__( 'insert your blog default title', 'statum' ),
		'section'     => 'header_section',
		'default'     => '',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'switch',
		'settings'    => 'post_navi',
		'label'       => esc_attr__( 'Turn On Post Navigation Section', 'statum' ),
		'description' => esc_attr__( 'Turn On/Off Post Navigation Section Here', 'statum' ),
		'section'     => 'blog_section',
		'default'     => false,
	)
);


/**Single Ad**/



my_config_kirki_add_field(
	array(
		'type'        => 'textarea',
		'settings'    => 'copyright',
		'label'       => esc_attr__( 'Copyright', 'statum' ),
		'description' => esc_attr__( 'insert your Copyright text', 'statum' ),
		'section'     => 'copyright_section',
		'default'     => esc_html__('&copy; Copyright By Nunforest 2019','statum'),
	)
);
/****/
my_config_kirki_add_field(
	array(
		'type'        => 'typography',
		'settings'    => 'main_typo',
		'label'       => esc_attr__( 'Body Typography', 'statum' ),
		'section'     => 'typo_section',
		'default'     => array(
			'font-family'    => 'Hind',
			'font-size'      => '17px',
			'line-height'    => '26px',
			'variant'    => 300,
			'color'          => '#666666',

		),
		'priority'    => 10,
		'output'      => array(
			array(
				'element' => 'body, .paragraph',
			),
		),
	)
);


my_config_kirki_add_field(
	array(
		'type'        => 'dimensions',
		'settings'    => 'logo_dimensions',
		'label'       => esc_attr__( 'Logo Dimension Control', 'statum' ),
		'section'     => 'body_section',
		'default'     => [
			'max-width'  => '70px',
		],
		'choices'     => [
			'labels' => [
				
				'max-width'  => esc_html__( 'Max Width', 'statum' ),
			],
		],
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'map_api',
		'label'       => esc_attr__( 'Google Map API', 'statum' ),
		'section'     => 'body_section',
		'default'     => '',
	)
);
