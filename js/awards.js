function preventBodyScroll(e) {
    document.body.classList.add("noscroll");
}

function slideOpen(e) {
    if(e.currentTarget.classList.contains("selected")) {
        e.currentTarget.classList.toggle("selected")
        e.currentTarget.querySelectorAll(".slide-open").forEach(function(el, i) {
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
    el.addEventListener("click", (event) => {

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
                            if(el.acf.award_description) {
                                return `<span><strong>Description</strong></span>
                                <br><br>
                                <span>
                                    ${el.acf.award_description}
                                </span>`
                            }
                            
                            else return ``;
                        })(el)
                    }
                    <br><br>
                    ${ 
                        (el => {
                            if(el.acf.project_post != false) {
                                return `<a href='${el.permalink}' onclick='return event.stopPropagation()'>View Project</a>`
                            }
                            else return ``;
                        })(el)
                    }   
                    
                </div> 
                <div class='slide-open'>
                    ${ 
                        (() => {
                            if(window.language == "中文") {
                                return `<span><strong>项目状态</strong></span><br>`
                            }
                            else return `<span><strong>Status</strong></span><br>`
                        })()
                    }
                    <span>${el.acf.award_status}</span> 
                    <br><br>
                    ${ 
                        (() => {
                            if(window.language == "中文") {
                                return `<span><strong>规模</strong></span><br>`
                            }
                            else return `<span><strong>Size</strong></span><br>`
                        })()
                    } 
                    <span>${el.acf.award_project_size}</span> 
                    <br><br>
                    ${ 
                        (() => {
                            if(window.language == "中文") {
                                return `<span><strong>业主</strong></span><br>`
                            }
                            else return `<span><strong>Client</strong></span><br>`
                        })()
                    }
                    <span>${el.acf.award_client}</span> 
                    <br></br> 
                </div> 
                <div class='slide-open'>
                    ${ 
                        (() => {
                            if(window.language == "中文") {
                                return `<span><strong>设计范围</strong></span><br>`
                            }
                            else return `<span><strong>Scope</strong></span><br>`
                        })()
                    }
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