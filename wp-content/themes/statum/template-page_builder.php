<?php 
/*
*Template Name: Page builder
*/
?>
<?php get_header(); ?>

		<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1 class="heading1"><?php single_post_title(); ?></h1>
				<?php $subtitle = get_post_meta($wp_query->get_queried_object_id(), "_statum_banner_subtitle", true); ?>
				<?php if($subtitle!=''){ ?>
					<p><?php echo esc_html($subtitle); ?></p>
				<?php } ?>
			</div>
		</section>
		<!-- End page-banner-section -->

		<?php 
			while(have_posts()) : the_post(); 
				the_content(); 
			endwhile;
		?>

<?php get_footer(); ?>