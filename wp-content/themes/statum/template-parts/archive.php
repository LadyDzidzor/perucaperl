<!-- page-banner-section 
	================================================== -->
<section class="page-banner-section">
	<div class="container">
		<?php 
			$title = get_theme_mod( 'blog_title','Blog');
			$subtitle = get_theme_mod( 'sub_title', esc_html__('Our Blog','statum'));
		?>
		
		<?php if(is_category()){ ?>
			<h1 class="heading1"><?php single_cat_title( '', true ); ?></h1>

		<?php }elseif(is_archive()){ ?>
			<h1 class="heading1"><?php the_archive_title(); ?></h1>
		<?php }elseif(is_404()){ ?>
			<h1 class="heading1"><?php esc_html_e('404 Error','statum'); ?></h1>
		<?php }elseif (is_tag()) { ?>
			<h1 class="heading1"><?php single_tag_title();?></h1>
		<?php }elseif (is_search()) { ?>
			<h1 class="heading1"><?php esc_html_e('Search results for','statum'); ?>: '<?php echo esc_attr( get_search_query() ); ?>'</h1>
		<?php }else{ ?>
			<h1 class="heading1"><?php echo esc_html($title);?></h1>
		<?php } ?>
		<?php if($subtitle!=''){ ?>
			<p><?php echo esc_html($subtitle); ?></p>
		<?php } ?>
	</div>
</section>
<!-- End page-banner section -->

<!-- blog-section 
	================================================== -->
<section class="blog-section">
	<div class="container">
		<div class="row">
			<?php if(is_active_sidebar('sidebar-1')){ ?>
            <div class="col-md-8">
            <?php }else{ ?>
            <div class="col-md-12">
            <?php } ?>
				<div class="blog-box iso-call">
					<?php 
                        if(have_posts()) :
                                        while(have_posts()) : the_post(); 
                        ?>
                        <?php get_template_part( 'content', ( post_type_supports( get_post_type(), 'post-formats' ) ? get_post_format() : get_post_type() ) ); ?>
                        <?php endwhile; ?>
                        
                        <?php else: ?>
                            <div class="blog-post not-found">
                                    <h2 class="heading2"><?php esc_html_e('Nothing Found Here!','statum'); ?></h2>
                                    <p ><?php esc_html_e('Search with other keyword:', 'statum') ?></p>
                                    
                                     <?php get_search_form(); ?>
                                    
                            </div>
                    <?php endif; ?>

				</div>

				<div class="pagination-box">
					<?php statum_pagination($prev = esc_html__('Prev Page','statum'), $next = esc_html__('Next Page','statum'), $pages=''); ?>
					
				</div>

			</div>
			<div class="col-md-4">
				
				<?php get_sidebar(); ?>

			</div>
		</div>
	</div>
</section>
<!-- End blog-section -->
