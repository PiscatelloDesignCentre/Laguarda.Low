<?php get_header(); ?>
<style>
    .grid-elements.grid-elements__master-planning::before {
        background-image: url('<?php the_field('master_planning_image')?>');
    }

    .grid-elements.grid-elements__mixed-use::before {
        background-image: url('<?php the_field('mixed_use_image')?>');
    }

    .grid-elements.grid-elements__sustainability::before {
        background-image: url('<?php the_field('sustainability_image')?>');
    }

    .grid-elements.grid-elements__retail-design::before {
        background-image: url('<?php the_field('retail_design_image')?>');
    }
</style>

    <div class="grid-container-4">
        <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
        <a href="master-planning"class="grid-elements invisible grid-elements__master-planning">
            <div class="floating-label">总体规划</div>
        </a>
        <a href="mixed-use" class="grid-elements invisible grid-elements__mixed-use">
            <div class="floating-label">综合体设计</div>
        </a>
        <a href="retail-design" class="grid-elements invisible grid-elements__retail-design">
            <div class="floating-label">商业建筑</div>
        </a>
        <a href="sustainability" class="grid-elements invisible grid-elements__sustainability">
            <div class="floating-label">可持续性设计</div>
        </a>
        <?php else: ?>
        <a href="master-planning"class="grid-elements invisible grid-elements__master-planning">
            <div class="floating-label">Master Planning</div>
        </a>
        <a href="mixed-use" class="grid-elements invisible grid-elements__mixed-use">
            <div class="floating-label">Mixed Use</div>
        </a>
        <a href="retail-design" class="grid-elements invisible grid-elements__retail-design">
            <div class="floating-label">Retail Design</div>
        </a>
        <a href="sustainability" class="grid-elements invisible grid-elements__sustainability">
            <div class="floating-label">Sustainability</div>
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