var urlPart = {}
var categories = []
var currentlyLoading = false;
var currentPage = 1;
var loading = false;
var isPageLoaded = false;
var currentFilter = "";
var idArr = [];
var categoryComplete = false;

document.querySelectorAll(".navigation-tabs a").forEach((el, i) => {
    el.addEventListener("click", filterProjects);
});

document.querySelectorAll(".drop-down-selector a").forEach((el, i) => {
    el.addEventListener("click", filterProjects);
});

document.addEventListener("DOMContentLoaded", pageLoaded)

window.onbeforeunload = function(){ window.scrollTo(0,0); }

async function getCategories() {
    return await fetch(window.site_url + '/wp-json/wp/v2/categories?per_page=50', {
        method: "GET"
    }).then(res => {
        return res.json()
    }).catch(err => {
        throw new error(err)
    }).then(data => {
        categories = data
        return Promise.resolve(categories)
    })
}

window.addEventListener("hashchange", handleHashChange);

function handleHashChange() {
    let hashname =  location.hash.replace("#", '')
    document.querySelector(".category-name-band").innerText = hashname || "All";
}
    

async function pageLoaded() {
    // console.log(window.page_length)
    loading = true
    categories = await getCategories()
    window.categories = categories
    let filter = ""
    if(!location.hash || location.hash.length < 1) {
        applyAnimation();
        isPageLoaded = true;
        loading = false;
        return;
    }
    
    if(location.hash) {
        let catName = location.hash.replace('#','')
        let cat = filterCategoryNames(catName.toLowerCase())
        document.querySelector(".category-name-band").innerText = catName;
        currentFilter = cat.id;

        filter = "&categories=" + cat.id
        document.querySelectorAll(".navigation-tabs a").forEach((el, i) => {
            if(el.dataset.filter == cat.id) {
                el.classList.add("selected")
            }

            else {
                el.classList.remove("selected")
            }
        });
        if(cat.id == 19) {
            document.body.classList.add("noscroll")
            archivesLoaded()
            document.querySelector(".archives-overlay").classList.add("visible")
            return;
        }
    
    }
    document.querySelector(".spinner").classList.add("top-center");
    document.querySelector(".spinner").classList.remove("hidden");
    let posts = await fetch(window.site_url + "wp-json/wp/v2/posts?_embed&order=asc&categories=51&per_page=16&page=1"  + filter , {
        method: 'GET'
    }).then((res) => {
        // console.log(res.headers)
        // console.log(res)
        return res.json()
    });

    let filler = [];

    if(posts.length && posts.length < 11 || (window.page_length >= currentPage)) {
        categoryComplete = true;

        posts.forEach( (el, i) => {
            idArr.push(el.id)
        })
    

        filler = await fetch(window.site_url + "/wp-json/wp/v2/posts?_embed&order=asc&categories=51&parent=51&per_page=16&exclude="+(idArr.join(",") || -"1"), {
            method: 'GET'
        }).then((res) => {
            return res.json()
        });
        document.querySelector(".spinner").classList.remove("top-center");
        document.querySelector(".spinner").classList.add("hidden");
    
    }

    isPageLoaded = true;
    loading = false;

    posts = posts.concat(filler)

    let html = await returnProject(posts);
    
    document.querySelector(".grid-container").classList.remove("fade-out")


    document.querySelector(".grid-container").innerHTML = ""
    document.querySelector(".grid-container").innerHTML = html
    
    applyAnimation();
        
    
}

function filterCategoryNames(name) {
    let cat = categories.filter(category => category.slug == name)[0]
    // console.log(cat)
    return cat || ""
}

function applyAnimation() {
    
    var offset = 0;
    document.querySelectorAll(".project-thumb.invisible").forEach((el, i) => {
        setTimeout(() => {
            el.classList.add('animate-grid');
            el.classList.remove('invisible');
            el.classList.remove('fade-out');
        }, offset);

        offset += 200;
    })
}

const delay = ms => new Promise(resolve => setTimeout(resolve, ms));


async function fadeOutAnimation() {
    document.querySelector(".grid-container").classList.add("fade-out")
}

function shuffle(a) {
    for (let i = a.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [a[i], a[j]] = [a[j], a[i]];
    }
    return a;
}

/**
@filterProjects
returns void
Filters projects based on data-set and matching strings.
*/


