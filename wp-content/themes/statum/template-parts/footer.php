<?php if(get_post_meta($wp_query->get_queried_object_id(), "_statum_footer", true)!='on'){ ?>
<?php 

		$active = 0; 
   		
		if( is_active_sidebar( 'footer-1' ) ){
			$active = $active+1;
		}
		
		if( is_active_sidebar( 'footer-2' ) ){
						$active = $active+1;
		}
		
		if( is_active_sidebar( 'footer-3' ) ){
			$active = $active+1;
		}

		if( is_active_sidebar( 'footer-4' ) ){
			$active = $active+1;
		}
		
		if($active>0){
			$column = 12/$active; 
		}

?>
<!-- footer 
	================================================== -->
<footer>
	<div class="container">
		<?php if($active>0){ ?>
			<div class="up-footer">
				<div class="row">
					<?php if(is_active_sidebar('footer-1')){ ?>
						<div class="col-lg-<?php echo esc_attr($column); ?> col-md-6">
							
							<?php dynamic_sidebar('footer-1'); ?>
							
						</div>
					<?php } ?>
					<?php if(is_active_sidebar('footer-2')){ ?>
						<div class="col-lg-<?php echo esc_attr($column); ?> col-md-6">
							
							<?php dynamic_sidebar('footer-2'); ?>
							
						</div>
					<?php } ?>
					<?php if(is_active_sidebar('footer-3')){ ?>
						<div class="col-lg-3 col-md-6">
							
							<?php dynamic_sidebar('footer-3'); ?>
							
						</div>
					<?php } ?>
					<?php if(is_active_sidebar('footer-4')){ ?>
						<div class="col-lg-3 col-md-6">
							<?php dynamic_sidebar('footer-4'); ?>
							
						</div>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
		<?php if(get_theme_mod('copyright')!=''){ ?>
			<p class="copyright-line"><?php echo get_theme_mod('copyright'); ?></p>
		<?php } ?>
	</div>

</footer>
<!-- End footer -->
<?php } ?>