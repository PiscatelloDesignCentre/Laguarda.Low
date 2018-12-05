// Add posts to the DOM via loop
// @param numberOfPosts - Integer, used for number of posts to render
window.addEventListener("hashchange", handleHashChange)

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
    document.querySelectorAll(".project-thumb.invisible").forEach(function(el, i) {
        setTimeout(function() {
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
    requestAnimationFrame(function() {
        requestAnimationFrame(function() {
            document.querySelector(".grid-container").style.display = "none"
            document.querySelector(".archives-overlay").style.display = "block"
        });
    });
}

function hideArchives() {
    fadeOutAnimation();
    requestAnimationFrame(function() {
        requestAnimationFrame(function() {
            document.querySelector(".grid-container").style.display = "flex"
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
        selectedPosts = posts.filter(function(el) {
            if(el.is_current == true) return el;
        });

        if(selectedPosts.length > 0) {
            remainingPosts = posts.filter(function(el) {
                if(el.is_current == false) return el;
            });

            window.posts = selectedPosts.concat(remainingPosts)

        }
    }
    else {
        //Select All posts which match criteria
        selectedPosts = posts.filter(function(el) {
            if(el.category_names[0].toLowerCase().replace(/\s/g,'-') == term) return el;
        });

        selectedPosts = _.sortBy(selectedPosts, "category_order");
        
        //If matching posts, backfill with all that don't match
        if(selectedPosts.length > 0) {
            remainingPosts = posts.filter(function(el) {
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
    
    navTabs.forEach(function(el) { el.classList.remove("selected") });
    
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

document.addEventListener("DOMContentLoaded", function(event) {
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

function preventBodyScroll(e) {
    document.body.classList.add("noscroll");
}

function slideOpen(e) {
    if(e.currentTarget.classList.contains("selected")) {
        e.currentTarget.classList.toggle("selected")
        e.currentTarget.querySelectorAll(".slide-open").forEach( function(el, i) {
            el.classList.remove("open")
        });
    }
    else {
        document.querySelectorAll(".table-row").forEach( function(el, i) {
            el.classList.remove("selected")
        });

        document.querySelectorAll(".slide-open").forEach( function(el, i) {
            el.classList.remove("open")
        });

        e.currentTarget.querySelectorAll(".slide-open").forEach( function(el, i) {
            el.classList.add("open")
        })

        e.currentTarget.classList.toggle("selected")
    }
}

document.querySelectorAll(".sort-header").forEach( function(el, i) {
    el.addEventListener("click", function (event) {

        document.querySelectorAll(".sort-header").forEach( function(el, i) {
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
    json.forEach( function(el, i) {
        html += 
            `<div class='table-row' onclick='return slideOpen(event)'> 
                <div class='table-cell'>${el.post_title}</div> 
                <div class='table-cell'><span class="mobile-hidden">Type:&nbsp;</span>${el.category_names[0]}</div> 
                <div class='table-cell'><span class="mobile-hidden">Location:&nbsp;</span>${el.project_city}, ${el.project_country}</div>
                <div class='table-cell'><span class="mobile-hidden">Year:&nbsp;</span>${el.post_year}</div> 
                <a href="${el.permalink}" class='slide-open mobile-hidden'><img src='${el.thumbnail}' /></a> 
                <div class='slide-open'> 
                    ${ 
                        (function(el) {
                            if(el.permalink != "") {
                                return `<a href='${el.permalink}' onclick='return event.stopPropagation()'>View Project</a>`
                            }
                        })(el)
                    }   
                    
                </div> 
                <div class='slide-open'>
                    <strong>Status</strong><br> 
                    <span>${el.status}</span> 
                    <br class="sm-hidden"><br class="sm-hidden"> 
                    <strong>Size</strong><br> 
                    <span>${el.project_area}</span> 
                    <br class="sm-hidden"><br>
                    <strong>Client</strong><br> 
                    <span>${el.client}</span> 
                    <br class="sm-hidden"><br class="sm-hidden">
                </div> 
                <div class='slide-open'> 
                    <strong>Scope</strong><br> 
                    ${el.scope } 
                </div> 
                <a href="${el.permalink}" class='slide-open sm-hidden'><img src='${el.thumbnail}' /></a> 
            </div>`
    });

    document.querySelector(".table-contents").innerHTML = html

    animateRows()
}

function animateRows() {
    let offset = 0;

    document.querySelectorAll(".table-row").forEach( function(el, i) {

        setTimeout(function() {
            el.classList.add('row-animate');
        }, offset);

        offset += 75;
        // console.log(offset)
    })
    
}
