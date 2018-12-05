// document.addEventListener("DOMContentLoaded", ready);

//     function ready() {
//         let templates = document.querySelectorAll(".video-template").forEach((el, i) => {
//             el.insertAdjacentHTML('afterend', getMarkup(el.dataset.videoUrl, el.dataset.videoPoster))
//         });

//         let videos = document.querySelectorAll(".video-container");



//         videos.forEach(async (video, index) => {
//             var playButton = video.querySelector(".play-pause");
//             var seekBar = video.querySelector(".seek-bar");
//             var timePassed = video.querySelector(".time-passed");
//             var timeDuration = video.querySelector(".time-left");
//             var bigButton = video.querySelector(".button");
//             var fullScreen = video.querySelector(".full-screen");
//             var volControl = video.querySelector("input[type=range]");

//             bigButton.addEventListener("click", ()=> {
//                 video.querySelector(".video-container-overlay").classList.toggle("hidden");
//                 video.querySelector(".video-controls").classList.toggle("hidden");
//                 video.querySelector(".video").play();
//                 playButton.classList.add("paused");
//             });

//             volControl.addEventListener("change", (e)=> {
//                 console.log(e.currentTarget.value)
//                 video.querySelector(".video").volume = e.currentTarget.value / 100;
//             });

//             playButton.addEventListener("click", function() {
//                 if (video.querySelector(".video").paused == true) {
//                     // Play the video
//                     video.querySelector(".video").play();
//                 } else {
//                     // Pause the video
//                     video.querySelector(".video").pause();
//                 }

//                 playButton.classList.toggle("paused");
//             });

//             seekBar.addEventListener("change", function() {
//                 // Calculate the new time
//                 var time = video.querySelector(".video").duration * (seekBar.value / 100);

//                 // Update the video time
//                 video.querySelector(".video").currentTime = time;
//             });

//             // Update the seek bar as the video plays
//             video.querySelector(".video").addEventListener("timeupdate", function() {
//                 // Calculate the slider value
//                 let value = (100 / video.querySelector(".video").duration) * video.querySelector(".video").currentTime;
//                 let time = video.querySelector(".video").currentTime
//                 let duration = video.querySelector(".video").duration

//                 var minutes = Math.floor(time / 60);   
//                 var seconds = Math.floor(time).toString();

//                 var duration_minutes = Math.floor(duration / 60)
//                 var duration_seconds = Math.floor(duration).toString()

//                 seconds = seconds.length < 2 ? `0${seconds}` : seconds
//                 duration_seconds = duration_seconds.length < 2 ? `0${duration_seconds}` : duration_seconds

//                 timePassed.innerText = `${minutes}:${seconds}`
//                 timeDuration.innerText = `${duration_minutes}:${duration_seconds}`
//                 // Update the slider value
//                 seekBar.value = value;
                
//             });

//             video.querySelector(".video").addEventListener("ended", ()=> {
//                 video.querySelector(".video-container-overlay").classList.toggle("hidden");
//                 video.querySelector(".video-controls").classList.toggle("hidden");
//                 playButton.classList.remove("paused");
//             })

//             // Pause the video when the slider handle is being dragged
//             seekBar.addEventListener("mousedown", function() {
//                 video.querySelector(".video").pause();
//             });

//             // Play the video when the slider handle is dropped
//             seekBar.addEventListener("mouseup", function() {
//                 video.querySelector(".video").play();
//                 playButton.classList.add("paused");
//             });

//             fullScreen.addEventListener("click", ()=> {
//                 elem = video.querySelector(".video");
//                 if (elem.requestFullscreen) {
//                     elem.requestFullscreen();
//                 }
//                 else if (elem.mozRequestFullScreen) {
//                     elem.mozRequestFullScreen();
//                 }
//                 else if (elem.webkitRequestFullScreen) {
//                     elem.webkitRequestFullScreen();
//                 }
//                 else if (elem.msRequestFullscreen) {
//                     elem.msRequestFullscreen();
//                 }
//             });
//         });

//         async function setup(video) {
//             console.log(video)
//         }

//         function getMarkup(url, poster) {
//             return `<div class="video-container">
//                         <video class="video" playsinline webkit-playsinline poster="${poster || ""}">
//                             <source src="${url}" type="video/mp4">
//                             Your browser does not support HTML5 video.
//                         </video>
//                         <div class="video-container-overlay">
//                             <div class="button">Play Video</div>
//                         </div>
//                         <div class="video-controls hidden">
//                             <button type="button" class="play-pause"></button>
//                             <span class="time-passed">0:00</span>
//                             <progress class="seek-bar" max="100" value="0"></progress>
//                             <span class="time-left">0:00</span>
//                             <button class="full-screen"></button>
//                             <div class="volume-control">
//                                 <button class="volume"></button>
//                                 <div class="range-container">
//                                     <input type="range" min=0 max=100>
//                                 </div>
//                             </div>
//                         </div>
//                     </div>`;
//         }
    
//     }


document.addEventListener("DOMContentLoaded", ready);

function ready() {
    let templates = document.querySelectorAll(".video-template").forEach((el, i) => {
        el.insertAdjacentHTML('afterend', getMarkup(el.dataset.videoUrl, el.dataset.videoPoster, el.dataset.videoTitle))
    });
}

function getMarkup(url, poster, title = "") {
    return `<div class="video-container">
                <video class="video-js vjs-default-skin vjs-16-9 vjs-big-play-centered" playsinline webkit-playsinline controls preload="auto" poster="${poster || ""}" data-setup='{"fluid": true}'>
                    <source src="${url}" type="video/mp4">
                    <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video>
                <h2>${title}</h2>
            </div>`
}