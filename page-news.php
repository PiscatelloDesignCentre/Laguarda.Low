<?php get_header(); ?>
	<nav class="row-fluid project-nav">
		<ul class="navigation-tabs">
			<a data-filter="" class="selected">
				ALL NEWS
			</a>
			<?php
				$args = array(
					"hide_empty" => 0,
					"type"      => "post",      
					"orderby"   => "name",
					"order"     => "ASC",
					'parent'  => 51
				);

  				$cats = get_categories($args);
				
				foreach ( $cats as $cat ) { ?>
					<?php if($cat->slug !== "projects") { ?>
					<a data-filter="<?php echo $cat->term_id ?>" href="#<?php echo str_replace("-", " ", $cat->slug) ?>">
						<?php echo $cat->cat_name ?>
					</a>
					<?php } ?>  
				<?php } ?>

		</ul>
	</nav> 
	<div class="row-fluid project-grid">
		<div class="grid-container">
			<!-- Projects go here -->
		</div>
		<?php include "archives.php" ?>
	</div>
	<script>

		var categories = []
		var currentlyLoading = false;

		document.querySelectorAll(".navigation-tabs a").forEach((el, i) => {
			el.addEventListener("click", filterProjects);
		});

		document.addEventListener("DOMContentLoaded", pageLoaded)

		async function getCategories() {
			return await fetch('/wordpress/wp-json/wp/v2/categories?per_page=50', {
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

		async function pageLoaded() {

			categories = await getCategories()
			window.categories = categories
			let filter = ""
			let idArr = []
			if(location.hash) {
				let catName = location.hash.replace('#','')
				let cat = filterCategoryNames(catName.toLowerCase())

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

			let posts = await fetch("/wordpress/wp-json/wp/v2/posts?_embed&categories=51&parent=51&type=page&per_page=16"  + filter , {
				method: 'GET'
			}).then((res) => {
				return res.json()
			});

            let filler = []

			if(posts.length) {
				posts.forEach( (el, i) => {
					idArr.push(el.id)
				})

                filler = await fetch("/wordpress/wp-json/wp/v2/posts?_embed&categories=51&parent=51&type=page&per_page=16&exclude="+idArr.join(","), {
                    method: 'GET'
                }).then((res) => {
                    return res.json()
                });
            }
			
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
			document.querySelectorAll(".project-thumb").forEach((el, i) => {
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
	

		async function getNewPosts(e) {
			let idArr = [];
			let filter = "&categories=" + e.target.dataset.filter
			
			if(!e.target.dataset.filter) { 
				filter = ""
			}

			let posts = await fetch("/wordpress/wp-json/wp/v2/posts?_embed&categories=51&per_page=16"  + filter , {
				method: 'GET'
			}).then((res) => {
				return res.json()
			});

            let filler = []

			if(posts.length) {
				posts.forEach( (el, i) => {
					idArr.push(el.id)
				})

                filler = await fetch("/wordpress/wp-json/wp/v2/posts?_embed&categories=51&per_page=16&exclude="+idArr.join(","), {
                    method: 'GET'
                }).then((res) => {
                    return res.json()
                });
            }
			return posts.concat(filler)
		}

		async function filterProjects(e) {
			if(e.target.classList.contains("selected")) { return }

			document.querySelectorAll(".navigation-tabs a").forEach( (el, i) => {
				el.classList.remove("selected")
			});

			

			e.target.classList.add("selected");
			await fadeOutAnimation()

			if(e.target.dataset.filter == 19) {
				document.body.classList.add("noscroll");
				archivesLoaded()
				document.querySelector(".archives-overlay").classList.add("visible")
				return;
			}

			else   {
				document.body.classList.remove("noscroll")
				document.querySelector(".archives-overlay").classList.remove("visible")
				setTimeout(() => {
					document.querySelector(".table-contents").innerHTML = ""
				}, 500)
			}

			let posts = await getNewPosts(e);
			let html = await returnProject(posts);
			
			document.querySelector(".grid-container").classList.remove("fade-out")


			document.querySelector(".grid-container").innerHTML = ""
			document.querySelector(".grid-container").innerHTML = html
			applyAnimation();
		}

			

		function mapCategories(id) {
			console.log(id)
			var index = id.indexOf(7);
			if (index !== -1) id.splice(index, 1);
			let cat = categories.filter(category => category.id == id[0])
			return cat[0] || ""
		}

		async function returnProject(posts = []) {
            let htmlList = ""
            var options = {year: 'numeric', month: 'long', day: 'numeric' };

			await posts.forEach((post,i) => {
				let insert = 
					"<a href='"+ post.link + "' class='project-thumb invisible'> \
						<img src='"+ (post._embedded["wp:featuredmedia"][0].source_url) + "' /> \
						<div class='project-info'> \
							<span class='project-title'> \
								 " + new Date(post.date).toLocaleDateString('en-us', options) + " \
							</span> \
							<span class='project-location'> \
								" + post.title.rendered.replace(/(<([^>]+)>)/ig,"") + " \
							</span> \
							<span class='project-category'> \
								" + mapCategories(post.categories).name + " \
							</span> \
						</div> \
					</a>"
				
				htmlList += insert
			});	

			return Promise.resolve(htmlList)
		}
	</script>

<?php get_footer(); ?>