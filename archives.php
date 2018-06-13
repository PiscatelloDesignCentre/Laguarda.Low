<div class="archives-overlay">
    <div class="table-header">
        <div class="table-row">
            <div class="table-cell">Project</div>
            <div class="table-cell">Category</div> 
            <div class="table-cell">Location</div>
            <div class="table-cell">Year</div>
        </div>
    </div>
    <div class="table-contents">
    </div>
</div>

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

    async function archivesLoaded() {
        let posts = await fetch("/wordpress/wp-json/wp/v2/posts?_embed&categories_exclude=48&per_page=16", {
            method: 'GET'
        }).then((res) => {
            return res.json()
        }).then( (json) => {
            loadRows(json)
        })
    }

    function mapCategories(id) {
        let cat = window.categories.filter(category => category.id == id)[0]
        // console.log(cat)
        return cat || ""
    }

    async function loadRows(json) {
        let html = ""
        json.forEach( (el, i) => {
            html += 
                "<div class='table-row' onclick='return slideOpen(event)'> \
                    <div class='table-cell'>"+ el.title.rendered+"</div> \
                    <div class='table-cell'>"+ mapCategories(el.categories[0]).name + "</div> \
                    <div class='table-cell'>"+ el.content.rendered.replace(/(<([^>]+)>)/ig,"") +"</div> \
                    <div class='table-cell'>2016</div> \
                    <div class='slide-open'> \
                        " + el.acf.description + " \
                    </div> \
                    <div class='slide-open'> \
                        <strong>Status</strong><br> \
                        <span>"+ el.acf.status+"</span> \
                        <br><br> \
                        <strong>Size</strong><br> \
                        <span>"+ el.acf.size+"</span> \
                        <br><br>\
                        <strong>Client</strong><br> \
                        <span>"+ el.acf.client +"</span> \
                        <br></br> \
                    </div> \
                    <div class='slide-open'> \
                        <strong>Scope</strong><br> \
                        " + el.acf.scope+ " \
                    </div> \
                    <div class='slide-open'><img src='"+ el._embedded["wp:featuredmedia"][0].source_url + "' /></div> \
                </div> "
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