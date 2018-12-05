<?php get_header(); ?> 
<?php

$args = array( 'posts_per_page' => -1, 'offset' => 0, 'category' => 7, 'suppress_filters' => true);
$posts = get_posts( $args );

foreach($posts as $post) {
    // $post->acf = get_fields($post->ID);
    setup_postdata( $post );
    $post->category_ids= wp_get_post_categories($post->ID);
    $post->category_names = [];
    $post->post_year = get_field("project_year");
    $post->project_country = trim(get_field("project_country"));
    $post->project_city = trim(get_field("project_city"));
    $post->status = trim(get_field("status"));
    $post->scope = trim(get_field("scope"));
    $post->project_city = trim(get_field("project_city"));
    $post->project_area = trim(get_field("project_area"));
    $post->client = trim(get_field("client"));
    $post->is_current = false;
    if(ICL_LANGUAGE_NAME == "中文" ) {
        $default_lang_id = icl_object_id( $post->ID, 'post', false, 'en' );
        $post->overall_order = (int)get_post_meta( $default_lang_id, 'overall_order', true );
        $post->category_order = (int)get_post_meta( $default_lang_id, 'category_order', true );
    }

    else {
        $post->overall_order = (int)get_field("overall_order");
        $post->category_order = (int)get_field("category_order");
    }
    // 
    if ($post->overall_order == 0) $post->overall_order = count($posts);
    if ($post->category_order == 0) $post->category_order = count($posts);


    foreach($post->category_ids as $cat_id) {
        $cat_name = get_cat_name($cat_id);
        if($cat_name == "Current") {
            $post->is_current = true;
        }
        if(trim($cat_name) !== "Projects" && trim($cat_name)  !== "Current") {
            array_push($post->category_names, $cat_name);
        }
    }
    $post->permalink = get_permalink($post->ID);
    $post->thumbnail = get_the_post_thumbnail_url($post->ID);
}
wp_reset_postdata();

$post_json = json_encode($posts);

?>
<script>window.posts = <?php echo $post_json ?> || "";</script>
<script>window.posts_original = <?php echo $post_json ?> || "";</script>
<script>

<?php if(ICL_LANGUAGE_NAME == "中文" ):?>
window.is_chinese = true || "";
<?php else: ?>
window.is_chinese = false || "";
<?php endif; ?>

window.category_names = {
        "current" : "最新项目",
        "planning" : "总体规划",
        "mixeduse" : "综合体",
        "retail" : "商业建筑",
        "transit" : "交通运输",
        "office" : "办公楼",
        "residential" : "住宅",
        "hospitality" : "酒店",
        "renovation" : "建筑改造",
        "public"  : "公共建筑",
        "archive" : "项目列表",
 } || ""

</script>
<script>console.log(window.posts)</script>
	<div class="row-fluid project-grid">
		<div class="grid-container">
		</div>

		<div class="spinner hidden">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
		</div>
		<?php include "archives.php" ?>
	</div>
<script>
    window.site_url = "<?php echo site_url() ?>/" || "";
</script>
<script>
// Filter Projects on hash change
// Allows for back button rendering
// Allows also for AJAX free navigation
// Improves Sped


// Track number of posts output
window.post_number = 0;
</script>
<script src="<?php echo get_template_directory_uri() ?>/lib/min/project-grid.js"></script>

<?php get_footer() ?>