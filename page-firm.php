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
    <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
        <a href="/zh-hans/firm/overview" class="grid-elements invisible grid-elements__overview">
            <div class="floating-label">公司概览</div>
        </a>
        <a href="/zh-hans/firm/leadership" class="grid-elements invisible grid-elements__leadership">
            <div class="floating-label">领导团队</div>
        </a>
        <a href="/zh-hans/firm/videos" class="grid-elements invisible grid-elements__video">
            <div class="floating-label">项目视频</div>
        </a>
        <a href="/zh-hans/firm/awards" class="grid-elements invisible grid-elements__awards">
            <div class="floating-label">奖项</div>
        </a>
        <?php else: ?>
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
        <?php endif; ?>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", applyAnimation)
    
    function applyAnimation() {
        var offset = 0;
        document.querySelectorAll(".grid-elements.invisible").forEach(function(el, i) {
            setTimeout(function() {
                el.classList.add('animate-grid');
                el.classList.remove('invisible');
                el.classList.remove('fade-out');
            }, offset);

            offset += 200;
        })
    }
    </script>
<?php get_footer(); ?>