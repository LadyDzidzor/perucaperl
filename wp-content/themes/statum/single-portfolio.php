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
		<?php while(have_posts()) : the_post(); ?>
		<!-- single-project section -->
		<section class="single-project-section">
			<div class="single-content">
				<div class="container">
					<div class="row">
						<div class="col-md-7">
							<div class="images-project">
								<?php the_content(); ?>
							</div>
						</div>
						<div class="col-md-5">
							<div class="project-content">
								<h2 class="heading2"><?php esc_html_e('Project Overview','statum'); ?></h2>
								<?php the_excerpt(); ; ?>
								<?php $client = get_post_meta($wp_query->get_queried_object_id(), "_statum_project_client", true); ?>
								<?php if($client!=''){ ?>
									<h2 class="heading2"><?php esc_html_e('Client','statum'); ?></h2>
									<p><?php echo esc_html($client); ?></p>
								<?php } ?>
								<h2 class="heading2"><?php esc_html_e('Category','statum'); ?></h2>
								<p><?php echo get_the_term_list( get_the_ID(), 'portfolio_tag', '', ', ', '' );?></p>
								<h2 class="heading2"><?php esc_html_e('Share Project','statum'); ?></h2>
								<ul class="social-icons">
									<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
									<li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
								</ul>
								<?php $link = get_post_meta($wp_query->get_queried_object_id(), "_statum_project_url", true); ?>
								<?php if($link!=''){ ?>
									<a class="button-one" href="#">
										<?php esc_html_e('Launch Project','statum');?>
									</a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End single-project section -->

<?php
  $item_cats = get_the_terms( $wp_query->get_queried_object_id(), 'portfolio_category');
  $portfolio_cats = array();
  foreach((array)$item_cats as $item_cat){
    $portfolio_cats[] = $item_cat->slug;
  }
  
  $id = $wp_query->get_queried_object_id();
  $query = new WP_Query(array('post__not_in' => array( $id ),'post_type'=>'portfolio','tax_query' => array(array('taxonomy' => 'portfolio_category',
'field' => 'slug','terms' => $portfolio_cats))));
?>
<?php if($query->found_posts > 0){ ?>
	<!-- similar-projects-section 
		================================================== -->
	<section class="similar-projects-section">
		<div class="container">
			<h2 class="heading2"><?php esc_html_e('Our Other Projects','statum');?></h2>
			<div class="similar-projects-box owl-wrapper">
				<div class="owl-carousel" data-num="4">
					<?php while($query->have_posts()) : $query->the_post();?>
								
					<?php
			            $item_classes = '';
			            $item_skill = '';
			            $item_cats = get_the_terms(get_the_ID(), 'portfolio_tag');
			            $i=1; foreach((array)$item_cats as $item_cat){
			                if(count($item_cat)>0){
			                    $item_classes .= $item_cat->slug . ' ';
			                    
			                }

			                if($i==1){
			                    $item_skill .= $item_cat->name;
			                }else{
			                    $item_skill .= ' / '. $item_cat->name;
			                }

			            $i++; }
			        ?>
					<div class="item">
						<div class="project-post">
							<?php the_post_thumbnail('statum-thumb'); ?>
							<div class="project-content">
								<h2 class="heading2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<ul class="project-tags">
									<li><?php echo get_the_term_list( get_the_ID(), 'portfolio_tag', '', ', ', '' );?></li>
								</ul>
							</div>
						</div>
					</div>
				
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					
				</div>
			</div>
		</div>
	</section>
	<!-- End similar-projects section -->
<?php } ?>

<?php endwhile; ?>

<?php get_footer(); ?>