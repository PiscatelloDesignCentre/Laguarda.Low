<?php get_header(); ?>
    <div class="grid-container-4">
        <a href="master-planning"class="grid-elements invisible grid-elements__master-planning">
            <div class="floating-label">Master Planning</div>
        </a>
        <a href="mixed-use" class="grid-elements invisible grid-elements__mixed-use">
            <div class="floating-label"> Mixed Use</div>
        </a>
        <a href="retail-design" class="grid-elements invisible grid-elements__retail-design">
            <div class="floating-label">Retail Design</div>
        </a>
        <a href="sustainability" class="grid-elements invisible grid-elements__sustainability">
            <div class="floating-label">Sustainability</div>
        </a>
    </div>
    <script>
    window.onload = applyAnimation;
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