async function getNewPosts(filterLabel, pageNumber = 1) {
    let filter = "&categories=" + filterLabel
    let posts = []
    loading = true;
    console.log(filterLabel)
    if(!filterLabel) { 
        filter = ""
    }
    if(!categoryComplete) {
        posts = await fetch(window.site_url + "/wp-json/wp/v2/posts?_embed&categories=51&order=asc&per_page=16&page=" + pageNumber + filter , {
            method: 'GET'
        }).then((res) => {
            if(!res.ok) {
                throw Error(res.statusText)
            }
            return res.json()
        }).catch((err) => {
            // console.log(err)
        });
    }
    

    let filler = [];

    if(posts.length && posts.length < 11 && filterLabel || (window.page_length >= pageNumber)) {
        categoryComplete = true;
        posts.forEach( (el, i) => {
            idArr.push(el.id)
        })

        filler = await fetch(window.site_url + "/wp-json/wp/v2/posts?_embed&categories=51&order=asc&per_page=16&page="+pageNumber+"&exclude="+(idArr.join(",") || -"1"), {
            method: 'GET'
        }).then((res) => {
            return res.json()
        });
    }

    loading = false;
    return posts.concat(filler) || []
}

async function filterProjects(e) {
    window.scrollTo(0,0);
    document.body.classList.remove("noscroll");
    if(e.target.classList.contains("selected")) { return }

    currentPage = 1;
    idArr = [];
    categoryComplete = false;

    loading = true;

    document.querySelectorAll(".navigation-tabs a").forEach( (el, i) => {
        el.classList.remove("selected")
    });
    
    

    e.target.classList.add("selected");
    await fadeOutAnimation()
    if(e.target.dataset.filter == 19) {
        document.body.classList.add("noscroll");
        document.querySelector(".spinner").classList.add("top-center");
        document.querySelector(".spinner").classList.remove("hidden");
        await archivesLoaded()
        document.querySelector(".archives-overlay").classList.add("visible")
        document.querySelector(".spinner").classList.remove("top-center");
        document.querySelector(".spinner").classList.add("hidden");
        return;
    }

    else   {
        document.body.classList.remove("noscroll")
        document.querySelector(".archives-overlay").classList.remove("visible")
        setTimeout(() => {
            document.querySelector(".table-contents").innerHTML = ""
        }, 500)
    }

    currentFilter = e.target.dataset.filter;
    document.querySelector(".spinner").classList.add("top-center");
    document.querySelector(".spinner").classList.remove("hidden");
    let posts = await getNewPosts(currentFilter);
    document.querySelector(".spinner").classList.add("hidden");
    document.querySelector(".spinner").classList.remove("top-center");
    let html = await returnProject(posts);
    
    document.querySelector(".grid-container").classList.remove("fade-out")


    document.querySelector(".grid-container").innerHTML = ""
    document.querySelector(".grid-container").innerHTML = html
    applyAnimation();
    loading = false;
}

    

function mapCategories(id) {
    // console.log(id)
    var index = id.indexOf(51);
    if (index !== -1) id.splice(index, 1);
    let cat = categories.filter(category => category.id == id[0])
    return cat[0] || ""
}


async function returnProject(posts = [], append = false) {
    let htmlList = ""
    await posts.forEach((post,i) => {
        let insert = 
            `<a href='${post.link}' class='project-thumb invisible'> 
                <img src='${post._embedded["wp:featuredmedia"][0].source_url}' /> 
                <div class='project-info'> 
                    <span class='project-title'> 
                        ${post.title.rendered} 
                    </span> 
                    <span class='project-location'> 
                        ${post.acf.project_city}, ${post.acf.project_country}
                    </span>
                    <span class='project-category'> 
                        ${mapCategories(post.categories).name} 
                    </span> 
                </div> 
            </a>`
        if(append) {
            document.querySelector(".project-grid .grid-container").insertAdjacentHTML('beforeend', insert)
        }
        
        else htmlList += insert
    });	

    return Promise.resolve(htmlList)
}



// Lazy Loading 



window.onscroll = async function() {
    (async function($) {

    var container = document.querySelector(".grid-container"),
        space = $(window).height() - $(".grid-container")[0].getBoundingClientRect().bottom;

    // console.log(space)
    
    if ((space > -200) && !loading && isPageLoaded && currentPage < window.page_length) {
        loading = true;
        currentPage++;
        // console.log(currentPage)
        document.querySelector(".spinner").classList.remove("hidden");
        let posts = await getNewPosts(currentFilter, currentPage);
        document.querySelector(".spinner").classList.add("hidden");
        let html = await returnProject(posts, true);

        // console.log("loading...")

        applyAnimation();
        loading = false;
    }
    
    })(jQuery)
};