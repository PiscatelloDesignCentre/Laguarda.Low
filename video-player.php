<script>
    window.onload = () => {
        let videos = document.querySelectorAll(".video-container");
        videos.forEach((video, index) => {
            var playButton = video.querySelector(".play-pause");
            var seekBar = video.querySelector(".seek-bar");
            var timePassed = video.querySelector(".time-passed");
            var timeDuration = video.querySelector(".time-left");
            var bigButton = video.querySelector(".button");
            var fullScreen = video.querySelector(".full-screen");
            var volControl = video.querySelector("input[type=range]");

            bigButton.addEventListener("click", ()=> {
                video.querySelector(".video-container-overlay").classList.toggle("hidden");
                video.querySelector(".video-controls").classList.toggle("hidden");
                video.querySelector(".video").play();
                playButton.classList.add("paused");
            });

            volControl.addEventListener("change", (e)=> {
                console.log(e.currentTarget.value)
                video.querySelector(".video").volume = e.currentTarget.value / 100;
            });

            playButton.addEventListener("click", function() {
                if (video.querySelector(".video").paused == true) {
                    // Play the video
                    video.querySelector(".video").play();

                    // Update the button text to 'Pause'
                    // playButton.innerHTML = "Pause";
                } else {
                    // Pause the video
                    video.querySelector(".video").pause();

                    // Update the button text to 'Play'
                    // playButton.innerHTML = "Play";
                }

                playButton.classList.toggle("paused");
            });

            seekBar.addEventListener("change", function() {
                // Calculate the new time
                var time = video.querySelector(".video").duration * (seekBar.value / 100);

                // Update the video time
                video.querySelector(".video").currentTime = time;
            });

            // Update the seek bar as the video plays
            video.querySelector(".video").addEventListener("timeupdate", function() {
                // Calculate the slider value
                let value = (100 / video.querySelector(".video").duration) * video.querySelector(".video").currentTime;
                let time = video.querySelector(".video").currentTime
                let duration = video.querySelector(".video").duration

                var minutes = Math.floor(time / 60);   
                var seconds = Math.floor(time).toString();

                var duration_minutes = Math.floor(duration / 60)
                var duration_seconds = Math.floor(duration).toString()

                seconds = seconds.length < 2 ? `0${seconds}` : seconds
                duration_seconds = duration_seconds.length < 2 ? `0${duration_seconds}` : duration_seconds

                timePassed.innerText = `${minutes}:${seconds}`
                timeDuration.innerText = `${duration_minutes}:${duration_seconds}`
                // Update the slider value
                seekBar.value = value;
                
            });

            video.querySelector(".video").addEventListener("ended", ()=> {
                video.querySelector(".video-container-overlay").classList.toggle("hidden");
                video.querySelector(".video-controls").classList.toggle("hidden");
                playButton.classList.remove("paused");
            })

            // Pause the video when the slider handle is being dragged
            seekBar.addEventListener("mousedown", function() {
                video.querySelector(".video").pause();
            });

            // Play the video when the slider handle is dropped
            seekBar.addEventListener("mouseup", function() {
                video.querySelector(".video").play();
                playButton.classList.add("paused");
            });

            fullScreen.addEventListener("click", ()=> {
                elem = video.querySelector(".video");
                if (elem.requestFullscreen) {
                    elem.requestFullscreen();
                }
                else if (elem.mozRequestFullScreen) {
                    elem.mozRequestFullScreen();
                }
                else if (elem.webkitRequestFullScreen) {
                    elem.webkitRequestFullScreen();
                }
                else if (elem.msRequestFullscreen) {
                    elem.msRequestFullscreen();
                }
            });
        });

    
    }
</script>