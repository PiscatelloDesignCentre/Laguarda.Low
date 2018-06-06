<?php get_header(); ?>
<div class="row-fluid slider-wrapper theme-laguardalowSlider singleProjectSlider loaded" id="check">
	<div id="slider" class="nivoSlider">
		<img src="http://localhost:8888/wordpress/wp-content/uploads/2018/05/LLA_Homepage1.jpg" alt="" title="#htmlcaption"/>
		<img src="http://localhost:8888/wordpress/wp-content/uploads/2018/05/LLA_Homepage2.jpg" alt="" title="#htmlcaption"/>
		<img src="http://localhost:8888/wordpress/wp-content/uploads/2018/05/LLA_Homepage3.jpg" alt="" title="#htmlcaption"/>
		<img src="http://localhost:8888/wordpress/wp-content/uploads/2018/05/LLA_Homepage4.jpg" alt="" title="#htmlcaption"/>
		<img src="http://localhost:8888/wordpress/wp-content/uploads/2018/05/LLA_Homepage3.jpg" alt="" title="#htmlcaption"/>
		<img src="http://localhost:8888/wordpress/wp-content/uploads/2018/05/LLA_Homepage2.jpg" alt="" title="#htmlcaption"/>
	</div>
	<div id="htmlcaption" class="nivo-html-caption">
		<p><span class="projectName">OCT Bay</span> </br> <span class="projectCategory">Mixed Use</span></p>
	</div>
	<div class="downArrow">
		<a href="#wrapper">
		</a>
	</div>
</div>
<div class="row-fluid" id="wrapper">
	<div class="projectContent">
		<div class="row-fluid projectTitleHeader">
			<div class="projectTitle">
				<h3>OCT Bay</h3>
				<p>Mixed Use</p>
			</div>
			<div class="mapAndShare">
				<div class="projectMap">
					<a>View Map</a>
				</div>
				<div class="projectShare">
					<a>Share</a>
				</div>
				<div style="clear:both;"></div> 
			</div>
			<div style="clear:both;"></div> 
		</div>
		<div class="row-fluid projectDescription">
			<p>Overlooking Shenzhen Bay, OCT Bay is a unique shopping and entertainment development with a diverse range of retail shops, restaurants, hotels and entertainment facilities. The site is divided into two distinct lakefront experiences; the O’Plaza Mall and Marriott Hotel to the north; and the boutique Bay Breeze Hotel, restaurant village and IMAX theater to the east. The open-air waterfront is inspired by the traditional fishing villages of Shenzhen, with canals and shopping streets animating the development. <br><br>From the initial Master Plan sketch, to the design of the individual buildings, OCT Bay was designed to create an engaging visitor experience. Innovative forms, integrating lighting, landscaped elements, and interactive installations create a sense of discovery for people of all ages and ensure that no two visits are exactly the same.</p>
		</div>
		<div class="row-fluid projectMeta">
			<div class="leftMeta">
				<p><strong>Location</strong></p>
				<p>Shenzhen, China</p>
				<br>
				<p><strong>Area</strong></p>
				<p>300,000m2</p>
				<br>
				<p><strong>Scope</strong></p>
				<p>Master Plan Design and Master Architect for all commercial buildings; Interior Design of O’Plaza Mall</p>
				<br>
				<p><strong>Collaborators</strong></p>
				<p>SWA Group (Landscape Design)</p>
				<br>
				<p><strong>Client</strong></p>
				<p>OCT Group</p>
			</div>
			<div class="rightMeta">
				<p><strong>Status</strong></p>
				<p>Phase 1 Completed 2011</p>
				<p>Phase 2 Completed 2015</p>
				<br>
				<p><strong>Program</strong></p>
				<p>Mixed-use retail and entertainment development on Shenzhen Bay including:</p>
				<br>
				<p><strong><a href="">57 Room Luxury Bay Breeze Hotel</a></strong></p>
				<br>
				<p><strong><a href="">Food and Beverage “Village”</a></strong></p>
				<br>
				<p><strong><a href="">O’Plaza Mall</a></strong></p>
				<br>
				<p><strong><a href="">Mariot Executive Apartments</a></strong></p>
				<br>
				<p><strong><a href="">IMAX Theater</a></strong></p>
			</div>
			<div style="clear:both;"></div> 
		</div>
		<div class="backToCategory">
			<a href="http://localhost:8888/wordpress/projects/#mixeduse">
				<div id="backButton"></div>
				<div id="backToText"><p>BACK TO MIXED USE</p></div>
			</a>
		</div>
	</div>
	<div class="relatedProjectsContent active">
		<div class="row-fluid relatedProjectsHeader">
			<h3>Related Mixed Use Projects</h3>
			<p> &nbsp; </p>
		</div>
		<div class="container relatedProjectsTiles">
		  <?php echo do_shortcode( '[the-post-grid id="195" title="mixedUseProjectsGrid"]' ); ?>
		</div>
	</div>
	<div class="mapContent">
		<!-- Code for generating a map -->
		<div id="map"></div>
	</div>
	<div class="shareProjectContent">
		<div class="row-fluid shareProjectTitle">
			<h3>Share This project</h3>
			<!-- <p> &nbsp; </p> -->
			<div class="closeButton">
				<a></a>
			</div>
		</div>
		<div class="shareProjectIcons">
			<ul class="shareLinks">
				<li id="shareOnFacebook">
					<a href="">Facebook</a>
				</li>
				<li id="shareOnLinkedIn">
					<a href="">LinkedIn</a>
				</li>
				<li id="shareOnPintrest">
					<a href="">Pintrest</a>
				</li>
				<li id="shareOnInstagram">
					<a href="">Instagram</a>
				</li>
			</ul>
		  
		</div>
	</div>
	<div style="clear:both;"></div> 
</div>

<!-- Script for Map -->
<script>
  // Initialize and add the map
  function initMap() {
    // The location of Uluru
    var octBay = {lat: 22.527588, lng: 113.993261};
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 13, center: octBay, mapTypeId: 'satellite'});
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({position: octBay, map: map});
  }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJY5t-tXrIskhm6OZmUp0DnSytAlCwavA&callback=initMap"></script>

<?php get_footer(); ?>