<?php
/**
 * Brooklyn Lite Theme Customizer
 *
 * @package Brooklyn Lite
 */

if ( !function_exists('brooklyn_lite_default_theme_options') ) :
    function brooklyn_lite_default_theme_options() {

        $default_theme_options = array(
        	'brooklyn_lite_read_more_text'  		=> esc_html__('Read More','brooklyn-lite'), 
        	'brooklyn_lite_blog_meta'       		=> 1, 
        	'brooklyn_lite_blog_excerpt'    		=> 20,
            'brooklyn_lite_copyright_text'  		=> __('&copy; 2020 All Rights Reserved','brooklyn-lite'),
            'brooklyn_lite_breadcrumbs'			=> 1, 
            'brooklyn_lite_facebook'    			=> '',
            'brooklyn_lite_twitter'    			=> '',
            'brooklyn_lite_skype'    			=> '',
            'brooklyn_lite_instagram'    		=> '',
            'brooklyn_lite_dribble'    			=> '',
            'brooklyn_lite_vimeo'    			=> '',
        );
        return apply_filters( 'brooklyn_lite_default_theme_options', $default_theme_options );
    }
endif;


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function brooklyn_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'brooklyn_lite_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'brooklyn_lite_customize_partial_blogdescription',
			)
		);
	}


	$default_options = brooklyn_lite_default_theme_options();

	$wp_customize->add_section( 'theme_detail', array(
        'title'    => __( 'About Theme', 'brooklyn-lite' ),
        'priority' => 9
    ) );

    
    $wp_customize->add_setting( 'upgrade_text', array(
        'default' => '',
        'sanitize_callback' => '__return_false'
    ) );


    $wp_customize->add_panel( 'brooklyn_lite_panel', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'title' => __( 'Brooklyn Theme Options', 'brooklyn-lite' ),
    ) );



	/*Blog Page Options*/
	$wp_customize->add_section( 'brooklyn_lite_blog_section', array(
	    'priority'       => 10,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => __( 'Blog Settings', 'brooklyn-lite' ),
	    'panel' 		 => 'brooklyn_lite_panel',
	) );
    	/*Read More Text*/
    	$wp_customize->add_setting( 'brooklyn_lite_read_more_text', array(
    	    'capability'        => 'edit_theme_options',
    	    'transport' 		=> 'refresh',
    	    'default'           => $default_options['brooklyn_lite_read_more_text'],
    	    'sanitize_callback' => 'sanitize_text_field'
    	) );
    	$wp_customize->add_control( 'brooklyn_lite_read_more_text', array(
    	    'label'     => __( 'Read More Text', 'brooklyn-lite' ),
    	    'description' => __('Enter Your Custom Read More Text', 'brooklyn-lite'),
    	    'section'   => 'brooklyn_lite_blog_section',
    	    'settings'  => 'brooklyn_lite_read_more_text',
    	    'type'      => 'text',
    	    'priority'  => 10
    	) );
    	/*Meta Fields*/
    	$wp_customize->add_setting( 'brooklyn_lite_blog_meta', array(
    	    'capability'        => 'edit_theme_options',
    	    'transport' 		=> 'refresh',
    	    'default'           => $default_options['brooklyn_lite_blog_meta'],
    	    'sanitize_callback' => 'brooklyn_lite_sanitize_checkbox'
    	) );

    	$wp_customize->add_control( 'brooklyn_lite_blog_meta', array(
    	    'label'     => __( 'Show Blog Meta', 'brooklyn-lite' ),
    	    'description' => __('Check to hide the date, category, tags etc on blog page.', 'brooklyn-lite'),
    	    'section'   => 'brooklyn_lite_blog_section',
    	    'settings'  => 'brooklyn_lite_blog_meta',
    	    'type'      => 'checkbox',
    	    'priority'  => 10
    	) );

    	/*Excerpt Length*/
    	$wp_customize->add_setting( 'brooklyn_lite_blog_excerpt', array(
    	    'capability'        => 'edit_theme_options',
    	    'transport' 		=> 'refresh',
    	    'default'           => $default_options['brooklyn_lite_blog_excerpt'],
    	    'sanitize_callback' => 'absint'
    	) );
    	$wp_customize->add_control( 'brooklyn_lite_blog_excerpt', array(
    	    'label'     		=> __( 'Enter excerpt length', 'brooklyn-lite' ),
    	    'description' 		=> __('Enter the lenght of excerpt.', 'brooklyn-lite'),
    	    'section'   		=> 'brooklyn_lite_blog_section',
    	    'settings'  		=> 'brooklyn_lite_blog_excerpt',
    	    'type'      		=> 'number',
    	    'priority'  		=> 10,
    	    'input_attrs' 		=> array(
	            'min' 	=> -1,
	            'max' 	=> 50,
	            'step' 	=> 1,
	        ),
    	) );
    	/*Breadcrumb Options*/
    	$wp_customize->add_setting( 'brooklyn_lite_breadcrumbs', array(
    	    'capability'        => 'edit_theme_options',
    	    'transport' 		=> 'refresh',
    	    'default'           => $default_options['brooklyn_lite_breadcrumbs'],
    	    'sanitize_callback' => 'brooklyn_lite_sanitize_checkbox'
    	) );
    	$wp_customize->add_control( 'brooklyn_lite_breadcrumbs', array(
    	    'label'     		=> __( 'Breadcrumb Option', 'brooklyn-lite' ),
    	    'description' 		=> __('Show hide breadcrumb.', 'brooklyn-lite'),
    	    'section'   		=> 'brooklyn_lite_blog_section',
    	    'settings'  		=> 'brooklyn_lite_breadcrumbs',
    	    'type'      		=> 'checkbox',
    	    'priority'  		=> 10
    	) );



	// Footer Settings
    $wp_customize->add_section( 'footer_section' , array(
        'title'      			=> esc_html__( 'Footer Settings', 'brooklyn-lite' ),
        'priority'   			=> 15,
        'panel' 		 		=> 'brooklyn_lite_panel',
    ) );

		//Social Options
	    $wp_customize->add_setting( 'brooklyn_lite_twitter',array(
			'sanitize_callback'     => 'esc_url_raw',
			'default'           	=> $default_options['brooklyn_lite_twitter']
		));
	    $wp_customize->add_setting( 'brooklyn_lite_skype',array(
	    	'sanitize_callback'     => 'esc_url_raw',
	    	'default'           	=> $default_options['brooklyn_lite_skype']
	    ));
	    $wp_customize->add_setting( 'brooklyn_lite_instagram',array(
	    	'sanitize_callback'    	=> 'esc_url_raw',
	    	'default'           	=> $default_options['brooklyn_lite_instagram']
	    ));
	    $wp_customize->add_setting( 'brooklyn_lite_dribble',array(
	    	'sanitize_callback'     => 'esc_url_raw',
	    	'default'           	=> $default_options['brooklyn_lite_dribble']
	    ));
	    $wp_customize->add_setting( 'brooklyn_lite_vimeo',array(
	    	'sanitize_callback'     => 'esc_url_raw',
	    	'default'           	=> $default_options['brooklyn_lite_vimeo']
	    ));
	    $wp_customize->add_setting( 'brooklyn_lite_facebook',array(
	    	'sanitize_callback'    	=> 'esc_url_raw',
	    	'default'           	=> $default_options['brooklyn_lite_facebook']
	    ));

	    $wp_customize->add_setting( 'copyright_text',array(
	    	'sanitize_callback' 	=> 'sanitize_textarea_field',
	    	'default'           	=> $default_options['brooklyn_lite_copyright_text']
	    ));

	    $wp_customize->add_control( 'copyright_text',
	            array(
	                'label'    => esc_html__( 'Copyright Text', 'brooklyn-lite' ),
	                'description' => esc_html__( 'Copyright Text', 'brooklyn-lite' ),
	                'section'  => 'footer_section',
	                'settings' => 'copyright_text',
	                'type'     => 'textarea'
	            )
	        );

	    $wp_customize->add_control( 'brooklyn_lite_facebook',
	        array(
	            'label'    => esc_html__( 'Facebook URL', 'brooklyn-lite' ),
	            'section'  => 'footer_section',
	            'settings' => 'brooklyn_lite_facebook',
	            'type'     => 'url'
	        )
	    );

	    $wp_customize->add_control( 'brooklyn_lite_twitter',
	        array(
	            'label'    => esc_html__( 'Twitter URL', 'brooklyn-lite' ),
	            'section'  => 'footer_section',
	            'settings' => 'brooklyn_lite_twitter',
	            'type'     => 'url'
	        )
	    );

	    $wp_customize->add_control( 'brooklyn_lite_skype',
	        array(
	            'label'    => esc_html__( 'Skype URL', 'brooklyn-lite' ),
	            'section'  => 'footer_section',
	            'settings' => 'brooklyn_lite_skype',
	            'type'     => 'url'
	        )
	    );

	    $wp_customize->add_control( 'brooklyn_lite_instagram',
	        array(
	            'label'    => esc_html__( 'Instagram URL', 'brooklyn-lite' ),
	            'section'  => 'footer_section',
	            'settings' => 'brooklyn_lite_instagram',
	            'type'     => 'url'
	        )
	    );

	    $wp_customize->add_control( 'brooklyn_lite_dribble',
	        array(
	            'label'    => esc_html__( 'Dribble URL', 'brooklyn-lite' ),
	            'section'  => 'footer_section',
	            'settings' => 'brooklyn_lite_dribble',
	            'type'     => 'url'
	        )
	    );

	    $wp_customize->add_control( 'brooklyn_lite_vimeo',
	        array(
	            'label'    => esc_html__( 'Vimeo URL', 'brooklyn-lite' ),
	            'section'  => 'footer_section',
	            'settings' => 'brooklyn_lite_vimeo',
	            'type'     => 'text'
	        )
	    );



}
add_action( 'customize_register', 'brooklyn_lite_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function brooklyn_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function brooklyn_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function brooklyn_lite_customize_preview_js() {
	wp_enqueue_script( 'brooklyn-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), BROOKLYN_LITE_VER, true );
}
add_action( 'customize_preview_init', 'brooklyn_lite_customize_preview_js' );