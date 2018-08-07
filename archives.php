<div class="archives-overlay">
    <div class="table-header">
        <div class="table-row">
            <div class="table-cell sort-header active" data-key="title.rendered">Project</div>
            <div class="table-cell sort-header" data-key="categories">Category</div> 
            <div class="table-cell sort-header" data-key="acf.location">Location</div>
            <div class="table-cell sort-header">Year</div>
        </div>
    </div>
    <div class="table-contents">
    </div>
</div>

<script>

    var globalPosts = [];


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
            let sorted = _.sortBy(globalPosts, sortKey);
            loadRows(sorted)
        });
    });

    async function archivesLoaded() {
        let posts = await fetch("<?php echo site_url() ?>/wp-json/wp/v2/posts?_embed&categories=7&per_page=100", {
            method: 'GET'
        }).then((res) => {
            return res.json()
        }).then( (json) => {
            loadRows(json)
        });
    }

    function mapCategories(id) {
        let cat = window.categories.filter(category => category.id == id)[0]
        // console.log(cat)
        return cat || ""
    }

    async function loadRows(json) {
        let html = ""
        globalPosts = json;
        // json = _.sortBy(globalPosts, "title.rendered")
        json.forEach( (el, i) => {
            html += 
                `<div class='table-row' onclick='return slideOpen(event)'> 
                    <div class='table-cell'>${el.title.rendered}</div> 
                    <div class='table-cell'>${mapCategories(el.categories).name }</div> 
                    <div class='table-cell'>${el.acf.location}</div>
                    <div class='table-cell'>2016</div> 
                    <div class='slide-open'> 
                        ${ 
                            (el => {
                                if(el.link != "") {
                                    return `<a href='${el.link}'>View Project</a>`
                                }
                            })(el)
                        }   
                        
                    </div> 
                    <div class='slide-open'>
                        <strong>Status</strong><br> 
                        <span>${el.acf.status[0].status_update}</span> 
                        <br><br> 
                        <strong>Size</strong><br> 
                        <span>400sqf</span> 
                        <br><br>
                        <strong>Client</strong><br> 
                        <span>${el.acf.client}</span> 
                        <br></br> 
                    </div> 
                    <div class='slide-open'> 
                        <strong>Scope</strong><br> 
                        ${el.acf.scope[0].scope_item } 
                    </div> 
                    <a href="${el.link}" class='slide-open'><img src='${el._embedded["wp:featuredmedia"][0].source_url}' /></a> 
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
            // console.log(offset)
        })
        
    }

</script>