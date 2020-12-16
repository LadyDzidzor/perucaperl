<?php while ( have_posts() ) : the_post(); ?>

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
	<!-- End page-banner-section -->

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

					<!-- single-post module -->
					<div class="single-post">

						<?php $post_banner = get_post_meta($wp_query->get_queried_object_id(), '_statum_banner', true) ?>
						<?php if($post_banner!=''){ ?>
							<img class="single-post__image" src="<?php echo esc_url($post_banner); ?>" alt="<?php the_title_attribute(); ?>">
						<?php }elseif(has_post_thumbnail()){ ?>
							<?php the_post_thumbnail('', ['class' => 'single-post__image']); ?>
						<?php } ?>
						<p class="auth-paragraph">
							<?php the_time(get_option( 'date_format' )); ?>, <?php
	             comments_popup_link( esc_html__('0 Comments','statum'), esc_html__('1 Comment','statum'), esc_html__('% Comments','statum'), '',  esc_html__('Comment off','statum'));
	            ?>
						</p>
						<h1 class="heading1"><?php the_title(); ?></h1>
						<div class="single-content">					
							<?php the_content(); ?>
			                  <?php
			                    $defaults = array(
			                      'before'           => '<div id="page-links"><strong>'.esc_html__('Page','statum').': </strong>',
			                      'after'            => '</div>',
			                      'link_before'      => '<span>',
			                      'link_after'       => '</span>',
			                      'next_or_number'   => 'number',
			                      'separator'        => ' ',
			                      'nextpagelink'     => esc_html__( 'Next page','statum' ),
			                      'previouspagelink' => esc_html__( 'Previous page','statum' ),
			                      'pagelink'         => '%',
			                      'echo'             => 1
			                    );
			                   ?>
			            </div>
			            <?php wp_link_pages($defaults); ?>

						<div class="row">
							
							<div class="col-md-6">
								<?php if(has_tag()){ ?>
									<p class="single-post__tags">
										<i class="la la-tag"></i>
										<?php the_tags( '', ', ', '' ); ?>
									</p>
								<?php } ?>
							</div>
							
							
						</div>
						<?php if(get_theme_mod('post_navi')==true){ ?>
							<?php
				              	
				              $prev_post = get_adjacent_post(false, '', true);
				              $next_post = get_adjacent_post(false, '', false); 
				              
				            ?>
				            <?php if($prev_post!=null or $next_post!=null){ ?>
								<!-- other-posts -->
								<div class="other-posts">
									<?php if($prev_post!=null){ ?>
										<?php 
											$title = $prev_post->post_title;
											$n_title  = strlen ($title ); 
											if($n_title>50){ 
												$sub_title = substr($title, 0, 25).'...';
											}else{
												$sub_title = $title;
											}
										?>
										<a class="other-posts__prev" href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">
											<i class="la la-angle-left"></i>
											<div class="other-posts__prev-box">
												<span class="other-posts__desc"><?php esc_html_e('Previous Post','statum'); ?></span>
												<h2 class="other-posts__title">
													<?php echo esc_html($sub_title); ?>
												</h2>
											</div>
										</a>
									<?php }else{ ?>
										<div class="other-posts__prev"></div>
									<?php } ?>
									<?php if($next_post!=null){ ?>
										<?php 
											$title = $next_post->post_title;
											$n_title  = strlen ($title ); 
											if($n_title>50){ 
												$sub_title = substr($title, 0, 25).'...';
											}else{
												$sub_title = $title;
											}
										?>
										<a class="other-posts__next" href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
											<i class="la la-angle-right"></i>
											<div class="other-posts__next-box">
												<span class="other-posts__desc"><?php esc_html_e('Next Post','statum'); ?></span>
												<h2 class="other-posts__title">
													<?php echo esc_html($sub_title); ?>
												</h2>
											</div>
										</a>
									<?php } ?>
								</div>
								<!-- end other-posts -->
							<?php } ?>
						<?php } ?>
						<?php if ( comments_open() || get_comments_number() ) {  ?>
			                <?php comments_template(); ?>   
			            <?php } ?>

					</div>
					<!-- End single-post module -->
				</div>
				<div class="col-md-4">
					
					<?php get_sidebar(); ?>

				</div>
			</div>
		</div>
	</section>
	<!-- End blog-section -->

<?php endwhile;
