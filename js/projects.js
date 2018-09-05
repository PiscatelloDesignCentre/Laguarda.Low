// Initialize and add the map
var maps = [];

function initMap() {
  // The location of Uluru
  
  var coords = {lat: parseFloat(window.coordArr[0]), lng: parseFloat(coordArr[1])}
  // The map, centered at Uluru
  document.querySelectorAll("#map").forEach( (el, i) => {
      var map = new google.maps.Map(
      el, {zoom: 16, center: coords, mapTypeId: 'satellite'});

      // The marker, positioned at Uluru
         var marker = new google.maps.Marker({
             position: coords, 
             map: map,
             styles: [
                      {
                          "elementType": "geometry",
                          "stylers": [
                          {
                              "color": "#f5f5f5"
                          }
                          ]
                      },
                      {
                          "elementType": "labels.icon",
                          "stylers": [
                          {
                              "visibility": "off"
                          }
                          ]
                      },
                      {
                          "elementType": "labels.text.fill",
                          "stylers": [
                          {
                              "color": "#616161"
                          }
                          ]
                      },
                      {
                          "elementType": "labels.text.stroke",
                          "stylers": [
                          {
                              "color": "#f5f5f5"
                          }
                          ]
                      },
                      {
                          "featureType": "administrative.land_parcel",
                          "elementType": "labels.text.fill",
                          "stylers": [
                          {
                              "color": "#bdbdbd"
                          }
                          ]
                      },
                      {
                          "featureType": "poi",
                          "elementType": "geometry",
                          "stylers": [
                          {
                              "color": "#eeeeee"
                          }
                          ]
                      },
                      {
                          "featureType": "poi",
                          "elementType": "labels.text.fill",
                          "stylers": [
                          {
                              "color": "#757575"
                          }
                          ]
                      },
                      {
                          "featureType": "poi.park",
                          "elementType": "geometry",
                          "stylers": [
                          {
                              "color": "#e5e5e5"
                          }
                          ]
                      },
                      {
                          "featureType": "poi.park",
                          "elementType": "labels.text.fill",
                          "stylers": [
                          {
                              "color": "#9e9e9e"
                          }
                          ]
                      },
                      {
                          "featureType": "road",
                          "elementType": "geometry",
                          "stylers": [
                          {
                              "color": "#ffffff"
                          }
                          ]
                      },
                      {
                          "featureType": "road.arterial",
                          "elementType": "labels.text.fill",
                          "stylers": [
                          {
                              "color": "#757575"
                          }
                          ]
                      },
                      {
                          "featureType": "road.highway",
                          "elementType": "geometry",
                          "stylers": [
                          {
                              "color": "#dadada"
                          }
                          ]
                      },
                      {
                          "featureType": "road.highway",
                          "elementType": "labels.text.fill",
                          "stylers": [
                          {
                              "color": "#616161"
                          }
                          ]
                      },
                      {
                          "featureType": "road.local",
                          "elementType": "labels.text.fill",
                          "stylers": [
                          {
                              "color": "#9e9e9e"
                          }
                          ]
                      },
                      {
                          "featureType": "transit.line",
                          "elementType": "geometry",
                          "stylers": [
                          {
                              "color": "#e5e5e5"
                          }
                          ]
                      },
                      {
                          "featureType": "transit.station",
                          "elementType": "geometry",
                          "stylers": [
                          {
                              "color": "#eeeeee"
                          }
                          ]
                      },
                      {
                          "featureType": "water",
                          "elementType": "geometry",
                          "stylers": [
                          {
                              "color": "#c9c9c9"
                          }
                          ]
                      },
                      {
                          "featureType": "water",
                          "elementType": "labels.text.fill",
                          "stylers": [
                          {
                              "color": "#9e9e9e"
                          }
                          ]
                      }
                  ]
          });
  
      maps.push(map)
  });
}
var elem = document.querySelector('.main-carousel');
var flkty = new Flickity( elem, {
  // options
  contain: false,
  setGallerySize: false,
  draggable: false,
  wrapAround: true,
  autoPlay: 5000
});

function expandFacts(e) {
  e.currentTarget.classList.toggle("closed")
}

function expandSocialMedia(e) {
  document.querySelector(".social-drop-down").classList.toggle("closed");
}

document.querySelector(".projectMeta").addEventListener("click", expandFacts);
document.querySelector(".projectShare").addEventListener("click", expandSocialMedia);

document.querySelector(".custom-prev-next-button.right").addEventListener("click", playNext)
document.querySelector(".custom-prev-next-button.left").addEventListener("click", playPrev)

function playNext(e) {
  e.stopPropagation();
  flkty.next();
}

function playPrev(e) {
  e.stopPropagation();
  flkty.previous();
}

window.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".carousel-cell-image").forEach(function(el, i) {
        el.onload = () => {
            if(el.naturalWidth >= 1920) {
                el.classList.add("wide");
            }
        }

        if(el.complete) {
            if(el.naturalWidth >= 1920) {
                el.classList.add("wide");
            }
        }
        
    });

    setTimeout( ()=> {
        document.querySelector(".slideshow-custom-wrapper").classList.add("loaded")
    }, 2000)

})