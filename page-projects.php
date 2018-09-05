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

        let post = posts[ window.post_number + x];
        insert += 
        `<a href='${post.permalink}' class='project-thumb invisible'> 
            <img data-src='${post.thumbnail}' /> 
            <div class='project-info'> 
                <span class='project-title'> 
                    ${post.post_title} 
                </span> 
                <span class='project-location'> 
                    ${post.project_city}, ${post.project_country}
                </span>
                <span class='project-category'> 
                    ${post.category_names[0]} 
                </span> 
            </div> 
        </a>`
    }
    
    window.post_number += numberOfPosts;

    document.querySelector(".grid-container").insertAdjacentHTML('beforeend', insert);

    [].forEach.call(document.querySelectorAll('img[data-src]'), function(img) {
        img.setAttribute('src', img.getAttribute('data-src'));
        img.onload = function() {
            img.removeAttribute('data-src');
        };
    });

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
    changeMobileMenu(filter);

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

    if(window.is_chinese) {
        term = window.category_names[term.replace("-","")];
        console.log(term)
    }
    
    if(term == "" || !term) {
        window.posts = getOriginalPosts();
        console.log("being sorted!")
    }
    
    else if(term == "current") {
        selectedPosts = posts.filter(el => {
            if(el.is_current == true) return el;
        });

        if(selectedPosts.length > 0) {
            remainingPosts = posts.filter(el => {
                if(el.is_current == false) return el;
            });

            window.posts = selectedPosts.concat(remainingPosts)

        }
    }
    else {
        //Select All posts which match criteria
        selectedPosts = posts.filter(el => {
            if(el.category_names[0].toLowerCase().replace(/\s/g,'-') == term) return el;
        });

        selectedPosts = _.sortBy(selectedPosts, "category_order");
        
        //If matching posts, backfill with all that don't match
        if(selectedPosts.length > 0) {
            remainingPosts = posts.filter(el => {
                if(el.category_names[0].toLowerCase().replace(/\s/g,'') !== term) return el;
            });

            window.posts = selectedPosts.concat(remainingPosts)

        }
        
        //Else, just get the original posts and use all them instead
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
    let button = document.querySelector(".navigation-tabs a[href='" + window.location.hash.replace(/\s/g,'-') +"']" );
    
    navTabs.forEach(el => el.classList.remove("selected"));
    
    if(button) button.classList.add("selected");
    else navTabs[0].classList.add("selected")
}

function changeMobileMenu(filter) {
    var headerArea = document.querySelector(".category-name-band");
    if(window.is_chinese) {
        headerArea.innerHTML = window.category_names[filter.replace("-","")] || '所有';
    }
    else headerArea.innerHTML = filter.replace("-"," ") || 'All';
}

document.addEventListener("DOMContentLoaded", (event) => {
    let sorted = _.sortBy(window.posts, function(e) {return e["post_year"]});
    loadRows(sorted.reverse())
    if(window.location.hash) {
        let hash = window.location.hash.replace("#",'').replace("-","");
        if(hash == "archive") {
            showArchives();
        }
        else filterPosts(hash);
        selectButton();
    }
    else {
        window.posts = getOriginalPosts();
        addPosts(16, window.posts)
    }

    scrollAnimation();
});

</script>

<?php get_footer() ?>