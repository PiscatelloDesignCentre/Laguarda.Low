<?php get_header() ?>
<style>
    .grid-elements.grid-elements__overview::before  {
        background-image: url(<?php echo get_field('overview_image') ?>);
    }

    .grid-elements.grid-elements__leadership::before  {
        background-image: url(<?php echo get_field('leadership_image') ?>);
    }

    .grid-elements.grid-elements__video::before  {
        background-image: url(<?php echo get_field('videos_image') ?>);
    }

    .grid-elements.grid-elements__awards::before  {
        background-image: url(<?php echo get_field('awards_image') ?>);
    }
</style>
    <div class="grid-container-4">
        <a href="overview" class="grid-elements invisible grid-elements__overview">
            <div class="floating-label">Overview</div>
        </a>
        <a href="leadership" class="grid-elements invisible grid-elements__leadership">
            <div class="floating-label">Leadership</div>
        </a>
        <a href="videos" class="grid-elements invisible grid-elements__video">
            <div class="floating-label">Videos</div>
        </a>
        <a href="awards" class="grid-elements invisible grid-elements__awards">
            <div class="floating-label">Awards</div>
        </a>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", applyAnimation)
    
    function applyAnimation() {
        var offset = 0;
        document.querySelectorAll(".grid-elements.invisible").forEach((el, i) => {
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