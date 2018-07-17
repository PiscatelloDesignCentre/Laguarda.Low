<?php get_header(); ?> 
<div class="row-fluid project-grid padding-t-60">
    <div class="page-title-leadership">
        <h3><strong>Leadership</strong></h3>
    </div>
    <div class="grid-container">
        <!-- Leadership goes here -->
        <?php query_posts('category_name=employee&posts_per_page=20'); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
        <?php endwhile; endif; ?>
    </div>
</div>
<script>
    window.onload = applyAnimation;
    function applyAnimation() {
        var offset = 0;
        document.querySelectorAll(".project-thumb.invisible").forEach((el, i) => {
            setTimeout(() => {
                el.classList.add('animate-grid');
                el.classList.remove('invisible');
                el.classList.remove('fade-out');
            }, offset);

            offset += 200;
        })
    }
    </script>
<?php get_footer(); ?>