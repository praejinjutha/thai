// audioPlayer.js

// Function to format time (seconds) to MM:SS format
function formatTime(time) {
    var minutes = Math.floor(time / 60);
    var seconds = Math.floor(time % 60);
    return minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
}

// Update current time display
function updateTimeDisplay(audio) {
    var currentTime = audio.currentTime;
    var formattedTime = formatTime(currentTime);
    document.getElementById('currentTimeDisplay').textContent = formattedTime;
}

// Update total time display
function updateTotalTimeDisplay(audio) {
    var totalTime = audio.duration;
    var formattedTime = formatTime(totalTime);
    document.getElementById('totalTimeDisplay').textContent = formattedTime;
}

// Attach event listener to audio element for time update
function attachTimeUpdateListener(audio) {
    audio.addEventListener('timeupdate', function() {
        updateTimeDisplay(audio);
    });
}

// Function to initialize time display
function initializeTimeDisplay(audio) {
    updateTimeDisplay(audio);
    updateTotalTimeDisplay(audio);
    attachTimeUpdateListener(audio);
}


// Reset audio playback
function resetAudio() {
    if (audio1 && audio2) {
        audio1.pause();
        audio1.currentTime = 0; // Reset audio playback position to the beginning
        audio2.pause();
        audio2.currentTime = 0;
    }
}


// Function to adjust volume and music balance
function adjustVolume(type) {
    var volumeValue = document.getElementById('volumeSlider').value;
    var musicValue = document.getElementById('musicSlider').value;
    
    // Calculate volume based on volume slider value
    var volume = volumeValue / 100;
    
    // Calculate music balance based on music slider value (0 for full music, 1 for full vocal)
    var musicBalance = musicValue / 100;

    // Adjust volume for both audio tracks
    audio1.volume = volume * (1 - musicBalance); // Adjust volume for music
    audio2.volume = volume * musicBalance; // Adjust volume for vocal
}

// Event listener for volume slider
document.getElementById('volumeSlider').addEventListener('input', function() {
    // Call adjustVolume function with 'volume' type
    adjustVolume('volume');
});

// Event listener for music slider
document.getElementById('musicSlider').addEventListener('input', function() {
    // Call adjustVolume function with 'music' type
    adjustVolume('music');
});

// Play when play-icon is clicked
var playIcon = document.querySelector('.bi-play-circle');
playIcon.addEventListener('mouseover', function() {
    if (!audio1.paused && !audio2.paused) { // ถ้าเพลงกำลังเล่น
        this.style.cursor = 'not-allowed'; // เปลี่ยน cursor เป็น not-allowed เมื่อ hover ที่ไอคอน "play"
    } else {
        this.style.cursor = 'pointer'; // ให้ cursor เป็น pointer เมื่อ hover ที่ไอคอน "play" และเพลงหยุดเล่น
    }
});

// Pause when pause-icon is clicked
var pauseIcon = document.querySelector('.bi-pause-circle');
pauseIcon.addEventListener('mouseover', function() {
    if (audio1.paused && audio2.paused) { // ถ้าเพลงหยุดเล่น
        this.style.cursor = 'not-allowed'; // เปลี่ยน cursor เป็น not-allowed เมื่อ hover ที่ไอคอน "pause"
    } else {
        this.style.cursor = 'pointer'; // ให้ cursor เป็น pointer เมื่อ hover ที่ไอคอน "pause" และเพลงกำลังเล่น
    }
});

// เพิ่ม event listener สำหรับการคลิกที่วิดีโอเอง
document.getElementById('selectedVideo').addEventListener('click', function() {
    // ตั้งค่าเวลาปัจจุบันของวิดีโอให้เป็น 0 เพื่อเริ่มเล่นใหม่
    this.currentTime = 0;
});
