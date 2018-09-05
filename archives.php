<div class="archives-overlay">
    <div class="table-header">
        <div class="table-row">
            <div class="table-cell sort-header" data-key="post_title">Project</div>
            <div class="table-cell sort-header" data-key="category_names">Category</div> 
            <div class="table-cell sort-header" data-key="post_country">Location</div>
            <div class="table-cell sort-header active" data-key="post_year">Year</div>
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
                    <div class='table-cell'><span class="mobile-hidden">Type:&nbsp;</span>${el.category_names[0]}</div> 
                    <div class='table-cell'><span class="mobile-hidden">Location:&nbsp;</span>${el.project_city}, ${el.project_country}</div>
                    <div class='table-cell'><span class="mobile-hidden">Year:&nbsp;</span>${el.post_year}</div> 
                    <a href="${el.permalink}" class='slide-open mobile-hidden'><img src='${el.thumbnail}' /></a> 
                    <div class='slide-open'> 
                        ${ 
                            (el => {
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

        document.querySelectorAll(".table-row").forEach((el, i) => {

            setTimeout(() => {
                el.classList.add('row-animate');
            }, offset);

            offset += 75;
            // console.log(offset)
        })
        
    }

</script>