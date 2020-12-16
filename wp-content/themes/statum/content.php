<?php 
$class = 'blog-post';
if(!has_post_thumbnail()){
	$class .= ' no-thumb';
}
?>

<div <?php post_class($class); ?>>
	<?php the_post_thumbnail(); ?>
	<div class="post-content">
		<p class="auth-paragraph">
			<?php the_time(get_option( 'date_format' )); ?>, <?php
             comments_popup_link( esc_html__('0 Comments','statum'), esc_html__('1 Comment','statum'), esc_html__('% Comments','statum'), '',  esc_html__('Comment off','statum'));
            ?></a>
		</p>
		<h2 class="heading2"><a href="<?php the_permalink(); ?>"><?php if(is_sticky()){ ?><i class="fa fa-flash"></i> <?php } ?> <?php the_title(); ?></a></h2>
		<p><?php echo statum_excerpt($limit = 20); ?></p>
		<a class="text-btn" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','statum'); ?> <i class="la la-long-arrow-right"></i></a>
	</div>
</div>

