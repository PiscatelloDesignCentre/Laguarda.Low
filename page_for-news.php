<?php
/**
 * Template Name: Page template for news posts
 * Template Post Type: post
**/
?>
<?php get_header(); ?>

<style>
    p {
        font-size: 14px !important;
    }
</style>

<?php  while ( have_posts() ) : the_post(); ?>
    <!-- Left side with info -->
    <div class="content__full-width full-height padding-t-90">
        <div class="left invisible animate">
            <div class="page-top-left">
                <h3 class="title"><?php the_title() ?></h3>
                <h5 class="subtitle"><?php the_date() ?></h5>
            </div>
            <p style="width: 66.66%"><?php echo get_the_content(); ?></p>
        </div>
        <div class="right invisible animate">
            <div class="img-block invisible animate">
                <?php $file_parts = pathinfo(get_field('attachment')); ?>
                <?php if($file_parts['extension'] == "pdf"): ?>
                    <?php $pdf_url = get_field('attachment')  ?>
                    <a href = "<?php echo $pdf_url ?>" target="_blank">
                        <img src="<?php the_field('pdf_preview')?>">
                    </a>
                <?php else: ?>
                    <img src="<?php the_field('pdf_preview')?>">
                <?php endif; ?>
            </div>
            <div class="page-top-left" style="margin-top: 30px">
                <div class="projectShare" style="margin-left: 0 !important">
					<a>Share</a>
                </div>                
                <h5>&nbsp</h5>
            </div>
            
        </div>
        <div class="approach-nav invisible animate">
            <?php $output  = "<img src=" . get_template_directory_uri() . "/images/LaguardaLow_Arrow_BlackRight.svg class='side-arrow' height='23px' width='23px'> SEE NEXT NEWS" ?>
            <?php next_post_link( '%link', $output, TRUE ); ?>        </div>
    </div>
    
    <!-- Right side with stuff for something -->
        <!-- Video -->
        <!-- Categorical projects -->
<?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
?>

<script>
    document.querySelector(".pdf-thumb").addEventListener("click", () => {
        document.querySelector(".lightbox").classList.add("visible");
    });
</script>

<?php get_footer(); ?>