<?php get_header(); ?> 
<div class="row-fluid padding-t-60">
    <div class="page-title-video">
        <h3><strong>Awards</strong></h3>
    </div>
</div>
<div class="archives-overlay visible awards">
    <div class="table-header">
        <div class="table-row">
            <div class="table-cell sort-header active" data-key="title.rendered">Award</div>
            <div class="table-cell sort-header" data-key="project_post.post_title">Project</div> 
            <div class="table-cell sort-header">Location</div>
            <div class="table-cell sort-header">Year</div>
        </div>
    </div>
    <div class="table-contents">
    </div>
</div>

<script>

    var globalPosts = []

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
        let posts = await fetch("<?php echo site_url() ?>/wp-json/wp/v2/posts?_embed&categories=50&per_page=100", {
            method: 'GET'
        }).then((res) => {
            return res.json()
        }).then( (json) => {
            loadRows(json)
        })
    }

    async function loadRows(json) {
        let html = ""
        globalPosts = json;
        json.forEach( (el, i) => {
            html += 
                `<div class='table-row' onclick='return slideOpen(event)'> 
                    <div class='table-cell'>${el.title.rendered}</div> 
                    <div class='table-cell'>${el.project_post.post_title}</div> 
                    <div class='table-cell'>${el.content.rendered.replace(/(<([^>]+)>)/ig,"")}</div> 
                    <div class='table-cell'>2016</div> 
                    <div class='slide-open'> 
                        <a href='${el.link}'>View Project</a>
                    </div> 
                    <div class='slide-open'> 
                        <strong>Status</strong><br> 
                        <span>${el.acf.award_status}</span> 
                        <br><br> 
                        <strong>Size</strong><br> 
                        <span>${el.acf.awarded_project_size}</span> 
                        <br><br>
                        <strong>Client</strong><br> 
                        <span>${el.acf.award_client}</span> 
                        <br></br> 
                    </div> 
                    <div class='slide-open'> 
                        <strong>Scope</strong><br> 
                        ${el.acf.awarded_project_scope}
                    </div> \
                    <div class='slide-open'><img src="${el.acf.award_project_image.url}" /></div> 
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

    archivesLoaded()

</script>
<?php get_footer(); ?>