<?php
/**
 * The template for displaying search results pages.
 *
 * @package stackstar.
 */

get_header(); ?>
        <div class="row-fluid full-height" style="min-height: 100vh">
        <?php if ( have_posts() ) : ?>
            <div class="row-fluid padding-t-60">
                <div class="page-title-video">
                    <h3><strong><?php printf( esc_html__( 'Search results for "%s"', stackstar ), '<span>' . get_search_query() . '</span>' ); ?></strong></h3>
                </div>
            </div>
            <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
              
                <a href="<?php the_permalink(); ?>" class="result">
                    <span class="project-title"><?php the_title(); ?></span>
                    <span class="project-cat"><?php echo get_the_category()[0]->cat_name ?></span>
                </a>

            <?php endwhile; ?>

            <?php //the_posts_navigation(); ?>

            <?php else : ?>

            <div class="row-fluid padding-t-60">
                <div class="page-title-video">
                    <h3><strong>No results.</strong></h3>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <script>
            window.onload = animateRows;
            function animateRows() {
                let offset = 0;
                document.querySelectorAll(".result").forEach((el, i) => {

                    setTimeout(() => {
                        el.classList.add('row-animate');
                    }, offset);

                    offset += 75;
                    // console.log(offset)
                })
            }
        </script>
<?php get_footer(); ?>