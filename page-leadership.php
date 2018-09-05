<?php get_header(); ?> 
<div class="row-fluid">
    <div class="page-title-leadership sm-hidden">
        <h3><strong>Leadership</strong></h3>
    </div>
    <div class="grid-container">
        <!-- Leadership goes here -->
        <?php wp_reset_postdata();?>

        <?php 
        
        global $post;
        $args = array( 'posts_per_page' => -1, 'offset' => 0, 'category' => 48);
        
        $myposts = get_posts( $args );
        foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
            <a href="<?php the_permalink() ?>" class='project-thumb invisible'> 
                <img src="<?php the_field('employee_image') ?>">
                <div class='project-info'> 
                    <span class='project-title'> 
                        <?php the_title() ?><?php echo  (get_field('designation') ? sprintf(', %s', get_field('designation')): '') ?>
                    </span> 
                    <span class='project-category'> 
                        <?php the_field('formal_title')?> 
                    </span> 
                </div> 
            </a>
        <?php endforeach; ?> 
        <?php wp_reset_postdata();?>
        
    </div>
</div>
<script src="<?php echo get_template_directory_uri() ?>/lib/min/leadership.js"></script>
<?php get_footer(); ?>