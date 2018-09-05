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
<script>
// Filter Projects on hash change
// Allows for back button rendering
// Allows also for AJAX free navigation
// Improves Sped

window.addEventListener("hashchange", handleHashChange)


// Track number of posts output
window.post_number = 0;

// Add posts to the DOM via loop
// @param numberOfPosts - Integer, used for number of posts to render
async function addPosts(numberOfPosts, posts, reset = false) {

    var insert = "";
    for(let x = 0; x < numberOfPosts; x++ ) {
        
        if(reset) {
            window.post_number = 0;
            await fadeOutAnimation();
            window.scrollTo(0,0); 
            document.querySelector(".grid-container").innerHTML = "";
            document.querySelector(".grid-container").classList.remove("fade-out")
        }

        if(window.post_number + (x+1) > posts.length) {
            break;
        }

		var options = {year: 'numeric', month: 'long', day: 'numeric' };
		let post = posts[ window.post_number + x];
		var date = new Date(post.post_date.replace(/-/g, '/'));
        insert += 
        `<a href='${post.permalink}' class='project-thumb invisible'> 
            <img src='${post.thumbnail}' /> 
            <div class='project-info'> 
                <span class='project-title'> 
                    ${post.post_title} 
                </span> 
                <span class='project-location'> 
                    ${date.toLocaleDateString(date.getTimezoneOffset(), options)}
                </span>
                <span class='project-category'> 
                    ${post.category_names[0]} 
                </span> 
            </div> 
        </a>`
    }
    
    window.post_number += numberOfPosts;

    document.querySelector(".grid-container").insertAdjacentHTML('beforeend', insert);
    applyAnimation();
    
}
 
// Animate DOM elements just applied to the DOM
function applyAnimation() {
    
    var offset = 0;
    document.querySelectorAll(".project-thumb.invisible").forEach((el, i) => {
        setTimeout(() => {
            el.classList.add('animate-grid');
            el.classList.remove('invisible');
            el.classList.remove('fade-out');
        }, offset);

        offset += 200;
    });
}

// rAF cross browser usage
var scroll = window.requestAnimationFrame ||
             window.webkitRequestAnimationFrame ||
             window.mozRequestAnimationFrame ||
             window.msRequestAnimationFrame ||
             window.oRequestAnimationFrame ||
             // IE Fallback, you can even fallback to onscroll
             function(callback){ window.setTimeout(callback, 1000/60) };
        
// function run in rAF
function scrollAnimation() {

    var container = document.querySelector(".grid-container"),
        space = window.innerHeight - document.querySelector(".grid-container").getBoundingClientRect().bottom;
    if (space > 100){
        addPosts(4, window.posts)
    }

    scroll(scrollAnimation)
}

// Call the loop for the first time
scrollAnimation();


// Handle hash change, should provide native back and forward project loading
function handleHashChange() {
    selectButton();
    var filter = window.location.hash.replace("#",'');

    if(filter == "archive") {
        showArchives();
    }

    else hideArchives();

    filterPosts(filter);
}

function showArchives() {
    fadeOutAnimation();
    requestAnimationFrame(() => {
        requestAnimationFrame(() => {
            document.querySelector(".grid-container").style.display = "none"
            document.querySelector(".archives-overlay").style.display = "block"
        });
    });
}

function hideArchives() {
    fadeOutAnimation();
    requestAnimationFrame(() => {
        requestAnimationFrame(() => {
            document.querySelector(".grid-container").style.display = "grid"
            document.querySelector(".archives-overlay").style.display = "none"
        });
    });
}

function filterPosts(term) {
    let posts = window.posts;
    var selectedPosts = [];
    var remainingPosts = [];
    
    if(term == "" || !term) {
        window.posts = getOriginalPosts();
    }
    else {
        selectedPosts = posts.filter(el => {
            if(el.category_names[0].toLowerCase().replace(/\s/g,'') == term) return el;
        });

        if(selectedPosts.length > 0) {
            remainingPosts = posts.filter(el => {
                if(el.category_names[0].toLowerCase().replace(/\s/g,'') !== term) return el;
            });

            window.posts = selectedPosts.concat(remainingPosts)

        }

        else {
            window.posts = getOriginalPosts();
        }
        
        
    } 
    
    addPosts(16, window.posts, true)
} 

// Get original array from JSON

function getOriginalPosts() {
    return JSON.parse(JSON.stringify(window.posts_original));
}

// Fadeout Anim

async function fadeOutAnimation() {
    document.querySelector(".grid-container").classList.add("fade-out")
}

function selectButton() {
    var navTabs = document.querySelectorAll(".navigation-tabs a");
    let button = document.querySelector(".navigation-tabs a[href='" + window.location.hash.replace(/\s/g,'') +"']" );
    
    navTabs.forEach(el => el.classList.remove("selected"));
    
    if(button) button.classList.add("selected");
    else navTabs[0].classList.add("selected")
}

document.addEventListener("DOMContentLoaded", (event) => {
    if(window.location.hash) {
        let hash = window.location.hash.replace("#",'');
        if(hash == "archive") {
            showArchives();
        }
        else filterPosts(hash);
        selectButton();
    }
    else addPosts(16, window.posts)
    scrollAnimation();
});

</script>

<?php get_footer() ?>