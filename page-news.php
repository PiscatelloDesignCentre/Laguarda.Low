<?php get_header(); ?> 
<?php

$args = array( 'posts_per_page' => -1, 'offset' => 0, 'category' => 51);
$posts = get_posts( $args );
    foreach($posts as $post) {
        $post->acf = get_fields($post->ID);
        $post->category_ids= wp_get_post_categories($post->ID);
        $post->category_names = [];
        $post->post_year = $post->acf["project_year"];
		$post->post_country = trim($post->acf["project_country"]);
        foreach($post->category_ids as $cat_id) {
            $cat_name = get_cat_name($cat_id);
			if($cat_name == "Current") { $post->is_current = true; }
            if(trim($cat_name) !== "News" && trim($cat_name)  !== "Current") {
                array_push($post->category_names, $cat_name);
            }
        }
        $post->permalink = get_permalink($post->ID);
        $post->thumbnail = get_the_post_thumbnail_url($post->ID);
    }
$post_json = json_encode($posts);

?>
<script>window.posts = <?php echo $post_json ?> || "";</script>
<script>window.posts_original = <?php echo $post_json ?> || "";</script>
<script>console.log(window.posts)</script>
	<div class="row-fluid project-grid">
		<div class="grid-container">
		</div>

		<div class="spinner hidden">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
		</div>
	</div>
<script>
    window.site_url = "<?php echo site_url() ?>/" || "";
</script>
<script src="<?php echo get_template_directory_uri()?>/lib/min/news.js"></script>

<?php get_footer() ?>