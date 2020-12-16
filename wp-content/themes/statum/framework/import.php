<?php 
function statum_import_files() {
  return array(
    array(
      'import_file_name'           => esc_html__('Default','statum'),
      'categories'                 => array( esc_html__('Demo Data','statum') ),
      'import_file_url'            => get_template_directory_uri() . '/framework/default/content.xml',
      'import_widget_file_url'     => get_template_directory_uri() . '/framework/default/widgets.json',
      'import_preview_image_url'   => get_template_directory_uri() . '/screenshot.png',
      'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'statum' ),
    )
    
  );
}
add_filter( 'pt-ocdi/import_files', 'statum_import_files' );
?>