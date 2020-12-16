<?php

// Creating the widget 
class qkl_popular_posts_widget extends WP_Widget {

function __construct() {

parent::__construct(
// Base ID of your widget
'qkl_popular_posts_widget', 

// Widget name will appear in UI
esc_html__('QK Popular Posts', 'qktheme'), 

// Widget description
array( 'description' => esc_html__( 'Listing Popular Posts', 'qktheme' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo do_shortcode($args['before_widget']);
if ( ! empty( $title ) )
echo do_shortcode($args['before_title'] . $title . $args['after_title']);

// This is where you run the code and display the output
?>
<div class="popular-widget">
<ul class="popular-list">

	<?php 
		$arr = array('post_type' => 'post', 'posts_per_page' => $instance['count'], 'orderby' => 'comment_count');
		$query = new WP_Query($arr);
		while($query->have_posts()) : $query->the_post();

	?>

	<li>
	    <?php the_post_thumbnail('thumbnail'); ?>
	    <div class="side-content">
	        <h2 class="heading2">
	            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	        </h2>
	        <span class="sidebar__popular-list-desc"><?php the_time(get_option( 'date_format' )); ?></span>
	    </div>
	</li>
	
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
</ul>	
</div>
<?php

echo do_shortcode($args['after_widget']);
}
		
// Widget Backend 
public function form( $instance ) {

if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = esc_html__( 'Popular Posts', 'qktheme' );
//$count = 4;
}
if ( isset( $instance[ 'count' ] ) ) {
$count = $instance[ 'count' ];
}
else {
$count = 3;
//$count = 4;
}

// Widget admin form
?>
<p>
<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'qktheme'); ?></label> 
<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<label for="<?php echo esc_attr($this->get_field_id( 'count' )); ?>"><?php esc_html_e( 'Number of posts:', 'qktheme'); ?></label> 
<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'count' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'count' )); ?>" type="text" value="<?php echo esc_attr( $count ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function qkl_load_popular_posts_widget() {
	register_widget( 'qkl_popular_posts_widget' );
}
add_action( 'widgets_init', 'qkl_load_popular_posts_widget' );
?>