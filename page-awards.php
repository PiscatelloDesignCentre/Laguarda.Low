<?php get_header(); ?> 
<script>
    window.language = "<?php echo ICL_LANGUAGE_NAME ?>"
</script>
<div class="row-fluid project-grid">
    <div class="page-title-video sm-hidden">
        <h3><strong>Awards</strong></h3>
    </div>
    <div class="archives-overlay visible awards">
        <div class="table-header">
            <div class="table-row">
                <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
                <div class="table-cell sort-header active" data-key="post_title">奖项</div>
                <div class="table-cell sort-header" data-key="title">项目</div> 
                <div class="table-cell sort-header" data-key="country">地区</div>
                <div class="table-cell sort-header" data-key="acf.award_date">获奖年份</div>
                <?php else: ?>
                <div class="table-cell sort-header active" data-key="post_title">Award</div>
                <div class="table-cell sort-header" data-key="title">Project</div> 
                <div class="table-cell sort-header" data-key="country">Location</div>
                <div class="table-cell sort-header" data-key="acf.award_date">Year</div>
                <?php endif; ?>
            </div>
        </div>
        <div class="table-contents">
        </div>
    </div>
</div>

<?php

$args = array( 'posts_per_page' => -1, 'offset' => 0, 'category' => 50);
$posts = get_posts( $args );
    foreach($posts as $post) {
        $post->acf = get_fields($post->ID);
        $post->project_permalink = get_the_permalink( $post->acf["ID"]);
        $awardProjectId = $post->acf["project_post"]->ID;
        $post->post_meta = get_fields($awardProjectId);
        
        if ($post->acf["project_post"]->post_title) {
            $post->title = $post->acf["project_post"]->post_title;
        }
        else {
            $post->title = $post->acf["project_title"];
        }


        if(!$post->acf["award_project_city"]) {
            $post->city = $post->post_meta["project_city"];
            $post->country = $post->post_meta["project_country"]; 
            $post->permalink = get_the_permalink($post->acf["project_post"]->ID);
        }
        else {
            $post->city = $post->acf["award_project_city"];
            $post->country = $post->acf["award_project_country"]; 
        }
        foreach($post->category_ids as $cat_id) {
            $cat_name = get_cat_name($cat_id);

            if(trim($cat_name) !== "Projects" && trim($cat_name)  !== "Current") {
                array_push($post->category_names, $cat_name);
            }
        }
    }
$post_json = json_encode($posts);

?>
<script>window.posts = <?php echo $post_json ?> || "";</script>
<script>window.posts_original = <?php echo $post_json ?> || "";</script>
<script src="<?php echo get_template_directory_uri() ?>/lib/min/awards.js"></script>
<?php get_footer(); ?>