
<!-- Header
    ================================================== -->
<header class="clearfix header">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">

			<?php $custom_logo = get_post_meta($wp_query->get_queried_object_id(), '_statum_custom_logo', true) ?>
			<?php 
				$custom_logo_id = get_theme_mod( 'custom_logo' );
			?>
			<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">

				<?php if($custom_logo!=''){ ?>
				<img src="<?php echo esc_url($custom_logo); ?>" alt="<?php bloginfo('name'); ?>">
				<?php }elseif($custom_logo_id!=''){ ?>
	              <?php $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
	            	<img src="<?php echo esc_url($image[0]); ?>" alt="<?php bloginfo('name'); ?>" />
	            <?php }else{  ?>
	              <?php bloginfo('name'); ?>
	            <?php } ?>
			</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">

				<?php 
					
					$menu_location = 'primary';

					$defaults2= array(
						'theme_location'  => $menu_location,
						'menu'            => '',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'navbar-nav ml-auto',
						'menu_id'         => '',
						'echo'            => true,
						 'fallback_cb'       => 'statum_bootstrap_navwalker::fallback',
						 'walker'            => new statum_bootstrap_navwalker(),
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
					);
					if ( has_nav_menu( $menu_location ) ) {
						wp_nav_menu( $defaults2 );
					}
				
				?>
				
			</div>
		</div>
	</nav>
</header>
<!-- End Header -->
