<?php
/**
 * Template Name: Page template for news posts
 * Template Post Type: post
**/
?>
<?php get_header(); ?>


<?php  while ( have_posts() ) : the_post(); ?>
    <!-- Left side with info -->
    <div class="content__full-width full-height">
        <div class="left">
            <div class="page-top-left">
                <h3 class="title"><?php the_title() ?></h3>
                <h5 class="subtitle"><?php the_date() ?></h5>
            </div>
            <p><?php the_content(); ?></p>
        </div>
        <div class="right">
            <div class="page-top-left">
                <h5><button class="share-button">SHARE</button></h5>
                <h5>&nbsp</h5>
            </div>
            <div class="img-block">
                <?php $file_parts = pathinfo(get_field('attachment')); ?>
                <?php if($file_parts['extension'] == "pdf"): ?>
                    <?php $pdf_url = '[flipbook pdf="' . get_field('attachment') .'" lightbox="true" height="800px" cover="'. get_field('pdf_preview') .'"]';?>
                    <?php echo do_shortcode($pdf_url) ?>
                <?php else: ?>
                    <img src="<?php the_field('attachment')?>">
                <?php endif; ?>
            </div>
            
        </div>
        <div class="approach-nav">
            <?php next_post_link( '%link', 'See Next Leadership', TRUE ); ?>
        </div>
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