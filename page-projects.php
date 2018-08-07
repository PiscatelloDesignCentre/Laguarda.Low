<?php get_header(); ?> 
	<div class="row-fluid project-grid">
		<div class="grid-container">
		<?php
			$args = [
				"cat" => 7,
				"posts_per_page" => 16,
				"page" => 1,
				"order" => "ASC",

			];

			// The Query
			$the_query = new WP_Query( $args );
			echo "<script>window.page_length = ".$the_query->max_num_pages."</script>";
			// The Loop
			if ( $the_query->have_posts() ):
			
				while ( $the_query->have_posts() ):
					$the_query->the_post();
				?>
				<!-- POST CONTENT -->
					<a href="<?php echo get_the_permalink(); ?>" class="project-thumb invisible"> 
						<img 
							src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>"
						> 
						<div class='project-info'> 
							<span class='project-title'> 
								<?php echo get_the_title(); ?>
							</span> 
							<span class='project-location'> 
								<?php the_field('project_city'); ?>, <?php the_field('project_country')?>
							</span>
							<span class='project-category'> 
								<?php echo get_the_category()[1]->cat_name; ?> 
							</span> 
						</div> 
					</a>
				<?php endwhile; ?> 
			
			<?php else: ?>

			<?php endif; ?>
			
			<?php wp_reset_postdata();?>

		</div>

		<div class="spinner hidden">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
		</div>
		<?php include "archives.php" ?>
	</div>
<script>
	window.site_url = "<?php echo site_url() ?>/" || "";
</script>
<script src="<?php echo get_template_directory_uri()?>/node_modules/regenerator-runtime/runtime.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/lib/min/project-grid.js"></script>

<?php get_footer(); ?>