<?php get_header(); ?> 
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
<script>
function preventBodyScroll(e) {
    document.body.classList.add("noscroll");
}

function slideOpen(e) {
    if(e.currentTarget.classList.contains("selected")) {
        e.currentTarget.classList.toggle("selected")
        e.currentTarget.querySelectorAll(".slide-open").forEach( (el, i) => {
            el.classList.remove("open")
        });
    }
    else {
        document.querySelectorAll(".table-row").forEach( (el, i) => {
            el.classList.remove("selected")
        });

        document.querySelectorAll(".slide-open").forEach( (el, i) => {
            el.classList.remove("open")
        });

        e.currentTarget.querySelectorAll(".slide-open").forEach( (el, i) => {
            el.classList.add("open")
        })

        e.currentTarget.classList.toggle("selected")
    }
}

document.querySelectorAll(".sort-header").forEach( (el, i) => {
    el.addEventListener("click", (event) => {

        document.querySelectorAll(".sort-header").forEach( (el, i) => {
            el.classList.remove("active")
        });

        event.currentTarget.classList.add("active");
        let sortKey = event.currentTarget.dataset.key;
        let direction = event.currentTarget.dataset.direction;
        let sorted = _.sortBy(window.posts, function(e) {return e[sortKey]});
        loadRows(sorted)
    });
});


async function loadRows(json) {
    let html = ""
    globalPosts = json;
    // json = _.sortBy(globalPosts, "title.rendered")

    json.forEach( (el, i) => {
        html += 
            `<div class='table-row' onclick='return slideOpen(event)'> 
                <div class='table-cell'>${el.post_title}</div> 
                <div class='table-cell'><span class="mobile-hidden">Project:&nbsp;</span>${el.title}</div> 
                <div class='table-cell'><span class="mobile-hidden">Location:&nbsp;</span>${el.city}, ${el.country}</div>
                <div class='table-cell'><span class="mobile-hidden">Year:&nbsp;</span>${el.acf.award_date}</div> 
                ${ 
                    (el => {
                        if(el.acf.project_post != false) {
                            return `<a href="${el.permalink}" class='slide-open mobile-hidden' onclick='return event.stopPropagation()'><img src='${el.acf.award_project_image.sizes.medium_large}' /></a>`
                        }
                        else return `<div class='slide-open mobile-hidden'><img src='${el.acf.award_project_image.sizes.medium_large}' /></div>`;
                    })(el)
                }    
                <div class='slide-open'> 
                    ${ 
                        (el => {
                            if(el.acf.project_post != false) {
                                return `<a href='${el.permalink}' onclick='return event.stopPropagation()'>View Project</a>`
                            }
                            else return '';
                        })(el)
                    }   
                    
                </div> 
                <div class='slide-open'>
                    <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
                    <span><strong>项目状态</strong></span><br>
                    <?php else: ?>
                    <span><strong>Status</strong></span><br>
                    <?php endif; ?>
                    <span>${el.acf.award_status}</span> 
                    <br><br> 
                    <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
                    <span><strong>规模</strong></span><br>
                    <?php else: ?>
                    <span><strong>Size</strong></span><br>
                    <?php endif; ?> 
                    <span>${el.acf.award_project_size}</span> 
                    <br><br>
                    <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
                    <span><strong>业主</strong></span><br>
                    <?php else: ?>
                    <span><strong>Client</strong></span><br>
                    <?php endif; ?>  
                    <span>${el.acf.award_client}</span> 
                    <br></br> 
                </div> 
                <div class='slide-open'> 
                    <?php if(ICL_LANGUAGE_NAME == "中文" ):?>
                    <strong>设计范围</strong><br>
                    <?php else: ?>
                    <strong>Scope</strong><br>
                    <?php endif; ?>  
                    ${el.acf.awarded_project_scope } 
                </div>
                ${ 
                    (el => {
                        if(el.acf.project_post != false) {
                            return `<a href="${el.permalink}" class='slide-open sm-hidden' onclick='return event.stopPropagation()'><img src='${el.acf.award_project_image.sizes.medium_large}' /></a>`
                        }
                        else return `<div class='slide-open sm-hidden'><img src='${el.acf.award_project_image.sizes.medium_large}' /></div>`;
                    })(el)
                }    
            </div>`
    });

    document.querySelector(".table-contents").innerHTML = html

    animateRows()
}

function animateRows() {
    let offset = 0;

    document.querySelectorAll(".table-row").forEach((el, i) => {

        setTimeout(() => {
            el.classList.add('row-animate');
        }, offset);

        offset += 75;
    })
    
}

requestAnimationFrame(function() {
    requestAnimationFrame(function() {
        console.log(window.posts)
        loadRows(window.posts);
    })
})

</script>
<?php get_footer(); ?>