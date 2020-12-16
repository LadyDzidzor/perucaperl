<?php 


add_action( 'cmb2_admin_init', 'statum_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function statum_metaboxes() {
    
    // Start with an underscore to hide fields from custom fields list
    $prefix = '_statum_';

    /**
     * Initiate the metabox
     */

    $cmb = new_cmb2_box( array(
        'id'            => 'page_options',
        'title'         => esc_html__( 'Page Setting', 'statum' ),
        'object_types'  => array( 'page' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        
    ) );
    
    $cmb->add_field(  array(
        'name' => esc_html__(' Page Banner Image','statum'),
        'desc' => '',
        'id'   => $prefix . 'banner',
        'type'    => 'file',
        
    ));
    
    $cmb->add_field(
        array(
                'name'     => esc_html__( 'Banner SubTitle', 'statum' ),
                'desc'     => esc_html__( 'Page Banner SubTittle (optional)', 'statum' ),
                'id'       => $prefix . 'banner_subtitle',
                'type'     => 'textarea',
                'on_front' => false,
            )
    );

    $cmb->add_field( array(
        'name' => esc_html__('Hide Footer Section','statum'),
        'desc' => esc_html__('Hide Default Footer Widgets Section on this Page','statum'),
        'id'   => $prefix. 'footer',
        'type' => 'checkbox',
    ) );

    $cmb = new_cmb2_box( array(
        'id'            => 'portfolio_options',
        'title'         => esc_html__( 'Portfolio Options', 'statum' ),
        'object_types'  => array( 'portfolio' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        
    ) );

    $cmb->add_field(  array(
        'name' => esc_html__(' Page Banner Image','statum'),
        'desc' => '',
        'id'   => $prefix . 'banner',
        'type'    => 'file',
        
    ));

    $cmb->add_field(
        array(
                'name'     => esc_html__( 'Banner SubTitle', 'statum' ),
                'desc'     => esc_html__( 'Page Banner SubTittle (optional)', 'statum' ),
                'id'       => $prefix . 'banner_subtitle',
                'type'     => 'textarea',
                'on_front' => false,
            )
    );

    $cmb->add_field(
        array(
                'name'     => esc_html__( 'Project Client', 'statum' ),
                'id'       => $prefix . 'project_client',
                'type'     => 'text',
                'on_front' => false,
            )
    );
    $cmb->add_field(
        array(
                'name'     => esc_html__( 'Project Url', 'statum' ),
                'id'       => $prefix . 'project_url',
                'type'     => 'text',
                'on_front' => false,
            )
    );

    $cmb->add_field(
        array(
                'name'     => esc_html__( 'Custom Class', 'statum' ),
                'id'       => $prefix . 'project_class',
                'desc'       => esc_html__( 'Custom class for metro layout. Example: "snd-size"', 'statum' ),
                'type'     => 'text',
                'on_front' => false,
            )
    );

    $cmb = new_cmb2_box( array(
        'id'            => 'post_options',
        'title'         => esc_html__( 'Post Format Intro', 'statum' ),
        'object_types'  => array( 'post', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        
    ) );

    // Regular text field
    $cmb->add_field( array(
        'name'       => esc_html__( 'Post Banner', 'statum' ),
        'desc'       => esc_html__( 'Upload post images for header banner', 'statum' ),
        'id'         => $prefix . 'banner',
        'type'       => 'file',
       
    ) );

   

    $cmb = new_cmb2_box( array(
        'id'            => 'user_edit',
        'title'         => esc_html__( 'User Meta Profile', 'statum' ),
        'object_types'  => array( 'user', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        
    ) );
    $cmb->add_field(
        array(
                'name'    => esc_html__( 'Avatar', 'statum' ),
                'desc'    => esc_html__( 'field description (optional)', 'statum' ),
                'id'      => $prefix . 'avatar',
                'type'    => 'file',
                'save_id' => true,
            )
    );
    $cmb->add_field(
        array(
                'name'     => esc_html__( 'Facebook', 'statum' ),
                'desc'     => esc_html__( 'Your Facebook Link (optional)', 'statum' ),
                'id'       => $prefix . 'user_facebook',
                'type'     => 'text',
                'on_front' => false,
            )
    );
    $cmb->add_field(
        
        array(
                'name'     => esc_html__( 'Google', 'statum' ),
                'desc'     => esc_html__( 'Your Google Link (optional)', 'statum' ),
                'id'       => $prefix . 'user_google',
                'type'     => 'text',
                'on_front' => false,
            )
    );
     $cmb->add_field(
        array(
                'name'     => esc_html__( 'Twitter', 'statum' ),
                'desc'     => esc_html__( 'Your Twitter Link (optional)', 'statum' ),
                'id'       => $prefix . 'user_twitter',
                'type'     => 'text',
                'on_front' => false,
            )
    );
      $cmb->add_field(
        array(
                'name'     => esc_html__( 'Youtube', 'statum' ),
                'desc'     => esc_html__( 'Your Youtube Link (optional)', 'statum' ),
                'id'       => $prefix . 'user_youtube',
                'type'     => 'text',
                'on_front' => false,
            )
    );
       $cmb->add_field(
        array(
                'name'     => esc_html__( 'Linkedin', 'statum' ),
                'desc'     => esc_html__( 'Your Linkedin Link (optional)', 'statum' ),
                'id'       => $prefix . 'user_linkedin',
                'type'     => 'text',
                'on_front' => false,
            )
    );
        $cmb->add_field(
        array(
                'name'     => esc_html__( 'Instagram', 'statum' ),
                'desc'     => esc_html__( 'Your Instagram Link (optional)', 'statum' ),
                'id'       => $prefix . 'user_instagram',
                'type'     => 'text',
                'on_front' => false,
            )
    );
         $cmb->add_field(
        array(
                'name'     => esc_html__( 'Dribbble', 'statum' ),
                'desc'     => esc_html__( 'Your Dribbble Link (optional)', 'statum' ),
                'id'       => $prefix . 'user_dribble',
                'type'     => 'text',
                'on_front' => false,
            )
    );
    
}


?>