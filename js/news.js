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
            document.querySelector(".grid-container").style.display = "flex"
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