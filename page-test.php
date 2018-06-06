<?php get_header(); ?>

		<!-- <nav class="row-fluid project-nav">
			<ul>
				<li class="col-md-1 project-nav-article">
					<a>ALL PROJECTS</a>
				</li> 
				<li class="col-md-1 project-nav-article">
					<a>CURRENT</a>
				</li> 
				<li class="col-md-1 project-nav-article">
					<a>PLANNING</a>
				</li> 
				<li class="col-md-1 project-nav-article">
					<a>MIXED USE</a>
				</li> 
				<li class="col-md-1 project-nav-article">
					<a>RETAIL</a>
				</li> 
				<li class="col-md-1 project-nav-article">
					<a>TRANSIT</a>
				</li> 
				<li class="col-md-1 project-nav-article">
					<a>OFFICE</a>
				</li> 
				<li class="col-md-1 project-nav-article">
					<a>RESIDENTIAL</a>
				</li> 
				<li class="col-md-1 project-nav-article">
					<a>HOSPITALITY</a>
				</li> 
				<li class="col-md-1 project-nav-article">
					<a>RENOVATION</a>
				</li> 
				<li class="col-md-1 project-nav-article">
					<a>PUBLIC</a>
				</li> 
				<li class="col-md-1 project-nav-article">
					<a>ARCHIVE</a>
				</li>
			</ul>
		</nav>  -->

	<div class="row-fluid project-grid">
		<!-- <?php nivo_slider( 73 ); ?> -->
		<?php echo do_shortcode( '[the-post-grid id="187" title="projectsGrid"]' ); ?>
	</div>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	

<?php get_footer(); ?>