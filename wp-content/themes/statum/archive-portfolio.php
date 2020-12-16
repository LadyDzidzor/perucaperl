<?php get_header(); ?>

		<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1 class="heading1"><?php the_archive_title(); ?></h1>
				<p><?php esc_html_e('Our Projects','statum'); ?></p>
			</div>
		</section>
		<!-- End page-banner-section -->
		
		<!-- portfolio-section 
			================================================== -->
		<section class="portfolio-section portfolio-page">

			<div class="container">

				<ul class="filter">
					<li><a class="active" href="#" data-filter="*"><?php esc_html_e('All', 'statum'); ?></a></li>
					<?php $portfolio_skills = get_terms('portfolio_tag'); ?>
		        	<?php foreach($portfolio_skills as $portfolio_skill) { ?>
					<li><a href="#" data-filter=".<?php echo esc_attr($portfolio_skill->slug); ?>"><?php echo esc_attr($portfolio_skill->name); ?></a></li>
					<?php } ?>
				</ul>

				<div class="portfolio-box iso-call">

					<?php  while(have_posts()) : the_post(); ?>
					<?php
			            $item_classes = '';
			            $item_skill = '';
			            $item_cats = get_the_terms(get_the_ID(), 'portfolio_tag');
			            if(! is_wp_error( $item_cats )){
			            	$i=1; foreach((array)$item_cats as $item_cat){
				                if($item_cat){
				                    $item_classes .= $item_cat->slug . ' ';
				                    
				                }

				                if($i==1){
				                    $item_skill .= $item_cat->name;
				                }else{
				                    $item_skill .= ' / '. $item_cat->name;
				                }

				            $i++; }
			            }
			            $custom_class = get_post_meta(get_the_ID(), '_statum_project_class', true);
			            if($custom_class!=''){
			            	$item_classes .= ' '.$custom_class;
			            }
			        ?>

					<div class="item project-post <?php echo esc_attr($item_classes); ?>">
						
						<?php if(has_post_thumbnail()){ ?>
							<div class="project-gal">
								<?php the_post_thumbnail(''); ?>
							</div>
						<?php } ?>
						
						<div class="hover-box">
							<a class="zoom" href="<?php echo get_the_post_thumbnail_url(); ?>"><i class="la la-arrows"></i></a>
							<h2 class="heading2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<ul class="project-tags">
								<li><?php echo esc_html($item_skill);?></li>
								
							</ul>
						</div>
					</div>

					<?php endwhile; wp_reset_postdata(); ?>

				</div>
				<div class="center-button">
					<a class="button-one load-post-container1" 
						data-cat="all" data-thumb="" data-found="<?php echo esc_attr($wp_query->found_posts); ?>" data-load="<?php echo get_option( 'posts_per_page' ); ?>"
						data-page="2" data-max="<?php echo esc_attr($wp_query->max_num_pages); ?>"
						href="#">
						<i class="la la-refresh"></i>
						<?php esc_html_e('Load More Projects','statum'); ?>
					</a>
				</div>

			</div>
		</section>
		<!-- End portfolio section -->
<?php get_footer(); ?>